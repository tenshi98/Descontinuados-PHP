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
if ( empty($errors[1])&& empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])   ) {

			
		//Filtro para idSolicitud
        $a = "idSolicitud='".$idSolicitud."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de fSolicitud
		if(isset($fSolicitud) && $fSolicitud != ''){ 
        	$a .= ",fSolicitud='".$fSolicitud."'" ;
        }
		//filtro de Responsable
		if(isset($Responsable) && $Responsable != ''){ 
        	$a .= ",Responsable='".$Responsable."'" ;
        }
		//filtro de Comentario
		if(isset($Comentario) && $Comentario != ''){ 
        	$a .= ",Comentario='".$Comentario."'" ;
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }
		//filtro de idCliente
		if(isset($idCliente) && $idCliente != ''){ 
        	$a .= ",idCliente='".$idCliente."'" ;
        }
		//filtro de tipo_cliente
		if(isset($tipo_cliente) && $tipo_cliente != ''){ 
        	$a .= ",tipo_cliente='".$tipo_cliente."'" ;
        }
		// inserto los datos de registro en la db
		$query  = "UPDATE `zint_bodega_solicitud` SET ".$a." WHERE idSolicitud = '$idSolicitud'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>