<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <ol>
            <li><?php echo $form->getFieldLabel('offer_image_width'); ?><?php echo $form->getFieldHTML('offer_image_width'); ?></li>
            <li><?php echo $form->getFieldLabel('offer_image_height'); ?><?php echo $form->getFieldHTML('offer_image_height'); ?></li>
            <li><?php echo $form->getFieldLabel('offer_thumb_width'); ?><?php echo $form->getFieldHTML('offer_thumb_width'); ?></li>
            <li><?php echo $form->getFieldLabel('offer_thumb_height'); ?><?php echo $form->getFieldHTML('offer_thumb_height'); ?></li>
            <li><?php echo $form->getFieldLabel('offer_description_size'); ?><?php echo $form->getFieldHTML('offer_description_size'); ?></li>
            <li><?php echo $form->getFieldLabel('offer_image_size'); ?><?php echo $form->getFieldHTML('offer_image_size'); ?></li>
        </ol>
    </fieldset>
    <fieldset>
        <legend>Resizing</legend>
        <ol>
            <li><?php echo $form->getFieldLabel('offer_image_small'); ?><?php echo $form->getFieldHTML('offer_image_small'); ?></li>
            <li><?php echo $form->getFieldLabel('offer_thumb_small'); ?><?php echo $form->getFieldHTML('offer_thumb_small'); ?></li>
            <li><?php echo $form->getFieldLabel('offer_thumb_crop'); ?><?php echo $form->getFieldHTML('offer_thumb_crop'); ?></li>
        </ol>
    </fieldset>
    <fieldset>
        <legend>Other</legend>
        <ol>
            <li><?php echo $form->getFieldLabel('offers_images_formats'); ?><?php echo $form->getFieldHTML('offers_images_formats'); ?></li>
        </ol>
    </fieldset>
    <fieldset class="buttonrow">
        <?php echo $form->getFieldHTML('submit'); ?>
    </fieldset>
    <?php echo $form->getFormCloseHTML(); ?>
</div>