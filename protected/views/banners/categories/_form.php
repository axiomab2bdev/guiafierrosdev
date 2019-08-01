<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description_short'); ?>
		<?php echo $form->textArea($model,'description_short',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description_short'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friendly_url'); ?>
		<?php echo $form->textField($model,'friendly_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'friendly_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friendly_url_path'); ?>
		<?php echo $form->textArea($model,'friendly_url_path',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'friendly_url_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'friendly_url_path_hash'); ?>
		<?php echo $form->textField($model,'friendly_url_path_hash',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'friendly_url_path_hash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_keywords'); ?>
		<?php echo $form->textArea($model,'meta_keywords',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'small_image_url'); ?>
		<?php echo $form->textField($model,'small_image_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'small_image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'large_image_url'); ?>
		<?php echo $form->textField($model,'large_image_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'large_image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidden'); ?>
		<?php echo $form->textField($model,'hidden'); ?>
		<?php echo $form->error($model,'hidden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'closed'); ?>
		<?php echo $form->textField($model,'closed'); ?>
		<?php echo $form->error($model,'closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_follow'); ?>
		<?php echo $form->textField($model,'no_follow'); ?>
		<?php echo $form->error($model,'no_follow'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'display_columns'); ?>
		<?php echo $form->textField($model,'display_columns'); ?>
		<?php echo $form->error($model,'display_columns'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count'); ?>
		<?php echo $form->textField($model,'count',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_total'); ?>
		<?php echo $form->textField($model,'count_total',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'count_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'left_'); ?>
		<?php echo $form->textField($model,'left_'); ?>
		<?php echo $form->error($model,'left_'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'right_'); ?>
		<?php echo $form->textField($model,'right_'); ?>
		<?php echo $form->error($model,'right_'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impressions'); ?>
		<?php echo $form->textField($model,'impressions',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'impressions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip'); ?>
		<?php echo $form->textField($model,'ip',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'import_id'); ?>
		<?php echo $form->textField($model,'import_id'); ?>
		<?php echo $form->error($model,'import_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header_template_file'); ?>
		<?php echo $form->textField($model,'header_template_file',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'header_template_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'footer_template_file'); ?>
		<?php echo $form->textField($model,'footer_template_file',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'footer_template_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wrapper_template_file'); ?>
		<?php echo $form->textField($model,'wrapper_template_file',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'wrapper_template_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'results_template_file'); ?>
		<?php echo $form->textField($model,'results_template_file',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'results_template_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'child_row_id'); ?>
		<?php echo $form->textField($model,'child_row_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'child_row_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impressions_search'); ?>
		<?php echo $form->textField($model,'impressions_search',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'impressions_search'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits'); ?>
		<?php echo $form->textField($model,'hits'); ?>
		<?php echo $form->error($model,'hits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'columns'); ?>
		<?php echo $form->textField($model,'columns'); ?>
		<?php echo $form->error($model,'columns'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->