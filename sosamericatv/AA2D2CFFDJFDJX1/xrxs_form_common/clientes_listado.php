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
	if ( !empty($_POST['fcreacion']) )            $fcreacion            = $_POST['fcreacion'];
	if ( !empty($_POST['password']) )             $password             = $_POST['password'];
	if ( !empty($_POST['Estado']) )               $Estado 	            = $_POST['Estado'];
	if ( !empty($_POST['email']) )                $email 	            = $_POST['email'];
	if ( !empty($_POST['Nombre']) )               $Nombre 	            = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )                  $Rut 	                = $_POST['Rut'];
	if ( !empty($_POST['Sexo']) )                 $Sexo 	            = $_POST['Sexo'];
	if ( !empty($_POST['fNacimiento']) )          $fNacimiento 	        = $_POST['fNacimiento'];
	if ( !empty($_POST['Direccion']) )            $Direccion 	        = $_POST['Direccion'];
	if ( !empty($_POST['Fono1']) )                $Fono1 	            = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )                $Fono2 	            = $_POST['Fono2'];
	if ( !empty($_POST['Pais']) )                 $Pais 	            = $_POST['Pais'];
	if ( !empty($_POST['idCiudad']) )             $idCiudad 	        = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )             $idComuna 	        = $_POST['idComuna'];
	if ( !empty($_POST['primer_ingreso']) )       $primer_ingreso 	    = $_POST['primer_ingreso'];
	if ( !empty($_POST['Imei']) )                 $Imei 	            = $_POST['Imei'];
	if ( !empty($_POST['Gsm']) )                  $Gsm 	                = $_POST['Gsm'];
	if ( !empty($_POST['Latitud']) )              $Latitud 	            = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) )             $Longitud 	        = $_POST['Longitud'];
	if ( !empty($_POST['Radio']) )                $Radio 	            = $_POST['Radio'];
	if ( !empty($_POST['Alarma']) )               $Alarma 	            = $_POST['Alarma'];
?>