<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UTVT-Universidad Tecnológica del Valle de Toluca</title>
  
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.css" rel="stylesheet">
      <!-- Add custom CSS here -->
      <link href="css/slidefolio.css" rel="stylesheet">
	   <!-- Font Awesome -->
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

      <link rel="stylesheet" href="themes/alertify.core.css"/>
      <link rel="stylesheet" href="themes/alertify.default.css"/>

    <script type="text/javascript" src="lib/alertify.js"></script>
  </head>
  
  <body>
    <!-- Header Area -->
    <div id="top" class="header">
      <div class="vert-text"> 
        <img class="img-rounded" alt="Company Logo" src="./img/logo.jpg"/>
          <h2><em>Universidad Tecnológica del Valle de Toluca</em></h2>
		        <br>
			         <a href="#contact" class="btn btn-top">Iniciar sesión</a>
			         <font color="red">
               <br>
               <?php error_reporting(0); echo '<div alig="center"><h4><strong>'.$_GET['Result'].'</strong></h4></div>'; ?>
      </div>
    </div>
    <!-- /Header Area -->

    <!-- Contact -->
    <div id="contact">
      <div class="container">
        <div class="row">
		      <div class="col-md-4 col-md-offset-4 text-center">
            <h2>Inicia Sesión</h2>
			       <hr></hr>
          </div>
        <div class="col-md-5 col-md-offset-3">
		      
          <!-- contact form starts -->
          <form action="acceso.php" method="POST" id="contact-form" name="contact-form" class="form-horizontal" 
          onsubmit="return validateform();">
			       <fieldset>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="name" >Usuario</label>
						      <div class="col-sm-8">
						        <input type="text" name="user" id="user" class="form-control"  pattern="^[A-Za-z0-9]{5,10}$" title="Intriduce un usuario correcto" autocomplete=off  placeholder="Accede con: invitado" 
                    style="text-align:center;" required/>
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="email">Contraseña</label>
						      <div class="col-sm-8">
						        <input type="password" name="psw" id="psw" class="form-control" pattern="^[0-9]{5,10}$" title="Introduce una contraseña correcta" placeholder="Accede con: 12345" style="text-align:center;" required/>
						      </div>
						    </div>
	
	              <div class="col-sm-offset-4 col-sm-8" align="center">
			            <input type="submit" name="submit" value="Ingresar" class="btn btn-success"/>
	        			</div>
						</fieldset>
					</form>
				<!-- contact form ends -->		
        </div>
      </div>
    </div>
  </div>
  <!-- /Contact -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster--> 
  <script src="js/jquery.js"></script>
	<script src="js/jquery-scrolltofixed-min.js"></script>
	<script src="js/jquery.vegas.js"></script>
	<script src="js/jquery.mixitup.min.js"></script>
	<!--<script src="js/jquery.validate.min.js"></script>-->
	<!--<script src="js/script.js"></script>-->
	<script src="js/bootstrap.js"></script>
	
<!-- Slideshow Background  -->
	<script>
$.vegas('slideshow', {
  delay:5000,
  backgrounds:[
     { src:'./img/u1.jpg', fade:2000 },
	 { src:'./img/u2.jpg', fade:2000 },
    { src:'./img/u3.jpg', fade:2000 },
	 { src:'./img/u4.jpg', fade:2000 },
    { src:'./img/u5.jpg', fade:2000 },

	   
  ]
})('overlay', {
src:'./img/overlay.png'
});

	</script>
<!-- /Slideshow Background -->

<!-- Mixitup : Grid -->
    <script>
		$(function(){
    $('#Grid').mixitup();
      });
    </script>
<!-- /Mixitup : Grid -->	

    <!-- Custom JavaScript for Smooth Scrolling - Put in a custom JavaScript file to clean this up -->
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>
<!-- Navbar -->
<script type="text/javascript">
$(document).ready(function() {
        $('#nav').scrollToFixed();
  });
    </script>
<!-- /Navbar-->
  </body>
</html>