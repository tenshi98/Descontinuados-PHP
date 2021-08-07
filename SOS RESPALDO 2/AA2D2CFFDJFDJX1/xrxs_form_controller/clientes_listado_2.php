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

//Validaciones de ingreso de datos obligatorios
                   
	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado el Nombre del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Apellido_Paterno
	if ( empty($Apellido_Paterno) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado el apellido paterno del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Apellido_Materno
	if ( empty($Apellido_Materno) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado el apellido materno del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Sexo
	if ( empty($Sexo) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha seleccionado el sexo del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del email
	if ( empty($email) )      $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado la direccion de correo del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Rut
	if ( empty($Rut) )      $errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha ingresado el Rut del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del fNacimiento
	if ( empty($fNacimiento) )      $errors[7] 	  = '
	<div id="txf_07" class="alert_error">  
	  	No ha ingresado la fecha de nacimiento del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Direccion
	if ( empty($Direccion) )      $errors[8] 	  = '
	<div id="txf_08" class="alert_error">  
	  	No ha ingresado la direccion del cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	
	
	
	
	
	
	
	
//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[13]	    = '
	<div id="txf_13" class="alert_error">  
	  	Ingrese un numero telefonico valido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_13&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>'; 
		}
	}
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[14]	    = '
	<div id="txf_14" class="alert_error">  
	  	Ingrese un numero telefonico valido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_14&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>'; 
		}
	}
	
	//Valida si el rut ingresado sea un rut chileno valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[15]	    = '
	<div id="txf_15" class="alert_error">  
	  	Ingrese un rut valido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_15&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>'; 
		}
	}
	
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[16]	    = '
			<div id="txf_16" class="alert_error">  
				El Email ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_16&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	
	
?>