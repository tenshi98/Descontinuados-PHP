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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])  ) {

			
		//Filtro para idBeneficios
        $a = "idBeneficios='".$idBeneficios."'" ;
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a .= ",idCliente='".$idCliente."'" ;
        }
		//filtro de id_sociallist
		if(isset($id_sociallist) && $id_sociallist != ''){ 
        	$a .= ",id_sociallist='".$id_sociallist."'" ;
        }
		//filtro de fAtencion
		if(isset($fAtencion) && $fAtencion != ''){ 
        	$a .= ",fAtencion='".$fAtencion."'" ;
        }
		//filtro de idAntecedente
		if(isset($idAntecedente) && $idAntecedente != ''){ 
        	$a .= ",idAntecedente='".$idAntecedente."'" ;
        }
		//filtro de Resultado
		if(isset($Resultado) && $Resultado != ''){ 
        	$a .= ",Resultado='".$Resultado."'" ;
        }
		//filtro de Valor
		if(isset($Valor) && $Valor != ''){ 
        	$a .= ",Valor='".$Valor."'" ;
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",idUsuario='".$idUsuario."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_asistencia_beneficios` SET ".$a." WHERE idBeneficios = '$idBeneficios'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>