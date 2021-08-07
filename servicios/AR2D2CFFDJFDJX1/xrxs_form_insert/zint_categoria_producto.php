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
		//filtro de Cat_prod
		if(isset($Cat_prod) && $Cat_prod != ''){ 
        	$b = "'".$Cat_prod."'" ;
		}else{
			$b ="''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `zint_cat_prod` (idEmpresa, Cat_prod) VALUES ({$a},{$b})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>