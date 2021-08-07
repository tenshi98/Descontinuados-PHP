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
// se verifica si el usuario ya existe

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso de Verde
	if ( empty($Verde) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado los dias para el semaforo verde
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso de Amarillo
	if ( empty($Amarillo) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado los dias para el semaforo amarillo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso de Rojo
	if ( empty($Rojo) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado los dias para el semaforo rojo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	
	
?>