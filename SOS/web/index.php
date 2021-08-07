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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
//require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "index.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Se consiguen las variables 
	$root_to='principal.php';
	$move_to='';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_login.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_login_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_login_2.php';
}
//formulario para iniciar sesion
if ( !empty($_POST['submit_recover']) )  { 
	//Se consiguen las variables 
	$location.='&recovery=true';
	$location.='&return_to1='.$root_to.$move_to;
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_getpass.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_getpass_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_mail/clientes_getpass.php';
}
//formulario para iniciar sesion
if ( !empty($_POST['submit_new']) )  { 
	//Se consiguen las variables 
	if($config_app['comport_autoactivate']==1){
  		$location.='&create=true';
    }elseif($config_app['comport_autoactivate']==2){
  		$location.='&create_but=true';
    }
	$location.='&return_to1='.$root_to.$move_to;
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_3.php';
	if($config_app['comport_autoactivate']==2){
  		require_once '../AA2D2CFFDJFDJX1/xrxs_mail/cliente_new.php';
    }
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_listado.php';	
}
//formulario para iniciar sesion
if ( !empty($_POST['submit_activate']) )  { 
	//Se consiguen las variables 
	$location.='&user_active=true';
	$location.='&return_to1='.$root_to.$move_to;
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_5.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_listado_6.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/normal1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Inicio de sesion</title>
<!-- InstanceEndEditable -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo.css">
<!-- InstanceBeginEditable name="head" -->



<!-- InstanceEndEditable -->
</head>
<body>
<!-- InstanceBeginEditable name="cuerpo" -->
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($_GET['recovery'])) {?>
    <div class="alert fcenter <?php echo $config_app['msg_info_color_body'].' '.$config_app['msg_info_color_text'].' '.$config_app['msg_info_width'].' '.$config_app['msg_info_border'].' '.$config_app['msg_info_border_color'] ?>">
    <i class="fa fa-info"></i>
    <p class="long_txt"><b>Informacion!</b> Nueva contraseña enviada correctamente.</p>
    </div>
<?php }?>
<?php  if (isset($_GET['create'])) {?>
    <div class="alert fcenter <?php echo $config_app['msg_success_color_body'].' '.$config_app['msg_success_color_text'].' '.$config_app['msg_success_width'].' '.$config_app['msg_success_border'].' '.$config_app['msg_success_border_color'] ?>">
    <i class="fa fa-check"></i>
    <p class="long_txt"><b>Correcto!</b> Usuario creado correctamente, ingrese con sus datos.</p>
    </div>
<?php }?>
<?php  if (isset($_GET['create_but'])) {?>
    <div class="alert fcenter <?php echo $config_app['msg_success_color_body'].' '.$config_app['msg_success_color_text'].' '.$config_app['msg_success_width'].' '.$config_app['msg_success_border'].' '.$config_app['msg_success_border_color'] ?>">
    <i class="fa fa-check"></i>
    <p class="long_txt"><b>Correcto!</b> Usuario creado correctamente, sin embargo debe de activar su usuario con la contraseña enviada a su correo.</p>
    </div>
<?php }?>
<?php  if (isset($_GET['block'])) {?>
    <div class="alert fcenter <?php echo $config_app['msg_alert_color_body'].' '.$config_app['msg_alert_color_text'].' '.$config_app['msg_alert_width'].' '.$config_app['msg_alert_border'].' '.$config_app['msg_alert_border_color'] ?>">
    <i class="fa fa-exclamation-triangle"></i>
    <p class="long_txt"><b>Alerta!</b> Tu perfil esta bloqueado, contacta con el administrador del sistema.</p>
    </div>
<?php }?>
<?php  if (isset($_GET['inex'])) {?>
    <div class="alert fcenter <?php echo $config_app['msg_alert_color_body'].' '.$config_app['msg_alert_color_text'].' '.$config_app['msg_alert_width'].' '.$config_app['msg_alert_border'].' '.$config_app['msg_alert_border_color'] ?>">
    <i class="fa fa-exclamation-triangle"></i>
    <p class="long_txt"><b>Alerta!</b> El usuario o la contraseña estan incorrectos, vuelve a intentarlo nuevamente.</p>
    </div>
<?php }?>
<?php  if (isset($_GET['user_active'])) {?>
    <div class="alert fcenter <?php echo $config_app['msg_success_color_body'].' '.$config_app['msg_success_color_text'].' '.$config_app['msg_success_width'].' '.$config_app['msg_success_border'].' '.$config_app['msg_success_border_color'] ?>">
    <i class="fa fa-check"></i>
    <p class="long_txt"><b>Correcto!</b> Su usuario ya esta activo, vuelva a ingresar sus datos para iniciar sesion.</p>
    </div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['recover']) ) { ?>
<div class="col-xs-4 fcenter topcenter">
<form class="form-horizontal" method="post">
  <h2>Recuperar Password</h2>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Email" required="required" name="email">
  </div>
  <div class="form-group">
      <input name="submit_recover" type="submit" class="btn btn-primary btn-block" value="Ingresar">
      <a class=" btn btn-block <?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_color_texto'] ?> " href="<?php echo $location ?>">Volver</a>
  </div>
</form>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['activate']) ) { ?>
<div class="col-xs-4 fcenter topcenter">
<form class="form-horizontal" method="post">
  <h2>Ingresar contraseña recibida</h2>
  <div class="form-group">
    <label>Contraseña</label>
    <input type="text" class="form-control" placeholder="Contraseña" required="required" name="create_pass">
  </div>
  <div class="form-group">
      <input name="submit_activate" type="submit" class="btn btn-primary btn-block" value="Ingresar">
      <a class=" btn btn-block <?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_color_texto'] ?> " href="<?php echo $location ?>">Volver</a>
  </div>
</form>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['newuser']) ) { ?>
<div class="col-xs-4 fcenter topcenter">
<form class="form-horizontal" method="post">
  <h2>Crear Usuario</h2>
  <div class="form-group">
    <label>Usuario</label>
    <input type="text" class="form-control"  placeholder="Usuario" required="required" name="usuario">    
  </div>
  <div class="form-group">
    <label>password</label>
    <input type="password" class="form-control"  placeholder="Password" required="required" name="password">    
  </div>
  <div class="form-group">
    <label>repassword</label>
    <input type="password" class="form-control"  placeholder="Repetir Password" required="required" name="repassword">    
  </div>
  <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control"  placeholder="Nombre" required="required" name="Nombre">    
  </div>
  <div class="form-group">
    <label>Apellido Paterno</label>
    <input type="text" class="form-control"  placeholder="Apellido Paterno" required="required" name="Apellido_Paterno">    
  </div>
  <div class="form-group">
    <label>Apellido Materno</label>
    <input type="text" class="form-control"  placeholder="Apellido Materno" required="required" name="Apellido_Materno">    
  </div>
  <div class="form-group">
    <label>email</label>
    <input type="email" class="form-control"  placeholder="Email" required="required" name="email">    
  </div>

  <input type="hidden"   name="fcreacion" value="<?php echo fecha_actual(); ?>"  >
  <input type="hidden"   name="idTipoCliente" value="<?php echo $_GET['app_conf']; ?>"  >
  <input type="hidden"   name="Radio" value="1"  >
  <input type="hidden"   name="Alarma" value="Si"  >
  <?php if($config_app['comport_autoactivate']==1){?>
  	<input type="hidden"   name="Estado" value="1"  >
  <?php }elseif($config_app['comport_autoactivate']==2){?>
  	<input type="hidden"   name="Estado" value="3"  >
    <input type="hidden"   name="create_pass" value="<?php echo genera_password(5)?>"  >
  <?php }?>
  
  <div class="form-group">
      <input name="submit_new" type="submit" class="btn btn-primary btn-block" value="Ingresar">
      <a class=" btn btn-block <?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_color_texto'] ?> " href="<?php echo $location ?>">Volver</a>
  </div>
</form>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else { ?>
<div class="col-xs-4 fcenter topcenter">
<form class="form-horizontal" method="post">
  <h2>Inicio de Sesion</h2>
  <div class="form-group">
    <label>Usuario</label>
    <input type="text" class="form-control"  placeholder="Usuario" required="required" name="usuario">    
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control"  placeholder="Password" required="required" name="password">
  </div>
  
  <div class="form-group">
      <input name="submit_login" type="submit" class="btn btn-primary btn-block" value="Ingresar">
	  <a class="btn btn-block <?php echo $config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_color_texto'] ?> btn_link" href="<?php echo $location.'&newuser=true' ?>">Crear Usuario</a>
	  <a class="btn btn-block <?php echo $config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_color_texto'] ?> btn_link" href="<?php echo $location.'&recover=true' ?>">Recuperar Password</a>

  
  </div>
</form>
</div>
<?php }?>
<!-- InstanceEndEditable -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
<!-- InstanceEnd --></html>