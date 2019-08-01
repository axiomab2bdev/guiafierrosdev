<?php
if(!IN_PMD) exit('File '.__FILE__.' can not be accessed directly.');

function cron_imports($j) {
    global $PMDR, $db;

    $PMDR->loadLanguage('email_templates');

    // Cancel any abandoned imports (no acivity within 24 hours)
    $db->Execute("UPDATE ".T_IMPORTS." SET status='failed' WHERE (status='running' OR status='pending') AND date_activity < DATE_SUB(NOW(),INTERVAL 1 DAY)");

    // Let's make sure another import is not running for some reason
    // This should never happen since CRON runs consecutively but it is a nice check to be sure.
    if(!$import = $db->GetRow("SELECT * FROM ".T_IMPORTS." WHERE status='running' AND scheduled=1")) {
        $import = $db->GetRow("SELECT * FROM ".T_IMPORTS." WHERE status='pending' AND scheduled=1");
    }
    if($import) {
        // Change it to running so we know which one is currently running
        if($import['status'] == 'pending') {
            $db->Execute("UPDATE ".T_IMPORTS." SET status='running' WHERE id=?",array($import['id']));
        }

        $PMDR->get('Imports')->run($import['id']);
    }

    return array('status'=>true);
}
// Add the CRON job to the queue and set it to run based on the backup CRON days setting
$cron['cron_imports'] = array('day'=>-1,'hour'=>-1,'minute'=>5,'run_order'=>20);
?>