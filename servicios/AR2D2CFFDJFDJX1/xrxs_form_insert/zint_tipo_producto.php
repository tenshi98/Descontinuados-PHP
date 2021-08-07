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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])  ) { 
	
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a = "'".$idEmpresa."'" ;
		}else{
			$a ="''";
        }
		//filtro de Tipo_producto
		if(isset($Tipo_producto) && $Tipo_producto != ''){ 
        	$b = "'".$Tipo_producto."'" ;
		}else{
			$b ="''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `zint_tipo_prod` (idEmpresa, Tipo_producto) VALUES ({$a},{$b})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>