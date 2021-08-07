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
//Traspaso de valores input a variables
	if ( !empty($_POST['idVoto']) )            $idVoto            = $_POST['idVoto'];
	if ( !empty($_POST['idCliente']) )         $idCliente         = $_POST['idCliente'];
	if ( !empty($_POST['idPregunta']) )        $idPregunta        = $_POST['idPregunta'];
	if ( !empty($_POST['idRespuesta']) )       $idRespuesta       = $_POST['idRespuesta'];
	
?>