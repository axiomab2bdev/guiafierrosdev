<?php
class Email_Lists extends TableGateway {
    var $PMDR;
    var $db;

    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_EMAIL_LISTS;
    }
    
    function insert($data) {
    	$id = parent::insert($data);
        $this->checkAddAllUsers($data, $id);
        return $id;
    }
    
    function update($data, $condition) {
    	$result = parent::update($data, $condition);
    	$this->checkAddAllUsers($data, $_GET['id']);
    	return $result;
    }
    
    protected function checkAddAllUsers($data, $id) {
        // Check if they also wanted to add all the users to the list
        if (!empty($data['addall'])) {

            // Delete any if they pre-existed.
            $this->db->Execute("DELETE FROM ".T_EMAIL_LISTS_LOOKUP." WHERE list_id=?",array($id));

            // Then, add everyone to the list.
            $this->db->Execute('INSERT INTO '.T_EMAIL_LISTS_LOOKUP.' (`list_id`, `user_id`) SELECT ?, user.id FROM '.T_USERS.' AS user',array($id));
        }
    }

    function delete($id) {
        $this->db->Execute("DELETE FROM ".T_EMAIL_LISTS_LOOKUP." WHERE list_id=?",array($id));
        parent::delete($id);
    }
}
?>