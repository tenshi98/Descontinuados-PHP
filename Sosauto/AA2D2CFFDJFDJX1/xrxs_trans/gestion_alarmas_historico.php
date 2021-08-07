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
	if ( !empty($_POST['rango_a']) )    $rango_a     = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) )    $rango_b     = $_POST['rango_b'];
	if ( !empty($_POST['Sexo']) )       $Sexo        = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )   $idCiudad    = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )   $idComuna    = $_POST['idComuna'];
	if ( !empty($_POST['Marca']) )      $Marca       = $_POST['Marca'];
	if ( !empty($_POST['Modelo']) )     $Modelo      = $_POST['Modelo'];
	if ( !empty($_POST['Tipo_v']) )     $Tipo_v      = $_POST['Tipo_v'];
	if ( !empty($_POST['Color_1']) )    $Color_1     = $_POST['Color_1'];
	if ( !empty($_POST['Color_2']) )    $Color_2     = $_POST['Color_2'];
	if ( !empty($_POST['Fecha']) )      $Fecha       = $_POST['Fecha'];
	
	
		//Genero el filtro
		$q = '?filter=true';
		if(isset($idCliente) && $idCliente != '')  { $q .= '&idCliente='.$idCliente ; }
		if(isset($rango_a) && $rango_a != '')      { $q .= '&rango_a='.$rango_a ; }
		if(isset($rango_b) && $rango_b != '')      { $q .= '&rango_b='.$rango_b ; }
		if(isset($Sexo) && $Sexo != '')            { $q .= '&Sexo='.$Sexo ; }
		if(isset($idCiudad) && $idCiudad != '')    { $q .= '&idCiudad='.$idCiudad ; }
		if(isset($idComuna) && $idComuna != '')    { $q .= '&idComuna='.$idComuna ; }
		if(isset($Marca) && $Marca != '')          { $q .= '&Marca='.$Marca ; }
		if(isset($Modelo) && $Modelo != '')        { $q .= '&Modelo='.$Modelo ; }
		if(isset($Tipo_v) && $Tipo_v != '')        { $q .= '&Tipo_v='.$Tipo_v ; }
		if(isset($Color_1) && $Color_1 != '')      { $q .= '&Color_1='.$Color_1 ; }
		if(isset($Color_2) && $Color_2 != '')      { $q .= '&Color_2='.$Color_2 ; }
		if(isset($Fecha) && $Fecha != '')          { $q .= '&Fecha='.$Fecha ; }
		$q .= '&pagina=1';
		
		header( 'Location: '.$location.$q );
		die;



?>