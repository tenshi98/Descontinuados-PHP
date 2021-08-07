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
	
		
		//filtro de idCliente 
		if(isset($idCliente) && $idCliente != ''){ 
        	$a = "'".$idCliente."'" ;
		}else{
			$a ="''";
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",'".$idUsuario."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",'".$Fecha."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Observacion
		if(isset($Observacion) && $Observacion != ''){ 
        	$a .= ",'".$Observacion."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_observaciones` (idCliente, idUsuario, Fecha, Observacion ) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>