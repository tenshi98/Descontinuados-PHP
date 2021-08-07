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
	if ( !empty($_POST['Marca']) )            $Marca 	            = $_POST['Marca'];
	if ( !empty($_POST['Modelo']) )           $Modelo 	            = $_POST['Modelo'];
	if ( !empty($_POST['Tipo']) )             $Tipo 	            = $_POST['Tipo'];
	if ( !empty($_POST['ftransferencia']) )   $ftransferencia       = $_POST['ftransferencia'];
	if ( !empty($_POST['Color_1']) )          $Color_1 	            = $_POST['Color_1'];
	if ( !empty($_POST['Color_2']) )          $Color_2 	            = $_POST['Color_2'];
	if ( !empty($_POST['Fecha']) )            $Fecha 	            = $_POST['Fecha'];
	if ( !empty($_POST['N_Motor']) )          $N_Motor 	            = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )         $N_Chasis 	        = $_POST['N_Chasis'];
	if ( !empty($_POST['Obs']) )              $Obs 	                = $_POST['Obs'];

?>