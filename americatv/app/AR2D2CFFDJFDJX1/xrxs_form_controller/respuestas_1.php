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

	//Validacion
	if ( empty($Respuesta) )      $errors[1] 	  = '<div class="alert-error" >No ha seleccionado una respuesta</div>';
	if ( empty($idUsuario) )      $errors[2] 	  = '<div class="alert-error" >No hay usuario</div>';
	
?>