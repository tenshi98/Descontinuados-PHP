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
if ( !isset($errors[1]) && !isset($errors[2])  ) {

			
		//Filtro para idRespuesta
        $a = "idRespuesta='".$idRespuesta."'" ;
		//filtro de idPregunta
		if(isset($idPregunta) && $idPregunta != ''){ 
        	$a .= ",idPregunta='".$idPregunta."'" ;
        }
		//filtro de Respuesta
		if(isset($Respuesta) && $Respuesta != ''){ 
        	$a .= ",Respuesta='".$Respuesta."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `preguntas_respuestas` SET ".$a." WHERE idRespuesta = '$idRespuesta'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>