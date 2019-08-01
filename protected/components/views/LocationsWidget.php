<div class="widget">
    <h4 class="headline">Ubicación</h4>
    <span class="line margin-bottom-20"></span>
    <div class="clearfix"></div>
<? 
echo CHtml::beginForm(CHtml::normalizeUrl(array('listings/index')), 'get', array('id'=>'filter-form-location', 'name'=>'filter_form_location'))
	. CHtml::hiddenField('keyword', (isset($_GET['keyword'])) ? $_GET['keyword'] : '', array('id'=>'keyword', 'placeholder'=>'¿Qué Buscas?'))
	. CHtml::radioButtonList('location',(isset($_GET['location'])) ? $_GET['location'] : '',Locations::getLocationsArray(), array( 'separator' => "<br>", 'class'=>'ingredients-cont'))
	. CHtml::endForm();
	
	Yii::app()->clientScript->registerScript('search',
		"var ajaxUpdateTimeout;
		var ajaxRequest;
		$('input#string').keyup(function(){
			ajaxRequest = $(this).serialize();
			clearTimeout(ajaxUpdateTimeout);
			ajaxUpdateTimeout = setTimeout(function () {
				$.fn.yiiListView.update(
	// this is the id of the CListView
					'ajaxListView',
					{data: ajaxRequest}
				)
			},
	// this is the delay
			300);
		});"
	);	
?>
<div>