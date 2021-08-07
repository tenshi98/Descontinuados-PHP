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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 
	
		
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a = "'".$Nombre."'" ;
		}else{
			$a ="''";
        }
		//filtro de Orden
		if(isset($Orden) && $Orden != ''){ 
        	$a .= ",'".$Orden."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idPagelist
		if(isset($idPagelist) && $idPagelist != ''){ 
        	$a .= ",'".$idPagelist."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Codigo
		if(isset($Codigo) && $Codigo != ''){ 
        	$a .= ",'".$Codigo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Margen
		if(isset($Margen) && $Margen != ''){ 
        	$a .= ",'".$Margen."'" ;
		}else{
			$a .= ",''";
        }
		
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `app_areas_listado` (Nombre, Orden, idPagelist, Codigo, Margen) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>