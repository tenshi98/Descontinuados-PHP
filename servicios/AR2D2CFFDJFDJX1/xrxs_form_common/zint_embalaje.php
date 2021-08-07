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
	if ( !empty($_POST['idEmbalaje']) ) 	 $idEmbalaje	 = $_POST['idEmbalaje'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['Nombre']) ) 	     $Nombre         = $_POST['Nombre'];
?>