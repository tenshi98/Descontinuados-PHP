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
	if ( empty($idArticulo) )   $errors[1] 		= '<span class="error">'.errores(50).'</span>';
	if ( empty($Cantidad) )     $errors[2] 		= '<span class="error">'.errores(51).'</span>';
	if ( empty($Conversor) )    $errors[3] 		= '<span class="error">'.errores(78).'</span>';
?>