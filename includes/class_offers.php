<?php
class Offers extends TableGateway {
    var $PMDR;
    var $db;
    
    function Offers($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_OFFERS;
    }
    
    function insert($data) {
        if(strlen($data['description']) > 0) {
            $data['description'] = substr($data['description'],0,$this->PMDR->getConfig('offer_description_size'));
        }

        $this->db->Execute( "INSERT INTO ".T_OFFERS." (listing_id, title, description, date, price, expire_date, www, buttoncode) VALUES (?,?,?,NOW(),?,?,?,?)",array($data['listing_id'],$data['title'],$data['description'],$data['price'],$data['expire_date'],$data['www'],$data['buttoncode']));
        $offer_id = $this->db->Insert_ID();
                                             
        $x = 1;
        while($_FILES['offer_image'.$x]['size']) {
            $extension = get_file_extension($_FILES['offer_image'.$x]['name']);
            
            $this->db->Execute("INSERT INTO ".T_OFFERS_IMAGES." (offer_id,extension) VALUES (?,?)",array($offer_id,$extension));
            
            $options = array(
                'width'=>$this->PMDR->getConfig('offer_image_width'),
                'height'=>$this->PMDR->getConfig('offer_image_height'),
                'enlarge'=>$this->PMDR->getConfig('offer_image_small')
            );
            if($this->PMDR->get('Image_Handler')->process($_FILES['offer_image'.$x],PMDROOT.OFFERS_PATH.$offer_id.'-'.$this->db->Insert_ID().'.'.$extension,$options)) {
                $options = array(
                    'width'=>$this->PMDR->getConfig('offer_thumb_width'),
                    'height'=>$this->PMDR->getConfig('offer_thumb_height'),
                    'enlarge'=>$this->PMDR->getConfig('offer_thumb_small')
                );
                $this->PMDR->get('Image_Handler')->process($_FILES['offer_image'.$x],PMDROOT.OFFERS_THUMBNAILS_PATH.$offer_id.'-'.$this->db->Insert_ID().'.'.$extension,$options);    
            } else {
                $this->db->Execute("DELETE FROM ".T_OFFERS_IMAGES." WHERE id=?",array($this->db->Insert_ID()));
            }        
            $x++;
        }
    }
    
    function update($data, $id) {
        foreach((array) $data['delete_images'] as $image_id) {
            $this->db->Execute("DELETE FROM ".T_OFFERS_IMAGES." WHERE id=?",array($image_id));
            @unlink(find_file(PMDROOT.OFFERS_PATH.$id.'-'.$image_id.'.*'));
            @unlink(find_file(PMDROOT.OFFERS_THUMBNAILS_PATH.$id.'-'.$image_id.'.*'));   
        }
                                             
        $x = 1;
        while($_FILES['offer_image'.$x]['size']) {
            $extension = get_file_extension($_FILES['offer_image'.$x]['name']);
            
            $this->db->Execute("INSERT INTO ".T_OFFERS_IMAGES." (offer_id,extension) VALUES (?,?)",array($id,$extension));
            
            $options = array(
                'width'=>$this->PMDR->getConfig('offer_image_width'),
                'height'=>$this->PMDR->getConfig('offer_image_height'),
                'enlarge'=>$this->PMDR->getConfig('offer_image_small')
            );
            if($this->PMDR->get('Image_Handler')->process($_FILES['offer_image'.$x],PMDROOT.OFFERS_PATH.$id.'-'.$this->db->Insert_ID().'.'.$extension,$options)) {
                $options = array(
                    'width'=>$this->PMDR->getConfig('offer_thumb_width'),
                    'height'=>$this->PMDR->getConfig('offer_thumb_height'),
                    'enlarge'=>$this->PMDR->getConfig('offer_thumb_small')
                );
                $this->PMDR->get('Image_Handler')->process($_FILES['offer_image'.$x],PMDROOT.OFFERS_THUMBNAILS_PATH.$id.'-'.$this->db->Insert_ID().'.'.$extension,$options);    
            } else {
                $this->db->Execute("DELETE FROM ".T_OFFERS_IMAGES." WHERE id=?",array($this->db->Insert_ID()));
            }        
            $x++;
        }

        parent::update($data, $id);    
    }

    function delete($id) {
        @unlink(find_file(FILES_PATH.OFFERS_PATH.$id.'-*'));
        @unlink(find_file(FILES_PATH.OFFERS_THUMBNAILS_PATH.$id.'-*'));
        $this->db->Execute("DELETE FROM ".T_OFFERS." WHERE id=?",array($id));
        $this->db->Execute("DELETE FROM ".T_OFFERS_IMAGES." WHERE offer_id=?",array($id));    
    }
}
  
?>