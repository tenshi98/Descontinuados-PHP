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
	if ( !empty($_POST['idCat_prod']) ) 	 $idCat_prod	 = $_POST['idCat_prod'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['Cat_prod']) ) 	     $Cat_prod       = $_POST['Cat_prod'];
?>