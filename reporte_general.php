<?php ob_start(); ?>
<?php error_reporting(0);?>
<?php set_time_limit(300); ?>
<?php
$sc=$_POST['x'];
$val = substr($sc,1,-3);
$sctl=number_format($val);
////////////////
////////////////
$sb=$_POST['y'];
$val_ = substr($sb,1,-3);
$sbnc=number_format($val_);

$c1 = unserialize(stripslashes($_POST['vector_1']));
$c2 = unserialize(stripslashes($_POST['vector_5']));
$a1 = unserialize(stripslashes($_POST['vector_9']));
$a2 = unserialize(stripslashes($_POST['vector_13']));
$suma2=0;
foreach ($c1 as $c1_2 => $c1_3)
{
	$val_c1 = substr($c1_3,1,-3);
	$val_2c1 = floatval($val_c1);
	$suma2 = $suma2 + $val_2c1;
}
$cbnc=number_format($suma2);
/////////////////

////////////////
$suma5=0;
foreach ($c2 as $c2_2 => $c2_3)
{
	$c2_1 = substr($c2_3,1,-3);
	$c2_22 = floatval($c2_1);
	$suma5 = $suma5 + $c2_22;
}
$cenc=number_format($suma5);
$suma3=0;
foreach ($a1 as $a1_2 => $a1_3)
{
	$val_a1 = substr($a1_3,1,-3);
	$val_2a1 = floatval($val_a1);
	$suma3 = $suma3 + $val_2a1;
}
$abnc=number_format($suma3);
$suma4=0;
foreach ($a2 as $a2_2 => $a2_3)
{
	$a2_1 = substr($a2_3,1,-3);
	$a2_2 = floatval($a2_1);
	$suma4 = $suma4 + $a2_2;
}
$aenc=number_format($suma4);
?>
<html>
<head>
<meta http-equiv="content-type" content='text/html'; charset='UTF-8'/ >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css" media="all">
td {
border:hidden;
}
table {
border: 1px solid #0000FF;
}
</style>
</head>
<br></br>
<img src="img/logo.jpg" width='140' height='25' align='left'><center>UNIVERSIDAD TECNOL&Oacute;GICA DEL VALLE DE TOLUCA</center>
<?php echo"<h3><table border=1><tr><td width='715' height='100'>Conciliaci&oacute;n Bancaria al:</h3>&nbsp;";echo date("d/m/Y")."&nbsp;"; echo date("H:i:s")."&nbsp;<br><br></br></br>";?>
Numero de Cuenta:0532548418 <center>Instituci&oacute;n Financiera:<b>BANORTE</b></center></td></tr></table><br><br></br></br>
<table width="100%"  border="0" style="border:1px solid #000000;">
<tr><td  width='200' >Saldo en Bancos:</td><td  width='15'  align='right'><?php echo "<b>$".$sbnc.".00</b>"?></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Cargos del Banco no correspondidos por la Entidad:</td><td align='right'><?php echo "<b>$".$cbnc.".00</b>"?></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Cargos de la Entidad no correspondidos por el Banco:</td><td align='right'><?php echo "<b>$".$cenc.".00</b>"?></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Abonos del Banco no correspondidos por la Entidad:</td><td align='right'><?php echo "<b>$".$abnc.".00</b>"?></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Abonos de la Entidad no correspondidos por el Banco:</td><td align='right'><?php echo "<b>$".$aenc.".00</b>"?></td></tr>
<tr><td><br></td><td></td></tr>
<tr><td>Saldo en Contabilidad:</td><td align='right'><?php echo "<b>$".$sctl.".00</b>"?></td></tr>
</table>
<br></br>
<br></br>
<center><table border=0 width="100%">
<tr><td align='center'>
Elabor&oacute;<br></br><br></br><br></br><br></br>
<b>Raquel Robledo Padilla</b><br>
Jefe de la Oficina de Bancos
</td>
<td align='center'>
Reviz&oacute;<br></br><br></br><br></br><br></br>
<b>C.P. Pedro Alberto Hern&aacute;ndez D&iacute;az</b><br>
Subdirector de Finanzas y Servicios Generales
</td>
<td align='center'>
Autoriz&oacute;<br></br><br></br><br></br><br></br>
<b>M. en H.P. Ver&oacute;nica Mathues Thom&eacute;</b><br>
Directora de Administraci&oacute;n y Finanzas
</td>
</tr>
</table></center>

<?php
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->set_paper("letter","landscape");  //Horizontal
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Report_general".time().'.pdf';
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>