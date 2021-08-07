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
	if ( !empty($_POST['idSolicitud']) )    $idSolicitud      = $_POST['idSolicitud'];
	if ( !empty($_POST['Fcreacion']) )      $Fcreacion        = $_POST['Fcreacion'];
	if ( !empty($_POST['Rut']) )            $Rut              = $_POST['Rut'];
	if ( !empty($_POST['Nombres']) )        $Nombres          = $_POST['Nombres'];
	if ( !empty($_POST['ApellidoPat']) )    $ApellidoPat      = $_POST['ApellidoPat'];
	if ( !empty($_POST['ApellidoMat']) )    $ApellidoMat      = $_POST['ApellidoMat'];
	if ( !empty($_POST['email']) )          $email            = $_POST['email'];
	if ( !empty($_POST['Fono1']) )          $Fono1            = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )          $Fono2 	          = $_POST['Fono2'];
	if ( !empty($_POST['idCiudad']) )       $idCiudad 	      = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )       $idComuna 	      = $_POST['idComuna'];
	if ( !empty($_POST['TipoMsje']) )       $TipoMsje 	      = $_POST['TipoMsje'];
	if ( !empty($_POST['Depto']) )          $Depto 	          = $_POST['Depto'];
	if ( !empty($_POST['Fecha']) )          $Fecha 	          = $_POST['Fecha'];
	if ( !empty($_POST['Detalle']) )        $Detalle 	      = $_POST['Detalle'];
	if ( !empty($_POST['Estado']) )         $Estado 	      = $_POST['Estado'];
	if ( !empty($_POST['idCliente']) )      $idCliente 	      = $_POST['idCliente'];

?>