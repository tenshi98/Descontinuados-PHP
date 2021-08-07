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
	if ( !empty($_POST['idUsuario']) )  $idUsuario   = $_POST['idUsuario'];
	if ( !empty($_POST['Tipo']) )       $Tipo        = $_POST['Tipo'];
	if ( !empty($_POST['rango_a']) )    $rango_a     = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) )    $rango_b     = $_POST['rango_b'];
	
		//Genero el filtro
		$q = '?filter=true';
		if(isset($idUsuario) && $idUsuario != '')  { $q .= '&idUsuario='.$idUsuario ; }
		if(isset($Tipo) && $Tipo != '')            { $q .= '&Tipo='.$Tipo ; }
		if(isset($rango_a) && $rango_a != '')      { $q .= '&rango_a='.$rango_a ; }
		if(isset($rango_b) && $rango_b != '')      { $q .= '&rango_b='.$rango_b ; }
			
		header( 'Location: '.$location.$q );
		die;
?>