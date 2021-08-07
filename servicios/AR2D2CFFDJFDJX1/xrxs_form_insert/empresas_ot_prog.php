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
	
		//Filtro para idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a = "'".$idEmpresa."'" ;
		}else{
			$a ="''";
        }
		//filtro de idFrecuencia
		if(isset($idFrecuencia) && $idFrecuencia != ''){ 
        	$b = "'".$idFrecuencia."'" ;
		}else{
			$b ="''";
        }
		//filtro de valor
		if(isset($valor) && $valor != ''){ 
        	$c = "'".$valor."'" ;
		}else{
			$c ="''";
        }
		//filtro de month
		if(isset($month) && $month != ''){ 
        	$d = "'".$month."'" ;
		}else{
			$d ="''";
        }
		//filtro de year
		if(isset($year) && $year != ''){ 
        	$e = "'".$year."'" ;
		}else{
			$e ="''";
        }

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_ot_prog` (idEmpresa, idFrecuencia,valor,month,year) VALUES ({$a},{$b},{$c},{$d},{$e})";
		$result = mysql_query($query, $dbConn);
		header( 'Location: '.$location );
		die;
		}
?>