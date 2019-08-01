<?php
class Listings_Claims extends TableGateway{
    var $PMDR;
    var $db;
    
    function Listings_Claims($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_LISTINGS_CLAIMS;
    }
    
    function clear() {
        $this->db->Execute("TRUNCATE ".T_LISTINGS_CLAIMS);
    }
    
    function insert($data) {
        $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();
        parent::insert($data);   
    }
}
?>