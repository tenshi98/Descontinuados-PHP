<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                                  Funciones                                                      */
/*******************************************************************************************************************/
//Agrega un separador de valores
function Cantidades_cd($valor){	

 return number_format($valor,3,',','.');

}
/*******************************************************************************************************************/
//Agrega un separador de valores
function Cantidades_sd($valor){	

 return number_format($valor,0,',','.');

}
/*******************************************************************************************************************/
//reduce la cantidad de caracteres
function cortar($texto, $cuantos)
{
  if (strlen($texto) <= $cuantos) return $texto;
  return substr($texto, 0, $cuantos) . '...';
}
/*******************************************************************************************************************/
// Muestra la fecha completa en el navegador
function Fecha_completa($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$dia = $mes_c->format('d');
$me = $mes_c->format('m');
$agno = $mes_c->format('Y');
$mes='';
if($me=='01') $mes='enero';
if($me=='02') $mes='febrero';
if($me=='03') $mes='marzo';
if($me=='04') $mes='abril';
if($me=='05') $mes='mayo';
if($me=='06') $mes='junio';
if($me=='07') $mes='julio';
if($me=='08') $mes='agosto';
if($me=='09') $mes='septiembre';
if($me=='10') $mes='octubre';
if($me=='11') $mes='noviembre';
if($me=='12') $mes='diciembre';
$cadena = ("$mes ") ;
$cadena .=  ("$dia del ");
$cadena .= ("$agno");
return $cadena;
}
/*******************************************************************************************************************/
// Muestra la fecha completa en el navegador
function Fecha_completa_alt($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$dia = $mes_c->format('d');
$me = $mes_c->format('m');
$agno = $mes_c->format('Y');
$mes='';
if($me=='01') $mes='enero';
if($me=='02') $mes='febrero';
if($me=='03') $mes='marzo';
if($me=='04') $mes='abril';
if($me=='05') $mes='mayo';
if($me=='06') $mes='junio';
if($me=='07') $mes='julio';
if($me=='08') $mes='agosto';
if($me=='09') $mes='septiembre';
if($me=='10') $mes='octubre';
if($me=='11') $mes='noviembre';
if($me=='12') $mes='diciembre';
$cadena = ("$dia de ");
$cadena .=  ("$mes de ");
$cadena .= ("$agno");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra el dia en el navegador
function Fecha_dia($Ingresodia){	
$dia1 = new DateTime($Ingresodia);
$dia = $dia1->format('d');
$cadena =  ("$dia");
return $cadena;
}
/*******************************************************************************************************************/
// Muestra la fecha completa en el navegador
function Fecha_estandar($IngresoFecha){	
$date = date_create($IngresoFecha);
return date_format($date, 'd-m-Y');
}
/*******************************************************************************************************************/
//Muestra el mes completo en el navegador
function Fecha_mes($Ingresomes){	
$mes_mes = new DateTime($Ingresomes);
$me = $mes_mes->format('m');
$mes='';
if($me=='01') $mes='Enero';
if($me=='02') $mes='Febrero';
if($me=='03') $mes='Marzo';
if($me=='04') $mes='Abril';
if($me=='05') $mes='Mayo';
if($me=='06') $mes='Junio';
if($me=='07') $mes='Julio';
if($me=='08') $mes='Agosto';
if($me=='09') $mes='Septiembre';
if($me=='10') $mes='Octubre';
if($me=='11') $mes='Noviembre';
if($me=='12') $mes='Diciembre';
$cadena = ("$mes");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra solo las primeras 3 letras del mes en el navegador
function Fecha_mes_c($Ingresomes_c){	
$mes_mes_c = new DateTime($Ingresomes_c);
$me = $mes_mes_c->format('m');
$mes='';
if($me=='01') $mes='Ene';
if($me=='02') $mes='Feb';
if($me=='03') $mes='Mar';
if($me=='04') $mes='Abr';
if($me=='05') $mes='May';
if($me=='06') $mes='Jun';
if($me=='07') $mes='Jul';
if($me=='08') $mes='Ago';
if($me=='09') $mes='Sep';
if($me=='10') $mes='Oct';
if($me=='11') $mes='Nov';
if($me=='12') $mes='Dic';
$cadena = ("$mes");
return $cadena;
}
/*******************************************************************************************************************/
// Muestra el mes segido del año designado
function Fecha_mes_año($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$me = $mes_c->format('m');
$agno = $mes_c->format('Y');
$mes='';
if($me=='01') $mes='enero';
if($me=='02') $mes='febrero';
if($me=='03') $mes='marzo';
if($me=='04') $mes='abril';
if($me=='05') $mes='mayo';
if($me=='06') $mes='junio';
if($me=='07') $mes='julio';
if($me=='08') $mes='agosto';
if($me=='09') $mes='septiembre';
if($me=='10') $mes='octubre';
if($me=='11') $mes='noviembre';
if($me=='12') $mes='diciembre';
$cadena = ("$mes del ") ;
$cadena .= ("$agno");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra el valor numerico correspondiente al mes seleccionado
function Fecha_mes_n($Ingresomes_c){	
$mes_mes_c = new DateTime($Ingresomes_c);
$me = $mes_mes_c->format('m');
$mes='';
if($me=='01') $mes='01';
if($me=='02') $mes='02';
if($me=='03') $mes='03';
if($me=='04') $mes='04';
if($me=='05') $mes='05';
if($me=='06') $mes='06';
if($me=='07') $mes='07';
if($me=='08') $mes='08';
if($me=='09') $mes='09';
if($me=='10') $mes='10';
if($me=='11') $mes='11';
if($me=='12') $mes='12';
$cadena = ("$mes");
return $cadena;
}
/*******************************************************************************************************************/
//Muestra el valor numerico correspondiente al mes seleccionado
function Fecha_mes_n2($Ingresomes_c){	
$mes_mes_c = new DateTime($Ingresomes_c);
$mes = $mes_mes_c->format('m');
return $mes;
}
/*******************************************************************************************************************/
// Muestra solo el año en el navegador
function Fecha_año($IngresoFecha){	
$mes_c = new DateTime($IngresoFecha);
$agno = $mes_c->format('Y');
return $agno;
}
/*******************************************************************************************************************/
//Agrega ceros a un numero designado
function n_doc($valor){	

	return str_pad($valor, 5, "0", STR_PAD_LEFT);

}
/*******************************************************************************************************************/
//Agrega un separador de valoresjunto con dos decimales
function Valores_cd($valor){	

 return '$ '.number_format($valor,4,',','.');

}
/*******************************************************************************************************************/
//Agrega un separador de valores
function Valores_sd($valor){	

 return '$ '.number_format($valor,0,',','.');

}
/*******************************************************************************************************************/
//Devuelve porcentajes
function porcentaje_cd($valor){	

 return number_format($valor,1,',','.').'%';

}
/*******************************************************************************************************************/
//Devuelve la hora programada
function Hora_prog($valor){	

 return date("H:i", strtotime($valor));

}
/*******************************************************************************************************************/
//Se encarga de generar un array multinivel
function filtrar(&$array, $clave_orden ) {
  $array_filtrado = array(); 
  foreach($array as $index=>$array_value) {
    $value = $array_value[$clave_orden];
    unset($array_value[$clave_orden]);
	$array_filtrado[$value][] = $array_value;
  }
  $array = $array_filtrado; 
}
/*******************************************************************************************************************/
//Se encarga de generar un array multinivel
function filtrar2(&$array, $clave_orden1, $clave_orden2 ) {
  $array_filtrado = array(); 
  foreach($array as $index=>$array_value) {
    $value1 = $array_value[$clave_orden1];
	$value2 = $array_value[$clave_orden2];
    unset($array_value[$clave_orden1]);
	unset($array_value[$clave_orden2]);
	$array_filtrado[$value1][$value2][] = $array_value;
  }
  $array = $array_filtrado; 
}
/*******************************************************************************************************************/
//Muestra solo las primeras 3 letras del mes en el navegador
function Numero_a_mes($Ingresomes_c){	
$me = $Ingresomes_c;
if($me=='01') $mes='Ene';
if($me=='02') $mes='Feb';
if($me=='03') $mes='Mar';
if($me=='04') $mes='Abr';
if($me=='05') $mes='May';
if($me=='06') $mes='Jun';
if($me=='07') $mes='Jul';
if($me=='08') $mes='Ago';
if($me=='09') $mes='Sep';
if($me=='10') $mes='Oct';
if($me=='11') $mes='Nov';
if($me=='12') $mes='Dic';
$cadena = ("$mes");
return $cadena;
}

function minutos2horas($mins) {
if ($mins < 0)
	$min = abs($mins);
else
	$min = $mins;
 
$h = floor($min / 60);
$m = ($min - ($h * 60)) / 100;
$horas = $h + $m;
 
if ($mins < 0)
	$horas *= -1;

$sep = explode('.', $horas);
$h = $sep[0];
if (empty($sep[1]))
	$sep[1] = 00;
	$m = $sep[1];
 
if (strlen($m) < 2)
	$m = $m . 0;
return $h.':'.$m;
    }
/*******************************************************************************************************************/
//Funcion para dividir horas
function divHoras($hora,$registros) {
	$h1=substr($hora,0,-3);
    $m1=substr($hora,3,2);
    $minutos=(($h1*60)*60)+($m1*60);
    $dif=$minutos/$registros;
    $difm=floor($dif/60);
	return $difm;
	 
}
/*******************************************************************************************************************/
//Transforma valores a porcentaje
function porcentaje($valor){	
 $porcentaje = $valor *100;
 return number_format($porcentaje,0,',','.').' %';

}
/*******************************************************************************************************************/
/**
 * Validador de RUT con digito verificador 
 *
 * @param string $rut
 * @return boolean
 */
function RutValidate($rut) {
    $rut=str_replace('.', '', $rut);
    if (preg_match('/^(\d{1,9})-((\d|k|K){1})$/',$rut,$d)) {
        $s=1;$r=$d[1];for($m=0;$r!=0;$r/=10)$s=($s+$r%10*(9-$m++%6))%11;
        return chr($s?$s+47:75)==strtoupper($d[2]);
    }
} 
/*******************************************************************************************************************/
//esta funcion valida el email
function validaremail($email){ 
  if (!ereg("^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$",$email)){ 
      return FALSE; 
  } else { 
       return TRUE; 
  } 
}
/*******************************************************************************************************************/
//esta funcion valida el email
function validarnumero($numero){ 
if($numero=='0'){
	
}else{
	if(is_numeric($numero)) {
       //si es un numero no dice nada
    } else {
        return TRUE;
    }
}
  
}
/*******************************************************************************************************************/



/*******************************************************************************************************************/
//Verifica el largo del texto
function palabra_largo($variable,$largo){
	if (strlen($variable) < $largo) { 
   			$var	    = 'El dato ingresado debe tener al menos '.$largo.' caracteres';
			return $var;
	}
}
/*******************************************************************************************************************/
//Verifica lo corto del texto
function palabra_corto($variable,$largo){
	if (strlen($variable) > $largo) { 
   			$var	    = 'El dato ingresado debe tener no mas de '.$largo.' caracteres';
			return $var;
	}
}  
/*******************************************************************************************************************/
//Realiza el envio de mensajes
function gcmnoti(  $registrationIdsArray, $messageData, $collapseKey ){

	$api = 'AIzaSyCD-j4kI83UFJWbLkFo5hth3m7FRqMsZ7I';
	$headers = array('Authorization:key=' . $api);
	
	
	$data = array(
	'registration_id' => $registrationIdsArray,
	'collapse_key' => $collapseKey,
	'data.mensaje_psvirtual' => $messageData);
  

  
   $ch = curl_init();
  
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
   if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		

	}
}
/*******************************************************************************************************************/
//Realiza el envio de mensajes
function iosnoti(  $registrationIdsArray, $messageData ){

	// ID del dispositivo, similar al gcm de google
		$deviceToken = $registrationIdsArray;
		// Clave de la llave con la que se genero la aplicacion
		$passphrase = 'inicio1*';
		// Mensaje
		$message = $messageData;
		////////////////////////////////////////////////////////////////////////////////
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'JuntosSomosMas_dev.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
		if (!$fp) { exit("Failed to connect: $err $errstr" . PHP_EOL);	}
		//echo 'Connected to APNS' . PHP_EOL;
		
		// Create the payload body
		$body['aps'] = array(
			'alert' => $message,
			'sound' => 'default'
			);
		
		// Encode the payload as JSON
		$payload = json_encode($body);
		
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		
		if (!$result) {
			//echo 'Message not delivered' . PHP_EOL;
		}else{
			//echo 'Message successfully delivered' . PHP_EOL;
		}
		// Close the connection to the server
		fclose($fp);
}
/*******************************************************************************************************************/
//Realiza el envio de mensajes
function gcmnoti2(  $registrationIdsArray, $messageData ){

	// API access key from Google API's Console
	define( 'API_ACCESS_KEY', 'AIzaSyCD-j4kI83UFJWbLkFo5hth3m7FRqMsZ7I' );
	 
	 
	$registrationIds = array( $registrationIdsArray );
	 
	// prep the bundle
	$msg = array(
		'message' => $messageData,
		'title'	=> $messageData,
		'subtitle'	=> $messageData,
		'tickerText'	=> $messageData,
		'vibrate'	=> 1,
		'sound'	=> 1
	);
	 
	$fields = array(
		'registration_ids' => $registrationIds,
		'data.mensaje_psvirtual'	=> $msg
	);
	$headers = array(
		'Authorization: key=' . API_ACCESS_KEY ,
		'Content-Type: application/json'
	);
	$ch = curl_init();
	curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
	curl_setopt( $ch,CURLOPT_POST, true );
	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch );
	curl_close( $ch );


}
/*******************************************************************************************************************/
//Fecha actual
function fecha_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$fecha_actual = date("Y-m-d");
	return $fecha_actual; 
}
/*******************************************************************************************************************/
//Hora actual
function hora_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$hora_actual = date("H:i:s");
	return $hora_actual; 
}
/*******************************************************************************************************************/
//Limpiar textos
function limpiarString($texto){
      $textoLimpio = preg_replace('([^A-Za-z0-9.])', '', $texto);	     					
      return $textoLimpio;
}
?>