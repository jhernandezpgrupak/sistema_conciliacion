<?php
  session_start();
  if(!isset($_SESSION['uze']))
  {
    header('Location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistema de Conciliación Universidad Tecnológica del Valle de Toluca</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="js1/jquery-1.10.2.js"></script>
    <script src="js1/bootstrap.js"></script>
  

    <link href="css1/bootstrap.css" rel="stylesheet">
    <link href="css1/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

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
          <a class="navbar-brand" >Sistema de Conciliación "Universidad Tecnológica del Valle de Toluca"</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class=""><a href="#"><i class=""></i> Ayuda</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="cerrarsesion.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1><center>Conciliación</center><small></small></h1><!--Texto-->
              <ol class="breadcrumb"></ol>
          </div>
        </div>

        <div align="center">
          <form enctype='multipart/form-data' action="reportes_realizados.php" method="POST" enctype="multipart/form-data" name="Archivo" 
          id="Archivo">
          Selecciona el archivo:(U.T.V.T)<input type="FILE" name="archivo" id="archivo" placeholder="Selecciona" required/>
          <br>
          <br>
          <br>
          Selecciona el archivo:(BANCO)<input type="FILE" name="archivo2" id="archivo2" placeholder="Selecciona" required/>
          <br>
          <br>
          <input type="submit" value="Comparar">
          </form>
        </div>
      </div>
    </div>    
  </body>
</html>
