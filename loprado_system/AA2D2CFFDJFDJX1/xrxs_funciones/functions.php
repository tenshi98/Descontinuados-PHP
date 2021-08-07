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
//Agrega un separador de valores
function Cantidades_decimales_justos($valor){	

	if($valor==0){
		return 0;
	}else{
		return floatval(number_format($valor, 2, '.', ''));
	}
	
}
/*******************************************************************************************************************/
//Reemplaza el punto por una coma
function cantidades_excel($valor){	

	$valor = str_replace('.', ',', $valor);
    return $valor;
	
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
	switch ($me) {
		case 1:  $dia='enero'; break;
		case 2:  $dia='febrero'; break;
		case 3:  $dia='marzo'; break;
		case 4:  $dia='abril'; break;
		case 5:  $dia='mayo'; break;
		case 6:  $dia='junio'; break;
		case 7:  $dia='julio'; break;
		case 8:  $dia='agosto'; break;
		case 9:  $dia='septiembre'; break;
		case 10: $dia='octubre'; break;
		case 11: $dia='noviembre'; break;
		case 12: $dia='diciembre'; break;
	}
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
	switch ($me) {
		case 1:  $dia='enero'; break;
		case 2:  $dia='febrero'; break;
		case 3:  $dia='marzo'; break;
		case 4:  $dia='abril'; break;
		case 5:  $dia='mayo'; break;
		case 6:  $dia='junio'; break;
		case 7:  $dia='julio'; break;
		case 8:  $dia='agosto'; break;
		case 9:  $dia='septiembre'; break;
		case 10: $dia='octubre'; break;
		case 11: $dia='noviembre'; break;
		case 12: $dia='diciembre'; break;
	};
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
	switch ($me) {
		case 1:  $mes='enero'; break;
		case 2:  $mes='febrero'; break;
		case 3:  $mes='marzo'; break;
		case 4:  $mes='abril'; break;
		case 5:  $mes='mayo'; break;
		case 6:  $mes='junio'; break;
		case 7:  $mes='julio'; break;
		case 8:  $mes='agosto'; break;
		case 9:  $mes='septiembre'; break;
		case 10: $mes='octubre'; break;
		case 11: $mes='noviembre'; break;
		case 12: $mes='diciembre'; break;
	}
	$cadena = ("$mes");
	return $cadena;
}
/*******************************************************************************************************************/
//Muestra solo las primeras 3 letras del mes en el navegador
function Fecha_mes_c($Ingresomes_c){	
	$mes_mes_c = new DateTime($Ingresomes_c);
	$me = $mes_mes_c->format('m');
	$mes='';
	switch ($me) {
		case 1:  $mes='ene'; break;
		case 2:  $mes='feb'; break;
		case 3:  $mes='mar'; break;
		case 4:  $mes='abr'; break;
		case 5:  $mes='may'; break;
		case 6:  $mes='jun'; break;
		case 7:  $mes='jul'; break;
		case 8:  $mes='ago'; break;
		case 9:  $mes='sep'; break;
		case 10: $mes='oct'; break;
		case 11: $mes='nov'; break;
		case 12: $mes='dic'; break;
	}
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
	switch ($me) {
		case 1:  $mes='enero'; break;
		case 2:  $mes='febrero'; break;
		case 3:  $mes='marzo'; break;
		case 4:  $mes='abril'; break;
		case 5:  $mes='mayo'; break;
		case 6:  $mes='junio'; break;
		case 7:  $mes='julio'; break;
		case 8:  $mes='agosto'; break;
		case 9:  $mes='septiembre'; break;
		case 10: $mes='octubre'; break;
		case 11: $mes='noviembre'; break;
		case 12: $mes='diciembre'; break;
	}
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
	switch ($me) {
		case 1:  $mes='01'; break;
		case 2:  $mes='02'; break;
		case 3:  $mes='03'; break;
		case 4:  $mes='04'; break;
		case 5:  $mes='05'; break;
		case 6:  $mes='06'; break;
		case 7:  $mes='07'; break;
		case 8:  $mes='08'; break;
		case 9:  $mes='09'; break;
		case 10: $mes='10'; break;
		case 11: $mes='11'; break;
		case 12: $mes='12'; break;
	}
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
// Muestra la fecha completa en el navegador
function Hora_estandar($Hora){	
$date = date_create($Hora);
return date_format($date, 'H:i');
}

/*******************************************************************************************************************/
//Transforma un valor a mes
function numero_a_mes($numero){	
	switch ($numero) {
		case 1:  $mes='Enero'; break;
		case 2:  $mes='Febrero'; break;
		case 3:  $mes='Marzo'; break;
		case 4:  $mes='Abril'; break;
		case 5:  $mes='Mayo'; break;
		case 6:  $mes='Junio'; break;
		case 7:  $mes='Julio'; break;
		case 8:  $mes='Agosto'; break;
		case 9:  $mes='Septiembre'; break;
		case 10: $mes='Octubre'; break;
		case 11: $mes='Noviembre'; break;
		case 12: $mes='Diciembre'; break;
	}
	return $mes;
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
//Funcion para devolver horas
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
	if (!preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$}',$email)){
        return FALSE; 
    }else { 
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
function gcmnoti2(  $registrationIdsArray, $messageData ){

	// API access key from Google API's Console
	define( 'API_ACCESS_KEY', 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g' );
	 
	 
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
		'data.msj_sosauto'	=> $msg
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
//Fecha actual
function fecha_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$fecha_actual = date("Y-m-d");
	return $fecha_actual; 
}
/*******************************************************************************************************************/
//Hora actual
function hora_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$hora_actual = date("H:i:s");
	return $hora_actual; 
}
/*******************************************************************************************************************/
//Hora actual
function hora_actual_val(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$hora_actual = date("H-i-s");
	return $hora_actual; 
}
/*******************************************************************************************************************/
//dia actual
function dia_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$dia_actual = date("j");
	return $dia_actual; 
}
/*******************************************************************************************************************/
//semana actual
function semana_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$semana_actual = date("W");
	return $semana_actual; 
}
/*******************************************************************************************************************/
//mes actual
function mes_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$mes_actual = date("n");
	return $mes_actual; 
}
/*******************************************************************************************************************/
//año actual
function ano_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$ano_actual = date("Y");
	return $ano_actual; 
}
/*******************************************************************************************************************/
//dia transformado
function dia_transformado($dato){
	//transformo el dato entregado al formato que necesito
	$subdato = new DateTime($dato);
	$datofinal = $subdato->format("j");
	return $datofinal; 
}
/*******************************************************************************************************************/
//dia transformado
function dia_transformado2($dato){
	//transformo el dato entregado al formato que necesito
	$dias = new DateTime($dato);
	$me = $dias->format('N');
	switch ($me) {
		case 1: $dia='Lunes'; break;
		case 2: $dia='Martes'; break;
		case 3: $dia='Miercoles'; break;
		case 4: $dia='Jueves'; break;
		case 5: $dia='Viernes'; break;
		case 6: $dia='Sabado'; break;
		case 7: $dia='Domingo'; break;
	}
	return $dia;
}
/*******************************************************************************************************************/
//semana transformado
function semana_transformado($dato){
	//transformo el dato entregado al formato que necesito
	$subdato = new DateTime($dato);
	$datofinal = $subdato->format("W");
	return $datofinal;
}
/*******************************************************************************************************************/
//mes transformado
function mes_transformado($dato){
	//transformo el dato entregado al formato que necesito
	$subdato = new DateTime($dato);
	$datofinal = $subdato->format("n");
	return $datofinal;
}
/*******************************************************************************************************************/
//año transformado
function ano_transformado($dato){
	//transformo el dato entregado al formato que necesito
	$subdato = new DateTime($dato);
	$datofinal = $subdato->format("Y");
	return $datofinal;
}
/*******************************************************************************************************************/
//Limpiar textos
function limpiarString($texto){
      $textoLimpio = preg_replace('([^A-Za-z0-9.])', '', $texto);	     					
      return $textoLimpio;
}
/*******************************************************************************************************************/
//Generar un password aleatorio
function genera_password($longitud,$tipo="alfanumerico"){
 
if ($tipo=="alfanumerico"){
$exp_reg="[^A-Z0-9]";
} elseif ($tipo=="numerico"){
$exp_reg="[^0-9]";
}
 
return substr(eregi_replace($exp_reg, "", md5(time())) .
eregi_replace($exp_reg, "", md5(time())) .
eregi_replace($exp_reg, "", md5(time())),
0, $longitud);
}
/*******************************************************************************************************************/
//Generar un password aleatorio
function ValidaPatente($patente){
	//elimino los posibles guones
	$value = str_replace("-","",$patente);
 	//caracteres admitidos
 	$regex = '/^[a-z]{2}[\.\- ]?[0-9]{2}[\.\- ]?[0-9]{2}|[b-d,f-h,j-l,p,r-t,v-z]{2}[\-\. ]?[b-d,f-h,j-l,p,r-t,v-z]{2}[\.\- ]?[0-9]{2}$/i';
	//valida formato
	if (preg_match($regex, $patente)){
	  return "";
	}else{
	  return "Patente incorrecta o con formato incorrecto";
	}
}
/*******************************************************************************************************************/
//Resta entre dos horas
function resta($inicio, $fin){
  $dif=date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio) );
  return $dif;
  }
/*******************************************************************************************************************/
//construye el listado de errores
function errors_list($errores){
	$despliegue = '<script type="text/javascript">
					$(document).ready(function() {
						setTimeout(function() {
							$(".div_alert").fadeOut(1500);
						},3000);
					});
					</script>';
	if (!empty($errores)) {  
		foreach ($errores as $mensaje) { 
			list($tipo, $error) = explode("/", $mensaje);
			$despliegue .= '<div class="alert_'.$tipo.' div_alert" >'.$error.'</div>';
		} 
	}	
	return $despliegue;
}
/*******************************************************************************************************************/
//construye el listado de errores
function notifications_list($errores){
	
	$despliegue = '<div id="notifications_list">Notificaciones <a id="close_btn_noti">cerrar</a>';
	
	if (!empty($errores)) {  
		foreach ($errores as $mensaje) { 
			list($tipo, $error) = explode("/", $mensaje);
			$despliegue .= '<p><img src="img/icon_'.$tipo.'.png" height="24" width="24">  '.$error.'</p>';
		} 
	}

	$despliegue .= '</div>';
	
	$despliegue .= "<script type='text/javascript'>
					document.getElementById('close_btn_noti').addEventListener('click', function() {
					document.getElementById('notifications_list').style.display = 'none';
					}, false);
					</script>";
		
	return $despliegue;
}
/*******************************************************************************************************************/
//paginador
function paginador_1($total_paginas, $original, $search, $num_pag){
	$paginador='';
	

//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina=';

$paginador .='<div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">';
                	if(($num_pag - 1) > 0) { 
                    	$paginador .='<li class="prev"><a href="'.$location.($num_pag-1).$search.'">← Anterior</a></li>';
                    } else {
                    	$paginador .='<li class="prev disabled"><a href="">← Anterior</a></li>';
                    } 
                    
                    if ($total_paginas>10){
						if(0>$num_pag-5){
							for ($i = 1; $i <= 10; $i++) { 
								if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
								$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
							 }
						}elseif($total_paginas<$num_pag+5){
							for ($i = $num_pag-5; $i <= $total_paginas; $i++) {
								if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
								$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
							 }	
						}else{
							for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { 
								if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
								$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
							}	
						}		
					}else{
						for ($i = 1; $i <= $total_paginas; $i++) { 
							if ($i==$num_pag){ $xx='class="active"';}else{ $xx='';}
							$paginador .='<li '.$xx.'><a href="'.$location.$i.$search.'">'.$i.'</a></li>';
                        }
					}
                    if(($num_pag + 1)<=$total_paginas) { 
						$paginador .='<li class="next"><a href="'.$location.($num_pag+1).$search.'">Siguiente → </a></li>';
                    } else {
						$paginador .='<li class="next disabled"><a href="">Siguiente → </a></li>';
                    } 
				$paginador .='</ul>
            </div> 
        </div>
    </div>';
}	
	return $paginador; 
}
/*******************************************************************************************************************/
/* reemplaza los espacios po guines*/
function espacio_guion($dato) {
    $dato = str_replace(' ', '_', $dato);
    return $dato;
}
/*******************************************************************************************************************/
//Despliega un mapa en base a los datos entregados
function mapa1($Latitud, $Longitud, $Titulo){	
$mapa = '<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
		<script type="text/javascript">
			  function initialize() {
				  var myLatlng = new google.maps.LatLng('.$Latitud.', '.$Longitud.');
				  var mapOptions = {
					zoom: 15,
					scrollwheel: false,
					center: myLatlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				  }
				  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
				
				  var marker_<?php echo $nn ?> = new google.maps.Marker({
					  position:  new google.maps.LatLng('.$Latitud.', '.$Longitud.'),
					  map: map,
					  title:"'.$Titulo.'",
					  icon: "src_img/map.png"
				  });
		  		
			  }  
		</script>';
$mapa .= '<div id="map_canvas" style="width:100%; height:500px">
               <script type="text/javascript">initialize();</script>
          </div>';	

	return $mapa;
}

/*******************************************************************************************************************/
//Despliega un mapa en base a los datos entregados
function mapa2($Ubicacion){	
$mapa = '<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxSPW5CJgpdgO_s4yyMovOaVh_KvvhSfpvagV18eOyDWu7VytS6Bi1CWxw"
      type="text/javascript"></script>
    <script type="text/javascript">

    var map = null;
    var geocoder = null;

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 1);
        map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 15);
              var marker = new GMarker(point, {draggable: true});
              map.addOverlay(marker);
             
            }
          }
        );
      }
    }
    </script>
<div id="map_canvas" style="width:100%; height:500px">
        <script type="text/javascript">initialize();showAddress("'.$Ubicacion.'");</script>
</div>';

	return $mapa;
}
/*******************************************************************************************************************/
//funcion para sumar horas
function sumahoras($hora1,$hora2){
	$hora1=explode(":",$hora1);
	$hora2=explode(":",$hora2);
	$horas=(int)$hora1[0]+(int)$hora2[0];
	$minutos=(int)$hora1[1]+(int)$hora2[1];
	$segundos=(int)$hora1[2]+(int)$hora2[2];
	$horas+=(int)($minutos/60);
	$minutos=(int)($minutos%60)+(int)($segundos/60);
	$segundos=(int)($segundos%60);
	return (intval($horas)<10?'0'.intval($horas):intval($horas)).':'.($minutos<10?'0'.$minutos:$minutos).':'.($segundos<10?'0'.$segundos:$segundos); 
} 























?>
