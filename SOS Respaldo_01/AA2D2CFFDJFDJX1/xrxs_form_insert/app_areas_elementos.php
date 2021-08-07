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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 
	
		
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a = "'".$Nombre."'" ;
		}else{
			$a ="''";
        }
		//filtro de Tipo_elemento
		if(isset($Tipo_elemento) && $Tipo_elemento != ''){ 
        	$a .= ",'".$Tipo_elemento."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Orden
		if(isset($Orden) && $Orden != ''){ 
        	$a .= ",'".$Orden."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idArea
		if(isset($idArea) && $idArea != ''){ 
        	$a .= ",'".$idArea."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idPagelist
		if(isset($idPagelist) && $idPagelist != ''){ 
        	$a .= ",'".$idPagelist."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de body_col
		if(isset($body_col) && $body_col != ''){ 
        	$a .= ",'".$body_col."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de body_fil
		if(isset($body_fil) && $body_fil != ''){ 
        	$a .= ",'".$body_fil."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de grid_color
		if(isset($grid_color) && $grid_color != ''){ 
        	$a .= ",'".$grid_color."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de grid_border
		if(isset($grid_border) && $grid_border != ''){ 
        	$a .= ",'".$grid_border."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de grid_shadow
		if(isset($grid_shadow) && $grid_shadow != ''){ 
        	$a .= ",'".$grid_shadow."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de grid_img
		if(isset($grid_img) && $grid_img != ''){ 
        	$a .= ",'".$grid_img."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de url_img
		if(isset($url_img) && $url_img != ''){ 
        	$a .= ",'".$url_img."'" ;
		}else{
			$a .= ",''";
        }
		
		
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `app_areas_elementos` (Nombre, Tipo_elemento, Orden, idArea, idPagelist, body_col, body_fil, grid_color, grid_border, grid_shadow, grid_img, url_img) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>