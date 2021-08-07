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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])  ) {

			
		//Filtro para idPregunta
        $a = "idPregunta='".$idPregunta."'" ;
		//filtro de idTipoCliente
		if(isset($idTipoCliente) && $idTipoCliente != ''){ 
        	$a .= ",idTipoCliente='".$idTipoCliente."'" ;
        }
		//filtro de idCategorias
		if(isset($idCategorias) && $idCategorias != ''){ 
        	$a .= ",idCategorias='".$idCategorias."'" ;
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",idUsuario='".$idUsuario."'" ;
        }
		//filtro de Pregunta
		if(isset($Pregunta) && $Pregunta != ''){ 
        	$a .= ",Pregunta='".$Pregunta."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `preguntas_listado` SET ".$a." WHERE idPregunta = '$idPregunta'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>