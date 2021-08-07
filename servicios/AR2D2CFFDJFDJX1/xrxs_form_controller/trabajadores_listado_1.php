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
	if ( empty($Nombre) ) 	   $errors[1] 		= '<span class="error">'.errores(31).'</span>';
	if ( empty($Telefono) )    $errors[2] 		= '<span class="error">'.errores(32).'</span>';
	if ( empty($Direccion) )   $errors[3] 		= '<span class="error">'.errores(33).'</span>';
	if ( empty($Cargo) ) 	   $errors[4] 		= '<span class="error">'.errores(34).'</span>';
?>