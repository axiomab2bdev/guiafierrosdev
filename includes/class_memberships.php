<?php
/**
* Class Memberships
* Listings memberships
*/
class Memberships extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    
    /**
    * Memberships Constructor
    * @param object $PMDR Registry
    */
    function Memberships($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $PMDR->get('DB');
        $this->table = T_MEMBERSHIPS;
    }
    
    /**
    * Update memberships and update any current memberships if desired
    * @param array $data Membership data
    * @param integer $id Membership ID
    * @return void
    */
    function update($data, $id) {
        parent::update($data,$id);
        if(isset($data['update_current'])) {
            $this->updateCurrentMembership($id);
        }   
    }
    
    function updateCurrentMembership($id) {
        if($pricing_ids = $this->db->GetCol("SELECT pp.id FROM ".T_PRODUCTS_PRICING." pp, ".T_PRODUCTS." p WHERE pp.product_id=p.id and p.type = 'listing_membership' AND p.type_id=?",array($id))) {
            $columns = $this->db->MetaColumnNames(T_MEMBERSHIPS);
            $query = "UPDATE ".T_LISTINGS." l, ".T_ORDERS." o, ".T_MEMBERSHIPS." m SET";
            foreach($columns as $column) {
                if($column == 'id' or $column == 'name') continue;
                $query .= ' l.'.$column.'=m.'.$column.',';   
            }
            $query = rtrim($query,',')." WHERE o.type_id=l.id AND o.type='listing_membership' AND m.id=? AND o.pricing_id IN(".implode(',',$pricing_ids).")";
            $this->db->Execute($query,array($id));
        }     
    }
    
    function updateAllCurrentMemberships() {
        $memberships = $this->db->GetCol("SELECT id FROM ".T_MEMBERSHIPS);
        foreach($memberships as $id) {
            $this->updateCurrentMembership($id);   
        }
    }
}
?>