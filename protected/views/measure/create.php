<?php
/* @var $this MeasureController */
/* @var $model Measure */

$this->breadcrumbs=array(
	'Measures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Measure', 'url'=>array('index')),
	array('label'=>'Manage Measure', 'url'=>array('admin')),
);
?>

<h1>Create Measure</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>