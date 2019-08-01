<?php
/**
* Menu Links class
* Used for construction of the menu.  Used in connection with custom pages.
*/
class CustomLinks extends TableGateway{
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;

    /**
    * CustomLinks constructor
    * @param object Registry
    */
    function CustomLinks($PMDR) {
        $this->table = T_MENU_LINKS;
        $this->PMDR = $PMDR;
        $this->db = $this->PMDR->get('DB');
        $this->template = PMDROOT.TEMPLATE_PATH.'blocks/menu.tpl';
        $this->item_template = PMDROOT.TEMPLATE_PATH.'blocks/menu_item.tpl';
    }

    /**
    * Get a menu segment, looping through all children levels
    * @param integer $parent Parent used to start root of returned menu
    * @param integer $level Used for indendation
    */
    function getMenuLoop($parent=null, $level=0, $sitemap = false) {
        if(is_null($parent)) {
            $parent = 'NULL';
        }
        $query = "
            SELECT m.*,
                IF(m.page_id IS NOT NULL,
                    IF(".intval(MOD_REWRITE).",
                        CONCAT('".BASE_URL_NOSSL."/pages/',friendly_url,'.html'),
                        CONCAT('".BASE_URL_NOSSL."/page.php?id=',p.id)
                    ),
                    IF(INSTR(link,'://'),
                        link,
                        CONCAT('".BASE_URL."/',link)
                    )
                ) as url, target
            FROM  ".T_MENU_LINKS." m
                LEFT JOIN ".T_PAGES." p ON m.page_id=p.id
            WHERE
                m.parent_id<=>$parent AND
                m.active=1 AND ";
                if($sitemap) $query .= "m.sitemap=1 AND ";
                $query .=
                ($this->PMDR->get('Session')->get('user_id') != '' ? "m.logged_in=1" : "m.logged_out=1")."
            ORDER BY m.ordering";

        $links = $this->db->GetAll($query);
        foreach($links as $link) {
            $template = $this->PMDR->getNew('Template');
            $template->set('active',$link['url'] == URL);
            $template->set('link',$link['url']);
            $template->set('link_title',$link['title']);
            $template->set('nofollow',($link['nofollow'] ? ' rel="nofollow"' : ''));
            $template->set('target',($link['target'] ? ' target="'.$link['target'].'"' : ''));
            $template->set('indent',str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$level));
            ob_start();
            $this->getMenuLoop($link['id'], $level+1, $sitemap);
            $sub_menu = ob_get_clean();
            if(!empty($sub_menu)) {
                $menu_template = $this->PMDR->getNew('Template',$this->template);
                $menu_template->set('items', $sub_menu);
                $sub_menu = $menu_template->render();
            }
            $template->set('sub_menu', $sub_menu);
            echo $template->render($this->item_template);
        }
    }

    /**
    * Get and capture the menu output
    * @param integer $parent Parent used to start root of returned menu
    * @param integer $level Used for indendation
    * @return string Menu HTML
    */
    function getMenuHTML($parent=null, $level=0, $sitemap = false) {
        ob_start();
        $this->getMenuLoop($parent, $level, $sitemap);
        $menu_items = ob_get_clean();
        $menu_template = $this->PMDR->getNew('Template',$this->template);
        $menu_template->set('items', $menu_items);
        return $menu_template->render();
    }
}
?>