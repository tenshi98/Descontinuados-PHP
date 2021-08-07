<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/listado_errores.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se define la variables vacias para evitar errores                                            */
/**********************************************************************************************************************************/
$errors[1]='';
$errors[2]='';
$errors[3]='';
$errors[4]='';
/**********************************************************************************************************************************/
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Cargamos la ubicacion 
	$location = "principal.php";
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_login.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_login_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/usuario_login.php';//se crean los datos
}
//formulario para recuperar contraseña
if ( !empty($_POST['submit_pass']) )  { 
//defino la variable del mensaje en vacio
$cabeceras = "";
	//Cargamos la ubicacion 
	$location = "principal.php";
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_getpass.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_getpass_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/usuario_getpass.php';//se crean los datos
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Login</title>
<!-- TemplateEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo2.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="body">
<?php 
//Si estamos solicitando una clave
if ( ! empty($_GET['forgot']) ) { ?>

<?php // manejador de errores 
 if (!empty($error)) { ?>
  <ul> <?php foreach ($error as $mensaje) { ?><li class="alert_error width_small2" ><?php echo $mensaje ?></li><?php } ?></ul>
 <?php } ?>
<div class="modulo widht_modulo">
	<div class="title"><p>Recuperar Contraseña</p></div>
		<div class="content">
<p>Ingresa tu correo electronico y el sistema automaticamente te enviara una nueva clave.</p>
<table class="tableform">
<form action="" method="post">
	<tr>
		<td><label>Email</label></td>
		<td colspan="2"><input type="text" name="mail"  placeholder="Correo Electronico"/><?php echo $errors[1] ?></td>
	</tr>
    <tr>
    	<td></td>
		<td><input name="submit_pass" type="submit" value="Recuperar" /></td>
		<td><a href="index.php" ><input name="submit" type="button" value="Volver" /></a></td>
	</tr>
</form>
</table>
</div></div>

<?php
//Inicio Normal de la sesion
 } else { ?>
<?php // manejador de errores 
 if (!empty($error)) { ?>
  <ul> <?php foreach ($error as $mensaje) { ?><li class="alert_error width_small2" ><?php echo $mensaje ?></li><?php } ?></ul>
 <?php } ?>
  
<div class="modulo widht_modulo">
	<div class="title"><p>Inicio de Sesion</p></div>
		<div class="content">
<table class="tableform">
<form action="" method="post">
	<tr>
		<td><label>Usuario</label></td>
		<td colspan="2"><input type="text" name="usuario"  placeholder="Nombre de usuario" required=""/><?php echo $errors[1] ?></td>
	</tr>
	<tr>
		<td><label>Contraseña</label></td>
		<td  colspan="2"><input type="password" name="password"  placeholder="contraseña" required=""/><?php echo $errors[2] ?></td>
	</tr>
    <tr>
    	<td></td>
		<td><input name="submit_login" type="submit" value="Ingresar" /></td>
		<td><a href="index.php?forgot='true'" ><input name="submit" type="button" value="Recuperar Password" /></a></td>
	</tr>
</form>
</table>
</div></div>
<?php } ?>

 </div>         

</body>
</html>