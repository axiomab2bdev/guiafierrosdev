<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_width'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_width'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_height'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_height'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_thumb_width'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_thumb_width'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_thumb_height'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_thumb_height'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_size'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Resizing</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_small'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_small'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_thumb_small'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_thumb_small'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('image_logo_thumb_crop'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('image_logo_thumb_crop'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Other</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('logos_formats'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('logos_formats'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('pdf_logo'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('pdf_logo'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>