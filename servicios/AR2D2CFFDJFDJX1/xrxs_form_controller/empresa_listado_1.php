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
	$usuario 	= $_POST['nombre'];
	$sql_usuario = mysql_query("SELECT Nombre FROM empresas_listado WHERE Nombre='".$usuario."'"); 
	// completamos la variable error si es necesario
	if(mysql_num_rows($sql_usuario) > 0)   $errors[1] 		= '<span class="error">'.errores(12).'</span>';
	if ( empty($nombre) ) 	               $errors[1] 		= '<span class="error">'.errores(13).'</span>';
	if ( empty($abreviatura) ) 	           $errors[2]       = '<span class="error">'.errores(14).'</span>';
	if ( empty($email) )	               $errors[3]	    = '<span class="error">'.errores(15).'</span>';	
?>