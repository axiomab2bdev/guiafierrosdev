<?php
/* @var $this ContactController */
/* @var $data Contact */
?>
<?php
/* @var $this LeadController */
/* @var $data Lead */
if($data->objectType->id=='1')
{
	$modelObject = 	Listings::model()->findByPk($data['object_id']);
	$objectName = $modelObject['title'];
	$url = 'http://fierros.com.co/guia/'.$modelObject['friendly_url'].'.html';
}else if($data->objectType->id=='2'){
	$modelSubObject = 	Classifieds::model()->findByPk($data['object_id']);
	$modelObject = 	Listings::model()->findByPk($modelSubObject->listing_id);
	$objectName = $modelObject['title'];
	$url = 'http://fierros.com.co/guia/'.$modelObject['friendly_url'].'.html';
}
?>
<tr>
	<td><a href="/guia/contact/view/id/<?php echo $data->id; ?>"><i class="fa fa-eye" style="font-size:16px"></i></a></td>
    <td><a href="/guia/contact/view/id/<?php echo $data->id; ?>"><?php echo $data->lead->name; ?></a></td>
    <td><?php echo $data->lead->mail; ?></td>
    <td><?php echo $data->lead->phone; ?></td>
    <td><?php echo $data->create_date; ?></td>
    <td><?php echo $data->objectType->name; ?></td>
    <td><?php echo $data->dataType->name; ?></td>
    <td><a href="<?php echo $url; ?>" target="_blank"><?php echo $objectName; ?></a></td>
</tr>
<?php /*
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_id')); ?>:</b>
	<?php echo CHtml::encode($data->lead_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('object_id')); ?>:</b>
	<?php echo CHtml::encode($data->object_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('object_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->object_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->data_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b>
	<?php echo CHtml::encode($data->body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('origin_url')); ?>:</b>
	<?php echo CHtml::encode($data->origin_url); ?>
	<br />

	*/ ?>

</div>