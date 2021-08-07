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
	if ( empty($idFrecuencia) ) 	 $errors[1] 		= '<span class="error">'.errores(75).'</span>';
	if ( empty($valor) ) 	         $errors[2] 		= '<span class="error">'.errores(76).'</span>';

?>