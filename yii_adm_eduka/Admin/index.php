<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/funciones.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
require_once '../XRXS_2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                                          Seguridad                                                             */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
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

if ( !empty($_POST['submit_login']) )  { 
	$form_obligatorios = 'usuario,password';
	$form_trabajo= 'login';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}

if ( !empty($_POST['submit_pass']) )  { 
	$form_obligatorios = 'email';
	$form_trabajo= 'getpass';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
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
	<link rel="icon" type="image/png" href="src_img/mifavicon.png" />
  </head>
  <body class="login">


    <div class="container">
    <?php  
	//Manejador de errores
	if(isset($error)&&$error!=''){echo errors_list($error);};?>
	
 
      <div class="text-center">
        <img src="src_img/logo_default.png" alt="logo" width="350">
      </div>
      <div class="tab-content">
      
        <div id="login" class="tab-pane active">
          <form class="form-signin" method="post" >
            <p class="text-muted text-center">Ingrese su nombre de usuario y contraseña</p>
				<?php echo input('text',     'Usuario',    'usuario',  0, 2) ?>
                <?php echo input('password', 'Contraseña', 'password', 0, 2) ?>
                <?php echo submit('submit_login', 'Ingresar') ?>
          </form>
        </div>
        
        <div id="forgot" class="tab-pane">
          <form class="form-signin" method="post">
            <p class="text-muted text-center">Ingrese su email</p>
            <?php echo input('email','ejemplo@ejemplo.com','email', 0, 2) ?>
            <br/>
            <?php echo submit('submit_pass', 'Recuperar contraseña') ?>
          </form>
        </div>
        
      </div>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Ingresar</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">Recuperar contraseña</a>  </li>
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