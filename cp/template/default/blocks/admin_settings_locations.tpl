<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend><?php echo $lang['admin_settings_general']; ?></legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('user_default_country'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('user_default_country'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('locations_num_columns'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('locations_num_columns'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('locations_vertical_sort'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('locations_vertical_sort'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('loc_empty_hidden'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('loc_empty_hidden'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('loc_show_indexes'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('loc_show_indexes'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('loc_show_subs_number'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('loc_show_subs_number'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('show_location_title'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('show_location_title'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('show_location_description'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('show_location_description'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('location_browse_children'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('location_browse_children'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Address Formatting</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('location_text_1'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('location_text_1'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('location_text_2'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('location_text_2'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('location_text_3'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('location_text_3'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_city'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_city'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_state'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_state'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_country'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_country'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_city_static'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_city_static'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_state_static'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_state_static'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_country_static'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_country_static'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Maps</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_type'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_type'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_display_type'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_display_type'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_zoom'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_zoom'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_select_coordinates'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_select_coordinates'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('map_select_zoom'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('map_select_zoom'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('mapquest_apikey'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('mapquest_apikey'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Other</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('geocoding_service'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('geocoding_service'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('geolocation_fill'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('geolocation_fill'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('html_editor_locations'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('html_editor_locations'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('location_select_type'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('location_select_type'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset class="buttonrow">
        <?php echo $form->getFieldHTML('submit'); ?>
    </fieldset>
    <?php echo $form->getFormCloseHTML(); ?>
</div>