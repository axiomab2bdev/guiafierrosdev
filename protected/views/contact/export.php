<?php
// file name for download
  /*$filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");*/

//print data ?>
<?php $data = '<table>
	<tr style="border: 2px solid #B80025;background: #B80025;color: white;">
        <th colspan="1">'.Yii::app()->name.'</th>
		<th colspan="1"><img src="http://'.$_SERVER['HTTP_HOST'].'/guia/themes/guia/images/favicon.ico" height="35px"></th>
    </tr>
	<tr style="border: 2px solid #B80025;background: #B80025;color: white;">
        <td colspan="2">Usuarios del: '.$date.'</td>
    </tr>
    <tr style="border: 2px solid #B80025;background: #B80025;color: white;">
        <td>Nombre</td>
        <td>Correo</td>
        <td>Teléfono</td>
    </tr>';
	foreach($dataProvider as $value){
		
		$data .='<tr>
				<td>'.strtr($value['name'],Yii::app()->params->unwanted_array).'</td>
				<td>'.$value['mail'].'</td>
				<td>'.$value['phone'].'</td>
			</tr>';
	}
$data.='</table>';
//echo $data;
$data = utf8_decode($data);
Yii::app()->request->sendFile('Usuarios_Cotización_'.$date.'.xls',$data); ?>