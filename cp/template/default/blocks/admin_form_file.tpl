<div id="<?php echo $id; ?>_cover" class="file-cover"></div>
<span class="btn file-button">
    <i class="icon-hdd"></i>
    <span>Browse</span>
    <?php echo $field; ?>
</span>
<span class="btn file-button-clear" id="<?php echo $id; ?>_clear">
    <i class="icon-remove"></i>
    <span>Clear File Selection</span>
</span>
<script type="text/javascript">
$("input[id='<?php echo $id; ?>']").change(function() {
    // This fails with non-word characters
    $("#<?php echo $id; ?>_cover").html($(this).val().match(/[^/\\]*[.][\w]+$/i)[0]).css('display', 'inline');
    $("#<?php echo $id; ?>_clear").css('display','inline-block');
});

$("#<?php echo $id; ?>_clear").on("click", function() {
    control = $("input[id='<?php echo $id; ?>']");
    control.replaceWith(control = control.clone(true));
    $("#<?php echo $id; ?>_cover").html('').css('display','none');
    $("#<?php echo $id; ?>_clear").hide();
});

</script>

