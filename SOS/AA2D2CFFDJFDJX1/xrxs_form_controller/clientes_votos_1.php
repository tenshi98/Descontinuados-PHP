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
//Validaciones de ingreso de datos obligatorios
                   
	//Valida el ingreso del Apellido_Paterno
	if ( empty($idRespuesta) )      $errors[1] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha seleccionado una respuesta.</p>
	</div>";
	
?>