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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                                          Seguridad                                                             */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "principal.php";
/**********************************************************************************************************************************/
/*                                               Se cargan los formularios                                                        */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	$form_obligatorios = 'usuario,password';
	$form_trabajo= 'login';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
//formulario para recuperar la contrase??a
if ( !empty($_POST['submit_pass']) )  { 
	$form_obligatorios = 'email';
	$form_trabajo= 'getpass';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <link rel="stylesheet" href="assets/lib/magic/magic.css">
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css" rel="stylesheet" type="text/css">
	
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="assets/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="assets/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="assets/css/ie9.css" media="all" />
<![endif]-->

	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
  </head>
  <body class="login">


    <div class="container">
    <?php if(isset($error)&&$error!=''){echo errors_list($error);};?>
	
      <div class="text-center">

		<div class="logo_empresa fcenter">
			<div class="content_gearbox fleft">
				<div class="gearbox">
					<div class="overlay"></div>
					<div class="gear one">
						<div class="gear-inner">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
					</div>
					<div class="gear two">
						<div class="gear-inner">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
					</div>
				
					<div class="gear four large">
						<div class="gear-inner">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
					</div>
				</div>
				  
				  
			</div>
			<div class="texto fleft">
				<h1>Mantenlubric V3<br/>
				<span>Software de gestion - Planes de lubricacion TFM</span>
				</h1>
			</div>
		</div>

        <div style="clear: both;"></div>
        
        
      </div>
     
	 
      <div class="tab-content">
      
        <div id="login" class="tab-pane active">
          <form class="form-signin" method="post" >
            <p class="text-muted text-center">
              Ingrese su nombre de usuario y contrase??a
            </p>
            
            <input type="text" placeholder="Usuario" class="form-control" name="usuario" autocomplete="off" required >
            <input type="password" placeholder="Contrase??a" class="form-control" name="password" autocomplete="off" required >
            <input type="submit" name="submit_login" class="btn btn-lg btn-primary btn-block" value="Ingresar" />
          </form>
        </div>
        
        <div id="forgot" class="tab-pane">
          <form class="form-signin" method="post">
            <p class="text-muted text-center">Ingrese su email</p>
            <input type="email" placeholder="mimail@midominio.cl" required class="form-control" name="email" required >
            <br>
            <input type="submit" name="submit_pass" class="btn btn-lg btn-danger btn-block" value="Recuperar contrase??a" />
          </form>
        </div>
        
      </div>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Ingresar</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">Recuperar contrase??a</a>  </li>

        </ul>
      </div>
  </div><!-- /container -->
   
    
  <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script>
      $('.list-inline li > a').click(function() {
        var activeForm = $(this).attr('href') + ' > form';
        //console.log(activeForm);
        $(activeForm).addClass('magictime swap');
        //set timer to 1 seconds, after that, unload the magic animation
        setTimeout(function() {
          $(activeForm).removeClass('magictime swap');
        }, 1000);
      });
    </script>
  </body>
</html>
