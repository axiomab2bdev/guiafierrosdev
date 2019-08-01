<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
Yii::app()->clientScript->registerMetaTag("La GUIA de Proveedores es el único espacio virtual especializado en insumos y servicios exclusivos para la industria de alimentos y bebidas en Colombia.", 'Description');
Yii::app()->clientScript->registerMetaTag("Ialimentos, proveedores, industria, alimentos, ingredientes, desinfeccion, limpieza, empaques, envases", 'keywords');
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
		<a class="rsImg" href="images/ialimentos.jpg"></a>

		<!-- Slide Caption -->
		<div class="SlideTitleContainer rsABlock">
		<div class="CaptionAlignment">
			<div class="rsSlideTitle tags">
				<ul>
					<!--<li>Baking</li>-->
				</ul>
				<div class="clearfix"></div>
			</div>

			<h2 class="rsSlideTitle title"><a>!Más de 1.613 proveedores para elegir!</a></h2>

			<div class="rsSlideTitle details">
				<?php
				echo CHtml::beginForm(CHtml::normalizeUrl(array('listings/index')), 'get', array('id'=>'filter-form'))
				. CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?', 'minlength'=>'3'))
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

<div class="container" itemscope="" itemtype="http://schema.org/Recipe">
<div class="container">

	<!-- Masonry -->
	<div class="twelve columns">

		<!-- Headline -->
 		<h1 class="headline">Productos</h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>

		<!-- Isotope -->
		<div class="isotope">
        
        <?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$listingsDataProvider,
			'itemView'=>'classifieds/_view',
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
	
    <!-- Baner estatico 250x250-->
	<div class="widget">
    	<p>
    		<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBanners,
				'itemView'=>'banners/_view250x250General',
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
							'dataProvider'=>$dataProviderCategories,
							'itemView'=>'listings/_viewCategories',
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
				'itemView'=>'banners/_view250x600General',
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

<div class="margin-top-5"></div>


</div>
<!-- Wrapper / End -->

</div>
