<?php
/* @var $this ListingsController */
/* @var $model Listings */

$this->breadcrumbs=array(
	'Listings'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Listings', 'url'=>array('index')),
	array('label'=>'Create Listings', 'url'=>array('create')),
	array('label'=>'Update Listings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Listings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Listings', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
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
)); ?>
