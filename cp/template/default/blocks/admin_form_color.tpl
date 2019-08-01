<script type="text/javascript">
$(document).ready(function() {
    $("#<?php echo $name; ?>").miniColors();
    $(".miniColors-trigger").css("vertical-align","top");
});
</script>
<div style="vertical-align: top">
    <input type="text" class="<?php echo $class; ?>" value="<?php echo $this->escape($value); ?>"<?php echo $attributes; ?>>
</div>