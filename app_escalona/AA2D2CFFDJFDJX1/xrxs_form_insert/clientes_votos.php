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
		if(isset($idCliente) && $idCliente != ''){    $idCliente = "'".$idCliente."'" ;     }else{ $idCliente ="''";}
		if(isset($idPregunta) && $idPregunta != ''){  $idPregunta = "'".$idPregunta."'" ;  }else{ $idPregunta = "''";}

		
		foreach($_POST['idRespuesta'] AS $b => $m) {
			
			$idRespuesta = "'".$m."'" ;
			$Cantidad = "'".$_POST['repuesta_'.$m.'']."'" ;;
			
			// inserto los datos de registro en la db
			$query  = "INSERT INTO `clientes_votos` (idCliente, idPregunta, idRespuesta, Cantidad) VALUES ({$idCliente},{$idPregunta},{$idRespuesta},{$Cantidad} )";
			$result = mysql_query($query, $dbConn);
			
			
		}
	
		header( 'Location: '.$location );
		die;
		}
?>