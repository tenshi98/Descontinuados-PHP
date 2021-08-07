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
	$query  = "DELETE FROM `empresas_ot_comment` WHERE idComment = {$_GET['del_coment']}";
	$result = mysql_query($query, $dbConn);	
	header( 'Location: '.$location );
	die;
?>