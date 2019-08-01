<?php
/* @var $this ClassifiedsController */
/* @var $model Classifieds */

$this->breadcrumbs=array(
	'Classifieds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Classifieds', 'url'=>array('index')),
	array('label'=>'Manage Classifieds', 'url'=>array('admin')),
);
?>

<h1>Create Classifieds</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>