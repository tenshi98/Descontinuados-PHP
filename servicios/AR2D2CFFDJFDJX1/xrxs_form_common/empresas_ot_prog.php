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
	if ( !empty($_POST['idProg']) ) 	     $idProg          = $_POST['idProg'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa       = $_POST['idEmpresa'];
	if ( !empty($_POST['idFrecuencia']) ) 	 $idFrecuencia    = $_POST['idFrecuencia'];
	if ( !empty($_POST['valor']) ) 	         $valor           = $_POST['valor'];
	if ( !empty($_POST['month']) ) 	         $month           = $_POST['month'];
	if ( !empty($_POST['year']) ) 	         $year            = $_POST['year'];
?>