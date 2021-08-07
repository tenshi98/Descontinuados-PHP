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
	clientes_notificaciones.Fecha AS FechaNoti,
	clientes_notificaciones.Hora AS HoraNoti,
	alertas_listado.Longitud AS LonNoti,
	alertas_listado.Latitud AS LatNoti,
	alertas_subtipo.Nombre AS TipoAlerta,
	clientes_notificaciones.Fono AS FonoNoti,
	clientes_notificaciones.idTipoAlerta,
	clientes_notificaciones.Texto,
	clientes_notificaciones.Web,
	clientes_notificaciones.idAlerta
	
	
	FROM `clientes_notificaciones`
	LEFT JOIN alertas_subtipo  ON alertas_subtipo.idSubTipoAlerta  = clientes_notificaciones.idSubTipoAlerta
	LEFT JOIN alertas_listado  ON alertas_listado.idAlerta         = clientes_notificaciones.idAlerta
	WHERE clientes_notificaciones.idCliente = '{$idCliente}' AND clientes_notificaciones.idEstado=1 ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrNotificaciones,$row );
	}
	
	
	//verifico que efectivamente tenga contactos
	if(isset($arrNotificaciones)&&$arrNotificaciones!=''){
		
		//Marco todos los mensajes como leidos
		$query  = "UPDATE clientes_notificaciones SET idEstado = '2'	
		WHERE idCliente    = '$idCliente'";
		$result = mysql_query($query, $dbConn);
		
		//imprimo los datos
		$response["error"] = FALSE;
		//obtengo el listado de notificaciones del usuario
        $i=0;
        foreach ($arrNotificaciones as $noti) {
			$response["noti"][$i]["fecha"]      = $noti["FechaNoti"];
			$response["noti"][$i]["hora"]       = $noti["HoraNoti"];
			$response["noti"][$i]["longitud"]   = $noti["LonNoti"];
			$response["noti"][$i]["latitud"]    = $noti["LatNoti"];
			$response["noti"][$i]["tipo"]       = $noti["TipoAlerta"];
			$response["noti"][$i]["fono"]       = $noti["FonoNoti"];
			$response["noti"][$i]["idtipo"]     = $noti["idTipoAlerta"];
			$response["noti"][$i]["texto"]      = $noti["Texto"];
			$response["noti"][$i]["web"]        = $noti["Web"];
			$response["noti"][$i]["idAlerta"]   = $noti["idAlerta"];
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
