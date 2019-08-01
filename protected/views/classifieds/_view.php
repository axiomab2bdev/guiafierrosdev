<?php
/* @var $this ClassifiedsController */
/* @var $data Classifieds */
$data = (object) $data;

$id = CHtml::encode($data->id);
$model = ClassifiedsImages::model()->findByAttributes(array('classified_id'=>$id));
if($model===null){
    return false;
}else{  
    ?> 
        <!-- Item -->
            <div class="four recipe-box columns component-product">
                <!-- Thumbnail -->
                <div class="thumbnail-holder">
                    <a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html">
                       <img class="rsImg" id="img<?php echo $model->id; ?>" src="/guia/themes/guia/images/loading_IA.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" />
                        <div class="hover-cover"></div>
                        <div class="hover-icon">Ver Producto</div>
                    </a>
                </div>
                <!-- Content -->
                <div class="recipe-box-content">
                    <h3><a href="/guia/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html"><?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?></a></h3>
                    <div class="recipe-meta">
                        <?php 
                            $imgListing = Listings::model()->findByPk($data->listing_id); 
                            $idImg = uniqid($data->listing_id);
                        ?>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/guia/<?php echo $imgListing->friendly_url; ?>.html">
                            <img class="rsImg" id="img<?php echo $idImg; ?>" src="/guia/themes/guia/images/loading_IA_mini.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" style="max-height:60px;" />
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
      <script> 
        //optimize primary image
        imageAPi(<?php echo $model->id; ?>,'<?php echo CHtml::encode($data->id).'-'.$model->id.".".$model->extension; ?>','classified');
        //optimize logo image
        imageAPi('<?php echo $idImg; ?>','<?php echo CHtml::encode($imgListing->id).'.'.CHtml::encode($imgListing->logo_extension); ?>','listing');
      </script>
<?php
}
?>