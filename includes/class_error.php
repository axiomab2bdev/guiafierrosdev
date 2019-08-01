<?php
/**
* Error class handles header errors
*/
class Error {
    var $PMDR;
    var $error;

    /**
    * Error class constructor
    * @param object $PMDR Registry
    * @param int $error Error code
    * @return void
    */
    function __construct($PMDR,$error) {
        $this->PMDR = $PMDR;
        $this->error = $error;
        $this->process();
    }

    /**
    * Process error code
    */
    function process() {
        switch($this->error) {
            case 404:
                header('HTTP/1.1 404 Not Found');
                header('Status: 404 Not Found');
                $this->displayTemplate();
                exit();
                break;
            case 301:
                header('HTTP/1.1 301 Moved Permanently');
                break;
            case 503:
                header('HTTP/1.1 503 Service Temporarily Unavailable');
                header('Status: 503 Service Temporarily Unavailable');
                header('Retry-After: 60');
                break;
        }
    }

    /**
    * Display a template file if the error code requires one
    */
    function displayTemplate() {
        global $PMDR, $db;
        if($PMDR->get('Templates')->path($this->error.'.tpl')) {
            $template_content = $this->PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.$this->error.'.tpl')->render();
            $this->PMDR->setAdd('page_title',$PMDR->getLanguage('error_404'),true);
            include(PMDROOT.'/includes/template_setup.php');
        }
    }
}
?>