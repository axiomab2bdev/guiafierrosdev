<div class="form-container">
    <?php echo $form->getFormOpenHTML(); ?>
    <fieldset>
        <legend>Login and Sessions</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('session_timeout'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('session_timeout'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_cookie_timeout'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_cookie_timeout'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('failed_login_limit'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('failed_login_limit'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('failed_login_lock_time'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('failed_login_lock_time'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Login Integration</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module_db_host'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module_db_host'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module_db_name'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module_db_name'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module_db_user'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module_db_user'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module_db_password'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module_db_password'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module_db_prefix'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module_db_prefix'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module_registration_url'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module_registration_url'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('login_module_password_reminder_url'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('login_module_password_reminder_url'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Database Backup</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('backup_path'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('backup_path'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('backup_cron_days'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('backup_cron_days'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('backup_cron_compress'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('backup_cron_compress'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>API Keys</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('google_apikey'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('google_apikey'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('yahoo_apikey'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('yahoo_apikey'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('bing_apikey'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('bing_apikey'); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Other</legend>
        <div class="control-group">
            <?php echo $form->getFieldLabel('allowed_html_tags'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('allowed_html_tags'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('js_click_counting'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('js_click_counting'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('traffic_bot_check'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('traffic_bot_check'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('use_remote_libraries'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('use_remote_libraries'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('banned_words'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('banned_words'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('banned_ips'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('banned_ips'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('banned_urls'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('banned_urls'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('affiliate_program_code'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('affiliate_program_code'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('affiliate_program_cookie'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('affiliate_program_cookie'); ?>
            </div>
        </div>
        <?php if(ADDON_LINK_CHECKER) { ?>
            <div class="control-group">
            <?php echo $form->getFieldLabel('reciprocal_field'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('reciprocal_field'); ?>
            </div>
        </div>
            <div class="control-group">
            <?php echo $form->getFieldLabel('reciprocal_url'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('reciprocal_url'); ?>
            </div>
        </div>
        <?php } ?>
        <div class="control-group">
            <?php echo $form->getFieldLabel('skype_field'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('skype_field'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('snap_javascript'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('snap_javascript'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('curl_proxy_url'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('curl_proxy_url'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->getFieldLabel('disable_cron'); ?>
            <div class="controls">
                <?php echo $form->getFieldHTML('disable_cron'); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php echo $form->getFieldHTML('submit'); ?>
    </div>
    <?php echo $form->getFormCloseHTML(); ?>
</div>