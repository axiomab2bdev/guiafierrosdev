<?php
class Banners extends TableGateway {
    var $PMDR;
    var $db;

    function Banners($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_BANNERS;
    }

    function getRow($id) {
        $banner = $this->db->GetRow("SELECT b.*, bt.width, bt.height FROM ".T_BANNERS." b, ".T_BANNER_TYPES." bt WHERE b.type_id=bt.id AND b.id=?",array($id));
        $banner['categories'] = $this->db->GetCol("SELECT category_id FROM ".T_BANNERS_CATEGORIES." WHERE banner_id=?",array($id));
        $banner['locations'] = $this->db->GetCol("SELECT location_id FROM ".T_BANNERS_LOCATIONS." WHERE banner_id=?",array($id));
        return $banner;
    }

    function insert($data) {
        $data['extension'] = get_file_extension($data['image']['name']);
        $id = parent::insert($data);
        $this->updateCategories($id,$data['categories']);
        $this->updateLocations($id,$data['locations']);
        $this->processImage($data,$id);
        return $id;
    }

    function update($data,$id) {
        if($data['image']['name'] != '') {
            $data['extension'] = get_file_extension($data['image']['name']);
            @unlink(find_file(BANNERS_PATH.$id.'.*'));
            $this->processImage($data,$id);
        }
        unset($data['image']); // get rid of this so we can use table gateway insert
        unset($data['current_image']);
        parent::update($data,$id);
        $this->updateCategories($id,$data['categories']);
        $this->updateLocations($id,$data['locations']);
    }

    function processImage($data,$id) {
        $type_info = $this->db->GetRow("SELECT * FROM ".T_BANNER_TYPES." WHERE id=?",array($data['type_id']));
        $options = array(
            'width'=>$type_info['width'],
            'height'=>$type_info['height'],
            'enlarge'=>true,
            'crop'=>true
        );
        $this->PMDR->get('Image_Handler')->process($data['image'],BANNERS_PATH.$id.'.'.$data['extension'],$options);
    }

    function delete($id) {
        @unlink(find_file(BANNERS_PATH.$id.'.*'));
        $this->db->Execute("DELETE FROM ".T_BANNERS_CATEGORIES." WHERE banner_id=?",array($id));
        $this->db->Execute("DELETE FROM ".T_BANNERS_LOCATIONS." WHERE banner_id=?",array($id));
        parent::delete($id);
    }

    function deleteByListID($id, $type = NULL) {
        if(!is_null($type)) {
            $banner = $this->db->Execute("SELECT id FROM ".T_BANNERS." WHERE listing_id=? AND type_id=?",array($id,$type));
        } else {
            $banner = $this->db->Execute("SELECT id FROM ".T_BANNERS." WHERE listing_id=?",array($id));
        }
        while($b = $banner->FetchRow()) {
            $this->delete($b['id']);
        }
    }

    function getTypes() {
        return $this->db->Execute("SELECT * FROM ".T_BANNER_TYPES);
    }

    function updateCategories($id, $categories = array()) {
        $this->db->Execute("DELETE FROM ".T_BANNERS_CATEGORIES." WHERE banner_id=?",array($id));
        if($banner = $this->db->GetRow("SELECT b.id, b.listing_id FROM ".T_BANNERS." b INNER JOIN ".T_BANNER_TYPES." bt ON b.type_id=bt.id WHERE b.id=?",array($id))) {
            if(!is_null($banner['listing_id'])) {
                $this->db->Execute("INSERT INTO ".T_BANNERS_CATEGORIES." (banner_id,category_id) SELECT ".$id.", cat_id FROM ".T_LISTINGS_CATEGORIES." WHERE list_id=?",array($banner['listing_id']));
            } else {
                if($categories == '') $categories = array();

                if(!is_array($categories)) {
                    $categories = array($categories);
                }
                if(!empty($categories)) {
                    foreach($categories as $category) {
                        $value_string .= '('.$id.','.$category.'),';
                    }
                    $this->db->Execute("INSERT INTO ".T_BANNERS_CATEGORIES." (banner_id,category_id) VALUES ".trim($value_string,','));
                }
            }
        }
    }

    function updateLocations($id, $locations = array()) {
        $this->db->Execute("DELETE FROM ".T_BANNERS_LOCATIONS." WHERE banner_id=?",array($id));
        if($banner = $this->db->GetRow("SELECT b.id, b.listing_id FROM ".T_BANNERS." b INNER JOIN ".T_BANNER_TYPES." bt ON b.type_id=bt.id WHERE b.id=?",array($id))) {
            if(!is_null($banner['listing_id'])) {
                $this->db->Execute("INSERT INTO ".T_BANNERS_LOCATIONS." (banner_id,location_id) SELECT ".$id.", location_id FROM ".T_LISTINGS." WHERE id=?",array($banner['listing_id']));
            } else {
                if($locations == '') $locations = array();

                if(!is_array($locations)) {
                    $locations = array($locations);
                }
                if(!empty($locations)) {
                    foreach($locations as $location) {
                        $value_string .= '('.$id.','.$location.'),';
                    }
                    $this->db->Execute("INSERT INTO ".T_BANNERS_LOCATIONS." (banner_id,location_id) VALUES ".trim($value_string,','));
                }
            }
        }
    }
}
?>