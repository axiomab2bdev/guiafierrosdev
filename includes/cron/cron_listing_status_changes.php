<?php
function cron_listing_status_changes($j) {
    global $PMDR, $db;
    
    // Suspend overdue
    $cron_suspended = array();
    $orders = $db->GetAll("
    SELECT
        o.type, o.type_id, o.user_id, u.user_email 
    FROM 
        ".T_ORDERS." o INNER JOIN ".T_USERS." u ON o.user_id=u.id 
    WHERE 
        DATE_ADD(next_due_date,INTERVAL ".$PMDR->getConfig('listing_suspend_days')." DAY) > '".$j['last_run_date']."' AND DATE_ADD(next_due_date,INTERVAL ".$PMDR->getConfig('listing_suspend_days')." DAY) <= '".$j['run_date']."' AND override_suspension = 0"
    );
    foreach($orders AS $order) {
        switch($order['type']) {
            case 'listing_membership':
                if($PMDR->getConfig('listing_suspend')) {
                    if($listing = $db->GetRow("SELECT id, title FROM ".T_LISTINGS." WHERE id=? AND status='active'",array($order['type_id']))) {
                        $cron_suspended[] = $listing['id'];
                        $db->Execute("UPDATE ".T_LISTINGS." SET status='suspended' WHERE id=?",array($listing['id']));
                        if(!empty($order['user_email'])) {
                            $listing['login_link'] = BASE_URL.MEMBERS_FOLDER;
                            $PMDR->get('Email_Templates')->send('listing_suspended',$order['user_email'],array_merge($order,$listing));
                        }
                    }
                }
                break;
        }
    }
    $cron_data['data']['listings_suspended'] = $cron_suspended;

    $cron_data['status'] = true;

    unset($listing);
    unset($orders);
    unset($cron_suspended);
    
    return $cron_data;
}
$cron['cron_listing_status_changes'] = array('day'=>-1,'hour'=>0,'minute'=>0,'run_order'=>11);
?>