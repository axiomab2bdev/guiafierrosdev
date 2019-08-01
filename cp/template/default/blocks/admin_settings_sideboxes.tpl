<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <ol>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_login_show'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_login_show'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_top_show'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_top_show'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_last_show'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_last_show'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_featured_show'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_featured_show'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_categories_show'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_categories_show'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_topcat_show'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_topcat_show'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_featured_classifieds'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_featured_classifieds'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_listing_number'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_listing_number'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_description_size'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_description_size'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->getFieldLabel('sidebox_topcat_number'); ?>
                <div class="controls">
                    <?php echo $form->getFieldHTML('sidebox_topcat_number'); ?>
                </div>
            </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>