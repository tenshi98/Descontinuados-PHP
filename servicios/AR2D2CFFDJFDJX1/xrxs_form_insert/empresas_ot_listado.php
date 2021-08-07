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
// si no hay errores ejecuto el codigo	
if ( empty($errors[1])   ) { 
	
		
		//defino variables
		$idEmpresa = $_GET['new_ot'];
		$idUsuario = $arrUsuario['idUsuario'];
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_ot_listado` (idEmpresa, idUsuario) VALUES ('$idEmpresa','$idUsuario' )";
		$result = mysql_query($query, $dbConn);
		
		//recibo el último id generado por mi sesion
     	$ultimo_id = mysql_insert_id($dbConn);
	
	
		header( 'Location: '.$location.'?new='.$ultimo_id.'&emp='.$idEmpresa );
		die;
		}
?>