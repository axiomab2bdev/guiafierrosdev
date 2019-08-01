<h1><?php echo $title; ?></h1>
<?php if($type == 'invalid') { ?>
    There was a problem validating your software license.<br \>
    - Verify your license code is in defaults.php<br \>
    - Try reissueing your license.<br \><br \>
    If you still receive problems, please contact support.<br \><br \>
    <a href="<?php echo BASE_URL_ADMIN; ?>/index.php">Refresh</a>
<?php } elseif($type == 'branding') { ?>
    Branding has been removed without the proper license.
    Please undo your changes or contact support.<br \><br \>
    <a href="<?php echo BASE_URL_ADMIN; ?>/index.php">Refresh</a>
<?php } elseif($type == 'integrity') { ?>
    An encrypted file may have been altered or deleted.
    Please undo your changes or contact support.<br \><br \>
    <a href="<?php echo BASE_URL_ADMIN; ?>/index.php">Refresh</a>
<?php } elseif($type == 'addon') { ?>
    The addon trying to be accessed is currently not allowed for this license.
    <a href="<?php echo BASE_URL_ADMIN; ?>/index.php">Return to Administrator</a>
<?php } ?>