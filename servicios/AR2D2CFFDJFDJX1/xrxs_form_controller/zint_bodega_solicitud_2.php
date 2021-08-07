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
	if ( empty($tipo_cliente) ) 	    $errors[1] 		= '<span class="error">'.errores(57).'</span>';
	if ( empty($idCliente) ) 	        $errors[2] 		= '<span class="error">'.errores(58).'</span>';
?>