<div <?php if(isset($id)) { ?>id="<?php echo $id; ?>" <?php } ?> class="well" style="padding: 8px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><?php echo $title; ?></li>
        <li class="divider"></li>
        <?php echo $content; ?>
    </ul>
</div>