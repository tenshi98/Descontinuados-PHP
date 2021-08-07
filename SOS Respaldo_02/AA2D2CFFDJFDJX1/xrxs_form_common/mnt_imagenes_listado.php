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
	if ( !empty($_POST['idListimg']) )   $idListimg     = $_POST['idListimg'];
	if ( !empty($_POST['idCatimg']) )    $idCatimg      = $_POST['idCatimg'];
	if ( !empty($_POST['Nombre']) )      $Nombre        = $_POST['Nombre'];
	
	
?>