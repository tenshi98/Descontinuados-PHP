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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esMedico.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_medico.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/medicos_listado.php';
}
?>
<!DOCTYPE html>
<html lang="en">
  
	<head>
		<meta charset="utf-8">
		<title>Ingreso de Usuario</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes"> 
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<?php require_once 'core/navbar_login.php';?>
		<div class="container" style="margin-top:15px;">
			<?php 
			//Manejador de errores
			if(isset($error)&&$error!=''){echo notifications_list_3($error);};?>
		</div>

		<div class="account-container">
			<div class="content clearfix">
				<form method="post">
					
					<h1>Ingreso al Sistema</h1>		
					
					<div class="login-fields">
						
						<p>Ingrese los datos solicitados</p>
						
						<div class="field">
							<label for="username">Usuario</label>
							<input type="text" id="username" name="usuario" value="" placeholder="Usuario" class="login username-field" />
						</div>
						
						<div class="field">
							<label for="password">Contraseña</label>
							<input type="password" id="password" name="password" value="" placeholder="Contraseña" class="login password-field"/>
						</div> 
						
					</div> 
					
					<div class="login-actions">				
						<input type="submit" name="submit_login" class="button btn btn-success btn-large" value="Ingresar" />
					</div>

				</form>
				
			</div> <!-- /content -->
			
		</div> <!-- /account-container -->



	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/bootstrap.js"></script>

	<script src="js/signin.js"></script>

	</body>

</html>
