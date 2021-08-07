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
	$query = "SELECT 
	clientes_listado.idCliente, 
	clientes_listado.usuario, 
	clientes_listado.password,
	transantiago_recorridos.Nombre AS recorrido,
	clientes_listado.idRecorrido AS idrecorrido,
	transantiago_rutas.Nombre AS ruta,
	clientes_listado.idRuta AS idruta,
	clientes_listado.Orden AS orden,
	clientes_listado.PPU AS PPU
	FROM `clientes_listado` 
	LEFT JOIN `transantiago_recorridos`   ON transantiago_recorridos.idRecorrido   = clientes_listado.idRecorrido
	LEFT JOIN `transantiago_rutas`        ON transantiago_rutas.idRuta             = clientes_listado.idRuta
	WHERE usuario = '$usuario'";
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
