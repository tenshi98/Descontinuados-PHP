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
	if(isset($usuario)){
		$sql_usuario = mysql_query("SELECT usuario FROM clientes_listado WHERE usuario='".$usuario."'  "); 
		$n_usr = mysql_num_rows($sql_usuario);
	} else {$n_usr=0;}
	// se verifica si el correo ya existe
	if(isset($email)){
		$sql_email = mysql_query("SELECT email FROM clientes_listado WHERE email='".$email."'  ");
		$n_email = mysql_num_rows($sql_email);
	} else {$n_email=0;}
	// Valido si el usuario existe
	if($n_usr > 0) $errors[1] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> El nombre de usuario ya existe.</p>
	</div>";
	
	//Valida si el email existe
	if($n_email > 0)   $errors[2] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> El correo de ingresado ya existe.</p>
	</div>";
	
	//Valida si las contraseñas ingresadas son las mismas
	if(isset($password)&&isset($repassword)){
	if ( $password <> $repassword )      $errors[3] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> Las contraseñas no coinciden.</p>
	</div>";
	}

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($usuario) )      $errors[1] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> No ha ingresado un  nombre de usuario.</p>
	</div>";
	
	//Se valida el ingreso de la contraseña
	if ( empty($password) )     $errors[2] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> no ha ingresado una contraseña.</p>
	</div>";
	
	//Se valida el ingreso de la repeticion de la contraseña
	if ( empty($repassword) )   $errors[3] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> No ha ingresado la repeticion de la contraseña.</p>
	</div>";
	
	//Se valida el ingreso de el tipo de usuario
    if ( empty($email) )         $errors[4] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> No ha ingrsado una direccion de correo.</p>
	</div>";
	
	
	
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[4] 	  = "
	<div class='alert fcenter ".$config_app['msg_error_color_body']." ".$config_app['msg_error_color_text']." ".$config_app['msg_error_width']." ".$config_app['msg_error_border']." ".$config_app['msg_error_border_color'] ."'>
	<i class='fa fa-ban'></i>
	<p class='long_txt'><b>Error!</b> La direccion de correo ingresada no es valida.</p>
	</div>";
		}
	}
?>