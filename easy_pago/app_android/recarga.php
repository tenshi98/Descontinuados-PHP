<?php
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/app_functions.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                                        Aplicacion                                                              */
/**********************************************************************************************************************************/    
// variable de error activa
$response = array("error" => TRUE);

	//Se toman en cuenta todos los datos
	if ( !empty($_POST['idCliente']) )        $idCliente          = $_POST['idCliente'];

	
	

	
	//Si no hay errores actualizo los datos
	if ( empty($errors)) {

		//Selecciono datos del usuario
		$query = "SELECT Saldo
		FROM clientes_listado 
		WHERE idCliente = '$idCliente'";
		$resultado = mysql_query ($query, $dbConn);
		$row_data = mysql_fetch_assoc ($resultado);

		
		$response["error"] = FALSE;
		$response["Saldo"] = $row_data["Saldo"];
		echo json_encode($response);
		
	//Si hay errores los muestro por pantalla			
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "No se ha podido actualizar la informacion";
		echo json_encode($response);
	
	}





?>
