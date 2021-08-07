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
	if ( empty($nombre) )      $errors[1] 	  = '<span class="error">'.errores(4).'</span>';
	if ( empty($tipo) )        $errors[2] 	  = '<span class="error">'.errores(5).'</span>';
	if ( empty($direccion) )   $errors[3] 	  = '<span class="error">'.errores(6).'</span>';		
?>