<?php
/* @var $this MeasureController */
/* @var $model Measure */

$this->breadcrumbs=array(
	'Measures'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Measure', 'url'=>array('index')),
	array('label'=>'Create Measure', 'url'=>array('create')),
	array('label'=>'Update Measure', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Measure', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Measure', 'url'=>array('admin')),
);
?>

<h1>View Measure #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'object_id',
		'object_type_id',
		'data_type_id',
		'create_date',
		'client_ip',
		'url',
		'url_origin',
		'device',
		'country_name',
		'country_code',
		'browser',
		'os',
	),
)); ?>
