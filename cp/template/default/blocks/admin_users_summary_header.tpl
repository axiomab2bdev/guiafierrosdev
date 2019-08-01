<h1>User: <?php echo $name; ?></h1>
<div class="btn-toolbar">
    <a class="btn<?php if($active == 'summary') { ?> active<?php } ?>" href="admin_users_summary.php?id=<?php echo $id; ?>"><i class="icon-user"></i> <?php echo $lang['admin_users_summary']; ?></a>
    <a class="btn<?php if($active == 'profile') { ?> active<?php } ?>" href="admin_users.php?action=edit&id=<?php echo $id; ?>"><i class="icon-pencil"></i> <?php echo $lang['admin_users_profile']; ?></a>
    <div class="btn-group">
        <a class="btn<?php if($active == 'orders') { ?> active<?php } ?>" href="admin_orders.php?user_id=<?php echo $id; ?>"><i class="icon-shopping-cart"></i> <?php echo $lang['admin_users_orders']; ?></a>
        <button class="btn dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="">Add Order</a></li>
            <li><a href="">Search Orders</a></li>
            <li><a href="">Active Orders</a></li>
            <li><a href="">Pending Orders</a></li>
            <li><a href="">Suspended Orders</a></li>
            <li><a href="">Canceled Orders</a></li>
            <li><a href="">Fraud Orders</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <a class="btn<?php if($active == 'invoices') { ?> active<?php } ?>" href="admin_invoices.php?user_id=<?php echo $id; ?>"><i class="icon-file"></i> <?php echo $lang['admin_users_invoices']; ?></a>
        <button class="btn dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="admin_invoices.php?action=add&user_id=<?php echo $id; ?>">Add Invoice</a></li>
            <li><a href="admin_invoices.php?action=search&user_id=<?php echo $id; ?>">Search Invoices</a></li>
        </ul>
    </div>

    <a class="btn<?php if($active == 'transactions') { ?> active<?php } ?>" href="admin_transactions.php?user_id=<?php echo $id; ?>"><i class="icon-list"></i> <?php echo $lang['admin_users_transactions']; ?></a>
    <div class="btn-group">
        <a class="btn<?php if($active == 'reviews') { ?> active<?php } ?>" href="admin_reviews.php?user_id=<?php echo $id; ?>"><i class="icon-comment"></i> <?php echo $lang['admin_users_reviews']; ?></a>
        <button class="btn dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="admin_reviews.php?action=add&user_id=<?php echo $id; ?>">Add Review</a></li>
            <li><a href="admin_reviews.php?status=active&user_id=<?php echo $id; ?>">Active Reviews</a></li>
            <li><a href="admin_reviews.php?status=pending&user_id=<?php echo $id; ?>">Pending Reviews</a></li>
            <li><a href="admin_reviews_comments.php?&user_id=<?php echo $id; ?>">Comments</a></li>
            <li><a href="admin_reviews_comments.php?status=active&user_id=<?php echo $id; ?>">Active Comments</a></li>
            <li><a href="admin_reviews_comments.php?status=pending&user_id=<?php echo $id; ?>">Pending Comments</a></li>
        </ul>
    </div>
    <a class="btn<?php if($active == 'ratings') { ?> active<?php } ?>" href="admin_ratings.php?user_id=<?php echo $id; ?>"><i class="icon-star"></i> <?php echo $lang['admin_users_ratings']; ?></a>
    <a class="btn<?php if($active == 'email_log') { ?> active<?php } ?>" href="admin_email_log.php?user_id=<?php echo $id; ?>"><i class="icon-envelope"></i> <?php echo $lang['admin_users_emails']; ?></a>
</div>