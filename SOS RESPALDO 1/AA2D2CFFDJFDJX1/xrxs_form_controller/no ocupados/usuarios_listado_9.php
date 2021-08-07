<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// se verifica si el usuario ya existe
	// se verifica si el usuario ya existe
	$usuario 	= $_POST['usuario'];
	$sql_usuario = mysql_query("SELECT usuario FROM usuarios_listado WHERE usuario='".$usuario."' AND mode='".neomode."'"); 
	// se verifica si el correo ya existe
    $email 	= $_POST['email'];
	$sql_email = mysql_query("SELECT email FROM usuarios_listado WHERE email='".$email."' AND mode='".neomode."'");
	// completamos la variable error si es necesario
	if(mysql_num_rows($sql_usuario) > 0) $errors[1]  = '<h4 class="alert_error">El usuario ya esta en uso</h4>';
	if(mysql_num_rows($sql_email) > 0)   $errors[5]  = '<h4 class="alert_error">El email ya esta en uso</h4>';
	if ( $password <> $repassword )      $errors[3]  = '<h4 class="alert_error">Las contraseñas no coinciden</h4>';

	if ( empty($Nombre) )       $errors[2] 	  = '<h4 class="alert_error">No ha ingresado el nombre real del usuario</h4>';
	if ( empty($password) )     $errors[3] 	  = '<h4 class="alert_error">No ha ingresado la contraseña</h4>';
	if ( empty($repassword) )   $errors[4] 	  = '<h4 class="alert_error">No ha ingresado la repeticion de la contraseña</h4>';
    if ( empty($email) )        $errors[5] 	  = '<h4 class="alert_error">No ha ingresado el email del usuario</h4>';
    if ( empty($tipo) )         $errors[6] 	  = '<h4 class="alert_error">No ha seleccionado el tipo de perfil del usuario</h4>';	
	
	if(isset($email)){
		if (validaremail($email)) {   
			}else{ 
			$errors[5]	    = '<h4 class="alert_error">Ingrese un email valido</h4>'; 
		}
	}
?>