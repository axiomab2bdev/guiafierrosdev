<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('approve_update'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('approve_update'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('approve_update_pending'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('approve_update_pending'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('GD_security_send_message'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('GD_security_send_message'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('send_message_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('send_message_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('listing_email_ip_limit'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('listing_email_ip_limit'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('listing_email_ip_limit_hours'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('listing_email_ip_limit_hours'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('email_attach_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('email_attach_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('print_window_width'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('print_window_width'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('print_window_height'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('print_window_height'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('contact_requests_messages'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('contact_requests_messages'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('contact_requests_limit'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('contact_requests_limit'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>