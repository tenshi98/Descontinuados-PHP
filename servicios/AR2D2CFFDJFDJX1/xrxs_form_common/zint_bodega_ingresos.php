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
	if ( !empty($_POST['idBodega']) ) 	   $idBodega	   = $_POST['idBodega'];
	if ( !empty($_POST['idEmpresa']) ) 	   $idEmpresa      = $_POST['idEmpresa'];
	if ( !empty($_POST['idArticulo']) )    $idArticulo     = $_POST['idArticulo'];
	if ( !empty($_POST['fMovimiento']) )   $fMovimiento    = $_POST['fMovimiento'];
	if ( !empty($_POST['Cantidad']) ) 	   $Cantidad       = $_POST['Cantidad'];
	if ( !empty($_POST['Valor']) ) 	       $Valor          = $_POST['Valor'];
	if ( !empty($_POST['operacion']) ) 	   $operacion      = $_POST['operacion'];
	if ( !empty($_POST['contar_cero']) )   $contar_cero    = $_POST['contar_cero'];
	if ( !empty($_POST['Tipo_doc']) ) 	   $Tipo_doc       = $_POST['Tipo_doc'];
	if ( !empty($_POST['N_doc']) ) 	       $N_doc          = $_POST['N_doc'];
	if ( !empty($_POST['idUsuario']) ) 	   $idUsuario      = $_POST['idUsuario'];
	if ( !empty($_POST['Estado']) ) 	   $Estado         = $_POST['Estado'];
	if ( !empty($_POST['Procedencia']) )   $Procedencia    = $_POST['Procedencia'];
	if ( !empty($_POST['Comentario']) )    $Comentario     = $_POST['Comentario'];
	if ( !empty($_POST['idSolicitud']) )   $idSolicitud    = $_POST['idSolicitud'];
	if ( !empty($_POST['Conversor']) )     $Conversor      = $_POST['Conversor'];
	
?>