<?php
/**
* Site Links class
*/
class Site_Links extends TableGateway{
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    
    /**
    * Site Links constructor
    * @param object Registry    
    */
    function __construct($PMDR) {
        $this->table = T_SITE_LINKS;
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
    }
    
    function insert($data) {
        $data['extension'] = get_file_extension($data['image']['name']);
        $id = parent::insert($data);
        $this->processImage($data,$id);
    }
    
    function update($data,$id) {
        if($data['image']['name'] != '') {
            $data['extension'] = get_file_extension($data['image']['name']);
            @unlink(find_file(SITE_LINKS_PATH.$id.'.*'));
            $this->processImage($data,$id);
        }
        parent::update($data,$id);   
    }
    
    function delete($id) {
        @unlink(find_file(SITE_LINKS_PATH.$id.'.*'));
        parent::delete($id);    
    }
    
    function processImage($data,$id) {
        $options = array(
            'width'=>300,
            'height'=>300,
            'enlarge'=>false
        );
        $this->PMDR->get('Image_Handler')->process($data['image'],SITE_LINKS_PATH.$id.'.'.$data['extension'],$options);
    }
}
?>