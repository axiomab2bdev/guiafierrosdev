<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('website_screenshot_service'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('website_screenshot_service'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('website_screenshot_key'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('website_screenshot_key'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('website_screenshot_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('website_screenshot_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('website_screenshot_size_small'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('website_screenshot_size_small'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('website_screenshot_cache_days'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('website_screenshot_cache_days'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('website_screenshot_cron_amount'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('website_screenshot_cron_amount'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>