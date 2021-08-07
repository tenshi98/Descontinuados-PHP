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
	if ( !empty($_POST['idUsuario']) )     $idUsuario       = $_POST['idUsuario'];
	if ( !empty($_POST['usuario']) )       $usuario         = $_POST['usuario'];
	if ( !empty($_POST['password']) )      $password        = $_POST['password'];
	if ( !empty($_POST['tipo']) )          $tipo            = $_POST['tipo'];
	if ( !empty($_POST['estado']) )        $estado          = $_POST['estado'];
	if ( !empty($_POST['email']) )         $email           = $_POST['email'];
	if ( !empty($_POST['web']) )           $web             = $_POST['web'];
	if ( !empty($_POST['nombre']) )        $nombre          = $_POST['nombre'];
	if ( !empty($_POST['rut']) )           $rut             = $_POST['rut'];
	if ( !empty($_POST['fNacimiento']) )   $fNacimiento     = $_POST['fNacimiento'];
	if ( !empty($_POST['direccion']) )     $direccion       = $_POST['direccion'];
	if ( !empty($_POST['fono']) )          $fono            = $_POST['fono'];
	if ( !empty($_POST['pais']) )          $pais            = $_POST['pais'];
	if ( !empty($_POST['ciudad']) )        $ciudad          = $_POST['ciudad'];
	if ( !empty($_POST['comuna']) )        $comuna          = $_POST['comuna'];
	if ( !empty($_POST['fax']) )           $fax             = $_POST['fax'];
	if ( !empty($_POST['idEmpresa']) )     $idEmpresa       = $_POST['idEmpresa'];
?>