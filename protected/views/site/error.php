<?php
/* @var $this SiteController */
/* @var $error array 

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);

*/
?>

<div class="container">	
    <div class="one-third column">
      <span class="dropcap">ERROR <?php echo $code; ?></span>
    </div>
    <div class="two-thirds column">
      <div class="post-quote">
                
                <blockquote>
                    <?php echo CHtml::encode($message); ?>
                </blockquote>
            </div>
      <div class="two-thirds column"></div>
    </div>
</div>