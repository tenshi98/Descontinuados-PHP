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
	if ( !empty($_POST['idAntecedente']) )     $idAntecedente     = $_POST['idAntecedente'];
	if ( !empty($_POST['Nombre']) )            $Nombre            = $_POST['Nombre'];
	
?>