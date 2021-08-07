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
	if ( !empty($_POST['idAsistencia']) )         $idAsistencia         = $_POST['idAsistencia'];
	if ( !empty($_POST['idCliente']) )      	  $idCliente            = $_POST['idCliente'];
	if ( !empty($_POST['idEvento']) )         	  $idEvento             = $_POST['idEvento'];
	if ( !empty($_POST['Fecha_inscripcion']) )    $Fecha_inscripcion    = $_POST['Fecha_inscripcion'];
	if ( !empty($_POST['Estado']) )      	      $Estado               = $_POST['Estado'];

?>