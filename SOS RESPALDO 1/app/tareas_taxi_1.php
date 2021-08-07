<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                                      Tomo las variables                                                        */
/**********************************************************************************************************************************/
list($idTipoAlerta, $idCliente, $idTaxista, $ultimo_id) =   split("3xyzxyz3", $_GET['mensaje'], 4);
/**********************************************************************************************************************************/
/*                                                    Realizo las consultas                                                       */
/**********************************************************************************************************************************/
// Se traen todos los datos del tipo de alerta
	$query = "SELECT  Mensaje
	FROM `alertas_tipos`
	WHERE idTipoAlerta = {$idTipoAlerta}";
	$resultado = mysql_query ($query, $dbConn);
	$row_alertas = mysql_fetch_assoc ($resultado);
// Se traen todos los datos del usuario que genero la alerta
	$query = "SELECT  Nombre, Apellido_Paterno
	FROM `clientes_listado`
	WHERE idCliente = {$idCliente}";
	$resultado = mysql_query ($query, $dbConn);
	$row_clientes = mysql_fetch_assoc ($resultado);	
// Se arma el mensaje
$msj =  $row_clientes['Nombre'].' '. $row_clientes['Apellido_Paterno'].' '. $row_alertas['Mensaje'];	
/**********************************************************************************************************************************/
/*                                                        Envio el mensaje                                                        */
/**********************************************************************************************************************************/		
	//Realizo la consulta	
	$query="SELECT idCliente,Gsm, dispositivo FROM clientes_listado WHERE idCliente='{$idTaxista}'";		  
	$resultado2 = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado2);
	mysql_free_result($resultado2);

		//Envio del mensaje
		$reg_id = $rowdata['Gsm'];
		//Verifico el tipo de dispositivo
		if($rowdata['dispositivo']=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $ultimo_id );
		} else {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}
	
?>