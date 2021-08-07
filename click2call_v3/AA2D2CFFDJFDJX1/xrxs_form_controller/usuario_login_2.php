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
	if ( empty($usuario) ) 	       $errors[1] 	  = '<h4 class="alert_error">No ha ingresado el nombre de usuario</h4>';
	if ( empty($password) ) 	   $errors[2] 	  = '<h4 class="alert_error">No ha ingresado una contraseña</h4>';
		
?>