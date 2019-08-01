<?php
/* @var $this ClassifiedsController */
/* @var $data Classifieds */
?> 

<li class="product">
    <a href="/guia/<?php echo CHtml::encode($data->friendly_url); ?>.html">
        <?php
		if(isset($data->logo_extension) && $data->logo_extension!=''){
			$img="http://".$_SERVER['HTTP_HOST']."/guia/files/logo/".CHtml::encode($data->id).'.'.$data->logo_extension;
			$file_headers = @get_headers($img);
			if($file_headers[0] == 'HTTP/1.1 200 OK' || $file_headers[0] ==  'HTTP/1.1 301 Moved Permanently'|| $file_headers[0] == 'HTTP/1.1 403 Forbidden')
			{?>
			<img class="rsImg" src="<?php echo $img;?>" alt="<?php echo CHtml::encode(strtr($data->title,Yii::app()->params->unwanted_array )); ?>" />
			<?php }elseif($file_headers[0] =='HTTP/1.1 404 Not Found')
			{?>
			<img class="rsImg" src="/guia/themes/guia/images/noimage.gif" alt="<?php echo CHtml::encode(strtr($data->title,Yii::app()->params->unwanted_array )); ?>" />
			<?php } 
		}else{?>
		<img class="rsImg" src="/guia/themes/guia/images/noimage.gif" alt="<?php echo CHtml::encode(strtr($data->title,Yii::app()->params->unwanted_array )); ?>" />
		<?php }?>                      
        <h3><?php echo CHtml::encode(strtr($data->title,Yii::app()->params->unwanted_array )); ?></h3>                                                           
        <span>
        	<?php echo CHtml::encode(substr(strtr($data->description,Yii::app()->params->unwanted_array ),0,50)); ?>
        <span>
        </span></span>
    </a>
    <a href="/guia/<?php echo CHtml::encode($data->friendly_url); ?>.html" rel="nofollow" data-product_id="<?php echo $data->id; ?>" data-product_sku="" class="button add_to_cart_button product_type_simple">Ver Proveedor</a>                    
</li>