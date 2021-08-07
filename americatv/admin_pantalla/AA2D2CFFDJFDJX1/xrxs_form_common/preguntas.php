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
	if ( !empty($_POST['idInterfaz']) )   $idInterfaz     = $_POST['idInterfaz'];
	if ( !empty($_POST['idCatPreg']) )    $idCatPreg      = $_POST['idCatPreg'];
	if ( !empty($_POST['Pregunta']) )     $Pregunta       = $_POST['Pregunta'];
	if ( !empty($_POST['Opcion1']) )      $Opcion1        = $_POST['Opcion1'];
	if ( !empty($_POST['Opcion2']) )      $Opcion2        = $_POST['Opcion2'];
	if ( !empty($_POST['Estado']) )       $Estado         = $_POST['Estado'];
	
?>