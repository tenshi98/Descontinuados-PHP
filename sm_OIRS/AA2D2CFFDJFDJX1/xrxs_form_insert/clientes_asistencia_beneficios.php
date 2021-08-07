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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 
	
		
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a = "'".$idCliente."'" ;
		}else{
			$a ="''";
        }
		//filtro de id_sociallist
		if(isset($id_sociallist) && $id_sociallist != ''){ 
        	$a .= ",'".$id_sociallist."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fAtencion
		if(isset($fAtencion) && $fAtencion != ''){ 
        	$a .= ",'".$fAtencion."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idAntecedente
		if(isset($idAntecedente) && $idAntecedente != ''){ 
        	$a .= ",'".$idAntecedente."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Resultado
		if(isset($Resultado) && $Resultado != ''){ 
        	$a .= ",'".$Resultado."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Valor
		if(isset($Valor) && $Valor != ''){ 
        	$a .= ",'".$Valor."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",'".$idUsuario."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_asistencia_beneficios` (idCliente,id_sociallist, fAtencion, idAntecedente, Resultado, Valor, idUsuario) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>