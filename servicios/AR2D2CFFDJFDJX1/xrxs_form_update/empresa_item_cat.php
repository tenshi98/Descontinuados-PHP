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
if ( empty($errors[1]) && empty($errors[2])  ) {

		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_item_cat` SET Nombre_cat = '$nombre_cat', Nombre_Sub = '$nombre_Sub' WHERE idItemcat = '$idItemcat'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>