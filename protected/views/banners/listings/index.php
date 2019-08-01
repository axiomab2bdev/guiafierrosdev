<?php
/* @var $this ListingsController */
/* @var $dataProvider CActiveDataProvider */
/* @var $this ListingsController */
/* @var $dataProviderCategories CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Listings',
);*/

$this->breadcrumbs=array(
'Proveedores'=>array('index'),

);
$pathInfo =$_SERVER['REQUEST_URI'];
	if(preg_match('%^(.*)\/category\/(.*)\/$%', $pathInfo, $matches))
		{
        $dataProviderCategoriesDetail = Categories::model()->findByAttributes(array('friendly_url'=>$matches[2]));
		if($dataProviderCategoriesDetail === null)
		{
			$piecesUrl = explode("/", $matches[2]);
			//echo '1'.$piecesUrl[1];
			$dataProviderCategoriesDetail = Categories::model()->findByAttributes(array('friendly_url'=>$piecesUrl[1]));
		}
		$nameSite = strtr($dataProviderCategoriesDetail->meta_title,Yii::app()->params->unwanted_array)." - ".Yii::app()->name;
		$this->pageTitle=$nameSite;
		
		Yii::app()->clientScript->registerMetaTag(strtr($dataProviderCategoriesDetail->meta_description,Yii::app()->params->unwanted_array), 'description');
		Yii::app()->clientScript->registerMetaTag(strtr($dataProviderCategoriesDetail->meta_keywords,Yii::app()->params->unwanted_array), 'keywords');
		}
	elseif(preg_match('%^(.*)\/category\/(.*)$%', $pathInfo, $matches))
		{
		$dataProviderCategoriesDetail = Categories::model()->findByAttributes(array('friendly_url'=>$matches[2]));
		if($dataProviderCategoriesDetail === null)
		{
			$piecesUrl = explode("/", $matches[2]);
			//echo '2'.$piecesUrl[2];
			$dataProviderCategoriesDetail = Categories::model()->findByAttributes(array('friendly_url'=>$piecesUrl[1]));
		}	
		$nameSite = $dataProviderCategoriesDetail->meta_title." - ".Yii::app()->name;
		$this->pageTitle=$nameSite;
		
		Yii::app()->clientScript->registerMetaTag(strtr($dataProviderCategoriesDetail->meta_description,Yii::app()->params->unwanted_array), 'description');
		Yii::app()->clientScript->registerMetaTag(strtr($dataProviderCategoriesDetail->meta_keywords,Yii::app()->params->unwanted_array), 'keywords');
		}
	elseif(preg_match('%^(.*)\/location\/(.*)$%', $pathInfo, $matches) || preg_match('%^(.*)\/location\/(.*)\/$%', $pathInfo, $matches))
		{
		$nameSite = strtr($_GET[location],Yii::app()->params->unwanted_array)." - ".Yii::app()->name;
		$this->pageTitle=$nameSite;	
		Yii::app()->clientScript->registerMetaTag(strtr($_GET[location],Yii::app()->params->unwanted_array).' '.strtr($_GET[location_description],Yii::app()->params->unwanted_array), 'description');
		
		if($_GET[location_keywords])
			Yii::app()->clientScript->registerMetaTag(strtr($_GET[location],Yii::app()->params->unwanted_array).' '.strtr($_GET[location_description],Yii::app()->params->unwanted_array), 'keywords');
		else
			Yii::app()->clientScript->registerMetaTag(Yii::app()->params->keywords, 'keywords');
		}
	else{
			
		$nameSite = Yii::app()->name;
		Yii::app()->clientScript->registerMetaTag(Yii::app()->params->keywords, 'keywords');
		Yii::app()->clientScript->registerMetaTag($nameSite.", limpieza y desinfección, carnes, frutas, muebles, iluminación, café, pastas, pescados y mariscos.", 'Description');
		$this->pageTitle=$nameSite;	
		}
		
if(isset($_REQUEST['keyword'])){ ?>
 <!-- Titlebar Search
================================================== -->
<section id="titlebar">
	<!-- Container -->
	<div class="container search">

		<div class="eight columns menu">
        	<ul>
                <li style="display: -webkit-box;"><a id="listing" class="active">Productos<i class="fa fa-chevron-circle-down"></i></a></li>
                <li><a id="classified" >Proveedores<i class="fa fa-chevron-circle-right"></i></a></li>
        </ul>
		</div>
		<div class="six columns align-right">
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
        
		</div>
	</div>
	<!-- Container / End -->
</section>
<? } ?>

<div class="margin-top-35"></div>
<!-- Headline -->
<div class="container">
	<!-- Masonry -->
	<div class="twelve columns list-proveedores">
    <?php
	$pathInfo =$_SERVER['REQUEST_URI'];
		if($dataProviderBanners!='')
		{
	?>
    	<div class="banner2">
            <p>
            
            
             <?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBanners,
				'itemView'=>'banners/_view700x100',
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
        <p><small><a href="/guia/">Inicio</a> >> <a href="/guia/browse_categories.php">Categorías</a> >> <?php echo strtr($dataProviderCategoriesDetail->title,Yii::app()->params->unwanted_array); ?></small><p>
        <h1 class="headline"><?php echo strtr($dataProviderCategoriesDetail->title,Yii::app()->params->unwanted_array); ?></h1>
    <?php }else
	{
    	
        if(preg_match('%^(.*)\/location\/(.*)$%', $pathInfo, $matches) || preg_match('%^(.*)\/location\/(.*)\/$%', $pathInfo, $matches))
		{?>
         	<h1 class="headline"><?php echo strtr($_GET[location],Yii::app()->params->unwanted_array) ?></h1>
        <?php			
		}else{?>
         	<h1 class="headline">Proveedores</h1>
        <?php }
     }
   if(preg_match('%^(.*)\/category\/products\/(.*)\/$%', $pathInfo, $matches) || preg_match('%^(.*)\/category\/products\/(.*)$%', $pathInfo, $matches) || preg_match('%^(.*)\/listings\/index\/categoryProduct\/(.*)$%', $pathInfo, $matches)){?>
    <!-- Isotope -->
    <div class="isotope" id="Category-product">
        <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProviderProductos,
        'itemView'=>'classifieds/_view',
        'enablePagination' => true,
        'enableSorting' => false,
        'template' => '{items}{pager}',
        'id'=>'ajaxListView',
        'emptyText' => 'No se encontrarón Productos en la categoria',
        )); ?>
    </div>
    
    <? } else if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']!=""){ ?>
        <!-- Headline Resultado de Busqueda-->
            <span class="line rb margin-bottom-35"></span>
            <div class="clearfix"></div>
            <div>
            <div class="toggler">
              <div id="effect" >
                <!-- Isotope -->
                    <div class="isotope">
                        <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProviderProductos,
                        'itemView'=>'classifieds/_view',
                        'enablePagination' => true,
                        'enableSorting' => false,
                        'template' => '{items}{pager}',
                        'id'=>'ajaxListView',
        				'emptyText' => 'No se encontrarón Productos con la palabra "'.$_REQUEST['keyword'].'" Realizar búsqueda por <b><a id="classifiedEmpy" >Proveedores</a><b>',
                        )); ?>
                    </div>
              </div>
            </div>
            <div class="toggler">
              <div id="effect2" class="ui-widget-content ui-corner-all" style="display: none;">
                    <!-- Isotope -->
                    <div class="list-style">
                    <?php $this->widget('zii.widgets.CListView', array(
                        'id'=>'listings-grid',
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'_view',
                        'pager' => array(
                        'class' => 'CLinkPager',
                        'header' => false,
                        'cssFile' => Yii::app()->request->baseUrl. '/themes/guia/css/pager.css',
                        'id'=>'ajaxListView',
                        ),
						'emptyText' => 'No se encontrarón Proveedores con la palabra "'.$_REQUEST['keyword'].'" Realizar búsqueda por <b><a id="listingEmpy" >Productos</a><b>',
                    )); ?>
                    </div>
              </div>
            </div>	 
        </div>
        <?php }else{?>
		<!-- Headline -->
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>
		<!-- Isotope -->
		<div class="list-style">
        <?php $this->widget('zii.widgets.CListView', array(
		'id'=>'listings-grid',
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
		'pager' => array(
	    'class' => 'CLinkPager',
	    'header' => false,
	    'cssFile' => Yii::app()->request->baseUrl. '/themes/guia/css/pager.css',
	),
)); ?>
		</div>
        <?php }?>
		<div class="clearfix"></div>
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
    <?php
    if(preg_match('%^(.*)\/category\/(.*)$%', $pathInfo, $matches))
		{
	?>
	<!-- Baner estatico 250x250-->
	<div class="widget">
    	<p>
        	<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBanners,
				'itemView'=>'banners/_view250x250',
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
