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
if ( empty($errors[1]) && empty($errors[2])   ) { 
	
		//Filtro para idOt
		if(isset($idOt) && $idOt != ''){ 
        	$a = "'".$idOt."'" ;
		}else{
			$a ="''";
        }
		//filtro de idSublist
		if(isset($idSublist) && $idSublist != ''){ 
        	$b = "'".$idSublist."'" ;
		}else{
			$b ="''";
        }
		//filtro de idNombre
		if(isset($idNombre) && $idNombre != ''){ 
        	$c = "'".$idNombre."'" ;
		}else{
			$c ="''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_ot_tareas` (idOt, idSublist, idNombre) VALUES ({$a},{$b},{$c})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>