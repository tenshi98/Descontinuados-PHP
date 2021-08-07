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
	if ( !empty($_POST['idArticulo']) )      $idArticulo     = $_POST['idArticulo'];
	if ( !empty($_POST['idEmpresa']) ) 	     $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['Nombre_art']) ) 	 $Nombre_art     = $_POST['Nombre_art'];
	if ( !empty($_POST['idTipo_prod']) ) 	 $idTipo_prod    = $_POST['idTipo_prod'];
	if ( !empty($_POST['idCat_prod']) ) 	 $idCat_prod     = $_POST['idCat_prod'];
	if ( !empty($_POST['idUml']) ) 	         $idUml          = $_POST['idUml'];
	if ( !empty($_POST['Cap_grad_min']) ) 	 $Cap_grad_min   = $_POST['Cap_grad_min'];
	if ( !empty($_POST['idEmbalaje']) ) 	 $idEmbalaje     = $_POST['idEmbalaje'];
	if ( !empty($_POST['Marca']) ) 	         $Marca          = $_POST['Marca'];
?>