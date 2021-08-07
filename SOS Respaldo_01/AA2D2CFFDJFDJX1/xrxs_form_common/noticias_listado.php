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
	if ( !empty($_POST['idNotListado']) )   $idNotListado     = $_POST['idNotListado'];
	if ( !empty($_POST['idTipoCliente']) )  $idTipoCliente    = $_POST['idTipoCliente'];
	if ( !empty($_POST['idNotGrupo']) )     $idNotGrupo       = $_POST['idNotGrupo'];
	if ( !empty($_POST['idNotCat']) )       $idNotCat         = $_POST['idNotCat'];
	if ( !empty($_POST['Titulo']) )         $Titulo           = $_POST['Titulo'];
	if ( !empty($_POST['Fecha']) )          $Fecha            = $_POST['Fecha'];
	if ( !empty($_POST['Texto']) )          $Texto            = $_POST['Texto'];
	if ( !empty($_POST['Comentarios']) )    $Comentarios      = $_POST['Comentarios'];
	if ( !empty($_POST['Aprobar']) )        $Aprobar          = $_POST['Aprobar'];	
?>