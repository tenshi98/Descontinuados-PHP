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
if ( !isset($errors[1]) && !isset($errors[2])   ) { 
	
		
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a = "'".$Nombre."'" ;
		}else{
			$a ="''";
        }
		//filtro de mode
		if(isset($mode) && $mode != ''){ 
        	$a .= ",'".$mode."'" ;
		}else{
			$a .=",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `core_permisos_cat` (Nombre, mode) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>