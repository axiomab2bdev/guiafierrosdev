<?php
/* @var $this BannersController */
/* @var $model Banners */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banners-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'listing_id'); ?>
		<?php echo $form->textField($model,'listing_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'listing_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textArea($model,'url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target'); ?>
		<?php echo $form->textField($model,'target',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'target'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alt_text'); ?>
		<?php echo $form->textField($model,'alt_text',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alt_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textArea($model,'code',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'extension'); ?>
		<?php echo $form->textField($model,'extension',array('size'=>55,'maxlength'=>55)); ?>
		<?php echo $form->error($model,'extension'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clicks'); ?>
		<?php echo $form->textField($model,'clicks',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'clicks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impressions'); ?>
		<?php echo $form->textField($model,'impressions',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'impressions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_last_displayed'); ?>
		<?php echo $form->textField($model,'date_last_displayed'); ?>
		<?php echo $form->error($model,'date_last_displayed'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->