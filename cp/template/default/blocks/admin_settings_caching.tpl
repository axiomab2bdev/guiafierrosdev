<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('cache'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('cache'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('cache_search_days'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('cache_search_days'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>