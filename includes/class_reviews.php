<?php
/**
* Class Reviews
* Listing reviews
*/
class Reviews extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;

    /**
    * Reviews Constructor
    * @param object $PMDR Registry
    * @return void
    */
    function Reviews($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_REVIEWS;
    }

    function getRow($id) {
        return $this->db->GetRow("SELECT r.*, rt.rating FROM ".T_REVIEWS." r LEFT JOIN ".T_RATINGS." rt ON r.rating_id=rt.id WHERE r.id=?",array($id));
    }

    /**
    * Update review
    * @param array $data Review data
    * @return void
    */
    function update($data, $id) {
        $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();

        if(isset($data['rating']) and $data['rating'] != '') {
            // This will trigger a listing update, but we will still need to explicitly call a listing update
            // in case the rating data was not set. (Perhaps just the status was changed.)
            if(!$data['rating_id']) {
                $data['rating_id'] = $this->PMDR->get('Ratings')->insert(array('rating'=>$data['rating'],'listing_id'=>$data['listing_id'],'user_id'=>$data['user_id'],'ip_address'=>get_ip_address()));
            } else {
                $this->PMDR->get('Ratings')->update(array('listing_id'=>$data['listing_id'],'rating'=>$data['rating']),$data['rating_id']);
            }
        }
        unset($data['rating']);
        $result = parent::update($data, $id);

        // Now that the review changes have been saved, update the listing's rating again.
        $this->PMDR->get('Listings')->updateRating($data['listing_id']);
        return $result;
    }

    /**
    * Insert Review
    * A rating is also inserted if one is included
    * @param array $data Review and/or rating data
    * @return void
    */
    function insert($data) {
        $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();
        $return = parent::insert($data);
        $this->PMDR->get('Listings')->updateRating($data['listing_id']);
        return $return;
    }

    function delete($id) {
        $review = $this->db->GetRow("SELECT id, rating_id, listing_id FROM ".T_REVIEWS." WHERE id=?",array($id));
        $this->PMDR->get('Ratings')->delete($review['rating_id']);
        parent::delete($id);
        $this->PMDR->get('Listings')->updateRating($review['listing_id']);
    }

    /**
    * Approve Review
    * @param integer $id Review ID
    * @return void
    */
    function approve($id) {
        $this->db->Execute("UPDATE ".T_REVIEWS." SET status='active' WHERE id=?",array($id));
        $listing_id = $this->db->GetOne("SELECT listing_id FROM ".T_REVIEWS." WHERE id=?",array($id));
        $this->PMDR->get('Listings')->updateRating($listing_id);

    }
}
?>