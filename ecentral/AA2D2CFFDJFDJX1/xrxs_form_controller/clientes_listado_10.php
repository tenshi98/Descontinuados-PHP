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


//Validaciones de ingreso de datos obligatorios

	//Se verifica el ingreso de la contraseña antigua						
	if ( empty($oldpassword) )  $errors[1] 	  = '<div class="bubble">Ingrese la contraseña antigua</div>';
	if ( empty($password) )     $errors[2] 	  = '<div class="bubble">Ingrese la nueva contraseña</div>';
	if ( empty($repassword) )   $errors[3] 	  = '<div class="bubble">Ingrese la repeticion de la nueva contraseña</div>';
	
	//Se verifica si la contraseña nueva y la repeticion de esta es la misma
	if(isset( $password)&&isset($repassword) ){
		if ( $password != $repassword )      $errors[2]  = '<div class="bubble">Las contraseñas no coinciden</div>';
	}
	
	//Se verifica si la contraseña antigua es la misma que esta almacenada en la base de datos
	if(isset($oldpassword) ){
		if ( md5($oldpassword) != $arrCliente['password'] ) {
			$errors[1] = '<div class="bubble">La contrase&ntilde;a actual no coincide</div>';
		}
	}
?>