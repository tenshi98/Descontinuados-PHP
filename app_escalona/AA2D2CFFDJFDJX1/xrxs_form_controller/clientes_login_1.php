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
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[1]	    = '<div class="alert fcenter '.$config_app['msg_error_color_body'].' '.$config_app['msg_error_color_text'].' '.$config_app['msg_error_width'].' '.$config_app['msg_error_border'].' '.$config_app['msg_error_border_color'].'">
    <i class="fa fa-exclamation-triangle"></i>
    <p class="long_txt"> El Rut ingresado no es valido.</p>
    </div>'; 
		}
	}
	
	//Valida el ingreso del Fono
	if ( empty($Rut) )      $errors[2] 	  = '<div class="alert fcenter '.$config_app['msg_error_color_body'].' '.$config_app['msg_error_color_text'].' '.$config_app['msg_error_width'].' '.$config_app['msg_error_border'].' '.$config_app['msg_error_border_color'].'">
    <i class="fa fa-exclamation-triangle"></i>
    <p class="long_txt"> No ha ingresado el rut.</p>
    </div>';
	

	
	
		
?>