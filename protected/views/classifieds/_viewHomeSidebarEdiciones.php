<?php
/* @var $this ClassifiedsController */
/* @var $data Classifieds */
$id = CHtml::encode($data->id);
$model = ClassifiedsImages::model()->findByAttributes(array('classified_id'=>$id));
if($model===null){
	return false;
}else{	?> 
<div class="item">
    <div class="item-header">
        <a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html" class="image-hover">
        <img class="rsImg" id="img<?php echo $model->id; ?>" src="/guia/themes/guia/images/loading_EO.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" />
        </a>
		<script> 
		$(document).ready(function(e) {
			//optimize primary image
			imageAPi(<?php echo $model->id; ?>,'<?php echo CHtml::encode($data->id).'-'.$model->id.".".$model->extension; ?>','classified');
		});
		</script>
    </div>
    <div class="item-content">
        <div class="content-category">
            <!--<a href="category.html" style="color: #276197;">Tech News</a>-->
        </div>
        <h4><a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html"><?php echo CHtml::encode(Classifieds::stripTags(strtr($data->title,Yii::app()->params->unwanted_array ),true)); ?></a></h4>
		<p><?php echo CHtml::encode(substr(Classifieds::stripTags(strtr($data->description,Yii::app()->params->unwanted_array ),true),0,50)); ?>...</p>
        <!--<span><a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html">
        	<?php
				$date = new DateTime($data->date);
				echo $date->format('M d, Y'); ?>	
         </a></span>-->
    </div>
</div>
<?php } ?>