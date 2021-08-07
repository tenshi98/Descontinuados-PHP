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
	if ( !empty($_POST['idResp']) ) 	     $idResp	       = $_POST['idResp'];
	if ( !empty($_POST['idOt']) )            $idOt             = $_POST['idOt'];
	if ( !empty($_POST['idTrabajador']) )    $idTrabajador     = $_POST['idTrabajador'];
?>