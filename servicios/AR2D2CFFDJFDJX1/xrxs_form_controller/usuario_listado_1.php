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
$usuario 	= $_POST['usuario'];
$sql_usuario = mysql_query("SELECT usuario FROM usuarios_listado WHERE usuario='".$usuario."'"); 
// se verifica si el correo ya existe
$email 	= $_POST['email'];
$sql_email = mysql_query("SELECT email FROM usuarios_listado WHERE email='".$email."'");
// completamos la variable error si es necesario

	
	if(mysql_num_rows($sql_usuario) > 0) $errors[1]  = '<span class="error">'.errores(7).'</span>';
	if ( empty($usuario) ) 	             $errors[1]  = '<span class="error">'.errores(1).'</span>';
	if ( empty($nombre) ) 	             $errors[2]  = '<span class="error">'.errores(8).'</span>';
	if ( empty($tipo) ) 	             $errors[5]  = '<span class="error">'.errores(9).'</span>';
	if ( empty($password) )              $errors[3]  = '<span class="error">'.errores(2).'</span>';
	if(mysql_num_rows($sql_email) > 0)   $errors[4]  = '<span class="error">'.errores(10).'</span>';
	if ( empty($email) )	             $errors[4]	 = '<span class="error">'.errores(3).'</span>';
	if ( $_POST['password'] != $_POST['repassword'] ) {
		                                 $errors[3]  = '<span class="error">'.errores(11).'</span>';
	}
	
?>