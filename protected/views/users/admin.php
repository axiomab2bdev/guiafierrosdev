<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

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
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'login',
		'pass',
		'password_hash',
		'password_salt',
		'cookie_salt',
		/*
		'user_email',
		'logged_last',
		'logged_ip',
		'logged_host',
		'created',
		'timezone',
		'password_verify',
		'user_first_name',
		'user_last_name',
		'user_organization',
		'user_address1',
		'user_address2',
		'user_city',
		'user_state',
		'user_country',
		'user_zip',
		'user_phone',
		'user_fax',
		'user_comment',
		'login_id',
		'login_provider',
		'credit',
		'tax_exempt',
		'disable_overdue_notices',
		'import_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
