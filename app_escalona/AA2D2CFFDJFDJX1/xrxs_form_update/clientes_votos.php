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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])  ) {

			
		//Filtro para idVoto
        $a = "idVoto='".$idVoto."'" ;
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a .= ",idCliente='".$idCliente."'" ;
        }
		//filtro de idPregunta
		if(isset($idPregunta) && $idPregunta != ''){ 
        	$a .= ",idPregunta='".$idPregunta."'" ;
        }
		//filtro de idRespuesta
		if(isset($idRespuesta) && $idRespuesta != ''){ 
        	$a .= ",idRespuesta='".$idRespuesta."'" ;
        }
		//filtro de Cantidad
		if(isset($Cantidad) && $Cantidad != ''){ 
        	$a .= ",Cantidad='".$Cantidad."'" ;
        }
		
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_votos` SET ".$a." WHERE idVoto = '$idVoto'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>