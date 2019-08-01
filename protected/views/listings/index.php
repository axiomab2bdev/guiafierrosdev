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

//get current pagination products
$re = "%^(.*)Listings_page\/(.*)$%"; 
if(preg_match($re, $pathInfo, $matches)){
	$uriVar = 'Listings_page/'.$matches[2];
	$pageActive = 'Página '.$matches[2]." - ";
}else{
	$uriVar = NULL;
	$pageActive = NULL;	
}

	if( preg_match('%^(.*)\/category\/(.*)\/$%', $pathInfo, $matches) || 
		preg_match('%^(.*)\/category\/(.*)$%', $pathInfo, $matches) ||
		preg_match('%^(.*)\/cid\/([1-9]{2})\/(.*)$%', $pathInfo, $matches))
		{
       	 	$dataProviderCategoriesDetail = Categories::model()->findByAttributes(array('friendly_url'=>$matches[2]));
			if($dataProviderCategoriesDetail === null)
			{
			$piecesUrl = explode("/", $matches[2]);
			//echo '1'.$piecesUrl[1];
			$dataProviderCategoriesDetail = Categories::model()->findByAttributes(array('friendly_url'=>$piecesUrl[1]));
				if($dataProviderCategoriesDetail == null){
					$dataProviderCategoriesDetail = Categories::model()->findByAttributes(array('id'=>$matches[2]));
				}
			}
		if(isset($dataProviderCategoriesDetail->meta_title)){
			$nameSite = strtr($dataProviderCategoriesDetail->meta_title,Yii::app()->params->unwanted_array)." - ".$pageActive.Yii::app()->name;
			Yii::app()->clientScript->registerMetaTag(strtr($dataProviderCategoriesDetail->meta_description,Yii::app()->params->unwanted_array), 'description');
			Yii::app()->clientScript->registerMetaTag(strtr($dataProviderCategoriesDetail->meta_keywords,Yii::app()->params->unwanted_array), 'keywords');
			Yii::app()->clientScript->registerLinkTag('canonical',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/category/'.CHtml::encode($dataProviderCategoriesDetail->friendly_url).(isset($uriVar)?'?'.$uriVar:''),NULL);
			Yii::app()->clientScript->registerLinkTag('shortlink',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/listings/index/cid/'.$dataProviderCategoriesDetail->id.(isset($uriVar)?'/'.$uriVar:''),NULL);
		}else{
			$nameSite = $pageActive.Yii::app()->name;
			Yii::app()->clientScript->registerMetaTag(strtr($nameSite,Yii::app()->params->unwanted_array), 'description');
			Yii::app()->clientScript->registerMetaTag(strtr($nameSite,Yii::app()->params->unwanted_array), 'keywords');
			Yii::app()->clientScript->registerLinkTag('canonical',NULL,'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].(isset($uriVar)?'?'.$uriVar:''),NULL);
			Yii::app()->clientScript->registerLinkTag('shortlink',NULL,'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].(isset($uriVar)?'/'.$uriVar:''),NULL);
		}
		$this->pageTitle=$nameSite;
		
		}
	elseif(preg_match('%^(.*)\/location\/(.*)$%', $pathInfo, $matches) || preg_match('%^(.*)\/location\/(.*)\/$%', $pathInfo, $matches))
		{
		$nameSite = strtr($_GET[location],Yii::app()->params->unwanted_array)." - ".$pageActive.Yii::app()->name;
		$this->pageTitle=$nameSite;	
		Yii::app()->clientScript->registerMetaTag(strtr($_GET[location],Yii::app()->params->unwanted_array).' '.strtr($_GET[location_description],Yii::app()->params->unwanted_array), 'description');
		
		if($_GET[location_keywords])
			Yii::app()->clientScript->registerMetaTag(strtr($_GET[location],Yii::app()->params->unwanted_array).' '.strtr($_GET[location_description],Yii::app()->params->unwanted_array), 'keywords');
		else
			Yii::app()->clientScript->registerMetaTag(Yii::app()->params->keywords, 'keywords');
		}
	elseif(isset($_GET['keyword'])){
		$nameSite = 'Resultados de la busqueda - '.$pageActive.Yii::app()->name;
		Yii::app()->clientScript->registerMetaTag(Yii::app()->params->keywords, 'keywords');
		Yii::app()->clientScript->registerMetaTag($nameSite.",maquinaria, limpieza y desinfección, carnes, frutas, muebles, iluminación, café, pastas, pescados y mariscos.", 'Description');
		$this->pageTitle=$nameSite;		
	}
	else{
			
		$nameSite = 'Proveedores - '.$pageActive.Yii::app()->name;
		Yii::app()->clientScript->registerMetaTag(Yii::app()->params->keywords, 'keywords');
		Yii::app()->clientScript->registerMetaTag($nameSite.",maquinaria, limpieza y desinfección, carnes, frutas, muebles, iluminación, café, pastas, pescados y mariscos.", 'Description');
		Yii::app()->clientScript->registerLinkTag('canonical',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/listings/index'.(isset($uriVar)?'/'.$uriVar:''),NULL);
		Yii::app()->clientScript->registerLinkTag('shortlink',NULL,'http://'.$_SERVER['HTTP_HOST'].'/guia/listings/index'.(isset($uriVar)?'/'.$uriVar:''),NULL);
		
		$this->pageTitle=$nameSite;	
		}
		
if(isset($_REQUEST['keyword'])){ ?>
 <!-- Titlebar Search
================================================== -->
<section id="titlebar">
	<!-- Container -->
	<div class="container search searchResults-fix">

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
        <div>
        	<a id="searchAdvance" >Búsqueda Avanzada<i class="fa fa-chevron-circle-right"></i></a>
            <div class="toggler">
              <div id="effectSearchAdvance" class="ui-widget-content ui-corner-all search" style="display: none;">
              	 <?php
				echo CHtml::beginForm(CHtml::normalizeUrl(array('listings/index')), 'get', array('id'=>'filter-form'))
				. CHtml::submitButton('', array('name'=>'', 'class'=>'fa fa-search'))
				. CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?'))
				. CHtml::dropDownList('location',(isset($_GET['location'])) ? $_GET['location'] : '', @Locations::getLocationsArray(), array('id'=>'location', 'class'=>'chosen-select-no-single','empty' => '¿Dónde lo Buscas?'))
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
	<!-- Container / End -->
</section>
<? } ?>

<div class="margin-top-35"></div>
<!-- Headline -->
<div class="container">
	<!-- Masonry -->
	<div class="twelve columns list-proveedores component-pager-fix">
	<script>
		$(function() {
			pathArray = window.location.pathname.split( '/' );
			if(pathArray[pathArray.length-2]!='Listings_page' && pathArray[pathArray.length-2]!='Classifieds_page'){
				if($('.component-product').length<=0 && $('#listing').hasClass('active'))
					$('#classified').trigger('click');
				else if ($('.component-provider').length<=0 && $('#classified').hasClass('active'))
					$('#listing').trigger('click');
			}
		});
	</script>
    <?php
	$pathInfo =$_SERVER['REQUEST_URI'];
		if($dataProviderBanners!='')
		{
	?>
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
         	<h1 class="headline"><?php echo strtr($_GET['location'],Yii::app()->params->unwanted_array) ?></h1>
        <?php			
		}elseif(!isset($_GET['keyword'])){?>
         	<h1 class="headline">Proveedores</h1>
        <?php }
     }
   if(preg_match('%^(.*)\/category\/products\/(.*)\/$%', $pathInfo, $matches) || preg_match('%^(.*)\/category\/products\/(.*)$%', $pathInfo, $matches) || preg_match('%^(.*)\/listings\/index\/categoryProduct\/(.*)$%', $pathInfo, $matches)){?>
   <h1 class="headline">Productos</h1>
    <!-- Isotope -->
    <div class="isotope" id="Category-product">
        <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProviderProductos,
        'itemView'=>'/classifieds/_view',
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
              <div id="classifieds" >
              	<h1 class="headline">Productos</h1>
                <div class="clearfix"></div>
                <!-- Isotope -->
                    <div class="isotope">
                        <?php $this->widget('zii.widgets.CListView', array(
                        // 'dataProvider'=>$dataProviderProductos,
                        'dataProvider'=>Classifieds::model()->searchAdvance_sql2($_REQUEST['keyword'],$location),
                        'itemView'=>'/classifieds/_view',
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
              <div id="listings" class="ui-widget-content ui-corner-all" style="display: none;">
              	<h1 class="headline">Proveedores</h1>
                <div class="clearfix"></div>
                    <!-- Isotope -->
                    <div class="list-style">
                    <?php $this->widget('zii.widgets.CListView', array(
                        'id'=>'listings-grid',
                        // 'dataProvider'=>$dataProvider,
                        'dataProvider'=>Listings::model()->searchAdvance_sql2($_REQUEST['keyword'],$location),
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
<?php if(!isset($_REQUEST['keyword'])){ ?>
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
        <div>
        	<a id="searchAdvance" >Búsqueda Avanzada<i class="fa fa-chevron-circle-right"></i></a>
            <div class="toggler">
              <div id="effectSearchAdvance" class="ui-widget-content ui-corner-all search" style="display: none;">
              	 <?php
				echo CHtml::beginForm(CHtml::normalizeUrl(array('listings/index')), 'get', array('id'=>'filter-form'))
				. CHtml::submitButton('', array('name'=>'', 'class'=>'fa fa-search'))
				. CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?'))
				. CHtml::dropDownList('location',(isset($_GET['location'])) ? $_GET['location'] : '', @Locations::getLocationsArray(), array('id'=>'location', 'class'=>'chosen-select-no-single','empty' => '¿Dónde lo Buscas?'))
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
		<div class="clearfix"></div>
	</div>
<?php } ?>
    <? if(isset($_REQUEST['keyword'])){ ?>
    <!-- Widget search locarions-->
    <? //$this->widget('application.components.SearchLocations'); ?>
    <!--End Widget search locarions-->
    <div class="clearfix"></div>
    <? } ?>
    
    <?php
    if(preg_match('%^(.*)\/category\/(.*)$%', $pathInfo, $matches))
		{
	?>
	<!-- Baner estatico 250x250-->
	<div class="widget">
    	<p>
        	<?php 
			if(isset($dataProviderBanners)){
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBanners,
				'itemView'=>'/banners/_view250x250',
				'enableSorting' => false,
				'enablePagination' => false,
				'emptyText' => '',
				'enablePagination' => true,
				'enableSorting' => false,
				'template' => '{items}{pager}',
					)); 
				
			}?>
        </p>
    </div>
    <? } ?>
    
    <!-- Baner estatico 250x600-->
    <div class="widget">
    	<p>
    		<?php 
			if(isset($dataProviderBannersGenerales)){
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBannersGenerales,
				'itemView'=>'/banners/_view250x600General',
				'enableSorting' => false,
				'enablePagination' => false,
				'emptyText' => '',
				'enablePagination' => false,
				'enableSorting' => false,
				'template' => '{items}{pager}',
					)); 
			}?>
        </p>
    </div>
    
 
    
	<!-- Categories -->
	<div class="widget">
		<h4 class="headline btn" id="showRightPush">Categorías <i class="fa fa-arrow-right"></i></h4>
		<span class="line margin-bottom-20"></span>
		<div class="clearfix"></div>

		<ul class="categories">
            <div class="items cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
                <li id="cat_close"><a id="showRightPushClose"><h4><i class="fa fa-times-circle-o"></i> Categorías</h4></a></li>
                <?php 
                if(preg_match('%^(.*)\/category\/products\/(.*)\/$%', $pathInfo, $matches) || preg_match('%^(.*)\/category\/products\/(.*)$%', $pathInfo, $matches)|| preg_match('%^(.*)\/listings\/index\/categoryProduct\/(.*)$%', $pathInfo, $matches))
                {$vistaCategory = '_viewCategoriesProducts'; }
                else
                {$vistaCategory = '_viewCategories';}
                if(isset($dataProviderCategories)){
                    $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProviderCategories,
                    'itemView'=>$vistaCategory,
                    'enableSorting' => false,
                    'template' => '{items}{pager}',
                    )); 
                }?>
            </div>
		</ul>
	</div>

	
	
       <!-- Baner estatico 250x250-->
	<div class="widget">
    	<p>
    		<?php 
			if(isset($dataProviderBannersGenerales)){
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProviderBannersGenerales,
				'itemView'=>'/banners/_view250x250General',
				'enableSorting' => false,
				'enablePagination' => false,
				'emptyText' => '',
				'enablePagination' => false,
				'enableSorting' => false,
				'template' => '{items}{pager}',
					)); 
			}?>
        </p>
    </div>
	

</div>


</div>