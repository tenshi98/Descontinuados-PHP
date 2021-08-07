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
if ( empty($errors[1])   ) {

			
		//Filtro para idComment
        $a = "idComment='".$idComment."'" ;
		//filtro de Texto
		if(isset($Texto) && $Texto != ''){ 
        	$a .= ",Texto='".$Texto."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_ot_comment` SET ".$a." WHERE idComment = '$idComment'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>