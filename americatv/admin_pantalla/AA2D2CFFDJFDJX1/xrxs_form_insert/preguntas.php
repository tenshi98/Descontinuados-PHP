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
	
		
		//filtro de idInterfaz
		if(isset($idInterfaz) && $idInterfaz != ''){ 
        	$a = "'".$idInterfaz."'" ;
		}else{
			$a ="''";
        }
		//filtro de idCatPreg
		if(isset($idCatPreg) && $idCatPreg != ''){ 
        	$a .= ",'".$idCatPreg."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Pregunta
		if(isset($Pregunta) && $Pregunta != ''){ 
        	$a .= ",'".$Pregunta."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Opcion1
		if(isset($Opcion1) && $Opcion1 != ''){ 
        	$a .= ",'".$Opcion1."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Opcion2
		if(isset($Opcion2) && $Opcion2 != ''){ 
        	$a .= ",'".$Opcion2."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",'".$Estado."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `preguntas` (idInterfaz, idCatPreg, Pregunta, Opcion1, Opcion2, Estado) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>