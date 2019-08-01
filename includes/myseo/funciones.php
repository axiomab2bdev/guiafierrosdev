<!-- inicio de MySEO -->
<?php
include(PMDROOT.'/Connections/cnn.php');    
$id = $this->escape($id);
mysql_select_db($database_cnn, $cnn);
$sql =  ("SELECT template_file FROM pmd_listings where id= ".$id."");
$rs = mysql_query($sql, $cnn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);

if($row_rs['template_file']!=""){ ?>
<div id="globos"><a href="<?php echo $urlL; ?>/send-message.html"><IMG SRC="/guia/template/default/images/boton_cotizar_guia.png" width=90 height=90></a></div>	
<?php }

?>
<!-- inicio de MySEO -->