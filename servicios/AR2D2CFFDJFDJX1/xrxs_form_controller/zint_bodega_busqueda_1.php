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
	if ( empty($fecha_desde) ) 	    $errors[1] 		= '<span class="error">'.errores(59).'</span>';
	if ( empty($fecha_hasta) ) 	    $errors[2] 		= '<span class="error">'.errores(60).'</span>';
?>