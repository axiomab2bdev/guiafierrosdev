<?php
/* @var $this MeasureController */
/* @var $dataProvider CActiveDataProvider */

date_default_timezone_set('America/Bogota');

$this->breadcrumbs=array(
	'Analítica',
);
if(isset($_POST['object_id_search'])){$modelMeasure = Listings::model()->findByPk($_POST['object_id_search']);}
if($_POST['Date']){
	$dateFrom = $_POST['Date']['from'];
	$dateTo = $_POST['Date']['to'];
}else
{
	$dateFrom = date('Y-m')."-01";
	$dateTo = date('Y-m')."-".date('t');
}
/*$this->menu=array(
	array('label'=>'Create Measure', 'url'=>array('create')),
	array('label'=>'Manage Measure', 'url'=>array('admin')),
);*/
?>
<!-- Content
================================================== -->

<div class="container" itemscope="" itemtype="http://schema.org/Recipe">
<div class="container">
	<!-- Masonry -->
	<div class="sixteen columns">

		<!-- Headline -->
 		<h1 class="headline">Analítica <? if(isset($_POST['object_id_search'])){echo '- '.$modelMeasure->title;}?></h1>
		<span class="line rb margin-bottom-35"></span>
		<div class="clearfix"></div>
        <form id="date_rang" name="date_rang" method="post">
        <div class="group">
          <span class="input-group-addon">
            <i class="fa fa-calendar"></i> Desde
          </span>
          <input class="form-control" id="from" name="Date[from]" size="16" type="text" value="<? echo $dateFrom; ?>" readonly>
          <span class="input-group-addon">
            <i class="fa fa-calendar"></i> Hasta
          </span>
          <input class="form-control" id="to" name="Date[to]" size="16" type="text" value="<? echo $dateTo; ?>" readonly>
          <div class="btn-group">
          	  <input type="hidden" name="reset" />
               <? if(isset($_POST['object_id_search']))
			   {echo '<input type="hidden" value="'.$modelMeasure->id.'" name="object_id_search">';}?>
              <input type="submit" value="Aplicar" /><input type="reset" class="reset btn" value="Limpiar" />
          </div>
        </div>
        </form>
        <div id="graphics_charts">
			




			<div id="yw0"></div>
         <script>
		 $(function () {
			 var to = $('#to').val();
			 var from = $('#from').val();
			$('#yw0').highcharts({
				chart: {
					type: 'areaspline'
				},
				title: {
					text: '<? if(isset($_POST['object_id_search'])){
						echo '<a href="/guia/'.$modelMeasure->friendly_url.'.html" target="_blank">'.$modelMeasure->title.'<i class="fa fa-external-link" style="padding-left: 20px;"></i></a>';
						}else{ echo "Gráfica de Visitas";}?>'
				},
				subtitle: {
					text: 'Visión general de audiencia - '+from+' a '+to
				},
				legend: {
					layout: 'vertical',
					align: 'left',
					verticalAlign: 'top',
					x: 100,
					y: 20,
					floating: true,
					borderWidth: 1,
					backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
				},
				xAxis: {
					type: 'datetime',
					dateTimeLabelFormats: { // don't display the dummy year
						month: '%e. %b',
						year: '%b'
					},
					title: {
						text: 'Fecha'
					}
				},
				yAxis: {
					title: {
						text: 'Cantidad'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					pointFormat: '{point.x:%e. %b}: {point.y:.0f} Visitas'
				},
		
				plotOptions: {
					spline: {
						marker: {
							enabled: true
						}
					}
				},
				exporting:{
					scale: 1,
					sourceWidth: 1075,
					sourceHeight: 590,
					filename: 'Grafico-visitas',
				},
				series: [<?php echo Measure::model()->dataToObjectFormatDate($objectGraph,$objectSubGraph); ?>]
			});
		});
		 </script>
        <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
        <script>      google.setOnLoadCallback(drawChart);
          function drawChart() {
    
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <? 
              foreach($dataProviderClick as $value){ ?>
              ['<?php echo $value['name']; ?>',<?php echo $value['measures']; ?>],
              <? } ?>
            ]);
    

            var options = {
              title: 'Conteo de Clics en Botones'
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
            chart.draw(data, options);
          }</script>
        <div id="piechart" style="width: auto; height: auto;"></div>
    </div>
    <div class="clearfix"></div>
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">General</a></li>
        <li><a href="#tabs-2">Por País</a></li>
        <li><a href="#tabs-3">Por Región</a></li>
        <li><a href="#tabs-4">Por Ciudad</a></li>
      </ul>
      <div id="tabs-1">         
        <table class="tbl_admin" class="table td display responsive no-wrap" width="100%" cellspacing="2">
            <thead>
                <tr>
                	<? if(!isset($_POST['object_id_search'])){?><th><i class="fa fa-filter"></i></th><? } ?>
                    <th>Nombre</th>
                    <th>Visitas</th>
                    <th>Tipo</th>
                    <th>Paises</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                	<? if(!isset($_POST['object_id_search'])){?><th><i class="fa fa-filter"></i></th><? } ?>
                    <th>Nombre</th>
                    <th>Visitas</th>
                    <th>Tipo</th>
                    <th>Paises</th>
                </tr>
            </tfoot>
            <tbody>
            <?php 
            foreach($dataProvider as $value){ ?>
                <tr>
				<? if(!isset($_POST['object_id_search'])){?>
                	<td class=" details-control" onclick="$('#<? echo $value['object_id'] ?>').submit();" title="Agregar al filtro">
                    	<form id="<? echo $value['object_id'] ?>" method="post">
                        	<input type="hidden" value="<? echo $value['object_id'] ?>" name="object_id_search" />
                            <input id="from" name="Date[from]" size="16" type="hidden" value="<? echo $dateFrom; ?>" readonly>
          					<input id="to" name="Date[to]" size="16" type="hidden" value="<? echo $dateTo; ?>" readonly>
                            <input type="hidden" name="reset" />
                        </form>
                    </td>
                <? } ?>
                    <td>
						<?php 
                        if($value['object_type_id']==1){
							echo '<a href="/guia/'.$value['url'].'.html" target="_blank">'.
							Listings::model()->findByPk($value['object_id'])->title.
							'<i class="fa fa-external-link" style="padding-left: 20px;"></i></a>';
                        }elseif($value['object_type_id']==2){
                            echo '<a href="/guia/classified/'.$value['url'].'.html" target="_blank">'.
							Classifieds::model()->findByPk($value['object_id'])->title.
							'<i class="fa fa-external-link" style="padding-left: 20px;"></i></a>';
                        }else{
                            echo $value['url']; 
                        }
                        ?>
                    </td>
                    <td><?php echo Measure::model()->coutnMeasureListing($value['object_id'],$value['object_type_id'],$dateFrom,$dateTo); ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo Measure::model()->coutnCountryListing($value['object_id'],$value['object_type_id'],$dateFrom,$dateTo); ?></td>
                </tr>
					<? //$dataSubProvider = Measure::model()->getSubMeasures($value['object_id']);?>
            <? } ?>
            </tbody>
        </table>
      </div>
      <div id="tabs-2">
      <table class="tbl_country" class="table td display responsive no-wrap" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Visitas</th>
                    <th>País</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Visitas</th>
                    <th>País</th>
                    <th>Tipo</th>
                </tr>
            </tfoot>
            <tbody>
            <?
			foreach($dataProviderCountry as $value){ ?>
                <tr>
                    <td><?php echo $value['measures']; ?></td>
                    <td><?php echo $value['country_name']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                </tr>
            <? } ?>
            </tbody>
        </table>
      </div>
      <div id="tabs-3">
      <table class="tbl_country" class="table td display responsive no-wrap" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Visitas</th>
                    <th>Región</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Visitas</th>
                    <th>Región</th>
                    <th>Tipo</th>
                </tr>
            </tfoot>
            <tbody>
            <?
			foreach($dataProviderRegion as $value){ ?>
                <tr>
                    <td><?php echo $value['measures']; ?></td>
                    <td><?php if($value['regionName']!='')echo $value['regionName'];else echo 'Unknown'; ?></td>
                    <td><?php echo $value['name']; ?></td>
                </tr>
            <? } ?>
            </tbody>
        </table>
      </div>
      <div id="tabs-4">
      <table class="tbl_country" class="table td display responsive no-wrap" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Visitas</th>
                    <th>Ciudad</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Visitas</th>
                    <th>Ciudad</th>
                    <th>Tipo</th>
                </tr>
            </tfoot>
            <tbody>
            <?
			foreach($dataProviderCity as $value){ ?>
                <tr>
                    <td><?php echo $value['measures']; ?></td>
                    <td><?php if($value['cityName']!='')echo $value['cityName'];else echo 'Unknown'; ?></td>
                    <td><?php echo $value['name']; ?></td>
                </tr>
            <? } ?>
            </tbody>
        </table>
      </div>
    </div>	
		<?
       /* $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
        )); */?>
		<div class="clearfix"></div>

	</div>
   </div>
  </div>
  <div class="clearfix"></div>