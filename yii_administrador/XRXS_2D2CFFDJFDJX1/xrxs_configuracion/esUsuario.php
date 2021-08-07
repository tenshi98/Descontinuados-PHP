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
	usuarios_listado.usuario, 
	usuarios_listado.password,
	usuarios_listado.idUsuario, 
	usuarios_listado.idEstado,
	usuarios_listado.idTheme,
	core_sistemas.imgLogo,
	usuarios_listado.tipo,
	usuarios_listado.Nombre, 
	usuarios_listado.Direccion_img,
	usuarios_listado.email,	 
	usuarios_listado.idSistema,	
	core_sistemas.RazonSocial,
	core_sistemas.ex_img,
	core_sistemas.ex_mp3,
	core_sistemas.ex_videos,
	core_sistemas.ex_upload,
	core_sistemas.web_ex_img,
	core_sistemas.web_ex_mp3,
	core_sistemas.web_ex_videos,
	core_sistemas.web_ex_upload,
	core_sistemas.web_talento
	
	
	FROM `usuarios_listado` 
	LEFT JOIN `core_sistemas` ON core_sistemas.idSistema = usuarios_listado.idSistema
	WHERE usuarios_listado.usuario = '$usuario'  ";
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
