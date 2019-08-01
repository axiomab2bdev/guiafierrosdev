<?php ?>
<li><a href="/guia/category/products/<?php echo CHtml::encode($data->friendly_url); ?>"><?php echo strtr($data->title,Yii::app()->params->unwanted_array); ?> (<? echo Categories::model()->getCountClassfiedsByCategoryId($data->id) ?>) </a></li>
