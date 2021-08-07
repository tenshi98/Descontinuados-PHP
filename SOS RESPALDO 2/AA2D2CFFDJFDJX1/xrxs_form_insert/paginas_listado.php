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
	
		
		//filtro de idPagGrupo
		if(isset($idPagGrupo) && $idPagGrupo != ''){ 
        	$a = "'".$idPagGrupo."'" ;
		}else{
			$a ="''";
        }
		//filtro de idPagCat
		if(isset($idPagCat) && $idPagCat != ''){ 
        	$a .= ",'".$idPagCat."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Titulo
		if(isset($Titulo) && $Titulo != ''){ 
        	$a .= ",'".$Titulo."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",'".$Fecha."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Texto
		if(isset($Texto) && $Texto != ''){ 
        	$a .= ",'".$Texto."'" ;
		}else{
			$a .=",''";
        }

		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `paginas_listado` (idPagGrupo, idPagCat, Titulo, Fecha, Texto) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>