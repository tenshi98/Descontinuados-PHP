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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])&& empty($errors[6])&& empty($errors[7])  ) {

			
		//Filtro para idArticulo
        $a = "idArticulo='".$idArticulo."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de Nombre_art
		if(isset($Nombre_art) && $Nombre_art != ''){ 
        	$a .= ",Nombre_art='".$Nombre_art."'" ;
        }
		//filtro de idTipo_prod
		if(isset($idTipo_prod) && $idTipo_prod != ''){ 
        	$a .= ",idTipo_prod='".$idTipo_prod."'" ;
        }
		//filtro de idCat_prod
		if(isset($idCat_prod) && $idCat_prod != ''){ 
        	$a .= ",idCat_prod='".$idCat_prod."'" ;
        }
		//filtro de idUml
		if(isset($idUml) && $idUml != ''){ 
        	$a .= ",idUml='".$idUml."'" ;
        }
		//filtro de Cap_grad_min
		if(isset($Cap_grad_min) && $Cap_grad_min != ''){ 
        	$a .= ",Cap_grad_min='".$Cap_grad_min."'" ;
        }
		//filtro de idEmbalaje
		if(isset($idEmbalaje) && $idEmbalaje != ''){ 
        	$a .= ",idEmbalaje='".$idEmbalaje."'" ;
        }
		//filtro de Marca
		if(isset($Marca) && $Marca != ''){ 
        	$a .= ",Marca='".$Marca."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `zint_articulo` SET ".$a." WHERE idArticulo = '$idArticulo'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		
		die;
	}?>