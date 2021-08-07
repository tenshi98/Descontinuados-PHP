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
//Se validan si existe el usuario o el email asociado de este en la base de datos
	if ( empty($Nombres) )          $errors[1] 	  = '<div class="bubble">Ingrese un Nombre</div>';
	if ( empty($ApellidoPat) )      $errors[11]   = '<div class="bubble">Ingrese el apellido paterno</div>';
	if ( empty($ApellidoMat) )      $errors[12]   = '<div class="bubble">Ingrese el apellido materno</div>';
	if ( empty($Fono1) )            $errors[2] 	  = '<div class="bubble">Ingrese un Telefono</div>';
	if ( empty($email) )            $errors[3] 	  = '<div class="bubble">Ingrese un Correo</div>';
	if ( empty($Rut) )              $errors[4] 	  = '<div class="bubble">Ingrese un Rut</div>';
	if ( empty($fNacimiento) )      $errors[5] 	  = '<div class="bubble">Ingrese Fecha de Nacimiento</div>';
	if ( empty($idCiudad) )         $errors[6] 	  = '<div class="bubble">Seleccione la region</div>';
	if ( empty($idComuna) )         $errors[7] 	  = '<div class="bubble">Seleccione la comuna</div>';
	if ( empty($idCalle) )          $errors[8] 	  = '<div class="bubble">Seleccione la comuna</div>';
	if ( empty($n_calle) )          $errors[9] 	  = '<div class="bubble">Seleccione la comuna</div>';
	
//Validaciones de ingreso de datos optativos	
	//Valida si el dato ingresado es un numero 
	if(isset($n_calle)){
		if (validarnumero($n_calle)) {   
			$errors[9]	    = '<div class="bubble">Ingrese un numero telefonico valido</div>'; 
		}
	}
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[2]	    = '<div class="bubble">Ingrese un numero telefonico valido</div>'; 
		}
	}
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[10]	    = '<div class="bubble">Ingrese un numero telefonico valido</div>'; 
		}
	}
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[4]	    = '<div class="bubble">El Rut ingresado no es valido</div>'; 
		}
	}	
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[3]	    = '<div class="bubble">El Email ingresado no es valido</div>'; 
		}
	}
?>