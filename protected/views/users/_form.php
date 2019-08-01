<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_hash'); ?>
		<?php echo $form->textField($model,'password_hash',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'password_hash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_salt'); ?>
		<?php echo $form->textField($model,'password_salt',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'password_salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cookie_salt'); ?>
		<?php echo $form->textField($model,'cookie_salt',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'cookie_salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_email'); ?>
		<?php echo $form->textField($model,'user_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logged_last'); ?>
		<?php echo $form->textField($model,'logged_last'); ?>
		<?php echo $form->error($model,'logged_last'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logged_ip'); ?>
		<?php echo $form->textField($model,'logged_ip',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'logged_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logged_host'); ?>
		<?php echo $form->textField($model,'logged_host',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'logged_host'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timezone'); ?>
		<?php echo $form->textField($model,'timezone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'timezone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_verify'); ?>
		<?php echo $form->textField($model,'password_verify',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password_verify'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_first_name'); ?>
		<?php echo $form->textField($model,'user_first_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'user_first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_last_name'); ?>
		<?php echo $form->textField($model,'user_last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'user_last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_organization'); ?>
		<?php echo $form->textField($model,'user_organization',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_organization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_address1'); ?>
		<?php echo $form->textField($model,'user_address1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_address2'); ?>
		<?php echo $form->textField($model,'user_address2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_city'); ?>
		<?php echo $form->textField($model,'user_city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_state'); ?>
		<?php echo $form->textField($model,'user_state',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_country'); ?>
		<?php echo $form->textField($model,'user_country',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_zip'); ?>
		<?php echo $form->textField($model,'user_zip',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'user_zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_phone'); ?>
		<?php echo $form->textField($model,'user_phone',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'user_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_fax'); ?>
		<?php echo $form->textField($model,'user_fax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'user_fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_comment'); ?>
		<?php echo $form->textArea($model,'user_comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_id'); ?>
		<?php echo $form->textField($model,'login_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'login_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_provider'); ?>
		<?php echo $form->textField($model,'login_provider',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'login_provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax_exempt'); ?>
		<?php echo $form->textField($model,'tax_exempt'); ?>
		<?php echo $form->error($model,'tax_exempt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disable_overdue_notices'); ?>
		<?php echo $form->textField($model,'disable_overdue_notices'); ?>
		<?php echo $form->error($model,'disable_overdue_notices'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'import_id'); ?>
		<?php echo $form->textField($model,'import_id'); ?>
		<?php echo $form->error($model,'import_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->