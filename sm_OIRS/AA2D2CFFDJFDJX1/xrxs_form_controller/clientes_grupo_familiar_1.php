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
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado el Rut del usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del usuario
	if ( empty($Rut) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado el Rut del usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del usuario
	if ( empty($Parentesco) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado el Rut del usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Condicion
	if ( empty($Condicion) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado el Rut del usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del usuario
	if ( empty($fNacimiento) )      $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado el Rut del usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Ingreso)){
		if (validarnumero($Ingreso)) {   
			$errors[6]	    = '
			<div id="txf_06" class="alert_error">  
				Ingrese un valor numerico
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[7]	    = '
			<div id="txf_07" class="alert_error">  
				El Rut ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	
	
?>