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
	//Especifico los mensajes
	switch ($idCatPreg) {
		case 1:  $msj = "La Mesa Directiva ha hecho una pregunta"; break;
		case 2:  $msj = "La Comision Politica ha hecho una pregunta"; break;
		case 3:  $msj = "El comite Central ha hecho una pregunta"; break;
		case 4:  $msj = "Los senadores han hecho una pregunta"; break;
		case 5:  $msj = "Los diputados han hecho una pregunta"; break;
		case 6:  $msj = "Los alcaldes han hecho una pregunta"; break;
		case 7:  $msj = "Los concejales han hecho una pregunta"; break;
		case 8:  $msj = "La direccion regional ha hecho una pregunta"; break;
		case 9:  $msj = "La direccion comunal ha hecho una pregunta"; break; 
	}

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