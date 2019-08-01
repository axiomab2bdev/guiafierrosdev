<?php
class Listing {
    var $PMDR;
    var $db;
    var $data = array();

    public function __get($name) {
        if(!is_array($data)) {
            return null;
        }
        if(array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        if($name == 'order' AND !isset($this->data['order'])) {
            return $this->data['order'] = $this->PMDR->get('Orders')->getByType('listing_membership',$this->id);
        }
        return null;
    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    function __construct($PMDR, $id) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        if(!$this->data = $this->db->GetRow("SELECT * FROM ".T_LISTINGS." WHERE id=?",array($id))) {
            return false;
        }
        return $this;
    }

    function getAdminHeader($active = null) {
        $template_content_header = $this->PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_listing_header.tpl');
        $template_content_header->set('active',$active);
        $template_content_header->set('id',$this->data['id']);
        $template_content_header->set('user_id',$this->data['user_id']);
        $template_content_header->set('title',$this->data['title']);
        $template_content_header->set('order_id',$this->order['id']);
        return $template_content_header;
    }
}
?>