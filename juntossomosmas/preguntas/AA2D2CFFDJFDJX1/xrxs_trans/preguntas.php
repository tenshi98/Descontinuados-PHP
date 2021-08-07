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
	if ( !empty($_POST['idPregunta']) )   $idPregunta     = $_POST['idPregunta'];
	if ( !empty($_POST['idCatPreg']) )    $idCatPreg      = $_POST['idCatPreg'];
	if ( !empty($_POST['Pregunta']) )     $Pregunta       = $_POST['Pregunta'];
	if ( !empty($_POST['link_data']) )    $link_data      = $_POST['link_data'];
	if ( !empty($_POST['Opcion1']) )      $Opcion1        = $_POST['Opcion1'];
	if ( !empty($_POST['Opcion2']) )      $Opcion2        = $_POST['Opcion2'];
	if ( !empty($_POST['Opcion3']) )      $Opcion3        = $_POST['Opcion3'];
	if ( !empty($_POST['Opcion4']) )      $Opcion4        = $_POST['Opcion4'];
	if ( !empty($_POST['Opcion5']) )      $Opcion5        = $_POST['Opcion5'];
	if ( !empty($_POST['Estado']) )       $Estado         = $_POST['Estado'];
	if ( !empty($_POST['fecha']) )       $fecha         = $_POST['fecha'];
		if ( !empty($_POST['quien']) )       $quien         = $_POST['quien'];
	//No se guarda en la base de datos
	if ( !empty($_POST['collapsekey']) )  $collapsekey    = $_POST['collapsekey'];
	
?>