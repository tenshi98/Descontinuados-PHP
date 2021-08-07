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
	if ( empty($idSublist) ) 	    $errors[1] 		= '<span class="error">'.errores(65).'</span>';
	if ( empty($idNombre) ) 	    $errors[2] 		= '<span class="error">'.errores(66).'</span>';
?>