<?php
// file name for download
  /*$filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");*/

//print data
  //header('charset=utf-8');
 ?>
<?php	
	$objectName="";
	$url="";
	$typeName="";
	$data="";
	$modelObject="";
	$url="";
	
	
	$data = '<table>
	<tr style="border: 2px solid #B80025;background: #B80025;color: white;">
        <th colspan="1">'.Yii::app()->name.'</th>
		<th colspan="1"><img src="http://'.$_SERVER['HTTP_HOST'].'/guia/themes/guia/images/favicon.ico" height="35px"></th>
    </tr>
	<tr style="border: 2px solid #B80025;background: #B80025;color: white;">
        <td colspan="2">Cotizaciones del: '.$date.'</td>
    </tr>
    <tr style="border: 2px solid #B80025;background: #B80025;color: white;">
        <td>Correo</td>
        <td>Mensaje</td>
        <td>Ciudad</td>
		<td>Desde</td>
		<td>Tipo</td>
		<td>Nombre</td>
		<td>Enviado desde</td>
		<td>Fecha</td>
    </tr>';
	
	foreach($dataProvider as $value){
		
	if (!empty($value['object_type_id'])){
		if($value['object_type_id']==1)
		{
			$modelObject = 	Listings::model()->findByPk($value['object_id']);
			$typeName = 'Proveedor';
			$objectName = $modelObject['title'];
			$url = 'http://'.$_SERVER['HTTP_HOST'].'/guia/'.$modelObject['friendly_url'].'.html';
		}
		if($value['object_type_id']==2){
			$modelObject = 	Classifieds::model()->findByPk($value['object_id']);
			$typeName = 'Producto';
			$objectName = $modelObject['title'];
			$url = 'http://'.$_SERVER['HTTP_HOST'].'/guia/classified/'.$modelObject['friendly_url'].'-'.$modelObject['id'].'.html';
		}
	}
		$data .='<tr>
				<td>'.$value['mail'].'</td>
				<td>'.strtr($value['body'],Yii::app()->params->unwanted_array).'</td>
				<td>'.strtr($value['location'],Yii::app()->params->unwanted_array).'</td>
				<td>'.$typeName.'</td>
				<td>'.strtr($value['data_type'],Yii::app()->params->unwanted_array).'</td>
				<td>'.strtr($objectName,Yii::app()->params->unwanted_array).'</td>
				<td>'.$url.'</td>
				<td>'.$value['create_date'].'</td>
			</tr>';
			
	$objectName="";
	$url="";
	$typeName="";
	$modelObject="";
	$url="";
			
	}
$data.='</table>';
//echo $data;
$data = utf8_decode($data);
Yii::app()->request->sendFile('Cotizaciones_'.$date.'.xls',$data); ?>