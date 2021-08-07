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
	if ( !empty($_POST['idVehiculo']) )       $idVehiculo           = $_POST['idVehiculo'];
	if ( !empty($_POST['idCliente']) )        $idCliente            = $_POST['idCliente'];
	if ( !empty($_POST['PPU']) )              $PPU                  = $_POST['PPU'];
	if ( !empty($_POST['idMarca']) )          $idMarca 	            = $_POST['idMarca'];
	if ( !empty($_POST['idModelo']) )         $idModelo 	        = $_POST['idModelo'];
	if ( !empty($_POST['idTransmision']) )    $idTransmision 	    = $_POST['idTransmision'];
	if ( !empty($_POST['fTransferencia']) )   $fTransferencia       = $_POST['fTransferencia'];
	if ( !empty($_POST['idColorV_1']) )       $idColorV_1 	        = $_POST['idColorV_1'];
	if ( !empty($_POST['idColorV_2']) )       $idColorV_2 	        = $_POST['idColorV_2'];
	if ( !empty($_POST['fFabricacion']) )     $fFabricacion 	    = $_POST['fFabricacion'];
	if ( !empty($_POST['N_Motor']) )          $N_Motor 	            = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )         $N_Chasis 	        = $_POST['N_Chasis'];
	if ( !empty($_POST['Obs']) )              $Obs 	                = $_POST['Obs'];

?>