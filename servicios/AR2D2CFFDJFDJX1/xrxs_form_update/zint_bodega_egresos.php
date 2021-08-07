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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])  ) {


		// inserto los datos de registro en la db
		$query  = "UPDATE `zint_bodega` set Estado = {$_GET['value']} WHERE idBodega = {$_GET['apr']}";
	    $result = mysql_query($query, $dbConn);

		header( 'Location: '.$location );
		die;
	}?>