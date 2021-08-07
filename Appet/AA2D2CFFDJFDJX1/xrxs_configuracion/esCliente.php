<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/* Verificacion del usuario       */
/**********************************/
function esCliente ( $usuario, $password, $conexion ) {
	// verifica que esten los dos campos completos.
	if ($usuario=='' || $password=='') return false;
	
	// busqueda de los datos de usuarios para loguear.
	$query = "SELECT idCliente, usuario, password,email,Nombres, Estado, Rut FROM `clientes_listado` WHERE usuario = '$usuario'";
	$resultado = mysql_query ($query, $conexion);
	$row = mysql_fetch_array ($resultado);
	$password_from_db = $row ['password'];
	unset($query);
			
	// verifica que el pass enviado sea igual al pass de la db.
	if ( $password_from_db == $password ) {
		return $row;
	} else return false;
	
	
}

?>
