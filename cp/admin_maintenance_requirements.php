<?php
define('PMD_SECTION', 'admin');

include('../defaults.php');


$PMDR->get('Authentication')->authenticate();

$PMDR->loadLanguage(array('admin_maintenance'));

$PMDR->get('Authentication')->checkPermission('admin_maintenance_view');

$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_content_page.tpl');

$template_content->set('title',$PMDR->getLanguage('admin_maintenance_requirements'));

$curl = function_exists(curl_version);
$gd_info = @gd_info();
$gd = (get_extension_funcs('gd') AND extension_loaded('gd') AND strstr($gd_info['GD Version'],'2.0'));
$php = version_compare(phpversion(),'5.2.1','>=');
$mysql = (version_compare(mysql_get_server_info(),'5.0','>=') >= 0) ? 1 : 0;
$json = function_exists(json_encode);
if($ioncube = function_exists('ioncube_loader_version')) {
    if(function_exists('ioncube_loader_version')) {
        $ioncube_version = ioncube_loader_version();
    }
}

$output = '';
$output .= '<p>'.$PMDR->get('HTML')->icon(intval($curl)).' CURL</p>';
$output .= '<p>'.$PMDR->get('HTML')->icon(intval($gd)).' GD2</p>';
$output .= '<p>'.$PMDR->get('HTML')->icon(intval($php)).'  PHP</p>';
$output .= '<p>'.$PMDR->get('HTML')->icon(intval($mysql)).'  MySQL</p>';
$output .= '<p>'.$PMDR->get('HTML')->icon(intval($json)).' JSON Support</p>';
$output .= '<p>'.$PMDR->get('HTML')->icon(intval($ioncube)).' ionCube';
if(!empty($ioncube_version)) {
    $output .= ' ('.$ioncube_version.')';
}
$output .= '</p>';

$template_content->set('content',$output);

$template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_maintenance_menu.tpl');
include(PMDROOT_ADMIN.'/includes/template_setup.php');
?>