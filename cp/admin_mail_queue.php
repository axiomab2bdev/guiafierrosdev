<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');



$PMDR->loadLanguage(array('admin_mail'));  



$PMDR->get('Authentication')->authenticate();



$PMDR->get('Authentication')->checkPermission('admin_mailer');



$mail_queue = $PMDR->get('MailQueue');



$conditions = array();



if(isset($_GET['id'])) {

    switch($_GET['action']) {

        case 'show':

            $conditions['batch_id'] = $_GET['id'];

            break;

        case 'show_sent':

            $conditions['batch_id'] = $_GET['id'];

            $conditions['status'] = 'sent';

            break;

        case 'show_pending':

            $conditions['batch_id'] = $_GET['id'];

            $conditions['status'] = 'queued';

            break;

    }

}



$form = $PMDR->get('Form');

$form->addField('process_number','text',array('label'=>$PMDR->getLanguage('admin_mail_process_number')));

$form->addField('send','submit',array('label'=>$PMDR->getLanguage('admin_submit')));



$form->addValidator('process_number',new Validate_NonEmpty());

$form->addValidator('process_number',new Validate_Numeric());



if($form->wasSubmitted('send')) {

    $form->loadValues();

    if(!$form->validate()) {

        $PMDR->addMessage('error',$form->parseErrorsForTemplate());

    } else {

        if($sent_number = $mail_queue->processQueue($_POST['process_number'])) {

            $PMDR->addMessage('success',$PMDR->getLanguage('admin_mail_sent',$sent_number));

        } else {

            $PMDR->addMessage('error',$PMDR->getLanguage('admin_mail_none_queued'));

        }

    }

}



$table_list = $PMDR->get('TableList');

$table_list->addColumn('id',$PMDR->getLanguage('admin_mail_id'));

$table_list->addColumn('batch_id',$PMDR->getLanguage('admin_mail_batch_id')); 

$table_list->addColumn('user_id',$PMDR->getLanguage('admin_mail_user_id'));

$table_list->addColumn('listing_id',$PMDR->getLanguage('admin_mail_listing_id'));

$table_list->addColumn('status',$PMDR->getLanguage('admin_mail_status'));

$table_list->addColumn('date_queued',$PMDR->getLanguage('admin_mail_date_queued'));

$table_list->addColumn('date_sent',$PMDR->getLanguage('admin_mail_date_sent'));               

$table_list->setTotalResults($mail_queue->getCount($conditions));

$records =  $mail_queue->getRows($conditions,array('date_sent'=>'ASC'),$table_list->page_data['limit1'],$table_list->page_data['limit2']); 

foreach($records as $key=>$record) {

    $records[$key]['batch_id'] = '<a href="admin_mail_batches.php?id='.$record['batch_id'].'">'.$record['batch_id'].'</a>';

    if(is_null($record['listing_id'])) {

        $records[$key]['listing_id'] = '-';

    }                                                                  

    $records[$key]['date_queued'] = $PMDR->get('Dates')->formatDate($record['date_queued']);

    if(is_null($record['date_sent'])) {

        $records[$key]['date_sent'] = '-';

    } else {

        $records[$key]['date_sent'] = $PMDR->get('Dates')->formatDateTime($record['date_sent'],true);   

    }

}

$table_list->addRecords($records);



$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'/admin_mail_queue.tpl');

$template_content->set('table_list',$table_list->render());

$template_content->set('form',$form);



$template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_mail_menu.tpl');

include(PMDROOT_ADMIN.'/includes/template_setup.php');

?>