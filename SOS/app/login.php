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
require_once 'core/mobile_components.php';
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
/*                                 Verifico si el usuario existe, si es asi me salto el login                                     */
/**********************************************************************************************************************************/
if(isset($imei)&&$imei!=''){
	//Consulto por el usuario
	$query = "SELECT usuario, password
	FROM `clientes_listado` 
	WHERE Imei = '$imei'";
	$resultado = mysql_query ($query, $dbConn);
	$row_user = mysql_fetch_array ($resultado);
	//si el usuario existe en la base de datos realizo el autologueo
	if(isset($row_user['usuario'])&&$row_user['usuario']!=''&&isset($row_user['password'])&&$row_user['password']!=''){

		// definimos las sesiones
		$_SESSION['usuario']    = $row_user['usuario'];
		$_SESSION['password']	= $row_user['password'];
										
		// si todo esta bien te redirige hacia la pagina principal
		header( 'Location: '.$root_to.$w.$move_to );
		die;
									
	}
}
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Se agrega la ubicacion
	$new_location=$root_to.$w.$move_to;
	$location.='&return_to1='.$root_to.$move_to;
	//Llamamos al formulario
	$form_obligatorios = 'usuario,password';
	$form_trabajo= 'login';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
//formulario para iniciar sesion
if ( !empty($_POST['submit_recover']) )  { 
	//Se agrega la ubicacion
	$location.='&recovery=true';
	$location.='&return_to1='.$root_to.$move_to;
	//Llamamos al formulario
	$form_obligatorios = 'email';
	$form_trabajo= 'recover_pass';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
//formulario para iniciar sesion
if ( !empty($_POST['submit_new']) )  { 
	//Se agrega la ubicacion
	if($config_app['comport_autoactivate']==1){
  		$location.='&create=true';
    }elseif($config_app['comport_autoactivate']==2){
  		$location.='&create_but=true';
    }
	$location.='&return_to1='.$root_to.$move_to;
	//Llamamos al formulario
	$form_obligatorios = 'usuario,password,repassword,Nombre,Apellido_Paterno,email,fcreacion,idTipoCliente,Radio,Alarma,Estado';
	$form_trabajo= 'create_user';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
//formulario para iniciar sesion
if ( !empty($_POST['submit_activate']) )  { 
	//Se agrega la ubicacion
	$location.='&user_active=true';
	$location.='&return_to1='.$root_to.$move_to;
	//Llamamos al formulario
	$form_obligatorios = 'create_pass,idCliente';
	$form_trabajo= 'activate_user';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
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

<?php 
//Listado de errores no manejables
if (isset($_GET['recovery'])) {     $error['usuario'] 	  = 'info/Nueva contraseña enviada correctamente.';}
if (isset($_GET['create']))  {      $error['usuario'] 	  = 'sucess/Usuario creado correctamente, ingrese con sus datos.';}
if (isset($_GET['create_but'])) {   $error['usuario'] 	  = 'sucess/Usuario creado correctamente, sin embargo debe de activar su usuario con la contraseña enviada a su correo.';}
if (isset($_GET['block'])) {        $error['usuario'] 	  = 'alert/Tu perfil esta bloqueado, contacta con el administrador del sistema.';}
if (isset($_GET['inex'])) {         $error['usuario'] 	  = 'alert/El usuario o la contraseña estan incorrectos, vuelve a intentarlo nuevamente.';}
if (isset($_GET['user_active'])) {  $error['usuario'] 	  = 'success/Su usuario ya esta activo, vuelva a ingresar sus datos para iniciar sesion.';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list_mobile($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['recover']) ) {?>
<div class="form <?php echo $config_app['form_color'] ?>"> 
	<form method="post">
		
		<?php 
		//Se verifican si existen los datos
		if(isset($create_pass)) {    $x1  = $create_pass;    }else{$x1  = '';}
			
		//se dibujan los inputs
		echo '<h1>Recuperar contraseña</h1>';
		echo '<p>Ingrese su direccion de correo y el sistema enviara su nueva contraseña</p>';
		echo form_input('email', 'Direccion de correo', 'email', $x1, 2,$config_app);
		?>

		<input type="submit"   value="Solicitar"  name="submit_recover" >
	</form>
</div>
<?php echo link_btn('cancelar',$location.'&return_to1='.$root_to,'Cancelar','',$config_app); ?> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['activate']) ) { ?>
<div class="form <?php echo $config_app['form_color'] ?>">
	<form method="post">
  
		<?php 
		//Se verifican si existen los datos
		if(isset($create_pass)) {    $x1  = $create_pass;    }else{$x1  = '';}
        if(isset($idCliente)) {      $x2  = $idCliente;      }else{$x2  = $_GET['id'];}
			
		//se dibujan los inputs
		echo '<h1>Ingresar contraseña recibida</h1>';
		echo form_input('text', 'Contraseña', 'create_pass', $x1, 2,$config_app);
		//Ocultos
		echo form_input('hidden', '', 'idCliente', $x2, 2,$config_app);	
		?>

		<input type="submit"   value="Activar"  name="submit_activate" >
	</form>
</div>
<?php echo link_btn('cancelar',$location.'&return_to1='.$root_to,'Cancelar','',$config_app); ?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['newuser']) ) { ?>
<div class="form <?php echo $config_app['form_color'] ?>">
	<form method="post">
	
		<?php 
		//Se verifican si existen los datos
		if(isset($usuario)) {             $x1  = $usuario;            }else{$x1  = '';}
        if(isset($password)) {            $x2  = $password;           }else{$x2  = '';}
		if(isset($repassword)) {          $x3  = $repassword;         }else{$x3  = '';}
		if(isset($Nombre)) {              $x4  = $Nombre;             }else{$x4  = '';}
		if(isset($Apellido_Paterno)) {    $x5  = $Apellido_Paterno;   }else{$x5  = '';}
		if(isset($Apellido_Materno)) {    $x6  = $Apellido_Materno;   }else{$x6  = '';}
		if(isset($email)) {               $x7  = $email;              }else{$x7  = '';}
		if(isset($fcreacion)) {           $x8  = $fcreacion;          }else{$x8  = fecha_actual();}
		if(isset($idTipoCliente)) {       $x9  = $idTipoCliente;      }else{$x9  = $_GET['app_conf'];}
			
		//se dibujan los inputs
		echo '<h1>Crear nuevo usuario</h1>';
		echo form_input('text', 'Nombre de usuario', 'usuario', $x1, 2,$config_app);
		echo form_input('password', 'Contraseña', 'password', $x2, 2,$config_app);
		echo form_input('password', 'Repetir Contraseña', 'repassword', $x3, 2,$config_app);
		echo form_input('text', 'Nombres', 'Nombre', $x4, 2,$config_app);
		echo form_input('text', 'Apellido Paterno', 'Apellido_Paterno', $x5, 2,$config_app);
		echo form_input('text', 'Apellido Materno', 'Apellido_Materno', $x6, 1,$config_app);
		echo form_input('email', 'Direccion de correo', 'email', $x7, 2,$config_app);
		
		//Ocultos
		echo form_input('hidden', '', 'fcreacion', $x8, 2,$config_app);
		echo form_input('hidden', '', 'idTipoCliente', $x9, 2,$config_app);
		echo form_input('hidden', '', 'Radio', 1, 2,$config_app);
		echo form_input('hidden', '', 'Alarma', 'Si', 2,$config_app);
		if($config_app['comport_autoactivate']==1){
			echo form_input('hidden', '', 'Estado', 1, 2,$config_app);
		}elseif($config_app['comport_autoactivate']==2){
			echo form_input('hidden', '', 'Estado', 3, 2,$config_app);
			echo form_input('hidden', '', 'create_pass', genera_password(5), 1,$config_app);
		}
		?>

		<input type="submit"   value="Crear"  name="submit_new" >
	</form>
</div>
<?php echo link_btn('cancelar',$location.'&return_to1='.$root_to,'Cancelar','',$config_app); ?>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {?>
<div class="form <?php echo $config_app['form_color'] ?>"> 
	<form method="post">
	
		<?php
		//Se verifican si existen los datos
		if(isset($usuario)) {     $x1  = $usuario;    }else{$x1  = '';}
        if(isset($password)) {    $x2  = $password;   }else{$x2  = '';}
			
		//se dibujan los inputs
		echo '<h1>Inicio de sesion</h1>';
		echo form_input('text', 'Nombre de usuario', 'usuario', $x1, 2,$config_app);
		echo form_input('password', 'Contraseña', 'password', $x2, 2,$config_app);
		?>
			

		<input type="submit"   value="Ingresar"  name="submit_login" >
	</form>
</div>
  
	<?php //botones condicionados
	if ( $config_app['comport_register']=='1' ) {
		echo link_btn('enlace',$location.'&newuser=true&return_to1='.$root_to,'Crear Usuario','',$config_app);
	}
	if ( $config_app['comport_recover']=='1' ) {
		echo link_btn('enlace',$location.'&recover=true&return_to1='.$root_to,'Recuperar contraseña','',$config_app);
	}
	echo link_btn('cancelar',$root_to.$w.$move_to,'Cancelar','',$config_app);
	?>
	 
<?php }?>
  

</body>
</html>
