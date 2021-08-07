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
	if ( !empty($_POST['idInterfaz']) )   $idInterfaz     = $_POST['idInterfaz'];
	if ( !empty($_POST['Nombre']) )       $Nombre         = $_POST['Nombre'];
	if ( !empty($_POST['img_fondo']) )    $img_fondo      = $_POST['img_fondo'];
	if ( !empty($_POST['img_icono']) )    $img_icono      = $_POST['img_icono'];

	
?>