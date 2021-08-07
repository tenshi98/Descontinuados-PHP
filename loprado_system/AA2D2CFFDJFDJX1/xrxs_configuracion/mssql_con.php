<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/********************************/
/* Configuracion de la conexion */
/********************************/
function mssql_conectar ($base_datos) {
	$servidor  = '200.55.192.42';
	$usuario   = 'patentes';
	$password  = 'k34n/p46jh';
	$conection = mssql_connect($server, $usuario, $password);  
	if (!$conection) {
		//die("Algo sali&oacute; mal mientras se conectaba a la base de datos");
	} else {
		if (!mssql_select_db($base_datos, $conection)){    
			  //echo "No he podido abrir la base de datos de Patentes Comerciales";
			  exit();
		}else{
			//echo "Conexion exitosa";
			return $conection;
		}
	}
}
?>
