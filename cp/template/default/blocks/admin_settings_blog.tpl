<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('blog_comments'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('blog_comments'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('blog_comments_captcha'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('blog_comments_captcha'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('blog_posts_per_page'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('blog_posts_per_page'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('blog_sidebox_number'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('blog_sidebox_number'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('blog_sidebox_characters'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('blog_sidebox_characters'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>