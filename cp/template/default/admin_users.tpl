<script type="text/javascript">
$(document).ready(function() {
    <?php if(isset($_GET['action']) AND $_GET['action'] == 'search') { ?>
        $("#users_search").slideToggle();
    <?php } ?>
    $("#users_search_link").click(function(){
        $("#users_search").slideToggle();
    });
    $("#user_country").change(function() {
        if($(this).val() == 'United States') {
            $("#user_state_select-control-group").show();
            $("#user_state-control-group").hide();
        } else {
            $("#user_state_select-control-group").hide();
            $("#user_state-control-group").show();
        }
    });
    $("#user_state_select").change(function() {
        $("#user_state").val($(this).val());
    });
    $("#user_country").trigger("change");
    $("#user_state_select").val($("#user_state").val());
});
</script>

<h1><?php echo $title; ?></h1>

<?php if($form_search) { ?>
    <div class="toggle_link">
        <p><i class="icon-search"></i> <a id="users_search_link" class="toggle_link" href="#"><?php echo $lang['admin_users_search']; ?></a></p>
        <div id="users_search" style="display: none">
            <?php echo $form_search->getFormOpenHTML(array('class'=>'well form-inline')); ?>
                <?php echo $form_search->getFieldLabel('field'); ?> <?php echo $form_search->getFieldHTML('field'); ?> <?php echo $form_search->getFieldLabel('keyword'); ?> <?php echo $form_search->getFieldHTML('keyword',array('class'=>'input-large')); ?> <?php echo $form_search->getFieldLabel('group_id'); ?> <?php echo $form_search->getFieldHTML('group_id'); ?> <?php echo $form_search->getFieldHTML('submit'); ?>
            <?php echo $form_search->getFormCloseHTML(); ?>
        </div>
    </div>
<?php } ?>
<?php echo $content; ?>