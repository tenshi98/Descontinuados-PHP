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
	if ( empty($idItemlist) ) 	  $errors[1] 		= '<span class="error">'.errores(62).'</span>';
	if ( empty($Nombre) )         $errors[2] 		= '<span class="error">'.errores(63).'</span>';
	if ( empty($idFrecuencia) )   $errors[3] 		= '<span class="error">'.errores(64).'</span>';
?>