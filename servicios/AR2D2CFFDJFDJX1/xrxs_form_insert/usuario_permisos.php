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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])  ) { 
	
		
		//filtro de tipo
		if(isset($tipo) && $tipo != ''){ 
        	$a = "'".$tipo."'" ;
		}else{
			$a ="''";
        }
		//filtro de direccion
		if(isset($direccion) && $direccion != ''){ 
        	$b = "'".$direccion."'" ;
		}else{
			$b ="''";
        }
		//filtro de nombre
		if(isset($nombre) && $nombre != ''){ 
        	$c = "'".$nombre."'" ;
		}else{
			$c ="''";
        }
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `admin_permisos` (Tipo,Direccionweb, Nombre) VALUES ({$a},{$b},{$c})";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.'?add=true' );
		die;
		}
?>