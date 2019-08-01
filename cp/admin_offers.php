<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');

      

$PMDR->get('Authentication')->authenticate();



$PMDR->loadLanguage(array('admin_offers','admin_listings'));



$PMDR->get('Authentication')->checkPermission('admin_listings_view');



$PMDR->loadJavascript('<script type="text/javascript" src="'.BASE_URL.'/includes/jquery/fancybox/jquery.fancybox.js"></script>',15);

$PMDR->loadCSS('<link rel="stylesheet" type="text/css" href="'.BASE_URL.'/includes/jquery/fancybox/jquery.fancybox.css" media="screen" />',15);

$PMDR->loadJavascript('<script type="text/javascript">$(document).ready(function() {$("a.image_group").fancybox({"hideOnContentClick": false});});</script>',20);



$listing = $PMDR->get('Listings')->getRow($_GET['listing_id']);



if($_GET['action'] == 'delete') {

    $PMDR->get('Authentication')->checkPermission('admin_listings_delete');

    $PMDR->get('Offers')->delete($_GET['id']);

    $PMDR->addMessage('success',$PMDR->getLanguage('messages_deleted',array($_GET['id'],$PMDR->getLanguage('admin_offers'))),'delete');

    redirect($_SERVER['PHP_SELF'],array('listing_id'=>$_GET['listing_id']));

} 



$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_content_page.tpl');



if(!isset($_GET['action'])) {

    $template_content->set('title',$PMDR->getLanguage('admin_offers'));

    $table_list = $PMDR->get('TableList',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_table_list.tpl');

    $table_list->addColumn('id',$PMDR->getLanguage('admin_offers_id'));

    $table_list->addColumn('product_image',$PMDR->getLanguage('admin_offers_image'));

    $table_list->addColumn('listing_id',$PMDR->getLanguage('admin_offers_listing_id')); 

    $table_list->addColumn('title',$PMDR->getLanguage('admin_offers_title'));

    $table_list->addColumn('description',$PMDR->getLanguage('admin_offers_description'));

    $table_list->addColumn('price',$PMDR->getLanguage('admin_offers_price'));

    $table_list->addColumn('manage',$PMDR->getLanguage('admin_manage'));

    $paging = $PMDR->get('PagedResults');

    $records = $db->GetAll("SELECT SQL_CALC_FOUND_ROWS o.*, GROUP_CONCAT(oi.id,'.',oi.extension SEPARATOR ',') AS images FROM ".T_OFFERS." o LEFT JOIN ".T_OFFERS_IMAGES." oi ON o.id=oi.offer_id WHERE listing_id=? GROUP BY o.id ORDER BY date DESC LIMIT ?,?",array($listing['id'],$paging->limit1,$paging->limit2)); 

    $paging->setTotalResults($db->FoundRows());

    foreach($records as $key=>$record) {

        $images = explode(',',$record['images']);

        foreach($images as $image_key=>$image) {

            $records[$key]['product_image'] .= '<a href="'.BASE_URL.OFFERS_PATH.$record['id'].'-'.$image.'" class="image_group"'.($image_key == 0 ? '' : 'style="display: none"').'" title="'.$record['title'].'" rel="image_group'.$record['id'].'"><img border="0" src="'.BASE_URL.OFFERS_THUMBNAILS_PATH.$record['id'].'-'.$image.'"></a>';    

        }

        $records[$key]['price'] = format_number_currency($record['price']);

        $records[$key]['manage'] = '<a href="'.$_SERVER['PHP_SELF'].'?action=edit&listing_id='.$record['listing_id'].'&id='.$record['id'].'"><img border="0" src="'.BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN.'/images/icon_edit.gif" alt="'.$PMDR->getLanguage('admin_edit').'" title="'.$PMDR->getLanguage('admin_edit').'"></a>&nbsp;&nbsp;';

        $records[$key]['manage'] .= '<a href="'.$_SERVER['PHP_SELF'].'?action=delete&listing_id='.$record['listing_id'].'&id='.$record['id'].'" onClick="return confirm(\''. $PMDR->getLanguage('messages_confirm').'\');"><img border="0" src="'.BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN.'/images/icon_delete.gif" alt="'.$PMDR->getLanguage('admin_delete').'" title="'.$PMDR->getLanguage('admin_delete').'"></a>&nbsp;&nbsp;';

    }

    $table_list->addRecords($records);

    $table_list->addPaging($paging);

    $template_content->set('content',$table_list->render());      

} else {

    $PMDR->get('Authentication')->checkPermission('admin_listings_edit');

    $form = $PMDR->get('Form');

    $form->enctype = 'multipart/form-data';

    $form->addFieldSet('product_details',array('legend'=>$PMDR->getLanguage('admin_offers_offer')));

    $form->addField('title','text',array('label'=>$PMDR->getLanguage('admin_offers_title'),'fieldset'=>'product_details'));

    $form->addField('description','textarea',array('label'=>$PMDR->getLanguage('admin_offers_description'),'fieldset'=>'product_details'));

    $form->addField('price','text',array('label'=>$PMDR->getLanguage('admin_offers_price'),'fieldset'=>'product_details','value'=>'0.00'));

    $form->addField('expire_date','date',array('label'=>$PMDR->getLanguage('admin_offers_expire_date'),'fieldset'=>'product_details'));

    $form->addField('www','text',array('label'=>$PMDR->getLanguage('admin_offers_view_link'),'fieldset'=>'product_details'));

    $form->addField('buttoncode','text',array('label'=>$PMDR->getLanguage('admin_offers_purchase_link'),'fieldset'=>'product_details'));

    for($x = 1; $x <= 5; $x++) {

        $form->addField('offer_image'.$x,'file',array('label'=>$PMDR->getLanguage('admin_offers_image').' '.$x,'fieldset'=>'product_details'));

        $form->addValidator('offer_image'.$x,new Validate_Image($PMDR->getConfig('offer_image_width'),$PMDR->getConfig('offer_image_height'),$PMDR->getConfig('offer_image_size'),explode(',',$PMDR->getConfig('offers_images_formats'))));       

    }

    $form->addField('submit','submit',array('label'=>$PMDR->getLanguage('admin_submit'),'fieldset'=>'submit'));

    $form->addValidator('title',new Validate_NonEmpty());

    $form->addValidator('price',new Validate_Price());

    $form->addValidator('expire_date',new Validate_Date());



    $form->addField('listing_id','hidden',array('label'=>$PMDR->getLanguage('admin_offers_listing_id'),'fieldset'=>'product_details','value'=>$_GET['listing_id']));



    if($_GET['action'] == 'edit') {

        $template_content->set('title',$PMDR->getLanguage('admin_offers_edit'));

        $edit_offer = $PMDR->get('Offers')->getRow($_GET['id']);

        $form->loadValues($edit_offer);

        $current_images = $db->GetAll("SELECT * FROM ".T_OFFERS_IMAGES." WHERE offer_id=?",array($_GET['id']));

        if(count($current_images)) {

            foreach($current_images as $image) {

                $current_images_ids[$image['id']] = $PMDR->getLanguage('admin_offers_delete_image');

                $current_images_array[] = '<a href="'.BASE_URL.OFFERS_PATH.$edit_offer['id'].'-'.$image['id'].'.'.$image['extension'].'" class="image_group" title="" rel="image_group"><img border="0" src="'.BASE_URL.OFFERS_THUMBNAILS_PATH.$edit_offer['id'].'-'.$image['id'].'.'.$image['extension'].'"></a><br /><br />';

            }

            $form->addField('delete_images','checkbox',array('label'=>$PMDR->getLanguage('admin_offers_current_images'),'fieldset'=>'product_details','options'=>$current_images_ids,'html'=>$current_images_array));

        }

    } else {

        $template_content->set('title',$PMDR->getLanguage('admin_offers_add'));

    }

    

    if($form->wasSubmitted('submit')) {

        $data = $form->loadValues();

        

        $offers_count = $db->GetOne("SELECT COUNT(*) AS count FROM ".T_OFFERS." WHERE listing_id=?",array($_GET['listing_id']));



        if($offers_count >= $listing['offers_limit'] AND $_GET['action'] != 'edit') {

            $form->addError($PMDR->getLanguage('admin_offers_limit_exceeded'));

        }                  

        if(!$form->validate()) {

            $PMDR->addMessage('error',$form->parseErrorsForTemplate());

        } else {

            if($_GET['action']=='add') {

                $PMDR->get('Offers')->insert($data);

                $PMDR->addMessage('success',$PMDR->getLanguage('messages_inserted',array($data['title'],$PMDR->getLanguage('admin_offers'))),'insert');

                redirect($_SERVER['PHP_SELF'],array('listing_id'=>$_GET['listing_id']));

            } elseif($_GET['action'] == 'edit') {

                $PMDR->get('Offers')->update($data,$_GET['id']);

                $PMDR->addMessage('success',$PMDR->getLanguage('messages_updated',array($data['title'],$PMDR->getLanguage('admin_offers'))),'update');

                redirect($_SERVER['PHP_SELF'],array('listing_id'=>$_GET['listing_id']));

            }

        }    

    }

    $template_content->set('content',$form->toHTML());  

}



$template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_listings_view_menu.tpl'); 

include(PMDROOT_ADMIN.'/includes/template_setup.php');

?>