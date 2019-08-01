<?php ?>
<li><a href="/guia/category/<?php echo CHtml::encode($data->friendly_url); ?>"><?php echo strtr($data->title,Yii::app()->params->unwanted_array); ?> (<? echo Categories::model()->getCountByCategoryId($data->id) ?>)</a></li>
