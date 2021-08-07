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
//Valida el ingreso del usuario
	if ( empty($usuario) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado el nombre de usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de la contraseña
	if ( empty($password) )     $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado la contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de la repeticion de la contraseña
	if ( empty($repassword) )   $errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha ingresado la repeticion de la contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	//Valida el ingreso del Nombres
	if ( empty($Nombres) )        $errors[7] 	  = '
	<div id="txf_07" class="alert_error">  
	  	No ha ingresado un nombre real
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso del Apellidos
	if ( empty($Apellidos) )        $errors[8] 	  = '
	<div id="txf_08" class="alert_error">  
	  	No ha ingresado un nombre real
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de un email
	if ( empty($email) )         $errors[9] 	  = '
	<div id="txf_09" class="alert_error">  
	  	No ha ingresado un email
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_09&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Validaciones de ingreso de datos optativos	
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[10]	    = '
			<div id="txf_10" class="alert_error">  
				Ingrese un numero telefonico valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_10&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[11]	    = '
			<div id="txf_11" class="alert_error">  
				El Rut ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_11&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[12]	    = '
			<div id="txf_12" class="alert_error">  
				El Email ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_12&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
		
?>