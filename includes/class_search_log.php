<?php
class Search_Log extends TableGateway{
    var $PMDR;
    var $db;
    
    function Search_Log($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_SEARCH_LOG;
    }
    
    function clear() {
        $this->db->Execute("TRUNCATE ".T_SEARCH_LOG);
    }
}
?>