<ul class="menu">
    <li><a href="admin_mail.php"><img src="./template/default/images/icon_mail.gif"><?php echo $lang['admin_mail_mailer']; ?></a></li>
    <li><a href="admin_mail_batches.php"><img src="./template/default/images/icon_mail_batches.gif"><?php echo $lang['admin_mail_batches']; ?></a></li>
    <li><a href="admin_mail_queue.php"><img src="./template/default/images/icon_mail_queue.gif"><?php echo $lang['admin_mail_queue']; ?></a></li>
</ul>
<?php if($general_variables) { ?>
    <div style="padding: 10px;">
        <strong><?php echo $lang['admin_mail_variables']; ?>:</strong><br />
        <?php foreach((array) $general_variables as $variable) { ?>
            *<?php echo $variable; ?>*<br />
        <?php } ?>
        <?php if($user_variables) { ?>
            <br /><strong><?php echo $lang['admin_mail_variables_user']; ?>:</strong><br />
            <?php foreach((array) $user_variables as $variable) { ?>
                *<?php echo $variable; ?>*<br />
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>
