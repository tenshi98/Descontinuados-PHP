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
if ( empty($errors[1]) && empty($errors[2])   ) {
	
		//Filtro para idCostos
        $a = "idCostos='".$idCostos."'" ;
		//filtro de idOt
		if(isset($idOt) && $idOt != ''){ 
        	$a .= ",idOt='".$idOt."'" ;
        }
		//filtro de Texto
		if(isset($Texto) && $Texto != ''){ 
        	$a .= ",Texto='".$Texto."'" ;
        }
		//filtro de costo
		if(isset($costo) && $costo != ''){ 
        	$a .= ",costo='".$costo."'" ;
        }
			
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_ot_costosrel` SET ".$a." WHERE idCostos = '$idCostos'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>