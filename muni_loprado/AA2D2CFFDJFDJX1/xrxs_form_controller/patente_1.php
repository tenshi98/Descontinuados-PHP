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
//Se validan los datos

	//Valida el ingreso de la patente
	if ( empty($patente) )                    $errors[1]  = '<div id="txf_01" class="alert alert-danger">No ha ingresado una patente</div>';
	if ( empty($password) )                   $errors[2]  = '<div id="txf_02" class="alert alert-danger">No ha ingresado la clave</div>';
	if(isset($password)){
	if ($_SESSION['mipass'] <> $password )   $errors[3]  = '<div id="txf_03" class="alert alert-danger">Las clave ingresada no coincide con la imagen</div>';
	}
	
	if(isset($patente)){
		//valido patente
		$valpat = ValidaPatente($patente);
		if(isset($valpat)&&$valpat!=''){
			$errors[4]	    = '<div id="txf_04" class="alert alert-danger">'.$valpat.'</div>';	
		}
		
		//Verifica el largo de la patente
		$patente_corto = palabra_corto($patente,6);	
		if(isset($patente_corto)){
			$errors[5]	    = '<div id="txf_05" class="alert alert-danger">'.$patente_corto.'</div>';	
		}
		
		//Verifica el largo de la patente
		$patente_corto = palabra_largo($patente,6);	
		if(isset($patente_corto)){
			$errors[6]	    = '<div id="txf_06" class="alert alert-danger">'.$patente_corto.'</div>';	
		}
	}
		
	
	
?>