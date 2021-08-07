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
	if ( !empty($_POST['idItemcat']) ) 	     $idItemcat	    = $_POST['idItemcat'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa     = $_POST['idEmpresa'];
	if ( !empty($_POST['Nombre_cat']) ) 	 $nombre_cat    = $_POST['Nombre_cat'];
	if ( !empty($_POST['Nombre_Sub']) ) 	 $nombre_Sub    = $_POST['Nombre_Sub'];
?>