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

//Filtro para idTipoCliente
if ( !empty($_GET['new']) )   $idUsuario      = $_GET['new'];
if ( !empty($_GET['new']) )   $idUsuario      = $_GET['new'];

			//filtro de idUsuario 
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a = "'".$idUsuario."'" ;
		}else{
			$a ="''";
        }		
// inserto los datos de registro en la db
		$query  = "INSERT INTO `preguntas_listado` (idUsuario) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		$ultimo_id = mysql_insert_id($dbConn);
		
	
		header( 'Location: '.$location.'&id='.$ultimo_id );
		die;



?>