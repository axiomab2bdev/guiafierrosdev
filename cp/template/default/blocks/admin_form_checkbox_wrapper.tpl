<?php if($columns AND count($columns) > 0) { ?>
    <div class="row-fluid">
        <div class="span6">
<?php } ?>
<?php foreach($fields AS $key=>$field) { ?>
    <?php echo $field; ?>
    <?php if(isset($new_column_indexes) AND in_array($key,$new_column_indexes)) { ?>
        </div><div class="span6 offset1">
    <?php } ?>
<?php } ?>
<?php if($columns AND count($columns) > 0) { ?>
        </div>
    </div>
<?php } ?>
<?php if($checkall) { ?>
    <p class="help-block">
        <a class="btn btn-mini" href="#" onclick="$('#<?php echo $id; ?>_controls :checkbox').each(function(){this.checked = true;}); return false;"><?php echo $lang['check_all']; ?></a>
        <a class="btn btn-mini" href="#" onclick="$('#<?php echo $id; ?>_controls :checkbox').each(function(){this.checked = false;}); return false;"><?php echo $lang['uncheck_all']; ?></a>
    </p>
<?php } ?>
<?php echo $html; ?>