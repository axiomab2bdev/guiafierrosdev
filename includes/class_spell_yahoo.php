<?php
/**
* Yahoo spelling class
* Gets spelling suggestion from Yahoo YQL API
*/
class Spell_Yahoo {
    function __construct() {}

    /**
    * Gets suggestions from API
    * @param string $query
    * @return mixed
    */
    function getSuggestions($query) {
        if(trim($query) == '') return array();

        $url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20search.spelling%20where%20query%3D%22".urlencode($query)."%22&format=json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        $data = curl_exec($ch);
        curl_close($ch);

        $results = array();

        $results = json_decode($data,true);
        return $results['query']['results'];
    }

    /**
    * Gets entire suggested string
    * @param string $query
    * @return string
    */
    function getSuggested($query) {
        $results = $this->getSuggestions($query);
        return $results['suggestion'];
    }
}
?>