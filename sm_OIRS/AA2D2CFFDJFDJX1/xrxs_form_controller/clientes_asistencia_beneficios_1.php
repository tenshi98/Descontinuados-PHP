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
// completamos la variable error si es necesario 


//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($id_sociallist) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado un beneficio
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del usuario
	if ( empty($idAntecedente) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha seleccionado un motivo de atencion
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del usuario
	if ( empty($Resultado) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado el resultado de atencion
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Valor)){
		if (validarnumero($Valor)) {   
			$errors[5]	    = '
			<div id="txf_05" class="alert_error">  
				Ingrese un valor numerico en el valor del beneficio
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	
	
	
	
?>