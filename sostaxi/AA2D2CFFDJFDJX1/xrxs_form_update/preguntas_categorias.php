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

			
		//Filtro para idCategorias
        $a = "idCategorias='".$idCategorias."'" ;
		//filtro de idTipoCliente
		if(isset($idTipoCliente) && $idTipoCliente != ''){ 
        	$a .= ",idTipoCliente='".$idTipoCliente."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `preguntas_categorias` SET ".$a." WHERE idCategorias = '$idCategorias'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>