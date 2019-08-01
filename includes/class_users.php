<?php
/**
 * Class Users
 */
class Users extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    /**
     * Class Users Constructor
     * @param object $PMDR Registry
     * @return void
     */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_USERS;
    }

    /**
    * Get a user record from the database
    * @param int $id User ID
    * @return array User details
    */
    function getRow($id) {
        if(!$user = parent::getRow($id)) {
            return false;
        }
        if($user_login_provider = $this->db->GetRow("SELECT login_id, login_provider FROM ".T_USERS_LOGIN_PROVIDERS." WHERE user_id=?",array($user['id']))) {
            $user = array_merge($user, $user_login_provider);
        }
        return $user;
    }

    /**
    * Find user by email, taking into account case insensitive
    * @param string $email User email address
    * @return array User array
    */
    function findByEmail($email) {
        return $this->db->GetRow("SELECT * FROM ".T_USERS." WHERE LOWER(".T_USERS.".user_email)=?",array(strtolower(trim($email))));
    }

    /**
    * Insert User
    * @param array $user_array User Array
    * @return integer User ID
    */
    function insert($data) {
        if(!isset($data['cookie_salt'])) {
            $data['cookie_salt'] = $this->PMDR->get('Authentication')->generateSalt();
        }
        if(!isset($data['password_salt'])) {
            $data['password_salt'] = $this->PMDR->get('Authentication')->generateSalt();
        }
        $data['pass'] = $this->PMDR->get('Authentication')->encryptPassword($data['pass'],$data['password_salt']);

        $data['created'] = $this->PMDR->get('Dates')->dateTimeNow();

        $data['password_hash'] = $this->PMDR->get('Authentication')->encryption;

        // The comment must be set since its a text field which can not have a default value.
        if(!isset($data['user_comment'])) {
            $data['user_comment'] = '';
        }

        $fields = $this->PMDR->get('Fields')->getFields('users');
        if(sizeof($fields) > 0) {
            foreach($fields as $value) {
                if(is_array($data['custom_'.$value['id']])) {
                    $data['custom_'.$value['id']] = @implode("\n",$data['custom_'.$value['id']]);
                }
            }
        }

        $insert_id = parent::insert($data);

        foreach($data['user_groups'] as $group_id) {
            $this->db->Execute("INSERT INTO ".T_USERS_GROUPS_LOOKUP." (user_id,group_id) VALUES (?,?)",array($insert_id,$group_id));
        }

        if(is_array(value($data,'email_lists'))) {
            foreach($data['email_lists'] as $email_list_id) {
                $this->db->Execute("INSERT INTO ".T_EMAIL_LISTS_LOOKUP." (user_id,list_id) VALUES (?,?)",array($insert_id,$email_list_id));
            }
        }

        $this->updateProfileImage($insert_id, $data['profile_image']);

        $this->PMDR->get('Plugins')->run_hook('user_add',$insert_id);

        return $insert_id;
    }

    /**
    * Update User
    * @param array $data User array
    * @param integer $id User ID
    * @return boolean True if successful update
    */
    function update($data, $id) {
        // If a password was entered make sure to encrypt it and add it to the query.
        if(!empty($data['pass'])) {
            $data['password_salt'] = $this->PMDR->get('Authentication')->generateSalt();
            $data['pass'] = $this->PMDR->get('Authentication')->encryptPassword($data['pass'],$data['password_salt']);
            $data['password_hash'] = $this->PMDR->get('Authentication')->encryption;
        } else {
            unset($data['pass']);
        }

        if(isset($data['user_groups'])) {
            $this->db->Execute("DELETE FROM ".T_USERS_GROUPS_LOOKUP." WHERE user_id=?",array($id));
            foreach($data['user_groups'] as $group_id) {
                $this->db->Execute("INSERT INTO ".T_USERS_GROUPS_LOOKUP." (user_id,group_id) VALUES (?,?)",array($id,$group_id));
            }
            unset($data['user_groups']);
        }

        if(isset($data['email_lists'])) {
            $this->db->Execute("DELETE FROM ".T_EMAIL_LISTS_LOOKUP." WHERE user_id=?",array($id));
            foreach($data['email_lists'] as $email_lists_id) {
                $this->db->Execute("INSERT INTO ".T_EMAIL_LISTS_LOOKUP." (user_id,list_id) VALUES (?,?)",array($id,$email_lists_id));
            }
            unset($data['email_lists']);
        }

        if($data['delete_profile_image']) {
            @unlink(find_file(PROFILE_IMAGES_PATH.$id.'.*'));
        }

        if(isset($data['profile_image'])) {
            $this->updateProfileImage($id, $data['profile_image']);
            unset($data['profile_image']);
        }

        $fields = $this->PMDR->get('Fields')->getFields('users');
        if(sizeof($fields) > 0) {
            foreach($fields as $value) {
                if(is_array($data['custom_'.$value['id']])) {
                    $data['custom_'.$value['id']] = @implode("\n",$data['custom_'.$value['id']]);
                }
            }
        }

        return parent::update($data,$id);
    }

    /**
    * Delete user
    * @param integer $userid User ID
    * @return void
    */
    function delete($userid) {
        $this->PMDR->get('Plugins')->run_hook('user_delete',$userid);

        if($orders = $this->db->GetCol("SELECT id FROM ".T_ORDERS." WHERE user_id=?",array($userid))) {
            foreach($orders AS $order) {
                $this->PMDR->get('Orders')->delete($order);
            }
        }

        if($listings = $this->db->GetCol("SELECT id FROM ".T_LISTINGS." WHERE user_id=?",array($userid))) {
            foreach($listings AS $listing) {
                $this->PMDR->get('Listings')->delete($listing);
            }
        }
        $this->db->Execute("DELETE FROM ".T_BLOG." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_BLOG_COMMENTS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_CANCELLATIONS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_CONTACT_REQUESTS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_EMAIL_LISTS_LOOKUP." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_EMAIL_QUEUE." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_EMAIL_LOG." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_FAVORITES." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_INVOICES." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_LOG." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_LISTINGS_CLAIMS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_LISTINGS_SUGGESTIONS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE m, mp FROM ".T_MESSAGES." m LEFT JOIN ".T_MESSAGES_POSTS." mp ON m.id=mp.message_id WHERE (m.user_id_from=? OR m.user_id_to=?)",array($userid,$userid));
        $this->db->Execute("DELETE FROM ".T_RATINGS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_REVIEWS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_REVIEWS_COMMENTS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_REVIEWS_QUALITY." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_SEARCH_LOG." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_SESSIONS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_TRANSACTIONS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_UPDATES." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_USERS." WHERE id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_USERS_CARDS." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_USERS_GROUPS_LOOKUP." WHERE user_id=?",array($userid));
        $this->db->Execute("DELETE FROM ".T_USERS_LOGIN_PROVIDERS." WHERE user_id=?",array($user_id));

        @unlink(find_file(PROFILE_IMAGES_PATH.$userid.'.*'));
    }

    /**
    * Verify the password reset code for the user
    * @param integer $user User ID
    * @param string $hash User password hash
    * @return string|boolean String of new password, or false if failed authentication
    */
    function verifyPasswordResetCode($user, $verify_password) {
        if($verify_password == $user['password_verify']) {
            return $this->resetPassword($user['id']);
        } else {
            return false;
        }
    }

    /**
    * Verify the password is correct for a user ID
    * @param int $id
    * @param string $password
    * @return boolean
    */
    function verifyPassword($id, $password) {
        if($user = $this->db->GetRow("SELECT id, pass, password_salt, password_hash FROM ".T_USERS." WHERE id=?",array($id))) {
            if($this->PMDR->get('Authentication')->encryptPassword($password,$user['password_salt'],$user['password_hash']) == $user['pass']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
    * Set password verification code of user
    * @param integer $id User ID
    * @param string $hash User password hash
    * @return boolean True if updated
    */
    function setPasswordVerificationCode($id, $hash) {
        return $this->db->Execute("UPDATE ".T_USERS." SET password_verify=MD5(CONCAT('".$hash."',user_email)) WHERE id=?",array($id));
    }

    /**
    * Get user tax rate
    * @param integer $id User ID
    * @return float Tax rate
    */
    function getTaxRate($id) {
        $tax_rate = 0.00;
        $taxes = $this->db->GetAll("SELECT level, tax_rate FROM ".T_USERS." u, ".T_TAX." t WHERE u.id=? AND u.tax_exempt=0 AND ((user_country=country AND state='') OR (user_country=country AND user_state=state) OR (state='' AND country='')) GROUP BY t.id, level",array($id));
        $tax_rates = array(1=>0.00,2=>0.00);
        foreach($taxes as $rate) {
            if($rate['level'] == 1) {
                $tax_rates[1] += (float) $rate['tax_rate'];
            } else {
                $tax_rates[2] += (float) $rate['tax_rate'];
            }
        }
        return $tax_rates;
    }

    /**
    * Update user profile image
    * @param int $user_id
    * @param mixed $image_file
    */
    function updateProfileImage($user_id, $image_file) {
        $options = array(
            'width'=>$this->PMDR->getConfig('profile_image_width'),
            'height'=>$this->PMDR->getConfig('profile_image_height'),
            'enlarge'=>$this->PMDR->getConfig('profile_image_enlarge'),
            'crop'=>true,
            'remove_old'=>true
        );
        return $this->PMDR->get('Image_Handler')->process($image_file,PROFILE_IMAGES_PATH.$user_id.'.*',$options);
    }

    /**
    * Get user permissions
    * @param int $user_id
    * @return array
    */
    function getPermissions($user_id) {
        return $this->db->GetCol("SELECT ".T_USERS_PERMISSIONS.".permission_key FROM
                            ".T_USERS_GROUPS_LOOKUP.",
                            ".T_USERS_GROUPS_PERMISSIONS_LOOKUP.",
                            ".T_USERS_PERMISSIONS."
                           WHERE
                            ".T_USERS_GROUPS_LOOKUP.".user_id=? AND
                            ".T_USERS_GROUPS_LOOKUP.".group_id=".T_USERS_GROUPS_PERMISSIONS_LOOKUP.".group_id AND
                            ".T_USERS_GROUPS_PERMISSIONS_LOOKUP.".permission_id=".T_USERS_PERMISSIONS.".id",array($user_id));
    }

    /**
    * Reset user password
    * @param int $user_id
    * @return string New password
    */
    function resetPassword($user_id) {
        $new_pass = Strings::random(8);
        $new_salt = $this->PMDR->get('Authentication')->generateSalt();
        $this->db->Execute("UPDATE ".T_USERS." SET pass=?, password_salt=?, password_hash=? WHERE id=?",array($this->PMDR->get('Authentication')->encryptPassword($new_pass,$new_salt),$new_salt,$this->PMDR->get('Authentication')->encryption,$user_id));
        return $new_pass;
    }

    /**
    * Remove user from all email lists
    * @param int $user_id
    * @param string $token
    * @return boolean
    */
    function unsubscribeAll($user_id,$token) {
        $user = $this->db->GetRow("SELECT id, user_email FROM ".T_USERS." WHERE id=?",array($user_id));
        if($token == hash('sha256',$user_id.$user['user_email'].SECURITY_KEY)) {
            $this->db->Execute("DELETE FROM ".T_EMAIL_LISTS_LOOKUP." WHERE user_id=?",array($user_id));
            return true;
        } else {
            return false;
        }
    }

    function merge($from, $to, $delete_from = true) {
        if(!$user_from = $this->db->GetRow("SELECT id, login FROM ".T_USERS." WHERE id=?",array($from))) {
            return false;
        }
        if(!$user_to = $this->db->GetRow("SELECT id, login FROM ".T_USERS." WHERE id=?",array($to))) {
            return false;
        }

        $this->db->Execute("UPDATE ".T_BLOG." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_BLOG_COMMENTS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_CANCELLATIONS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_CONTACT_REQUESTS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_EMAIL_QUEUE." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_EMAIL_LOG." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_FAVORITES." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_INVOICES." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_LISTINGS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_LISTINGS_CLAIMS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_LISTINGS_SUGGESTIONS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_LOG." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_MESSAGES." SET user_id_from=? WHERE user_id_from=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_MESSAGES." SET user_id_to=? WHERE user_id_to=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_MESSAGES_POSTS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_ORDERS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_RATINGS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_REVIEWS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_REVIEWS_COMMENTS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE IGNORE ".T_REVIEWS_QUALITY." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("DELETE FROM ".T_REVIEWS_QUALITY." WHERE user_id=?",array($user_from['id']));
        $this->db->Execute("UPDATE ".T_SEARCH_LOG." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_TRANSACTIONS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_UPDATES." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_USERS_CARDS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));
        $this->db->Execute("UPDATE ".T_USERS_LOGIN_PROVIDERS." SET user_id=? WHERE user_id=?",array($user_to['id'],$user_from['id']));

        $lists = $this->db->GetCol("SELECT list_id FROM ".T_EMAIL_LISTS_LOOKUP." WHERE user_id=?",array($user_from['id']));
        foreach($lists as $lists_id) {
            $this->db->Execute("INSERT IGNORE INTO ".T_EMAIL_LISTS_LOOKUP." (user_id,list_id) VALUES (?,?)",array($user_to['id'],$lists_id));
        }

        if($delete_from) {
            $this->db->Execute("DELETE FROM ".T_SESSIONS." WHERE user_id=?",array($user_from['id']));
            $this->delete($user_from['id']);
        }

        return true;
    }
}
?>