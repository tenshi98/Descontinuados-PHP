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
	//Se verifica si el usuario existe
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
	if($n_usr > 0) $errors[4]  = '<span class="error_log">El usuario ya esta en uso</span>';
	
	//Valida si el email existe
	if($n_email > 0)   $errors[3]  = '<span class="error_log">El email ya esta en uso</span>';
	
	
	
	
	if ( empty($Nombres) ) 	       $errors[1] 	  = '<span class="error_log">No ha ingresado su nombre real</span>';
	if ( empty($Apellidos) ) 	   $errors[2] 	  = '<span class="error_log">No ha ingresado sus apellidos</span>';
	if ( empty($email) ) 	       $errors[3] 	  = '<span class="error_log">No ha ingresado un correo</span>';
	if ( empty($usuario) ) 	       $errors[4] 	  = '<span class="error_log">No ha ingresado so nombre de usuario</span>';
	if ( empty($password) ) 	       $errors[5] 	  = '<span class="error_log">No ha ingresado su contraseña</span>';
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[3]	    = '<span class="error_log">El correo ingresado no tiene el formato correcto</span>'; 
		}
	}		
?>