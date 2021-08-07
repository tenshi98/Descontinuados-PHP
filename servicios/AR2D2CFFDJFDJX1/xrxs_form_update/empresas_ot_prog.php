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

			
		//Filtro para idProg
        $a = "idProg='".$idProg."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de idFrecuencia
		if(isset($idFrecuencia) && $idFrecuencia != ''){ 
        	$a .= ",idFrecuencia='".$idFrecuencia."'" ;
        }
		//filtro de valor
		if(isset($valor) && $valor != ''){ 
        	$a .= ",valor='".$valor."'" ;
        }
		//filtro de month
		if(isset($month) && $month != ''){ 
        	$a .= ",month='".$month."'" ;
        }
		//filtro de year
		if(isset($year) && $year != ''){ 
        	$a .= ",year='".$year."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_ot_prog` SET ".$a." WHERE idProg = '$idProg'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>