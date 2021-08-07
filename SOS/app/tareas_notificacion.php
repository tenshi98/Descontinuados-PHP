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
list($idTipoAlerta, $cercanos, $contactar, $idTipoContacto, $desplegar, $idCliente, $lat, $lon, $gsm, $client, $sistema) =   split("3xyzxyz3", $_GET['mensaje'], 10);

/**********************************************************************************************************************************/
/*                    Se realizan las consultas para poder construir el mensaje en caso de ser necesario                          */
/**********************************************************************************************************************************/
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
/*                                    Si esta activo el interruptor para avisar a los contactos                                   */
/**********************************************************************************************************************************/		
if($contactar==1){
	//Verifico que el resultado correspondan a mis contactos
	$z="WHERE listado_1.idCliente='".$idCliente."'";
	//Se envian los mensajes solo a quienes quieren recibirlos
	$z .= " AND clientes_listado.Alarma='Si'" ;
	//Envio los mensajes solo a quienes tengan un GSM guardado
	$z .= " AND clientes_listado.Gsm!=''" ;
	//Verifico el tipo de cliente si es que existe
	$z .= $zx;
	//Verifico el tipo de contacto
	$z .= " AND listado_1.idTipoContacto='".$idTipoContacto."'";
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

	}
	
}
	
if(isset($_GET['transreturn'])&&$_GET['transreturn']!=''){
	//Redirijo
	header( 'Location: principal.php'.$w );
	die;
}	
	
	
?>