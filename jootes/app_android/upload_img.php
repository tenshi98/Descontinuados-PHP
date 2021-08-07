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

if($_SERVER['REQUEST_METHOD']=='POST'){
 
	$originalFile  = $_POST['image'];
	$outputFile    = $_POST['name'];
	$idCliente     = $_POST['idCliente'];

	$path = "upload/$outputFile.jpeg";
	$actualpath = "http://190.98.210.36/jootes/app_android/$path";
	file_put_contents($path,base64_decode($originalFile));
	
	//actualizo el nombre de la imagen
	$a .= "img='".$outputFile."'" ;
	$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
	$result = mysql_query($query, $dbConn);

	
	$response["error"] = FALSE;
	echo json_encode($response);

 }else{
	$response["error"] = TRUE;
	echo json_encode($response);
 }
 
 



?>
