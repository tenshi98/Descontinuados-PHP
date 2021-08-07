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
	if ( !empty($_POST['idApp']) )          $idApp             = $_POST['idApp'];
	if ( !empty($_POST['idGrupo']) )        $idGrupo           = $_POST['idGrupo'];
	if ( !empty($_POST['Nombre']) )         $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['Codigo']) )         $Codigo            = $_POST['Codigo'];
	
?>