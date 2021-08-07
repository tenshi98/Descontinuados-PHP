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
	if ( !empty($_POST['idCostos']) ) 	     $idCostos	       = $_POST['idCostos'];
	if ( !empty($_POST['idEmpresa']) )       $idEmpresa        = $_POST['idEmpresa'];
	if ( !empty($_POST['idOt']) )            $idOt             = $_POST['idOt'];
	if ( !empty($_POST['Texto']) )           $Texto            = $_POST['Texto'];
	if ( !empty($_POST['costo']) )           $costo            = $_POST['costo'];
?>