<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
Yii::app()->clientScript->registerMetaTag("Guía de proveedores de ferreterias construcción eléctricos e industriales.", 'Description');
Yii::app()->clientScript->registerMetaTag("cinta adhesiva doble cara,  cinta de embalar,  cinta doble cara,  cinta antideslizante,  cerradurasde seguridad,  chapas de seguridad ,  cerraduras yale,  cerraduras de seguridad para puertas,  cerradura de seguridad,  cerraduras de seguridad precios,  cerraduras seguridad,  cerraduras electronicas para hoteles,  pisos de madera precios,  iluminacion led hogar,  perfiles estructurales galvanizados,  perfiles estructurales de hierro,  postes para cerca,  hierro corrugado para construccion,  vinilo 3m,  cinta adhesivo,  cinta de doble cara 3m,  cinta adhesiva reflectante,  acero inoxidable,  aceros inoxidables,  estructuras de acero,  ventanas en aluminio, diseÑo de ventanas de aluminio,  cerrajeros,  cerrajerias,  candados de seguridad,  cerraduras electronicas,  herrajes para cocina, cerraduras  magneticas,  ventanas metalicas,  ventanas de aluminio,  ventanas en aluminio,  ventanas en pvc,  puertas de vidrio,  aluminio para ventanas,  ventanas de seguridad,  ventanas precios,  precios casas prefabricadas,  muebles para lavamanos,  cocinas integrales,  decoracion de interiores,  disenos de banos,  pisos de madera precios,  lamparas de pared,  lamparas de pie,  lamparas para exteriores,  lamparas techo,  iluminacion hogar,  tiendas de iluminacion,  colgantes de iluminacion,  iluminacion cocinas modernas,  iluminacion fabrica,  iluminacion precios,  lamparas para living,  compresores de aire,  mini compresor,  ingersoll rand air compressor, fabrica de guantes industriales, fabricantes de guantes industriales,  guantes anti cortes industrial,  guantes desechables precio,  guantesde vinilo precio,  accesorios acero inoxidable, acero inoxidable, accesorios inoxidables,  ferreteria,  tejas plásticas,  cerca electrica,  malla hexagonal,  velcro,  cinta aislante,  ferreterias,  ferreteria industrial,  ferretería sbogota,  ferreterias,  productos de ferreteria,  herramientas de ferreteria,  ferreteria online,  nombres de ferreterias,  ferreterias en bogota,  ferreteria americana,  ferreteria virtual,  productos de ferreteria en general,  catalogo herramientas,  ferreterias mayoristas,  cables,  lamina de acero,  tubos de acero,  estructuras metalicas,  acerosaleados,  galvanizado,  hierro, hierrogalvanizado, perfiles metalicos,  aluminios,  cerraduras electricas, ventanas, remodelaciÃ³n,  griferia,  cocinas modernas,  tornillo inoxidable,  tornillos en bogota,  herramientas bosch,  clavos para cemento,  tuercas seguridad, madera,  iluminaciones,  proveedores de ferreterias, productos de ferreteria en general,  ferreteria industrial,  productos de ferreteria,  productos ferreteria, lamina de acero al carbon, tornilleria, compresores, guante nitrilo,  guantes de latex por mayor,  accesorios sanitarios,  grifería para baÑo,  tubos pvc,  valvulas", 'keywords');
?>
<script>jQuery(document).ready(function($) {
    $(".royalSlider").royalSlider({
    	// general options go gere
    	autoScaleSlider: true,
    	autoPlay: {
    		// autoplay options go gere
    		enabled: true,
    		pauseOnHover: true
    	}
    });  
});
</script>

<!-- Slider
================================================== -->

<div id="homeSlider" class="royalSlider rsDefaultInv">
	<!-- Slide #1 -->
	<div class="rsContent">
		<a class="rsImg" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/slide2_op.jpg"></a>

		<!-- Slide Caption -->
		<div class="SlideTitleContainer rsABlock">
		<div class="CaptionAlignment">
			<div class="rsSlideTitle tags">
				<ul>
					<!--<li>Baking</li>-->
				</ul>
				<div class="clearfix"></div>
			</div>

			<h2 class="rsSlideTitle title"><a>!Más de 1.400 proveedores para elegir!</a></h2>

			<div class="rsSlideTitle details">
				<?php
				echo CHtml::beginForm(CHtml::normalizeUrl(array('/listings/index')), 'get', array('id'=>'filter-form'))
				. CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'Busca proveedores o productos', 'minlength'=>'3'))
				. CHtml::submitButton('', array('name'=>'', 'class'=>'fa fa-search','id'=>'btnSearch'))
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
			</div>

		</div>
		</div>

	</div>

	</div>

</div>

<!-- Content
================================================== -->

<div class="container">
<div class="container">

	<!-- Masonry -->
	<div class="twelve columns">

		<!-- Headline -->
 		<h1 class="headline">Todo Para: Guía de Proveedores :: Revista Fierros, la comunidad de negocios para el sector Ferretero en la región andina</h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>


		<!-- Isotope -->
		<div class="isotope">
        
        <?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$listingsDataProvider,
			'itemView'=>'/classifieds/_view',
			'enablePagination' => true,
			'enableSorting' => false,
			'template' => '{items}{pager}',
			'ajaxUpdate' => false,
    		'id'=>'ajaxListView',
			)); ?>
			
		</div>
		<div class="clearfix"></div>

	</div>


<!-- Sidebar
================================================== -->
<div class="four columns">
	


	<!-- Categories -->
	<div class="widget">
		<h4 class="headline">Categorías</h4>
		<span class="line margin-bottom-20"></span>
		<div class="clearfix"></div>

		<ul class="categories">
			<?php $this->widget('zii.widgets.CListView', array(
							'dataProvider'=>$dataProviderCategories,
							'itemView'=>'/listings/_viewCategories',
							'enablePagination' => false,
							'enableSorting' => false,
							'template' => '{items}{pager}',
						)); ?>

		</ul>
	</div>
    

</div>


</div>
<!-- Container / End -->

<div class="margin-top-5"></div>


</div>
<!-- Wrapper / End -->

</div>
