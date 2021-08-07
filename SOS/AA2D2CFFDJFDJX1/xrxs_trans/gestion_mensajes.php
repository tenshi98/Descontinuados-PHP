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
	if ( !empty($_POST['idCliente']) )  $idCliente   = $_POST['idCliente'];
	if ( !empty($_POST['Sexo']) )       $Sexo        = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )   $idCiudad    = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )   $idComuna    = $_POST['idComuna'];

	
	
		//Genero el filtro
		$q = '?filter=true';
		if(isset($idCliente) && $idCliente != '')  { $q .= '&idCliente='.$idCliente ; }
		if(isset($Sexo) && $Sexo != '')            { $q .= '&Sexo='.$Sexo ; }
		if(isset($idCiudad) && $idCiudad != '')    { $q .= '&idCiudad='.$idCiudad ; }
		if(isset($idComuna) && $idComuna != '')    { $q .= '&idComuna='.$idComuna ; }
			
		header( 'Location: '.$location.$q );
		die;



?>