<?php
// Get the languages array from the cache or the database
if(!$languages_array = $PMDR->get('Cache')->get('language_options',0,'language_')) {
    $languages_array = $db->GetAssoc("SELECT languageid, title FROM ".T_LANGUAGES." WHERE active=1");
    $PMDR->get('Cache')->write('language_options',$languages_array,'language_');
}

// Get all templates from the /template/ folder setting the current template to the first option
$templates = glob(PMDROOT.'/template/*',GLOB_ONLYDIR);
$templates_array = array();
foreach($templates as $file) {
    $filename = pathinfo($file);
    if($PMDR->getConfig('template') == $filename['basename']) {
        array_unshift($templates_array,$filename['basename']);
    } else {
        array_push($templates_array,$filename['basename']);
    }
}
unset($templates,$file,$filename)
?>