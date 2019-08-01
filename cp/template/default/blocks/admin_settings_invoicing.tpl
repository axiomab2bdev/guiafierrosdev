<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('disable_billing'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('disable_billing'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_company'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_company'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_address'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_address'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_email_pdf'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_email_pdf'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_generation_days'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_generation_days'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Reminders</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_reminder_days'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_reminder_days'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_overdue_days_1'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_overdue_days_1'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_overdue_days_2'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_overdue_days_2'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('invoice_overdue_days_3'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('invoice_overdue_days_3'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Tax</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('tax_type'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('tax_type'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('compound_tax'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('compound_tax'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>