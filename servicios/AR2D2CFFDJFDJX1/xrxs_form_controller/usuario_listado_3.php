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
	if ( empty($usuario) ) 	  $errors[1]    = '<span class="error">'.errores(1).'</span>';
	if ( empty($nombre) ) 	  $errors[2]    = '<span class="error">'.errores(8).'</span>';
	if ( empty($rut) ) 	      $errors[3]    = '<span class="error">'.errores(20).'</span>';
	if ( empty($comuna) ) 	  $errors[4]    = '<span class="error">'.errores(21).'</span>';
	if ( empty($direccion) )  $errors[5]    = '<span class="error">'.errores(22).'</span>';
	if ( empty($email) )      $errors[6]    = '<span class="error">'.errores(3).'</span>';	
?>