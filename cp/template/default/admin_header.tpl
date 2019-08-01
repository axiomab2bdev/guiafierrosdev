<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
    <title><?php echo $lang['admin_general_title']; ?></title>
    <link rel="icon" href="<?php echo BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN; ?>images/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN; ?>bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN; ?>bootstrap-responsive.css" />
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php echo $javascript; ?>

    <script type="text/javascript" src="<?php echo BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN; ?>bootstrap.min.js"></script>
    <script type="text/javascript">
    var btn = $.fn.button.noConflict() // reverts $.fn.button to jqueryui btn
    $.fn.btn = btn
    </script>
    <?php echo $css; ?>
</head>
<body>
<div id="loading">
    <img src="<?php echo BASE_URL_ADMIN.TEMPLATE_PATH_ADMIN; ?>images/loading_bar.gif" />
</div>

<div class="navbar navbar-fixed-top">
    <div class="navbar-header"></div>
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo BASE_URL_ADMIN; ?>"><img class="logo" src="<?php echo $logo; ?>"></a>
            <ul class="nav">
                <li class="dropdown">
                    <a title="Home" href="./admin_index.php"><?php echo $lang['admin_general_menu_home']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <li><a href="./admin_index.php"><?php echo $lang['admin_general_menu_control_panel_home']; ?></a></li>
                        <li><a target="_blank" href="<?php echo BASE_URL_NOSSL; ?>/index.php"><?php echo $lang['admin_general_menu_index']; ?></a></li>
                        <?php if(LOGGED_IN) { ?>
                        <li><a href="./admin_updates.php"><?php echo $lang['admin_general_menu_approve_updates']; ?></a></li>
                        <li><a href="./admin_cancellations.php"><?php echo $lang['admin_general_menu_cancellations']; ?></a></li>
                        <li><a href="./admin_index.php?check=true"><?php echo $lang['admin_general_menu_check_updates']; ?></a></li>
                        <li><a href="./admin_license_information.php"><?php echo $lang['admin_general_menu_license_information']; ?></a></li>
                        <li><a href="./admin_index.php?action=logout"><?php echo $lang['admin_general_menu_logout']; ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="./admin_users.php"><?php echo $lang['admin_general_menu_users']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <li><a href="./admin_users.php"><?php echo $lang['admin_general_menu_users']; ?></a></li>
                        <li><a href="./admin_users.php?action=search"><?php echo $lang['admin_general_menu_users_search']; ?></a></li>
                        <li><a href="./admin_users.php?action=add"><?php echo $lang['admin_general_menu_users_add']; ?></a></li>
                        <li><a href="./admin_users_groups.php"><?php echo $lang['admin_general_menu_users_groups']; ?></a></li>
                        <li><a href="./admin_users_groups.php?action=add"><?php echo $lang['admin_general_menu_users_groups_add']; ?></a></li>
                        <li><a href="./admin_users_merge.php"><?php echo $lang['admin_general_menu_users_merge']; ?></a></li>
                        <li><a href="./admin_contact_requests.php"><?php echo $lang['admin_general_menu_contact_requests']; ?></a></li>
                        <li><a href="./admin_messages.php"><?php echo $lang['admin_general_menu_messages']; ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="./admin_orders.php"><?php echo $lang['admin_general_menu_orders']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <li><a href="./admin_orders.php"><?php echo $lang['admin_general_menu_orders_all']; ?></a></li>
                        <li><a href="./admin_orders.php?status=active"><?php echo $lang['admin_general_menu_orders_active']; ?></a></li>
                        <li><a href="./admin_orders.php?status=completed"><?php echo $lang['admin_general_menu_orders_completed']; ?></a></li>
                        <li><a href="./admin_orders.php?status=pending"><?php echo $lang['admin_general_menu_orders_pending']; ?></a></li>
                        <li><a href="./admin_orders.php?status=suspended"><?php echo $lang['admin_general_menu_orders_suspended']; ?></a></li>
                        <li><a href="./admin_orders.php?status=canceled"><?php echo $lang['admin_general_menu_orders_canceled']; ?></a></li>
                        <li><a href="./admin_orders.php?status=fraud"><?php echo $lang['admin_general_menu_orders_fraud']; ?></a></li>
                        <li><a href="./admin_orders_add.php"><?php echo $lang['admin_general_menu_orders_add']; ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="./admin_listings_search.php"><?php echo $lang['admin_general_menu_listings']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <li><a href="./admin_orders_add.php?type=listing_membership"><?php echo $lang['admin_general_menu_listings_add']; ?></a></li>
                        <li><a href="./admin_listings_search.php"><?php echo $lang['admin_general_menu_listings_search']; ?></a></li>
                        <li><a href="./admin_listings.php"><?php echo $lang['admin_general_menu_listings_all']; ?></a></li>
                        <li><a href="./admin_listings.php?status=active"><?php echo $lang['admin_general_menu_listings_active']; ?></a></li>
                        <li><a href="./admin_listings.php?status=pending"><?php echo $lang['admin_general_menu_listings_pending']; ?></a></li>
                        <li><a href="./admin_listings.php?status=suspended"><?php echo $lang['admin_general_menu_listings_suspended']; ?></a></li>
                        <li><a href="./admin_reviews.php"><?php echo $lang['admin_general_menu_listings_reviews']; ?></a></li>
                        <li><a href="./admin_listings_move.php"><?php echo $lang['admin_general_menu_listings_move']; ?></a></li>
                        <li><a href="./admin_listings_suggestions.php"><?php echo $lang['admin_general_menu_listings_suggestions']; ?></a></li>
                        <li><a href="./admin_listings_claims.php"><?php echo $lang['admin_general_menu_listings_claims']; ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="./admin_invoices.php"><?php echo $lang['admin_general_menu_billing']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <li><a href="./admin_invoices.php"><?php echo $lang['admin_general_menu_invoices']; ?></a></li>
                        <li><a href="./admin_transactions.php"><?php echo $lang['admin_general_menu_transactions']; ?></a></li>
                        <li><a href="./admin_gateways_log.php"><?php echo $lang['admin_general_menu_gateway_log']; ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#"><?php echo $lang['admin_general_menu_tools']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <li><a href="./admin_templates.php"><?php echo $lang['admin_general_menu_templates_manager']; ?></a></li>
                        <li><a href="./admin_pages.php"><?php echo $lang['admin_general_menu_pages_manager']; ?></a></li>
                        <li><a href="./admin_menu_links.php"><?php echo $lang['admin_general_menu_links_manager']; ?></a></li>
                        <li><a href="./admin_banners_types.php"><?php echo $lang['admin_general_menu_banners']; ?></a></li>
                        <?php if(ADDON_BLOG) { ?><li><a href="./admin_blog.php"><?php echo $lang['admin_general_menu_blog']; ?></a></li><?php } ?>
                        <li><a href="./admin_import.php"><?php echo $lang['admin_general_menu_importer']; ?></a></li>
                        <li><a href="./admin_export.php"><?php echo $lang['admin_general_menu_exporter']; ?></a></li>
                        <li><a href="./admin_backup.php"><?php echo $lang['admin_general_menu_backup_manager']; ?></a></li>
                        <li><a href="./admin_fields_groups.php"><?php echo $lang['admin_general_menu_field_editor']; ?></a></li>
                        <li><a href="./admin_email_campaigns.php"><?php echo $lang['admin_general_menu_email_manager']; ?></a></li>
                        <li><a href="./admin_remote_features.php"><?php echo $lang['admin_general_menu_remote_features']; ?></a></li>
                        <?php if(ADDON_LINK_CHECKER) { ?><li><a href="./admin_link_checker.php"><?php echo $lang['admin_general_menu_link_checker']; ?></a></li><?php } ?>
                        <?php if(ADDON_SITE_LINKS) { ?><li><a href="./admin_site_links.php"><?php echo $lang['admin_general_menu_site_links']; ?></a></li><?php } ?>
                        <?php if(ADDON_FAQ) { ?>
                            <li class="dropdown-submenu"><a href="#"><?php echo $lang['admin_general_menu_faq']; ?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="./admin_faq_categories.php"><?php echo $lang['admin_general_menu_faq_categories']; ?></a></li>
                                    <li><a href="./admin_faq_questions.php"><?php echo $lang['admin_general_menu_faq_questions']; ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li><a href="./admin_feeds_external.php"><?php echo $lang['admin_general_menu_external_feeds']; ?></a></li>
                        <li class="dropdown-submenu"><a href="javascript:void(0);"><?php echo $lang['admin_general_menu_reports']; ?></a>
                            <ul class="dropdown-menu">
                                <li><a href="./admin_listings_csv_statistics.php"><?php echo $lang['admin_general_menu_statistics']; ?></a></li>
                                <li><a href="./admin_log.php"><?php echo $lang['admin_general_menu_activity_log']; ?></a></li>
                                <li><a href="./admin_search_log.php"><?php echo $lang['admin_general_menu_search_log']; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php if($plugin_links) { ?>
                <li class="dropdown">
                    <a href="./admin_plugins.php"><?php echo $lang['admin_general_menu_plugins']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <?php foreach($plugin_links AS $key=>$link) { ?>
                            <li><a href="./admin_plugin_page.php?id=<?php echo $key; ?>"><?php echo $link['menu']['menu_text']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><?php echo $lang['admin_general_menu_setup']; ?></a>
                    <ul class="dropdown-menu">
                        <li class="top_border"></li>
                        <li><a href="./admin_settings.php"><?php echo $lang['admin_general_menu_settings']; ?></a></li>
                        <li class="dropdown-submenu"><a href="./admin_languages.php"><?php echo $lang['admin_general_menu_language']; ?></a>
                            <ul class="dropdown-menu">
                                <li><a href="./admin_languages.php"><?php echo $lang['admin_general_menu_languages']; ?></a></li>
                                <li><a href="./admin_phrases.php"><?php echo $lang['admin_general_menu_phrases']; ?></a></li>
                                <li><a href="./admin_phrases_replace.php"><?php echo $lang['admin_general_menu_phrases_find']; ?></a></li>
                            </ul>
                        </li>
                        <li><a href="./admin_categories.php"><?php echo $lang['admin_general_menu_categories']; ?></a></li>
                        <li><a href="./admin_locations.php"><?php echo $lang['admin_general_menu_locations']; ?></a></li>
                        <li><a href="./admin_payment_gateways.php"><?php echo $lang['admin_general_menu_payment_gateways']; ?></a></li>
                        <li><a href="./admin_products.php"><?php echo $lang['admin_general_menu_products']; ?></a></li>
                        <li><a href="./admin_tax.php"><?php echo $lang['admin_general_menu_tax_rates']; ?></a></li>
                        <?php if(ADDON_DISCOUNT_CODES) { ?><li><a href="./admin_discount_codes.php"><?php echo $lang['admin_general_menu_discount_codes']; ?></a></li><?php } ?>
                        <li><a href="./admin_email_templates.php"><?php echo $lang['admin_general_menu_email_templates']; ?></a></li>
                        <li><a href="./admin_zip_codes.php"><?php echo $lang['admin_general_menu_zip_codes']; ?></a></li>
                        <li><a href="./admin_captchas.php"><?php echo $lang['admin_general_menu_captcha']; ?></a></li>
                        <li><a href="./admin_sms_gateways.php"><?php echo $lang['admin_general_menu_sms_gateways']; ?></a></li>
                        <li><a href="./admin_plugins.php"><?php echo $lang['admin_general_menu_plugins']; ?></a></li>
                        <li><a href="./admin_settings_custom.php"><?php echo $lang['admin_general_menu_custom_settings']; ?></a></li>
                        <li><a href="./admin_maintenance.php"><?php echo $lang['admin_general_menu_maintenance']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <?php if(LOGGED_IN) { ?>
                <form class="navbar-form pull-left" action="">
                    <input id="quicksearch" autocomplete="off" type="text" class="span4" placeholder="<?php echo $lang['admin_general_quick_search']; ?>">
                </form>
                <div class="pull-right">
                    <div class="header-shortcuts">
                        <a class="btn" href="./admin_calendar.php"><i class="icon-calendar"></i></a>
                        <a class="btn" title="<?php echo $lang['admin_general_menu_settings']; ?>" href="./admin_settings.php"><i class="icon-wrench"></i></a>
                        <?php if(!ADDON_UNBRANDING) { ?>
                            <a class="btn" target="_blank" href="http://manual.phpmydirectory.com"><i class="icon-question-sign"></i></a>
                        <?php } ?>
                    </div>
                    <a class="btn" title="<?php echo $admin_name; ?>" href="./admin_users_summary.php?id=<?php echo $_SESSION['admin_id']; ?>"><i class="icon-user"></i></a>
                    <a class="btn" href="./admin_index.php?action=logout"><i class="icon-lock"></i> <?php echo $lang['admin_general_menu_logout']; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div align="left" id="quicksearchresults"></div>
<div class="container">
    <div class="row">
    <?php if(LOGGED_IN AND $template_page_menu) { ?>
        <div class="span5">
            <?php echo $template_page_menu; ?>
        </div>
        <div class="span19">
    <?php } else { ?>
        <div class="span24">
    <?php } ?>
<?php echo $message; ?>
