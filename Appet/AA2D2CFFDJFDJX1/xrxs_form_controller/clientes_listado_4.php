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
	if ( empty($usuario) ) 	       $errors[1] 	  = '<div class="alert alert-danger" ><strong>Error</strong> No ha ingresado su nombre de usuario </div>';
	if ( empty($password) ) 	   $errors[2] 	  = '<div class="alert alert-danger" ><strong>Error</strong> No ha ingresado su password </div>';
	
?>