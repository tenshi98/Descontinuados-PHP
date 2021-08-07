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
	if ( !empty($_POST['idEmpresa']) )       $idEmpresa         = $_POST['idEmpresa'];
	if ( !empty($_POST['idCliente']) )       $idCliente         = $_POST['idCliente'];
	if ( !empty($_POST['Nombre']) )          $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['Fono']) )            $Fono 	            = $_POST['Fono'];
	if ( !empty($_POST['Email']) )           $Email 	        = $_POST['Email'];


?>