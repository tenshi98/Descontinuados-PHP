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
	if ( !empty($_POST['idCliente']) )     $idCliente      = $_POST['idCliente'];
	if ( !empty($_POST['rango_a']) )       $rango_a        = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) )       $rango_b        = $_POST['rango_b'];
	if ( !empty($_POST['Sexo']) )          $Sexo           = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )      $idCiudad       = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )      $idComuna       = $_POST['idComuna'];
	if ( !empty($_POST['idTipoAlerta']) )  $idTipoAlerta   = $_POST['idTipoAlerta'];
	
	
		//Genero el filtro
		$q = '?filter=true';
		if(isset($idCliente) && $idCliente != '')        { $q .= '&idCliente='.$idCliente ; }
		if(isset($rango_a) && $rango_a != '')            { $q .= '&rango_a='.$rango_a ; }
		if(isset($rango_b) && $rango_b != '')            { $q .= '&rango_b='.$rango_b ; }
		if(isset($Sexo) && $Sexo != '')                  { $q .= '&Sexo='.$Sexo ; }
		if(isset($idCiudad) && $idCiudad != '')          { $q .= '&idCiudad='.$idCiudad ; }
		if(isset($idComuna) && $idComuna != '')          { $q .= '&idComuna='.$idComuna ; }
		if(isset($idTipoAlerta) && $idTipoAlerta != '')  { $q .= '&idTipoAlerta='.$idTipoAlerta ; }
		$q .= '&pagina=1';
		
		header( 'Location: '.$location.$q );
		die;



?>