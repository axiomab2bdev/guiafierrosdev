<?php
/**
* Images Class
*/
class Images extends TableGateway {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;

    /**
    * Images constructor
    * @param object $PMDR
    * @return Images
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_IMAGES;
    }

    /**
    * Insert image
    * @param array $data
    * @return int Image ID
    */
    function insert($data) {
        $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();
        $data['description'] = Strings::limit_characters($data['description'],$this->PMDR->getConfig('gallery_desc_size'));
        $data['extension'] = get_file_extension($data['image']['name']);
        $id = parent::insert($data);
        $this->processImage($data,$id);
        return $id;
    }

    /**
    * Process image file
    * @param array $data
    * @param int $id
    * @return void
    */
    function processImage($data,$id) {
        $options = array(
            'width'=>$this->PMDR->getConfig('gallery_image_width'),
            'height'=>$this->PMDR->getConfig('gallery_image_height'),
            'enlarge'=>$this->PMDR->getConfig('gallery_small'),
            'watermark'=>true
        );

        $this->PMDR->get('Image_Handler')->process($data['image'],IMAGES_PATH.$id.'.'.$data['extension'],$options);

        $options = array(
            'width'=>$this->PMDR->getConfig('gallery_thumb_width'),
            'height'=>$this->PMDR->getConfig('gallery_thumb_height'),
            'enlarge'=>$this->PMDR->getConfig('gallery_thumb_small'),
            'crop'=>$this->PMDR->getConfig('gallery_thumb_crop')
        );

        $this->PMDR->get('Image_Handler')->process($data['image'],IMAGES_THUMBNAILS_PATH.$id.'.'.$data['extension'],$options);
    }

    /**
    * Update image
    * @param array $data
    * @param int $id
    * @return resource
    */
    function update($data,$id) {
        $data['description'] = Strings::limit_characters($data['description'],$this->PMDR->getConfig('gallery_desc_size'));
        if($data['image']['name'] != '') {
            $data['extension'] = get_file_extension($data['image']['name']);
            @unlink(find_file(IMAGES_PATH.$id.'.*'));
            @unlink(find_file(IMAGES_PATH.$id.'-small.*'));
            $this->processImage($data,$id);
        }
        parent::update($data,$id);
    }

    /**
    * Delete image
    * @param int $id
    * @return resource
    */
    function delete($id) {
        @unlink(find_file(IMAGES_PATH.$id.'.*'));
        @unlink(find_file(IMAGES_THUMBNAILS_PATH.$id.'.*'));
        parent::delete($id);
    }
}
?>