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
	if ( !empty($_POST['idEmpresa']) ) 	         $idEmpresa 	      = $_POST['idEmpresa'];
	if ( !empty($_POST['Nombre']) ) 	         $Nombre 	          = $_POST['Nombre'];
	if ( !empty($_POST['Abreviatura']) )         $Abreviatura 	      = $_POST['Abreviatura'];
	if ( !empty($_POST['email']) )		         $email		          = $_POST['email'];
	if ( !empty($_POST['Rut']) ) 	             $Rut 	              = $_POST['Rut'];
	if ( !empty($_POST['Direccion']) ) 	         $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['web']) ) 	             $web 	              = $_POST['web'];
	if ( !empty($_POST['Nombre_contrato']) )     $Nombre_contrato     = $_POST['Nombre_contrato'];
	if ( !empty($_POST['N_contrato']) ) 	     $N_contrato 	      = $_POST['N_contrato'];
	if ( !empty($_POST['Fono']) ) 	             $Fono 	              = $_POST['Fono'];
	if ( !empty($_POST['Contacto']) ) 	         $Contacto 	          = $_POST['Contacto'];
	if ( !empty($_POST['Pais']) ) 	             $Pais 	              = $_POST['Pais'];
	if ( !empty($_POST['Ciudad']) ) 	         $Ciudad 	          = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) ) 	         $Comuna 	          = $_POST['Comuna'];
	if ( !empty($_POST['Fax']) ) 	             $Fax 	              = $_POST['Fax'];
	if ( !empty($_POST['Rubro']) ) 	             $Rubro 	          = $_POST['Rubro'];	
	if ( !empty($_POST['Fecha_ini_con']) )       $Fecha_ini_con       = $_POST['Fecha_ini_con'];
	if ( !empty($_POST['Fecha_term_con']) )      $Fecha_term_con      = $_POST['Fecha_term_con'];
	if ( !empty($_POST['duracion_contrato']) )   $duracion_contrato   = $_POST['duracion_contrato'];
	
	
?>