<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend>Display</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_display_all'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_display_all'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('count_search'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('count_search'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_short_desc_size'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_short_desc_size'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('alpha_index_show'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('alpha_index_show'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('alpha_index_search'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('alpha_index_search'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('count_directory'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('count_directory'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Options</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_restriction_time'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_restriction_time'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_require_values'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_require_values'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('spell_checker'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('spell_checker'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_category_children'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_category_children'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_location_children'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_location_children'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_allow_partial_zip'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_allow_partial_zip'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_partial_zip_format'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_partial_zip_format'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_category_matches'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_category_matches'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_short_word_max'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_short_word_max'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_short_word_min'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_short_word_min'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_boolean_mode'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_boolean_mode'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_boolean_match_all'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_boolean_match_all'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_boolean_partial_match'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_boolean_partial_match'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_title_weight'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_title_weight'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_filter_stop_words'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_filter_stop_words'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_distance_type'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_distance_type'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_total_limit'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_total_limit'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('listing_search_order_1'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('listing_search_order_1'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('listing_search_order_2'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('listing_search_order_2'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('listing_browse_order_1'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('listing_browse_order_1'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('listing_browse_order_2'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('listing_browse_order_2'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('listing_search_radius_autosort'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('listing_search_radius_autosort'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Ad Code</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_ad_code'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_ad_code'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('search_ad_code_frequency'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('search_ad_code_frequency'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>