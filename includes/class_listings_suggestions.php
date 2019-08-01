<?php
class Listings_Suggestions extends TableGateway{
    var $PMDR;
    var $db;
    
    function Listings_Suggestions($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_LISTINGS_SUGGESTIONS;
    }
    
    function clear() {
        $this->db->Execute("TRUNCATE ".T_LISTINGS_SUGGESTIONS);
    }
    
    function insert($data) {
        $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();
        parent::insert($data);   
    }
}
?>