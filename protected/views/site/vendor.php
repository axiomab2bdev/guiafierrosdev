<?php

/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
//require_once('recaptchalib.php'); 


$publickey = "6LcjjwETAAAAAABVhWdgfu9i7_K0m3PLTNB1Vk8Q"; // you got this from the signup page
$this->pageTitle='Cotizar por Categoría - '.Yii::app()->name;
$this->breadcrumbs=array(
	'Cotizar por Categoría',
);
?>
<!-- Content
================================================== -->
<div class="container" itemscope="" itemtype="http://schema.org/Recipe">
<div class="container">
	<!-- Masonry -->
	<div class="twelve columns vendor">
		<div class="submit-recipe-form">
		<!-- Headline -->
 		<h1 class="headline">Cotizar por Categoría</h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>
            <p>Por favor complete el siguiente formulario con sus datos de acceso:</p>
          	  
            <div class="form">
         	 <?php $form=$this->beginWidget("CActiveForm", array(
			 		'id'=>'contactForm'
			 )); ?> 
             
               <div class="errors-form">
				<?php if($form->error($ContactForm,'CategoriId')){echo "Debe seleccionar mínimo una categoría <br />"; }?>
                <?php if($form->error($ContactForm,'city')){echo "Debe seleccionar mínimo una ciudad <br />"; }?>
				<?php if($form->error($ContactForm,'name')){ echo "Debe digitar su nombre<br />"; }?>
                <?php if($form->error($ContactForm,'email')){ echo "Ingresar Email valido <br />"; }?>
               	<?php if($form->error($ContactForm,'body')){echo "Ingresar un mensaje valido <br />"; } ?>
                 <?php if($resp5!=""){ echo '<div class="error-captcha">'.$resp5.'</div>'; }  ?>	
           
             </div>
             <br />
                <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
             	 <h4><?php echo $form->labelEx($ContactForm,'Categoría* (Máximo 3)'); ?></h4>
                 
                 <span class="required">
               <?php  if($form->error($ContactForm,'CategoriId')){echo "Debe seleccionar mínimo una categoría <br />"; } ?>
               </span>
               
               <!-- Categoria -->
                <div class="row list-categoria">
                    <?php echo $form->checkboxList($ContactForm,'CategoriId', categories::getCategoriesArray(), array(
                    "separator" => "",
                    "style" => "width: 10px;",
                ), array('id'=>'categories', 'class'=>'chosen-select-no-single'));
				?>
                </div>
                <!-- Fin Categoria -->
                <!-- Nombre -->
                <div class="row">
                <span class="required"> 
                    <?php if($form->error($ContactForm,'name')){ echo "Debe digitar su nombre<br />"; }?>
                </span>
                    <h4><?php echo $form->labelEx($ContactForm,'Nombre *'); ?></h4>
                    <nav class="title">
                    <?php echo $form->textField($ContactForm,'name', array('required'=>'required', 'class'=>'search-field')); ?>
                    </nav>
                  
                </div>
                 <!-- Fin Nombre -->
                
                   <!-- email -->
                 <div class="row">
                   <h4> <?php echo $form->labelEx($ContactForm,'email *'); ?></h4>
                     <nav class="title">
                    	<?php echo $form->emailField($ContactForm,'email', array('required'=>'required', 'class'=>'search-field')); ?>
                     </nav>
                    <?php echo $form->error($ContactForm,'email'); ?>
                </div>
                
                   <!-- Fin email -->
                   
                   
                      <!--  telefono -->
                
                   <div class="row">
                    <?php echo $form->labelEx($ContactForm,'Teléfono *'); ?>
                     <nav class="title">
                    	<?php echo $form->textField($ContactForm,'phone', array('required'=>'required', 'class'=>'search-field')); ?>
                    </nav>
                    <?php echo $form->error($ContactForm,'phone'); ?>
                </div>
                   <!-- Fin telefono -->
                   
                 <!-- ciudad -->
                   <span class="required">
               <?php  if($form->error($ContactForm,'city')){echo "Debe seleccionar mínimo una ciudad <br />"; } ?>
               </span>
               
                  <h4><?php echo $form->labelEx($ContactForm,'Ubicaciones <span "countCity">(Máximo 5)</span>'); ?></h4>
                   <div class="row">
					<?php 
					
					echo $form->dropDownList($ContactForm,'city',Locations::getIdLocationsArray(),array('required'=>'required','data-placeholder'=>'Seleccione las Ubicaciones...','multiple'=>'multiple', 'class'=>'search-field chosen-select', 'max'=>'15'));
					
					?>
                    <script>
					
						$('#ContactForm_CategoriId > input:checkbox').on('change', function(evt) {
						   if($(this).siblings(':checked').length >= 3) {
							   this.checked = false;
							   console.log(this.value)
						   }
						});
						//<!-- Select Multiple Ubicaciones--> 
						$(".chosen-select").chosen({
							disable_search_threshold: 10,
							no_results_text: "Oops, no se ha encontrado!",
							max_selected_options: 5,
							width: "100%",
						});
						 $(".chosen-select").on('chosen:maxselected', function(evt, params) {
							alert("Ha seleccionado el máximo de ubicaciones (5)");
						  });
					</script>
                </div>
                 <!-- Fin ciudad -->
                  <div class="row">
                    <span class="required">
                  	<?php if($form->error($ContactForm,'body')){echo "Ingresar un mensaje valido <br />"; } ?>
                    </span>
                    <?php echo $form->labelEx($ContactForm,'Mensaje'); ?>
                     <nav class="title">
                    <?php echo $form->textArea($ContactForm,'body', array('class'=>'sceditor-toolbar')); ?>
                    </nav>
                </div>

            <div class="clearfix">
          	 		<label>Captcha *</label>
            		<?php
						//echo 'Hola';exit();	
					 	echo recaptcha_get_html($publickey);?>
					 <?php echo '<div class="error-captcha">'.$resp5.'</div>';  ?>	
            </div>
              <?php echo $form->hiddenField($ContactForm,'subject',array('type'=>"hidden", 'value'=>"Vendor")); ?>
                <div class="row rememberMe">
                    <?php echo $form->radioButton($ContactForm,'terminos'); ?>
                   Acepto&nbsp;<a href="/terminos-y-condiciones.htm">Términos Condiciones</a> y <a href="/politica-de-dtos.htm">Tratamientos de Datos</a>
                    <?php echo $form->error($ContactForm,'terminos'); ?>
                </div>
                <div class="row buttons">
                    <?php echo CHtml::submitButton('Cotizar'); ?>
                </div>  
              <?php $this->endWidget();?>
            </div><!-- form -->
		<div class="clearfix"></div>
		</div>
	</div>
    <div class="four columns">
	
    <!-- Baner estatico 250x250-->
	<div class="widget">
    	<p>
    		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBanners,
				'itemView'=>'/banners/_view250x250General',
				'enableSorting' => false,
				'enablePagination' => false,
				'emptyText' => '',
				'enablePagination' => false,
				'enableSorting' => false,
				'template' => '{items}{pager}',
					));
				?>
        </p>
    </div>

	<!-- Categories -->
	<div class="widget">
		<h4 class="headline">Categorías</h4>
		<span class="line margin-bottom-20"></span>
		<div class="clearfix"></div>

		<ul class="categories">
			<?php $this->widget('zii.widgets.CListView', array(
							'dataProvider'=>$DataProviderCategories,
							'itemView'=>'/listings/_viewCategories',
							'enablePagination' => false,
							'enableSorting' => false,
							'template' => '{items}{pager}',
						)); ?>

		</ul>
	</div>
    
    <!-- Baner estatico 250x600-->
	<div class="widget">
    	<p>
    		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBanners,
				'itemView'=>'/banners/_view250x600General',
				'enableSorting' => false,
				'enablePagination' => false,
				'emptyText' => '',
				'enablePagination' => false,
				'enableSorting' => false,
				'template' => '{items}{pager}',
					)); 
				?>
        </p>
    </div>

</div>