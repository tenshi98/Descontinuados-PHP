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
	if ( !empty($_POST['idSolicitud']) ) 	 $idSolicitud	 = $_POST['idSolicitud'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['fSolicitud']) ) 	 $fSolicitud     = $_POST['fSolicitud'];
	if ( !empty($_POST['Responsable']) ) 	 $Responsable    = $_POST['Responsable'];
	if ( !empty($_POST['Comentario']) ) 	 $Comentario     = $_POST['Comentario'];
	if ( !empty($_POST['Estado']) ) 	     $Estado         = $_POST['Estado'];
	if ( !empty($_POST['idCliente']) ) 	     $idCliente      = $_POST['idCliente'];
	if ( !empty($_POST['tipo_cliente']) ) 	 $tipo_cliente   = $_POST['tipo_cliente'];
?>