<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************************************************************************************************************/
/*                                                 Se buscan los taxis a la redonda                                               */
/**********************************************************************************************************************************/
	//calculo de la posicion
	$var_kil         = 0.00450004500045;//equivalente de un kilometro en latitud
	$var_radio       = $_GET['search'];//kilometros de radio del mensaje
	$longitud_up     = $lon-($var_kil*$var_radio);
	$longitud_down   = $lon+($var_kil*$var_radio);
	$latitud_up      = $lat-($var_kil*$var_radio);
	$latitud_down    = $lat+($var_kil*$var_radio);
	
	//Busco a los usuarios cerca en la base de datos
	//Verifico que el resultado no sea yo mismo
	$z="WHERE idCliente<>'".$arrCliente['idCliente']."'";
	//Verifico que sea un taxista
	$z .= " AND idTipoCliente='2'" ;
	//Verifico que este activo dentro del sistema
	$z .= " AND Estado='1'" ;
	//Verifico la longitud y la latitud, si los usuarios estan dentro en ese momento
	//$z .= " AND Longitud BETWEEN '".$longitud_up."' AND '".$longitud_down."'" ;
	//$z .= " AND Latitud BETWEEN'".$latitud_up."' AND '".$latitud_down."'" ;
	//Se envian los mensajes solo a quienes quieren recibirlos
	//$z .= " AND Alarma='Si'" ;
	//Envio los mensajes solo a quienes tengan un GSM guardado
//	$z .= " AND Gsm!=''" ;
	//Realizo la consulta y obtengo un listado de taxistas	
	$arrTaxistas = array();
	$query="SELECT idCliente FROM clientes_listado ".$z;
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrTaxistas,$row );
	}
	//cuento el numero de registros
	$rownum = mysql_num_rows ($resultado);	
	
/**********************************************************************************************************************************/
/*                                                                Redirijo                                                        */
/**********************************************************************************************************************************/	
	
	if($rownum==0 or $rownum==''){
		//Si no encuentra un taxista, redirige a la pantalla de nueva busqueda
		header( 'Location: '.$location.'&repeat=true&idTipoAlerta='.$_GET['idTipoAlerta'] );
		die;
	}elseif($rownum=!0){
		//Se crea la solicitud
		$a = "'".$arrCliente['idCliente']."'" ;
		$a .= ",'".fecha_actual()."'" ;
		$a .= ",'".semana_actual()."'" ;
		$a .= ",'".ano_actual()."'" ;	
		$a .= ",'".hora_actual()."'" ;
		$a .= ",'".$_GET['latitud']."'" ;
		$a .= ",'".$_GET['longitud']."'" ;
		$a .= ",'38'" ;
		$query  = "INSERT INTO `solicitud_taxi_listado` (idCliente, Fecha, Semana, Ano, Hora, Cliente_Latitud, Cliente_Longitud, Estado  ) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		//recibo el último id generado por mi sesion
		$ultimo_id = mysql_insert_id($dbConn);
		//Se verifica si las tareas por servidor estan activas
		if($rowempresa['tareasServer']==1){
			//Recojo las variables
			$xy = '';
			$xy .= $_GET['search'];
			$xy .= '3xyzxyz3'.$lon;
			$xy .= '3xyzxyz3'.$lat;
			$xy .= '3xyzxyz3'.$arrCliente['idCliente'];
			$xy .= '3xyzxyz3'.$ultimo_id;
			$xy .= '3xyzxyz3'.$taxista['idCliente'];
			//Ejecutamos comando dentro del servidor
			$command = "/usr/bin/wget -N -q ".$rowempresa['UrlApp']."tareas_taxi_6.php?mensaje= '".$xy."' &";
			$fp = shell_exec($command);	
		}elseif($rowempresa['tareasServer']==2){
			//Mensaje de solicitud de Taxi
			$msj =  'Han hecho una solicitud de Taxi cerca de ti';
			//Se envian las notificaciones a los taxistas
			foreach ($arrTaxistas as $taxista) {
				$a  = "'".$ultimo_id."'" ;
				$a .= ",'".$arrCliente['idCliente']."'" ;
				$a .= ",'".$taxista['idCliente']."'" ;
				$a .= ",'1'";
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `solicitud_taxi_sorteo` (idSolicitud, idCliente, idTaxista, Estado) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);	
				//Envio del mensaje
					//Verifico el tipo de dispositivo
					if($rowdata['dispositivo']=='android'){
						//Envio el mensaje por android
						gcmnoti(  $taxista['Gsm'], $msj, $ultimo_id );
					} elseif($rowdata['dispositivo']=='iphone'){
						//Envio el mensaje por iphone
						iosnoti(  $taxista['Gsm'], $msj );
					}
			}	
		}
		
		
		
	
		//Si encuentra un taxista redirige a la pantalla con sus datos
		header( 'Location: '.$location.'&idSolicitud='.$ultimo_id.'&idTipoAlerta='.$_GET['idTipoAlerta'] );
		die;
	}
	
?>
