<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_image_width'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_image_width'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_image_height'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_image_height'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_thumb_width'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_thumb_width'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_thumb_height'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_thumb_height'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_image_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_image_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('images_formats'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('images_formats'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_desc_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_desc_size'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Resizing</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_small'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_small'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_thumb_small'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_thumb_small'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gallery_thumb_crop'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gallery_thumb_crop'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>