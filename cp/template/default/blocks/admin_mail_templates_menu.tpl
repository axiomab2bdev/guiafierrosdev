<ul class="menu">
    <li><a href="admin_email_templates.php"><img src="./template/default/images/icon_mail_templates.gif"><?php echo $lang['admin_email_templates']; ?></a></li>
    <li><a href="admin_email_templates.php?action=add"><img src="./template/default/images/icon_mail_templates_add.gif"><?php echo $lang['admin_email_templates_add']; ?></a></li>
</ul>
<?php if($general_variables) { ?>
    <div style="padding: 10px;">
        <strong><?php echo $lang['admin_email_templates_variables']; ?>:</strong><br />
        <?php foreach((array) $general_variables as $variable) { ?>
            *<?php echo $variable; ?>*<br />
        <?php } ?>
        <?php if(count($specific_variables)) { ?>
            <br /><strong>Template Specific Variables:</strong><br />
            <?php foreach($specific_variables as $variable) { ?>
                *<?php echo $variable; ?>*<br />
            <?php } ?>
        <?php } ?>
        <?php if(count($user_variables)) { ?>
            <br /><strong>User Variables:</strong><br />
            <?php foreach($user_variables as $variable) { ?>
                *<?php echo $variable; ?>*<br />
            <?php } ?>
        <?php } ?>
        <?php if(count($order_variables)) { ?>
            <br /><strong>Order Variables:</strong><br />
            <?php foreach($order_variables as $variable) { ?>
                *<?php echo $variable; ?>*<br />
            <?php } ?>
        <?php } ?>
        <?php if(count($invoice_variables)) { ?>
            <br /><strong>Invoice Variables:</strong><br />
            <?php foreach($invoice_variables as $variable) { ?>
                *<?php echo $variable; ?>*<br />
            <?php } ?>
        <?php } ?>
        <?php if(count($listing_variables)) { ?>
            <br /><strong>Listing Variables:</strong><br />
            <?php foreach($listing_variables as $variable) { ?>
                *<?php echo $variable; ?>*<br />
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>