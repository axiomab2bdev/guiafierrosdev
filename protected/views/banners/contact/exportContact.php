<?php
// file name for download
  /*$filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");*/

//print data ?>
<?php $data = '<table>
	<tr style="border: 2px solid rgb(184,0,37);background: rgb(184,0,37);color: white;">
        <td colspan="3">Cotizaciones del: '.$date.'</td>
    </tr>
    <tr style="border: 2px solid rgb(184,0,37);background: rgb(184,0,37);color: white;">
        <td>Correo</td>
        <td>Mensaje</td>
        <td>Ciudad</td>
		<td>Tipo</td>
		<td>Nombre</td>
		<td>Enviado desde</td>
    </tr>';
	foreach($dataProvider as $value){
		if($value['object_type_id']==1)
		{
			$modelObject = 	Listings::model()->findByPk($value['object_id']);
			$typeName = 'Proveedor';
			$objectName = $modelObject['title'];
			$url = 'http://'.$_SERVER['HTTP_HOST'].'/guia/'.$modelObject['friendly_url'].'.html';
		}else if($value['object_type_id']==2){
			$modelObject = 	Classifieds::model()->findByPk($value['object_id']);
			$typeName = 'Producto';
			$objectName = $modelObject['title'];
			$url = 'http://'.$_SERVER['HTTP_HOST'].'/guia/classified/'.$modelObject['friendly_url'].'.html';
		}
		$data .='<tr>
				<td>'.$value['mail'].'</td>
				<td>'.$value['body'].'</td>
				<td>'.$value['location'].'</td>
				<td>'.$typeName.'</td>
				<td>'.$objectName.'</td>
				<td>'.$url.'</td>
			</tr>';
	}
$data.='</table>';
//echo $data;
$data = utf8_decode($data);
Yii::app()->request->sendFile('Cotizaciones_'.$date.'.xls',$data); ?>