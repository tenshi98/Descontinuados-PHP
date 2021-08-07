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
		
		//Filtro para userid
        $a = "id='".$_GET['userid']."'" ;
		//filtro de idvideo
		if(isset($_GET['videochatid']) && $_GET['videochatid'] != ''){ 
        	$a .= ",idvideo='".$_GET['videochatid']."'" ;
        }
		//filtro de var_room
		if(isset($_GET['var_room']) && $_GET['var_room'] != ''){ 
        	$a .= ",var_room='".$_GET['var_room']."'" ;
        }
		//filtro de idchat
		if(isset($_GET['idchat']) && $_GET['idchat'] != ''){ 
        	$a .= ",idchat='".$_GET['idchat']."'" ;
        }

		// Actualizo la identificacion de video del usuario
		$query  = "UPDATE `user_listado` SET  ".$a." WHERE id = '".$_GET['userid']."'";
		$result = mysql_query($query, $dbConn);
		

	
?>