<?php

define('PMD_SECTION', 'admin');



include('../defaults.php');



// Load Language

$PMDR->loadLanguage(array('admin_categories'));



// Get authentication

$PMDR->get('Authentication')->authenticate();



// Get permission to edit categories

$PMDR->get('Authentication')->checkPermission('admin_categories_edit');



$script = '

<script type="text/javascript">

var sortOnComplete = function(data) {

    $("#status").progressbar("option", "value", data.percent);

    $("#status_percent").html(data.percent+"%");

    if(data.percent == 100) {

        $("#status").progressbar("destroy");

        $("#status_percent").hide();

        window.location.replace("'.BASE_URL_ADMIN.'/admin_categories.php");    

    } else {

        sortStart(data.start+data.num,data.num);

    }

};



var sortStart = function(start,num) {

    if(start == 0) {

        $("#translate_form").hide();

        $("#status_percent").html("0%");

        $("#status").progressbar({ value: 0 });

    }

    $.ajax({ data: ({ action: "admin_categories_sort", start: start, num: num }), success: sortOnComplete, dataType: "json"});

};



$(document).ready(function() {

    sortStart(0,10);

});

</script>';





// Load template and set title

$template_content = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_content_page.tpl');

$template_content->set('title',$PMDR->getLanguage('admin_categories_sort'));

$template_content->set('content',$script.'<div style="width: 500px; float: left;" id="status"></div><div style="float: left; margin: 5px 0 0 10px; font-weight: bold;" id="status_percent"></div>');



$template_page_menu = $PMDR->getNew('Template',PMDROOT_ADMIN.TEMPLATE_PATH_ADMIN.'blocks/admin_categories_menu.tpl');

include(PMDROOT_ADMIN.'/includes/template_setup.php');

?>