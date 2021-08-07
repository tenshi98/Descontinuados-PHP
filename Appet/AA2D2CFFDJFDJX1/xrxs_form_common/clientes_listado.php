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
	if ( !empty($_POST['idCliente']) )            $idCliente            = $_POST['idCliente'];
	if ( !empty($_POST['usuario']) )              $usuario              = $_POST['usuario'];
	if ( !empty($_POST['fcreacion']) )            $fcreacion            = $_POST['fcreacion'];
	if ( !empty($_POST['oldpassword']) )          $oldpassword          = $_POST['oldpassword'];
	if ( !empty($_POST['password']) )             $password             = $_POST['password'];
	if ( !empty($_POST['repassword']) )           $repassword           = $_POST['repassword'];
	if ( !empty($_POST['Estado']) )               $Estado 	            = $_POST['Estado'];
	if ( !empty($_POST['email']) )                $email 	            = $_POST['email'];
	if ( !empty($_POST['Nombres']) )              $Nombres 	            = $_POST['Nombres'];
	if ( !empty($_POST['ApellidoPat']) )          $ApellidoPat 	        = $_POST['ApellidoPat'];
	if ( !empty($_POST['ApellidoMat']) )          $ApellidoMat 	        = $_POST['ApellidoMat'];
	if ( !empty($_POST['Rut']) )                  $Rut 	                = $_POST['Rut'];
	if ( !empty($_POST['Sexo']) )                 $Sexo 	            = $_POST['Sexo'];
	if ( !empty($_POST['fNacimiento']) )          $fNacimiento 	        = $_POST['fNacimiento'];	
	if ( !empty($_POST['Pais']) )                 $Pais 	            = $_POST['Pais'];
	if ( !empty($_POST['idCiudad']) )             $idCiudad 	        = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )             $idComuna 	        = $_POST['idComuna'];
	if ( !empty($_POST['idVilla']) )              $idVilla 	            = $_POST['idVilla'];
	if ( !empty($_POST['idCalle']) )              $idCalle 	            = $_POST['idCalle'];
	if ( !empty($_POST['n_calle']) )              $n_calle 	            = $_POST['n_calle'];
	if ( !empty($_POST['Fono1']) )                $Fono1 	            = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )                $Fono2 	            = $_POST['Fono2'];
	if ( !empty($_POST['Ultimo_acceso']) )        $Ultimo_acceso 	    = $_POST['Ultimo_acceso'];
	if ( !empty($_POST['Codigo_activacion']) )    $Codigo_activacion    = $_POST['Codigo_activacion'];
	
?>