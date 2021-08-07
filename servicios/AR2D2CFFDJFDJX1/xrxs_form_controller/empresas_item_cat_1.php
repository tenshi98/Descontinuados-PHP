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
	if ( empty($nombre_cat) ) 	    $errors[1] 		= '<span class="error">'.errores(24).'</span>';
	if ( empty($nombre_Sub) ) 	    $errors[2] 		= '<span class="error">'.errores(25).'</span>';
?>