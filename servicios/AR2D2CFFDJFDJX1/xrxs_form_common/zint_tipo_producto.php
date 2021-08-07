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
	if ( !empty($_POST['idTipo_prod']) ) 	 $idTipo_prod	 = $_POST['idTipo_prod'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['Tipo_producto']) ) 	 $Tipo_producto  = $_POST['Tipo_producto'];
?>