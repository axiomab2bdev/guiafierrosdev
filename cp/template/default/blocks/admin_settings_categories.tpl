<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('category_num_columns'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('category_num_columns'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('category_vertical_sort'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('category_vertical_sort'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('cat_empty_hidden'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('cat_empty_hidden'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('show_indexes'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('show_indexes'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('show_subs_number'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('show_subs_number'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('show_category_title'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('show_category_title'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('show_category_description'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('show_category_description'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Other</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('category_setup'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('category_setup'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('category_browse_children'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('category_browse_children'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('html_editor_categories'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('html_editor_categories'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('category_select_type'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('category_select_type'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>