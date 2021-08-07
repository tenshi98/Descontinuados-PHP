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
	if ( !empty($_POST['idCliente']) )      $idCliente       = $_POST['idCliente'];
	if ( !empty($_POST['rango_a']) )        $rango_a         = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) )        $rango_b         = $_POST['rango_b'];
	if ( !empty($_POST['Sexo']) )           $Sexo            = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )       $idCiudad        = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )       $idComuna        = $_POST['idComuna'];
	if ( !empty($_POST['idMarca']) )        $idMarca         = $_POST['idMarca'];
	if ( !empty($_POST['idModelo']) )       $idModelo        = $_POST['idModelo'];
	if ( !empty($_POST['idTransmision']) )  $idTransmision   = $_POST['idTransmision'];
	if ( !empty($_POST['idColorV_1']) )     $idColorV_1      = $_POST['idColorV_1'];
	if ( !empty($_POST['idColorV_2']) )     $idColorV_2      = $_POST['idColorV_2'];
	if ( !empty($_POST['fTransferencia']) ) $fTransferencia  = $_POST['fTransferencia'];
	if ( !empty($_POST['fFabricacion']) )   $fFabricacion    = $_POST['fFabricacion'];
	if ( !empty($_POST['N_Motor']) )        $N_Motor         = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )       $N_Chasis        = $_POST['N_Chasis'];
	
		//Genero el filtro
		$q = '?filter=true';
		if(isset($idCliente) && $idCliente != '')            { $q .= '&idCliente='.$idCliente ; }
		if(isset($rango_a) && $rango_a != '')                { $q .= '&rango_a='.$rango_a ; }
		if(isset($rango_b) && $rango_b != '')                { $q .= '&rango_b='.$rango_b ; }
		if(isset($Sexo) && $Sexo != '')                      { $q .= '&Sexo='.$Sexo ; }
		if(isset($idCiudad) && $idCiudad != '')              { $q .= '&idCiudad='.$idCiudad ; }
		if(isset($idComuna) && $idComuna != '')              { $q .= '&idComuna='.$idComuna ; }
		if(isset($idMarca) && $idMarca != '')                { $q .= '&idMarca='.$idMarca ; }
		if(isset($idModelo) && $idModelo != '')              { $q .= '&idModelo='.$idModelo ; }
		if(isset($idTransmision) && $idTransmision != '')    { $q .= '&idTransmision='.$idTransmision ; }
		if(isset($idColorV_1) && $idColorV_1 != '')          { $q .= '&idColorV_1='.$idColorV_1 ; }
		if(isset($idColorV_2) && $idColorV_2 != '')          { $q .= '&idColorV_2='.$idColorV_2 ; }
		if(isset($fTransferencia) && $fTransferencia != '')  { $q .= '&fTransferencia='.$fTransferencia ; }
		if(isset($fFabricacion) && $fFabricacion != '')      { $q .= '&fFabricacion='.$fFabricacion ; }
		if(isset($N_Motor) && $N_Motor != '')                { $q .= '&N_Motor='.$N_Motor ; }
		if(isset($N_Chasis) && $N_Chasis != '')              { $q .= '&N_Chasis='.$N_Chasis ; }
		$q .= '&pagina=1';
		
		header( 'Location: '.$location.$q );
		die;

?>