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
list($search, $longitud, $latitud, $idCliente, $ultimo_id, $idTaxista) =   split("3xyzxyz3", $_GET['mensaje'], 6);
/**********************************************************************************************************************************/
/*                                                    Realizo las consultas                                                       */
/**********************************************************************************************************************************/
	
	//calculo de la posicion
	$var_kil         = 0.00450004500045;//equivalente de un kilometro en latitud
	$var_radio       = $search;//kilometros de radio del mensaje
	$longitud_up     = $longitud-($var_kil*$var_radio);
	$longitud_down   = $longitud+($var_kil*$var_radio);
	$latitud_up      = $latitud-($var_kil*$var_radio);
	$latitud_down    = $latitud+($var_kil*$var_radio);
	
	//Busco a los usuarios cerca en la base de datos
	//Verifico que el resultado no sea yo mismo
	$z="WHERE idCliente<>'".$idCliente."'";
	//Verifico que sea un taxista
	$z .= " AND idTipoCliente='2'" ;
	//Verifico que este activo dentro del sistema
	$z .= " AND Estado='1'" ;
	//Verifico la longitud y la latitud, si los usuarios estan dentro en ese momento
	$z .= " AND Longitud BETWEEN '".$longitud_up."' AND '".$longitud_down."'" ;
	$z .= " AND Latitud BETWEEN'".$latitud_up."' AND '".$latitud_down."'" ;
	//Se envian los mensajes solo a quienes quieren recibirlos
	$z .= " AND Alarma='Si'" ;
	//Envio los mensajes solo a quienes tengan un GSM guardado
	$z .= " AND Gsm!=''" ;
	//Realizo la consulta y obtengo un listado de taxistas	
	$arrTaxistas = array();
	$query="SELECT idCliente, Gsm, dispositivo FROM clientes_listado ".$z;
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrTaxistas,$row );
	}
	//Mensaje de solicitud de Taxi
	$msj =  'Han hecho una solicitud de Taxi cerca de ti';
	//Se envian las notificaciones a los taxistas
	foreach ($arrTaxistas as $taxista) {
		$a  = "'".$ultimo_id."'" ;
		$a .= ",'".$idCliente."'" ;
		$a .= ",'".$idTaxista."'" ;
		$a .= ",'1'";
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `solicitud_taxi_sorteo` (idSolicitud, idCliente, idTaxista, Estado) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);	
		//Envio del mensaje
			//Verifico el tipo de dispositivo
			if($rowdata['dispositivo']=='android'){
				//Envio el mensaje por android
				gcmnoti(  $taxista['Gsm'], $msj, $ultimo_id );
			} elseif($rowdata['dispositivo']=='iphone') {
				//Envio el mensaje por iphone
				iosnoti(  $taxista['Gsm'], $msj );
			}
			
	}
			
			
	
?>