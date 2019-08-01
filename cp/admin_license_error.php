<?php
define('PMD_SECTION', 'admin');

include('../defaults.php');

if(!isset($_GET['type'])) {
    exit('Unknown error.');
}

$PMDR->loadLanguage(array('admin_license_error'));

$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.'/template/default/admin_license_error.tpl');
$template_content->set('title','License Error');
$template_content->set('type',value($_GET,'type'));

include(PMDROOT_ADMIN.'/includes/template_setup.php');
?>