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

			
		//Filtro para idEmpresa
        $a = "idNiveles='".$idNivel."'" ;
		//filtro de usuario
		if(isset($nombre) && $nombre != ''){ 
        	$a .= ",Nombre='".$nombre."'" ;
        }
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_niveles` SET ".$a." WHERE idNiveles = '$idNivel'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.'?id='.$_GET['id'] );
		die;
	}?>