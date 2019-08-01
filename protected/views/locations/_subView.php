<?php
/* @var $this LocationsController */
/* @var $data Locations */
?>

<!-- Location #<?php echo CHtml::encode($data->id);?> -->
<!-- Location #<?php echo CHtml::encode($data->id);?> -->
<a href="/guia/location/<?php echo CHtml::encode($data->friendly_url); ?>">
    <div class="four recipe-box columns">
        <!-- Thumbnail -->
        <div class="thumbnail-holder">
            
                <div class="hover-cover"></div>
                <div class="hover-icon">Ver Ubicación</div>
            
        </div>

        <!-- Content -->
        <div class="recipe-box-content">
            <h3><a href="/guia/location/<?php echo CHtml::encode($data->friendly_url); ?>"><?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>(<?php echo CHtml::encode($data->count_total); ?>)</a></h3>
            <!--<div class="recipe-meta"><i class="fa fa-chevron-circle-right"></i></div>-->

            <div class="clearfix"></div>
            <p>
            <?php echo count($data->locations);?></p>
        </div>
    </div>
</a>
            
            
