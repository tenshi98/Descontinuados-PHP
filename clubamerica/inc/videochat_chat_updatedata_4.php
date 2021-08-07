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
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/config3.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();

		//Hora actual
		function hora_actual(){
			// Establecer la zona horaria predeterminada a usar.
			date_default_timezone_set('UTC');
			//Imprimimos la fecha actual dandole un formato
			$hora_actual = date("H:i:s");
			return $hora_actual; 
		}
		
		//consulta
		$idChat          = "'".$_GET['id']."'" ;
		$nombre_usuario  = "'".str_replace("_espaciador_"," ",$_GET['nombre_usuario'])."'" ;
		$url_img         = "'".$_GET['avatar_img']."'" ;
		$sala            = "'".str_replace("_"," ",$_GET['name_room'])."'" ;
		$hora            = "'".hora_actual()."'" ;
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `chat_temp` (idChat, Nombre, url_img, sala, hora) VALUES ({$idChat}, {$nombre_usuario}, {$url_img}, {$sala}, {$hora} )";
		$result = mysql_query($query, $dbConn);


	
?>