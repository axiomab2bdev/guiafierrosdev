<?php
/**
* Redirects class
* Handles URL changes when renaming is done to preserve URL rank
*/
class Redirects extends TableGateway {
    /**
    * PMD Registry object
    * @var Registry
    */
    var $PMDR;
    /**
    * Database object
    * @var Database
    */
    var $db;

    /**
    * Redirects constructor
    * @param mixed $PMDR
    * @return Redirects
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_REDIRECTS;
    }

    /**
    * Get a URL based on the hash and type
    * @param string $hash
    * @param string $type
    * @return string URL
    */
    function getURL($hash, $type) {
        return $this->db->GetOne("SELECT url FROM ".T_REDIRECTS." WHERE url_hash=? AND type=?",array($hash,$type));
    }

    /**
    * Insert a redirect
    * @param string $type
    * @param int $type_id
    * @param string $url
    */
    function insert($type, $type_id, $url) {
        $hash = md5($url);
        return $this->db->Execute("REPLACE INTO ".T_REDIRECTS." (type,type_id,url,url_hash,date_redirected) VALUES (?,?,?,?,NOW())",array(array($type,$type_id,$url,$hash)));
    }
}
?>