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
	if ( empty($idItemlist) ) 	    $errors[1] 		= '<span class="error">'.errores(35).'</span>';
	if ( empty($f_Inicio) ) 	    $errors[2] 		= '<span class="error">'.errores(36).'</span>';
	if ( empty($n_Doc) ) 	        $errors[3] 		= '<span class="error">'.errores(37).'</span>';
?>