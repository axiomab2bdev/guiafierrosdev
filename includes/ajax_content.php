<?php
define('PMD_SECTION', 'public');

include('../defaults.php');

$PMDR->loadLanguage(array('admin_general'));

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-type: text/html; charset=".CHARSET);

switch($_GET['type']) {
    case 'users':
        $users = $db->GetAll("SELECT id, login FROM ".T_USERS." WHERE login LIKE '".$db->Clean($_GET['value'])."%' ORDER BY login ASC");
        $content = '';
        if(count($users)) {
            foreach($users as $user) {
                $content .= '<a href="#" onclick="document.getElementById(\''.$PMDR->get('Cleaner')->clean_output($_GET['element']).'\').value = \''.$user['id'].'\'; document.getElementById(\''.$PMDR->get('Cleaner')->clean_output($_GET['element']).'_results\').style.display=\'none\';">'.$user['login'].'</a><br />';
            }
        } else {
            $content = 'No Users Found';
        }
        echo $content;
        break;
}
?>