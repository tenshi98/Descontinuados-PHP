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
	if ( !empty($_POST['idComment']) ) 	     $idComment	       = $_POST['idComment'];
	if ( !empty($_POST['idOt']) )            $idOt             = $_POST['idOt'];
	if ( !empty($_POST['Texto']) )           $Texto            = $_POST['Texto'];
?>