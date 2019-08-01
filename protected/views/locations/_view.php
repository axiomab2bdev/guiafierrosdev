<?php
/* @var $this LocationsController */
/* @var $data Locations */
?>

<!-- Location #<?php echo CHtml::encode($data->id);?> -->
<h3 class="headline"><a href="/guia/location/<?php echo CHtml::encode($data->friendly_url); ?>"><?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>(<?php echo CHtml::encode($data->count_total); ?>)</a></h3>
<div class="clearfix"></div>
<!-- Isotope -->
<div class="isotope">
<?php 
foreach($data->locations as $location){
	?>
    <!-- Location #<?php echo CHtml::encode($location->id);?> -->
    <a href="/guia/location/<?php echo CHtml::encode($location->friendly_url); ?>">
        <div class="four recipe-box columns">
            <!-- Thumbnail -->
            <div class="thumbnail-holder">
                
                    <div class="hover-cover"></div>
                    <div class="hover-icon">Ver Ubicación</div>
                
            </div>
    
            <!-- Content -->
            <div class="recipe-box-content">
                <h3><a href="/guia/location/<?php echo CHtml::encode($location->friendly_url); ?>"><?php echo strtr($location->title,Yii::app()->params->unwanted_array ); ?>(<?php echo CHtml::encode($location->count_total); ?>)</a></h3>
                <!--<div class="recipe-meta"><i class="fa fa-chevron-circle-right"></i></div>-->
    
                <div class="clearfix"></div>
                <p><small>
                <?php 
				$cn = count($location->locations);
				$ac = 0;
				foreach($location->locations as $subLocation){
						?> <a href="/guia/location/<?php echo CHtml::encode($subLocation->friendly_url); ?>"><?php echo strtr($subLocation->title,Yii::app()->params->unwanted_array ); ?></a>
                        <?
						$ac++;
						if($ac<$cn)
						echo ', ';
				}?></small></p>
            </div>
        </div>
    </a>
    <?php
}
?>
</div>
<?

/*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$data->locations,
	'itemView'=>'_subView',
	'enablePagination' => true,
	'enableSorting' => false,
	'template' => '{items}{pager}',
)); */?>

            
            
