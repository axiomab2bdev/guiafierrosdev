<?php
/* @var $this BannersController */
/* @var $data Banners */

/*
if($data->id==59)
{
?>
<div class="view">	
	<?php echo $data->code;?>
	<br />
</div>
<?php
} 

*/?>

<?php 
if($data->id==59)
{
?>

<div class="view">
	<?php
	$sql = 'SELECT * FROM fierros_portal.wp_options
			WHERE option_name LIKE "tw_options";';
	$result = Yii::app()->dbportal->createCommand($sql)->queryAll();
	$tw_options = unserialize($result[0]['option_value']);
	 echo $tw_options['banner-lateral']; ?>	
	<br />
</div>
<?php
} 

