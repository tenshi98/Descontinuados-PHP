<?php   
//Se llama a la libreria necesaria   
include "lib/nusoap.php"; //Soap Library.
//se ejecuta codigo
try {
	// Inicio del servicio, con la ubicacion de los archivos
	$client = new soapclient(null, array(
	'location' => "http://rdigital.naturalphone.com.pe/server.php",
	'uri' => "http://rdigital.naturalphone.com.pe"));
	
	// Se leen los parametros entregados
	if(isset($_POST["cell_number"])&&$_POST["cell_number"]!=''){ $Phone   = $_POST["cell_number"]; }else{$Phone ='';}
	
	//Si todos los datos solicitados existen
	if ($Phone!='') {
		$result = $client->SearchClient($Phone);
		$response["result"] = $result;
	//si no existen se despliega mensaje de error
	}else{
		$response["result"] = 'No ha ingresado todos los datos';
	}
	//se imprimen las variables
	echo json_encode($response);
	
} catch(SoapFault $ex) {
	
	$response["result"] = $ex->getMessage();
	echo json_encode($response);
} 
?> 
