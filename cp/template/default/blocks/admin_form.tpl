<div class="form-container">
    <?php echo $open; ?>
    <?php foreach($fieldsets AS $fieldset) { ?>
        <?php echo $fieldset; ?>
    <?php } ?>
    <?php if($actions) { ?>
        <div class="form-actions">
            <?php echo $actions; ?>
        </div>
    <?php } ?>
    <?php echo $hidden_fields; ?>
    <?php echo $close; ?>
</div>