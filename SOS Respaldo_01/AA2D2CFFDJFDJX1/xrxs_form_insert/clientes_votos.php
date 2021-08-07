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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])  ) { 
	
		
		//filtro de idCliente 
		if(isset($idCliente) && $idCliente != ''){ 
        	$a = "'".$idCliente."'" ;
		}else{
			$a ="''";
        }
		//filtro de idPregunta
		if(isset($idPregunta) && $idPregunta != ''){ 
        	$a .= ",'".$idPregunta."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idRespuesta 
		if(isset($idRespuesta) && $idRespuesta != ''){ 
        	$a .= ",'".$idRespuesta."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_votos` (idCliente, idPregunta, idRespuesta) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>