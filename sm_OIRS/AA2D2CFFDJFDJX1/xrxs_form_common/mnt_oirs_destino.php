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
	if ( !empty($_POST['id_origen_b']) )    $id_origen_b     = $_POST['id_origen_b'];
	if ( !empty($_POST['descripcion']) )    $descripcion     = $_POST['descripcion'];
	if ( !empty($_POST['int_ext']) )        $int_ext         = $_POST['int_ext'];
?>