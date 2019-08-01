<?php
/* @var $this LeadController */
/* @var $model Lead */

$this->breadcrumbs=array(
	'Leads'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Lead', 'url'=>array('index')),
	array('label'=>'Create Lead', 'url'=>array('create')),
	array('label'=>'Update Lead', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lead', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lead', 'url'=>array('admin')),
);
?>

<h1>View Lead #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'mail',
		'phone',
	),
)); ?>
