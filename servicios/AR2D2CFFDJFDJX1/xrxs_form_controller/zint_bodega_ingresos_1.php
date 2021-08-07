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
	if ( empty($Valor) )        $errors[3] 		= '<span class="error">'.errores(52).'</span>';
	if ( empty($Procedencia) )  $errors[4] 		= '<span class="error">'.errores(53).'</span>';
	if ( empty($Tipo_doc) )     $errors[5] 		= '<span class="error">'.errores(54).'</span>';
	if ( empty($N_doc) )        $errors[6] 		= '<span class="error">'.errores(55).'</span>';
?>