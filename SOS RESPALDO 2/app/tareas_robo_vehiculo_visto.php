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
/*                                    Se toma la alerta y se guarda en la base de datos                                           */
/**********************************************************************************************************************************/
//Separo la variable en las variables que inicialmente envie
list($idCliente, $idRobo, $latitud, $longitud, $idAsaltado) =   split("3xyzxyz3", $_GET['mensaje'], 5);
//Se guarda el aviso de robo dentro de la base de datos
$a = "'".$idRobo."'" ;
$a .= ",'".$idCliente."'" ;
$a .= ",'".fecha_actual()."'" ;
$a .= ",'".hora_actual()."'" ;
$a .= ",'".$longitud."'" ;
$a .= ",'".$latitud."'" ;
$query  = "INSERT INTO `robos_listado_avistados` (idRobo, idCliente, Fecha, Hora, Longitud, Latitud) VALUES ({$a} )";
$result = mysql_query($query, $dbConn);
//recibo el último id generado por mi sesion
$ultimo_id = mysql_insert_id($dbConn);
/**********************************************************************************************************************************/
/*                    Se realizan las consultas para poder construir el mensaje en caso de ser necesario                          */
/**********************************************************************************************************************************/
// Se traen todos los datos del usuario que genero la alerta
	$query = "SELECT  Nombre, Apellido_Paterno, idTipoCliente
	FROM `clientes_listado`
	WHERE idCliente = {$idCliente}";
	$resultado = mysql_query ($query, $dbConn);
	$row_clientes = mysql_fetch_assoc ($resultado);	
// Se traen todos los datos del usuario que genero la alerta
	$query = "SELECT  Gsm, dispositivo
	FROM `clientes_listado`
	WHERE idCliente = {$idAsaltado}";
	$resultado = mysql_query ($query, $dbConn);
	$row_asaltado = mysql_fetch_assoc ($resultado);			
// Se arma el mensaje
$msj =  $row_clientes['Nombre'].' '. $row_clientes['Apellido_Paterno'].' ha avistado tu vehiculo';	
/**********************************************************************************************************************************/
/*                                                  Se envia el mensaje                                                           */
/**********************************************************************************************************************************/
		$reg_id = $row_asaltado['Gsm'];
		//Verifico el tipo de dispositivo
		if($row_asaltado['dispositivo']=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $ultimo_id );
		} else {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}

	
?>