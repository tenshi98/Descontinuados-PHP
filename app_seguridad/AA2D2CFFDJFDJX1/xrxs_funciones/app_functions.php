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
//Encripta los datos entregados
function hashSSHA($password) {

    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
}
/*******************************************************************************************************************/
//Fecha actual
function fechahora_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('UTC');
	//Imprimimos la fecha actual dandole un formato
	$fechahora_actual = date("Y-m-d H:i:s");
	return $fechahora_actual; 
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
//esta funcion valida el numero
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
//Realiza el envio de mensajes
function gcmnoti(  $registrationIdsArray, $messageData, $collapseKey ){

	$api = 'AIzaSyA_S9bLSLfzwUNIsfO0Hvs4eGbGD4-vkFg';
	$headers = array('Authorization:key=' . $api);
	
	
	$data = array(
	'registration_id' => $registrationIdsArray,
	'data.mensaje_viene' => $messageData);
  
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
function gcmnoti2($destinatario, $mensaje ){

	// API access key from Google API's Console
	//define( 'API_ACCESS_KEY', 'AIzaSyA_S9bLSLfzwUNIsfO0Hvs4eGbGD4-vkFg' );
	$api = 'AIzaSyA_S9bLSLfzwUNIsfO0Hvs4eGbGD4-vkFg';

	// prep the bundle
	$msg = array
	(
		'message' 	 => $mensaje,
		'title'		 => 'This is a title. title',
		'subtitle'	 => '',
		'tickerText' => '',
		'vibrate'	 => 1,
		'sound'		 => 1,
		'largeIcon'	 => 'large_icon',
		'smallIcon'	 => 'small_icon'
	);

	//$msg = "please note this..";
	$fields = array
	(
		'registration_ids' 	=> $destinatario,
		'data'			=> $msg
	);
	 
	$headers = array
	(
		'Authorization: key=' . $api,
		'Content-Type: application/json',
			
	);
	 
	try{
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );

		echo $result;

	}
	catch(Exception $e){
		echo $e;
		echo "inside catch";
	}


}
/*******************************************************************************************************************/















?>
