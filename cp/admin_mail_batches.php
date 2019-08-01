<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');



$PMDR->loadLanguage(array('admin_mail'));  



$PMDR->get('Authentication')->authenticate();



$PMDR->get('Authentication')->checkPermission('admin_mailer');



$table_list = $PMDR->get('TableList');

$table_list->addColumn('id',$PMDR->getLanguage('admin_mail_id'));

$table_list->addColumn('name',$PMDR->getLanguage('admin_mail_mailing_name')); 

$table_list->addColumn('date_queued',$PMDR->getLanguage('admin_mail_date_queued'));

$table_list->addColumn('status_total',$PMDR->getLanguage('admin_mail_total_emails'));

$table_list->addColumn('status_sent',$PMDR->getLanguage('admin_mail_total_sent'));

$table_list->addColumn('status_pending',$PMDR->getLanguage('admin_mail_pending'));               

$table_list->setTotalResults(!isset($_GET['id']) ? $db->GetOne("SELECT COUNT(*) FROM ".T_EMAIL_QUEUE_BATCHES) : 1);

$records = $db->GetAll("SELECT ".T_EMAIL_QUEUE_BATCHES.".*, COUNT(*) as status_total, COUNT(CASE WHEN status='sent' THEN 0 END) as status_sent FROM ".T_EMAIL_QUEUE_BATCHES." LEFT JOIN ".T_EMAIL_QUEUE." ON ".T_EMAIL_QUEUE_BATCHES.".id=".T_EMAIL_QUEUE.".batch_id".(isset($_GET['id']) ? ' WHERE '.T_EMAIL_QUEUE_BATCHES.'.id='.$_GET['id'] : '')." GROUP BY ".T_EMAIL_QUEUE_BATCHES.".id ORDER BY ".T_EMAIL_QUEUE_BATCHES.".date_queued LIMIT ".$table_list->page_data['limit1'].",".$table_list->page_data['limit2']); 

foreach($records as &$record) {

    $record['name'] = $PMDR->get('Cleaner')->clean_output($record['name']);

    $record['date_queued'] = $PMDR->get('Dates')->formatDateTime($record['date_queued'],true);

    $record['status_total'] = '<a href="admin_mail_queue.php?action=show&id='.$record['id'].'">'.$record['status_total'].'</a>';

    $record['status_sent'] = '<a href="admin_mail_queue.php?action=show_sent&id='.$record['id'].'">'.$record['status_sent'].'</a>';

    $record['status_pending'] = '<a href="admin_mail_queue.php?action=show_pending&id='.$record['id'].'">'.($record['status_total']-$record['status_sent']).'</a>';

}

$table_list->addRecords($records);



$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_content_page.tpl');

$template_content->set('title',$PMDR->getLanguage('admin_mail_batches'));

$template_content->set('content',$table_list->render());



$template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_mail_menu.tpl');

include(PMDROOT_ADMIN.'/includes/template_setup.php');       

?>