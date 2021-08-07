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
	if ( !empty($_POST['idPregunta']) )     $idPregunta        = $_POST['idPregunta'];
	if ( !empty($_POST['idTipoCliente']) )  $idTipoCliente     = $_POST['idTipoCliente'];
	if ( !empty($_POST['idCategorias']) )   $idCategorias      = $_POST['idCategorias'];
	if ( !empty($_POST['idUsuario']) )      $idUsuario         = $_POST['idUsuario'];
	if ( !empty($_POST['Pregunta']) )       $Pregunta          = $_POST['Pregunta'];
	if ( !empty($_POST['Fecha']) )          $Fecha             = $_POST['Fecha'];
	if ( !empty($_POST['Estado']) )         $Estado            = $_POST['Estado'];

	
	
?>