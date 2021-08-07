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
	if ( !empty($_POST['idAdmpm']) )         $idAdmpm           = $_POST['idAdmpm'];
	if ( !empty($_POST['id_pmcat']) )      	 $id_pmcat          = $_POST['id_pmcat'];
	if ( !empty($_POST['Direccionweb']) )    $Direccionweb      = $_POST['Direccionweb'];
	if ( !empty($_POST['Direccionbase']) )   $Direccionbase     = $_POST['Direccionbase'];
	if ( !empty($_POST['Nombre']) )      	 $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['mode']) )      	     $mode              = $_POST['mode'];
	if ( !empty($_POST['visualizacion']) )   $visualizacion     = $_POST['visualizacion'];

?>