<script type="text/javascript">
	$(document).ready(function() {	
		$('.fancybox').fancybox();	

            var $tabs = $('#horizontalTab');
            $tabs.responsiveTabs({
                rotate: false,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                setHash: true,
                activate: function(e, tab) {
                    $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                },
                activateState: function(e, state) {
                    //console.log(state);
                    $('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                }
            });
        });
</script>

<?php
/* @var $this ListingsController */
/* @var $model Listings */
// require_once('recaptchalib.php');
$publickey = "6LehiAoTAAAAAN4sb18vN12ENTPN0naLXaoCVPcW"; // you got this from the signup page
$this->breadcrumbs=array(

	'Listings'=>array('index'),

	$model->title,

	strtr($model->title,Yii::app()->params->unwanted_array),

);

$categories = Categories::model()->findByAttributes(array('id'=>$model->primary_category_id));
$subcategories = Categories::model()->findByAttributes(array('id'=>$model->primary_category_id));

if($categories->parent_id>1){
	$categoriePadre = Categories::model()->findByAttributes(array('id'=>$categories->parent_id)); 
}

$titleCategories="";

if($categories!=""){
	$titleCategories.= strtr($categories->title,Yii::app()->params->unwanted_array);
}

if($categoriePadre!=""){
	$titleCategories.= ' '.strtr($categoriePadre->title,Yii::app()->params->unwanted_array);
}

//get current pagination products
$re = "%^(.*)Classifieds_page\/(.*)$%"; 
$str = $_SERVER['REQUEST_URI'];
if(preg_match($re, $str, $matches)){
    $uriVar = 'Classifieds_page/'.$matches[2];
    $pageProducts = ' - Prod. Pág. '.$matches[2]." - ";
}else{
    $uriVar = NULL;
    $pageProducts = NULL;   
}

// $nameSite = strtr($model->title,Yii::app()->params->unwanted_array).' - '.$titleCategories.$pageProducts.Yii::app()->name;
$nameSite = strtr($model->title,Yii::app()->params->unwanted_array);;

Yii::app()->clientScript->registerLinkTag('canonical',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/'.CHtml::encode($model->friendly_url).'.html'.(isset($uriVar)?'?'.$uriVar:''),NULL);
Yii::app()->clientScript->registerLinkTag('shortlink',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/listings/view/id/'.$model->id.(isset($uriVar)?'/'.$uriVar:''),NULL);

$this->setPageTitle($nameSite);

Yii::app()->clientScript->registerMetaTag(strtr($model->meta_description,Yii::app()->params->unwanted_array), 'Description');

Yii::app()->clientScript->registerMetaTag(strtr($model->meta_keywords,Yii::app()->params->unwanted_array), 'keywords');
if($model->latitude && $model->longitude && $model->latitude != 0 && $model->longitude != 0){ 
Yii::app()->clientScript->registerMetaTag($model->latitude.';'.$model->longitude, 'geo.position');
}
?>

<script type="text/javascript">
	$(document).ready(function(){
	localStorage.setItem('object_id', '<? echo $model->id; ?>');
	localStorage.setItem('object_id_tmp', '<? echo $model->id; ?>');
	localStorage.setItem('object_type', '1');
	localStorage.setItem('object_type_tmp', '1');
	localStorage.setItem('data_type','3');
	localStorage.setItem('data_type_tmp','3');
    $(".btn-primary").popover({placement : 'top'});
});
</script>

<?php if($model->template_file!=""){?>

<!-- INICIO DE PLANTILLA PARA ORO Y PLATA-->

<!-- Código DiV de la plantilla-->
<div id="wrapper">

<div class="recipeBackground1">

</div>

<!-- Content ================================================== -->

<div class="container">

	<!-- Recipe -->

	<div class="twelve columns">

	<div class="alignment">

		<!-- Header -->
		
		<section class="recipe-gold-header">
			<div class="recipe-gold-container">
				<?php $idheadImg = uniqid($model->id);	?>
                <img rel="image_src" class="logo-form" id="img<?php echo $idheadImg; ?>" src="/themes/guia/images/loading_EO_mini.gif" alt="<?php echo strtr($model->title,Yii::app()->params->unwanted_array ); ?>" />
                <script> 
					imageAPi('<?php echo $idheadImg; ?>','<?php echo CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); ?>','listing');
				</script>
				<h1><?php echo strtr($model->title,Yii::app()->params->unwanted_array); ?></h1>	
			</div>
		</section>

            <!-- Slider -->
      <?php 

	  	$dataArray = $classifiedsDataProvider->getData();

	 	if(count($dataArray)>0){?>

		<div class="recipeSlider rsDefault">


       <?php
			foreach ($dataArray as $data){
		?>
           <?php $modelImage = ClassifiedsImages::model()->findByAttributes(array('classified_id'=>$data->id));

						if($modelImage===null){

						}else{

							for($i=0; $i<count($modelImage); $i++){?>

						<img itemprop="image" class="rsImg" src="/guia/files/classifieds/<?php echo CHtml::encode($data->id).'-'.$modelImage->id.".".$modelImage->extension;?>" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array);?> | Imagen <?php echo $modelImage->id; ?>" />

					<?php } 

							}?>

        <?php }?>

		</div>

        <?php }?>

		<!-- Details -->

		<section class="recipe-details" >

        <div class="inform-proveedor">
			<ul>
				<li>
                	<strong itemprop="recipeYield" class="direccion-proveedor"><?php echo strtr($model->listing_address1,Yii::app()->params->unwanted_array); ?></strong>
                </li>

               <?php /*?> <li>

               	 	<strong itemprop="prepTime"><?php echo $model->mail;?></strong>		

                </li><?php */?>

           <div class="popover-listings">    

               <li>
               	<div class="container-mas-informacion">
                	<a href="#productos" class="btn btn-primary popover-show" style="color:white" id="btn_products">Productos</a>
                </div>
               </li>

               <li>
               	<div class="container-mas-informacion">
                	<a href="#mapa" class="btn btn-primary popover-show fancybox" style="color:white" id="btn_mapa">Mapa</a>
                </div>
               </li>

               <li>
               	<div class="container-mas-informacion">
                	<a href="#cotice" class="btn btn-primary popover-show" style="color:white" id="btn_cotice">Cotice</a>
                </div>
               </li>

           </div>

           

			</ul>

         </div>   

	

		</section>



		<!-- Text -->

         <p class="categorias-proveedor"><strong color:#00FF00>Categoría: </strong>
         	<a href="/guia/category/<?php echo CHtml::encode($categories->friendly_url); ?>/">
				<h2>
					<?php echo strtr($categories->title,Yii::app()->params->unwanted_array);?> 
				</h2>
			</a>

			<?php if(isset($categoriePadre) && $categoriePadre!=""){ ?>

				<a href="/guia/category/<?php echo CHtml::encode($categoriePadre->friendly_url); ?>">	
					<?php echo strtr($categoriePadre->title,Yii::app()->params->unwanted_array); ?>
				</a>

			<?php } ?>
         </p>


         <!--TABS-->
             <div id="horizontalTab">
        <ul>
            <li><a href="#tab-1"><h3>DESCRIPCIÓN</h3></a></li>

            <?php if($model->custom_4!=""){?>
            	<li><a href="#tab-2"><h3>CLIENTES</h3></a></li>
            <?php }?>	
			
			<?php if($model->custom_5!=""){?>  
            	<li><a href="#tab-3"><h3>CUBRIMIENTO</h3></a></li>
            <?php }?>

            <?php if($model->custom_2!=""){?> 
            	<li><a href="#tab-4"><h3>MARCAS</h3></a></li>
            <?php }?>

             <?php if($model->custom_3!=""){?>       
            	<li><a href="#tab-5"><h3>LÍNEA DE PRODUCTOS</h3></a></li>
            <?php }?>
        </ul>

        <div id="tab-1">
        	<?php echo strtr($model->description,Yii::app()->params->unwanted_array); ?>
        </div>
		
		<?php if($model->custom_4!=""){?>	
    	    <div id="tab-2">
                <!-- <h3>Clientes Importantes</h3> -->
				<?php echo strtr($model->custom_4,Yii::app()->params->unwanted_array); ?>
	        </div>
        <?php }?>

		<?php if($model->custom_5!=""){?>  
	        <div id="tab-3">
	            <h3>Ciudades de Cubrimiento</h3>
				<?php echo strtr($model->custom_5,Yii::app()->params->unwanted_array); ?>
	        </div>
        <?php }?>

        <?php if($model->custom_2!=""){?>                
        	<div id="tab-4">
             	<h3>Marcas que Representa</h3>
             	<?php echo strtr($model->custom_2,Yii::app()->params->unwanted_array); ?> 
             </div>
        <?php }?>

        <?php if($model->custom_3!=""){?>  
	        <div id="tab-5">
	         	<h3>Línea de Productos y Servicios</h3>
				<?php echo strtr($model->custom_3,Yii::app()->params->unwanted_array); ?>	
	        </div> 
        <?php }?>      
    </div>
    <!--TABS-->
			
	<!-- INICIO REDES SOCIALES -->
    <div class="social-section">
       	<span>Compartir en:</span>
     	<ul class="share-post">

            <!-- Facebook -->
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&t=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" class="facebook-share"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

   			<!-- Twitter -->
            <li><a href="https://twitter.com/share?url=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&text=<?php echo $nameSite; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" class="twitter-share"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
 
			<!-- Google Plus -->
            <li><a href="https://plus.google.com/share?url=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="google-plus-share"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>

   			<!-- Pinterest -->
			<li><a href="https://pinterest.com/pin/create/button/?url=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&media=<?php echo $imgPinter ?>&description=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="pinterest-share"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <!-- FIN REDES SOCIALES -->


		<!-- Author Box -->

	<div class="widget">
        	<div class="author-box listing-contact">

        		<h3 id="cotice" class="headline">Cotice / Contactenos</h3>

                <?php if($model->logo_extension!=""){?>
              
					<div class="logo-form-contact">
		                <?php $idImg = uniqid($model->id);	?>
		                <img rel="image_src" class="logo-form" id="img<?php echo $idImg; ?>" src="/themes/guia/images/loading_EO_mini.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" />
		                <script> 
							//optimize logo image
							imageAPi('<?php echo $idImg; ?>','<?php echo CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); ?>','listing');
						</script>
	                </div>
             	
          		<?php } ?>
			
            	
            	<div class="clearfix"></div>

     	 		<?php $form=$this->beginWidget("CActiveForm"); ?> 

	         	<form id="add-review" class="add-comment">
		             <div class="errors-form">
						<?php if($form->error($listingForm,'name')){echo "Ingresar Nombre valido <br />"; }?>
		                <?php if($form->error($listingForm,'email')){ echo "Ingresar Email valido <br />"; }?>
		                <?php if($form->error($listingForm,'phone')){ echo "Ingresar Teléfono valido <br />"; }?>
		                <?php if($form->error($listingForm,'city')){echo "Ingresar Ciudad valido <br />"; } ?>
		               	<?php if($form->error($listingForm,'body')){echo "Ingresar Comentario valido <br />"; } ?>
		             </div>

					<fieldset>
			            <div>
							<?php echo $form->labelEx($listingForm,'Nombre:'); ?><span>*</span>
							<?php echo $form->textField($listingForm, "name", array('required'=>'required'));?>
						</div>            	

						<div>
								<?php echo $form->labelEx($listingForm,'Email:'); ?><span>*</span>
								<?php echo $form->textField($listingForm, "email", array('required'=>'required'));?>
					    </div>
					    <div>
							<?php echo $form->labelEx($listingForm,'C&eacute;dula o Nit:'); ?><span></span>
							<?php echo $form->textField($listingForm, "cedula");?>
						</div>		

			             <div>
								<?php echo $form->labelEx($listingForm,'Tel&eacute;fono:'); ?><span>*</span>
								<?php echo $form->textField($listingForm, "phone", array('required'=>'required'));?>
						</div>

			            <div>
								<?php echo $form->labelEx($listingForm,'Ciudad:'); ?><span>*</span>
								<?php echo $form->textField($listingForm, "city", array('required'=>'required'));?>
						</div>

						<div>
							<?php echo $form->labelEx($listingForm,'Comentario'); ?><span>*</span>
							<?php echo $form->hiddenField($listingForm,'CategoriId',array('type'=>"hidden", 'value'=>$model->primary_category_id)); ?>
								<?php echo $form->textArea($listingForm,'body',array('rows'=>6,'required'=>'required')); ?>
						</div>

			            <div class="one-whole">

						</div>

		             	<div id="condiciones">

		               		<span id="aceptar">*</span><input type="checkbox" value="1" required="required" class="termino" checked="checked"></input>Acepto &nbsp;<a href="/pdf/terminos-y-condiciones.pdf" target="_blank">T&eacute;rminos Condiciones</a> y <a href="/pdf/tratamiento-de-datos.pdf" target="_blank">Tratamientos de Datos</a>
		                </div>

		                <ul class="listing-contact-info">
			                <li> 
			                	<?php if($model->www!=""){?>     
			                    	<div class="container-mas-informacion1"> 

						               	<button id="btn_web_popover" type="button" class="btn btn-primary popover-show" 
						                  title="" data-container="body" 
						                  data-toggle="popover" 
						                  data-content="<a href='<?php echo $model->www; ?>' target='_blank'><?php echo $model->www; ?></a>"
						  				  data-html="true">
						                    Website
						               	</button>

			               			</div>
			               		<?php }?>
			                </li>

			               <li>     
			                	<?php if($model->phone!=""){?>
					               <div class="container-mas-informacion" id="btn_phone_popover"> 

						               <button id="btn_phone_popover" type="button" class="btn btn-primary popover-show" 
						                  title="" data-container="body" 
						                  data-toggle="popover" 
						                  data-content="<?php echo $model->phone; ?>">
						                    Tel&eacute;fono
						               </button>

			               			</div>
				               	<?php }?>
				            </li>
		                </ul>
					</fieldset>

            		<span class="line margin-bottom-0"></span>     

            		<?php echo CHtml::submitButton('Enviar', array("class"=>"button medium color")); ?>
		
					<div class="clearfix"></div>
				</form>       
	         <?php $this->endWidget();?>
          <!-- Add Comment Form -->
           </div>	 
	</div>

        <!-- Responsive iFrame -->
		<div id="mapa" style="display: none;">
			<?php if($model->latitude && $model->longitude && $model->latitude != 0 && $model->longitude != 0){ ?>	
        	<!-- Mapa -->
        		<iframe width="425" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $model->latitude ?>%2C<?php echo $model->longitude ?>&key=AIzaSyAFifVT3_tXhWjR_sIpVGvS7yPxRuqjSBc"></iframe>

            <!-- Fin Mapa -->
        	<?php }	?>
		</div>

		<div class="clearfix"></div>

        <?php 

			$imgPinter='';

			if($model->logo_extension!=""){

			 $imgPinter = "http://www.fierros.com.co/files/logo/".CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); 

			}

		?>

		<div class="clearfix"></div>

		<!-- Meta 

  		<div class="post-meta">

			By <a href="#" itemprop="author">Sandra Fortin</a>, on

			<meta itemprop="datePublished" content="2014-30-10">30th November, 2014</meta>

		</div>  

-->

		<div class="margin-bottom-40"></div>

	<?php $dataArrayClassifieds = $classifiedsDataProvider->getData(); 

		  if(count($dataArrayClassifieds>0)){;

	

	?>        

		<!-- Headline -->

        <div id="productos">

 		<h3 class="headline">Nuestros Productos</h3>

		<span class="line margin-bottom-35"></span>

		<div class="clearfix"></div>



		

        <div class="related-posts">

		<div class="isotope">



		<?php 
		//if pagining
            $params=$_GET[$classifiedsDataProvider->pagination->pageVar]-1;
            if(isset($params)&&$params>=0){
                $classifiedsDataProvider->pagination->setCurrentPage($params);
            }
			
		$this->widget('zii.widgets.CListView', array(

			'dataProvider'=>$classifiedsDataProvider,

			'itemView'=>'/classifieds/_view',
			'ajaxUpdate'=>false,

			'enablePagination' => true,

			'enableSorting' => false,

			'template' => '{items}{pager}',

			)); ?>

		</div>

        </div>

        <?php }?>

        </div>

		<div class="clearfix"></div>





		<div class="margin-top-15"></div>



	

	</div>

	</div>



<!-- Sidebar ================================================== -->

<div class="four columns">

	<!-- Search Form -->

	<div class="widget search-form">

		<div class="toggler">

		<nav class="search" id="searchCustom">

        <?php

		echo CHtml::beginForm(CHtml::normalizeUrl(array('/listings/index')), 'get', array('id'=>'filter-form'))

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

    

	<!-- Banner 250x250 -->

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

<!-- Container / End -->

</div>

<!-- FIN DE PLANTILLA PARA ORO Y PLATA-->

<?php }?>

<?php if($model->template_file==""){?>

<!-- ================================================================ -->
<!-- 
	test1234
	<?php 
		$mainCategory = $model->primary_category_id;
	 ?>
	 <div style="position:absolute;z-index: 10000;">
	<?php 
		$catListing = Listings::model()->findAllByAttributes(array('primary_category_id'=>$mainCategory),'template_file!=""'); 
		echo $catListing->title;

		foreach ($catListing as $once) {
			echo $once->title;
		}
	?>
	</div>
 -->
<!-- INICIO DE PLANTILLA BRONCE -->

<!-- Código DiV de la plantilla-->|

<div id="wrapper">
<!-- Recipe Background -->
<div class="recipeBackground1">

</div>

<!-- Content ================================================== -->

<div class="container">

	<!-- Recipe -->

	<div class="twelve columns">

	<div class="alignment">



		<!-- Header -->

		<section class="recipe-header">

         

			<div class="title-alignment">

				<h1><?php echo strtr($model->title,Yii::app()->params->unwanted_array); ?></h1>

			<!--	<div class="rating four-stars">

					<div class="star-rating"></div>

					<div class="star-bg"></div>

				</div>-->

				<!--<span><a href="#reviews">(2 reviews)</a></span>-->

			</div>

		</section>

			<?php 
					$setCategory;
					if($categoriePadre->id != ""){
						$setCategory=$categoriePadre;
					}
					else {
						$setCategory=$categories;
					}

					$baseUrl = Yii::app()->baseUrl;
					$gold_listing = Categories::model()->get4gold_2less2Rand($setCategory->id);

					if (count($gold_listing)==0) {
						$gold_listing = "";
					}
					
					$this->build_4goldListingsForm($gold_listing,$setCategory,$prueba);
			 ?>
		<!-- Details -->

		<section class="recipe-details" itemprop="nutrition">

        

          <div class="inform-proveedor">

			<ul>

				<ul>

				  <li>

				    <strong itemprop="recipeYield" class="direccion-proveedor"><?php echo strtr($model->listing_address1,Yii::app()->params->unwanted_array); ?></strong>

			      </li>

			  </ul>

			</ul>

            </div>
			<div class="clearfix"></div>

		</section>



		<p class="categorias-proveedor"><strong color:#00FF00>Categoría: </strong>
			
         	<a href="/guia/category/<?php echo CHtml::encode($categories->friendly_url); ?>/">
				<h2>
					<?php echo strtr($categories->title,Yii::app()->params->unwanted_array);?>	
				</h2>
			 </a>

				<?php if($categoriePadre!=""){ ?>

					 >> <a href="/guia/category/<?php echo CHtml::encode($categoriePadre->friendly_url); ?>"><?php echo strtr($categoriePadre->title,Yii::app()->params->unwanted_array); ?></a>

			<?php	}

			?>

            

         </p>

		<!-- Text -->

		<p itemprop="description" class="description"><?php echo strtr($model->description_short,Yii::app()->params->unwanted_array); ?></p>
	
	<!-- INICIO REDES SOCIALES -->
    <div class="social-section">
       	<span>Compartir en:</span>
     	<ul class="share-post">

            <!-- Facebook -->
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&t=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" class="facebook-share"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

   			<!-- Twitter -->
            <li><a href="https://twitter.com/share?url=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&text=<?php echo $nameSite; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" class="twitter-share"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
 
			<!-- Google Plus -->
            <li><a href="https://plus.google.com/share?url=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="google-plus-share"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>

   			<!-- Pinterest -->
			<li><a href="https://pinterest.com/pin/create/button/?url=http://www.fierros.com.co/guia/<?php echo CHtml::encode($model->friendly_url); ?>.html&media=<?php echo $imgPinter ?>&description=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="pinterest-share"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <!-- FIN REDES SOCIALES -->

			<!-- Author Box -->

	<div class="widget">

			<div class="author-box listing-contact">
              	<?php if($model->logo_extension!=""){?>
              
					<div class="logo-form-contact">
		            	<?php $idImg = uniqid($model->id);?>
		            	<img rel="image_src" class="logo-form" id="img<?php echo $idImg; ?>" src="/themes/guia/images/loading_EO_mini.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" />
		                <script> 
							//optimize logo image
							imageAPi('<?php echo $idImg; ?>','<?php echo CHtml::encode($model->id).'.'.CHtml::encode($model->logo_extension); ?>','listing');
						</script>
		            </div>
             	
          		<?php } ?>
			
	            <h3 id="cotice" class="headline">Cotice / Contactenos</h3>
	            <div class="clearfix"></div>

     	 		<?php $form=$this->beginWidget("CActiveForm"); ?> 

		         	<form id="add-review" class="add-comment">

			             <div class="errors-form">
							<?php if($form->error($listingForm,'name')){echo "Ingresar Nombre valido <br />"; }?>

			                <?php if($form->error($listingForm,'email')){ echo "Ingresar Email valido <br />"; }?>

			                <?php if($form->error($listingForm,'city')){echo "Ingresar Ciudad valido <br />"; } ?>

			               	<?php if($form->error($listingForm,'body')){echo "Ingresar Comentario valido <br />"; } ?>
			             </div>

						<fieldset>

				            <div>
									<?php echo $form->labelEx($listingForm,'Nombre:'); ?><span>*</span>

									<?php echo $form->textField($listingForm, "name", array('required'=>'required'));?>
							</div>
	
							<div>
									<?php echo $form->labelEx($listingForm,'Email:'); ?><span>*</span>

									<?php echo $form->textField($listingForm, "email", array('required'=>'required'));?>
						    </div>

						    <div>
								<?php echo $form->labelEx($listingForm,'C&eacute;dula o Nit:'); ?><span></span>

								<?php echo $form->textField($listingForm, "cedula");?>
							</div>	

				             <div>
									<?php echo $form->labelEx($listingForm,'Tel&eacute;fono:'); ?><span>*</span>

									<?php echo $form->textField($listingForm, "phone", array('required'=>'required'));?>
							</div>

				            <div>
									<?php echo $form->labelEx($listingForm,'Ciudad:'); ?><span>*</span>

									<?php echo $form->textField($listingForm, "city", array('required'=>'required'));?>
							</div>

				            <div>
									<?php echo $form->labelEx($listingForm,'Comentario'); ?><span>*</span>

				                    <?php echo $form->hiddenField($listingForm,'CategoriId',array('type'=>"hidden", 'value'=>$model->primary_category_id)); ?>

									<?php echo $form->textArea($listingForm,'body',array('rows'=>6, 'required'=>'required')); ?>
							</div>

							<div class="one-whole">
							</div>

				            <div id="condiciones">

				               		 <input type="checkbox" value="1" required="required" class="termino" checked="checked"></input><span id="aceptar">*</span>Acepto &nbsp;<a href="http://www.fierros.com.co/terminos-y-condiciones.htm">T&eacute;rminos Condiciones</a> y <a href="http://www.fierros.com.co/politica-de-datos.htm">Tratamientos de Datos</a>
				               		 <input id="send_full_information" type="checkbox" checked="checked" name="send_full_information" class="hidden">
				            </div>

				            <div class="listing-contact-info">
				            	<?php if($model->phone!=""){?>   

					               <div class="container-mas-informacion"> 
						            	<button type="button" class="btn btn-primary popover-show" 
						                	title="" data-container="body" 
					                  		data-toggle="popover" 
							                data-content="<?php echo $model->phone; ?>"
					                  		id="btn_phone_popover">
					                    	Tel&eacute;fono
					               		</button>
					           		</div>

					           <?php }?>
				            </div>
						</fieldset>

            			<span class="line margin-bottom-0"></span>

            			<?php
							if( count($gold_listing) > 0){
								echo "<button type='button' id='form-submit'class='button medium color'>Enviar</button>";
						 		echo "<a id='fancy-trigger' href='#proveedores-oro' class='fancybox hidden'></a>";
								echo CHtml::submitButton('Enviar', array("class"=>"button medium color hidden", "id"=>"post-submit")); 
							}
							else{
								echo CHtml::submitButton('Enviar', array("class"=>"button medium color", "id"=>"post-submit")); 	
							}
						 ?>

            			<?php //echo CHtml::submitButton('Enviar', array("class"=>"button medium color")); ?>

						<div class="clearfix"></div>
					</form>
		         <?php $this->endWidget();?>
          <!-- Add Comment Form -->
	        </div>	 
		</div>	<!-- Banner 250x250 -->


		<div class="margin-bottom-40"></div>

	<?php $dataArrayClassifieds = $classifiedsDataProvider->getData(); 

		  if(count($dataArrayClassifieds>0)){;

	

	?>        

		<!-- Headline -->

        <div id="productos">

 		<h3 class="headline">Nuestros Productos</h3>

		<span class="line margin-bottom-35"></span>

		<div class="clearfix"></div>



		

        <div class="related-posts">

		<div class="isotope">



		<?php 
		//if pagining
            $params=$_GET[$classifiedsDataProvider->pagination->pageVar]-1;
            if(isset($params)&&$params>=0){
                $classifiedsDataProvider->pagination->setCurrentPage($params);
            }
			
		$this->widget('zii.widgets.CListView', array(

			'dataProvider'=>$classifiedsDataProvider,

			'itemView'=>'/classifieds/_view',
			'ajaxUpdate'=>false,

			'enablePagination' => true,

			'enableSorting' => false,

			'template' => '{items}{pager}',

			)); ?>

		</div>

        </div>

        <?php }?>

        </div>

		<div class="clearfix"></div>





		<div class="margin-top-15"></div>


		<div class="recipe-container">  
			<div class="directions-container">

			</div>
		</div>

		<div class="clearfix"></div>

		<br />

        <div class="banner2">

            <p>

            	<?php $this->widget('zii.widgets.CListView', array(

				'dataProvider'=>$dataProviderBanners,

				'itemView'=>'/banners/_view700x100',

				'enableSorting' => false,

				'enablePagination' => false,

				'emptyText' => '',

				'enablePagination' => true,

				'enableSorting' => false,

				'template' => '{items}',

					));  ?>

            </p>

		</div>

		

		<!-- Meta 

  		<div class="post-meta">

			By <a href="#" itemprop="author">Sandra Fortin</a>, on

			<meta itemprop="datePublished" content="2014-30-10">30th November, 2014</meta>

		</div>  

-->



		<div class="margin-bottom-40"></div>

		<!-- Add Comment ================================================== -->



	</div>

	</div>





<!-- Sidebar ================================================== -->

<div class="four columns">

	<!-- Search Form -->

	<div class="widget search-form">

		<div class="toggler">

		<nav class="search" id="searchCustom">

        <?php

		echo CHtml::beginForm(CHtml::normalizeUrl(array('/listings/index')), 'get', array('id'=>'filter-form'))

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

		);?>

		</nav>

        </div>

        

		<div class="clearfix"></div>

	</div>

	<!-- Banner 250x250 -->

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

				'template' => '{items}',

					)); 

				?>

        </p>

	</div>


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

				'template' => '{items}',

					)); ?>

        </p>

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

				'template' => '{items}',

					)); 

				?>

        </p>

    </div>

	</div>

</div>

<!-- Container / End -->

</div>

<!-- FIN DE PLANTILLA BRONCE-->
<?php }?>