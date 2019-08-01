<?php
/* @var $this LocationsController */
/* @var $model Locations */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Create Locations', 'url'=>array('create')),
	array('label'=>'Update Locations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Locations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Locations', 'url'=>array('admin')),
);
?>

<h1>View Locations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description_short',
		'description',
		'keywords',
		'friendly_url',
		'friendly_url_path',
		'friendly_url_path_hash',
		'meta_title',
		'meta_description',
		'meta_keywords',
		'link',
		'small_image_url',
		'large_image_url',
		'hidden',
		'closed',
		'no_follow',
		'display_columns',
		'disable_geocoding',
		'count',
		'count_total',
		'level',
		'left_',
		'right_',
		'parent_id',
		'impressions',
		'ip',
		'import_id',
		'header_template_file',
		'footer_template_file',
		'wrapper_template_file',
		'results_template_file',
		'child_row_id',
		'impressions_search',
		'hits',
		'columns',
	),
)); ?>
