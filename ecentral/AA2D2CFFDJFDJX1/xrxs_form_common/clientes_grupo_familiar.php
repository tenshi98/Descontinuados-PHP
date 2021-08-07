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
	if ( !empty($_POST['idGrupo']) )           $idGrupo         = $_POST['idGrupo'];
	if ( !empty($_POST['idCliente']) )         $idCliente       = $_POST['idCliente'];
	if ( !empty($_POST['Nombre']) )            $Nombre          = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )               $Rut             = $_POST['Rut'];
	if ( !empty($_POST['Parentesco']) )        $Parentesco      = $_POST['Parentesco'];
	if ( !empty($_POST['Condicion']) )         $Condicion       = $_POST['Condicion'];
	if ( !empty($_POST['fNacimiento']) )       $fNacimiento     = $_POST['fNacimiento'];
	if ( !empty($_POST['Ingreso']) )           $Ingreso 	    = $_POST['Ingreso'];
	if ( !empty($_POST['Actividad']) )         $Actividad 	    = $_POST['Actividad'];
?>