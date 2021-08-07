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
	$query  = "DELETE FROM `preguntas_respuestas` WHERE idRespuesta = {$_GET['delresp']}";
	$result = mysql_query($query, $dbConn);	
	header( 'Location: '.$location );
	die;
	?>