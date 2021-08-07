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
	if ( !empty($_POST['id_Datos']) )         $id_Datos          = $_POST['id_Datos'];
	if ( !empty($_POST['email_principal']) )  $email_principal   = $_POST['email_principal'];
	if ( !empty($_POST['Nombre']) )           $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )              $Rut               = $_POST['Rut'];
	if ( !empty($_POST['Direccion']) )        $Direccion         = $_POST['Direccion'];
	if ( !empty($_POST['Fono']) )             $Fono              = $_POST['Fono'];
	if ( !empty($_POST['Ciudad']) )           $Ciudad 	         = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )           $Comuna 	         = $_POST['Comuna'];
	if ( !empty($_POST['idTheme']) )          $idTheme           = $_POST['idTheme'];
	if ( !empty($_POST['idTheme2']) )         $idTheme2          = $_POST['idTheme2'];
	
?>