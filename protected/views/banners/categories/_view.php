<?php
/* @var $this CategoriesController */
/* @var $data Categories */
?>
		<!-- Category #<?php echo CHtml::encode($data->id);?> -->
            <div class="four recipe-box columns">
				<!-- Thumbnail -->
				<div class="thumbnail-holder">
					<a href="category/<?php echo CHtml::encode($data->friendly_url); ?>">
                    	<?php $img='http://'.$_SERVER['HTTP_HOST'].'/guia/files/categories/'.CHtml::encode($data->id).'-small.jpg';
						$file_headers = @get_headers($img);
						if($file_headers[0] == 'HTTP/1.1 200 OK' || $file_headers[0] ==  'HTTP/1.1 301 Moved Permanently'|| $file_headers[0] == 'HTTP/1.1 403 Forbidden')
						{?>
						<img class="rsImg" src="<?php echo $img;?>" alt="<?php echo CHtml::encode(strtr($data->title,Yii::app()->params->unwanted_array )); ?>" />
                        <?php }elseif($file_headers[0] =='HTTP/1.1 404 Not Found')
						{?>
						<img class="rsImg" src="/guia/themes/guia/images/noimage.gif" alt="<?php echo CHtml::encode($data->title); ?>" />
                        <?php } ?>
						<div class="hover-cover"></div>
						<div class="hover-icon">Ver Categoria</div>
					</a>
				</div>

				<!-- Content -->
				<div class="recipe-box-content">
                      <h3><a href="category/<?php echo CHtml::encode($data->friendly_url); ?>"><?php echo CHtml::encode($data->title); ?>&nbsp;(<?php echo CHtml::encode($data->getCountByCategoryId($data->id)); ?>)</a></h3>
		
				</div>
		
				</div>
			</div>
            
            
            
<?php /*?><div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_short')); ?>:</b>
	<?php echo CHtml::encode($data->description_short); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('friendly_url')); ?>:</b>
	<?php echo CHtml::encode($data->friendly_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('friendly_url_path')); ?>:</b>
	<?php echo CHtml::encode($data->friendly_url_path); ?>
	<br /><?php */?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('friendly_url_path_hash')); ?>:</b>
	<?php echo CHtml::encode($data->friendly_url_path_hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_title')); ?>:</b>
	<?php echo CHtml::encode($data->meta_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('small_image_url')); ?>:</b>
	<?php echo CHtml::encode($data->small_image_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('large_image_url')); ?>:</b>
	<?php echo CHtml::encode($data->large_image_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidden')); ?>:</b>
	<?php echo CHtml::encode($data->hidden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('closed')); ?>:</b>
	<?php echo CHtml::encode($data->closed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_follow')); ?>:</b>
	<?php echo CHtml::encode($data->no_follow); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display_columns')); ?>:</b>
	<?php echo CHtml::encode($data->display_columns); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_total')); ?>:</b>
	<?php echo CHtml::encode($data->count_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('left_')); ?>:</b>
	<?php echo CHtml::encode($data->left_); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('right_')); ?>:</b>
	<?php echo CHtml::encode($data->right_); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impressions')); ?>:</b>
	<?php echo CHtml::encode($data->impressions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('import_id')); ?>:</b>
	<?php echo CHtml::encode($data->import_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header_template_file')); ?>:</b>
	<?php echo CHtml::encode($data->header_template_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_template_file')); ?>:</b>
	<?php echo CHtml::encode($data->footer_template_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wrapper_template_file')); ?>:</b>
	<?php echo CHtml::encode($data->wrapper_template_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('results_template_file')); ?>:</b>
	<?php echo CHtml::encode($data->results_template_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('child_row_id')); ?>:</b>
	<?php echo CHtml::encode($data->child_row_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impressions_search')); ?>:</b>
	<?php echo CHtml::encode($data->impressions_search); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits')); ?>:</b>
	<?php echo CHtml::encode($data->hits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('columns')); ?>:</b>
	<?php echo CHtml::encode($data->columns); ?>
	<br />

	*/ ?>

