<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');



$PMDR->loadLanguage(array('email_templates','admin_listings','general_locations','admin_users'));



$PMDR->get('Authentication')->authenticate();



$PMDR->get('Authentication')->checkPermission('admin_listings_view');



if($_GET['action'] == 'delete') {

    $PMDR->get('Authentication')->checkPermission('admin_listings_delete');

    $PMDR->get('Listings')->delete($_GET['id']);

    $PMDR->addMessage('success',$PMDR->getLanguage('messages_deleted',array($_GET['id'],$PMDR->getLanguage('admin_listings'))),'delete');

    redirect();

}



if($_GET['action'] == 'copy') {

    $order = $db->GetRow("SELECT user_id, pricing_id FROM ".T_ORDERS." WHERE type='listing_membership' AND type_id=?",array($_GET['id']));

    $listing = $db->GetRow("SELECT id, primary_category_id FROM ".T_LISTINGS." WHERE id=?",array($_GET['id']));

    redirect('admin_orders_add_listing.php?pricing_id='.$order['pricing_id'].'&user_id='.$order['user_id'].'&create_invoice=0&primary_category_id='.$listing['primary_category_id'].'&copy='.$listing['id']);

}



$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'admin_listings.tpl');



if(!empty($_GET['id'])) {

    if($listing = $db->GetRow("SELECT * FROM ".T_LISTINGS." WHERE id=?",array($_GET['id']))) {

        $template_content->set('listing_header',$PMDR->get('Listing',$listing['id'])->getAdminHeader('edit'));

        $template_content->set('users_summary_header',$PMDR->get('User',$listing['user_id'])->getAdminSummaryHeader('orders'));

    } else {

        redirect();

    }

}



if(!isset($_GET['action'])) {

    $template_content->set('title',$PMDR->getLanguage('admin_listings'));

    $table_list = $PMDR->get('TableList');

    $table_list->addColumn('id',$PMDR->getLanguage('admin_listings_id'),true);

    $table_list->addColumn('user_id',$PMDR->getLanguage('admin_listings_user_id'),true,true);

    $table_list->addColumn('order_id',$PMDR->getLanguage('admin_listings_order_id'));

    $table_list->addColumn('title',$PMDR->getLanguage('admin_listings_title'),true);

    $table_list->addColumn('product',$PMDR->getLanguage('admin_listings_product'));

    $table_list->addColumn('status',$PMDR->getLanguage('admin_listings_status'),true);

    $table_list->addColumn('manage',$PMDR->getLanguage('admin_manage'));



    $search = $PMDR->get('Search','ListingFullText');

    $search->categorySearchChildren = true;

    $search->locationSearchChildren = true;

    $search->count_separate = true;

    $search->joinUser = true;

    $search->joinUserFields = array('user_first_name','user_last_name','login');

    $search->searchListingFields = array('l.title','l.keywords');

    $search->user_id = $_GET['user_id'];

    $search->listing_id = $_GET['listing_id'];

    $search->location_id = trim(($_GET['location'] != 1) ? $_GET['location'] : '',',');

    $search->category = trim(($_GET['category'] != 1) ? $_GET['category'] : '',',');

    $search->keywords = $_GET['keywords'];

    $search->zip = $_GET['zip'];

    $search->zipMiles = $_GET['zip_miles'];

    $search->email = $_GET['email'];

    $search->sortBy = array('l.title'=>'ASC');



    if($_GET['sort'] != '' AND $_GET['sort_direction'] != '') {

        $search->sortBy = array($_GET['sort']=>$_GET['sort_direction']);

    }

    if($_GET['title'] != '') {

        $search->addAdditionalField('l.title',$_GET['title'],0,"{search_field1}='{search_value1}'");

    }

    if($_GET['www'] != '') {

        $search->addAdditionalField('www',$_GET['www']);

    }

    if($_GET['phone'] != '') {

        $search->addAdditionalField('phone',$_GET['phone']);

    }

    if($_GET['coordinates'] == 'no') {

        $search->addAdditionalField('latitude','0.0000000000');

    }

    $search->listing_status = $_GET['status'];



    $search_fields = $db->GetAll("SELECT * FROM ".T_FIELDS." WHERE search=1 ORDER BY ordering ASC");

    foreach((array) $search_fields as $field) {

        $search->addAdditionalField('custom_'.$field['id'],(isset($_GET['custom_'.$field['id']]) ? $_GET['custom_'.$field['id']] : $_GET['keyword']),(isset($_GET['custom_'.$field['id']]) ? 1 : 0));

    }



    $paging = $PMDR->get('Paging');

    $records = $search->getResults($paging->limit1,$paging->limit2);

    $paging->setTotalResults($search->resultsCount);

    foreach($records as $key=>$record) {

        $records[$key]['product'] = $db->GetOne("SELECT p.name FROM ".T_ORDERS." o INNER JOIN ".T_PRODUCTS_PRICING." pp ON o.pricing_id=pp.id INNER JOIN ".T_PRODUCTS." p ON pp.product_id=p.id WHERE o.type_id=? AND o.type='listing_membership'",array($record['id']));

        $records[$key]['title'] = $record['title'].' (<a href="'.$PMDR->get('Listings')->getURL($record['id'],$record['friendly_url']).'" target="_blank">View Public Listing</a>)';

        $records[$key]['status'] = $PMDR->getLanguage($record['status']);

        $records[$key]['order_id'] = $db->GetOne("SELECT id FROM ".T_ORDERS." WHERE type=? AND type_id=?",array('listing_membership',$record['id']));

        $records[$key]['order_id'] = '<a href="'.BASE_URL_ADMIN.'/admin_orders.php?action=edit&id='.$records[$key]['order_id'].'">'.$records[$key]['order_id'].'</a>';

        $records[$key]['user_id'] = '<a href="'.BASE_URL_ADMIN.'/admin_users_summary.php?id='.$record['user_id'].'">';

        $records[$key]['user_id'] .= trim($record['user_first_name'].' '.$record['user_last_name']) != '' ? trim($record['user_first_name'].' '.$record['user_last_name']) : $record['login'];

        $records[$key]['user_id'] .= '</a> (ID: '.$record['user_id'].')';

        $records[$key]['manage'] = $PMDR->get('HTML')->icon('edit',array('href'=>URL_NOQUERY.'?action=edit&id='.$record['id'].'&user_id='.$record['user_id'].'&from='.urlencode_url(URL)));

        if($record['images_limit']) $records[$key]['manage'] .= $PMDR->get('HTML')->icon('image',array('label'=>$PMDR->getLanguage('admin_listings_images'),'href'=>'admin_images.php?listing_id='.$record['id']));

        if($record['documents_limit']) $records[$key]['manage'] .= $PMDR->get('HTML')->icon('doc',array('label'=>$PMDR->getLanguage('admin_listings_documents'),'href'=>'admin_documents.php?listing_id='.$record['id']));

        if($record['classifieds_limit']) $records[$key]['manage'] .= $PMDR->get('HTML')->icon('package',array('label'=>$PMDR->getLanguage('admin_listings_classifieds'),'href'=>'admin_classifieds.php?listing_id='.$record['id']));

        foreach($record as $record_key=>$value) {

            if(strstr($record_key,'banner_limit_')) {

                if($value > 0) {

                    $records[$key]['manage'] .= $PMDR->get('HTML')->icon('box',array('label'=>$PMDR->getLanguage('admin_listings_banners'),'href'=>'admin_banners.php?listing_id='.$record['id']));

                    break;

                }

            }

        }

        $records[$key]['manage'] .= $PMDR->get('HTML')->icon('star',array('label'=>$PMDR->getLanguage('admin_listings_ratings'),'href'=>'admin_ratings.php?listing_id='.$record['id']));

        $records[$key]['manage'] .= $PMDR->get('HTML')->icon('review',array('label'=>$PMDR->getLanguage('admin_listings_reviews'),'href'=>'admin_reviews.php?listing_id='.$record['id']));

        $records[$key]['manage'] .= $PMDR->get('HTML')->icon('statistics',array('label'=>$PMDR->getLanguage('admin_listings_statistics'),'href'=>'admin_listings_statistics.php?listing_id='.$record['id']));

        $records[$key]['manage'] .= $PMDR->get('HTML')->icon('merge',array('label'=>'Copy','href'=>'admin_listings.php?action=copy&id='.$record['id']));

        $records[$key]['manage'] .= $PMDR->get('HTML')->icon('delete',array('id'=>$record['id']));

    }

    $table_list->addRecords($records);

    $table_list->addPaging($paging);

    $template_content->set('content',$table_list->render());

    $template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_listings_menu.tpl');

} else {

    $PMDR->get('Authentication')->checkPermission('admin_listings_edit');

    $category_count = $db->GetOne("SELECT COUNT(*) FROM ".T_CATEGORIES) - 1;

    $location_count = $db->GetOne("SELECT COUNT(*) FROM ".T_LOCATIONS) - 1;

    $listing['categories'] = $db->GetCol("SELECT cat_id FROM ".T_LISTINGS_CATEGORIES." WHERE list_id=? AND cat_id!=?",array($listing['id'],$listing['primary_category_id']));



    $form = $PMDR->getNew('Form');

    $form->enctype = 'multipart/form-data';

    $form->addFieldSet('listing',array('legend'=>$PMDR->getLanguage('admin_listings_listing')));

    $form->addField('date','datetime',array('label'=>'Date','fieldset'=>'listing','value'=>$PMDR->get('Dates')->dateTimeNow()));

    $form->addField('title','text',array('label'=>$PMDR->getLanguage('admin_listings_title'),'fieldset'=>'listing','counter'=>$listing['title_size']));

    $form->addField('friendly_url','text',array('label'=>$PMDR->getLanguage('admin_listings_friendly_url'),'fieldset'=>'listing'));

    $form->addJavascript('title','onblur','$.ajax({data:({action:\'rewrite\',text:$(this).val()}),success:function(text_rewrite){if($(\'#friendly_url\').val()==\'\'){$(\'#friendly_url\').val(text_rewrite);}}});');

    $form->addValidator('friendly_url',new Validate_Friendly_URL());



    if($category_count > 1) {

        if($PMDR->getConfig('category_select_type') == 'tree_select') {

            $form->addField('primary_category_id','tree_select',array('label'=>$PMDR->getLanguage('admin_listings_primary_category'),'fieldset'=>'listing','options'=>$db->GetAssoc("SELECT id, title, level FROM ".T_CATEGORIES." WHERE ID != 1 ORDER BY left_")));

        } elseif($PMDR->getConfig('category_select_type') == 'tree_select_cascading') {

            $form->addField('primary_category_id','tree_select_cascading',array('label'=>$PMDR->getLanguage('admin_listings_primary_category'),'fieldset'=>'listing','value'=>'','options'=>array('type'=>'category_tree','bypass_setup'=>true)));

        } else {

            $form->addField('primary_category_id','tree_select_expanding_radio',array('label'=>$PMDR->getLanguage('admin_listings_primary_category'),'fieldset'=>'listing','value'=>'','options'=>array('type'=>'category_tree','bypass_setup'=>true)));

        }

        $form->addValidator('primary_category_id',new Validate_NonEmpty());



        if($listing['category_limit'] > 1) {

            if($PMDR->getConfig('category_select_type') == 'tree_select' OR $PMDR->getConfig('category_select_type') == 'tree_select_multiple') {

                if($listing['category_limit'] == 2) {

                    $form->addField('categories','tree_select',array('label'=>$PMDR->getLanguage('admin_listings_categories'),'fieldset'=>'listing','first_option'=>'','options'=>$db->GetAssoc("SELECT id, title, level FROM ".T_CATEGORIES." WHERE ID != 1 ORDER BY left_")));

                } else {

                    $form->addField('categories','tree_select_multiple',array('label'=>$PMDR->getLanguage('admin_listings_categories'),'fieldset'=>'listing','limit'=>$listing['category_limit'],'options'=>$db->GetAssoc("SELECT id, title, level FROM ".T_CATEGORIES." WHERE ID != 1 ORDER BY left_")));

                }

            } elseif($PMDR->getConfig('category_select_type') == 'tree_select_cascading' OR $PMDR->getConfig('category_select_type') == 'tree_select_cascading_multiple') {

                if($listing['category_limit'] == 2) {

                    $form->addField('categories','tree_select_cascading',array('label'=>$PMDR->getLanguage('admin_listings_categories'),'fieldset'=>'listing','options'=>array('type'=>'category_tree','limit'=>$listing['category_limit'])));

                } else {

                    $form->addField('categories','tree_select_cascading_multiple',array('label'=>$PMDR->getLanguage('admin_listings_categories'),'fieldset'=>'listing','options'=>array('type'=>'category_tree','limit'=>$listing['category_limit'])));

                }

            } else {

                if($listing['category_limit'] == 2) {

                    $form->addField('categories','tree_select_expanding_radio',array('label'=>$PMDR->getLanguage('admin_listings_categories'),'fieldset'=>'listing','value'=>'','options'=>array('type'=>'category_tree')));

                } else {

                    $form->addField('categories','tree_select_expanding_checkbox',array('label'=>$PMDR->getLanguage('admin_listings_categories'),'fieldset'=>'listing','value'=>'','limit'=>$listing['category_limit'],'options'=>array('type'=>'category_tree')));

                }

            }

        }

    } else {

        $form->addField('primary_category_id','hidden',array('label'=>$PMDR->getLanguage('admin_listings_categories'),'fieldset'=>'listing','value'=>$primary_category_id = $db->GetOne("SELECT id FROM ".T_CATEGORIES." WHERE id!=1")));

    }





    if($listing['short_description_size']) {

        $form->addField('description_short','textarea',array('label'=>$PMDR->getLanguage('admin_listings_short_description'),'fieldset'=>'listing','counter'=>$listing['short_description_size']));

    }

    if($listing['description_size']) {

        if($listing['html_editor_allow']) {

            $form->addField('description','htmleditor',array('label'=>$PMDR->getLanguage('admin_listings_description'),'fieldset'=>'listing','counter'=>$listing['description_size']));

        } else {

            $form->addField('description','textarea',array('label'=>$PMDR->getLanguage('admin_listings_description'),'fieldset'=>'listing','counter'=>$listing['description_size']));

        }

        $form->addValidator('description', new Validate_Length($listing['description_size']));

    }



    if($listing['keywords_limit']) {

        $form->addField('keywords','textarea',array('label'=>$PMDR->getLanguage('admin_listings_keywords'),'fieldset'=>'listing'));

        $form->addValidator('keywords',new Validate_Word_Count($listing['keywords_limit']));

        $form->addFieldNote('keywords',$PMDR->getLanguage('admin_listings_limit').': '.$listing['keywords_limit']);

    }

    if($listing['meta_title_size']) {

        $form->addField('meta_title','text',array('label'=>$PMDR->getLanguage('admin_listings_meta_title'),'fieldset'=>'listing','counter'=>$listing['meta_title_size']));

    }

    if($listing['meta_description_size']) {

        $form->addField('meta_description','textarea',array('label'=>$PMDR->getLanguage('admin_listings_meta_description'),'fieldset'=>'listing','counter'=>$listing['meta_description_size']));

    }

    if($listing['meta_keywords_limit']) {

        $form->addField('meta_keywords','textarea',array('label'=>$PMDR->getLanguage('admin_listings_meta_keywords'),'fieldset'=>'listing'));

        $form->addValidator('meta_keywords',new Validate_Word_Count($listing['meta_keywords_limit']));

        $form->addFieldNote('meta_keywords',$PMDR->getLanguage('admin_listings_limit').': '.$listing['meta_keywords_limit']);

    }



    if($listing['phone_allow']) {

        $form->addField('phone','text',array('label'=>$PMDR->getLanguage('admin_listings_phone'),'fieldset'=>'listing'));

    }



    if($listing['fax_allow']) {

        $form->addField('fax','text',array('label'=>$PMDR->getLanguage('admin_listings_fax'),'fieldset'=>'listing'));

    }



    if($listing['address_allow']) {

        $form->addField('listing_address1','text',array('label'=>$PMDR->getLanguage('admin_listings_address1'),'fieldset'=>'listing'));

        $form->addField('listing_address2','text',array('label'=>$PMDR->getLanguage('admin_listings_address2'),'fieldset'=>'listing'));

    }



    if($location_count > 1) {

        if($PMDR->getConfig('location_select_type') == 'tree_select' OR $PMDR->getConfig('location_select_type') == 'tree_select_group') {

            $form->addField('location_id',$PMDR->getConfig('location_select_type'),array('label'=>$PMDR->getLanguage('admin_listings_location'),'fieldset'=>'listing','options'=>$db->GetAssoc("SELECT id, title, level, left_, right_ FROM ".T_LOCATIONS." WHERE ID != 1 ORDER BY left_")));

        } else {

            $form->addField('location_id',$PMDR->getConfig('location_select_type'),array('label'=>$PMDR->getLanguage('admin_listings_location'),'fieldset'=>'listing','options'=>array('type'=>'location_tree')));

        }

        $form->addValidator('location_id',new Validate_NonEmpty());

    } else {

        $form->addField('location_id','hidden',array('label'=>$PMDR->getLanguage('admin_listings_location'),'fieldset'=>'listing','value'=>$db->GetOne("SELECT id FROM ".T_LOCATIONS." WHERE id!=1")));

    }



    if($PMDR->getConfig('location_text_1')) {

        $form->addField('location_text_1','text',array('label'=>$PMDR->getLanguage('general_locations_text_1'),'fieldset'=>'listing'));

    }

    if($PMDR->getConfig('location_text_2')) {

        $form->addField('location_text_2','text',array('label'=>$PMDR->getLanguage('general_locations_text_2'),'fieldset'=>'listing'));

    }

    if($PMDR->getConfig('location_text_3')) {

        $form->addField('location_text_3','text',array('label'=>$PMDR->getLanguage('general_locations_text_3'),'fieldset'=>'listing'));

    }

    if($listing['zip_allow']) {

        $form->addField('listing_zip','text',array('label'=>$PMDR->getLanguage('admin_listings_zip_code'),'fieldset'=>'listing'));

    }

    if($listing['hours_allow']) {

        $form->addField('hours','hours');

    }

    $form->addField('latitude','text',array('label'=>$PMDR->getLanguage('admin_listings_latitude'),'fieldset'=>'listing'));

    $form->addField('longitude','text',array('label'=>$PMDR->getLanguage('admin_listings_longitude'),'fieldset'=>'listing'));

    $form->addPicker('longitude','coordinates',null,array('label'=>$PMDR->getLanguage('admin_listings_select_coordinates')));

    $form->addField('recalculate_coordinates','checkbox',array('label'=>$PMDR->getLanguage('admin_listings_recalculate_coordinates'),'help'=>$PMDR->getLanguage('admin_listings_recalculate_coordinates_help'),'fieldset'=>'listing'));



    if($listing['www_allow']) {

        $form->addField('www','text',array('label'=>$PMDR->getLanguage('admin_listings_website'),'fieldset'=>'listing'));

        $form->addValidator('www',new Validate_URL(false));

        $form->addPicker('www','link_out');

        $form->addFieldNote('www','Example: http://www.domain.com');

    }

    if($listing['email_allow']) {

        $form->addField('mail','text',array('label'=>$PMDR->getLanguage('admin_listings_email'),'fieldset'=>'listing'));

        $form->addValidator('mail',new Validate_Email(false));

    }



    $fields = $PMDR->get('Fields')->addToForm($form,'listings',array('fieldset'=>'listing','filter'=>$listing,'category'=>$listing['primary_category_id']));



    if($listing['logo_allow']) {

        $form->addField('logo','file',array('label'=>$PMDR->getLanguage('admin_listings_logo'),'fieldset'=>'listing'));

        $form->addValidator('logo',new Validate_Image($PMDR->getConfig('image_logo_width'),$PMDR->getConfig('image_logo_height'),$PMDR->getConfig('image_logo_size'),explode(',',$PMDR->getConfig('logos_formats'))));

        $form->addFieldNote('logo',$PMDR->getLanguage('file_size_limit_kb',$PMDR->getConfig('image_logo_size')));

        if($logo = get_file_url(LOGO_THUMB_PATH.$_GET['id'].'.*',true)) {

            $form->addField('preview','custom',array('label'=>$PMDR->getLanguage('admin_listings_logo_current'),'fieldset'=>'listing','html'=>'<img border="0" src="'.$logo.'">'));

            $form->addField('delete_logo','checkbox',array('label'=>$PMDR->getLanguage('admin_listings_logo_delete'),'fieldset'=>'listing','value'=>'0'));

        }

    }



    $form->addField('comment','textarea',array('label'=>$PMDR->getLanguage('admin_listings_comments'),'fieldset'=>'listing'));



    $form->addValidator('date',new Validate_DateTime(true));

    $form->addValidator('title',new Validate_NonEmpty());

    $form->addField('submit','submit',array('label'=>$PMDR->getLanguage('admin_submit'),'fieldset'=>'submit'));



    $template_content->set('title',$PMDR->getLanguage('admin_listings_edit'));



    $form->loadValues($listing);



    $template_content->set('content',$form->toHTML());



    if($form->wasSubmitted('submit')) {

        $data = $form->loadValues();

        if(!$PMDR->getConfig('mod_rewrite_listings_id')) {

            if($data['friendly_url'] != '') {

                if($db->GetOne("SELECT COUNT(*) FROM ".T_LISTINGS." WHERE friendly_url=? AND id!=?",array($data['friendly_url'],$listing['id']))) {

                    $form->addError('The friendly URL entered is already in use.','friendly_url');

                }

            } else {

                if($db->GetOne("SELECT COUNT(*) FROM ".T_LISTINGS." WHERE friendly_url=? AND id!=?",array($data['friendly_url'] = Strings::rewrite($data['title']),$listing['id']))) {

                    $form->addError('The title is currently in use by another listing.','title');

                }

            }

        } elseif($data['friendly_url'] == '') {

            $data['friendly_url'] = Strings::rewrite($data['title']);

        }

        if(!$form->validate()) {

            $PMDR->addMessage('error',$form->parseErrorsForTemplate());

        } else {

            if($data['recalculate_coordinates']) {

                $locations = $PMDR->get('Locations')->getPath($data['location_id']);

                foreach($locations as $loc_key=>$loc_value) {

                    $data['location_'.($loc_key+1)] = $loc_value['title'];

                }

                $map = $PMDR->get('Map');

                $map->lookupService = $PMDR->getConfig('geocoding_service');

                $map->apiKeyGeoCoding = $PMDR->getConfig($map->lookupService.'_apikey');

                $map_country = $PMDR->getConfig('map_country_static') != '' ? $PMDR->getConfig('map_country_static') : $data[$PMDR->getConfig('map_country')];

                $map_state = $PMDR->getConfig('map_state_static') != '' ? $PMDR->getConfig('map_state_static') :  $data[$PMDR->getConfig('map_state')];

                $map_city = $PMDR->getConfig('map_city_static') != '' ? $PMDR->getConfig('map_city_static') : $data[$PMDR->getConfig('map_city')];

                if($coordinates = $map->getGeocode($data['listing_address1'], $map_city, $map_state, $map_country, $data['listing_zip'])) {

                    if(abs($coordinates['lat']) > 0 AND abs($coordinates['lon']) > 0) {

                        $data['latitude'] = $coordinates['lat'];

                        $data['longitude'] = $coordinates['lon'];

                    }

                } else {

                    $PMDR->addMessage('notice',$PMDR->getLanguage('admin_listings_recalculate_coordinates_error'));

                }

            }

            $listing_id = $PMDR->get('Listings')->update($data, $_GET['id']);

            $PMDR->addMessage('success',$PMDR->getLanguage('messages_updated',array($data['title'],$PMDR->getLanguage('admin_listings'))),'update');

            if(!empty($_GET['user_id'])) {

                redirect('admin_orders.php',array('user_id'=>$_GET['user_id']));

            } else {

                redirect();

            }

        }

    }

    $_GET['listing_id'] = $_GET['id']; // we set this here to make links in menu compatible.

}



include(PMDROOT_ADMIN.'/includes/template_setup.php');

?>