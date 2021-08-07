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
	if ( !empty($_POST['idPropietario']) )        $idPropietario        = $_POST['idPropietario'];	
	if ( !empty($_POST['Nombre']) )               $Nombre 	            = $_POST['Nombre'];
	if ( !empty($_POST['Apellido_Paterno']) )     $Apellido_Paterno     = $_POST['Apellido_Paterno'];
	if ( !empty($_POST['Apellido_Materno']) )     $Apellido_Materno     = $_POST['Apellido_Materno'];
	if ( !empty($_POST['Rut']) )                  $Rut 	                = $_POST['Rut'];
	if ( !empty($_POST['Sexo']) )                 $Sexo 	            = $_POST['Sexo'];
	if ( !empty($_POST['fNacimiento']) )          $fNacimiento 	        = $_POST['fNacimiento'];
	if ( !empty($_POST['email']) )                $email 	            = $_POST['email'];
	if ( !empty($_POST['Pais']) )                 $Pais 	            = $_POST['Pais'];
	if ( !empty($_POST['idCiudad']) )             $idCiudad 	        = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )             $idComuna 	        = $_POST['idComuna'];	
	if ( !empty($_POST['Direccion']) )            $Direccion 	        = $_POST['Direccion'];
	if ( !empty($_POST['Fono1']) )                $Fono1 	            = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )                $Fono2 	            = $_POST['Fono2'];
	if ( !empty($_POST['NombreEmpresa']) )        $NombreEmpresa 	    = $_POST['NombreEmpresa'];


?>