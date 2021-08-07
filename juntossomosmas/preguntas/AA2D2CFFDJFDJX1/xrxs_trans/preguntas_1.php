<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&&$Estado==1  ) { 
	
	//Busco a todos los usuarios
	$arrGCM = array();
	$query = "SELECT gcmcode, dispositivo
	FROM ejecutivos
	WHERE gcmcode!=''";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrGCM,$row );
	}
	$msj = "Juntos Somos Mas tiene una nueva Consulta";
	//recorro el array y envio los mensajes
	foreach ($arrGCM as $gcm) {
		//Envio del mensaje
		$reg_id = $gcm['gcmcode'];
		//Verifico el tipo de dispo
		if($gcm['dispositivo']=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $collapsekey );
		} else {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}
		
		
	}

}
?>