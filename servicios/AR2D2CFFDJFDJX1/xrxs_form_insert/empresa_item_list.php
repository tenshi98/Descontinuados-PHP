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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])  ) { 
	
		//Filtro para idItemlist
		if(isset($idItemlist) && $idItemlist != ''){ 
        	$a = "'".$idItemlist."'" ;
		}else{
			$a ="''";
        }
		//filtro de idItemcat
		if(isset($idItemcat) && $idItemcat != ''){ 
        	$b = "'".$idItemcat."'" ;
		}else{
			$b ="''";
        }
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$c = "'".$idEmpresa."'" ;
		}else{
			$c ="''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$d = "'".$Nombre."'" ;
		}else{
			$d ="''";
        }
		//filtro de unidad
		if(isset($unidad) && $unidad != ''){ 
        	$e = "'".$unidad."'" ;
		}else{
			$e ="''";
        }
		//filtro de valor_unidad
		if(isset($valor_unidad) && $valor_unidad != ''){ 
        	$f = "'".$valor_unidad."'" ;
		}else{
			$f ="''";
        }
		//filtro de v_unitario
		if(isset($v_unitario) && $v_unitario != ''){ 
        	$g = "'".$v_unitario."'" ;
		}else{
			$g ="''";
        }
		//filtro de cobro
		if(isset($cobro) && $cobro != ''){ 
        	$h = "'".$cobro."'" ;
		}else{
			$h ="''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `empresas_item_list` (idItemlist, idItemcat, idEmpresa, Nombre, unidad, valor_unidad,v_unitario,cobro) VALUES ({$a},{$b},{$c},{$d},{$e},{$f},{$g},{$h})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>