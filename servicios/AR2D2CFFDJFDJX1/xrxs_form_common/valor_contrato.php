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
	if ( !empty($_POST['idValor']) ) 	     $idValor	        = $_POST['idValor'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa         = $_POST['idEmpresa'];
	if ( !empty($_POST['Valorizacion']) )    $Valorizacion 	    = $_POST['Valorizacion'];
	if ( !empty($_POST['Gastos_gen']) )      $Gastos_gen 	    = $_POST['Gastos_gen'];
?>