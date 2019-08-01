<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $form->getFieldSetLabel('login_form'); ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('admin_login'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('admin_login'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('admin_pass'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('admin_pass'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('remember'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('remember'); ?>
            </div>
        </div>
        <div class="form-actions">
            <?php echo $form->getFieldHTML('submit_login'); ?>
            <a class="btn" href="admin_password_reset.php"><?php echo $lang['admin_login_password_reminder']; ?></a>
        </div>
    </fieldset>
    <?php echo $form->getFormCloseHTML(); ?>
</div>
<script type="text/javascript"><!--
document.login_form.admin_login.focus();
//--></script>