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
	if ( !empty($_POST['idEspiaListado']) )   $idEspiaListado    = $_POST['idEspiaListado'];
	if ( !empty($_POST['idEspiaCat']) )       $idEspiaCat        = $_POST['idEspiaCat'];
	if ( !empty($_POST['idCliente']) )        $idCliente         = $_POST['idCliente'];
	if ( !empty($_POST['Fecha']) )            $Fecha             = $_POST['Fecha'];
	if ( !empty($_POST['Texto']) )            $Texto             = $_POST['Texto'];
	if ( !empty($_POST['Nrecorrido']) )       $Nrecorrido        = $_POST['Nrecorrido'];
	if ( !empty($_POST['Nparada']) )          $Nparada           = $_POST['Nparada'];
	if ( !empty($_POST['idEstado']) )           $idEstado            = $_POST['idEstado'];
?>