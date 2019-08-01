<script type="text/javascript">
$(document).ready(function(){
    $('a[id^="email_log_message_link"]').click(function() {
        var dialog = $('<div style="display:none"></div>').appendTo('body');
        $.ajax({
            data:({
                action:'admin_email_log_view',
                id:$(this).attr('id')
            }),
            success:function(data) {
                dialog.html(data);
                dialog.dialog({
                    title: '<?php echo $lang['admin_email_log_view_message']; ?>',
                    width: 650,
                    height: 450,
                    modal: true,
                    resizable: false,
                    buttons: {
                        "Close": function() {
                            $(this).dialog("close");
                            dialog.remove();
                        }
                    },
                });
            }
        });
        return false;
    });
});
</script>
<?php echo $users_summary_header; ?>
<div class="row">
    <div class="span10">
        <div class="well">
            <h2><?php echo $lang['admin_users_information']; ?></h2>
            <table class="table table-condensed table-borderless">
                <?php if($profile_image) { ?>
                    <tr><td colspan="2"><img src="<?php echo $profile_image; ?>"/></td></tr>
                <?php } ?>
                <tr><td><?php echo $lang['admin_users_id']; ?>:</td><td><?php echo $id; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_username']; ?>:</td><td><?php echo $login; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_first_name']; ?>:</td><td><?php echo $user_first_name; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_last_name']; ?>:</td><td><?php echo $user_last_name; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_organization']; ?>:</td><td><?php echo $user_organization; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_email']; ?>:</td><td><?php echo $user_email; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_address1']; ?>:</td><td><?php echo $user_address1; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_address2']; ?>:</td><td><?php echo $user_address2; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_city']; ?>:</td><td><?php echo $user_city; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_state']; ?>:</td><td><?php echo $user_state; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_zipcode']; ?>:</td><td><?php echo $user_zip; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_country']; ?>:</td><td><?php echo $user_country; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_phone']; ?>:</td><td><?php echo $user_phone; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_fax']; ?>:</td><td><?php echo $user_fax; ?></td></tr>
            </table>
        </div>
        <div class="well">
            <h2><?php echo $lang['admin_users_other_information']; ?></h2>
            <table class="table table-condensed table-borderless">
                <tr><td><?php echo $lang['admin_users_tax_exempt']; ?>:</td><td><?php echo $tax_exempt; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_disable_overdue_notices']; ?>:</td><td><?php echo $disable_overdue_notices; ?></td></tr>
                <tr>
                    <td style="vertical-align: top;"><?php echo $lang['admin_users_groups']; ?>:</td>
                    <td>
                        <?php if($user_groups) { ?>
                            <?php foreach($user_groups AS $group) { ?>
                                <?php echo $group; ?><br />
                            <?php } ?>
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;"><?php echo $lang['admin_users_email_lists']; ?>:</td>
                    <td>
                        <?php if($email_lists) { ?>
                            <?php foreach($email_lists AS $email_list) { ?>
                                <?php echo $email_list['title']; ?><br />
                            <?php } ?>
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                </tr>
                <tr><td><?php echo $lang['admin_users_local_time']; ?>:</td><td><?php echo $local_time; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_created']; ?>:</td><td><?php echo $created; ?></td></tr>
                <tr><td><?php echo $lang['admin_users_logged_in']; ?>:</td><td><?php echo $logged_in; ?></td></tr>
                <tr>
                    <td><?php echo $lang['admin_users_last_logged_in']; ?>:</td>
                    <td>
                        <?php if($logged_last) { ?>
                            <?php echo $logged_last; ?>
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $lang['admin_users_last_ip_address']; ?>:</td>
                    <td>
                        <?php if($logged_ip) { ?>
                            <?php echo $logged_ip; ?>
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $lang['admin_users_last_hostname']; ?>:</td>
                    <td>
                        <?php if($logged_host) { ?>
                            <?php echo $logged_host; ?>
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                </tr>
                <?php if(!empty($login_providers)) { ?>
                    <tr><td><?php echo $lang['admin_users_login_module']; ?>:</td><td><?php echo $login_providers; ?></td></tr>
                <?php } ?>
                <?php if($fields) { ?>
                    <?php foreach($fields AS $field) { ?>
                        <tr>
                            <td><?php echo $field['name']; ?>:</td>
                            <td><?php echo ${'custom_'.$field['id']}; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="span9">
        <div class="well">
            <h2><?php echo $lang['admin_users_actions']; ?></h2>
            <p>
            <a class="btn" target="_blank" href="<?php echo BASE_URL.MEMBERS_FOLDER; ?>index.php?user_login=<?php echo $this->escape($login); ?>"><?php echo $lang['admin_users_login_as_user']; ?></a>
            <a class="btn" href="admin_users_summary.php?action=reset_password&id=<?php echo $id; ?>"><?php echo $lang['admin_users_reset_and_send_password']; ?></a><br />
            </p>
            <p>
            <a class="btn" href="<?php echo BASE_URL_ADMIN; ?>/admin_invoices.php?action=add&user_id=<?php echo $id; ?>"><?php echo $lang['admin_users_add_invoice']; ?></a>
            <a class="btn" href="<?php echo BASE_URL_ADMIN; ?>/admin_orders_add.php?user_id=<?php echo $id; ?>"><?php echo $lang['admin_users_add_order']; ?></a>
            <a class="btn" href="<?php echo BASE_URL_ADMIN; ?>/admin_users_merge.php?from_id=<?php echo $id; ?>"><?php echo $lang['admin_users_merge']; ?></a><br />
            </p>
            <p>
            <a class="btn btn-mini btn-danger" onclick="return confirm('<?php echo $lang['messages_confirm']; ?>');" href="<?php echo BASE_URL_ADMIN; ?>/admin_users.php?action=delete&id=<?php echo $id; ?>"><?php echo $lang['admin_delete']; ?></a>
            </p>
        </div>
        <div class="well">
            <h2><?php echo $lang['admin_users_recent_emails']; ?></h2>
            <?php if($recent_emails) { ?>
                <p>
                <?php foreach($recent_emails AS $recent_email) { ?>
                    <?php echo $recent_email['date']; ?> - <a id="email_log_message_link_<?php echo $recent_email['id']; ?>" href="#"><?php echo $recent_email['subject']; ?></a><br />
                <?php } ?>
                </p>
                <p><a class="btn btn-mini" href="admin_email_log.php?user_id=<?php echo $id; ?>"><?php echo $lang['admin_users_view_all']; ?> &raquo;</a></p>
            <?php } else { ?>
                <?php echo $lang['admin_users_none']; ?>
            <?php } ?>
        </div>
        <div class="well">
            <h2><?php echo $lang['admin_users_send_email']; ?></h2>
            <?php echo $email_form->getFormOpenHTML(); ?>
            <?php echo $email_form->getFieldHTML('email'); ?><br /><br />
            <?php echo $email_form->getFieldHTML('submit'); ?>
            <?php echo $email_form->getFormCloseHTML(); ?>
        </div>
        <div class="well">
            <h2><?php echo $lang['admin_users_comments']; ?></h2>
            <?php if(empty($comments)) { ?>
                No comments
            <?php } else { ?>
                <?php echo $comments; ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php echo $content; ?>