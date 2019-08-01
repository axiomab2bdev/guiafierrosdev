<h1><?php echo $lang['admin_mail_mailer']; ?></h1>
<div class="form-container">
<?php echo $form->getFormOpenHTML(); ?>
<fieldset>
    <legend><?php echo $lang['admin_mail_batch_information']; ?></legend>
    <ol>
        <li><?php echo $form->getFieldLabel('batch_name'); ?><?php echo $form->getFieldHTML('batch_name'); ?></li>
        <li><?php echo $form->getFieldLabel('batch_description'); ?><?php echo $form->getFieldHTML('batch_description'); ?></li>
    </ol>
</fieldset>
<fieldset>
    <legend><?php echo $lang['admin_mail_from_information']; ?></legend>
    <ol>
        <li><?php echo $form->getFieldLabel('from_name'); ?><?php echo $form->getFieldHTML('from_name'); ?></li>
        <li><?php echo $form->getFieldLabel('from_email'); ?><?php echo $form->getFieldHTML('from_email'); ?></li>
    </ol>
</fieldset>
<fieldset>
    <legend><?php echo $lang['admin_mail_filter']; ?></legend>
    <ol>
        <li><?php echo $form->getFieldLabel('pricing_id'); ?><?php echo $form->getFieldHTML('pricing_id'); ?></li>
        <li><?php echo $form->getFieldLabel('include_listing_emails'); ?><?php echo $form->getFieldHTML('include_listing_emails'); ?></li>
        <li><?php echo $form->getFieldLabel('status'); ?><?php echo $form->getFieldHTML('status'); ?></li>
        <?php if(!$form->isFieldHidden('categories') AND $form->fieldExists('categories')) { ?>
            <li><?php echo $form->getFieldLabel('categories'); ?><?php echo $form->getFieldHTML('categories'); ?></li>
        <?php } ?>
        <?php if(!$form->isFieldHidden('locations') AND $form->fieldExists('locations')) { ?>
            <li><?php echo $form->getFieldLabel('locations'); ?><?php echo $form->getFieldHTML('locations'); ?></li>    
        <?php } ?>
        <li>
            <label><?php echo $lang['admin_mail_submission_date']; ?>: </label>
            <?php echo $form->getFieldHTML('date_from'); ?><?php echo $form->getFieldPicker('date_from'); ?>  <?php echo $lang['admin_mail_to']; ?>   
            <?php echo $form->getFieldHTML('date_to'); ?><?php echo $form->getFieldPicker('date_to'); ?>
        </li>
    </ol>
</fieldset>
<fieldset>
    <legend><?php echo $lang['admin_mail_message']; ?><?php echo $form->getFieldSetHelp('message'); ?></legend>
    <ol>
        <li><?php echo $form->getFieldLabel('subject'); ?><?php echo $form->getFieldHTML('subject'); ?></li>
        <li><?php echo $form->getFieldLabel('body_plain'); ?><?php echo $form->getFieldHTML('body_plain'); ?></li>
        <li><?php echo $form->getFieldLabel('body_html'); ?><?php echo $form->getFieldHTML('body_html'); ?></li>
        <li><?php echo $form->getFieldLabel('attachment'); ?><?php echo $form->getFieldHTML('attachment'); ?></li>
        <li><?php echo $form->getFieldLabel('copy_to'); ?><?php echo $form->getFieldHTML('copy_to'); ?></li>
    </ol>
</fieldset>
<fieldset class="buttonrow">
    <?php echo $form->getFieldHTML('send'); ?>
</fieldset>    
<?php echo $form->getFormCloseHTML(); ?>
</div>