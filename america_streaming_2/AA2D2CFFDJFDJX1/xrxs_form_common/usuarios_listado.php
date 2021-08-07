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
	if ( !empty($_POST['idUsuario']) )      $idUsuario        = $_POST['idUsuario'];
	if ( !empty($_POST['usuario']) )        $usuario          = $_POST['usuario'];
	if ( !empty($_POST['oldpassword']) )    $oldpassword      = $_POST['oldpassword'];
	if ( !empty($_POST['password']) )       $password         = $_POST['password'];
	if ( !empty($_POST['repassword']) )     $repassword       = $_POST['repassword'];
	if ( !empty($_POST['tipo']) )           $tipo             = $_POST['tipo'];
	if ( !empty($_POST['Estado']) )         $Estado 	      = $_POST['Estado'];
	if ( !empty($_POST['email']) )          $email 	          = $_POST['email'];
	if ( !empty($_POST['Nombre']) )         $Nombre 	      = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )            $Rut 	          = $_POST['Rut'];
	if ( !empty($_POST['fNacimiento']) )    $fNacimiento 	  = $_POST['fNacimiento'];
	if ( !empty($_POST['Fono']) )           $Fono 	          = $_POST['Fono'];
	if ( !empty($_POST['idCiudad']) )       $idCiudad 	      = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )       $idComuna 	      = $_POST['idComuna'];
	if ( !empty($_POST['idCalle']) )        $idCalle 	      = $_POST['idCalle'];
	if ( !empty($_POST['n_calle']) )        $n_calle 	      = $_POST['n_calle'];
	if ( !empty($_POST['Direccion_img']) )  $Direccion_img    = $_POST['Direccion_img'];
	if ( !empty($_POST['mode']) )           $mode             = $_POST['mode'];
?>