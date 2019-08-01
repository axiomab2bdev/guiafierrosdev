<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pass')); ?>:</b>
	<?php echo CHtml::encode($data->pass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password_hash')); ?>:</b>
	<?php echo CHtml::encode($data->password_hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password_salt')); ?>:</b>
	<?php echo CHtml::encode($data->password_salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cookie_salt')); ?>:</b>
	<?php echo CHtml::encode($data->cookie_salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_email')); ?>:</b>
	<?php echo CHtml::encode($data->user_email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('logged_last')); ?>:</b>
	<?php echo CHtml::encode($data->logged_last); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logged_ip')); ?>:</b>
	<?php echo CHtml::encode($data->logged_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logged_host')); ?>:</b>
	<?php echo CHtml::encode($data->logged_host); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timezone')); ?>:</b>
	<?php echo CHtml::encode($data->timezone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password_verify')); ?>:</b>
	<?php echo CHtml::encode($data->password_verify); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_organization')); ?>:</b>
	<?php echo CHtml::encode($data->user_organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_address1')); ?>:</b>
	<?php echo CHtml::encode($data->user_address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_address2')); ?>:</b>
	<?php echo CHtml::encode($data->user_address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_city')); ?>:</b>
	<?php echo CHtml::encode($data->user_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_state')); ?>:</b>
	<?php echo CHtml::encode($data->user_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_country')); ?>:</b>
	<?php echo CHtml::encode($data->user_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_zip')); ?>:</b>
	<?php echo CHtml::encode($data->user_zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_phone')); ?>:</b>
	<?php echo CHtml::encode($data->user_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_fax')); ?>:</b>
	<?php echo CHtml::encode($data->user_fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_comment')); ?>:</b>
	<?php echo CHtml::encode($data->user_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_id')); ?>:</b>
	<?php echo CHtml::encode($data->login_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_provider')); ?>:</b>
	<?php echo CHtml::encode($data->login_provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit')); ?>:</b>
	<?php echo CHtml::encode($data->credit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_exempt')); ?>:</b>
	<?php echo CHtml::encode($data->tax_exempt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disable_overdue_notices')); ?>:</b>
	<?php echo CHtml::encode($data->disable_overdue_notices); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('import_id')); ?>:</b>
	<?php echo CHtml::encode($data->import_id); ?>
	<br />

	*/ ?>

</div>