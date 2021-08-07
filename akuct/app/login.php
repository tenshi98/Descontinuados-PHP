<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
/**********************************************************************************************************************************/
/*                                          Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
//require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
//$_POST = filterXSS($_POST);
//require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
//$ifilter = new InputFilter();
//$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Cargamos la ubicacion 
	$location = "mensajes.php";
	//Llamamos a las partes del formulario
	if ( !empty($_POST['usuario']) ) 	$usuario 	= $_POST['usuario'];
	if ( !empty($_GET['imei']) )	$imei 	= $_GET['imei'];
	
	$id_disp 	= $_GET['id'];
	// completamos la variable error si es necesario
	if ( empty($usuario) ) 	       $errors[1] 	  = '<h4 class="alert-error">No ha ingresado un email</h4>';
	//if ( empty($password) ) 	   $errors[2] 	  = '<h4 class="alert-error">No ha ingresado una contraseña</h4>';
	//if ( empty($id_disp) ) 	       $errors[3] 	  = '<h4 class="alert-error">El GPS aun no esta activo</h4>';
	// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])  ) { 
	//se revisan los datos en la base de datos
		$arruser = array();
		$queEmp = "SELECT login, pass, estado_usr FROM ejecutivos WHERE login='$usuario' AND imei='$imei' ";
		$resEmp = mysql_query($queEmp, $dbConn) or die(mysql_error());
		$totEmp = mysql_num_rows($resEmp);
		//si el Usuario no existe
		if($totEmp == 0){
			//$errors[1] 	  = '<h4 class="alert_error">El usuario o la contraseña son incorrectos</h4>';
			header( "Location: login.php?id=".$_GET['id']."&latitud=".$_GET['latitud']."&longitud=".$_GET['longitud']."&imei=".$_GET['imei'].'&error=true' );
			die;
		//si el usuario si existe
		}else { 
		//verifico si el usuario esta activo
		$rowusr = mysql_fetch_assoc ($resEmp);
		if($rowusr['estado_usr']==0){
			header( 'Location: activation.php?id='.$id_disp.'&login='.$usuario.'&latitud='.$_GET['latitud'].'&longitud='.$_GET['longitud'].'&imei='.$_GET['imei'] );
			die;
		}else { 
			//actualizo la identificacion del celu en la tabla de ejecutivos
			$sql = "UPDATE ejecutivos
			SET gcmcode='".$id_disp."'
			WHERE login='".$usuario."'";
			$resultado2 = mysql_query($sql,$dbConn);
			
			// si todo esta bien te redirige hacia la pagina principal
			header( 'Location: '.$location.'?id='.$id_disp );
			die;	
		}		
			
			
			
		}	
	}
}


/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="height100 widht100">
    <div class="widht80 fcenter perfil">
		<?php  if (isset($errors[1])) {echo $errors[1];}?>
        <?php  if (isset($errors[2])) {echo $errors[2];}?>  
        <?php 
		
		
		
function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}
//echo dameURL();
		
		?>
        <?php  if (isset($_GET['error'])) {
			echo '<h4 class="alert-error">El usuario o la contraseña son incorrectos</h4>';
		}
		 if (isset($_GET['create'])) {
			echo '<h4 class="alert-success">Usuario creado correctamente, ahora ingrese los datos solicitados</h4>';
		}
		 if (isset($_GET['recover'])) {
			echo '<h4 class="alert-success">La nueva contraseña fue enviada a tu correo, revisalo e ingresa con tu nueva contraseña</h4>';
		}?>    
        <h1>Iniciar Sesion</h1>
        <form method="post">
        <table class="table_msg">
          <tr><td><label>Email</label></td></tr>
          <tr><td><input type="text" name="usuario"  placeholder="Email" required="required" autocomplete="off"></td></tr>
          <!--tr><td><label>Contraseña</label></td></tr>
          <tr><td><input type="password" name="password"  placeholder="contraseña" required="required" autocomplete="off"--></td></tr>
        </table>
        <input name="submit_login" type="submit" value="Ingresar" id="post_button" />
        <!--a href="crea_usuario.php?id=<?php echo $_GET['id'].'&latitud='.$_GET['latitud'].'&longitud='.$_GET['longitud']; ?>"><input  type="button" value="Registrate" id="post_button" /></a>
        <a href="recovery.php?id=<?php echo $_GET['id'].'&latitud='.$_GET['latitud'].'&longitud='.$_GET['longitud']; ?>"><input  type="button" value="Recuperar contraseña" id="post_button" /></a-->
        </form>
    </div>
</div>
</body>
</html>