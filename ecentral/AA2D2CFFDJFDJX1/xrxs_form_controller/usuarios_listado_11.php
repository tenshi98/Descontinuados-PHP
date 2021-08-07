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

//Se validan si existe el usuario o el email asociado de este en la base de datos
	//Se verifica si el usuario existe
	if(isset($usuario)){
		$sql_usuario = mysql_query("SELECT usuario FROM usuarios_listado WHERE usuario='".$usuario."' AND mode='".neomode."' "); 
		$n_usr = mysql_num_rows($sql_usuario);
	} else {$n_usr=0;}
	// se verifica si el correo ya existe
	if(isset($email)){
		$sql_email = mysql_query("SELECT email FROM usuarios_listado WHERE email='".$email."' AND mode='".neomode."' ");
		$n_email = mysql_num_rows($sql_email);
	} else {$n_email=0;}
	// Valido si el usuario existe
	if($n_usr > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	El usuario ya esta en uso
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida si el email existe
	if($n_email > 0)   $errors[6]  = '
	<div id="txf_02" class="alert_error">  
	  	El email ya esta en uso
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida si las contraseñas ingresadas son las mismas
	if(isset($password)&&isset($repassword)){
	if ( $password <> $repassword )      $errors[2]  = '
	<div id="txf_03" class="alert_error">  
	  	Las contraseñas ingresadas no coinciden
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	}

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($usuario) )      $errors[1] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado el nombre de usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de la contraseña
	if ( empty($password) )     $errors[2] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado la contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de la repeticion de la contraseña
	if ( empty($repassword) )   $errors[3] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha ingresado la repeticion de la contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de el tipo de usuario
    if ( empty($tipo) )         $errors[4] 	  = '
	<div id="txf_07" class="alert_error">  
	  	No ha seleccionado el tipo de perfil del usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del nombre
	if ( empty($Nombre) )        $errors[5] 	  = '
	<div id="txf_08" class="alert_error">  
	  	No ha ingresado un nombre real
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de un email
	if ( empty($email) )         $errors[6] 	  = '
	<div id="txf_09" class="alert_error">  
	  	No ha ingresado un email
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_09&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida el ingreso de una idCiudad
	if ( empty($idCiudad) )     $errors[7] 	  = '
	<div id="txf_10" class="alert_error">  
	  	No ha seleccionado una region
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_10&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	//Valida el ingreso de una idComuna
	if ( empty($idComuna) )     $errors[8] 	  = '
	<div id="txf_11" class="alert_error">  
	  	No ha seleccionado una comuna
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_11&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	//Valida el ingreso de una idCalle
	if ( empty($idCalle) )     $errors[9] 	  = '
	<div id="txf_12" class="alert_error">  
	  	No ha seleccionado una calle
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_12&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';

	
	
//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($n_calle)){
		if (validarnumero($n_calle)) {   
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
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono)){
		if (validarnumero($Fono)) {   
			$errors[11]	    = '
			<div id="txf_14" class="alert_error">  
				Ingrese un numero telefonico valido
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
   			$errors[12]	    = '
			<div id="txf_15" class="alert_error">  
				El Rut ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_15&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
			'; 
		}
	}
	
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[13]	    = '
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