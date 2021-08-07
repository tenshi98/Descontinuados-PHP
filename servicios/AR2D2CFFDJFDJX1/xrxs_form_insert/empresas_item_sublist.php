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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])   ) { 
	
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a = "'".$idEmpresa."'" ;
		}else{
			$a ="''";
        }
		//filtro de idItemlist
		if(isset($idItemlist) && $idItemlist != ''){ 
        	$b = "'".$idItemlist."'" ;
		}else{
			$b ="''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$c = "'".$Nombre."'" ;
		}else{
			$c ="''";
        }
		//filtro de idFrecuencia
		if(isset($idFrecuencia) && $idFrecuencia != ''){ 
        	$d = "'".$idFrecuencia."'" ;
		}else{
			$d ="''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_item_sublist` (idEmpresa, idItemlist,Nombre, idFrecuencia) VALUES ({$a},{$b},{$c},{$d})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>