<?php
/* @var $this ListingsController */
/* @var $model Listings */

$this->breadcrumbs=array(
	'Listings'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Listings', 'url'=>array('index')),
	array('label'=>'Create Listings', 'url'=>array('create')),
	array('label'=>'View Listings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Listings', 'url'=>array('admin')),
);
?>

<h1>Update Listings <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>