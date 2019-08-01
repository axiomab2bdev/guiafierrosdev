<?php if($users_summary_header) { ?>
    <?php echo $users_summary_header; ?>
    <?php if($listing_header) { ?>
        <?php echo $listing_header; ?>
    <?php } else { ?>
        <h2><?php echo $lang['admin_orders']; ?></h2>
    <?php } ?>
<?php } else { ?>
    <h1><?php echo $lang['admin_orders']; ?></h1>
<?php } ?>
<?php if($form_search) { ?>
    <script type="text/javascript">
    $(document).ready(function() {
        <?php if($_GET['action'] == 'search') { ?>
            $("#order_search_container").slideToggle();
        <?php } ?>
        $("#order_search_container .close").click(function() {
            $("#order_search_container").slideToggle();
            return false;
        });
        $("#order_search_link").click(function() {
            $("#order_search_container").slideToggle();
            return false;
        });
    });
    </script>
    <div id="order_search_container" style="display: none; margin-top: 20px;">
        <?php echo $form_search->getFormOpenHTML(array('class'=>'form-horizontal well well-small')); ?>
        <button type="button" class="close">×</button>
        <h2><?php echo $lang['admin_orders_search']; ?></h2>
        <div class="row">
            <div class="span7">
                <div class="control-group">
                    <?php echo $form_search->getFieldLabel('id'); ?>
                    <div class="controls">
                        <?php echo $form_search->getFieldHTML('id'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <?php echo $form_search->getFieldLabel('order_id'); ?>
                    <div class="controls">
                        <?php echo $form_search->getFieldHTML('order_id'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <?php echo $form_search->getFieldLabel('pricing_ids'); ?>
                    <div class="controls">
                        <?php echo $form_search->getFieldHTML('pricing_ids'); ?>
                    </div>
                </div>
            </div>
            <div class="span7">
                <div class="control-group">
                    <?php echo $form_search->getFieldLabel('status'); ?>
                    <div class="controls">
                        <?php echo $form_search->getFieldHTML('status'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <?php echo $form_search->getFieldLabel('date'); ?>
                    <div class="controls">
                        <?php echo $form_search->getFieldHTML('date'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <?php echo $form_search->getFieldLabel('user_id'); ?>
                    <div class="controls">
                        <?php echo $form_search->getFieldHTML('user_id'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <?php echo $form_search->getFieldHTML('submit'); ?>
        </div>
        <?php echo $form_search->getFormCloseHTML(); ?>
    </div>
<?php } ?>
<?php echo $content; ?>