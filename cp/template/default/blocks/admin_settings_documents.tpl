<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('documents_allow'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('documents_allow'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('documents_desc_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('documents_desc_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('documents_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('documents_size'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>