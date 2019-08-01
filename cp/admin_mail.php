<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');



$PMDR->loadLanguage(array('admin_mail'));

      

$PMDR->get('Authentication')->authenticate();



$PMDR->get('Authentication')->checkPermission('admin_mailer');



$form = $PMDR->get('Form');

$form->enctype = 'multipart/form-data';



$category_count = $db->GetOne("SELECT COUNT(*) FROM ".T_CATEGORIES) - 1;

$location_count = $db->GetOne("SELECT COUNT(*) FROM ".T_LOCATIONS) - 1;



$form->addFieldSet('message',array('legend'=>$PMDR->getLanguage('admin_mail_message')));



$form->addField('batch_name','text',array('label'=>$PMDR->getLanguage('admin_mail_mailing_name'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_batch_name')));

$form->addField('batch_description','textarea',array('label'=>$PMDR->getLanguage('admin_mail_mailing_description'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_batch_description')));

$form->addField('from_name','text',array('label'=>$PMDR->getLanguage('admin_mail_from_name'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_from_name')));

$form->addField('from_email','text',array('label'=>$PMDR->getLanguage('admin_mail_from_email'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_from_email')));

if($category_count > 1) {

    if($PMDR->getConfig('category_select_type') == 'tree_select' OR $PMDR->getConfig('category_select_type') == 'tree_select_multiple') {

        $form->addField('categories',$PMDR->getConfig('category_select_type'),array('label'=>$PMDR->getLanguage('admin_mail_categories'),'fieldset'=>'message','first_option'=>'','options'=>$db->GetAssoc("SELECT id, title, level FROM ".T_CATEGORIES." WHERE ID != 1 ORDER BY left_"),'help'=>$PMDR->getLanguage('admin_mail_help_categories')));

    } else {

        $form->addField('categories','dhtmlx_tree_checkbox',array('label'=>$PMDR->getLanguage('admin_mail_categories'),'fieldset'=>'message','value'=>'','options'=>array('type'=>'category_tree'),'help'=>$PMDR->getLanguage('admin_mail_help_categories')));    

    }

}

if($location_count > 1) {

    if($PMDR->getConfig('location_select_type') == 'tree_select' OR $PMDR->getConfig('location_select_type') == 'tree_select_group') {

        $form->addField('locations',$PMDR->getConfig('location_select_type'),array('label'=>$PMDR->getLanguage('admin_mail_locations'),'fieldset'=>'message','first_option'=>'','options'=>$db->GetAssoc("SELECT id, title, level, left_, right_ FROM ".T_LOCATIONS." WHERE ID != 1 ORDER BY left_"),'help'=>$PMDR->getLanguage('admin_mail_help_locations')));

    } else {

        $form->addField('locations','dhtmlx_tree_checkbox',array('label'=>$PMDR->getLanguage('admin_mail_locations'),'fieldset'=>'message','value'=>'','options'=>array('type'=>'location_tree'),'help'=>$PMDR->getLanguage('admin_mail_help_locations')));    

    }

}



$form->addField('pricing_id','dhtmlx_tree_checkbox',array('label'=>$PMDR->getLanguage('admin_mail_product'),'fieldset'=>'search','options'=>array('type'=>'products_tree','product_type'=>'listing_membership','hidden'=>true),'help'=>$PMDR->getLanguage('admin_mail_help_pricing_id')));

$form->addField('date_from','date',array('label'=>$PMDR->getLanguage('admin_mail_from'),'fieldset'=>'message','style'=>'width: 105px','help'=>$PMDR->getLanguage('admin_mail_help_date_from')));

$form->addField('date_to','date',array('label'=>$PMDR->getLanguage('admin_mail_to'),'fieldset'=>'message','style'=>'width: 105px'));

$form->addField('status','checkbox',array('label'=>$PMDR->getLanguage('admin_mail_status'),'fieldset'=>'message','value'=>'','options'=>array('active'=>'Active','pending'=>'Pending','suspended'=>'Suspended'),'help'=>$PMDR->getLanguage('admin_mail_help_status')));

$form->addField('copy_to','text',array('label'=>$PMDR->getLanguage('admin_mail_copy_to'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_copy_to')));

$form->addField('include_listing_emails','checkbox',array('label'=>$PMDR->getLanguage('admin_mail_include_listing_emails'),'fieldset'=>'message','value'=>'users','help'=>$PMDR->getLanguage('admin_mail_help_include_listing_emails')));

$form->addField('subject','text',array('label'=>$PMDR->getLanguage('admin_mail_subject'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_subject')));

$form->addField('body_plain','textarea',array('label'=>$PMDR->getLanguage('admin_mail_plain'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_body_plain')));

$form->addField('body_html','htmleditor',array('label'=>$PMDR->getLanguage('admin_mail_html'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_body_html')));

$form->addField('attachment','file',array('label'=>$PMDR->getLanguage('admin_mail_attachment'),'fieldset'=>'message','help'=>$PMDR->getLanguage('admin_mail_help_attachment')));

$form->addField('send','submit',array('label'=>$PMDR->getLanguage('admin_submit'),'fieldset'=>'button')); 



$form->addValidator('batch_name',new Validate_NonEmpty());

$form->addValidator('from_name',new Validate_NonEmpty());

$form->addValidator('from_email',new Validate_NonEmpty());

$form->addValidator('subject',new Validate_NonEmpty());

$form->addValidator('body_plain',new Validate_NonEmpty());

$form->addValidator('from_email',new Validate_Email());

$form->addValidator('copy_to',new Validate_Email(false));



$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'/admin_mail.tpl');

    

if($form->wasSubmitted('send')) {

    if(DEMO_MODE) {

        $PMDR->addMessage('error','The mailer is disabled in the demo.');    

    } else {

        $data = $form->loadValues();

        if(!$form->validate()) {

            $PMDR->addMessage('error',$form->parseErrorsForTemplate());

        } else {

            if($data['categories'] == '') $data['categories'] = array();

            if($data['locations'] == '') $data['locations'] = array();

            

            if($data['copy_to'] != '') {

                $mailer = $PMDR->get('MailHandler');

                $mailer->from_email = $data['from_email'];

                $mailer->from_name = $data['from_name'];

                if($data['attachment']['size'] > 0) {

                    $mailer->addAttachment($data['attachment']['tmp_name'],$data['attachment']['name'],$data['attachment']['type']);

                }

                $mailer->subject = $data['subject']; 

                $mailer->addMessagePart($data['body_plain']);

                if($data['body_html'] != '') {

                    $mailer->addMessagePart($data['body_html'], "text/html");

                }

                $mailer->addRecipient($data['copy_to']);

                if ($mailer->send()) {

                    $PMDR->addMessage('success',$PMDR->getLanguage('admin_mail_copy_to_sent',array($data['copy_to'])));

                } else {

                    $PMDR->addMessage('success',$PMDR->getLanguage('admin_mail_copy_to_failed',array($data['copy_to'])));

                }    

            } else {

                $mail_queue = $PMDR->get('MailQueue');

                $batch_id = $mail_queue->addBatch($data);

                $query_where = array();

                if(count((array) $data['categories'])) {

                    $query_where[] = ' AND lc.cat_id IN ('.implode(',',(array) $data['categories']).')';   

                }

                if(count((array) $data['locations'])) {

                    $query_where[] = ' AND l.location_id IN ('.implode(',',(array) $data['locations']).')';   

                }

                

                if(count($data['status'])) {  

                    $query_where[] = " AND l.status IN ('".implode("','",(array) $data['status'])."')";    

                }

                

                if (count((array) $data['pricing_id']))  {

                    $order_sql = "INNER JOIN ".T_ORDERS." o ON l.id=o.type_id AND o.type='listing_membership'"; 

                    $query_where[] = " AND o.pricing_id IN (".implode(',',(array) $data['pricing_id']).")";

                }

                

                if(!empty($data['date_from'])) {

                    $query_where[] = " AND l.date >= '".$data['date_from']."'";

                }

                

                if(!empty($data['date_to'])) {

                    $query_where[] = " AND l.date <= '".$data['date_to']."'";

                }

                

                if(count($query_where) OR $data['include_listing_emails']) {

                    $listing_select_field = "listing_id,";

                    $listing_select_value = "l.id,";

                    $cat_sql = "INNER JOIN ".T_LISTINGS." l ON u.id=l.user_id";

                }

                $recipients_group = $data['include_listing_emails'] ? ",GROUP_CONCAT(l.mail SEPARATOR ',')" : ",''"; 

                

                if(count((array) $data['categories'])) {

                    $cat_sql .= " INNER JOIN ".T_LISTINGS_CATEGORIES." lc ON l.id=lc.list_id";   

                }

                $db->Execute("

                INSERT INTO ".T_EMAIL_QUEUE." 

                    (batch_id,user_id,".$listing_select_field."status,date_queued,subject,body_plain,body_html,cc_recipients)  

                    SELECT ?,u.id,".$listing_select_value."'queued',NOW(),?,?,?$recipients_group FROM ".T_USERS." u $cat_sql $order_sql WHERE u.user_email != '' ".implode('',$query_where)." GROUP BY u.id",

                    array($batch_id,(string) $data['subject'],(string) $data['body_plain'],(string) $data['body_html'])

                );

                

                $queue_count = $db->Affected_Rows();

                

                if($sent_number = $mail_queue->processBatch($batch_id,100)) {

                    if($sent_number >= $queue_count) {

                        $PMDR->addMessage('success',$PMDR->getLanguage('admin_mail_emails_sent',array($sent_number)));    

                    } else {

                        $PMDR->addMessage('success',$PMDR->getLanguage('admin_mail_emails_sent',array($sent_number)).', '.$PMDR->getLanguage('admin_mail_emails_queued',array($queue_count-$sent_number)));    

                    }

                } else {

                    $db->Execute("DELETE FROM ".T_EMAIL_QUEUE_BATCHES." WHERE id=?",array($batch_id));

                    $PMDR->addMessage('error',$PMDR->getLanguage('admin_mail_emails_queued',array(0)));

                }

            }

        }

    }

}

$template_content->set('form',$form);

$template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_mail_menu.tpl');

$template_page_menu->set('user_variables',$PMDR->get('Email_Variables')->getUserKeys());

$template_page_menu->set('general_variables',$PMDR->get('Email_Variables')->getGeneralKeys());         

include(PMDROOT_ADMIN.'/includes/template_setup.php');

?>