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
    
	//Se verifica el nombre del color existe
	if(isset($Nombre)){
		$sql_nombre = mysql_query("SELECT Rut FROM taxista_propietarios WHERE Rut='".$Rut."'  "); 
		$n_nomb = mysql_num_rows($sql_nombre);
	} else {$n_nomb=0;}

	// Muestro error
	if($n_nomb > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	El Rut ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

	
	//Verificaciones normales
	               
	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado un Nombre
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso del Codigo
	if ( empty($Apellido_Paterno) )     $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un apellido paterno
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso del Codigo
	if ( empty($Apellido_Materno) )     $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado un apellido materno
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso del Codigo
	if ( empty($Rut) )     $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado un Rut
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso del Codigo
	if ( empty($email) )     $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado un email
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso del Codigo
	if ( empty($Fono1) )     $errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha ingresado un Fono
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[7]	    = '<div id="txf_07" class="alert_error">  
	  	Ingrese un telefono valido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>'; 
		}
	}
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[8]	    = '<div id="txf_08" class="alert_error">  
	  	Ingrese un telefono valido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';  
		}
	}
	
	//Valida si el rut ingresado sea un rut chileno valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[9]	    = '<div id="txf_09" class="alert_error">  
	  	Ingrese un Rut valido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_09&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>'; 
		}
	}
	
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[10]	    = '<div id="txf_10" class="alert_error">  
	  	Ingrese un email valido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_10&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';  
		}
	}

	
?>