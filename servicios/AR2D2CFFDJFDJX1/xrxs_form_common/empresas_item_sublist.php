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
	if ( !empty($_POST['idSublist']) )   	 $idSublist	     = $_POST['idSublist'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['idItemlist']) ) 	 $idItemlist     = $_POST['idItemlist'];
	if ( !empty($_POST['Nombre']) ) 	     $Nombre         = $_POST['Nombre'];
	if ( !empty($_POST['idFrecuencia']) )    $idFrecuencia   = $_POST['idFrecuencia'];
?>