<?php
/* @var $this LocationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ubicaciones ',
);

$nameSite = "Buscar Ubicaciones";
$this->pageTitle=$nameSite;

Yii::app()->clientScript->registerMetaTag($nameSite." - Guía de proveedores de ferreterias construcción eléctricos e industriales.", 'description');
Yii::app()->clientScript->registerMetaTag(Yii::app()->params->keywords, 'keywords');



?>
<!-- Content
================================================== -->

<div class="container" itemscope="" >
<div class="container">

	<!-- Masonry -->
	<div class="twelve columns">

		<!-- Headline -->
 		<h1 class="headline">Buscar Ubicaciones</h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>

		
		<div class="">
			<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'enablePagination' => true,
			'enableSorting' => false,
			'template' => '{items}{pager}',
			)); ?>
		</div>
		<div class="clearfix"></div>

	</div>
    
<!-- Sidebar
================================================== -->
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
							'dataProvider'=>$dataProviderCategories,
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


</div>
