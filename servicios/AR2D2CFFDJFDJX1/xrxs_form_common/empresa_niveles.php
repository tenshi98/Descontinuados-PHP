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
	if ( !empty($_POST['idNivel']) ) 	 $idNivel   = $_POST['idNivel'];
	if ( !empty($_POST['nombre']) ) 	 $nombre    = $_POST['nombre'];
?>