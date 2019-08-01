<?php
/**
 * Class UsersGroups
 * Handles user groups
 */
class UsersGroups extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    
    /**
    * UsersGroups Constructors
    * @param object $PMDR Registry
    */
    function UsersGroups ($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_USERS_GROUPS;
    }
    
    /**
    * Delete User Group
    * @param integer $id Group ID
    * @return void
    */
    function delete($id) {
        $this->db->Execute("DELETE FROM ".T_USERS_GROUPS_PERMISSIONS_LOOKUP." WHERE group_id=?",array($id));
        parent::delete($id);
    }
    
    /**
    * Check if user group has users
    * @param integer $id Group ID
    * @return integer User count
    */
    function hasUsers($id) {
        return $this->db->GetOne("SELECT COUNT(*) as count FROM ".T_USERS_GROUPS_LOOKUP." WHERE group_id=?",array($id));
    }  
}
