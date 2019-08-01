<?php
/**
* Class Ratings
* Listing Ratings
*/
class Ratings extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    
    /**
    * Ratings Constructor
    * @param object $PMDR Registry
    * @return void;
    */
    function Ratings($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_RATINGS;  
    }
    
    /**
    * Get number of ratings by listing ID
    * @param integer $listing_id Listing ID
    * @return integer Number of votes
    */
    function totalCount($listing_id) {
        return $this->db->GetOne("SELECT votes FROM ".T_LISTINGS." WHERE selector=?",array($listing_id));
    }
    
    /**
    * Delete all ratings with specific listing ID
    * @param integer $id Listing ID
    * @return void
    */
    function deleteByListingID($id) {
        $this->db->Execute("DELETE FROM ".T_RATINGS." WHERE listing_id=?",array($listing_id));
    }
    
    /**
    * Insert rating and update listing stored rating
    * @param array $data rating data
    * @return boolean true if successfully inserted
    */
    function insert($data) {
        if($data['rating'] < 1 OR $data['rating'] > 5) {
            return false;
        }
        $this->db->Execute("INSERT INTO ".T_RATINGS." (listing_id, rating, ip_address, user_id,date) VALUES (?,?,?,?,NOW())",array($data['listing_id'], $data['rating'], get_ip_address(), $data['user_id']));
        $rating_id = $this->db->Insert_ID();

        // When a new rating is created, trigger an update on the listing.
        $this->PMDR->get('Listings')->updateRating($data['listing_id']);
        return $rating_id;
    }
    
    function update($data,$id) {
        if($data['rating'] < 1 OR $data['rating'] > 5) {
            return false;
        }
        $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();
        parent::update($data, $id);

        // After a rating is updated, trigger an update on the listing.
        $this->PMDR->get('Listings')->updateRating($data['listing_id']);   
    }
    
    function delete($id) {
        $listing_id = $this->db->GetOne("SELECT listing_id FROM ".T_RATINGS." WHERE id=?",array($id));
        $this->db->Execute("DELETE FROM ".T_RATINGS." WHERE id=?",array($id));
        $this->PMDR->get('Listings')->updateRating($listing_id);    
    }

    /**
    * Check if a user (by IP address) has voted for a listing
    * @param integer $listing_id Listing ID
    * @return integer If positive, user has rated listing before 
    */
    function hasVoted($listing_id, $user_id = false) {
        if($user_id) {
            return $this->db->GetOne("SELECT COUNT(*) AS count FROM ".T_RATINGS." WHERE user_id=? AND listing_id=?",array($user_id,$listing_id));
        } else {
            return $this->db->GetOne("SELECT COUNT(*) AS count FROM ".T_RATINGS." WHERE listing_id=? AND ip_address=?",array($listing_id,get_ip_address()));
        }
    }
    
    function printFormRating($stars=0) {
        $image_width = $stars*16;
        $_output = '
        <ul class="star-rating">
            <li class="current-rating" style="width:'.$image_width.'px;">Currently '.$stars.'/5 Stars.</li>
            <li><a href="#" title="1 star out of 5" class="one-star" onClick="document.getElementById(\'rating\').value = 1;">1</a></li>
            <li><a href="#" title="2 stars out of 5" class="two-stars" onClick="document.getElementById(\'rating\').value = 2;">2</a></li>
            <li><a href="#" title="3 stars out of 5" class="three-stars" onClick="document.getElementById(\'rating\').value = 3;">3</a></li>
            <li><a href="#" title="4 stars out of 5" class="four-stars" onClick="document.getElementById(\'rating\').value = 4;">4</a></li>
            <li><a href="#" title="5 stars out of 5" class="five-stars" onClick="document.getElementById(\'rating\').value = 5;">5</a></li>
        </ul>';
        $_output .= '<input id="rating" type="hidden" name="rating" value="'.$stars.'" />';
        return $_output;
    }
    
    /**
    * Print static rating without AJAX features
    * @param integer $stars Rating to show
    * @return string HTML output
    */
    function printRatingStatic($stars=0) {
        // Add: show number of votes somewhere
        $image_width = $stars*16;
        $_output = '
        <ul class="star-rating">
            <li class="current-rating" style="width:'.$image_width.'px;">'.$stars.'</li>
        </ul>';
        return $_output;
    }
}
?>