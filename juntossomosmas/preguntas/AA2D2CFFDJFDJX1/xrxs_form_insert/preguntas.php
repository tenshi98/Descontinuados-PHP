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
	
		
		//filtro de idCatPreg
		if(isset($idCatPreg) && $idCatPreg != ''){ 
        	$a = "'".$idCatPreg."'" ;
		}else{
			$a ="''";
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
				//filtro de Opcion2
		if(isset($Opcion3) && $Opcion3 != ''){ 
        	$a .= ",'".$Opcion3."'" ;
		}else{
			$a .= ",''";
        }
				//filtro de Opcion2
		if(isset($Opcion4) && $Opcion4 != ''){ 
        	$a .= ",'".$Opcion4."'" ;
		}else{
			$a .= ",''";
        }
				//filtro de Opcion2
		if(isset($Opcion5) && $Opcion5 != ''){ 
        	$a .= ",'".$Opcion5."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",'".$Estado."'" ;
		}else{
			$a .= ",''";
        }
		if(isset($link_data) && $link_data!= ''){ 
        	$a .= ",'".$link_data."'" ;
		}else{
			$a .= ",''";
        }
		if(isset($fecha) && $fecha!= ''){ 
        	$a .= ",'".$fecha."'" ;
		}else{
			$a .= ",''";
        }
		if(isset($quien) && $quien!= ''){ 
        	$a .= ",'".$quien."'" ;
		}else{
			$a .= ",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `preguntas` (idCatPreg, Pregunta, Opcion1, Opcion2, Opcion3, Opcion4, Opcion5, Estado, link_data,fecha_ingreso,abierta) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>