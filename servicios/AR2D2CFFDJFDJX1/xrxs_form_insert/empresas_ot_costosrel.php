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
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$b = "'".$idEmpresa."'" ;
		}else{
			$b ="''";
        }
		//filtro de Texto
		if(isset($Texto) && $Texto != ''){ 
        	$c = "'".$Texto."'" ;
		}else{
			$c ="''";
        }
		//filtro de costo
		if(isset($costo) && $costo != ''){ 
        	$d = "'".$costo."'" ;
		}else{
			$d ="''";
        }

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_ot_costosrel` (idOt, idEmpresa, Texto, costo) VALUES ({$a},{$b},{$c},{$d})";
		$result = mysql_query($query, $dbConn);

		header( 'Location: '.$location );
		die;
		}
?>