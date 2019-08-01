<div class="form-container form-horizontal">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('title'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('title'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('admin_email'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('admin_email'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('template'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('template'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('mobile_template'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('mobile_template'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('language'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('language'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('language_admin'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('language_admin'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('browse_index_type'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('browse_index_type'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('maintenance'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('maintenance'); ?>
                <p class="help-block"><a class="btn btn-mini" href="./admin_phrases.php?action=edit&id=public_maintenance_message&section=public_maintenance"><?php echo $lang['admin_settings_edit_maintenance_message']; ?></a></p>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('head_javascript'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('head_javascript'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('gzip'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('gzip'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Date and Time</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('timezone'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('timezone'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('date_format'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('date_format'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('time_format'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('time_format'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('date_format_input'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('date_format_input'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('date_format_input_seperator'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('date_format_input_seperator'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('time_format_input'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('time_format_input'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Search Engine Optimization</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('mod_rewrite'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('mod_rewrite'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('mod_rewrite_listings_id'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('mod_rewrite_listings_id'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('rewrite_characters'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('rewrite_characters'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('category_mod_rewrite'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('category_mod_rewrite'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('location_mod_rewrite'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('location_mod_rewrite'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('meta_title_default'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('meta_title_default'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('meta_keywords_default'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('meta_keywords_default'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('meta_description_default'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('meta_description_default'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>