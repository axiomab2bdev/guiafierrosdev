<?php
/* @var $this ListingsController */
/* @var $model Listings */
/* @var $form CActiveForm */
$publickey = "6LeMZwoTAAAAAPAajoQeU7u2q5uYIE3Mb2jxpfQk"; // you got this from the signup page
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'listings-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<?php if(Yii::app()->user->hasFlash('successCreate')){ ?>
    <div class="post-quote create_listing">
        <div class="columns eight">
        	<?php echo Yii::app()->user->getFlash('successCreate'); ?>
        </div>
        <div class="columns tree">
            <a href="/site/index" id="btn-index" class="btn btn-lg btn-default btn-block">Volver a Inicio</a>
        </div>
    </div>
	<?php }?> 
	<p class="note">Campos con <span class="required">*</span> son Obligatorios.</p>

	<small class="required"><?php echo $form->errorSummary($model); 
		echo '<div class="error-captcha">'.$resp5.'</div>';  ?>	</small><br />
    
    <div class="row">
		<h4>Nombre de la Empresa <span class="required">*</span></h4>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150, 'class'=>'text-field', 'required'=>'required')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
    
    <div class="row">
		<h4>Descripción</h4>
		<?php echo $form->textArea($model,'description',array('rows'=>10, 'cols'=>50, 'class'=>'area-field')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
    
    <div class="row">
		<h4>Teléfono/Móvil <span class="required">*</span></h4>
		<?php echo $form->telField($model,'phone',array('size'=>25,'maxlength'=>25, 'class'=>'text-field', 'required'=>'required')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>
    
    <div class="row">
		<h4>Correo Electronico <span class="required">*</span></h4>
		<?php echo $form->emailField($model,'mail',array('size'=>60,'maxlength'=>255, 'class'=>'text-field', 'required'=>'required')); ?>
		<?php echo $form->error($model,'mail'); ?>
	</div>
    
    <div class="row">
		<h4>Dirección</h4>
		<?php echo $form->textField($model,'listing_address1',array('size'=>60,'maxlength'=>255, 'class'=>'text-field')); ?>
		<?php echo $form->error($model,'listing_address1'); ?>
	</div>
    <div class="row">
    	<h4>Categoría <span class="required">*</span></h4>
		<?php echo $form->dropDownList($model,'primary_category_id', @Categories::getCategoriesArray(), array('id'=>'primary_category_id', 'class'=>'chosen-select-no-single','prompt'=>'Seleccione una Categoría'));
    ?>
      <?php echo $form->error($model,'primary_category_id'); ?>
    </div>

      <h4>Ubicación <span class="required">*</span></h4>
       <div class="row">
       <?php echo $form->dropDownList($model,'location_id', @Locations::getIdLocationsArray(), array('id'=>'location_id', 'class'=>'chosen-select-no-single','prompt'=>'Seleccione una Ubicación'));
        ?>
        <?php echo $form->error($model,'location_id'); ?>
    </div>
    
    <div class="row">
    	<h4>Logo</h4>
        <?php echo $form->fileField($model,'logo_extension',array('accept'=>'image/jpeg,image/jpg,image/png,image/gif', 'class'=>'text-field')); ?>
		<!--<input type="file" accept="image/jpeg,image/jpg,image/png,image/gif" name="Listings[logo_extension]" class="text-field" />-->
	</div>
    <div>
    	<h4>Captcha <span class="required">*</span></h4>
		<?php echo recaptcha_get_html($publickey);?>
        <?php echo '<div class="error-captcha">'.$resp5.'</div>';  ?>	
    </div>
    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Micrositio' : 'Guardar'); ?>
	</div>
    <div class="row">
    	   <input type="radio" id="terminos" checked="checked"/> Acepto&nbsp;<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/terminos-y-condiciones">Términos Condiciones</a> y <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/politica-de-datos">Tratamientos de Datos</a>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->