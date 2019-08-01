<h1><?php echo $lang['admin_mail_queue']; ?></h1>
<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_mail_queue']; ?></legend>
        <ol>
            <li><?php echo $form->getFieldLabel('process_number'); ?><?php echo $form->getFieldHTML('process_number'); ?> <?php echo $form->getFieldHTML('send'); ?></li>
        </ol>
    </fieldset>
    <?php echo $form->getFormCloseHTML(); ?>
</div>
<?php echo $table_list; ?>