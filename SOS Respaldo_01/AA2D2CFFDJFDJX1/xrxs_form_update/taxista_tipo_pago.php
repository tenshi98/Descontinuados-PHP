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
if ( !isset($errors[1]) && !isset($errors[2])  ) {

			
		//Filtro para idTipoPago
        $a = "idTipoPago='".$idTipoPago."'" ;
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `taxista_tipo_pago` SET ".$a." WHERE idTipoPago = '$idTipoPago'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>