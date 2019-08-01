<?php
/* @var $this CategoriesController */
/* @var $data Categories */
?>
<!-- Category #<?php echo CHtml::encode($data->id);?> -->
    <div class="four recipe-box columns">
        <!-- Thumbnail -->
        <div class="thumbnail-holder">
            <a href="/guia/category/<?php echo CHtml::encode($data->friendly_url); ?>">
                <?php

                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/guia/files/categories/'.CHtml::encode($data->id).'-small.jpg'))
                     $img='/guia/files/categories/'.CHtml::encode($data->id).'-small.jpg';
                else
                    $img = "/guia/themes/guia/images/noimage.gif";
                
                ?>

                <img class="rsImg" src="<?php echo $img;?>" alt="<?php echo CHtml::encode(strtr($data->title,Yii::app()->params->unwanted_array )); ?>" />

                <div class="hover-cover"></div>
                <div class="hover-icon">Ver Categoria</div>
            </a>
        </div>

        <!-- Content -->
        <div class="recipe-box-content category-height center">
              <h3><a href="/guia/category/<?php echo CHtml::encode($data->friendly_url); ?>"><?php echo CHtml::encode($data->title); ?>&nbsp;(<?php echo CHtml::encode($data->getCountByCategoryId($data->id)); ?>)</a></h3>

        </div>
    </div>