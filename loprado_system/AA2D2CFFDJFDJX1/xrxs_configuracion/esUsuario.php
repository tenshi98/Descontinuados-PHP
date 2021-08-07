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
	usuarios_listado.Rut,
	usuarios_listado.Nombre, 
	usuarios_listado.Apellido, 
	usuarios_listado.idCasChile,
	usuarios_listado.idEstado AS Estado,
	usuarios_listado.Direccion_img, 
	usuarios_listado.idSistema,
	core_sistemas.idTheme,
	core_sistemas.imgLogo,
	core_sistemas.Nombre AS RazonSocial
	
	FROM `usuarios_listado` 
	LEFT JOIN `core_sistemas` ON core_sistemas.idSistema = usuarios_listado.idSistema
	WHERE usuario = '$usuario'  ";
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
