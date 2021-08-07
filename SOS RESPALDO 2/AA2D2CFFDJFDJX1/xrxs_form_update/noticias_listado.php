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

			
		//Filtro para idNotListado
        $a = "idNotListado='".$idNotListado."'" ;
		//filtro de idNotGrupo
		if(isset($idNotGrupo) && $idNotGrupo != ''){ 
        	$a .= ",idNotGrupo='".$idNotGrupo."'" ;
        }
		//filtro de idNotCat
		if(isset($idNotCat) && $idNotCat != ''){ 
        	$a .= ",idNotCat='".$idNotCat."'" ;
        }
		//filtro de Titulo
		if(isset($Titulo) && $Titulo != ''){ 
        	$a .= ",Titulo='".$Titulo."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de Texto
		if(isset($Texto) && $Texto != ''){ 
        	$a .= ",Texto='".$Texto."'" ;
        }
		//filtro de Comentarios
		if(isset($Comentarios) && $Comentarios != ''){ 
        	$a .= ",Comentarios='".$Comentarios."'" ;
        }
		//filtro de Aprobar
		if(isset($Aprobar) && $Aprobar != ''){ 
        	$a .= ",Aprobar='".$Aprobar."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `noticias_listado` SET ".$a." WHERE idNotListado = '$idNotListado'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>