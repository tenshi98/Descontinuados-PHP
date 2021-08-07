<?php    
include "server.php";  
try {
	// Se leen los parametros entregados
	if(isset($_GET["client_cell_number"])&&$_GET["client_cell_number"]!=''){ $Phone   = $_GET["client_cell_number"]; }else{$Phone ='';}
	if(isset($_GET["aaazu_voucher_type"])&&$_GET["aaazu_voucher_type"]!=''){ $Voucher = $_GET["aaazu_voucher_type"]; }else{$Voucher ='';}
	if(isset($_GET["denomination"])&&$_GET["denomination"]!=''){             $Dem     = $_GET["denomination"];       }else{$Dem ='';}
	
	//Se llama a la funcion
	$result = SearchClient($Phone);
	$response["result"] = $result;
	echo json_encode($response);
} catch(SoapFault $ex) {
	
	$response["result"] = $ex->getMessage();
	echo json_encode($response);
} 
?> 
