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

	//Valida el ingreso del nombre
	if ( empty($Nombres) )        $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado un nombre
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso del ApellidoPat
	if ( empty($ApellidoPat) )        $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado el apellido Paterno
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso del ApellidoMat
	if ( empty($ApellidoMat) )        $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado el apellido Materno
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso del Sexo
	if ( empty($Sexo) )        $errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha seleccionado un sexo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de un email
	if ( empty($email) )         $errors[7] 	  = '
	<div id="txf_07" class="alert_error">  
	  	No ha ingresado un email
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso del usuario
	if ( empty($Rut) )      $errors[8] 	  = '
	<div id="txf_08" class="alert_error">  
	  	No ha ingresado el Rut del usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso de una idCiudad
	if ( empty($idCiudad) )     $errors[9] 	  = '
	<div id="txf_09" class="alert_error">  
	  	No ha seleccionado una region
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_09&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de una idComuna
	if ( empty($idComuna) )     $errors[10] 	  = '
	<div id="txf_10" class="alert_error">  
	  	No ha seleccionado una comuna
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_10&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de una idCalle
	if ( empty($idCalle) )     $errors[11] 	  = '
	<div id="txf_11" class="alert_error">  
	  	No ha seleccionado una calle
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_11&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
			
//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($n_calle)){
		if (validarnumero($n_calle)) {   
			$errors[12]	    = '
			<div id="txf_12" class="alert_error">  
				Ingrese un numero telefonico de casa valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_12&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[13]	    = '
			<div id="txf_13" class="alert_error">  
				Ingrese un numero telefonico de casa valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_13&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[14]	    = '
			<div id="txf_14" class="alert_error">  
				Ingrese un numero telefonico celular valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_14&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[15]	    = '
			<div id="txf_15" class="alert_error">  
				El Rut ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_15&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Verifica si la fecha ingresada tiene el formato fecha
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