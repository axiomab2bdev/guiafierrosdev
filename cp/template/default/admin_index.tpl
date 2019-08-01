<h1><?php echo $lang['admin_index_summary']; ?></h1>
<div id="admin_index_statistics">
    <div class="row">
        <div class="span6">
            <h3><?php echo $lang['admin_index_users']; ?></h3>
            <ul>
                <li><?php echo $lang['admin_index_users']; ?><a class="badge <?php if($total_users > 0) { ?>badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_users.php"><?php echo $total_users; ?></a></li>
                <li><?php echo $lang['admin_index_users_email_unconfirmed']; ?><a class="badge <?php if($users_unconfirmed_email > 0) { ?> badge-info<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_users.php?group_id=5"><?php echo $users_unconfirmed_email; ?></a></li>
                <li><?php echo $lang['admin_index_users_no_order']; ?><a class="badge <?php if($users_without_order > 0) { ?> badge-info<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_users.php?status=no_order"><?php echo $users_without_order; ?></a></li>
                <li><?php echo $lang['admin_index_users_this_week']; ?><a class="badge <?php if($users_this_week > 0) { ?> badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_users.php?status=this_week"><?php echo $users_this_week; ?></a></li>
            </ul>
        </div>
        <div class="span6">
            <h3><?php echo $lang['admin_index_orders']; ?></h3>
            <ul>
                <li><?php echo $lang['admin_index_orders_active']; ?><a class="badge <?php if($order_statuses['active'] > 0) { ?> badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_orders.php?status=active"><?php echo $order_statuses['active']; ?></a></li>
                <li><?php echo $lang['admin_index_orders_completed']; ?><a class="badge <?php if($order_statuses['completed'] > 0) { ?> badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_orders.php?status=completed"><?php echo $order_statuses['completed']; ?></a></li>
                <li><?php echo $lang['admin_index_orders_suspended']; ?><a class="badge <?php if($order_statuses['suspended'] > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_orders.php?status=suspended"><?php echo $order_statuses['suspended']; ?></a></li>
                <li><?php echo $lang['admin_index_orders_pending']; ?><a class="badge <?php if($order_statuses['pending'] > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_orders.php?status=pending"><?php echo $order_statuses['pending']; ?></a></li>
                <li><?php echo $lang['admin_index_orders_fraud']; ?><a class="badge <?php if($order_statuses['fraud'] > 0) { ?> badge-info<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_orders.php?status=fraud"><?php echo $order_statuses['fraud']; ?></a></li>
                <li><?php echo $lang['admin_index_orders_canceled']; ?><a class="badge" href="<?php echo BASE_URL_ADMIN; ?>/admin_orders.php?status=canceled"><?php echo $order_statuses['canceled']; ?></a></li>
            </ul>
        </div>
        <div class="span6">
            <h3><?php echo $lang['admin_index_invoices']; ?></h3>
            <ul>
                <li><?php echo $lang['admin_index_invoices_due_today']; ?><a class="badge <?php if($invoices_due_today > 0) { ?> badge-info<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_invoices.php?status=due_today"><?php echo $invoices_due_today; ?></a></li>
                <li><?php echo $lang['admin_index_invoices_paid']; ?><a class="badge <?php if($invoice_statuses['paid'] > 0) { ?> badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_invoices.php?status=paid"><?php echo $invoice_statuses['paid']; ?></a></li>
                <li><?php echo $lang['admin_index_invoices_unpaid']; ?><a class="badge <?php if($invoice_statuses['unpaid'] > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_invoices.php?status=unpaid"><?php echo $invoice_statuses['unpaid']; ?></a></li>
                <li><?php echo $lang['admin_index_invoices_overdue']; ?><a class="badge <?php if($invoices_overdue > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_invoices.php?status=overdue"><?php echo $invoices_overdue; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="span6">
            <h3><?php echo $lang['admin_index_listings']; ?></h3>
            <ul>
                <li><?php echo $lang['admin_index_listings']; ?><a class="badge <?php if($total_listings > 0) { ?> badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_listings.php"><?php echo $total_listings; ?></a></li>
                <li><?php echo $lang['admin_index_listings_suggestions']; ?><a class="badge <?php if($listing_suggestions > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_listings_suggestions.php"><?php echo $listing_suggestions; ?></a></li>
                <li><?php echo $lang['admin_index_listings_claims']; ?><a class="badge <?php if($listing_claims > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_listings_claims.php"><?php echo $listing_claims; ?></a></li>
                <li><?php echo $lang['admin_index_listings_updates']; ?><a class="badge <?php if($pending_updates > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_updates.php"><?php echo $pending_updates; ?></a></li>
                <li><?php echo $lang['admin_index_listings_no_coordinates']; ?><a class="badge <?php if($listings_without_coordinates > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_listings.php?coordinates=no"><?php echo $listings_without_coordinates; ?></a></li>
            </ul>
        </div>
        <div class="span6">
            <h3><?php echo $lang['admin_index_reviews']; ?></h3>
            <ul>
                <li><?php echo $lang['admin_index_reviews_active']; ?><a class="badge <?php if($review_statuses['active'] > 0) { ?> badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_reviews.php?status=active"><?php echo $review_statuses['active']; ?></a></li>
                <li><?php echo $lang['admin_index_reviews_pending']; ?><a class="badge <?php if($review_statuses['pending'] > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_reviews.php?status=pending"><?php echo $review_statuses['pending']; ?></a></li>
                <li><?php echo $lang['admin_index_reviews_ratings']; ?><a class="badge <?php if($total_ratings > 0) { ?> badge-success<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_ratings.php"><?php echo $total_ratings; ?></a></li>
                <li><?php echo $lang['admin_index_reviews_comments_pending']; ?><a class="badge<?php if($pending_comments > 0) { ?>badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_reviews_comments.php?status=pending"><?php echo $pending_comments; ?></a></li>
            </ul>
        </div>
        <div class="span6">
            <h3><?php echo $lang['admin_index_other']; ?></h3>
            <ul>
                <li><?php echo $lang['admin_index_other_categories']; ?><a class="badge" href="<?php echo BASE_URL_ADMIN; ?>/admin_categories.php"><?php echo $total_categories; ?></a></li>
                <li><?php echo $lang['admin_index_other_locations']; ?><a class="badge" href="<?php echo BASE_URL_ADMIN; ?>/admin_locations.php"><?php echo $total_locations; ?></a></li>
                <li><?php echo $lang['admin_index_other_emails']; ?><a class="badge<?php if($email_queue > 0) { ?> badge-info<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_email_queue.php"><?php echo $email_queue; ?></a></li>
                <li><?php echo $lang['admin_index_moderated_emails']; ?><a class="badge<?php if($email_queue_moderate > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_email_queue.php?moderate=1"><?php echo $email_queue_moderate; ?></a></li>
                <li><?php echo $lang['admin_index_cancellations']; ?><a class="badge<?php if($order_cancellations > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_cancellations.php"><?php echo $order_cancellations; ?></a></li>
                <?php if(ADDON_BLOG) { ?>
                    <li><?php echo $lang['admin_index_blog_comments_pending']; ?><a class="badge<?php if($blog_pending > 0) { ?> badge-important<?php } ?>" href="<?php echo BASE_URL_ADMIN; ?>/admin_blog_comments.php?status=pending"><?php echo $blog_pending; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>