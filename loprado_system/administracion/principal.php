<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                          Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//variable con el nombre de la categoria de la transaccion
$rowlevel['nombre_categoria']='Principal';

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Principal</title>
    
    <!-- InstanceEndEditable -->
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome-animation.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<script src="assets/js/personel.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modulos de javascript-->
    <script type="text/javascript" src="assets/lib/modernizr/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
    <!-- InstanceBeginEditable name="head" -->

    <!-- InstanceEndEditable -->
  </head>
  <body>
    <div id="wrap">
      <div id="top">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="principal.php" class="navbar-brand">
                <?php require_once 'core/logo_empresa.php';?>
              </a> 
            </header>
            <?php require_once 'core/infobox.php';?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <?php require_once 'core/menu_top.php';?>
            </div>
          </div>
        </nav>
        <header class="head">
          <div class="main-bar">
            <h3>
            <!-- InstanceBeginEditable name="titulo" -->
            <i class="fa fa-dashboard"></i> Principal
			<!-- InstanceEndEditable --> </h3>
          </div>
        </header>
      </div>
      <div id="left">
       <?php require_once 'core/userbox.php';?> 
       <?php require_once 'core/menu.php';?> 
      </div>
      <div id="content">
        <div class="outer">
            <div class="inner">
			<!-- InstanceBeginEditable name="Bodytext" -->


<link href="assets/lib/metro/css/flexslider.css" rel="stylesheet" type="text/css">
<script src="assets/lib/metro/js/flexslider.js"></script>
<div class="row">             
	<div class="col-lg-8">
		<div class="jumbotron masthead">
			<div class="container">
				<div class="row">
					<div class="span12">
						<!-- Place somewhere in the <body> of your page -->
						<div id="mainslider" class="flexslider">
							<ul class="slides">
								<li data-thumb="upload/1.jpg">
								<img src="upload/1.jpg" alt="" />
								<div class="flex-caption btn-primary">
									<h2>Lorem ipsum dolor sit</h2>
									<h4>Lorem ipsum dolor sit amet vix ceteros noluisse intellegat</h4>
								</div>
								</li>
								<li data-thumb="upload/2.jpg">
								<img src="upload/2.jpg" alt="" />
								<div class="flex-caption btn-warning">
									<h2>Lorem ipsum dolor sit</h2>
									<h4>Lorem ipsum dolor sit amet vix ceteros noluisse intellegat</h4>
								</div>
								</li>
								<li data-thumb="upload/3.jpg">
								<img src="upload/3.jpg" alt="" />
								<div class="flex-caption btn-success">
									<h2>Lorem ipsum dolor sit</h2>
									<h4>Lorem ipsum dolor sit amet vix ceteros noluisse intellegat</h4>
								</div>
								</li>
								<li data-thumb="upload/4.jpg">
								<img src="upload/4.jpg" alt="" />
								<div class="flex-caption btn-danger ">
									<h2>Lorem ipsum dolor sit</h2>
									<h4>Lorem ipsum dolor sit amet vix ceteros noluisse intellegat</h4>
								</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		   
	<script>
	$('#mainslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	</script>  

	<div class="col-lg-4 center_icon"> 
		<a href="#" class="col-xs-6 col-sm-4 col-md-3 col-lg-6 btn-success" style="padding:6px;">
			<i class="fa fa-newspaper-o fa-5x"></i><br/>
			Ver todas las Noticias
		</a>
		
		<a href="principal_datos_perfil.php" class="col-xs-6 col-sm-4 col-md-3 col-lg-6 btn-primary" style="padding:6px;">
			<i class="fa fa-user fa-5x"></i><br/>
			Editar Mis Datos
		</a>
		
		<a href="principal_calendario.php?pagina=1" class="col-xs-6 col-sm-4 col-md-3 col-lg-6 btn-success" style="padding:6px;" >
			<i class="fa fa-calendar fa-5x"></i><br/>
			Calendario
		</a>
		
		<a href="principal_notificaciones.php?pagina=1" class="col-xs-6 col-sm-4 col-md-3 col-lg-6 btn-info" style="padding:6px;" >
			<i class="fa fa-envelope fa-5x"></i><br/>
			Notificaciones
		</a>
		
		<a href="principal_ayuda.php" class="col-xs-6 col-sm-4 col-md-3 col-lg-6 btn-warning" style="padding:6px;" >
			<i class="fa fa-file-word-o fa-5x"></i><br/>
			Archivos de ayuda
		</a>
		
		<a href="principal_procedimientos.php" class="col-xs-6 col-sm-4 col-md-3 col-lg-6 btn-danger" style="padding:6px;" >
			<i class="fa fa-file-word-o fa-5x"></i><br/>
			Procedimientos
		</a>
		
		<a href="principal_agenda_telefonica.php?pagina=1" class="col-xs-6 col-sm-4 col-md-3 col-lg-6 btn-primary" style="padding:6px;" >
			<i class="fa fa-phone fa-5x"></i><br/>
			Contactos
		</a>
		
		<script src="assets/lib/weather/jquery.simpleWeather.js"></script>
		
		<a href="http://www.accuweather.com/es/cl/lo-prado/56188/weather-forecast/56188" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn-success" style="padding:6px;" >
			<div id="weather"></div>
		</a>
		
		<script>
		$(document).ready(function() {
		  $.simpleWeather({
			location: 'Santiago, Chile',
			woeid: '',
			unit: 'c',
			success: function(weather) {
			  html = '<h2><g class="icon-'+weather.code+'"></g> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
			  html += '<ul><li>Lo Prado, Chile</li>';
			  
			  html += '</ul>';
		  
			  $("#weather").html(html);
			},
			error: function(error) {
			  $("#weather").html('<p>'+error+'</p>');
			}
		  });
		});
		</script>
		
		
		
		
		
	</div>
</div>

         
       
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
        
        
        
        
        
        
        
        
        
        
            
			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--Otros archivos javascript -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/screenfull/screenfull.js"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>
