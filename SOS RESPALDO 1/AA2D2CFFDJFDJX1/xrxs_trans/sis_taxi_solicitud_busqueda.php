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
	//Verifico la longitud y la latitud, si los usuarios estan dentro en ese momento
	$z .= " AND Longitud BETWEEN '".$longitud_up."' AND '".$longitud_down."'" ;
	$z .= " AND Latitud BETWEEN'".$latitud_up."' AND '".$latitud_down."'" ;
	//Se envian los mensajes solo a quienes quieren recibirlos
	$z .= " AND Alarma='Si'" ;
	//Envio los mensajes solo a quienes tengan un GSM guardado
	$z .= " AND Gsm!=''" ;
	//Ordeno de forma aleatoria y limito los resultados a 1
	$z .= " ORDER BY RAND() LIMIT 1";
	//Realizo la consulta	
	$query="SELECT idCliente, Latitud, Longitud FROM clientes_listado ".$z;		  
	$resultado2 = mysql_query ($query, $dbConn);
	$rownum = mysql_num_rows ($resultado2);
	$rowdata = mysql_fetch_assoc ($resultado2);
	mysql_free_result($resultado2);
	
	if($rownum!=1){
		//Si no encuentra un taxista, redirige a la pantalla de nueva busqueda
		header( 'Location: '.$location.'&repeat=true&idTipoAlerta='.$_GET['idTipoAlerta'] );
		die;
	}elseif($rownum==1){
		//Si encuentra un taxista redirige a la pantalla con sus datos
		header( 'Location: '.$location.'&idTaxista='.$rowdata['idCliente'].'&lat_tax='.$rowdata['Latitud'].'&long_tax='.$rowdata['Longitud'].'&idTipoAlerta='.$_GET['idTipoAlerta'] );
		die;
	}
?>