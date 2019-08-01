<h1><?php echo $lang['admin_maintenance_db_info']; ?></h1>
<p><?php echo $lang['admin_maintenance_db_name']; ?>: <?php echo DB_NAME; ?></p>
<p><?php echo $lang['admin_maintenance_db_version']; ?>: <?php echo $mysql_version; ?></p>
<p><?php echo $lang['admin_maintenance_legend']; ?>: <span class="icon icon_gears"></span><?php echo $lang['admin_maintenance_optimize']; ?> <span class="icon icon_tools"></span><?php echo $lang['admin_maintenance_repair']; ?></p>
<?php echo $table_list; ?>