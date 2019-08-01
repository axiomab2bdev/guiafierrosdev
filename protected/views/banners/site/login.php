<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Iniciar Sesión';
$this->breadcrumbs=array(
	'Iniciar Sesión',
);
?>
<!-- Content
================================================== -->

<div class="container" itemscope="" itemtype="http://schema.org/Recipe">
<div class="container">

	<!-- Masonry -->
	<div class="sixteen columns">

		<!-- Headline -->
 		<h1 class="headline">Iniciar Sesión</h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>
            <p>Por favor complete el siguiente formulario con sus datos de acceso:</p>
            
            <div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>
                <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
            
                <div class="row">
                    <?php echo $form->labelEx($model,'username'); ?>
                    <?php echo $form->textField($model,'username'); ?>
                    <?php echo $form->error($model,'username',array('class'=>'four columns notification error closeable')); ?>
                </div>
            
                <div class="row">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password'); ?>
                    <?php echo $form->error($model,'password',array('class'=>'four columns notification error closeable')); ?>
                </div>
            
                <div class="row rememberMe">
                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                    Recordarme la próxima vez.
                    <?php echo $form->error($model,'rememberMe',array('class'=>'four columns notification error closeable')); ?>
                </div>
            
                <div class="row buttons">
                    <?php echo CHtml::submitButton('Iniciar Sesión'); ?>
                </div>
            
            <?php $this->endWidget(); ?>
            </div><!-- form -->
		<div class="clearfix"></div>

	</div>
