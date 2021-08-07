<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/;
		//por ultimo actualizo el estado de los ajustes generales
		$query  = "UPDATE `app_ajustes_generales` SET {$_GET['table']} = '{$_GET['val']}' WHERE id = {$_GET['app_conf']} ";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;

?>