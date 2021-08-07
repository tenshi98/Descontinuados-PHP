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
	if ( !empty($_POST['id_antecedentes']) )    $id_antecedentes      = $_POST['id_antecedentes'];
	if ( !empty($_POST['descripcion']) )      	$descripcion          = $_POST['descripcion'];

?>