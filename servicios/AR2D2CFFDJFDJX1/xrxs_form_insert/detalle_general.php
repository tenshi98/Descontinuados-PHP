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
	
		//Filtro para Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a = "'".$Tipo."'" ;
		}else{
			$a ="''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$b = "'".$Nombre."'" ;
		}else{
			$b ="''";
        }
		//filtro de Abreviatura
		if(isset($Abreviatura) && $Abreviatura != ''){ 
        	$c = "'".$Abreviatura."'" ;
		}else{
			$c ="''";
        }
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$d = "'".$idEmpresa."'" ;
		}else{
			$d ="''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `detalle_general` (Tipo,Nombre,Abreviatura,idEmpresa) VALUES ({$a},{$b},{$c},{$d})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>