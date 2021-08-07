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
	if ( !empty($_POST['idOt']) ) 	     $idOt	         = $_POST['idOt'];
	if ( !empty($_POST['idEmpresa']) )   $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['f_Inicio']) )    $f_Inicio       = $_POST['f_Inicio'];
	if ( !empty($_POST['f_Termino']) )   $f_Termino      = $_POST['f_Termino'];
	if ( !empty($_POST['h_Inicio']) )    $h_Inicio       = $_POST['h_Inicio'];
	if ( !empty($_POST['h_Termino']) )   $h_Termino      = $_POST['h_Termino'];
	if ( !empty($_POST['idItemlist']) )  $idItemlist     = $_POST['idItemlist'];
	if ( !empty($_POST['Estado']) ) 	 $Estado         = $_POST['Estado'];
	if ( !empty($_POST['idUsuario']) ) 	 $idUsuario      = $_POST['idUsuario'];
	if ( !empty($_POST['t_usado']) ) 	 $t_usado        = $_POST['t_usado'];
	if ( !empty($_POST['n_Doc']) ) 	     $n_Doc          = $_POST['n_Doc'];
	if ( !empty($_POST['cantidad']) )    $cantidad       = $_POST['cantidad'];
	if ( !empty($_POST['idUbicacion']) ) $idUbicacion    = $_POST['idUbicacion'];	
?>