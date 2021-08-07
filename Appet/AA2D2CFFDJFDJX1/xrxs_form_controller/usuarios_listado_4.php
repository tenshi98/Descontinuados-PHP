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
	//Valida el ingreso del nombre
	if ( empty($Nombre) )        $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado un nombre real
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de un email
	if ( empty($email) )         $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un email
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de una idCiudad
	if ( empty($idCiudad) )     $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha seleccionado una ciudad
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	//Valida el ingreso de una idComuna
	if ( empty($idComuna) )     $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha seleccionado una comuna
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	//Valida el ingreso de una idCalle
	if ( empty($idCalle) )     $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha seleccionado una calle
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	//Valida el ingreso de una n_calle
	if ( empty($n_calle) )     $errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha ingresado el numero de calle
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';

//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($n_calle)){
		if (validarnumero($n_calle)) {   
			$errors[6]	    = '
			<div id="txf_06" class="alert_error">  
				Ingrese un numero de casa valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono)){
		if (validarnumero($Fono)) {   
			$errors[7]	    = '
			<div id="txf_07" class="alert_error">  
				Ingrese un numero telefonico valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}

	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[8]	    = '
			<div id="txf_08" class="alert_error">  
				El Rut ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[9]	    = '
			<div id="txf_09" class="alert_error">  
				El Email ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_09&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
?>