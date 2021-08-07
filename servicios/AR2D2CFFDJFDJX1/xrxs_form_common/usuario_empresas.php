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
	if ( !empty($_POST['idUsremp']) ) 	     $idUsremp	    = $_POST['idUsremp'];
	if ( !empty($_POST['idUsuario']) ) 	     $idUsuario	    = $_POST['idUsuario'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa     = $_POST['idEmpresa'];
?>