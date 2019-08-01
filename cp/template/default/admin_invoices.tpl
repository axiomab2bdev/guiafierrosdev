<?php if($users_summary_header) { ?>
    <?php echo $users_summary_header; ?>
    <h2><?php echo $title ?></h2>
<?php } else { ?>
    <h1><?php echo $title ?></h1>
<?php } ?>
<?php if($form_search) { ?>
    <script type="text/javascript">
    $(document).ready(function() {
        <?php if($_GET['action'] == 'search') { ?>
            $("#invoice_search_container").slideToggle();
        <?php } ?>
        $("#invoice_search_container .close").click(function() {
            $("#invoice_search_container").slideToggle();
            return false;
        });
        $("#invoice_search_link").click(function() {
            $("#invoice_search_container").slideToggle();
            return false;
        });
    });
    </script>
    <div id="invoice_search_container" style="display: none; margin-top: 20px;">
        <?php echo $form_search->getFormOpenHTML(array('class'=>'form-horizontal well well-small')); ?>
        <button type="button" class="close">×</button>
        <h2><?php echo $lang['admin_invoices_search']; ?></h2>
        <div class="row">
                <div class="span7">
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('id'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('id'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('status'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('status'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('total'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('total'); ?>
                        </div>
                    </div>
                </div>
                <div class="span7">
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('date'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('date'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('date_due'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('date_due'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('gateway_id'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('gateway_id'); ?>
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