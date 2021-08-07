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
	if ( empty($Nombre) )    $errors[1] 	  = '<h4 class="alert_error">No ha ingresado el nombre</h4>';
	if ( empty($email) )     $errors[2] 	  = '<h4 class="alert_error">No ha ingresado el email</h4>';
?>