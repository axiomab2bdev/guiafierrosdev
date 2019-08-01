<?php
/* @var $this ListingsController */
/* @var $model Listings */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primary_category_id'); ?>
		<?php echo $form->textField($model,'primary_category_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priority'); ?>
		<?php echo $form->textField($model,'priority',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'friendly_url'); ?>
		<?php echo $form->textField($model,'friendly_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_short'); ?>
		<?php echo $form->textArea($model,'description_short',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<?php /*?><div class="row">
		<?php echo $form->label($model,'meta_keywords'); ?>
		<?php echo $form->textArea($model,'meta_keywords',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords'); ?>
		<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo_extension'); ?>
		<?php echo $form->textField($model,'logo_extension',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_id'); ?>
		<?php echo $form->textField($model,'location_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'listing_address1'); ?>
		<?php echo $form->textField($model,'listing_address1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'listing_address2'); ?>
		<?php echo $form->textField($model,'listing_address2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'listing_zip'); ?>
		<?php echo $form->textField($model,'listing_zip',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_text_1'); ?>
		<?php echo $form->textField($model,'location_text_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_text_2'); ?>
		<?php echo $form->textField($model,'location_text_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_text_3'); ?>
		<?php echo $form->textField($model,'location_text_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_search_text'); ?>
		<?php echo $form->textField($model,'location_search_text',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hours'); ?>
		<?php echo $form->textArea($model,'hours',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coordinates_date_checked'); ?>
		<?php echo $form->textField($model,'coordinates_date_checked'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'www'); ?>
		<?php echo $form->textField($model,'www',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'www_status'); ?>
		<?php echo $form->textField($model,'www_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'www_reciprocal'); ?>
		<?php echo $form->textField($model,'www_reciprocal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'www_date_checked'); ?>
		<?php echo $form->textField($model,'www_date_checked'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website_clicks'); ?>
		<?php echo $form->textField($model,'website_clicks',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'www_screenshot_last_updated'); ?>
		<?php echo $form->textField($model,'www_screenshot_last_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagerank'); ?>
		<?php echo $form->textField($model,'pagerank'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagerank_expiration'); ?>
		<?php echo $form->textField($model,'pagerank_expiration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip'); ?>
		<?php echo $form->textField($model,'ip',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_update'); ?>
		<?php echo $form->textField($model,'date_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip_update'); ?>
		<?php echo $form->textField($model,'ip_update',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impressions'); ?>
		<?php echo $form->textField($model,'impressions',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emails'); ?>
		<?php echo $form->textField($model,'emails',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rating'); ?>
		<?php echo $form->textField($model,'rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner_impressions'); ?>
		<?php echo $form->textField($model,'banner_impressions',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner_clicks'); ?>
		<?php echo $form->textField($model,'banner_clicks',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'counterip'); ?>
		<?php echo $form->textField($model,'counterip',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mail'); ?>
		<?php echo $form->textField($model,'mail',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claimed'); ?>
		<?php echo $form->textField($model,'claimed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'votes'); ?>
		<?php echo $form->textField($model,'votes',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'header_template_file'); ?>
		<?php echo $form->textField($model,'header_template_file',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'footer_template_file'); ?>
		<?php echo $form->textField($model,'footer_template_file',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wrapper_template_file'); ?>
		<?php echo $form->textField($model,'wrapper_template_file',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template_file'); ?>
		<?php echo $form->textField($model,'template_file',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template_file_results'); ?>
		<?php echo $form->textField($model,'template_file_results',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_limit'); ?>
		<?php echo $form->textField($model,'category_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'featured'); ?>
		<?php echo $form->textField($model,'featured'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'featured_date'); ?>
		<?php echo $form->textField($model,'featured_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'friendly_url_allow'); ?>
		<?php echo $form->textField($model,'friendly_url_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'html_editor_allow'); ?>
		<?php echo $form->textField($model,'html_editor_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_allow'); ?>
		<?php echo $form->textField($model,'phone_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax_allow'); ?>
		<?php echo $form->textField($model,'fax_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_allow'); ?>
		<?php echo $form->textField($model,'address_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_allow'); ?>
		<?php echo $form->textField($model,'zip_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hours_allow'); ?>
		<?php echo $form->textField($model,'hours_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_allow'); ?>
		<?php echo $form->textField($model,'email_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_friend_allow'); ?>
		<?php echo $form->textField($model,'email_friend_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'www_allow'); ?>
		<?php echo $form->textField($model,'www_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'www_screenshot_allow'); ?>
		<?php echo $form->textField($model,'www_screenshot_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'require_reciprocal'); ?>
		<?php echo $form->textField($model,'require_reciprocal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'map_allow'); ?>
		<?php echo $form->textField($model,'map_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo_allow'); ?>
		<?php echo $form->textField($model,'logo_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reviews_allow'); ?>
		<?php echo $form->textField($model,'reviews_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ratings_allow'); ?>
		<?php echo $form->textField($model,'ratings_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suggestion_allow'); ?>
		<?php echo $form->textField($model,'suggestion_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_allow'); ?>
		<?php echo $form->textField($model,'claim_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pdf_allow'); ?>
		<?php echo $form->textField($model,'pdf_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vcard_allow'); ?>
		<?php echo $form->textField($model,'vcard_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addtofavorites_allow'); ?>
		<?php echo $form->textField($model,'addtofavorites_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'print_allow'); ?>
		<?php echo $form->textField($model,'print_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coordinates_allow'); ?>
		<?php echo $form->textField($model,'coordinates_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classifieds_images_allow'); ?>
		<?php echo $form->textField($model,'classifieds_images_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classifieds_limit'); ?>
		<?php echo $form->textField($model,'classifieds_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'images_limit'); ?>
		<?php echo $form->textField($model,'images_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documents_limit'); ?>
		<?php echo $form->textField($model,'documents_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title_size'); ?>
		<?php echo $form->textField($model,'title_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'short_description_size'); ?>
		<?php echo $form->textField($model,'short_description_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_size'); ?>
		<?php echo $form->textField($model,'description_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_title_size'); ?>
		<?php echo $form->textField($model,'meta_title_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_description_size'); ?>
		<?php echo $form->textField($model,'meta_description_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_keywords_limit'); ?>
		<?php echo $form->textField($model,'meta_keywords_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords_limit'); ?>
		<?php echo $form->textField($model,'keywords_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_1'); ?>
		<?php echo $form->textField($model,'custom_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_1_allow'); ?>
		<?php echo $form->textField($model,'custom_1_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_2'); ?>
		<?php echo $form->textArea($model,'custom_2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_2_allow'); ?>
		<?php echo $form->textField($model,'custom_2_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_3'); ?>
		<?php echo $form->textArea($model,'custom_3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_3_allow'); ?>
		<?php echo $form->textField($model,'custom_3_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_4'); ?>
		<?php echo $form->textArea($model,'custom_4',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_4_allow'); ?>
		<?php echo $form->textField($model,'custom_4_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_5'); ?>
		<?php echo $form->textArea($model,'custom_5',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_5_allow'); ?>
		<?php echo $form->textField($model,'custom_5_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_6'); ?>
		<?php echo $form->textArea($model,'custom_6',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_6_allow'); ?>
		<?php echo $form->textField($model,'custom_6_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner_limit_1'); ?>
		<?php echo $form->textField($model,'banner_limit_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_7'); ?>
		<?php echo $form->textField($model,'custom_7',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_7_allow'); ?>
		<?php echo $form->textField($model,'custom_7_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_9_allow'); ?>
		<?php echo $form->textField($model,'custom_9_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_10_allow'); ?>
		<?php echo $form->textField($model,'custom_10_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_12_allow'); ?>
		<?php echo $form->textField($model,'custom_12_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_13_allow'); ?>
		<?php echo $form->textField($model,'custom_13_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner_limit_2'); ?>
		<?php echo $form->textField($model,'banner_limit_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner_limit_3'); ?>
		<?php echo $form->textField($model,'banner_limit_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_14'); ?>
		<?php echo $form->textField($model,'custom_14',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'custom_14_allow'); ?>
		<?php echo $form->textField($model,'custom_14_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner_limit_4'); ?>
		<?php echo $form->textField($model,'banner_limit_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'search_impressions'); ?>
		<?php echo $form->textField($model,'search_impressions',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qrcode_allow'); ?>
		<?php echo $form->textField($model,'qrcode_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'share_allow'); ?>
		<?php echo $form->textField($model,'share_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_requests_allow'); ?>
		<?php echo $form->textField($model,'contact_requests_allow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_images_limit'); ?>
		<?php echo $form->textField($model,'description_images_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner_show'); ?>
		<?php echo $form->textField($model,'banner_show'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits'); ?>
		<?php echo $form->textField($model,'hits'); ?>
	</div><?php */?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->