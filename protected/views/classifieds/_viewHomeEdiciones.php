<?php
/* @var $this ClassifiedsController */
/* @var $data Classifieds */
$id = CHtml::encode($data->id);
$model = ClassifiedsImages::model()->findByAttributes(array('classified_id'=>$id));
if($model===null){
	return false;
}else{	?> 
<li class="product">
    <a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html" class="img_product">
        <img class="rsImg" id="img<?php echo $model->id; ?>" src="/guia/themes/guia/images/loading_EO.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" style="max-width:190px" />
    </a>
    <a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html" class="content_product">                         
        <h3><?php echo CHtml::encode(substr(Classifieds::stripTags(strtr($data->title,Yii::app()->params->unwanted_array),true),0,40)).'...'; ?></h3>                                                           
        <span>
        	<?php echo CHtml::encode(substr(Classifieds::stripTags(strtr($data->description,Yii::app()->params->unwanted_array ),true),0,50)); ?>
        <span>
        </span></span>
    </a>
    <a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html" rel="nofollow" data-product_id="<?php echo $data->id; ?>" data-product_sku="" class="button add_to_cart_button product_type_simple">Ver Producto</a>                    
	<script> 
    $(document).ready(function(e) {
        //optimize primary image
        imageAPi(<?php echo $model->id; ?>,'<?php echo CHtml::encode($data->id).'-'.$model->id.".".$model->extension; ?>','classified');
        
    });
    </script>
</li>
<?php } ?>