<?php ?>
<li><a href="/category/products/<?php echo CHtml::encode($data->friendly_url); ?>"><?php echo CHtml::encode($data->title); ?> (<?php echo Categories::model()->getCountClassfiedsByCategoryId($data->id) ?>) </a></li>
