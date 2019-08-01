<?php
define('PMD_SECTION', 'public');

include('../defaults.php');

$PMDR->loadLanguage(array('admin_general'));

if (stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")) { 
    header("Content-type: application/xhtml+xml; charset=".CHARSET); 
} else { 
    header("Content-type: text/xml; charset=".CHARSET); 
}

echo '<?xml version="1.0" encoding="'.CHARSET.'"?>';

switch($_GET['type']) {
    case 'location_tree_grid':
    case 'category_tree_grid':
        if($_GET['type'] == 'category_tree_grid') {
            $tree_pointer = $PMDR->get('Categories');
            $admin_file = 'admin_categories.php';    
        } elseif($_GET['type'] == 'location_tree_grid') {
            $tree_pointer = $PMDR->get('Locations');
            $admin_file = 'admin_locations.php';
        }
        if(!isset($_GET['id'])) $_GET['id'] = 0;
        echo '<rows parent="'.$_GET['id'].'">';
        $categories = $tree_pointer->getChildren(($_GET['id']) ? $_GET['id'] : 1);
        foreach($categories as $category) {
            $child = ($tree_pointer->isLeaf($category)) ? '' : 1;
            echo '<row id="'.$category['id'].'" xmlkids="'.$child.'">';
            echo '<cell>'.$category['id'].'</cell>';
            echo '<cell><![CDATA['.$category['title'].']]></cell>';
            echo '<cell><![CDATA['.$category['description_short'].']]></cell>';
            echo '<cell><![CDATA['.$category['description'].']]></cell>';
            echo '<cell><![CDATA['.$category['keywords'].']]></cell>';
            echo '<cell><![CDATA['.$category['meta_description'].']]></cell>';
            echo '<cell><![CDATA['.$category['meta_keywords'].']]></cell>';
            echo '<cell>'.$category['hidden'].'</cell>';
            echo '<cell><![CDATA['.$category['link'].']]></cell>';
            echo '<cell>'.$category['hits'].'</cell>';
            echo '<cell><![CDATA[<a href="'.BASE_URL.ADMIN_FOLDER.'/'.$admin_file.'?action=edit&amp;id='.$category['id'].'"><img border="0" src="'.BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN.'images/icon_edit.gif" title="'.$PMDR->getLanguage('admin_edit').'" /></a>&nbsp;&nbsp;&nbsp;<a href="'.BASE_URL.ADMIN_FOLDER.'/'.$admin_file.'?action=delete&amp;id='.$category['id'].'" onClick="return confirm(\''.$PMDR->getLanguage('messages_confirm').'\');"><img border="0" src="'.BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN.'images/icon_delete.gif" alt="'.$PMDR->getLanguage('admin_delete').'" title="'.$PMDR->getLanguage('admin_delete').'" /></a>]]></cell>';
            echo '</row>'; 
        }
        echo '</rows>';
        break;
    case 'category_tree':
    case 'location_tree':
        if($_GET['type'] == 'category_tree') {
            $tree_pointer = $PMDR->get('Categories');    
        } elseif($_GET['type'] == 'location_tree') {
            $tree_pointer = $PMDR->get('Locations');
        }
        if(!$xml = $PMDR->get('Cache')->get($_GET['type'].$_GET['bypass_setup'].$_GET['load_full'].$_GET['hidden'].$_GET['id'])) {
            $previous_level = 0;
            $root_id = isset($_GET['id']) ? $_GET['id'] : 1;
            $tree_id = ($root_id == 1) ? 0 : $root_id;
            $xml = '<tree id="'.$tree_id.'">';
            $categories = ($_GET['load_full'] == 'true') ? $tree_pointer->getTree(($_GET['hidden'] ? array('hidden'=>'0') : array())) : $tree_pointer->getChildren($root_id,1,(isset($_GET['hidden']) ? "AND hidden=0" : ''));
            $closing_tags = array();
            
            foreach($categories as $category) {
                $child = ($tree_pointer->isLeaf($category)) ? 0 : 1;
                foreach($closing_tags as $level=>$tag) {
                    if($level >= $category['level']) {
                        $xml .= array_pop($closing_tags);           
                    }
                }
                $closing_tags[$category['level']] = '</item>';
                $xml .= "<item id='".$category['id']."' child='$child'";
                if($PMDR->getConfig('category_setup') == 0 AND $child == 1 AND $_GET['bypass_setup'] != 'true') $xml .= " nocheckbox='1'";
                $xml .= ">";
                $xml .= "<itemtext><![CDATA[".$PMDR->get('Cleaner')->clean_form_output($category['title'])."]]></itemtext>";   
            }
            foreach($closing_tags as $tag) {
                $xml .= $tag;
            } 
            $xml .= '</tree>';
            $PMDR->get('Cache')->write($_GET['type'].$_GET['bypass_setup'].$_GET['load_full'].$_GET['hidden'].$_GET['id'],$xml);
        }
        echo $xml;
        break;
    case 'products_tree':
        if(isset($_GET['product_type'])) {
            $products = $PMDR->get('Products')->getProductsArray($_GET['product_type'],((isset($_GET['hidden']) AND $_GET['hidden'] == true) ? true : false));    
        } else {
            $products = $PMDR->get('Products')->getProductsArray(null,((isset($_GET['hidden']) AND $_GET['hidden'] == true) ? true : false));
        }
        $xml = '<tree id="0">';
        foreach($products as $group_id=>$group) {
            $xml .= '<item id="group_'.$group_id.'" child="1" nocheckbox="1">';
            $xml .= '<itemtext><![CDATA['.$group['name'].']]></itemtext>';
            foreach($group['products'] as $product) {
                $xml .= '<item id="product_'.$product['product_id'].'" child="1" nocheckbox="1">';
                $xml .= '<itemtext><![CDATA['.$product['name'].']]></itemtext>';
                foreach($product['pricing'] as $key=>$price) {
                    $xml .= '<item id="'.$price['id'].'">';
                    $xml .= '<itemtext><![CDATA['.$price['period_count'].' '.$price['period'].' - Setup: '.$PMDR->getLanguage('currencysymbol').$price['setup_price'].']]></itemtext>';
                    $xml .= '</item>';
                }
                $xml .= '</item>';
            }
            $xml .= '</item>';   
        }
        $xml .= '</tree>';
        echo $xml;
        break;
    case 'users_window_grid':
        if(isset($_GET['id'])) {
            echo $db->GetOne("SELECT login FROM ".T_USERS." WHERE id=?",array($_GET['id']));
        } else {
            $users = $db->GetAssoc("SELECT SQL_CALC_FOUND_ROWS id, login, user_email FROM ".T_USERS." ORDER BY login ASC LIMIT ?,?",array(intval($_GET['posStart']),intval($_GET['count'])));
            $xml = '<rows total_count="'.$db->FoundRows().'" pos="'.$_GET['posStart'].'">';
            foreach($users as $id=>$user) {
                $xml .= '<row id="'.$id.'">';
                foreach($user AS $value) {
                    $xml .= '<cell>'.$value.'</cell>';    
                }
                $xml .= '</row>';       
            }
            $xml .= '</rows>';
            echo $xml;
        }
        break;
    case 'combo_users':
        if(isset($_GET['mask'])) {
            $users = $db->GetAll("SELECT * FROM ".T_USERS." WHERE login LIKE '".$_GET['mask']."%'");
            $xml = '<complete>';
            foreach($users as $user) {
                $xml .= '<option value="'.$user['id'].'">'.$user['login'].'</option>';   
            }
            $xml .= '</complete>';
            echo $xml;
        }
        break;
    case 'combo_listings':
        if(isset($_GET['mask'])) {
            $listings = $db->GetAll("SELECT id, title FROM ".T_LISTINGS." WHERE title LIKE '".$_GET['mask']."%'");
            $xml = '<complete>';
            foreach($listings as $listing) {
                $xml .= '<option value="'.$listing['id'].'">'.$listing['title'].'</option>';   
            }
            $xml .= '</complete>';
            echo $xml;
        }
        break;
}
?>