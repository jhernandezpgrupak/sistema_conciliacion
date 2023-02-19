<?php
  session_start();
  if(!isset($_SESSION['uze']))
  {
    header('Location:index.php');
  }
  error_reporting(0);
  set_time_limit(300);
?>
<!DOCTYPE html>
  <head>
    <title>Sistema de Conciliación Universidad Tecnológica del Valle de Toluca</title>
      <meta charset="utf-8">
      <link href="css1/bootstrap.css" rel="stylesheet">
      <link href="css1/sb-admin.css" rel="stylesheet">
      <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

      <script src="js1/jquery-1.10.2.js"></script>
      <script src="js1/bootstrap.js"></script>
  </head>

  <body>
    <div id="wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Sistema de Conciliaci&oacute;n "Universidad Tecnol&oacute;gica del Valle de Toluca"</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <!--<li><a href="menu.php"><i class="fa fa-dashboard"></i> Menu</a></li>-->
          </ul>
          
          <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                <li><a href="cerrarsesion.php"><i class="fa fa-power-off"></i> Cerrar Sesi&oacute;n</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1><center>Reportes Generados</center><small></small></h1>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>
        <div align="center">			
<?php
error_reporting(E_ALL);
$xo=$_FILES['archivo']["tmp_name"];
require_once 'Excel/reader.php';
/*Crear una instancia de la clase*/
$data = new Spreadsheet_Excel_Reader();
/*Definir codificacion*/
$data->setOutputEncoding('CP1251');
/*Leer archivo*/
$data->read($xo);
error_reporting(E_ALL ^ E_NOTICE);
///////////////////////////////////////////////////////////////////////
$a=$data->sheets[0]['numRows'];
///////////////////////////////////////////////////////////////////////
$xa=$_FILES['archivo2']["tmp_name"];
require_once 'Excel/reader.php';
$datax = new Spreadsheet_Excel_Reader();
$datax->setOutputEncoding('CP1251');
$datax->read($xa);
error_reporting(E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////////////////////
$ax=$datax->sheets[0]['numRows'];
///////////////////////////////////////////////////////////////////////
//Cargos del Banco no correspondidos por la entidad
for($y=0;$y<=$ax;$y++)
{
$v2[$y]=$datax->sheets[0]['cells'][$y][7];
$ref[$y]=$datax->sheets[0]['cells'][$y][3];
$con[$y]=$datax->sheets[0]['cells'][$y][4];
$f[$y]=$datax->sheets[0]['cells'][$y][1];
}
for($i=0;$i<=$a;$i++)
{
$v1=$data->sheets[0]['cells'][$i][4];

     	for($x=0;$x<=$ax;$x++)
			{	
		
			if($v1!=$v2[$x])
			{
			$v1."==".$v2[$x].$f[$x].$ref[$x].$con[$x]."<br>";
			         
		  }
			
			
			else 
			{
			unset($v2[$x],$f[$x],$ref[$x],$con[$x]);
			
			}
		  }
			}		
			?>
<div>
<form  action='reporte_1.php' method='POST'>
<input  type='hidden' name='vector_1'  value='<?php  echo  serialize($v2)?>'/>
<input  type='hidden' name='vector_2'  value='<?php  echo  serialize($f)?>'/>
<input  type='hidden' name='vector_3'  value='<?php  echo  serialize($ref)?>'/>
<input  type='hidden' name='vector_4'  value='<?php  echo  serialize($con)?>'/>
Cargos del Banco no correspondidos por la Entidad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit'  value='Ver'/>
</form>
</div>
<br>
<br>
<?php
///////////////////////////////////////////////////////////////////////
//Cargos de la entidad no correspondidos por el banco
for($w=0;$w<=$a;$w++)
{
echo $x1[$w]=$data->sheets[0]['cells'][$w][4];
$f2[$w]=$data->sheets[0]['cells'][$w][1];
$ref2[$w]=$data->sheets[0]['cells'][$w][2];
$con1[$w]=$data->sheets[0]['cells'][$w][3];
}
for($z=0;$z<=$ax;$z++)
{
$x2=$datax->sheets[0]['cells'][$z][7];  
     	for($r=0;$r<=$a-2;$r++)
	    {	
			if($x2!=$x1[$r])
			{
			$x2 . " == " . $x1[$r] . $f2[$r] . $ref2[$r] . $con1[$r] . "<br>";
			}
			else
			{
			unset($x1[$r],$f2[$r],$ref2[$r],$con1[$r]);
			}
		}
}
?>
<form  action='reporte_2.php' method='POST'>
<input  type='hidden' name='vector_5'  value='<?php  echo  serialize($x1)?>'/>
<input  type='hidden' name='vector_6'  value='<?php  echo  serialize($f2)?>'/>
<input  type='hidden' name='vector_7'  value='<?php  echo  serialize($ref2)?>'/>
<div><span><input  type='hidden' name='vector_8'  value='<?php  echo  serialize($con1)?>'/></span></div>
Cargos de la Entidad no correspondidos por el Banco:&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit'  value='Ver'/>
</form> 
<br>
<br>
<?php
///////////////////////////////////////////////////////////////////////
//Abonos del banco no correspondidos por la entidad
for($m=0;$m<=$ax;$m++)
{
$y2[$m]=$datax->sheets[0]['cells'][$m][8];
$f3[$m]=$datax->sheets[0]['cells'][$m][1];
$ref3[$m]=$datax->sheets[0]['cells'][$m][3];
$con2[$m]=$datax->sheets[0]['cells'][$m][4];
}
for($n=0;$n<=$a;$n++)
{
$y1=$data->sheets[0]['cells'][$n][5];
   
     	for($s=0;$s<=$ax;$s++)
	    {	
			if($y1!=$y2[$s])
			{
			$y1 . " == " . $y2[$s] . $f3[$s] . $ref3[$s] .  $con2[$s] . "<br>";
			
			}
			else
			{
			unset($y2[$s],$f3[$s],$ref3[$s],$con2[$s]);
			}
		}
}
?>
<div>
<form  action='reporte_3.php' method='POST'>
<input  type='hidden' name='vector_9'  value='<?php  echo  serialize($y2)?>'/>
<input  type='hidden' name='vector_10'  value='<?php  echo  serialize($f3)?>'/>
<input  type='hidden' name='vector_11'  value='<?php  echo  serialize($ref3)?>'/>
<input  type='hidden' name='vector_12'  value='<?php  echo  serialize($con2)?>'/>
Abonos del Banco no correspondidos por la Entidad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit'  value='Ver'/>
</form>
</div>
<br>
<br>
<?php
////////////////////////////////////////////////////////////////////////
//Abonos de la entidad no correspondidos por el banco
for($p=0;$p<=$a;$p++)
{
$t1[$p]=$data->sheets[0]['cells'][$p][5];
$f4[$p]=$data->sheets[0]['cells'][$p][1];
$ref4[$p]=$data->sheets[0]['cells'][$p][2];
$con3[$p]=$data->sheets[0]['cells'][$p][3];
}
for($q=0;$q<=$ax;$q++)
{
$t2=$datax->sheets[0]['cells'][$q][8];   
     	for($u=0;$u<=$a;$u++)
	    {	
			if($t1[$u]!=$t2)
			{
			$t2 . " == " . $t1[$u] . $f4[$u] . $ref4[$u] . $con3[$u] .  "<br>";
			}
			else
			{
			unset($t1[$u],$f4[$u],$ref4[$u],$con3[$u]);
			}
		}
}
?>
<div>
<form  action='reporte_4.php' method='POST'>
<input  type='hidden' name='vector_13'  value='<?php  echo  serialize($t1)?>'/>
<input  type='hidden' name='vector_14'  value='<?php  echo  serialize($f4)?>'/>
<input  type='hidden' name='vector_15'  value='<?php  echo  serialize($ref4)?>'/>
<input  type='hidden' name='vector_16'  value='<?php  echo  serialize($con3)?>'/>
Abonos de la Entidad no correspondidos por el Banco:&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Ver'/>
</form>
</div>
<br>
<br>
<?php
for($ul=0;$ul<=60;$ul++)
{
$banco[$ul]=$data->sheets[0]['cells'][$ul][6];
}
$ultimo = end( $banco );

////////////////////////////////////////////
for($lu=0;$lu<=$ax;$lu++)
{
$banco2[$ul]=$datax->sheets[0]['cells'][$lu][9];
}
$ultimox = end( $banco2 );

?>
<div>
<form  action='reporte_general.php' method='POST'>
<?php 
echo "<input type='hidden' name='x' value=$ultimo>";
?>
<?php 
echo "<input type='hidden' name='y' value=$ultimox>";
?>
<input  type='hidden' name='vector_1'  value='<?php  echo  serialize($v2)?>'/>
<input  type='hidden' name='vector_5'  value='<?php  echo  serialize($x1)?>'/>
<input  type='hidden' name='vector_9'  value='<?php  echo  serialize($y2)?>'/>
<input  type='hidden' name='vector_13'  value='<?php  echo  serialize($t1)?>'/>
Reporte General: <input type='submit' value='Ver'/>
</form>
</div>
</div> 
</div>
  
  </body>
</html>
