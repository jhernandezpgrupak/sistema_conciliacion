<?php ob_start(); ?>
<?php error_reporting(0);?>
<?php set_time_limit(300); ?>
<?php
$a = unserialize($_POST['vector_1']);
$a2 = unserialize(stripslashes($_POST['vector_2']));
$a3 = unserialize(stripslashes($_POST['vector_3']));
$a4 = unserialize(stripslashes($_POST['vector_4']));
$suma=0;
foreach ($a as $indice => $cargo_)
{

	$val_ = substr($cargo_,1,-3);
	$val2_ = floatval($val_);
	$suma = $suma + $val2_;	
	
}
$nf=number_format($suma);
//////////////////////////////////
?>
<html>
<head>
<meta http-equiv="content-type" content='text/html'; charset='UTF-8'/ >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<?php echo"<table border=1><tr><td width='680' height='100'><h3>Conciliaci&oacute;n Bancaria al:</h3>".date("d/m/Y")."&nbsp;&nbsp;".date("H:i:s")."&nbsp;<br><br>";?>
Numero de Cuenta:0532548418 <center>Instituci&oacute;n Financiera:<b>BANORTE</b></center><br></td></tr></table><br></br>
<table border=1 width='689' height='20'><tr><td><br><center>Cargos del Banco no correspondidos por la Entidad</center><br></td></tr></table><br></br>
<?php echo "<table border=1 width='689'><tr><th align='center'>Fecha</th><th align='center'>N&uacute;m de Cheque/Referencia</th><th align='center'>Concepto</th><th align='center'><b>Importe</b></th></tr>";
//<table border=0 width='689' border='0' style='border:1px solid #000000;'>
?>
<?php
for ($i=0;$i<sizeof($a)*20;$i++)
{
$val_tt = substr($a[$i],1,-3);
$nft_=number_format($val_tt);
if($a[$i]==null or $a[$i]=="")
{
continue;
}
else
{
echo "<tr><td align='left'>".$a2[$i]."</td><td align='center'>".$a3[$i]."</td><td align='center'>".$a4[$i]."</td><td align='center'>$".$nft_.".00</td></tr>";
}
}
echo"<tr><td></td><td></td><td></td><td align='center'>"."<b>Total: $".$nf.".00</b>"."</td>";
////////////////////////////////////////////////
?>

<?php
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->set_paper("letter","landscape");  //Horizontal
$dompdf->load_html(ob_get_clean());
$dompdf->render();
// ini_set("memory_limit","32M");
$pdf = $dompdf->output();
$filename = "Cargos_de_banco_no_correspondidos_por_la_entidad".time().'.pdf';
//file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>