<?php
/* @var $this ListingsController */
/* @var $data Listings */
?>

<!-- Isotope -->
		<div class="list-style">

			<!-- Item -->
			<div class="four recipe-box columns">

				<!-- Thumbnail -->
				<div class="thumbnail-holder">
					<a href="/<?php echo CHtml::encode($data->friendly_url); ?>.html">
                    	<?php $img="http://".$_SERVER['HTTP_HOST']."/guia/files/logo/".CHtml::encode($data->id).'.'.$data->logo_extension;
						$file_headers = @get_headers($img);
						if($file_headers[0] == 'HTTP/1.1 200 OK' || $file_headers[0] ==  'HTTP/1.1 301 Moved Permanently'|| $file_headers[0] == 'HTTP/1.1 403 Forbidden')
						{?>
						<img class="rsImg" src="<?php echo $img;?>" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array); ?>" />
                        <?php }elseif($file_headers[0] =='HTTP/1.1 404 Not Found')
						{?>
						<img class="rsImg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/guia/images/noimage.gif" alt="<?php echo strtr($data->title,Yii::app()->params->unwanted_array); ?>" />
                        <?php } ?>
						<div class="hover-cover"></div>
						<div class="hover-icon">Ver Proveedor</div>
					</a>
				</div>

				<!-- Content -->
				<div class="recipe-box-content">
					<h3><a href="/<?php echo CHtml::encode($data->friendly_url); ?>.html">
						<?php echo strtr($data->title,Yii::app()->params->unwanted_array); ?>
                    </a></h3>

					<p><?php echo strtr($data->meta_description,Yii::app()->params->unwanted_array); ?></p>

					

					<div class="meta-alignment">
						<div class="recipe-meta"><i class="fa fa-home"></i>  <?php echo strtr($data->location_search_text,Yii::app()->params->unwanted_array); ?></div>
						
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
        </div>
    
          