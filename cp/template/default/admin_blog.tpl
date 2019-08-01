<h1><?php echo $lang['admin_blog_posts']; ?></h1>
<?php if($form_search) { ?>
    <script type="text/javascript">
    $(document).ready(function() {
        <?php if($_GET['action'] == 'search') { ?>
            $("#blog_search_container").slideToggle();
        <?php } ?>
        $("#blog_search_container .close").click(function() {
            $("#blog_search_container").slideToggle();
            return false;
        });
        $("#blog_search_link").click(function() {
            $("#blog_search_container").slideToggle();
            return false;
        });
    });
    </script>
    <div id="blog_search_container" style="display: none">
        <?php echo $form_search->getFormOpenHTML(array('class'=>'form-horizontal well well-small')); ?>
        <button type="button" class="close">×</button>
        <h2><?php echo $lang['admin_blog_search']; ?></h2>

        <div class="row">
                <div class="span7">
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('keywords'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('keywords'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form_search->getFieldLabel('category'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('category'); ?>
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
                        <?php echo $form_search->getFieldLabel('published'); ?>
                        <div class="controls">
                            <?php echo $form_search->getFieldHTML('published'); ?>
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