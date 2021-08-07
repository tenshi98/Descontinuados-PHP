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
	if ( !empty($_POST['id_sociallist']) )    $id_sociallist     = $_POST['id_sociallist'];
	if ( !empty($_POST['id_socialcat']) )     $id_socialcat      = $_POST['id_socialcat'];
	if ( !empty($_POST['Nombre']) )           $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['Tipo']) )             $Tipo              = $_POST['Tipo'];

?>