<?php 
//
$unwanted_array = Yii::app()->params->unwanted_array;

$str = str_replace(' y ',',',strtr($data->title,Yii::app()->params->unwanted_array ));
$cat = explode(',',$str);

foreach($cat as $value){
	$str = strtr( $value, $unwanted_array );
?>	
<a href="/guia/category/<?php echo CHtml::encode($data->friendly_url); ?>" target="_blank"><?php echo CHtml::encode($str); ?></a>
<?php
}
?>
