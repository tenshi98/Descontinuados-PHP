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
function esUsuario ( $usuario, $password, $conexion ) {
	// verifica que esten los dos campos completos.
	if ($usuario=='' || $password=='') return false;
	
	// busqueda de los datos de usuarios para loguear.
	$query = "SELECT 
	usuarios_listado.idUsuario, 
	usuarios_listado.usuario, 
	usuarios_listado.password,
	usuarios_listado.tipo,
	usuarios_listado.email,
	usuarios_listado.Nombre, 
	usuarios_listado.Estado,
	usuarios_listado.Direccion_img, 
	usuarios_listado.idTheme, 
	usuarios_listado.idTipoCliente,
	clientes_tipos.imgLogo,
	clientes_tipos.RazonSocial
	
	
	FROM `usuarios_listado` 
	LEFT JOIN `clientes_tipos` ON clientes_tipos.idTipoCliente = usuarios_listado.idTipoCliente
	WHERE usuario = '$usuario' AND mode='".neomode."' ";
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
