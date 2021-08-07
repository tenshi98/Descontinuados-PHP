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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) { 
	
		
		//filtro de idPregunta
		if(isset($idPregunta) && $idPregunta != ''){ 
        	$a = "'".$idPregunta."'" ;
		}else{
			$a ="''";
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",'".$idUsuario."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Respuesta
		if(isset($Respuesta) && $Respuesta != ''){ 
        	$a .= ",'".$Respuesta."'" ;
		}else{
			$a .= ",''";
        }

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `preguntas_resp` (idPregunta, idUsuario, Respuesta) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>