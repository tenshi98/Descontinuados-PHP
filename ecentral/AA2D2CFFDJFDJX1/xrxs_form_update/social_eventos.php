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

			
		//Filtro para idEvento
        $a = "idEvento='".$idEvento."'" ;
		//filtro de id_sociallist
		if(isset($id_sociallist) && $id_sociallist != ''){ 
        	$a .= ",id_sociallist='".$id_sociallist."'" ;
        }
		//filtro de Titulo
		if(isset($Titulo) && $Titulo != ''){ 
        	$a .= ",Titulo='".$Titulo."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de year
		if(isset($year) && $year != ''){ 
        	$a .= ",year='".$year."'" ;
        }
		//filtro de month
		if(isset($month) && $month != ''){ 
        	$a .= ",month='".$month."'" ;
        }
		//filtro de day
		if(isset($day) && $day != ''){ 
        	$a .= ",day='".$day."'" ;
        }
		//filtro de Descripcion
		if(isset($Descripcion) && $Descripcion != ''){ 
        	$a .= ",Descripcion='".$Descripcion."'" ;
        }
		//filtro de Color
		if(isset($Color) && $Color != ''){ 
        	$a .= ",Color='".$Color."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `social_eventos` SET ".$a." WHERE idEvento = '$idEvento'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>