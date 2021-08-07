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
	if ( !empty($_POST['idEvento']) )       $idEvento         = $_POST['idEvento'];
	if ( !empty($_POST['id_sociallist']) )  $id_sociallist    = $_POST['id_sociallist'];
	if ( !empty($_POST['Titulo']) )         $Titulo           = $_POST['Titulo'];
	if ( !empty($_POST['Fecha']) )      	$Fecha            = $_POST['Fecha'];
	if ( !empty($_POST['year']) )      	    $year             = $_POST['year'];
	if ( !empty($_POST['month']) )      	$month            = $_POST['month'];
	if ( !empty($_POST['day']) )      	    $day              = $_POST['day'];
	if ( !empty($_POST['Descripcion']) )    $Descripcion      = $_POST['Descripcion'];
	if ( !empty($_POST['Color']) )          $Color            = $_POST['Color'];

?>