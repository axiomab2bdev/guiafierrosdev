<?php
// file name for download
  /*$filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");*/

//print data ?>
<?php $data = '<table>
	<tr style="border: 2px solid rgb(184,0,37);background: rgb(184,0,37);color: white;">
        <td colspan="3">Usuarios del: '.$date.'</td>
    </tr>
    <tr style="border: 2px solid rgb(184,0,37);background: rgb(184,0,37);color: white;">
        <td>Nombre</td>
        <td>Correo</td>
        <td>Teléfono</td>
    </tr>';
	foreach($dataProvider as $value){
		
		$data .='<tr>
				<td>'.$value['name'].'</td>
				<td>'.$value['mail'].'</td>
				<td>'.$value['phone'].'</td>
			</tr>';
	}
$data.='</table>';
//echo $data;
$data = utf8_decode($data);
Yii::app()->request->sendFile('Usuarios_Cotización_'.$date.'.xls',$data); ?>