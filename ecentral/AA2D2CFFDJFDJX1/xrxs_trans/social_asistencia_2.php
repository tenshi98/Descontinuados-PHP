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
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_asistencia_eventos` SET Estado={$_GET['update']} WHERE idAsistencia = '{$_GET['idAsistencia']}'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;


 ?>