<?php
/* @var $this ListingsController */
/* @var $data Listings */
$data = (object) $data;

$img="http://".$_SERVER['HTTP_HOST']."/guia/files/logo/".CHtml::encode($data->id).'.'.$data->logo_extension;
$file_headers = @get_headers($img);
if($file_headers[0] =='HTTP/1.1 404 Not Found' || $data->logo_extension=='')
{
	$img = Yii::app()->request->baseUrl."/themes/guia/images/noimage.gif";
}

?>
<!-- Isotope -->
		<div class="list-style	<?php if($data->template_file!=""){ echo "golden-provider";}?> component-provider">

			<!-- Item -->
			<div class="four recipe-box columns component-provider">

				<!-- Thumbnail -->
				<div class="thumbnail-holder listings-list" style="background-image:url('<?php echo $img; ?>')">
					<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/guia/<?php echo CHtml::encode($data->friendly_url); ?>.html">
                    	<?php if($data->template_file!=""){	?>	
							<div class="golden-tag"></div>
						<?php } ?>
						<div class="hover-cover"></div>
						<div class="hover-icon">Ver Proveedor</div>
					</a>
				</div>

				<!-- Content -->
				<a class="provider-box-content" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/guia/<?php echo CHtml::encode($data->friendly_url); ?>.html">
					<div class="recipe-box-content">
						<h3>
							<?php echo strtr($data->title,Yii::app()->params->unwanted_array); ?>
	                    </h3>

						<p><?php echo strtr($data->meta_description,Yii::app()->params->unwanted_array); ?></p>

						

						<div class="meta-alignment">
							<div class="recipe-meta"><i class="fa fa-home"></i><?php echo str_replace(",",", ",strtr($data->location_search_text,Yii::app()->params->unwanted_array)); ?></div>
							
						</div>

						<div class="clearfix"></div>
					</div>
				</a>
			</div>
        </div>
    
          