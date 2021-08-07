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
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "login.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                            Redireccion a la pagina correcta                                                    */
/**********************************************************************************************************************************/
$root_to ='';
$move_to ='';
if(isset($_GET['return_to1'])){ $root_to .=$_GET['return_to1'];}
if(isset($_GET['return_to2'])){ $move_to .='&'.$_GET['return_to2']; }
if(isset($_GET['return_to3'])){ $move_to .=$_GET['return_to3']; }
if(isset($_GET['return_to4'])){ $move_to .='&'.$_GET['return_to4']; }
if(isset($_GET['return_to5'])){ $move_to .=$_GET['return_to5']; }
if(isset($_GET['return_to6'])){ $move_to .='&'.$_GET['return_to6']; }
if(isset($_GET['return_to7'])){ $move_to .=$_GET['return_to7']; }
if(isset($_GET['return_to8'])){ $move_to .='&'.$_GET['return_to8']; }
if(isset($_GET['return_to9'])){ $move_to .=$_GET['return_to9']; }
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Se consiguen las variables 
	$new_location=$root_to.$w.$move_to;
	$location.='&return_to1='.$root_to.$move_to;
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="<?php echo $config_app['background_color'] ?>">

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
if ( ! empty($_GET['recover']) ) {?>
<div class="form <?php echo $config_app['form_color'] ?>"> 
 <form method="post">
  <h1>Recuperar contraseña</h1>
  <p>Ingrese su direccion de correo y el sistema enviara su nueva contraseña</p>
  <div class="input"><label id="icon" for="name"><i class="fa fa-envelope"></i></label>     <input type="email" name="email" placeholder="Direccion de correo" /></div>
  <input type="submit"   value="Solicitar"  name="submit_recover" >
  </form>
  </div>
  <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'].' '.$config_app['btn_cancelar_border'] ?> btn_link" href="<?php echo $location.'&return_to1='.$root_to ?>">Cancelar</a>
  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['activate']) ) { ?>
<div class="form <?php echo $config_app['form_color'] ?>">
  <form method="post">
  <h1>Ingresar contraseña recibida</h1>
  <div class="input"><label id="icon" for="name"><i class="fa fa-key"></i></label>     <input type="text"      name="create_pass"     placeholder="Contraseña" /></div>
  <input type="hidden"   name="idCliente" value="<?php echo $_GET['id']; ?>"  >

  <input type="submit"   value="Activar"  name="submit_activate" >
  </form>
  </div>
  <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'].' '.$config_app['btn_cancelar_border'] ?> btn_link" href="<?php echo $location.'&return_to1='.$root_to ?>">Cancelar</a>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['newuser']) ) { ?>
<div class="form <?php echo $config_app['form_color'] ?>">
  <form method="post">
  <h1>Crear nuevo usuario</h1>
  <div class="input"><label id="icon" for="name"><i class="fa fa-user"></i></label>     <input type="text"      name="usuario"     placeholder="Nombre de usuario" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-key"></i></label>      <input type="password"  name="password"    placeholder="Contraseña" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-key"></i></label>      <input type="password"  name="repassword"  placeholder="Repetir Contraseña" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-envelope"></i></label> <input type="email"     name="email"       placeholder="Direccion de correo" /></div>
  
  <input type="hidden"   name="fcreacion" value="<?php echo fecha_actual(); ?>"  >
  <input type="hidden"   name="idTipoCliente" value="<?php echo $_GET['tipo_sistema']; ?>"  >
  <input type="hidden"   name="Radio" value="1"  >
  <input type="hidden"   name="Alarma" value="Si"  >

  <?php if($config_app['comport_autoactivate']==1){?>
  	<input type="hidden"   name="Estado" value="1"  >
  <?php }elseif($config_app['comport_autoactivate']==2){?>
  	<input type="hidden"   name="Estado" value="3"  >
    <input type="hidden"   name="create_pass" value="<?php echo genera_password(5)?>"  >
  <?php }?>
  
  <input type="submit"   value="Crear"  name="submit_new" >
  </form>
  </div>
  <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'].' '.$config_app['btn_cancelar_border'] ?> btn_link" href="<?php echo $location.'&return_to1='.$root_to ?>">Cancelar</a>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {?>
<div class="form <?php echo $config_app['form_color'] ?>"> 
 <form method="post">
  <h1>Inicio de sesion</h1>
  <div class="input"><label id="icon" for="name"><i class="fa fa-user"></i></label>  <input type="text"      name="usuario"   placeholder="Nombre de usuario" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-key"></i></label>   <input type="password"  name="password"  placeholder="Contraseña" /></div>
  <input type="submit"   value="Ingresar"  name="submit_login" >
  </form>
  </div>
  
<?php if ( $config_app['comport_register']=='1' ) {?> 
  <a class="<?php echo $config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_ancho'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_float'].' '.$config_app['btn_enlace_color_texto'].' '.$config_app['btn_enlace_sombra'].' '.$config_app['btn_enlace_border'] ?> btn_link" href="<?php echo $location.'&newuser=true&return_to1='.$root_to ?>">Crear Usuario</a>
<?php } ?> 
 
<?php if ( $config_app['comport_recover']=='1' ) {?>
  <a class="<?php echo $config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_ancho'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_float'].' '.$config_app['btn_enlace_color_texto'].' '.$config_app['btn_enlace_sombra'].' '.$config_app['btn_enlace_border'] ?> btn_link" href="<?php echo $location.'&recover=true&return_to1='.$root_to ?>">Recuperar contraseña</a>
<?php }?>
 
 <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'].' '.$config_app['btn_cancelar_border'] ?> btn_link" href="<?php echo $root_to.$w.$move_to ?>">Cancelar</a> 
 
<?php }?>
  

</body>
</html>