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
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$b = "'".$Nombre."'" ;
		}else{
			$b ="''";
        }
		//filtro de Telefono
		if(isset($Telefono) && $Telefono != ''){ 
        	$c = "'".$Telefono."'" ;
		}else{
			$c ="''";
        }
		//filtro de Direccion
		if(isset($Direccion) && $Direccion != ''){ 
        	$d = "'".$Direccion."'" ;
		}else{
			$d ="''";
        }
		//filtro de Cargo
		if(isset($Cargo) && $Cargo != ''){ 
        	$e = "'".$Cargo."'" ;
		}else{
			$e ="''";
        }
		//filtro de cta_cte
		if(isset($cta_cte) && $cta_cte != ''){ 
        	$f = "'".$cta_cte."'" ;
		}else{
			$f ="''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `trabajadores_listado` (idEmpresa, Nombre, Telefono, Direccion, Cargo,cta_cte) VALUES ({$a},{$b},{$c},{$d},{$e},{$f})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>