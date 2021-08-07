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
	if ( !empty($_POST['tipo']) )       $tipo        = $_POST['tipo'];
	if ( !empty($_POST['idComuna']) )   $idComuna    = $_POST['idComuna'];

	
	
		//Genero el filtro
		$q = '?filter=true';
		if(isset($idCliente) && $idCliente != '')  { $q .= '&idCliente='.$idCliente ; }
		if(isset($rango_a) && $rango_a != '')      { $q .= '&rango_a='.$rango_a ; }
		if(isset($rango_b) && $rango_b != '')      { $q .= '&rango_b='.$rango_b ; }
		if(isset($tipo) && $tipo != '')            { $q .= '&tipo='.$tipo ; }
		if(isset($idComuna) && $idComuna != '')    { $q .= '&idComuna='.$idComuna ; }
		$q .= '&pagina=1';
		
		header( 'Location: '.$location.$q );
		die;



?>