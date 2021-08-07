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
	if ( empty($idItemcat) ) 	 $errors[1] 		= '<span class="error">'.errores(26).'</span>';
	if ( empty($Nombre) ) 	     $errors[2] 		= '<span class="error">'.errores(27).'</span>';
?>