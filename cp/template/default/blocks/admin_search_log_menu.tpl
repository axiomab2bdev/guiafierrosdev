<li><a href="admin_search_log.php"><div class="icon icon_doc"></div><?php echo $lang['admin_search_log']; ?></a></li>
<li><a href="admin_search_log.php?action=search" id="search_log_search_link"><div class="icon icon_search"></div><?php echo $lang['admin_search_log_search']; ?></a></li>
<li><a href="admin_search_log.php?action=popular"><div class="icon icon_star"></div><?php echo $lang['admin_search_log_popular']; ?></a></li>
<li><a href="admin_search_log.php?action=noresults"><div class="icon icon_x_red"></div><?php echo $lang['admin_search_log_no_result']; ?></a></li>
<li><a href="admin_search_log.php?action=export"><div class="icon icon_download"></div><?php echo $lang['admin_search_log_export']; ?></a></li>
<li><a href="admin_search_log.php?action=clear" onclick="return confirm('<?php echo $this->escape_js_string($lang['messages_confirm']); ?>');"><div class="icon icon_trash"></div><?php echo $lang['admin_search_log_clear']; ?></a></li>