<?php
/* @var $this ListingsController */
/* @var $model Listings */
$nameSite = 'Crear Micrositio - '.Yii::app()->name;
$this->setPageTitle($nameSite);

 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stepContainer',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); 


Yii::app()->clientScript->registerMetaTag($nameSite.", limpieza y desinfección, carnes, frutas, muebles, iluminación, café, pastas, pescados y mariscos.", 'Description');
Yii::app()->clientScript->registerMetaTag(Yii::app()->params->keywords, 'keywords');

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear',
);
if(!Yii::app()->user->isGuest){
	$this->menu=array(
		array('label'=>'Listar Proveedores', 'url'=>array('index')),
		array('label'=>'Administrar proveedores', 'url'=>array('admin')),
	);
}
?>
<!-- Content
================================================== -->
<div class="container">
	<!-- Masonry -->
	<div class="twelve columns">
		<!-- Form de ingreso de micrositio -->
       		<script type="text/javascript">
  $(document).ready(function(){
    	// Smart Wizard     	
  		$('#wizard').smartWizard({
				transitionEffect:'slideleft',
				onLeaveStep:leaveAStepCallback,
				onFinish:onFinishCallback,
				enableFinishButton:true,
				updateHeight:false
				});

      function leaveAStepCallback(obj){
        var step_num= obj.attr('rel');
        return validateSteps(step_num);
      }
      
      function onFinishCallback(){
       if(validateAllSteps()){
        $('form').submit();
       }
      }
		});
	   
    function validateAllSteps(){
       var isStepValid = true;
       
       if(validateStep1() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
       }
       
       if(validateStep3() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:false});
       }
       
       if(!isStepValid){
          $('#wizard').smartWizard('showMessage','Por favor, corrija los errores para continuar');
       }
              
       return isStepValid;
    } 	
		
		
		function validateSteps(step){
		  var isStepValid = true;
      // validate step 1
      if(step == 1){
        if(validateStep1() == false ){
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click siguiente.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }
      
      // validate step3
      if(step == 3){
        if(validateStep3() == false ){
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click siguiente.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }
      
      return isStepValid;
    }
		
	function validateStep1(){
       var isValid = true; 
      
	   // Validate empresa
       var un= $('#empresa').val();
	   var tel= $('#telefono').val();
	   var email = $('#email').val();
	   
       if(!un && un.length <= 0){
         isValid = false;
         $('#msg_empresa').html('Por favor ingrese su empresa').show();
       }else{
         $('#msg_empresa').html('').hide();
       }
	   
	   if(!tel && tel.length <= 0){
         isValid = false;
         $('#msg_telefono').html('Por favor ingrese un teléfono').show();
       }else{
         $('#msg_telefono').html('').hide();
       }
       
	    if(email && email.length > 0){
         if(!isValidEmailAddress(email)){
           isValid = false;
           $('#msg_email').html('Este email es invalido').show();           
         }else{
          $('#msg_email').html('').hide();
         }
       }else{
         isValid = false;
         $('#msg_email').html('Por favor ingrese un email').show();
       }       
      return isValid;
	   
	   
       // validate password
       var pw = $('#password').val();
       if(!pw && pw.length <= 0){
         isValid = false;
         $('#msg_password').html('Please fill password').show();         
       }else{
         $('#msg_password').html('').hide();
       }
       
       // validate confirm password
       var cpw = $('#cpassword').val();
       if(!cpw && cpw.length <= 0){
         isValid = false;
         $('#msg_cpassword').html('Please fill confirm password').show();         
       }else{
         $('#msg_cpassword').html('').hide();
       }  
       
       // validate password match
       if(pw && pw.length > 0 && cpw && cpw.length > 0){
         if(pw != cpw){
           isValid = false;
           $('#msg_cpassword').html('Password mismatch').show();            
         }else{
           $('#msg_cpassword').html('').hide();
         }
       }
       return isValid;
    }
    
    function validateStep3(){
      var isValid = true;    
      //validate email  email
      var email = $('#email').val();
       if(email && email.length > 0){
         if(!isValidEmailAddress(email)){
           isValid = false;
           $('#msg_email').html('Email is invalid').show();           
         }else{
          $('#msg_email').html('').hide();
         }
       }else{
         isValid = false;
         $('#msg_email').html('Please enter email').show();
       }       
      return isValid;
    }
    
    // Email Validation
    function isValidEmailAddress(emailAddress) {
      var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
      return pattern.test(emailAddress);
    } 
</script>

     <table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td> 
<!-- Smart Wizard -->
  		<div id="wizard" class="swMain">
  			<ul>
  				<li><a href="#step-1">
                <span class="stepNumber">1</span>
                <span class="stepDesc">
                   Proveedor<br />
                   <small>Datos personales</small>
                </span>
            </a></li>
  				<li><a href="#step-2">
                <span class="stepNumber">2</span>
                <span class="stepDesc">
                   Categorias<br />
                   <small>Tipos de categorias</small>
                </span>
            </a></li>
  				<li><a href="#step-3">
                <span class="stepNumber">3</span>
                <span class="stepDesc">
                   Productos<br />
                   <small>Lista de productos</small>
                </span>                   
             </a></li>
  				<li><a href="#step-4">
                <span class="stepNumber">4</span>
                <span class="stepDesc">
                   Detalles<br />
                   <small>Datos del producto</small>
                </span>                   
            </a></li>
  			</ul>
            <!-- Inicio de formulario-->
         <form class="stepContainer">
  			<div id="step-1">	
            <h1 class="StepTitle">Step 1: Datos del proveedor</h1>
           	<div class="elementos-form">
				<div id="nemp" class="form">
					<label class="labelp"for="">Nombre de la empresa</label><span> *</span><br><br>
					<input class="datosp"  type="text" required="required" id="empresa" name="empresa">
                   <span id="msg_empresa"></span>
                 </div>
				<div id="desemp" class="form" maxlength="1000">
					<label class="labelp" for="">Descripción de la empresa</label><br><br>
					<input class="datosp" type="text" id="descripcion">
				</div>
				<div id="logoemp" class="form">
					<label class="labelp" for="">Logo de su empresa</label><br><br>
					<input class="datosp" type="file">
				</div>
				<div id="diremp" class="form">
					<label class="labelp" for="">Dirección</label><br><br>
					<input class="datosp" type="text" id="direccion">
		 			<input type="button" id="btndirec" value="+">
		        	<ul id="uldire" ></ul>
				</div>
				<div id="website" class="form">
					<label class="labelp" for="">Website</label><br><br>
					<input class="datosp" type="text">
				</div>
				<div id="numemp" class="form">
						<label class="labelp" for="">Teléfono</label><span> *</span><br><br>
						<input class="datosp" type="number" id="telefono" name="telefono">
		 				<input type="button" id="btntelefono" value="+">
		        		<span id="msg_telefono"></span>
                        <ul id="ulnum"></ul>                 
				</div>
				<div id="correoemp" class="form">
					<label class="labelp" for="">Correo electrónico</label><span> *</span><br><br>
					<input class="datosp" type="email" id="email"  name="email" required="required">
                    <span id="msg_email"></span>
				</div>
		       			</div>
        </div>
  			<div id="step-2">
            <h2 class="StepTitle">Step 2 Categorias</h2>	
       		<div class="elementos-form">
			<h3>Seleccione categoria <span>*</span></h3>
			
			<div id="sparte" class="divcat">
				
				<?php echo $form->dropDownList($model,'primary_category_id', @Categories::getCategoriesArray(), array('id'=>'primary_category_id', 'class'=>'chosen-select-no-single','prompt'=>'Seleccione una Categoría'));
    			 ?>
      			<?php echo $form->error($model,'primary_category_id'); ?>
				
			</div>
			
			 <h4><?php echo $form->labelEx($model,'Ubicaciones <span "countCity">(Máximo 5)</span>'); ?></h4>
			<h3>Ciudades de cubrimiento <span> *</span></h3>
            <?php 
					
					echo $form->dropDownList($model,'location_id',@Locations::getIdLocationsVendorArray(),array('required'=>'required','data-placeholder'=>'Seleccione las Ubicaciones...','multiple'=>'multiple', 'class'=>'search-field chosen-select', 'max'=>'15'));
					
					?>
                    
                   
                  
			<br><br>
		   </div>
        </div>                      
  		<div id="step-3">
            <h2 class="StepTitle">Step 3 Productos</h2>	
     
		<div id="categpr" class="form">
			<label class="labelp" for="">Establezca las categorías de sus productos</label><br><br>
			<input class="datosp" type="text" id="inpcpr">
 			<button class="botonm" id="btncp">+</button>
        	<ul id="ulcpr" ></ul>
		</div>
		<div id="productos" class="form">
			<label class="labelp" for="">Ingrese sus productos</label><br><br>
			<input class="datosp" type="text" id="inppr">
 			<button class="botonm" id="btnproduct">+</button>
        	<ul id="ulpr" ></ul>
		</div>
		
		      				          
        </div>
  			<div id="step-4">
            <h2 class="StepTitle">Step 4 Datos del producto</h2>	
            <div id="container">
		<div id="nemp" class="form">
			<label class="labelp"for="">Nombre del producto</label><span> *</span><br><br>
			<input class="datosp" id="nombrep" type="text">
		</div>
		<div id="diremp" class="form">
			<label class="labelp" for="">Fotos del producto</label><br><br>
			<input class="datosp" type="file" id="foto" accept="image/*">
 			<button class="botonm" id="button">+</button>
        	<ul id="content" ></ul>
		</div>
		<div id="desemp" class="form" maxlength="1000">
			<label class="labelp" for="">Descripción del producto</label><span> *</span><br><br>
			<input class="datosp" type="text" id="descripcionp">
		</div>
		
		<h3>Seleccione la categoria</h3>
		<select name="select" id="selectcateg">
  			<option value="volvo">Seleccione...</option>
  			<option value="volvo">Manizales</option>
  			<option value="saab">Bogotá</option>
  			<option value="mercedes">Medellin</option>
  			<option value="audi">Cali</option>
		</select>
	</div>

	<input type="submit" id="guardar" value="Guardar">   
    
  			
        </div>
        </form> <!-- Fin del formulario -->
  		</div>
<!-- End SmartWizard Content -->  		
 		
</td></tr>
</table>
        <!-- Fin Form de Micrositio-->

	</div>
   <!-- Sidebar
    ================================================== -->
    <div class="four columns">
    <?php if(!isset($_REQUEST['keyword']) && $_REQUEST['keyword']==""){ ?>
        <!-- Search Form -->
        <div class="widget search-form">
            <div class="toggler">
            <nav class="search" id="searchCustom">
            <?php
            echo CHtml::beginForm(CHtml::normalizeUrl(array('listings/index')), 'get', array('id'=>'filter-form'))
            . CHtml::submitButton('', array('name'=>'', 'class'=>'fa fa-search'))
            . CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?', 'required'=>'required', 'minlength'=>'3'))
            . CHtml::endForm();
            
            Yii::app()->clientScript->registerScript('search',
                "var ajaxUpdateTimeout;
                var ajaxRequest;
                $('input#string').keyup(function(){
                    ajaxRequest = $(this).serialize();
                    clearTimeout(ajaxUpdateTimeout);
                    ajaxUpdateTimeout = setTimeout(function () {
                        $.fn.yiiListView.update(
            // this is the id of the CListView
                            'ajaxListView',
                            {data: ajaxRequest}
                        )
                    },
            // this is the delay
                    300);
                });"
            );
            
            ?>
            </nav>
            </div>
            
            <div class="clearfix"></div>
        </div>
    <?php } ?>
        <? if(isset($_REQUEST['keyword'])){ ?>
        <!-- Widget search locarions-->
        <? $this->widget('application.components.SearchLocations'); ?>
        <!--End Widget search locarions-->
        <div class="clearfix"></div>
        <? } ?>
        <!-- Baner estatico 250x250-->
        <div class="widget">
            <p>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProviderBannersGenerales,
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
        <?php
        if(preg_match('%^(.*)\/category\/(.*)$%', $pathInfo, $matches))
            {
        ?>
        <!-- Baner estatico 250x250-->
        <div class="widget">
            <p>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProviderBanners,
                    'itemView'=>'/banners/_view250x250',
                    'enableSorting' => false,
                    'enablePagination' => false,
                    'emptyText' => '',
                    'enablePagination' => true,
                    'enableSorting' => false,
                    'template' => '{items}{pager}',
                        )); 
                    ?>
            </p>
        </div>
        <? } ?>
        <!-- Categories -->
        <div class="widget">
            <h4 class="headline">Categorías</h4>
            <span class="line margin-bottom-20"></span>
            <div class="clearfix"></div>
    
            <ul class="categories">
                <?php 
                if(preg_match('%^(.*)\/category\/products\/(.*)\/$%', $pathInfo, $matches) || preg_match('%^(.*)\/category\/products\/(.*)$%', $pathInfo, $matches)|| preg_match('%^(.*)\/listings\/index\/categoryProduct\/(.*)$%', $pathInfo, $matches))
                {$vistaCategory = '_viewCategoriesProducts'; }
                else
                {$vistaCategory = '_viewCategories';}
                $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProviderCategories,
                'itemView'=>$vistaCategory,
                'enableSorting' => false,
                'template' => '{items}{pager}',
    )); ?>
            </ul>
        </div>
    
        <!-- Baner estatico 250x600-->
        <div class="widget">
            <p>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProviderBannersGenerales,
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
</div>
<div class="clearfix"></div>
<?php $this->endWidget(); ?>