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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])  ) {

			
		//Filtro para idValor
        $a = "idValor='".$idValor."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de Valorizacion
		if(isset($Valorizacion) && $Valorizacion != ''){ 
        	$a .= ",Valorizacion='".$Valorizacion."'" ;
        }
		//filtro de Gastos_gen
		if(isset($Gastos_gen) && $Gastos_gen != ''){ 
        	$a .= ",Gastos_gen='".$Gastos_gen."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `valor_contrato` SET ".$a." WHERE idValor = '$idValor'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>