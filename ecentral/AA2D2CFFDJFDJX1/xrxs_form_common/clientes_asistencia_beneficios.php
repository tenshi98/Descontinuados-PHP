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
	if ( !empty($_POST['idBeneficios']) )      $idBeneficios      = $_POST['idBeneficios'];
	if ( !empty($_POST['idCliente']) )         $idCliente         = $_POST['idCliente'];
	if ( !empty($_POST['id_sociallist']) )     $id_sociallist     = $_POST['id_sociallist'];
	if ( !empty($_POST['fAtencion']) )         $fAtencion         = $_POST['fAtencion'];
	if ( !empty($_POST['idAntecedente']) )     $idAntecedente     = $_POST['idAntecedente'];
	if ( !empty($_POST['Resultado']) )         $Resultado         = $_POST['Resultado'];
	if ( !empty($_POST['Valor']) )             $Valor 	          = $_POST['Valor'];
	if ( !empty($_POST['idUsuario']) )         $idUsuario 	      = $_POST['idUsuario'];
?>