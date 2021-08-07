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
	if ( !empty($_POST['idTarea']) ) 	  $idTarea	  = $_POST['idTarea'];
	if ( !empty($_POST['idOt']) ) 	      $idOt       = $_POST['idOt'];
	if ( !empty($_POST['idSublist']) )    $idSublist  = $_POST['idSublist'];
	if ( !empty($_POST['idNombre']) ) 	  $idNombre   = $_POST['idNombre'];
?>