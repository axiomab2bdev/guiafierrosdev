<?php
$PMDR->get('Plugins')->run_hook('template_setup_begin');

include(PMDROOT.'/includes/sidebox_data.php');
include(PMDROOT.'/includes/common_header.php');

if($PMDR->getConfig('search_display_all') OR on_page('/index.php')) {
    include(PMDROOT.'/includes/template_searchform.php');
}

if($PMDR->get('wrapper_file') AND $PMDR->get('Templates')->path($PMDR->get('wrapper_file'))) {
    $template_wrapper = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.$PMDR->get('wrapper_file'));
} elseif(is_null($PMDR->get('wrapper_file')) AND is_object($template_content)) {
    $template_wrapper = $template_content;
} elseif(PMD_SECTION == 'members') {
    $template_wrapper = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'members/user_wrapper.tpl');
    $template_wrapper->set('contact_requests',intval($PMDR->getConfig('contact_requests_limit')));
} else {
    $template_wrapper = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'wrapper.tpl');
}

$template_wrapper->set('template_sidebox_category_list',$template_sidebox_category_list);
$template_wrapper->set('template_sidebox_featured',$template_sidebox_featured);
$template_wrapper->set('template_sidebox_featured_classifieds',$template_sidebox_featured_classifieds);
$template_wrapper->set('template_sidebox_login',$template_sidebox_login);
$template_wrapper->set('template_sidebox_menu',$template_sidebox_menu);
$template_wrapper->set('template_sidebox_popular',$template_sidebox_popular);
$template_wrapper->set('template_sidebox_category_popular',$template_sidebox_category_popular);
$template_wrapper->set('template_sidebox_recent',$template_sidebox_recent);
$template_wrapper->set('template_sidebox_blog',$template_sidebox_blog);
$template_wrapper->set('template_sidebox_blog_categories',$template_sidebox_blog_categories);

$template_wrapper->set('banners',$PMDR->get('Banner_Display'));

if($PMDR->getConfig('search_display_all') OR on_page('/index.php')) {
    $template_wrapper->set('searchform',$searchform);
    $template_wrapper->set('search_display_all',true);
} else {
    $template_wrapper->set('searchform',null);
    $template_wrapper->set('search_display_all',false);
}

$page_title = (array) $PMDR->get('page_title');
$template_wrapper->set('page_title',array_pop($page_title));
unset($page_title);

if(count($PMDR->get('breadcrumb'))) {
    $template_wrapper->set('breadcrumb',$PMDR->get('breadcrumb'));
}

$template_message = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'blocks/message.tpl');
$template_message->set('message_types',$PMDR->getMessages());
$template_wrapper->set('message',$template_message);
$template_wrapper->set('template_content',$template_content);

include(PMDROOT.'/includes/template_header.php');
include(PMDROOT.'/includes/template_footer.php');

$template_wrapper->set('header',$header);
$template_wrapper->set('footer',$footer);

$PMDR->get('Plugins')->run_hook('template_setup');

echo $template_wrapper->render();

$PMDR->get('Plugins')->run_hook('template_setup_end');

include(PMDROOT.'/includes/common_footer.php');
?>