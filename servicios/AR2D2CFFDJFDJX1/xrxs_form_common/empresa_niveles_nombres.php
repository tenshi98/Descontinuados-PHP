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
	if ( !empty($_POST['idNombre']) ) 	     $idNombre	   = $_POST['idNombre'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa    = $_POST['idEmpresa'];
	if ( !empty($_POST['idNiveles']) ) 	     $idNiveles    = $_POST['idNiveles'];
	if ( !empty($_POST['nombre']) ) 	     $nombre       = $_POST['nombre'];
?>