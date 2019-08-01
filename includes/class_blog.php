<?php
/**
 * Blog Class
 */
class blog extends TableGateway {
    var $PMDR;
    var $db;

    /**
    * Blog constructor
    * @param object $PMDR
    * @return blog
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->table = T_BLOG;
    }

    /**
    * Get blog URL based on ID and friendly URL
    * @param int $id
    * @param string $friendly_url
    */
    function getURL($id, $friendly_url) {
        if(MOD_REWRITE) {
            return BASE_URL.'/blog/'.$friendly_url.'-'.$id.'.html';
        } else {
            return BASE_URL.'/blog_post.php?id='.$id;
        }
    }

    /**
    * Get blog category URL based on ID and friendly URL
    * @param int $id
    * @param string $friendly_url
    */
    function getCategoryURL($id, $friendly_url) {
        if(MOD_REWRITE) {
            return BASE_URL.'/blog/category/'.$friendly_url.'-'.$id.'.html';
        } else {
            return BASE_URL.'/blog.php?category_id='.$id;
        }
    }

    /**
    * Insert blog post
    * @param array $data Data to insert
    */
    function insert($data) {
        if($data['image']['size'] > 0) {
            $data['image_extension'] = get_file_extension($data['image']['name']);
        }
        $data['friendly_url'] = Strings::rewrite($data['friendly_url']);
        $data['user_id'] = $this->PMDR->get('Session')->get('admin_id');
        $data['date'] = $this->PMDR->get('Dates')->dateTimeNow();

        $blog_id = parent::insert($data);
        foreach($data['categories'] AS $category) {
            $this->db->Execute("INSERT INTO ".T_BLOG_CATEGORIES_LOOKUP." (blog_id,category_id) VALUES (?,?)",array($blog_id,$category));
        }
        if($data['image']['size'] > 0) {
            $this->PMDR->get('Image_Handler')->process($data['image'],BLOG_PATH.$blog_id.'.'.$data['image_extension']);
        }
    }

    /**
    * Update blog post
    * @param array $data
    * @param int $id
    */
    function update($data, $id) {
        if($data['image_delete']) {
            unlink(find_file(BLOG_PATH.$id.'.*'));
        }
        $data['date_update'] = $this->PMDR->get('Dates')->dateTimeNow();
        $data['friendly_url'] = Strings::rewrite($data['friendly_url']);

        if($data['image']['size'] > 0) {
            $data['image_extension'] = get_file_extension($data['image']['name']);
        }

        $this->db->Execute("DELETE FROM ".T_BLOG_CATEGORIES_LOOKUP." WHERE blog_id=?",array($id));
        foreach($data['categories'] AS $category) {
            $this->db->Execute("INSERT INTO ".T_BLOG_CATEGORIES_LOOKUP." (blog_id,category_id) VALUES (?,?)",array($id,$category));
        }
        if($data['image']['size'] > 0) {
            $this->PMDR->get('Image_Handler')->process($data['image'],BLOG_PATH.$id.'.'.$data['image_extension']);
        }
        unset($data['image']);
        parent::update($data,$id);
    }
}
?>