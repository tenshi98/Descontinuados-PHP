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
	if ( !empty($_POST['id_Detalle']) )    $id_Detalle 	    = $_POST['id_Detalle'];
	if ( !empty($_POST['Tipo']) ) 	       $Tipo 	        = $_POST['Tipo'];
	if ( !empty($_POST['Nombre']) )        $Nombre 	        = $_POST['Nombre'];
	if ( !empty($_POST['Abreviatura']) )   $Abreviatura	    = $_POST['Abreviatura'];
	if ( !empty($_POST['idEmpresa']) ) 	   $idEmpresa 	    = $_POST['idEmpresa'];
?>