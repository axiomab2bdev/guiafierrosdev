<?php
/**
* API class
* Routes each api action
*/
class API {
    /**
    * API class constructur
    * @param object $PMDR Registry
    * @return API
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->key = $PMDR->getConfig('api_key');
    }

    /**
    * Validate API key
    * @param string $key
    * @return boolean
    */
    function validate_key($key) {
        return ($this->key == $key);
    }

    /**
    * Send content type header
    * @param string $type Content type
    */
    function send_content_type($type) {
        switch($type) {
            case 'json':
                header("Content-type: text/json; charset=".CHARSET);
                break;
            case 'xml':
                header("Content-type: text/xml; charset=".CHARSET);
                echo '<?xml version="1.0" encoding="'.CHARSET.'"?>';
                break;
            case 'rss':
            case 'javascript':
                header("Content-type: application/x-javascript");
                break;
            case 'html':
                header("Content-type: text/html; charset=".CHARSET);
                break;
            default:
                return false;
        }
    }
}
?>