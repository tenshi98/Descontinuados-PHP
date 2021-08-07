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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])   ) { 
	
		
		//filtro de id_pmcat
		if(isset($id_pmcat) && $id_pmcat != ''){ 
        	$a = "'".$id_pmcat."'" ;
		}else{
			$a ="''";
        }
		//filtro de Direccionweb
		if(isset($Direccionweb) && $Direccionweb != ''){ 
        	$a .= ",'".$Direccionweb."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Direccionbase
		if(isset($Direccionbase) && $Direccionbase != ''){ 
        	$a .= ",'".$Direccionbase."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",'".$Nombre."'" ;
		}else{
			$a .=",''";
        }
		//filtro de mode
		if(isset($mode) && $mode != ''){ 
        	$a .= ",'".$mode."'" ;
		}else{
			$a .=",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `core_permisos` (id_pmcat, Direccionweb, Direccionbase, Nombre, mode) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>