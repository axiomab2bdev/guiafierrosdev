<script type="text/javascript">
$(document).ready(function() {
    $("#test_connection").click(function(e) {
        e.preventDefault();
        type = $("#email_preferred_connection").val();
        if(type == 'smtp' && $("#email_smtp_host").val() == '') {
            alert('Please enter the SMTP connection details and save the settings before testing.');
        } else if(type == 'sendmail' && $("#email_sendmail_path").val() == '') {
            alert('Please enter the sendmail path and save the settings before testing.');
        } else {
            window.location.href = "admin_maintenance_email_test.php?connection="+$("#email_preferred_connection").val();
        }
    });

});
</script>
<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend>General</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_preferred_connection'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_preferred_connection'); ?>
                <p class="help-block"><a id="test_connection" class="btn btn-mini"><?php echo $lang['admin_settings_email_test_connection']; ?></a></p>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_log_expiration_days'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_log_expiration_days'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_queue_rate'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_queue_rate'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>SMTP</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_smtp_host'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_smtp_host'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_smtp_user'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_smtp_user'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_smtp_pass'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_smtp_pass'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_smtp_port'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_smtp_port'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_smtp_require_auth'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_smtp_require_auth'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_smtp_encryption'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_smtp_encryption'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Sendmail</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_sendmail_path'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_sendmail_path'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Default Settings</legend>
        <div class="control-group">
            <label class="control-label">Default Signature:</label>
            <div class="controls custom">
                <a href="<?php echo BASE_URL_ADMIN; ?>/admin_phrases.php?action=edit&id=signature&section=email_templates">Edit signature language phrase</a>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_from_name'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_from_name'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_from_address'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_from_address'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_recipients'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_recipients'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>