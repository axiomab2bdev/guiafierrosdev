<?php
class Cron {
    var $PMDR;
    var $db;
    
    function Cron($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
    }
    
    function getJobs() {
        return $this->db->GetAll("SELECT * FROM ".T_CRON." WHERE active=1 AND run_date < NOW()");
    }             
}
?>