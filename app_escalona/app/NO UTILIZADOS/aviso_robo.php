<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                        Se ejecutan los pasos para a anunciar el robo                                           */
/**********************************************************************************************************************************/
//=================================================================================================
//Se guarda el aviso de robo dentro de la base de datos
$a = "'".$arrCliente['idCliente']."'" ;
$a .= ",'".$_GET['vehiculo']."'" ;
$a .= ",'".fecha_actual()."'" ;
$a .= ",'".hora_actual()."'" ;
$a .= ",'".$lon."'" ;
$a .= ",'".$lat."'" ;
$a .= ",'".$gsm."'" ;
$query  = "INSERT INTO `clientes_robos` (idCliente, idVehiculo, Fecha, Hora, Longitud, Latitud, Gsm) VALUES ({$a} )";
$result = mysql_query($query, $dbConn);
//recibo el último id generado por mi sesion
$ultimo_id = mysql_insert_id($dbConn);
//=================================================================================================
//calculo de la posicion
$var_kil         = 0.00450004500045;//equivalente de un kilometro en latitud
$var_radio       = $arrCliente['Radio'];//kilometros de radio del mensaje
$longitud_up     = $lon-($var_kil*$var_radio);
$longitud_down   = $lon+($var_kil*$var_radio);
$latitud_up      = $lat-($var_kil*$var_radio);
$latitud_down    = $lat+($var_kil*$var_radio);
//=================================================================================================
//Verifico que el resultado no sea yo mismo
$z="WHERE idCliente<>'".$arrCliente['idCliente']."'";
//Verifico la longitud y la latitud, si los usuarios estan dentro en ese momento
$z .= "AND Longitud BETWEEN '".$longitud_up."' AND '".$longitud_down."'" ;
$z .= "AND Latitud BETWEEN'".$latitud_up."' AND '".$latitud_down."'" ;
//Se envian los mensajes solo a quienes quieren recibirlos
$z .= "AND Alarma='Si'" ;
//Envio los mensajes solo a quienes tengan un GSM guardado
$z .= "AND Gsm!=''" ;
//Realizo la consulta
$arrAviso = array();	
$query="SELECT idCliente,Gsm FROM clientes_listado ".$z;		  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrAviso,$row );
}
mysql_free_result($resultado2);
	
	//Se envian los mensajes a quienes estan cerca
	foreach ($arrAviso as $aviso) { 
		//Envio del mensaje
		$reg_id = $aviso['Gsm'];
		$message = "A ".$arrCliente['Nombre'].' le han robado su vehiculo';
		gcmnoti(  $reg_id, $message );

		//Se registra el mensaje en la tabla de mensajes
		$a = "'".$ultimo_id."'" ;
		$a .= ",'".$aviso['idCliente']."'" ;
		$a .= ",'17'" ;
		$a .= ",'".fecha_actual()."'" ;
		$a .= ",'7'" ;
		$query  = "INSERT INTO `clientes_mensaje` (idRobo, idRecibidor, Tipo, Fecha,Leida) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
	}
//=================================================================================================
//Envio las notificaciones a mis contactos personales
$arrContactos = array();	
$query ="SELECT  clientes_listado.idCliente, clientes_listado.Gsm
FROM `clientes_contacto_amigos`
INNER JOIN  `clientes_listado` ON clientes_listado.Fono2 = clientes_contacto_amigos.Fono
WHERE clientes_contacto_amigos.idCliente='{$arrCliente['idCliente']}'   ";		  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrContactos,$row );
}
mysql_free_result($resultado2);
	
	//Se envian los mensajes a quienes estan cerca
	foreach ($arrContactos as $contacto) { 
		//Envio del mensaje
		$reg_id = $contacto['Gsm'];
		$msg = "A ".$arrCliente['Nombre'].' le han robado su vehiculo';
		gcmnoti($reg_id, $msg);
		
		//Se registra el mensaje en la tabla de mensajes
		$a = "'".$ultimo_id."'" ;
		$a .= ",'".$contacto['idCliente']."'" ;
		$a .= ",'17'" ;
		$a .= ",'".fecha_actual()."'" ;
		$a .= ",'7'" ;
		$query  = "INSERT INTO `clientes_mensaje` (idRobo, idRecibidor, Tipo, Fecha,Leida) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	}	






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Robo</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<meta http-equiv="refresh" content="10;URL=principal.php<?php echo $w; ?>" />
</head>
<body>
<div class="login_body">
  <div class="form_login">
  <p>Espere mientras generamos el aviso</p>
      <div class="loader">
      	<img src="img/ajax-loader1.gif" width="100" height="100"  />
      </div>   
  </div>
</div>
</body>
</html>