<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');



$PMDR->loadLanguage(array('admin_maintenance'));



$PMDR->get('Authentication')->authenticate();



$PMDR->get('Authentication')->checkPermission('admin_maintenance_view');



if($_GET['action'] == 'optimize' AND isset($_GET['table'])) {

    $PMDR->get('Authentication')->checkPermission('admin_maintenance_optimize');

    if($_GET['table'] == "all") {

        $tables = $db->GetAll("SHOW TABLE STATUS LIKE '".DB_TABLE_PREFIX."%'");

        $message = '';

        foreach($tables as $table) {

            if($table['Data_free'] > 0) {

                $db->Execute("OPTIMIZE TABLE ".$db->CleanIdentifier($table['Name']));

                $message .= sprintf($PMDR->getLanguage('admin_maintenance_optimized'),$table['Name']).'<br />';

            }

        }

        if(!empty($message)) {

            $PMDR->addMessage('success',$message);

        }

    } else {

        $db->Execute("OPTIMIZE TABLE ".$db->CleanIdentifier($_GET['table']));

        $PMDR->addMessage('success',sprintf($PMDR->getLanguage('admin_maintenance_optimized'),$_GET['table']));

    }

    redirect();

}



if($_GET['action'] == 'repair' AND isset($_GET['table'])) {

    $PMDR->get('Authentication')->checkPermission('admin_maintenance_repair');

    $db->Execute("REPAIR TABLE ".$db->CleanIdentifier($_GET['table']));

    $PMDR->addMessage('success',sprintf($PMDR->getLanguage('admin_maintenance_repaired'),$_GET['table']));

}



$table_list = $PMDR->get('TableList');

$table_list->all_one_page = true;

$table_list->addColumn('Name',$PMDR->getLanguage('admin_maintenance_table_name'));

$table_list->addColumn('Rows',$PMDR->getLanguage('admin_maintenance_rows'));

$table_list->addColumn('Data_length',$PMDR->getLanguage('admin_maintenance_size'));

$table_list->addColumn('Data_free',$PMDR->getLanguage('admin_maintenance_overhead'));

$table_list->addColumn('Update_time',$PMDR->getLanguage('admin_maintenance_last_updated'));

$table_list->addColumn('Message',$PMDR->getLanguage('admin_maintenance_status'));

$records = $db->GetAll("SHOW TABLE STATUS LIKE '".DB_TABLE_PREFIX."%'");

$table_list->setTotalResults(count($records));

$total_size = 0;

$total_overhead = 0;

$total_rows = 0;

$optimize_all_list = array();

foreach($records as $key=>$record) {

    $total_size += $record['Data_length'];

    $total_overhead += $record['Data_free'];

    $total_rows += $record['Rows'];

    $records[$key]['Data_length'] = implode(' ',round_up_bytes($record['Data_length']));

    if($records[$key]['Data_free'] > 0) {

        $optimize_all_list[] = $record['Name'];

        $records[$key]['Data_free'] = '<span style="color: red">'.implode(' ',round_up_bytes($record['Data_free'])).'</span> '.$PMDR->get('HTML')->icon('gears',array('label'=>$PMDR->getLanguage('admin_maintenance_optimize'),'href'=>'admin_maintenance_database.php?action=optimize&table='.$record['Name']));

    } else {

        $records[$key]['Data_free'] = '-';

    }

    $records[$key]['Message'] = '

    <script type="text/javascript">

    $(window).load(function(){

        $.ajax({

            data: ({

                action: "admin_check_table",

                table: "'.$record['Name'].'"

            }),

            success: function(data) {

                if(data == "OK") {

                    $("#check_'.$record['Name'].'").html("<i class=\"icon-ok\"></i>");

                } else {

                    $("#check_'.$record['Name'].'").html(data+" '.addslashes($PMDR->get('HTML')->icon('tools',array('label'=>$PMDR->getLanguage('admin_maintenance_repair'),'href'=>'admin_maintenance_database.php?action=repair&table='.$record['Name']))).'");

                }

            }

        });

    });

    </script>

    <div id="check_'.$record['Name'].'"><img src="'.BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN.'images/loading.gif" /></div>

    ';

}

$records[] = array(

    'Name'=>'<b>'.$PMDR->getLanguage('admin_maintenance_total').'</b>',

    'Rows'=>'<b>'.$total_rows.'</b>',

    'Data_free'=>'<b>'.implode(' ',round_up_bytes($total_overhead)).'</b>'.((count($optimize_all_list) > 0) ? ' '.$PMDR->get('HTML')->icon('gears',array('label'=>$PMDR->getLanguage('admin_maintenance_optimize'),'href'=>'admin_maintenance_database.php?action=optimize&table=all')) : ''),

    'Data_length'=>'<b>'.implode(' ',round_up_bytes($total_size)).'</b>',

    'Message'=>'',

    'Update_time'=>''

);

$table_list->addRecords($records);



$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'/admin_maintenance_database.tpl');

$template_content->set('table_list',$table_list->render());



$template_content->set('mysql_version',$db->version());

$template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_maintenance_menu.tpl');

include(PMDROOT_ADMIN.'/includes/template_setup.php');

?>