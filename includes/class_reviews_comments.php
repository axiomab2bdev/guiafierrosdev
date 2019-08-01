<?php
/**
* Class Reviews Comments
* Listing reviews comments
*/
class Reviews_Comments extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    
    /**
    * Reviews Comments Constructor
    * @param object $PMDR Registry
    * @return void
    */
    function Reviews_Comments($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_REVIEWS_COMMENTS;  
    }
}
?>