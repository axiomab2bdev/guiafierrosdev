<script type="text/javascript">
$(document).ready(function() {
    $("#listing_delete").click(function(e) {
        return confirm(<?php echo $this->escape_js($lang['messages_confirm']); ?>);
    });
});
</script>
<h2>Listing: <?php echo $title; ?></h2>
<div class="btn-toolbar">
    <a href="admin_orders.php?action=edit&id=<?php echo $order_id; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-small<?php if($active == 'order') { ?> active<?php } ?>">Order Details</a>
    <a href="admin_listings.php?action=edit&id=<?php echo $id; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-small<?php if($active == 'edit') { ?> active<?php } ?>">Edit Listing</a>
    <div class="btn-group">
        <a href="admin_images.php?listing_id=<?php echo $id; ?>" class="btn btn-small<?php if($active == 'images') { ?> active<?php } ?>">Images</a>
        <a href="admin_images.php?action=add&listing_id=<?php echo $id; ?>" class="btn btn-small"><i class="icon-plus"></i></a>
    </div>
    <div class="btn-group">
        <a href="admin_documents.php?listing_id=<?php echo $id; ?>" class="btn btn-small<?php if($active == 'documents') { ?> active<?php } ?>">Documents</a>
        <a href="admin_documents.php?action=add&listing_id=<?php echo $id; ?>" class="btn btn-small"><i class="icon-plus"></i></a>
    </div>
    <div class="btn-group">
        <a href="admin_classifieds.php?listing_id=<?php echo $id; ?>" class="btn btn-small<?php if($active == 'classifieds') { ?> active<?php } ?>">Classifieds</a>
        <a href="admin_classifieds.php?action=add&listing_id=<?php echo $id; ?>" class="btn btn-small"><i class="icon-plus"></i></a>
    </div>
    <div class="btn-group">
        <a href="admin_banners.php?listing_id=<?php echo $id; ?>" class="btn btn-small<?php if($active == 'banners') { ?> active<?php } ?>">Banners</a>
        <a href="admin_banners.php?action=add&listing_id=<?php echo $id; ?>" class="btn btn-small"><i class="icon-plus"></i></a>
    </div>
    <div class="btn-group">
        <a href="admin_reviews.php?listing_id=<?php echo $id; ?>" class="btn btn-small<?php if($active == 'reviews') { ?> active<?php } ?>">Reviews</a>
        <a href="admin_reviews.php?action=add&listing_id=<?php echo $id; ?>" class="btn btn-small"><i class="icon-plus"></i></a>
    </div>
    <div class="btn-group">
        <a href="admin_ratings.php?listing_id=<?php echo $id; ?>" class="btn btn-small<?php if($active == 'ratings') { ?> active<?php } ?>">Ratings</a>
        <a href="admin_ratings.php?action=add&listing_id=<?php echo $id; ?>" class="btn btn-small"><i class="icon-plus"></i></a>
    </div>
    <a href="admin_listings_statistics.php?listing_id=<?php echo $id; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-small<?php if($active == 'statistics') { ?> active<?php } ?>">Statistics</a>
    <a id="listing_delete" href="admin_listings.php?action=delete&id=<?php echo $id; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-small btn-danger">Delete</a>
</div>