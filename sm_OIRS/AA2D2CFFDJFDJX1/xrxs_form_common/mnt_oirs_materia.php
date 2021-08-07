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
	if ( !empty($_POST['id_materia']) )    $id_materia         = $_POST['id_materia'];
	if ( !empty($_POST['descripcion']) )   $descripcion        = $_POST['descripcion'];
?>