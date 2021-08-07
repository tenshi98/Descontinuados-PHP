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
	if ( empty($costo) ) 	    $errors[1] 		= '<span class="error">'.errores(73).'</span>';
	if ( empty($Texto) ) 	    $errors[2] 		= '<span class="error">'.errores(74).'</span>';
?>