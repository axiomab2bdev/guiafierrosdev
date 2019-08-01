<li><a href="./admin_settings.php?group=general"><?php echo $lang['setting_group_general']; ?></a></li>
<li><a href="./admin_settings.php?group=categories"><?php echo $lang['setting_group_categories']; ?></a></li>
<li><a href="./admin_settings.php?group=locations"><?php echo $lang['setting_group_locations']; ?></a></li>
<li><a href="./admin_settings.php?group=users">Users</a></li>
<li><a href="./admin_settings.php?group=listings">Listings</a></li>
<li><a href="./admin_settings.php?group=search"><?php echo $lang['setting_group_search']; ?></a></li>
<li><a href="./admin_settings.php?group=email"><?php echo $lang['setting_group_email']; ?></a></li>
<li><a href="./admin_settings.php?group=invoicing"><?php echo $lang['setting_group_invoicing']; ?></a></li>
<li><a href="./admin_settings.php?group=reviews"><?php echo $lang['setting_group_reviews']; ?></a></li>
<li><a href="./admin_settings.php?group=logos"><?php echo $lang['setting_group_logos']; ?></a></li>
<li><a href="./admin_settings.php?group=classifieds"><?php echo $lang['setting_group_classifieds']; ?></a></li>
<li><a href="./admin_settings.php?group=gallery"><?php echo $lang['setting_group_gallery']; ?></a></li>
<li><a href="./admin_settings.php?group=documents"><?php echo $lang['setting_group_documents']; ?></a></li>
<li><a href="./admin_settings.php?group=banners"><?php echo $lang['setting_group_banners']; ?></a></li>
<li><a href="./admin_settings.php?group=caching"><?php echo $lang['setting_group_caching']; ?></a></li>
<li><a href="./admin_settings.php?group=sideboxes">Side Boxes</a></li>
<?php if(ADDON_BLOG) { ?>
    <li><a href="./admin_settings.php?group=blog"><?php echo $lang['setting_group_blog']; ?></a></li>
<?php } ?>
<?php if(ADDON_WEBSITE_SCREENSHOTS) { ?>
    <li><a href="./admin_settings.php?group=website_screenshots"><?php echo $lang['setting_group_website_screenshots']; ?></a></li>
<?php } ?>
<li><a href="./admin_settings.php?group=other"><?php echo $lang['setting_group_other']; ?></a></li>
<?php if($custom) { ?>
    <li><a href="./admin_settings.php?group=custom"><?php echo $lang['setting_group_custom']; ?></a></li>
<?php } ?>