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

			
		//Filtro para idPregunta
        $a = "idPregunta='".$idPregunta."'" ;
		//filtro de idInterfaz
		if(isset($idInterfaz) && $idInterfaz != ''){ 
        	$a .= ",idInterfaz='".$idInterfaz."'" ;
        }
		//filtro de idCatPreg
		if(isset($idCatPreg) && $idCatPreg != ''){ 
        	$a .= ",idCatPreg='".$idCatPreg."'" ;
        }
		//filtro de Pregunta
		if(isset($Pregunta) && $Pregunta != ''){ 
        	$a .= ",Pregunta='".$Pregunta."'" ;
        }
		//filtro de Opcion1
		if(isset($Opcion1) && $Opcion1 != ''){ 
        	$a .= ",Opcion1='".$Opcion1."'" ;
        }
		//filtro de Opcion2
		if(isset($Opcion2) && $Opcion2 != ''){ 
        	$a .= ",Opcion2='".$Opcion2."'" ;
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `preguntas` SET ".$a." WHERE idPregunta = '$idPregunta'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>