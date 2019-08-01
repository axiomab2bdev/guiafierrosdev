<?php
/* @var $this LocationsController */
/* @var $model Locations */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Create Locations', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#locations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Locations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locations-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description_short',
		'description',
		'keywords',
		'friendly_url',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
