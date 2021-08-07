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


	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[1] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado el nombre.</p>
	</div>";
	
	//Valida el ingreso del Apellido_Paterno
	if ( empty($Apellido_Paterno) )      $errors[2] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado el apellido paterno.</p>
	</div>";
	
	//Valida el ingreso del Apellido_Materno
	if ( empty($Apellido_Materno) )      $errors[3] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado el apellido materno.</p>
	</div>";
	
	//Valida el ingreso del email
	if ( empty($email) )      $errors[4] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado el email.</p>
	</div>";
	
	//Valida el ingreso del Rut
	if ( empty($Rut) )      $errors[5] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado el Rut.</p>
	</div>";
	
	//Valida el ingreso del Sexo
	if ( empty($Sexo) )      $errors[6] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha seleccionado el Sexo.</p>
	</div>";
	
	//Valida el ingreso del fNacimiento
	if ( empty($fNacimiento) )      $errors[7] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado la fecha de nacimiento.</p>
	</div>";
	
	//Valida el ingreso del Fono1
	if ( empty($Fono1) )      $errors[8] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado un numero telefonico.</p>
	</div>";
	
	//Valida el ingreso del idCiudad
	if ( empty($idCiudad) )      $errors[9] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha seleccionado un numero una ciudad.</p>
	</div>";
	
	//Valida el ingreso del idComuna
	if ( empty($idComuna) )      $errors[10] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha seleccionado un numero una comuna.</p>
	</div>";
	
	//Valida el ingreso del Direccion
	if ( empty($Direccion) )      $errors[11] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'>No ha ingresado una direccion.</p>
	</div>";
	
	
?>