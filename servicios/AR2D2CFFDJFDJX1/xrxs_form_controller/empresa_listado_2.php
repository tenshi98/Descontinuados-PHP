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
	if ( empty($Nombre) ) 	               $errors[1] 		= '<span class="error">'.errores(13).'</span>';
	if ( empty($Abreviatura) ) 	           $errors[2]       = '<span class="error">'.errores(14).'</span>';
	if ( empty($email) )	               $errors[3]	    = '<span class="error">'.errores(15).'</span>';
	if ( empty($Rut) ) 	                   $errors[4]	    = '<span class="error">'.errores(16).'</span>';
?>