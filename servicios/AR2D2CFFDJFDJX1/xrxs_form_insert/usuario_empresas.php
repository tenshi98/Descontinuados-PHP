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
if ( empty($errors[1])    ) { 
	
		//Filtro para idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a = "'".$idUsuario."'" ;
		}else{
			$a ="''";
        }
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$b = "'".$idEmpresa."'" ;
		}else{
			$b ="''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `usuarios_empresas` (idUsuario, idEmpresa) VALUES ({$a},{$b} )";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>