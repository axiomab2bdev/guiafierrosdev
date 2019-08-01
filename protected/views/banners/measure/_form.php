<?php
/* @var $this MeasureController */
/* @var $model Measure */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'measure-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'object_id'); ?>
		<?php echo $form->textField($model,'object_id'); ?>
		<?php echo $form->error($model,'object_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'object_type_id'); ?>
		<?php echo $form->textField($model,'object_type_id'); ?>
		<?php echo $form->error($model,'object_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_type_id'); ?>
		<?php echo $form->textField($model,'data_type_id'); ?>
		<?php echo $form->error($model,'data_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_ip'); ?>
		<?php echo $form->textField($model,'client_ip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_origin'); ?>
		<?php echo $form->textField($model,'url_origin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_origin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'device'); ?>
		<?php echo $form->textField($model,'device',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'device'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_name'); ?>
		<?php echo $form->textField($model,'country_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'country_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_code'); ?>
		<?php echo $form->textField($model,'country_code',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'country_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'browser'); ?>
		<?php echo $form->textField($model,'browser',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'browser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'os'); ?>
		<?php echo $form->textField($model,'os',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'os'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->