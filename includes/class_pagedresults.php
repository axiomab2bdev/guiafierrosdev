<?php 
class PagedResults {
    var $PMDR; 
    var $currentPage = 1; 
    var $resultsNumber = 10; 
    var $linksNumber = 10;
    var $limit1;
    var $limit2; 
    var $totalResults = 0;
    var $resultArray = array();
    var $pageVariable = 'page';
    var $modRewrite = MOD_REWRITE;
    var $url;
   
    function __construct($PMDR, $total_results = 0) {
        $this->PMDR = $PMDR;
        $this->currentPage = $this->getCurrentPage();
        $this->previousPage = $this->getPreviousPage();
        $this->url = get_page_url();
        $this->setResultsNumber($this->resultsNumber);
        if($total_results) {
            $this->setTotalResults($total_results);
        }       
    }
    
    function setResultsNumber($number) {
        $this->resultsNumber = $number;
        $this->limit1 = $this->getStartLimit();
        $this->limit2 = $number;
    }
    
    function setTotalResults($number) {
        $this->totalResults = $number;
        $this->totalPages = $this->getTotalPages();
    }    
   
    function getPageArray($results_number = null, $total_results = null) {
        if(!is_null($results_number)) {
            $this->setResultsNumber($results_number);
        }
        if(!is_null($total_results)) {
            $this->setTotalResults($total_results);
        }
        $this->resultArray = array( 
                           'previous_page' => $this->previousPage, 
                           'next_page' => $this->getNextPage(), 
                           'current_page' => $this->currentPage, 
                           'total_pages' => $this->totalPages, 
                           'total_results' => $this->totalResults, 
                           'page_numbers' => $this->getNumbers(), 
                           'limit1' => $this->limit1, 
                           'limit2' => $this->limit2, 
                           'start_offset' => $this->getStartOffset(), // First record number, taking into account that DB records start at 0 (so we add 1)
                           'end_offset' => $this->getEndOffset(),  // First record number, taking into account that DB records start at 0
                           'results_per_page' => $this->resultsNumber);
        $this->loadHTML(); 
        return $this->resultArray; 
    } 

    function getTotalPages() {
        if($this->totalResults == 0 OR $this->resultsNumber == 0) {
            return 0;
        } else {
            return ceil($this->totalResults / $this->resultsNumber); 
        }  
    }

    function getStartLimit() {
        return $this->resultsNumber * ($this->currentPage - 1);
    } 
                                        
    function getStartOffset() {
        if($this->totalResults == 0 OR $this->resultsNumber == 0) {
            return 0;
        }             
        return $this->getStartLimit() + 1;    
    } 

    function getEndOffset() {
        if(($offset = $this->currentPage * $this->resultsNumber) > $this->totalResults) {
            return $this->totalResults;
        } else {
            return $offset;
        }
    } 

    function getCurrentPage() { 
        return (isset($_GET[$this->pageVariable])) ? intval($_GET[$this->pageVariable]) : $this->currentPage;  
    } 

    function getPreviousPage() { 
        return ($this->currentPage > 1) ? $this->currentPage - 1 : false; 
    } 

    function getNextPage() { 
        return ($this->currentPage < $this->totalPages) ? $this->currentPage + 1 : false; 
    } 

    function getStartNumber() { 
        $links_per_page_half = floor($this->linksNumber / 2);  
        if($this->currentPage <= $links_per_page_half || $this->totalPages <= $this->linksNumber) { 
            return 1; 
        } elseif($this->currentPage >= ($this->totalPages - $links_per_page_half)) { 
            return $this->totalPages - $this->linksNumber + 1; 
        } else { 
            return $this->currentPage - $links_per_page_half; 
        } 
    } 

    function getEndNumber() { 
        return ($this->totalPages < $this->linksNumber) ? $this->totalPages : $this->getStartNumber() + $this->linksNumber - 1; 
    } 

    function getNumbers() {
        $numbers = array(); 
        for($i=$this->getStartNumber(); $i<=$this->getEndNumber(); $i++) {
            $numbers[] = $i; 
        } 
        return $numbers; 
    }

    function loadHTML() {
        $page_numbers = $this->resultArray['page_numbers'];
        $this->resultArray['page_numbers'] = array();
        
        if(($query_string = preg_replace('/(&amp;)?page=[\d]+/','',$_SERVER['QUERY_STRING'])) != '') {
            $url = str_replace($_SERVER['QUERY_STRING'],$query_string,$this->url).'&';
        } else {
            $url = str_replace('?'.$_SERVER['QUERY_STRING'],'',$this->url).'?';
        }
  
        if($this->resultArray['current_page']!= 1) {
            $this->resultArray['first_url'] = ($this->modRewrite ? '1.html' : $url.'page=1'); 
        }
        if($this->resultArray['previous_page']) {
            $this->resultArray['previous_url'] = ($this->modRewrite ? $this->resultArray['previous_page'].'.html' : $url.'page='.$this->resultArray['previous_page']);
        }
        
        foreach($page_numbers as $key=>$page_number) { 
            $this->resultArray['page_numbers'][$key]['number'] = $page_number;
            $this->resultArray['page_numbers'][$key]['url'] = ($this->modRewrite ? $page_number.'.html' : $url.'page='.$page_number); 
        }

        if($this->resultArray['next_page']) {
            $this->resultArray['next_url'] = ($this->modRewrite ? $this->resultArray['next_page'].'.html' : $url.'page='.$this->resultArray['next_page']);
        }
        if($this->resultArray['current_page'] < $this->resultArray['total_pages']) {
            $this->resultArray['last_url'] = ($this->modRewrite ? $this->resultArray['total_pages'].'.html' : $url.'page='.$this->resultArray['total_pages']);    
        } 
        $this->resultArray['page_select'] = '<select id="page" name="page" class="page-numbers" onChange="window.location = \''.$url.'page=\'+getElementById(\'page\').options[getElementById(\'page\').selectedIndex].value">';

        foreach($page_numbers as $page_number) {
            $this->resultArray['page_select'] .= '<option value="'.$page_number.'"';
            if($this->resultArray['current_page'] == $page_number) {
                $this->resultArray['page_select'] .= ' selected'; 
            }    
            $this->resultArray['page_select'] .= '>'.$page_number.'</option>';
        }
        $this->resultArray['page_select'] .= '</select>';
    }
} 
?>