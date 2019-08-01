<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('banner_link'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('banner_link'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('banner_by_cat_random'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('banner_by_cat_random'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('banners_formats'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('banners_formats'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>