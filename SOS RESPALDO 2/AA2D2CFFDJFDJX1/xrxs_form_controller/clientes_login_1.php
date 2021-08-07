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
	if ( empty($usuario) ) 	           $errors[1] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> No ha ingresado su nombre de usuario.</p>
	</div>";
	
	if ( empty($password) ) 	           $errors[2] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> No ha ingresado su contraseña.</p>
	</div>";
	

	
	
		
?>