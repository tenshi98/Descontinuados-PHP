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
if ( empty($errors[1]) && empty($errors[2])  ) { 	
		//filtro de comun1
		if(isset($comun1) && $comun1 != ''){ 
        	$a = $comun1 ;
		}else{
			$a ="";
        }
		//filtro de comun2
		if(isset($comun2) && $comun2 != ''){ 
        	$b = $comun2 ;
		}else{
			$b ="";
        }
		header( 'Location: '.$location.'?view='.$b.'&number='.$a );
		die;
		}
?>