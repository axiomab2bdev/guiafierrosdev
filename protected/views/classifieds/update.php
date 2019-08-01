<?php
/* @var $this ClassifiedsController */
/* @var $model Classifieds */

$this->breadcrumbs=array(
	'Classifieds'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Classifieds', 'url'=>array('index')),
	array('label'=>'Create Classifieds', 'url'=>array('create')),
	array('label'=>'View Classifieds', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Classifieds', 'url'=>array('admin')),
);
?>

<h1>Update Classifieds <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>