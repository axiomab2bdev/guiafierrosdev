<script type="text/javascript">
$(document).ready(function() {
    $("#calendar").fullCalendar({
        theme: true,
        isRTL: <?php echo $PMDR->getLanguage('textdirection') == 'rtl' ? 'true' : 'false'; ?>,
        header: {
            left:   'title',
            center: 'month,basicWeek',
            right:  'today prev,next'
        },
        events: {
            url: "./admin_ajax.php",
            data: {
                action: "admin_calendar"
            }
        },
        loading: function(isLoading) {
            toggleLoadingMessage();
            if(isLoading) {
                $("#month").val($("#calendar").fullCalendar('getDate').getMonth());
                $("#year").val($("#calendar").fullCalendar('getDate').getFullYear());
            }
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week:  'week',
            day:   'day'
        }
    });

    $("#month").change(function() {
        $("#calendar").fullCalendar('gotoDate',$("#calendar").fullCalendar('getDate').getFullYear(),$(this).val());
    });

    $("#year").change(function() {
        $("#calendar").fullCalendar('gotoDate',$(this).val(),$("#calendar").fullCalendar('getDate').getMonth());
    });

    $("#date_select").prependTo(".fc-header-right");
    $("#date_select").show();
});
</script>
<h1><?php echo $lang['admin_calendar']; ?></h1>
<div id="date_select" style="float: left; display: none">
    <select id="month" name="month" class="select" style="width: auto">
    <?php foreach($months AS $key=>$month) { ?>
        <option value="<?php echo $key; ?>"><?php echo $month; ?></option>
    <?php } ?>
    </select>
    <select id="year" name="year" class="select" style="width: auto">
    <?php foreach($years AS $year) { ?>
        <option><?php echo $year; ?></option>
    <?php } ?>
    </select>
</div>
<div id="calendar"></div>