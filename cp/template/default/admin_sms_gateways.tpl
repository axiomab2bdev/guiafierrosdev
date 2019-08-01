<h1><?php echo $title; ?></h1>
<script type="text/javascript">
$(document).ready(function() {
    $("#change_gateway").click(function(e) {
        e.preventDefault();
        $(this).parent("div").hide();
        $("#change_form").show();
    });
});
</script>
<div id="change_form" style="display: none">
    <?php echo $form->getFormOpenHTML(); ?>
    <?php echo $form->getFieldHTML('gateway'); ?> <?php echo $form->getFieldHTML('submit_enable'); ?>
    <?php echo $form->getFormCloseHTML(); ?>
</div>
<div>
    <div class="icon icon_edit"></div><a id="change_gateway" href="#"><?php echo $lang['admin_sms_gateways_change']; ?></a>
</div>
<br />
<?php echo $content; ?>