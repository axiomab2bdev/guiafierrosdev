<?php
function cron_mail_queue($j) {
    global $PMDR, $db;
    
    // Process part of the mail queue
    $sent_number = $PMDR->get('MailQueue')->processQueue(100);
    if($sent_number) {
        $cron_data['queue_sent'] = $sent_number;   
    }
    $cron_data['status'] = true;
    return $cron_data;
}
$cron['cron_mail_queue'] = array('day'=>-1,'hour'=>-1,'minute'=>0,'run_order'=>3);
?>