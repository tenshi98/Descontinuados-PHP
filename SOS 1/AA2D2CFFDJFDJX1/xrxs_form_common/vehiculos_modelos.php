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
	if ( !empty($_POST['idModelo']) )   $idModelo      = $_POST['idModelo'];
	if ( !empty($_POST['idMarca']) )    $idMarca       = $_POST['idMarca'];
	if ( !empty($_POST['Nombre']) )     $Nombre        = $_POST['Nombre'];
	
?>