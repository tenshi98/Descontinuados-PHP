<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************************************************************************************************************/
/*                                   Se toma la solicitud y se guarda en la base de datos                                         */
/**********************************************************************************************************************************/
$a = "'".$arrCliente['idCliente']."'" ;
$a .= ",'".$_GET['confirm']."'" ;
$a .= ",'".fecha_actual()."'" ;
$a .= ",'".hora_actual()."'" ;
$a .= ",'".$_GET['latitud']."'" ;
$a .= ",'".$_GET['longitud']."'" ;
$a .= ",'".$_GET['lat_tax']."'" ;
$a .= ",'".$_GET['long_tax']."'" ;
$a .= ",'38'" ;
$a .= ",'36'" ;
$query  = "INSERT INTO `solicitud_taxi_listado` (idCliente, idTaxista, Fecha, Hora, Cliente_Latitud, Cliente_Longitud, Taxista_Latitud, Taxista_Longitud, Estado, taxista_vista  ) VALUES ({$a} )";
$result = mysql_query($query, $dbConn);
//recibo el último id generado por mi sesion
$ultimo_id = mysql_insert_id($dbConn);
/**********************************************************************************************************************************/
/*                                                 Se le encarga la tarea al servidor                                             */
/**********************************************************************************************************************************/

		//Recojo las variables
		$xy = '';
		$xy .= $_GET['idTipoAlerta'];
		$xy .= '3xyzxyz3'.$arrCliente['idCliente'];
		$xy .= '3xyzxyz3'.$_GET['confirm'];
		$xy .= '3xyzxyz3'.$ultimo_id;

		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_taxi_1.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
echo 'BORRAME Y ACTIVA CONSULTAS POR SERVER';
echo '===========================================================================================================================';
		
// Se traen todos los datos del tipo de alerta
	$query = "SELECT  Mensaje
	FROM `alertas_tipos`
	WHERE idTipoAlerta = {$_GET['idTipoAlerta']}";
	$resultado = mysql_query ($query, $dbConn);
	$row_alertas = mysql_fetch_assoc ($resultado);
// Se traen todos los datos del usuario que genero la alerta
	$query = "SELECT  Nombre, Apellido_Paterno
	FROM `clientes_listado`
	WHERE idCliente = {$arrCliente['idCliente']}";
	$resultado = mysql_query ($query, $dbConn);
	$row_clientes = mysql_fetch_assoc ($resultado);	
// Se arma el mensaje
$msj =  $row_clientes['Nombre'].' '. $row_clientes['Apellido_Paterno'].' '. $row_alertas['Mensaje'];	
/**********************************************************************************************************************************/
/*                                  Si esta activo el interruptor para avisar a las personas cerca                                */
/**********************************************************************************************************************************/		
	//Busco los datos del taxista
	$z="WHERE idCliente='".$_GET['confirm']."'";
	//Realizo la consulta	
	$query="SELECT idCliente,Gsm, dispositivo FROM clientes_listado ".$z;		  
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
echo '===========================================================================================================================';		
		
		
		
		
		
		//Redirijo a la pagina de espera de respuesta
		header( 'Location: '.$location.'&idSolicitud='.$ultimo_id.'&idTipoAlerta='.$_GET['idTipoAlerta'] );
		die;
	
?>