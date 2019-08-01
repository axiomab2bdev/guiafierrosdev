<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_image_width'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_image_width'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_image_height'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_image_height'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_thumb_width'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_thumb_width'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_thumb_height'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_thumb_height'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_description_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_description_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_image_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_image_size'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Resizing</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_image_small'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_image_small'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_thumb_small'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_thumb_small'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classified_thumb_crop'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classified_thumb_crop'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Other</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('classifieds_images_formats'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('classifieds_images_formats'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>