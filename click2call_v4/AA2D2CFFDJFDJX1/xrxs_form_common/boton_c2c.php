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
	if ( !empty($_POST['nombre']) ) 	$nombre 	= $_POST['nombre'];
	if ( !empty($_POST['mensaje']) ) 	$mensaje 	= $_POST['mensaje'];
	if ( !empty($_POST['mail']) ) 	    $mail 	    = $_POST['mail'];
	if ( !empty($_POST['telefono']) ) 	$telefono 	= $_POST['telefono'];
	if ( !empty($_POST['asunto']) ) 	$asunto 	= $_POST['asunto'];
?>