<?php
class External_Feeds extends TableGateway{
    var $PMDR;
    var $db;
    
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_FEEDS_EXTERNAL;
    }
}
?>