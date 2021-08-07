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
	if ( empty($Valorizacion) )    	$errors[1] 	  = '<span class="error">'.errores(79).'</span>';
	if ( empty($Gastos_gen) )    	$errors[2] 	  = '<span class="error">'.errores(80).'</span>';
?>