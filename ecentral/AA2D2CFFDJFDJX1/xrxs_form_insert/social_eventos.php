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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])   ) { 
	
		
		//filtro de id_sociallist
		if(isset($id_sociallist) && $id_sociallist != ''){ 
        	$a = "'".$id_sociallist."'" ;
		}else{
			$a ="''";
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
		//filtro de year
		if(isset($year) && $year != ''){ 
        	$a .= ",'".$year."'" ;
		}else{
			$a .=",''";
        }
		//filtro de month
		if(isset($month) && $month != ''){ 
        	$a .= ",'".$month."'" ;
		}else{
			$a .=",''";
        }
		//filtro de day
		if(isset($day) && $day != ''){ 
        	$a .= ",'".$day."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Descripcion
		if(isset($Descripcion) && $Descripcion != ''){ 
        	$a .= ",'".$Descripcion."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Color
		if(isset($Color) && $Color != ''){ 
        	$a .= ",'".$Color."'" ;
		}else{
			$a .=",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `social_eventos` (id_sociallist, Titulo, Fecha, year, month, day, Descripcion, Color) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>