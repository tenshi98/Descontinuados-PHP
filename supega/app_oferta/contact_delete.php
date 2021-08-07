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

//Compruebo si recibi los datos
if (isset($_POST['idCliente']) && isset($_POST['Fono']) ) {
	
    //Se crean las variables
    $idCliente  = $_POST['idCliente'];
    $Fono       = $_POST['Fono'];
    
    //se borran los datos seleccionados
	$query  = "DELETE FROM `clientes_contactos` WHERE Fono = '{$Fono}' AND idCliente = '{$idCliente}'";
	$result = mysql_query($query, $dbConn);	
    
	//busco los datos en la base de datos
	$query = "SELECT Fono
	FROM clientes_contactos 
	WHERE Fono = '{$Fono}' AND idCliente = '{$idCliente}'";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
    //Si los datos existen envio mensaje de error
    if (isset($row_data)&&$row_data!='') {
        $response["error"] = TRUE;
        $response["error_msg"] = 'El numero contacto no ha sido borrado.';
        echo json_encode($response);
    
    //Si no existe se procede a registrar
    } else {
		$response["error"] = FALSE;
		$response["error_msg"] = "Contacto borrado correctamente";
		echo json_encode($response);
        
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos (nombre, fono) inexistentes";
    echo json_encode($response);

}
    
?>
