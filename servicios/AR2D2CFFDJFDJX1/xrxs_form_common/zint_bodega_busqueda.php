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
	if ( !empty($_POST['fecha_desde']) ) 	  $fecha_desde        = $_POST['fecha_desde'];
    if ( !empty($_POST['fecha_hasta']) ) 	  $fecha_hasta 	      = $_POST['fecha_hasta'];
	if ( !empty($_POST['cliente_interno']) )  $cliente_interno 	  = $_POST['cliente_interno'];
	if ( !empty($_POST['cliente_externo']) )  $cliente_externo    = $_POST['cliente_externo'];
	if ( !empty($_POST['responsable']) ) 	  $responsable 	      = $_POST['responsable'];
	if ( !empty($_POST['estado']) ) 	      $estado 	          = $_POST['estado'];
	if ( !empty($_POST['n_solicitud']) ) 	  $n_solicitud 	      = $_POST['n_solicitud'];
?>