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
	if ( !empty($_POST['idPagGrupo']) )    $idPagGrupo     = $_POST['idPagGrupo'];
	if ( !empty($_POST['idTipoCliente']) ) $idTipoCliente  = $_POST['idTipoCliente'];
	if ( !empty($_POST['Nombre']) )        $Nombre         = $_POST['Nombre'];

	
?>