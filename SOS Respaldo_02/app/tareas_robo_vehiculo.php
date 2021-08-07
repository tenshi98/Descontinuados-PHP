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
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
/**********************************************************************************************************************************/
/*                                    Se toma la alerta y se guarda en la base de datos                                           */
/**********************************************************************************************************************************/
//Separo la variable en las variables que inicialmente envie
list($idTipoAlerta, $cercanos, $contactar, $desplegar, $idCliente, $lat, $lon, $gsm, $client, $idVehiculo, $sistema) =   split("3xyzxyz3", $_GET['mensaje'], 11);
//Se guarda el aviso de robo dentro de la base de datos
$a = "'".$idCliente."'" ;
$a .= ",'".$idTipoAlerta."'" ;
$a .= ",'".$idVehiculo."'" ;
$a .= ",'".fecha_actual()."'" ;
$a .= ",'".hora_actual()."'" ;
$a .= ",'".$lon."'" ;
$a .= ",'".$lat."'" ;
$a .= ",'".$gsm."'" ;
$a .= ",'".$desplegar."'" ;
$query  = "INSERT INTO `robos_listado` (idCliente, idTipoAlerta, idVehiculo, Fecha, Hora, Longitud, Latitud, Gsm, desplegar) VALUES ({$a} )";
$result = mysql_query($query, $dbConn);
//recibo el último id generado por mi sesion
$ultimo_id = mysql_insert_id($dbConn);
/**********************************************************************************************************************************/
/*                    Se realizan las consultas para poder construir el mensaje en caso de ser necesario                          */
/**********************************************************************************************************************************/
// Se trae el alcance de kilometros
	$query = "SELECT  comport_alcance
	FROM `clientes_tipos`
	WHERE idTipoCliente = {$sistema}";
	$resultado = mysql_query ($query, $dbConn);
	$row_alcance = mysql_fetch_assoc ($resultado);
// Se traen todos los datos del tipo de alerta
	$query = "SELECT  Mensaje
	FROM `alertas_tipos`
	WHERE idTipoAlerta = {$idTipoAlerta}";
	$resultado = mysql_query ($query, $dbConn);
	$row_alertas = mysql_fetch_assoc ($resultado);
// Se traen todos los datos del usuario que genero la alerta
	$query = "SELECT  Nombre, Apellido_Paterno, idTipoCliente
	FROM `clientes_listado`
	WHERE idCliente = {$idCliente}";
	$resultado = mysql_query ($query, $dbConn);
	$row_clientes = mysql_fetch_assoc ($resultado);	
// Se arma el mensaje
$msj =  $row_clientes['Nombre'].' '. $row_clientes['Apellido_Paterno'].' '. $row_alertas['Mensaje'];	
//Se define el tipo de clientes a enviar las notificaciones, si es a todos o solo al mismo tipo de clientes
if($client==1){
	$zx = " AND idTipoCliente='".$row_clientes['idTipoCliente']."'" ;
}else{
	$zx = "" ;
}
/**********************************************************************************************************************************/
/*                                  Si esta activo el interruptor para avisar a las personas cerca                                */
/**********************************************************************************************************************************/		
if($cercanos==1){
	//calculo de la posicion
	$var_kil         = 0.00450004500045;//equivalente de un kilometro en latitud
	$var_radio       = $row_alcance['comport_alcance'];//kilometros de radio del mensaje
	$longitud_up     = $lon-($var_kil*$var_radio);
	$longitud_down   = $lon+($var_kil*$var_radio);
	$latitud_up      = $lat-($var_kil*$var_radio);
	$latitud_down    = $lat+($var_kil*$var_radio);
	
	//Busco a los usuarios cerca en la base de datos
	//Verifico que el resultado no sea yo mismo
	$z="WHERE idCliente<>'".$idCliente."'";
	//Verifico la longitud y la latitud, si los usuarios estan dentro en ese momento
	$z .= " AND Longitud BETWEEN '".$longitud_up."' AND '".$longitud_down."'" ;
	$z .= " AND Latitud BETWEEN'".$latitud_up."' AND '".$latitud_down."'" ;
	//Se envian los mensajes solo a quienes quieren recibirlos
	$z .= " AND Alarma='Si'" ;
	//Envio los mensajes solo a quienes tengan un GSM guardado
	$z .= " AND Gsm!=''" ;
	//Verifico el tipo de cliente si es que existe
	$z .= $zx;
	//Realizo la consulta
	$arrAviso = array();	
	$query="SELECT idCliente,Gsm, dispositivo FROM clientes_listado ".$z;		  
	$resultado2 = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado2)) {
	array_push( $arrAviso,$row );
	}
	mysql_free_result($resultado2);
	

	//Se envian los mensajes a quienes estan cerca
	foreach ($arrAviso as $aviso) { 

		//Envio del mensaje
		$reg_id = $aviso['Gsm'];
		//Verifico el tipo de dispositivo
		if($aviso['dispositivo']=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $ultimo_id );
		} elseif($aviso['dispositivo']=='iphone') {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}

		//Se registra el mensaje en la tabla de mensajes
		$a = "'".$ultimo_id."'" ;
		$a .= ",'".$aviso['idCliente']."'" ;
		$a .= ",'".$msj."'" ;
		$a .= ",'".fecha_actual()."'" ;
		$a .= ",'7'" ;
		$a .= ",'".$idVehiculo."'" ;
		$a .= ",'".$idCliente."'" ;
		$a .= ",'".$idTipoAlerta."'" ;
		$query  = "INSERT INTO `clientes_notificaciones` (idAlerta, idRecibidor, mensaje, Fecha, Leida, idVehiculo, idCliente,idTipoAlerta) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
	}

	
}
/**********************************************************************************************************************************/
/*                                    Si esta activo el interruptor para avisar a los contactos                                   */
/**********************************************************************************************************************************/		
if($contactar==1){
	//Verifico que el resultado no sea yo mismo
	$z="WHERE listado_1.idCliente='".$idCliente."'";
	//Se envian los mensajes solo a quienes quieren recibirlos
	$z .= " AND clientes_listado.Alarma='Si'" ;
	//Envio los mensajes solo a quienes tengan un GSM guardado
	$z .= " AND clientes_listado.Gsm!=''" ;
	//Verifico el tipo de cliente si es que existe
	$z .= $zx;
	//Realizo la consulta
	$arrAviso = array();	
	$query="SELECT
	clientes_listado.idCliente,
	clientes_listado.Gsm,
	clientes_listado.dispositivo
	FROM
	clientes_listado 
	LEFT JOIN  clientes_contacto_amigos listado_1 on listado_1.Fono = clientes_listado.Fono1
	LEFT JOIN  clientes_contacto_amigos listado_2 on listado_2.Fono = clientes_listado.Fono2 
	".$z;		  
	$resultado2 = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado2)) {
	array_push( $arrAviso,$row );
	}
	mysql_free_result($resultado2);	
	//Se envian los mensajes a quienes estan cerca
	foreach ($arrAviso as $aviso) { 

		//Envio del mensaje
		$reg_id = $aviso['Gsm'];
		//Verifico el tipo de dispositivo
		if($aviso['dispositivo']=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $ultimo_id );
		} elseif($aviso['dispositivo']=='iphone') {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}

		//Se registra el mensaje en la tabla de mensajes
		$a = "'".$ultimo_id."'" ;
		$a .= ",'".$aviso['idCliente']."'" ;
		$a .= ",'".$msj."'" ;
		$a .= ",'".fecha_actual()."'" ;
		$a .= ",'7'" ;
		$a .= ",'".$idVehiculo."'" ;
		$a .= ",'".$idCliente."'" ;
		$a .= ",'".$idTipoAlerta."'" ;
		$query  = "INSERT INTO `clientes_notificaciones` (idAlerta, idRecibidor, mensaje, Fecha, Leida, idVehiculo, idCliente,idTipoAlerta) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
	}
	
}

if(isset($_GET['transreturn'])&&$_GET['transreturn']!=''){
	//Redirijo
	header( 'Location: principal.php'.$w );
	die;
}
	
?>