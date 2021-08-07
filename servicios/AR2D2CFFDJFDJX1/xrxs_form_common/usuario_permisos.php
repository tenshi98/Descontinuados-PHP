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
	if ( !empty($_POST['idpermiso']) )    $idpermiso  = $_POST['idpermiso'];
	if ( !empty($_POST['tipo']) )         $tipo       = $_POST['tipo'];
	if ( !empty($_POST['direccion']) )    $direccion  = $_POST['direccion'];
	if ( !empty($_POST['nombre']) )       $nombre 	  = $_POST['nombre'];
?>