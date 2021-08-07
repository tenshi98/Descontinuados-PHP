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
if ( empty($errors[1])  ) { 
	
		//Filtro para idOt
		if(isset($idOt) && $idOt != ''){ 
        	$a = "'".$idOt."'" ;
		}else{
			$a ="''";
        }
		//filtro de idTrabajador
		if(isset($idTrabajador) && $idTrabajador != ''){ 
        	$b = "'".$idTrabajador."'" ;
		}else{
			$b ="''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_ot_resp` (idOt, idTrabajador) VALUES ({$a},{$b})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>