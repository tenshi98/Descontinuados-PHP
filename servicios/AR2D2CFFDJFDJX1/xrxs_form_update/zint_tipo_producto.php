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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])&& empty($errors[6])  ) {

			
		//Filtro para idEmbalaje
        $a = "idTipo_prod='".$idTipo_prod."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de Tipo_producto
		if(isset($Tipo_producto) && $Tipo_producto != ''){ 
        	$a .= ",Tipo_producto='".$Tipo_producto."'" ;
        }
		

		// inserto los datos de registro en la db
		$query  = "UPDATE `zint_tipo_prod` SET ".$a." WHERE idTipo_prod = '$idTipo_prod'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		
		die;
	}?>