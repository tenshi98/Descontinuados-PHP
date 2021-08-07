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
	
		//Filtro para idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a = "'".$idUsuario."'" ;
		}else{
			$a ="''";
        }
		//filtro de idAdmin_permisos
		if(isset($idAdmin_permisos) && $idAdmin_permisos != ''){ 
        	$b = "'".$idAdmin_permisos."'" ;
		}else{
			$b ="''";
        }

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `usuarios_accesos` (idUsuario, idAdmin_permisos) VALUES ({$a},{$b} )";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>