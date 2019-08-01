<li class="well well-small">
    <i class="icon-resize-vertical" style="padding-right: 5px"></i><?php echo $this->escape($day); ?> <?php echo $this->escape($time1); ?> - <?php echo $this->escape($time2); ?><a class="close" aria-hidden="true">&times;</a>
    <input type="hidden" name="<?php echo $this->escape($name); ?>[]" value="<?php echo $this->escape($hour); ?>">
</li>