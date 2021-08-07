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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])  ) {

			
		//Filtro para idItemlist
        $a = "idItemlist='".$idItemlist."'" ;
		//filtro de idItemcat
		if(isset($idItemcat) && $idItemcat != ''){ 
        	$a .= ",idItemcat='".$idItemcat."'" ;
        }
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de unidad
		if(isset($unidad) && $unidad != ''){ 
        	$a .= ",unidad='".$unidad."'" ;
        }
		//filtro de valor_unidad
		if(isset($valor_unidad) && $valor_unidad != ''){ 
        	$a .= ",valor_unidad='".$valor_unidad."'" ;
        }
		//filtro de v_unitario
		if(isset($v_unitario) && $v_unitario != ''){ 
        	$a .= ",v_unitario='".$v_unitario."'" ;
        }
		//filtro de cobro
		if(isset($cobro) && $cobro != ''){ 
        	$a .= ",cobro='".$cobro."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_item_list` SET ".$a." WHERE idItemlist = '$idItemlist'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>