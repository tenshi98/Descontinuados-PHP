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

			
		//Filtro para idCat_prod
        $a = "idCat_prod='".$idCat_prod."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de Cat_prod
		if(isset($Cat_prod) && $Cat_prod != ''){ 
        	$a .= ",Cat_prod='".$Cat_prod."'" ;
        }
		

		// inserto los datos de registro en la db
		$query  = "UPDATE `zint_cat_prod` SET ".$a." WHERE idCat_prod = '$idCat_prod'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		
		die;
	}?>