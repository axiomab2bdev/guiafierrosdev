<li><a href="admin_zip_codes.php"><div class="icon icon_globe"></div><?php echo $lang['admin_zip_codes']; ?></a></li>
<li><a href="admin_zip_codes.php?action=add"><div class="icon icon_globe_add"></div><?php echo $lang['admin_zip_codes_add']; ?></a></li>
<li><a href="admin_zip_codes_search.php"><div class="icon icon_globe_search"></div><?php echo $lang['admin_zip_codes_search']; ?></a></li>
<li><a href="admin_zip_codes_import.php"><div class="icon icon_globe_document"></div><?php echo $lang['admin_zip_codes_import']; ?></a></li>
<li><a href="admin_zip_codes.php?action=clear" onclick="return confirm('<?php echo $this->escape_js_string($lang['messages_confirm']); ?>');"><div class="icon icon_trash"></div>Delete All Zip Codes</a></li>