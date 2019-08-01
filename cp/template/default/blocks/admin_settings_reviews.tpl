<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend>Reviews</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('reviews_status'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('reviews_status'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('reviews_require_login'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('reviews_require_login'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('reviews_captcha'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('reviews_captcha'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('review_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('review_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('reviews_comments_status'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('reviews_comments_status'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Ratings</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('ratings_require_login'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('ratings_require_login'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('ratings_require_review'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('ratings_require_review'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>
