<script type="text/javascript">
	$(document).ready(function() {	
		$('.fancybox').fancybox();	
    });
</script>

<?php
/* @var $this ClassifiedsController */
/* @var $model Classifieds */
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
//require_once('protected/views/listings/recaptchalib.php');
$publickey = "6LcjjwETAAAAAABVhWdgfu9i7_K0m3PLTNB1Vk8Q"; // you got this from the signup page

$this->breadcrumbs=array(
	'Classifieds'=>array('index'),
	$model->title,
);

Yii::app()->clientScript->registerMetaTag($model->meta_description, 'Description');
Yii::app()->clientScript->registerMetaTag($model->keywords, 'keywords');
$nameSite = $model->title.' - '.Yii::app()->name;
$this->setPageTitle($nameSite);

/*$this->menu=array(
	array('label'=>'List Classifieds', 'url'=>array('index')),
	array('label'=>'Create Classifieds', 'url'=>array('create')),
	array('label'=>'Update Classifieds', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Classifieds', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Classifieds', 'url'=>array('admin')),
);

/*Datos del proveedor*/
$listings = Listings::model()->findByAttributes(array('id'=>$model->listing_id));
/*Datos de la Categoria*/
$categories = Categories::model()->findByAttributes(array('id'=>$listings->primary_category_id));
?>
<script type="text/javascript">
$(document).ready(function(){
	localStorage.setItem('object_id', '<? echo $model->id; ?>');
	localStorage.setItem('object_id_tmp', '<? echo $model->id; ?>');
	localStorage.setItem('object_type', '2');
	localStorage.setItem('object_type_tmp', '2');
	localStorage.setItem('data_type','3');
	localStorage.setItem('data_type_tmp','3');
	$(".btn-primary").popover({placement : 'bottom'});
});
</script>
<!-- Titlebar
================================================== -->
<section id="titlebar">
	<!-- Container -->
	<div class="container submenu-classifieds container-fix">

		<div class="eight columns">
        	<ul class="header-brand">
                <li style="display: -webkit-box;">
	                <a href="/guia/<?php echo $listings->friendly_url; ?>.html">

	                <div id="img" style="background-image:url('/files/logo/<?php echo CHtml::encode($listings->id); ?>.<?php echo CHtml::encode($listings->logo_extension); ?>');"></div>

	                <h2><?php echo strtr($listings->title,Yii::app()->params->unwanted_array); ?></h2>

	                </a>
                </li>
        	</ul>
		</div>

		
		<div class="four columns btn-group btn-group-justified popover-classifieds header-buttons">
			<button onClick="location.href='/guia/<?php echo $listings->friendly_url; ?>.html'" class="btn btn-primary popover-show go2provider" data-original-title="" title="">Ir al Proveedor</button>
               <a href="#coticeConNosotros" class="btn btn-primary popover-show go2cotice" data-original-title="" title=""><i class="fa fa-star" aria-hidden="true"></i> Cotice</a>
		</div>

		
        
		<div class="three columns align-right">
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
        
		</div>

	</div>
	<!-- Container / End -->
</section>


<!-- Content
================================================== -->


<div class="container">

<!-- Slider
======================<?php echo CHtml::encode($model->id); ?>============================ -->

		<?php
			$product_name = "";
			$current_link = "";

			$listing_parent = $model->get_listing_parent();
			$template_file = $listing_parent[0]["template_file"];
			$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$product_name = strtr($model->title,Yii::app()->params->unwanted_array);

			if($template_file == ""){
				$setCategory;
				if ($categoriePadre->id != "")
						$setCategory = $categoriePadre;
				  else 
				  		$setCategory = $categories;
				
				$baseUrl = Yii::app()->baseUrl;
				$gold_listing = Categories::model()->get4gold_2less2Rand($setCategory->id);

				if (count($gold_listing)==0) {
						$gold_listing = "";
				}
				$this->build_4goldListingsForm($gold_listing,$setCategory,$product_name);
			}
		?>

	<div class="eight columns" >
		<!-- Slider -->
		<div class="productSlider rsDefault">
        <?php
	

	/*$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$classifiedsDataProvider,
	)); */ 
	
	
	$dataArray = $classifiedsDataProvider->getData();
	$imgPinter = '';
	foreach ($dataArray as $data){
		if($imgPinter == '')
		{
			$imgPinter = 'http://'.$_SERVER['HTTP_HOST'].'/guia/files/classifieds/'.CHtml::encode($model->id).'-'.CHtml::encode($data->id).".".CHtml::encode($data->extension);
		}
	echo '<img class="rsImg" rel="src" src="/guia/files/classifieds/'.CHtml::encode($model->id).'-'.CHtml::encode($data->id).".".CHtml::encode($data->extension).'" alt="'.$model->title.'" />';
	}
		?>
		</div>
		<div class="clearfix"></div>
        <div class="container social-classified-fix">
            <div class="sixteen columns">
                <section  class="redes-sociales">
                <span>Compartir en:</span>
                    <ul class="share-post">
                        <li>
	                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/classified/<?php echo CHtml::encode($model->friendly_url); ?>-<?php echo CHtml::encode($model->id); ?>.html&t=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" class="facebook-share">
	                        <i class="fa fa-facebook" aria-hidden="true"></i>
	                        </a>
       					</li>
                        <li>
	                       <a href="https://twitter.com/share?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/classified/<?php echo CHtml::encode($model->friendly_url); ?>-<?php echo CHtml::encode($model->id); ?>.html&text=<?php echo $nameSite; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"target="_blank" class="twitter-share">
	                        <i class="fa fa-twitter" aria-hidden="true"></i>
	                        </a>
       					</li>
                        <li>
	                        <a href="https://plus.google.com/share?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/classified/<?php echo CHtml::encode($model->friendly_url); ?>-<?php echo CHtml::encode($model->id); ?>.html" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="google-plus-share">
	                        <i class="fa fa-google-plus" aria-hidden="true"></i>
	                        </a>
       					</li>
                        <li>
	                        <a href="https://pinterest.com/pin/create/button/?url=http://<?php  echo $_SERVER['SERVER_NAME']; ?>/guia/classified/<?php echo CHtml::encode($model->friendly_url); ?>-<?php echo CHtml::encode($model->id); ?>.html&media=<?php echo $imgPinter ?>&description=<?php echo $nameSite ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" class="pinterest-share">
	                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
	                        </a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
	</div>


<!-- Content
================================================== -->
	<div class="eight columns">
		<div class="product-page">
			
			<!-- Headline -->
			<section class="titleProduct">
				<h1><?php echo $model->title;?></h1>
				<?php /*?><span class="product-price">$<?php echo $model->price;?></span><?php */?>
			</section>

			<!-- Text Parapgraph -->
			<section id="margin-reset">
			  <p><strong color:#00FF00>Categoria: </strong><a href="/guia/category/<?php echo CHtml::encode($categories->friendly_url); ?>/"><?php echo CHtml::encode($categories->title); ?></a></p>
              <p><strong color:#00FF00>Descripción: </strong><?php echo $model->description;?></p>
			</section>
			
            
            <section id="coticeConNosotros" class="form-contact-product classified-contact">
           
        
                <!--<span class="contact"><a href="mailto:sandra@chow.com">sandra@chow.com</a></span>-->
                <h3 class="headline">Cotice / Contactenos</h3><div class="clearfix"></div>
                <span class="line"></span>

          

         <?php $form=$this->beginWidget("CActiveForm"); ?> 
         	<form id="add-review" class="add-comment">
             <div class="errors-form">
					<?php if($form->error($listingForm,'name')){echo "Ingresar Nombre valido <br />"; }?>
	                <?php if($form->error($listingForm,'email')){ echo "Ingresar Email valido <br />"; }?>
	                <?php if($form->error($listingForm,'phone')){ echo "Ingresar Tel&#233;fono valido <br />"; }?>
	                <?php if($form->error($listingForm,'city')){echo "Ingresar Ciudad valido <br />"; } ?>
	               	<?php if($form->error($listingForm,'body')){echo "Ingresar Comentario valido <br />"; } ?>
	             </div>
			<fieldset>
            
       <div class="column-left">
            <div>
					<?php echo $form->textField($listingForm, "name", array('placeholder'=>'Nombre: *', 'required'=>'required'));?>
			</div>
            	
             <div>
					<?php echo $form->textField($listingForm, "phone", array('placeholder'=>'Teléfono: *', 'required'=>'required'));?>
			</div>

			<div>
					<?php echo $form->textField($listingForm, "cedula", array('placeholder'=>'Cédula o Nit:'));?>
			</div>
            
       </div>
            
        <div class="column-right">
        
            <div>
                    <?php echo $form->textField($listingForm, "email", array('placeholder'=>'Email: *', 'required'=>'required'));?>
            </div>

            <div>
					<?php echo $form->textField($listingForm, "city", array('placeholder'=>'Ciudad: *', 'required'=>'required'));?>
                    
                    <?php echo $form->hiddenField($listingForm,'CategoriId',array('type'=>"hidden", 'value'=>$categories->id)); ?>
			</div>
        </div>
        <div div class="column-right">
			<?php echo $form->textArea($listingForm,'body',array('rows'=>5, 'cols'=>50,'placeholder'=>'Comentario: *', 'required'=>'required')); ?>
        </div>

        
            
            <div class="boton-form-contact">
                <div>
               		 <p id="acepto"><input type="checkbox" value="1" required="required" class="terminos" checked="checked"></input><span>*</span>&nbsp;Acepto &nbsp;<a href="/pdf/terminos-y-condiciones.pdf" target="_blank">T&eacute;rminos y Condiciones</a> y <a href="/pdf/tratamiento-de-datos.pdf" target="_blank">Tratamientos de Datos</a></p>
               		 <input id="send_full_information" type="checkbox" checked="checked" name="send_full_information" class="hidden">
					<input type="hidden" name="productName" value="<?php echo $product_name; ?>">
					<input type="hidden" name="productURL" value="<?php echo $current_link; ?>">
                </div>

                <div class="four columns btn-group btn-group-justified popover-classifieds">    
					<button id="btn_web_popover" type="button" class="btn btn-primary popover-show" title="" data-container="body" data-toggle="popover" data-content="<a href='<?php echo $listings->www; ?>' target='_blank'><?php echo $listings->www; ?></a>" data-html="true" data-original-title="">
						Website
					</button>
					<button id="btn_phone_popover" type="button" class="btn btn-primary popover-show" title="" data-container="body" data-toggle="popover" data-content="<?php echo $listings->phone; ?>" data-original-title="">
						Teléfono
					</button>
				</div>
                <?php //echo CHtml::submitButton('Enviar', array("class"=>"button medium color")); ?>

				<?php
					if( count($gold_listing) > 0){
						echo "<button type='button' id='form-submit'class='button medium color'>Enviar</button>";
				 		echo "<a id='fancy-trigger' href='#proveedores-oro' class='fancybox'></a>";
						echo CHtml::submitButton('Enviar', array("class"=>"button medium color hidden", "id"=>"post-submit")); 
					}
					else{
						echo CHtml::submitButton('Enviar', array("class"=>"button medium color", "id"=>"post-submit")); 	
					}
			 	?>

            </div>
			</fieldset>   
                          
			<div class="clearfix"></div>
		</form>
         <?php $this->endWidget();?>
          <!-- Add Comment Form -->
            </section>
		</div>
	</div>
</div>


<div class="clearfix"></div>

<div class="margin-bottom-40"></div>
<?php
//Productos Relacionados
$dataArray = $listingsDataProvider->getData();
	if(!$dataArray==''){
?>

<!-- Related Products -->
<div class="container margin-top-5">

	<!-- Headline -->
	<div class="sixteen columns">
		<h3 class="headline">Productos Relacionados</h3>
		<span class="line margin-bottom-0"></span>
	</div>

	<!-- Products -->
	<div class="products">
    <div class="isotope">
<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$listingsDataProvider,
			'itemView'=>'/classifieds/_view',
			'enablePagination' => true,
			'enableSorting' => false,
			'template' => '{items}{pager}',
			)); ?>
		</div>
		<?php }?>

	</div>
</div>

<div class="margin-top-50"></div>


</div>
<!-- Wrapper / End -->






<!--<h1>View Classifieds #<?php echo $model->id; ?></h1>-->

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'listing_id',
		'title',
		'friendly_url',
		'date',
		'description',
		'meta_title',
		'meta_keywords',
		'keywords',
		'meta_description',
		'price',
		'expire_date',
		'www',
		'buttoncode',
	),
)); ?>*/
