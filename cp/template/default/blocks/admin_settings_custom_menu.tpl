<li><a href="./admin_settings_custom.php"><div class="icon icon_tools"></div><?php echo $lang['admin_settings_custom']; ?></a></li>
<li><a href="./admin_settings_custom.php?action=add"><div class="icon icon_tools_add"></div><?php echo $lang['admin_settings_custom_add']; ?></a></li>
<?php if($custom_count) { ?>
    <li><a href="./admin_settings.php?group=custom"><div class="icon icon_form"></div><?php echo $lang['admin_settings_custom_view']; ?></a></li>
<?php } ?>