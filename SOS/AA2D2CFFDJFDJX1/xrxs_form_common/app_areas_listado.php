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
	if ( !empty($_POST['idArea']) )        $idArea         = $_POST['idArea'];
	if ( !empty($_POST['Nombre']) )        $Nombre         = $_POST['Nombre'];
	if ( !empty($_POST['Orden']) )         $Orden          = $_POST['Orden'];
	if ( !empty($_POST['idPagelist']) )    $idPagelist     = $_POST['idPagelist'];
	if ( !empty($_POST['Codigo']) )        $Codigo         = $_POST['Codigo'];
	if ( !empty($_POST['Margen']) )        $Margen         = $_POST['Margen'];
	
?>