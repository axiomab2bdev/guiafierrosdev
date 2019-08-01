<?php
class User {
    var $PMDR;
    var $db;
    var $data = array();

    public function __get($name) {
        if(is_array($this->data) AND array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    function __construct($PMDR, $id) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        if(!$this->data = $this->db->GetRow("SELECT * FROM ".T_USERS." WHERE id=?",array($id))) {
            return false;
        }
        return $this;
    }

    function getProfileImageURL() {
        $profile_image = get_file_url(PROFILE_IMAGES_PATH.$this->data['id'].'.*');
        if(!$profile_image AND $this->PMDR->getConfig('gravatar')) {
            $profile_image = 'http://www.gravatar.com/avatar/'.md5(Strings::strtolower(trim($this->user_email))).'.jpg?s='.$this->PMDR->getConfig('profile_image_width').'&d=mm';
        }
        return $profile_image;
    }

    function loggedIn() {
        if(isset($this->logged_in)) {
            return $this->logged_in;
        } else {
            if($this->db->GetOne("SELECT COUNT(*) FROM ".T_SESSIONS." WHERE user_id=?",array($this->id))) {
                return $this->data['logged_in'] = true;
            }
            return false;
        }
    }

    function getAdminSummaryHeader($active = null) {
        $template_content_header = $this->PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_users_summary_header.tpl');
        $template_content_header->set('active',$active);
        $template_content_header->set('id',$this->data['id']);
        if(trim($this->data['user_first_name'].' '.$this->data['user_last_name']) == '') {
            $template_content_header->set('name',$this->data['login']);
        } else {
            $template_content_header->set('name',$this->data['user_first_name'].' '.$this->data['user_last_name']);
        }
        return $template_content_header;
    }
}
?>