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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])  ) {

			
		//Filtro para idElementos
        $a = "idElementos='".$idElementos."'" ;
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Tipo_elemento
		if(isset($Tipo_elemento) && $Tipo_elemento != ''){ 
        	$a .= ",Tipo_elemento='".$Tipo_elemento."'" ;
        }
		//filtro de Orden
		if(isset($Orden) && $Orden != ''){ 
        	$a .= ",Orden='".$Orden."'" ;
        }
		//filtro de idArea
		if(isset($idArea) && $idArea != ''){ 
        	$a .= ",idArea='".$idArea."'" ;
        }
		//filtro de idPagelist
		if(isset($idPagelist) && $idPagelist != ''){ 
        	$a .= ",idPagelist='".$idPagelist."'" ;
        }
		//filtro de body_col
		if(isset($body_col) && $body_col != ''){ 
        	$a .= ",body_col='".$body_col."'" ;
        }
		//filtro de body_fil
		if(isset($body_fil) && $body_fil != ''){ 
        	$a .= ",body_fil='".$body_fil."'" ;
        }
		//filtro de grid_color
		if(isset($grid_color) && $grid_color != ''){ 
        	$a .= ",grid_color='".$grid_color."'" ;
        }
		//filtro de grid_border
		if(isset($grid_border) && $grid_border != ''){ 
        	$a .= ",grid_border='".$grid_border."'" ;
        }
		//filtro de grid_shadow
		if(isset($grid_shadow) && $grid_shadow != ''){ 
        	$a .= ",grid_shadow='".$grid_shadow."'" ;
        }
		//filtro de grid_img
		if(isset($grid_img) && $grid_img != ''){ 
        	$a .= ",grid_img='".$grid_img."'" ;
        }
		//filtro de url_img
		if(isset($url_img) && $url_img != ''){ 
        	$a .= ",url_img='".$url_img."'" ;
        }
		//filtro de idTipoBoton
		if(isset($idTipoBoton) && $idTipoBoton != ''){ 
        	$a .= ",idTipoBoton='".$idTipoBoton."'" ;
        }
		//filtro de Archivo
		if(isset($Archivo) && $Archivo != ''){ 
        	$a .= ",Archivo='".$Archivo."'" ;
        }
		//filtro de idTipoAlerta
		if(isset($idTipoAlerta) && $idTipoAlerta != ''){ 
        	$a .= ",idTipoAlerta='".$idTipoAlerta."'" ;
        }
		//filtro de cercanos
		if(isset($cercanos) && $cercanos != ''){ 
        	$a .= ",cercanos='".$cercanos."'" ;
        }
		//filtro de contactar
		if(isset($contactar) && $contactar != ''){ 
        	$a .= ",contactar='".$contactar."'" ;
        }
		//filtro de desplegar
		if(isset($desplegar) && $desplegar != ''){ 
        	$a .= ",desplegar='".$desplegar."'" ;
        }
		//filtro de login
		if(isset($login) && $login != ''){ 
        	$a .= ",login='".$login."'" ;
        }
		//filtro de idNotGrupo
		if(isset($idNotGrupo) && $idNotGrupo != ''){ 
        	$a .= ",idGrupo='".$idNotGrupo."'" ;
        }
		//filtro de idNotCat
		if(isset($idNotCat) && $idNotCat != ''){ 
        	$a .= ",idCat='".$idNotCat."'" ;
        }
		//filtro de idNotListado
		if(isset($idNotListado) && $idNotListado != ''){ 
        	$a .= ",idListado='".$idNotListado."'" ;
        }
		//filtro de idPagGrupo
		if(isset($idPagGrupo) && $idPagGrupo != ''){ 
        	$a .= ",idGrupo='".$idPagGrupo."'" ;
        }
		//filtro de idPagCat
		if(isset($idPagCat) && $idPagCat != ''){ 
        	$a .= ",idCat='".$idPagCat."'" ;
        }
		//filtro de idPagListado
		if(isset($idPagListado) && $idPagListado != ''){ 
        	$a .= ",idListado='".$idPagListado."'" ;
        }
		//filtro de level_view
		if(isset($level_view) && $level_view != ''){ 
        	$a .= ",level_view='".$level_view."'" ;
        }
		//filtro de pantalla
		if(isset($pantalla) && $pantalla != ''){ 
        	$a .= ",pantalla='".$pantalla."'" ;
        }
		//filtro de tipofuncion
		if(isset($tipofuncion) && $tipofuncion != ''){ 
        	$a .= ",tipofuncion='".$tipofuncion."'" ;
        }
		//filtro de Fono
		if(isset($Fono) && $Fono != ''){ 
        	$a .= ",Fono='".$Fono."'" ;
        }
		//filtro de idCategorias
		if(isset($idCategorias) && $idCategorias != ''){ 
        	$a .= ",idCat='".$idCategorias."'" ;
        }
		//filtro de idPregunta
		if(isset($idPregunta) && $idPregunta != ''){ 
        	$a .= ",idListado='".$idPregunta."'" ;
        }
	
		


		// inserto los datos de registro en la db
		$query  = "UPDATE `app_areas_elementos` SET ".$a." WHERE idElementos = '$idElementos'";
		$result = mysql_query($query, $dbConn);

		header( 'Location: '.$location );
		die;
	}?>