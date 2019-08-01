<?php
/* @var $this LeadController */
/* @var $model Lead */

$this->breadcrumbs=array(
	'Leads'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lead', 'url'=>array('index')),
	array('label'=>'Create Lead', 'url'=>array('create')),
	array('label'=>'View Lead', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lead', 'url'=>array('admin')),
);
?>

<h1>Update Lead <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>