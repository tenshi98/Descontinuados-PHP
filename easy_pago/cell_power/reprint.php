<?php    
include "server.php"; 
try {
	// Se leen los parametros entregados
	if(isset($_GET["cellpower_id"])&&$_GET["cellpower_id"]!=''){ $Cellid   = $_GET["cellpower_id"]; }else{$Cellid ='';}
	
	//Se llama a la funcion
	$result = Reprint($Cellid);
	
	if(isset($response["result"])){
		$response["result"]       = $result["result"];
		$response["puntodeventa"] = $result["puntodeventa"];
		$response["Monto"]        = $result["Monto"];
		$response["Fecha"]        = $result["Fecha"];
		$response["idPin"]        = $result["idPin"];
	}else{
		$response  = $result;
	}

	echo json_encode($response);
} catch(SoapFault $ex) {
	
	$response["result"] = $ex->getMessage();
	echo json_encode($response);
} 
?> 
