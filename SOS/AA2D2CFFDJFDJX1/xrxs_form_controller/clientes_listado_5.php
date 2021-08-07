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
// se verifica si el usuario ya existe

//Se validan si existe el usuario o el email asociado de este en la base de datos
	//Se verifica si el dato existe
	if(isset($create_pass)){
		$sql_usuario = mysql_query("SELECT create_pass FROM clientes_listado WHERE create_pass='".$create_pass."'  "); 
		$n_usr = mysql_num_rows($sql_usuario);
	} else {$n_usr=0;}
	// Valido si el usuario existe
	if($n_usr == 0) $errors[1] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> La contraseña no coincide con la almacenada.</p>
	</div>";
	
	
//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del la contraseña
	if ( empty($create_pass) )      $errors[2] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> No ha ingresado un  la contraseña.</p>
	</div>";
	
	
?>