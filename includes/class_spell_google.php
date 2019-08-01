<?php
/**
* Google Spell Class
* Checks spelling using google API
*/
class Spell_Google {
    function __construct() {}

    /**
    * Gets suggestions for a string of words
    * @param string $query
    * @param string $lang
    * @param string $hl
    * @return array
    */
    function getSuggestions($query, $lang='en', $hl='en') {
        if(trim($query) == '') return array();

        $post = '<spellrequest textalreadyclipped="0" ignoredups="1" ignoredigits="1" ignoreallcaps="0"><text>'.htmlspecialchars($query).'</text></spellrequest>';

        $path = "/tbproxy/spell?lang=$lang&hl=$hl";

        $url = "http://www.google.com";

        $header  = "POST ".$path." HTTP/1.0 \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-type: application/PTI26 \r\n";
        $header .= "Content-length: ".strlen($post)." \r\n";
        $header .= "Content-transfer-encoding: text \r\n";
        $header .= "Request-number: 1 \r\n";
        $header .= "Document-type: Request \r\n";
        $header .= "Interface-Version: Test 1.4 \r\n";
        $header .= "Connection: close \r\n\r\n";
        $header .= $post;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);

        $data = curl_exec($ch);
        curl_close($ch);

        $xml = new SimpleXMLElement($data);

        $results = array();

        foreach($xml->c as $correction) {
            $suggestions = explode("\t", (string)$correction);
            $results[] = array('offset'=>(String) $correction['o'],'length'=>(string) $correction['l'],'best'=>$suggestions[0],'all'=>$suggestions);
        }

        return $results;
    }

    /**
    * Gets replacement suggestion for entire string
    * @param string $query
    * @param string $lang
    * @param string $hl
    * @return string
    */
    function getSuggested($query, $lang='en', $hl='en') {
        $suggestions = $this->getSuggestions($query, $lang='en', $hl='en');
        foreach($suggestions AS $suggestion) {
            $find[] = substr($query,$suggestion['offset'],$suggestion['length']);
            $replace[] = $suggestion['best'];
        }
        $new_suggestion = str_replace($find,$replace,$query);
        if($new_suggestion == $query) {
            return false;
        }
        return $new_suggestion;
    }
}
?>