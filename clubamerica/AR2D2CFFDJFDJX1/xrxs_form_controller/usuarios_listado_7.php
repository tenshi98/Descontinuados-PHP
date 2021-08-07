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
// completamos la variable error si es necesario
	if ( empty($oldpassword) )  $errors[1] 	  = '<h4 class="alert_error">No ha ingresado la contraseña antigua</h4>';
	if ( empty($password) )     $errors[2] 	  = '<h4 class="alert_error">No ha ingresado la nueva contraseña</h4>';
	if ( empty($repassword) )   $errors[3] 	  = '<h4 class="alert_error">No ha ingresado la repeticion de la nueva contraseña</h4>';
	if(isset( $password)&&isset($repassword) ){
		if ( $password != $repassword )      $errors[3]  = '<h4 class="alert_error">Las contraseñas no coinciden</h4>';
	}
	if(isset($oldpassword) ){
		if ( md5($oldpassword) != $arrUsuario['password'] ) {
			$errors[1] = '<h4 class="alert_error">La contrase&ntilde;a actual no coincide</h4>';
		}
	}
?>