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
	
		
		//filtro de idPregunta
		if(isset($idPregunta) && $idPregunta != ''){ 
        	$a = "'".$idPregunta."'" ;
		}else{
			$a ="''";
        }
		//filtro de Respuesta
		if(isset($Respuesta) && $Respuesta != ''){ 
        	$a .= ",'".$Respuesta."'" ;
		}else{
			$a .=",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `preguntas_respuestas` (idPregunta, Respuesta) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>