<?php
/* @var $this MeasureController */
/* @var $model Measure */

$this->breadcrumbs=array(
	'Measures'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Measure', 'url'=>array('index')),
	array('label'=>'Create Measure', 'url'=>array('create')),
	array('label'=>'View Measure', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Measure', 'url'=>array('admin')),
);
?>

<h1>Update Measure <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>