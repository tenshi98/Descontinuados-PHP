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
	if ( !empty($_POST['idObservacion']) )         $idObservacion          = $_POST['idObservacion'];
	if ( !empty($_POST['idUsuario_observado']) )   $idUsuario_observado    = $_POST['idUsuario_observado'];
	if ( !empty($_POST['idUsuario']) )             $idUsuario              = $_POST['idUsuario'];
	if ( !empty($_POST['Fecha']) )                 $Fecha                  = $_POST['Fecha'];
	if ( !empty($_POST['Observacion']) )           $Observacion            = $_POST['Observacion'];
?>