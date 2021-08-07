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
	if ( !empty($_POST['comun1']) ) 	 $comun1 	    = $_POST['comun1'];
	if ( !empty($_POST['comun2']) ) 	 $comun2 	    = $_POST['comun2'];
	if ( !empty($_POST['comun3']) )      $comun3 	    = $_POST['comun3'];
	if ( !empty($_POST['comun4']) )		 $comun4		= $_POST['comun4'];
?>