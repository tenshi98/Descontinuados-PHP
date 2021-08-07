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
	if ( !empty($_POST['id_OirsObservaciones']) )    	$id_OirsObservaciones      	= $_POST['id_OirsObservaciones'];
	if ( !empty($_POST['id_Oirs']) )      				$id_Oirs        			= $_POST['id_Oirs'];
	if ( !empty($_POST['idUsuario']) )  				$idUsuario    				= $_POST['idUsuario'];
	if ( !empty($_POST['Fecha']) )     					$Fecha       				= $_POST['Fecha'];
	if ( !empty($_POST['Hora']) )     					$Hora       				= $_POST['Hora'];
	if ( !empty($_POST['Detalle']) )    				$Detalle       				= $_POST['Detalle'];

?>