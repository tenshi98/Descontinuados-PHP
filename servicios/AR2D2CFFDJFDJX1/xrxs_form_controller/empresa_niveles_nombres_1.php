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
	if ( empty($idNiveles) ) 	           $errors[1] 		= '<span class="error">'.errores(23).'</span>';
	if ( empty($nombre) ) 	               $errors[2] 		= '<span class="error">'.errores(18).'</span>';
?>