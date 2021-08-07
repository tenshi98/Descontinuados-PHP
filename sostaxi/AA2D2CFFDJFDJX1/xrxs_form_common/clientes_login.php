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
	if ( !empty($_POST['usuario']) ) 	    $usuario 	    = $_POST['usuario'];
	if ( !empty($_POST['password']) )	    $password 	    = $_POST['password'];	
?>