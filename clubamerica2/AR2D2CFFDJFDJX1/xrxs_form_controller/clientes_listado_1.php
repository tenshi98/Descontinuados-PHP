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
if ( empty($usuario) ) 	       $errors[1] 	  = '<span class="error_log">No ha ingresado so nombre de usuario</span>';
if ( empty($password) ) 	   $errors[2] 	  = '<span class="error_log">No ha ingresado su password</span>';	
	
	
		
?>