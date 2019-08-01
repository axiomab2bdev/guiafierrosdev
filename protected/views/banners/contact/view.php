<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	$model->id,
);
/*
$this->menu=array(
	array('label'=>'List Contact', 'url'=>array('index')),
	array('label'=>'Create Contact', 'url'=>array('create')),
	array('label'=>'Update Contact', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Contact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contact', 'url'=>array('admin')),
);*/
?>
<!-- Content
================================================== -->

<div class="container" itemscope="" itemtype="http://schema.org/Recipe">
<div class="container">
	<!-- Masonry -->
	<div class="sixteen columns">
    <!-- Headline -->
 		<h1 class="headline">Cotización #<?php echo $model->id; ?></h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>
		<table data-response-handler="responseHandler" data-card-view="true" class="table" width="80%">
            <tbody>
            	<tr>
                    <td>
                        <div class="card-view">
                            <span class="title" style="">Nombres:</span>
                            <span class="value"><? echo $model->lead->name; ?></span>
                        </div>
                        <div class="card-view">
                            <span class="title" style="">E-Mail:</span>
                            <span class="value"><a href="mailto:<? echo $model->lead->mail; ?>"><? echo $model->lead->mail; ?></a></span>
                        </div>
                        <div class="card-view">
                            <span class="title" style="">Teléfono/Móvil:</span>
                            <span class="value"><a href="tel:<? echo $model->lead->phone; ?>"><? echo $model->lead->phone; ?></a></span>
                        </div>
                        <div class="card-view">
                            <span class="title" style="">Fecha:</span>
                            <span class="value"><? echo $model->create_date; ?></span>
                        </div>
                        <div class="card-view">
                            <span class="title" style="">Mensaje:</span>
                            <span class="value"><? echo $model->body; ?></span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lead_id',
		'object_id',
		'object_type_id',
		'status_id',
		'data_type_id',
		'create_date',
		'body',
		'location',
		'origin_url',
	),
)); */?>
<div class="clearfix"></div>

	</div>
   </div>
  </div>
  <div class="clearfix"></div><br />	
