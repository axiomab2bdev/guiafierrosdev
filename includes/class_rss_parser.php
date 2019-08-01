<?php
/**
* Class RSSParser
* Wrapper class for RSS parser (SimplePie)
*/
class RSS_Parser {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    /**
    * RSS feed parser object
    * @var object
    */
    var $parser;
    /**
    * @var object Simple pie object
    */
    var $parsedFeed;
    /**
    * @var object Simplie pie object
    */
    var $parsedItems;

    /**
    * RSSParser Constructor
    * @param object $PMDR Registry
    * @return void
    */
    function RSS_Parser($PMDR,$parser) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->parser = $parser;
    }

    /**
    * Parse a feed url
    * @param string $url URL to parse (generally a .rss or atom feed)
    * @return void
    */
    function parse($url) {
        if(strstr($url,'feedburner') AND !strstr($url,'?format=xml')) {
            $url .= '?format=xml';
        }
        $this->parsedItems = array();
        $this->parser->set_feed_url($url);
        $this->parser->force_feed(true);
        // Set user agent to get around FeedBurner Simplepie blocker
        $ua = 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5';
        $this->parser->set_useragent($ua);
        // Disable sorting by date, it causes bad sorting if all dates are the same
        $this->parser->enable_order_by_date(false);
        $this->parser->init();
    }

    /**
    * Get feed title
    * @return string Feed title
    */
    function getTitle() {
        return $this->parser->get_title();
    }

    /**
    * Get subscribe URL
    * @return string URL to subscribe to feed
    */
    function getSubscribeURL() {
        return $this->parser->subscribe_url();
    }

    /**
    * Check if the feed has data
    * @return boolean True if data exists
    */
    function hasData() {
        return ($this->parser->data) ? true : false;
    }

    /**
    * Get feed items
    * @return object Simple pie items object
    */
    function getItems() {
        $items = $this->parser->get_items();
        foreach($items as $item) {
            $this->parsedItems[] = array(
                'permalink'=>$item->get_permalink(),
                'title'=>$item->get_title(),
                'date'=>$item->get_date('j M Y'),
                'content'=>$item->get_content()
                );
        }
        return $this->parsedItems;
    }

    /**
    * Get feed items count
    * @return integer Item count
    */
    function getItemCount() {
        return $parsedFeed->get_item_quantity();
    }
}
?>