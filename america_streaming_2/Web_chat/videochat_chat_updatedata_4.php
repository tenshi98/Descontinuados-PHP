<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';

// obtengo puntero de conexion con la db
$dbConn = conectar();

		$idChat          = "'".$_GET['id']."'" ;
		$nombre_usuario  = "'".$_GET['nombre_usuario']."'" ;
		$url_img         = "".$_GET['url']."" ;
		$sala            = "".$_GET['name']."" ;
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `chat_temp` (idChat, Nombre, url_img, sala) VALUES ({$idChat}, {$nombre_usuario}, {$url_img}, {$sala} )";
		$result = mysql_query($query, $dbConn);

	
?>