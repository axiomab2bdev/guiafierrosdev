<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');



$PMDR->loadLanguage(array('admin_listings','admin_listings_csv'));  



$PMDR->get('Authentication')->authenticate();



$PMDR->get('Authentication')->checkPermission('admin_statistics');



$script = '

<script type="text/javascript">

var csvOnComplete = function(data) {

    $("#status").progressbar("option", "value", data.percent);

    $("#status_percent").html(data.percent+"%");

    if(data.percent == 100) {

        $("#status").progressbar("destroy");

        $("#status_percent").hide();

        $("#status").html(\'<a href="'.BASE_URL_ADMIN.'/admin_listings_csv_statistics.php?action=download">Download Statistics</a>\');    

    } else {

        csvStart(data.start+data.num,data.num);

    }

};



var csvStart = function(start,num) {

    if(start == 0) {

        $("#status_percent").html("0%");

        $("#status").progressbar({ value: 0 });

    }

    $.ajax({ data: ({ action: "admin_listings_csv_statistics", start: start, num: num }), success: csvOnComplete, dataType: "json"});

};

</script>';



if($_GET['action'] == 'download') {

    $serve = $PMDR->get('ServeFile');

    $serve->serve(TEMP_UPLOAD_PATH.'listing_statistics.csv');

}



$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_content_page.tpl');

$template_content->set('title',$PMDR->getLanguage('admin_listings_statistics'));

$template_content->set('content',$script.'<div style="width: 500px; float: left;" id="status"></div><div style="float: left; margin: 5px 0 0 10px; font-weight: bold;" id="status_percent"></div>');



$PMDR->setAdd('javascript_onload','csvStart(0,1000);');



include(PMDROOT_ADMIN.'/includes/template_setup.php');

?>