<?php
class Banners_Types extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    /**
    * Banner Types Constructor
    * @param object $PMDR Registry
    * @return void
    */
    function Banners_Types($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $PMDR->get('DB');
        $this->table = T_BANNER_TYPES;
    }

    function insert($data) {
        $id = parent::insert($data);
        $this->db->Execute("ALTER TABLE ".T_MEMBERSHIPS." ADD banner_limit_$id SMALLINT(6) NOT NULL");
        $this->db->Execute("ALTER TABLE ".T_LISTINGS." ADD banner_limit_$id SMALLINT(6) NOT NULL");
    }

    function update($data, $id) {
        parent::update($data, $id);
        $banners = $this->db->GetAll("SELECT id FROM ".T_BANNERS." WHERE listing_id IS NULL AND type_id=?",array($id));
    }

    function getTypesAssoc($type = null) {
        if(!is_null($type)) {
            $where_sql = " WHERE type=".$this->PMDR->get('Cleaner')->clean_db($type);
        }
        return $this->db->GetAssoc("SELECT id, name FROM ".T_BANNER_TYPES."$where_sql");
    }

    function delete($id) {
        $this->db->Execute("ALTER TABLE ".T_MEMBERSHIPS." DROP banner_limit_".$id);
        $this->db->Execute("ALTER TABLE ".T_LISTINGS." DROP banner_limit_".$id);
        $banners = $this->db->GetCol("SELECT id FROM ".T_BANNERS." WHERE type_id=?",array($id));
        foreach($banners AS $banner_id) {
            $this->PMDR->get('Banners')->delete($banner_id);
        }
        parent::delete($id);
    }
}
?>