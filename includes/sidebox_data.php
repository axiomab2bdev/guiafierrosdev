<?php
// CATEGORY LIST
$template_sidebox_category_list = null;
if($PMDR->getConfig('sidebox_categories_show')) {
    $template_sidebox_category_list = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_categories.tpl');
    if($location = $PMDR->get('active_location')) {
        $template_sidebox_category_list->cache_id = 'sidebox_categories_location_'.$location['id'];
    } else {
        $template_sidebox_category_list->cache_id = 'sidebox_categories';
    }
    $template_sidebox_category_list->expire = 900;
    if(!($template_sidebox_category_list->isCached())) {
        $categories_sidebox = $PMDR->get('Categories')->getRoots();
        foreach($categories_sidebox as $key=>$category) {
            if(($PMDR->getConfig('cat_empty_hidden') AND $category['count_total'] == 0) OR $category['hidden']) {
                unset($categories_sidebox[$key]);
                continue;
            }
            if($category['link'] != '') {
                $categories_sidebox[$key]['url'] = $category['link'];
            } elseif($location) {
                $categories_sidebox[$key]['url'] = $PMDR->get('Locations')->getURL($location['id'],$location['friendly_url_path'],$category['id'],$category['friendly_url_path']);
            } else {
                $categories_sidebox[$key]['url'] = $PMDR->get('Categories')->getURL($category['id'],$category['friendly_url_path']);
            }
        }
    }

    $template_sidebox_category_list->set('categories_sidebox',$categories_sidebox);

    unset($location,$categories_sidebox,$category);
}

// FEATURED
$template_sidebox_featured = null;
if($PMDR->getConfig('sidebox_featured_show'))  {
    $template_sidebox_featured = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_featured_listings.tpl');
    $template_sidebox_featured->cache_id = 'sidebox_featured_listings';
    $template_sidebox_featured->expire = 900;
    if(!$template_sidebox_featured->isCached()) {
        $sidebox_listings = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_listings.tpl');
        if(!($sidebox_listings->isCached())) {
            $results = $db->GetAll("SELECT
                                        id,
                                        description_short,
                                        short_description_size,
                                        title,
                                        friendly_url,
                                        date,
                                        listing_address1,
                                        listing_address2,
                                        listing_zip,
                                        location_id,
                                        location_text_1,
                                        location_text_2,
                                        location_text_3,
                                        phone,
                                        logo_extension,
                                        logo_allow,
                                        address_allow,
                                        www_screenshot_allow
                                    FROM ".T_LISTINGS."
                                    WHERE
                                        status = 'active'
                                        AND featured = 1
                                    ORDER BY featured_date ASC
                                    LIMIT 0, ".$PMDR->getConfig('sidebox_listing_number'));

            if(sizeof($results) > 0) {
                $update = array();
                foreach($results as $key=>$value) {
                    $update[] = $value['id'];
                    if($value['short_description_size']) {
                        $results[$key]['description_short'] = Strings::limit_words($value['description_short'], $PMDR->getConfig('sidebox_description_size'));
                    }

                    $locations = $PMDR->get('Locations')->getPath($value['location_id']);
                    foreach($locations as $loc_key=>$loc_value) {
                        $results[$key]['location_'.($loc_key+1)] = $loc_value['title'];
                    }
                    if($value['address_allow']) {
                        $map_country = $PMDR->getConfig('map_country_static') != '' ? $PMDR->getConfig('map_country_static') : $results[$key][$PMDR->getConfig('map_country')];
                        $map_state = $PMDR->getConfig('map_state_static') != '' ? $PMDR->getConfig('map_state_static') :  $results[$key][$PMDR->getConfig('map_state')];
                        $map_city = $PMDR->getConfig('map_city_static') != '' ? $PMDR->getConfig('map_city_static') : $results[$key][$PMDR->getConfig('map_city')];
                        $results[$key]['address'] = ($value['listing_address1'] != '' ? $value['listing_address1']."\n" : '').($value['listing_address2'] != '' ? $value['listing_address2']."\n" : '').($map_city != '' ? $map_city.', ' : '').($map_state != '' ? $map_state : '').' '.$value['listing_zip']."\n".$map_country;
                    }
                    $results[$key]['link'] = $PMDR->get('Listings')->getURL($value['id'],$value['friendly_url']);
                    $results[$key]['details'] = '';
                    if($value['logo_allow'] AND file_exists(LOGO_THUMB_PATH.$value['id'].'.'.$value['logo_extension'])) {
                        $results[$key]['logo_thumb_url'] = get_file_url_cdn(LOGO_THUMB_PATH.$value['id'].'.'.$value['logo_extension']);
                    } elseif(ADDON_WEBSITE_SCREENSHOTS AND $value['www_screenshot_allow'] AND file_exists(SCREENSHOTS_PATH.$value['id'].'.jpg')) {
                        $results[$key]['logo_thumb_url'] = get_file_url_cdn(SCREENSHOTS_PATH.$value['id'].'.jpg');
                    }
                }
                $db->Execute("UPDATE LOW_PRIORITY ".T_LISTINGS." SET featured_date=NOW() WHERE id IN(".implode(',',$update).")");
            }
        }
        $sidebox_listings->set('listings',$results);
        $template_sidebox_featured->set('content',$sidebox_listings);
        unset($sidebox_listings,$results,$map_country,$map_state,$map_city,$locations,$update);
    }
}

// FEATURED CLASSIFIED
$sidebox_featured_classified = null;
if($PMDR->getConfig('sidebox_featured_classifieds')) {
    $sidebox_featured_classified = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_classifieds.tpl');
    $sidebox_featured_classified->cache_id = 'sidebox_classifieds';
    $sidebox_featured_classified->expire = 900;
    if(!($sidebox_featured_classified->isCached())) {
        $featured_classifieds=$db->GetAll ("SELECT c.*, l.classifieds_images_allow FROM ".T_CLASSIFIEDS." c INNER JOIN ".T_LISTINGS." l ON c.listing_id=l.id WHERE l.status='active' AND (c.expire_date > NOW() OR c.expire_date = '0000-00-00')
                                   ORDER by RAND('".session_id()."')
                                   LIMIT 3");

        foreach($featured_classifieds as $key=>$classified) {
            if($classified['classifieds_images_allow']) {
                $featured_classifieds[$key]['thumb'] = get_file_url_cdn(CLASSIFIEDS_THUMBNAILS_PATH.$classified['id'].'-*');
            }
            $featured_classifieds[$key]['description'] = Strings::limit_words($classified['description'],$PMDR->getConfig('sidebox_description_size'));
            $featured_classifieds[$key]['link'] = $PMDR->get('Classifieds')->getURL($classified['id'],$classified['friendly_url']);
        }
    }

    $sidebox_featured_classified->set('featured_classifieds',$featured_classifieds);

    $template_sidebox_featured_classifieds = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox.tpl');
    $template_sidebox_featured_classifieds->set('title',$PMDR->getLanguage('sidebox_featured_classifieds'));
    $template_sidebox_featured_classifieds->set('content',$sidebox_featured_classified);
    unset($sidebox_featured_classified,$featured_classifieds,$classified);
}

// Blog
$template_sidebox_blog = null;
if($PMDR->getConfig('blog_sidebox_number') AND ADDON_BLOG) {
    $template_sidebox_blog = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_blog.tpl');
    $template_sidebox_blog->cache_id = 'sidebox_blog';
    $template_sidebox_blog->expire = 900;
    if(!($template_sidebox_blog->isCached())) {
        $blog_posts = $db->GetAll("SELECT * FROM ".T_BLOG." WHERE DATE(date_publish) <= CURDATE() AND status='active' ORDER BY date_publish DESC LIMIT ?",array(intval($PMDR->getConfig('blog_sidebox_number'))));
        foreach($blog_posts AS $key=>$blog_post) {
            if(!empty($blog_post['content_short'])) {
                $blog_posts[$key]['content'] = Strings::limit_words($blog_post['content_short'],$PMDR->getConfig('blog_sidebox_characters'));
            } elseif(strip_tags($blog_post['content']) != '') {
                $blog_posts[$key]['content'] = Strings::limit_words(strip_tags($blog_post['content']),$PMDR->getConfig('blog_sidebox_characters'));
            }
            $blog_posts[$key]['url'] = $PMDR->get('Blog')->getURL($blog_post['id'],$blog_post['friendly_url']);
        }
    }
    $template_sidebox_blog->set('blog_posts',$blog_posts);
    unset($blog_posts,$blog_post);
}

// Blog Categories
$template_sidebox_blog_categories = null;
if(intval($PMDR->getConfig('blog_sidebox_number')) > 0 AND ADDON_BLOG) {
    $template_sidebox_blog_categories = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_blog_categories.tpl');
    $template_sidebox_blog_categories->cache_id = 'sidebox_blog_categories';
    $template_sidebox_blog_categories->expire = 900;
    if(!($template_sidebox_blog_categories->isCached())) {
        $blog_categories = $db->GetAll("SELECT c.*, IFNULL(COUNT(bcl.blog_id),0) AS post_count FROM ".T_BLOG_CATEGORIES." c LEFT JOIN ".T_BLOG_CATEGORIES_LOOKUP." bcl ON c.id=bcl.category_id LEFT JOIN ".T_BLOG." b ON bcl.blog_id=b.id AND b.status='active' AND DATE(b.date_publish) <= CURDATE() GROUP BY c.id ORDER BY title ASC");
        foreach($blog_categories AS $key=>$blog_category) {
            $blog_categories[$key]['url'] = $PMDR->Get('Blog')->getCategoryURL($blog_category['id'],$blog_category['friendly_url']);
        }
    }
    $template_sidebox_blog_categories->set('blog_categories',$blog_categories);
    unset($blog_categories,$blog_category);
}

// LOGIN
$sidebox_login = null;
if($PMDR->getConfig('sidebox_login_show')) {
    $sidebox_login = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_login.tpl');
    $form = $PMDR->getNew('Form');
    $form->setName('login_sidebox');
    $form->action = BASE_URL_SSL.MEMBERS_FOLDER.'index.php?from='.urlencode_url(URL);
    $form->addField('user_login','text',array('label'=>$PMDR->getLanguage('sidebox_login_username')));
    $form->addField('user_pass','password',array('label'=>$PMDR->getLanguage('sidebox_login_password'),'autocomplete'=>'off'));
    $form->addField('remember','checkbox',array('label'=>'','html'=>$PMDR->getLanguage('sidebox_login_remember')));
    $form->addField('submit_login','submit',array('label'=>$PMDR->getLanguage('sidebox_login_submit'),'fieldset'=>'button'));
    $form->addValidator('login',new Validate_NonEmpty());
    $form->addValidator('pass',new Validate_NonEmpty());

    $sidebox_login->set('form',$form);

    $template_sidebox_login = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox.tpl');
    $template_sidebox_login->set('title',$PMDR->getLanguage('sidebox_login'));
    $template_sidebox_login->set('content',$sidebox_login);
    unset($sidebox_login,$form);
}

// MENU
$template_sidebox_menu = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox.tpl');
$template_sidebox_menu->cache_id = $PMDR->get('Session')->get('user_id') ? 'sidebox_menu_logged_in' : 'sidebox_menu_logged_out';
$template_sidebox_menu->expire = 900;
if(!$template_sidebox_menu->isCached()) {
    $template_sidebox_menu->set('title',$PMDR->getLanguage('sidebox_menu'));
    $sidebox_menu = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_menu.tpl');
    $sidebox_menu->set('links',$PMDR->get('CustomLinks')->getMenuHTML(),false);
    $template_sidebox_menu->set('content',$sidebox_menu);
    unset($sidebox_menu);
}

// POPULAR
$template_sidebox_popular = null;
if($PMDR->getConfig('sidebox_top_show')) {
    $template_sidebox_popular = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_popular_listings.tpl');
    $template_sidebox_popular->cache_id = 'sidebox_popular';
    $template_sidebox_popular->expire = 900;
    if(!$template_sidebox_popular->isCached()) {
        $sidebox_listings = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_listings.tpl');

        if(!($sidebox_listings->isCached())) {
            $results = $db->GetAll("SELECT
                                        id,
                                        description_short,
                                        short_description_size,
                                        title,
                                        friendly_url,
                                        impressions,
                                        date,
                                        listing_address1,
                                        listing_address2,
                                        listing_zip,
                                        location_id,
                                        location_text_1,
                                        location_text_2,
                                        location_text_3,
                                        phone,
                                        logo_extension,
                                        logo_allow,
                                        address_allow
                                   FROM ".T_LISTINGS."
                                   WHERE status = 'active'
                                   ORDER by impressions DESC LIMIT 0, ".$PMDR->getConfig('sidebox_listing_number'));

            if(sizeof($results) > 0) {
                foreach($results as $key=>$value) {
                    if($value['short_description_size']) {
                        $results[$key]['description_short'] =  Strings::limit_words($value['description_short'], $PMDR->getConfig('sidebox_description_size'));
                    }
                    $locations = $PMDR->get('Locations')->getPath($value['location_id']);
                    foreach($locations as $loc_key=>$loc_value) {
                        $results[$key]['location_'.($loc_key+1)] = $loc_value['title'];
                    }
                    if($value['address_allow']) {
                        $map_country = $PMDR->getConfig('map_country_static') != '' ? $PMDR->getConfig('map_country_static') : $results[$key][$PMDR->getConfig('map_country')];
                        $map_state = $PMDR->getConfig('map_state_static') != '' ? $PMDR->getConfig('map_state_static') :  $results[$key][$PMDR->getConfig('map_state')];
                        $map_city = $PMDR->getConfig('map_city_static') != '' ? $PMDR->getConfig('map_city_static') : $results[$key][$PMDR->getConfig('map_city')];
                        $results[$key]['address'] = ($value['listing_address1'] != '' ? $value['listing_address1']."\n" : '').($value['listing_address2'] != '' ? $value['listing_address2']."\n" : '').($map_city != '' ? $map_city.', ' : '').($map_state != '' ? $map_state : '').' '.$value['listing_zip']."\n".$map_country;
                    }
                    $results[$key]['link'] = $PMDR->get('Listings')->getURL($value['id'],$value['friendly_url']);
                    $results[$key]['details'] = sprintf('('.$PMDR->getLanguage('sidebox_impressions').')',$value['impressions'],$PMDR->get('Dates_Local')->formatDateTime($value['date']));
                    if($value['logo_allow'] AND file_exists(LOGO_THUMB_PATH.$value['id'].'.'.$value['logo_extension'])) {
                        $results[$key]['logo_thumb_url'] = get_file_url_cdn(LOGO_THUMB_PATH.$value['id'].'.'.$value['logo_extension']);
                    } elseif(ADDON_WEBSITE_SCREENSHOTS AND $value['www_screenshot_allow'] AND file_exists(SCREENSHOTS_PATH.$value['id'].'.jpg')) {
                        $results[$key]['logo_thumb_url'] = get_file_url_cdn(SCREENSHOTS_PATH.$value['id'].'.jpg');
                    }
                }
            }
        }
        $sidebox_listings->set('listings',$results);
        $template_sidebox_popular->set('content',$sidebox_listings);
        unset($sidebox_listings,$results,$map_country,$map_state,$map_city,$locations);
    }
}

// POPULAR CATS
$template_sidebox_category_popular = null;
if($PMDR->getConfig('sidebox_topcat_show')) {
    $template_sidebox_category_popular = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_categories_popular.tpl');
    $template_sidebox_category_popular->cache_id = 'sidebox_category_popular';
    $template_sidebox_category_popular->expire = 900;
    if(!$template_sidebox_category_popular->isCached()) {
        $categories_topcat = $db->GetAll("SELECT id, title, friendly_url, friendly_url_path, impressions, level, count, hidden, count_total FROM ".T_CATEGORIES." WHERE level=1 AND impressions > 0 AND hidden=0 ORDER BY impressions DESC LIMIT ".$PMDR->getConfig('sidebox_topcat_number'));
        $sidebox_categories_popular_array = array();
        $count = 0;
        foreach($categories_topcat as $key=>$category) {
            if(($PMDR->getConfig('cat_empty_hidden') AND $category['count_total'] == 0) OR $category['hidden']) {
                unset($categories_sidebox[$key]);
                continue;
            }

            if($count++ == $PMDR->getConfig('sidebox_topcat_number')) break;
            $sidebox_categories_popular_array[$key] = $category;
            $sidebox_categories_popular_array[$key]['url'] = $PMDR->get('Categories')->getURL($category['id'],$category['friendly_url_path']);
        }

        $template_sidebox_category_popular->set('categories_popular_sidebox',$sidebox_categories_popular_array);
        unset($sidebox_categories_popular,$sidebox_categories_popular_array,$categories_topcat,$category);
    }
}

// RECENT
$template_sidebox_recent = null;
if($PMDR->getConfig('sidebox_last_show'))  {
    $template_sidebox_recent = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_recent_listings.tpl');
    $template_sidebox_recent->cache_id = 'sidebox_recent_listings';
    $template_sidebox_recent->expire = 900;
    if(!$template_sidebox_recent->isCached()) {
        $sidebox_listings = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/sidebox_listings.tpl');
        if(!($sidebox_listings->isCached())) {
            $results=$db->GetAll("SELECT
                                    description_short,
                                    short_description_size,
                                    id,
                                    title,
                                    friendly_url,
                                    date,
                                    listing_address1,
                                    listing_address2,
                                    listing_zip,
                                    location_id,
                                    location_text_1,
                                    location_text_2,
                                    location_text_3,
                                    phone,
                                    logo_extension,
                                    logo_allow,
                                    address_allow,
                                    www_screenshot_allow
                                  FROM ".T_LISTINGS."
                                  WHERE
                                    status = 'active'
                                  ORDER BY date DESC
                                  LIMIT 0, ".$PMDR->getConfig('sidebox_listing_number'));

            if(sizeof($results) > 0) {
                foreach($results as $key=>$value) {
                    if ($value['short_description_size']) {
                        $results[$key]['description_short'] =  Strings::limit_words($value['description_short'], $PMDR->getConfig('sidebox_description_size'));
                    }
                    $locations = $PMDR->get('Locations')->getPath($value['location_id']);
                    foreach($locations as $loc_key=>$loc_value) {
                        $results[$key]['location_'.($loc_key+1)] = $loc_value['title'];
                    }
                    if($value['address_allow']) {
                        $map_country = $PMDR->getConfig('map_country_static') != '' ? $PMDR->getConfig('map_country_static') : $results[$key][$PMDR->getConfig('map_country')];
                        $map_state = $PMDR->getConfig('map_state_static') != '' ? $PMDR->getConfig('map_state_static') :  $results[$key][$PMDR->getConfig('map_state')];
                        $map_city = $PMDR->getConfig('map_city_static') != '' ? $PMDR->getConfig('map_city_static') : $results[$key][$PMDR->getConfig('map_city')];
                        $results[$key]['address'] = ($value['listing_address1'] != '' ? $value['listing_address1']."\n" : '').($value['listing_address2'] != '' ? $value['listing_address2']."\n" : '').($map_city != '' ? $map_city.', ' : '').($map_state != '' ? $map_state : '').' '.$value['listing_zip']."\n".$map_country;
                    }
                    $results[$key]['link'] = $PMDR->get('Listings')->getURL($value['id'],$value['friendly_url']);
                    $results[$key]['details'] = $PMDR->get('Dates_Local')->formatDateTime($value['date']);
                    if($value['logo_allow'] AND file_exists(LOGO_THUMB_PATH.$value['id'].'.'.$value['logo_extension'])) {
                        $results[$key]['logo_thumb_url'] = get_file_url_cdn(LOGO_THUMB_PATH.$value['id'].'.'.$value['logo_extension']);
                    } elseif(ADDON_WEBSITE_SCREENSHOTS AND $value['www_screenshot_allow'] AND file_exists(SCREENSHOTS_PATH.$value['id'].'.jpg')) {
                        $results[$key]['logo_thumb_url'] = get_file_url_cdn(SCREENSHOTS_PATH.$value['id'].'.jpg');
                    }
                }
            }
        }
        $sidebox_listings->set('listings',$results);
        $template_sidebox_recent->set('content',$sidebox_listings);
        unset($sidebox_listings,$results,$map_country,$map_state,$map_city,$locations);
    }
}

$PMDR->get('Plugins')->run_hook('sidebox_data');
?>