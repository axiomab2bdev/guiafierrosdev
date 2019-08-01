<?php
/**
* Discount Codes class
*/
class Discount_Codes extends TableGateway{
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;

    /**
    * Discount Codes constructor
    * @param object Registry
    */
    function __construct($PMDR) {
        $this->table = T_DISCOUNT_CODES;
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
    }

    function expire($id) {
        return $this->db->Execute("UPDATE ".T_DISCOUNT_CODES." SET date_expire=DATE_SUB(NOW(),INTERVAL 1 MINUTE) WHERE id=?",array($id));
    }
}
?>