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
	
		
		//filtro de descripcion
		if(isset($descripcion) && $descripcion != ''){ 
        	$a = "'".$descripcion."'" ;
		}else{
			$a ="''";
        }
		//filtro de int_ext
		if(isset($int_ext) && $int_ext != ''){ 
        	$a .= ",'".$int_ext."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `mnt_oirs_origen` (descripcion, int_ext) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>