<?php
/* @var $this ListingsController */
/* @var $model Listings */

$this->breadcrumbs=array(
	'Listings'=>array('index'),
	$model->title,
);

Yii::app()->clientScript->registerMetaTag('Para nosotros es un placer que se contacté con la Guía de Proveedores,  su mensaje fue enviado con exito.', 'Description');
Yii::app()->clientScript->registerMetaTag($model->keywords, 'keywords');
$nameSite = 'Gracias por Contactarnos - '.Yii::app()->name;
$this->setPageTitle($nameSite);


/*$this->menu=array(
	array('label'=>'List Listings', 'url'=>array('index')),
	array('label'=>'Create Listings', 'url'=>array('create')),
	array('label'=>'Update Listings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Listings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Listings', 'url'=>array('admin')),
);*/
?>

<!-- ================================================================ -->
<!-- INICIO DE PLANTILLA BRONCE -->
<!-- Código DiV de la plantilla-->
<div id="wrapper">

<!-- Recipe Background -->
<div class="recipeBackground1">
		
</div>
<!-- Content ================================================== -->
<div class="container" itemscope itemtype="http://schema.org/Recipe">
	<!-- Recipe -->
	<div class="twelve columns">
	<div class="alignment">

		<!-- Header -->
		<section class="recipe-header">
         
			<div class="title-alignment">
				<h1>Gracias por Contactarnos</h1>
			<!--	<div class="rating four-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>-->
				<!--<span><a href="#reviews">(2 reviews)</a></span>-->
			</div>
		</section>
	
		<!-- Details -->
		<section class="recipe-details" itemprop="nutrition">
			
            Para nosotros es un placer que se contacte con la <strong>Guía de Proveedores</strong>,  su mensaje fue enviado con éxito.<br />
           
          
           <br />
			<div class="clearfix"></div>
            <?php if($_REQUEST['urll']!=""){?>
            	<a href="/guia/<?php echo $_REQUEST['urll'];?>.html" >Volver a la página Anterior</a>
            <?php }else if($_REQUEST['url']!="" && $_REQUEST['id']){?>
            	<a href="/guia/classified/<?php echo $_REQUEST['url'];?>-<?php echo $_REQUEST['id'];?>.html" >Volver a la página Anterior</a>
            <?php }else {?>
            	<a href="/guia/" >Volver al inicio</a>
            <?php }?>
		</section>


		
		<div class="clearfix"></div>


		
	
		<div class="clearfix"></div>
		<br />
        <div class="banner2">
            <p>
            	<?php 
					if(isset($_REQUEST['category_id'])){
						$criteria=new CDbCriteria;
						$criteria->join='join pmd_banners_categories as pb ON (t.id=pb.banner_id)';
						$criteria->condition='category_id='.$_REQUEST['category_id'].' AND type_id=8';
						$bannerCategory=Banners::model()->find($criteria);
						
						if($bannerCategory->code!='null'){echo $bannerCategory->code;}
					}
				?>
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
		<nav class="search">
			<?php
			echo CHtml::beginForm(CHtml::normalizeUrl(array('listings/index')), 'get', array('id'=>'filter-form'))
			. CHtml::textField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?'))
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
		</nav>
		<div class="clearfix"></div>
	</div>
	
		<!-- Popular Recipes -->
	<div class="widget">
        <p>
            <?php 
					if(isset($_REQUEST['category_id'])){
						$criteria=new CDbCriteria;
						$criteria->join='join pmd_banners_categories as pb ON (t.id=pb.banner_id)';
						$criteria->condition='category_id='.$_REQUEST['category_id'].' AND type_id=6';
						$bannerCategory=Banners::model()->find($criteria);
						
						
						if($bannerCategory->code!='null'){echo $bannerCategory->code;}
					}
				?>
        </p>
	</div>

	</div>
</div>
<!-- Container / End -->
</div>
<!-- FIN DE PLANTILLA BRONCE-->



<?php /*?><?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'primary_category_id',
		'status',
		'priority',
		'title',
		'friendly_url',
		'description_short',
		'description',
		'meta_title',
		'meta_description',
		'meta_keywords',
		'keywords',
		'logo_extension',
		'phone',
		'fax',
		'location_id',
		'listing_address1',
		'listing_address2',
		'listing_zip',
		'location_text_1',
		'location_text_2',
		'location_text_3',
		'location_search_text',
		'hours',
		'latitude',
		'longitude',
		'coordinates_date_checked',
		'www',
		'www_status',
		'www_reciprocal',
		'www_date_checked',
		'website_clicks',
		'www_screenshot_last_updated',
		'pagerank',
		'pagerank_expiration',
		'ip',
		'date',
		'date_update',
		'ip_update',
		'impressions',
		'emails',
		'rating',
		'banner_impressions',
		'banner_clicks',
		'counterip',
		'mail',
		'claimed',
		'comment',
		'votes',
		'header_template_file',
		'footer_template_file',
		'wrapper_template_file',
		'template_file',
		'template_file_results',
		'category_limit',
		'featured',
		'featured_date',
		'friendly_url_allow',
		'html_editor_allow',
		'phone_allow',
		'fax_allow',
		'address_allow',
		'zip_allow',
		'hours_allow',
		'email_allow',
		'email_friend_allow',
		'www_allow',
		'www_screenshot_allow',
		'require_reciprocal',
		'map_allow',
		'logo_allow',
		'reviews_allow',
		'ratings_allow',
		'suggestion_allow',
		'claim_allow',
		'pdf_allow',
		'vcard_allow',
		'addtofavorites_allow',
		'print_allow',
		'coordinates_allow',
		'classifieds_images_allow',
		'classifieds_limit',
		'images_limit',
		'documents_limit',
		'title_size',
		'short_description_size',
		'description_size',
		'meta_title_size',
		'meta_description_size',
		'meta_keywords_limit',
		'keywords_limit',
		'custom_1',
		'custom_1_allow',
		'custom_2',
		'custom_2_allow',
		'custom_3',
		'custom_3_allow',
		'custom_4',
		'custom_4_allow',
		'custom_5',
		'custom_5_allow',
		'custom_6',
		'custom_6_allow',
		'banner_limit_1',
		'custom_7',
		'custom_7_allow',
		'custom_9_allow',
		'custom_10_allow',
		'custom_12_allow',
		'custom_13_allow',
		'banner_limit_2',
		'banner_limit_3',
		'custom_14',
		'custom_14_allow',
		'banner_limit_4',
		'search_impressions',
		'qrcode_allow',
		'share_allow',
		'contact_requests_allow',
		'description_images_limit',
		'banner_show',
		'hits',
	),
)); ?><?php */?>