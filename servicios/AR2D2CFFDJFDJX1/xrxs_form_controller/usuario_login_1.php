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
	if ( empty($usuario) ) 	       $errors[1] 	  = '<span class="error">'.errores(1).'</span>';
	if ( empty($password) ) 	   $errors[2] 	  = '<span class="error">'.errores(2).'</span>';	
?>