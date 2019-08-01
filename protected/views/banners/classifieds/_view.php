<?php
/* @var $this ClassifiedsController */
/* @var $data Classifieds */

$id = CHtml::encode($data->id);
$model = ClassifiedsImages::model()->findByAttributes(array('classified_id'=>$id));
if($model===null){
	return false;
}else{	
	?> 


		<!-- Item -->
			<div class="four recipe-box columns">

				<!-- Thumbnail -->
				<div class="thumbnail-holder">
					<a href="/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html">
                   		<?php $img="http://".$_SERVER['HTTP_HOST']."/guia/files/classifieds/".CHtml::encode($data->id).'-'.$model->id.".".$model->extension;
						$file_headers = @get_headers($img);
						if($file_headers[0] == 'HTTP/1.1 200 OK' || $file_headers[0] ==  'HTTP/1.1 301 Moved Permanently'|| $file_headers[0] == 'HTTP/1.1 403 Forbidden')
						{?>
						<img class="rsImg" src="<?php echo $img;?>" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" />
                        <?php }elseif($file_headers[0] =='HTTP/1.1 404 Not Found')
						{?>
						<img class="rsImg" src="/guia/themes/guia/images/noimage.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?>" />
                        <?php } ?>
						<div class="hover-cover"></div>
						<div class="hover-icon">Ver Producto</div>
					</a>
				</div>

				<!-- Content -->
				<div class="recipe-box-content">
					<h3><a href="/classified/<?php echo CHtml::encode($data->friendly_url); ?>-<?php echo CHtml::encode($data->id);?>.html"><?php echo strtr($data->title,Yii::app()->params->unwanted_array ); ?></a></h3>
					<div class="recipe-meta">
						<?php $imgListing = Listings::model()->findByPk($data->listing_id);
                        $urlImgListing = "http://".$_SERVER['HTTP_HOST']."/guia/files/logo/".CHtml::encode($imgListing->id).'.'.CHtml::encode($imgListing->logo_extension); 
                        $file_headers = @get_headers($urlImgListing);
                        if($file_headers[0] == 'HTTP/1.1 200 OK' || $file_headers[0] ==  'HTTP/1.1 301 Moved Permanently'|| $file_headers[0] == 'HTTP/1.1 403 Forbidden')
                        {?>
                            <a href="/guia/<?php echo $imgListing->friendly_url; ?>.html"><img id="logThumbail" src="<?php echo $urlImgListing;?>" alt="<?php echo strtr($imgListing->title,Yii::app()->params->unwanted_array ); ?>" /></a>
                        <?php }elseif($file_headers[0] =='HTTP/1.1 404 Not Found')
                        {?>
                            <img class="rsImg" src="/guia/themes/guia/images/noimage.gif" alt="<?php echo strtr($imgListing->title,Yii::app()->params->unwanted_array ); ?>" />
                        <?php } ?>
                    </div>

					<div class="clearfix"></div>
				</div>
			</div>
<?php
}
?>