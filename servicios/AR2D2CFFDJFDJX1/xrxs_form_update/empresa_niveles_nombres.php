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
if ( empty($errors[1]) && empty($errors[2])  ) {

		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_niveles_nombres` SET idNiveles = '$idNiveles', Nombre = '$nombre' WHERE idNombre = '$idNombre'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>