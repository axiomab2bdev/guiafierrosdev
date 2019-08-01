<?php
/* @var $this ListingsController */
/* @var $model Listings */
$this->setPageTitle('Crear Micrositio - Guía de Proveedores de la industria de alimentos en Colombia');
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear',
);
if(!Yii::app()->user->isGuest){
	$this->menu=array(
		array('label'=>'List Listings', 'url'=>array('index')),
		array('label'=>'Manage Listings', 'url'=>array('admin')),
	);
}
?>
<!-- Content
================================================== -->

<div class="container">
	<!-- Masonry -->
	<div class="twelve columns">

		<!-- Headline -->
 		<h1 class="headline">Crear Micrositio</h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>

<?php $this->renderPartial('_form', array('model'=>$model,'resp5'=>$resp5)); ?>

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