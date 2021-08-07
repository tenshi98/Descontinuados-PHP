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
if (isset($_POST['idCliente']) ) {
	
	
	// Recibo los datos a traves de post
    $idCliente        = $_POST['idCliente'];

	//Busco los contactos del cliente con un GSM establecido
	$arrNotificaciones = array();
	$query = "SELECT
	clientes_notificaciones.mensaje,
	clientes_notificaciones.texto,
	clientes_notificaciones.Fecha AS FechaNoti,
	clientes_notificaciones.Hora AS HoraNoti,
	clientes_notificaciones.Web,
	clientes_notificaciones.room,
	clientes_notificaciones.idTipoNoti,
	clientes_notificaciones_tipo.Nombre AS tipoNoti
	FROM `clientes_notificaciones`
	LEFT JOIN clientes_notificaciones_tipo  ON clientes_notificaciones_tipo.idTipoNoti  = clientes_notificaciones.idTipoNoti
	WHERE clientes_notificaciones.idCliente = '{$idCliente}' AND clientes_notificaciones.idEstado=1 ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrNotificaciones,$row );
	}
	
	
	//verifico que efectivamente tenga contactos
	if(isset($arrNotificaciones)&&$arrNotificaciones!=''){
		
		//Marco todos los mensajes como leidos
		$query  = "UPDATE clientes_notificaciones SET idEstado = '2'	
		WHERE idCliente    = '$idCliente' AND clientes_notificaciones.idEstado=1";
		$result = mysql_query($query, $dbConn);
		
		//imprimo los datos
		$response["error"] = FALSE;
		//obtengo el listado de notificaciones del usuario
        $i=0;
        foreach ($arrNotificaciones as $noti) {
			$response["noti"][$i]["mensaje"]     = $noti["mensaje"];
			$response["noti"][$i]["texto"]       = $noti["texto"];
			$response["noti"][$i]["Fecha"]       = $noti["FechaNoti"];
			$response["noti"][$i]["Hora"]        = $noti["HoraNoti"];
			$response["noti"][$i]["Web"]         = $noti["Web"];
			$response["noti"][$i]["tipoNoti"]    = $noti["tipoNoti"];
			$response["noti"][$i]["room"]        = $noti["room"];
			$i++;
		}
		
		echo json_encode($response);
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "No hay nuevas Notificaciones";
		echo json_encode($response);
		
	}
    
    
    
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Usuario no identificado";
    echo json_encode($response);
}


?>
