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

		//Primero reseteo todos los activos a inactivos
		$query  = "UPDATE `interfaz` SET active = '0'";
		$result = mysql_query($query, $dbConn);
		
		//Luego actualizo solo el elemento elegido
		$query  = "UPDATE `interfaz` SET active = '1' WHERE idInterfaz = {$_GET['act']}";
		$result = mysql_query($query, $dbConn);	
		
		header( 'Location: '.$location );
		die;
	?>