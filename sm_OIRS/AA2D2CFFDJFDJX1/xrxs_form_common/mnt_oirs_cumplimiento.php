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
	if ( !empty($_POST['idCumplimiento']) )  $idCumplimiento   = $_POST['idCumplimiento'];
	if ( !empty($_POST['Verde']) )      	 $Verde            = $_POST['Verde'];
	if ( !empty($_POST['Amarillo']) )        $Amarillo         = $_POST['Amarillo'];
	if ( !empty($_POST['Rojo']) )            $Rojo             = $_POST['Rojo'];

?>