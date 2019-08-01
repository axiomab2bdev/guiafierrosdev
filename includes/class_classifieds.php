<?php
/**
* Classifieds Class
*/
class Classifieds extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database Database object
    */
    var $db;

    /**
    * Classifieds constructor
    * @param object Registry
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_CLASSIFIEDS;
    }

    /**
    * Get classified URL
    * @param int $id
    * @param string $friendly_url
    * @param string $query_string
    * @param string $query_string_rewrite
    * @param string $filename
    * @return string
    */
    function getURL($id, $friendly_url, $query_string='', $query_string_rewrite='.html', $filename='classified.php') {
        if(MOD_REWRITE) {
            return BASE_URL_NOSSL.'/classified/'.$friendly_url.'-'.$id.$query_string_rewrite;
        } else {
            return BASE_URL_NOSSL.'/'.$filename.'?id='.$id.$query_string;
        }
    }

    /**
    * Insert classified
    * @param array $data
    * @return void
    */
    function insert($data) {
        $data['description'] = Strings::limit_characters($data['description'],$this->PMDR->getConfig('classified_description_size'));
        $data['www'] = standardize_url($data['www']);
        if(!isset($data['date'])) {
            $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();
        }

        parent::insert($data);

        $classified_id = $this->db->Insert_ID();

        for($x=1; $x < 6; $x++) {
            if($_FILES['classified_image'.$x]['size']) {
                $extension = get_file_extension($_FILES['classified_image'.$x]['name']);

                $this->db->Execute("INSERT INTO ".T_CLASSIFIEDS_IMAGES." (classified_id,extension) VALUES (?,?)",array($classified_id,$extension));

                $options = array(
                    'width'=>$this->PMDR->getConfig('classified_image_width'),
                    'height'=>$this->PMDR->getConfig('classified_image_height'),
                    'enlarge'=>$this->PMDR->getConfig('classified_image_small'),
                    'watermark'=>true
                );
                if($this->PMDR->get('Image_Handler')->process($_FILES['classified_image'.$x],CLASSIFIEDS_PATH.$classified_id.'-'.$this->db->Insert_ID().'.'.$extension,$options)) {
                    $options = array(
                        'width'=>$this->PMDR->getConfig('classified_thumb_width'),
                        'height'=>$this->PMDR->getConfig('classified_thumb_height'),
                        'enlarge'=>$this->PMDR->getConfig('classified_thumb_small'),
                        'crop'=>$this->PMDR->getConfig('classified_thumb_crop')
                    );
                    $this->PMDR->get('Image_Handler')->process($_FILES['classified_image'.$x],CLASSIFIEDS_THUMBNAILS_PATH.$classified_id.'-'.$this->db->Insert_ID().'.'.$extension,$options);
                } else {
                    $this->db->Execute("DELETE FROM ".T_CLASSIFIEDS_IMAGES." WHERE id=?",array($this->db->Insert_ID()));
                }
            }
        }
    }

    /**
    * Update classified
    * @param array $data
    * @param int $id
    * @return void
    */
    function update($data, $id) {
        $data['www'] = standardize_url($data['www']);
        foreach((array) $data['delete_images'] as $image_id) {
            $this->db->Execute("DELETE FROM ".T_CLASSIFIEDS_IMAGES." WHERE id=?",array($image_id));
            @unlink(find_file(CLASSIFIEDS_PATH.$id.'-'.$image_id.'.*'));
            @unlink(find_file(CLASSIFIEDS_THUMBNAILS_PATH.$id.'-'.$image_id.'.*'));
        }

        for($x=1; $x < 6; $x++) {
            if($_FILES['classified_image'.$x]['size']) {
                $extension = get_file_extension($_FILES['classified_image'.$x]['name']);

                $this->db->Execute("INSERT INTO ".T_CLASSIFIEDS_IMAGES." (classified_id,extension) VALUES (?,?)",array($id,$extension));

                $options = array(
                    'width'=>$this->PMDR->getConfig('classified_image_width'),
                    'height'=>$this->PMDR->getConfig('classified_image_height'),
                    'enlarge'=>$this->PMDR->getConfig('classified_image_small'),
                    'watermark'=>true
                );
                if($this->PMDR->get('Image_Handler')->process($_FILES['classified_image'.$x],CLASSIFIEDS_PATH.$id.'-'.$this->db->Insert_ID().'.'.$extension,$options)) {
                    $options = array(
                        'width'=>$this->PMDR->getConfig('classified_thumb_width'),
                        'height'=>$this->PMDR->getConfig('classified_thumb_height'),
                        'enlarge'=>$this->PMDR->getConfig('classified_thumb_small')
                    );
                    $this->PMDR->get('Image_Handler')->process($_FILES['classified_image'.$x],CLASSIFIEDS_THUMBNAILS_PATH.$id.'-'.$this->db->Insert_ID().'.'.$extension,$options);
                } else {
                    $this->db->Execute("DELETE FROM ".T_CLASSIFIEDS_IMAGES." WHERE id=?",array($this->db->Insert_ID()));
                }
            }
        }

        parent::update($data, $id);
    }

    /**
    * Delete classified
    * @param int $id
    * @return void
    */
    function delete($id) {
        @unlink(find_file(CLASSIFIEDS_PATH.$id.'-*'));
        @unlink(find_file(CLASSIFIEDS_THUMBNAILS_PATH.$id.'-*'));
        $this->db->Execute("DELETE FROM ".T_CLASSIFIEDS." WHERE id=?",array($id));
        $this->db->Execute("DELETE FROM ".T_CLASSIFIEDS_IMAGES." WHERE classified_id=?",array($id));
    }
}
?>