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

	if ( empty($Rut) )     		$errors[1] 	  = '<div class="bubble">Ingrese un Rut</div>';
	if ( empty($Nombres) )   	$errors[2] 	  = '<div class="bubble">Ingrese un Nombre</div>';
    if ( empty($ApellidoPat) )  $errors[3] 	  = '<div class="bubble">Ingrese el apellido Paterno</div>';
	if ( empty($ApellidoMat) )  $errors[4] 	  = '<div class="bubble">Ingrese el apellido Materno</div>';
	if ( empty($email) )        $errors[5] 	  = '<div class="bubble">Ingrese un email</div>';
	if ( empty($Fono1) )      	$errors[6] 	  = '<div class="bubble">Ingrese un telefono</div>';
	if ( empty($idCiudad) )     $errors[7] 	  = '<div class="bubble">Seleccione la region</div>';
	if ( empty($idComuna) )     $errors[8] 	  = '<div class="bubble">Seleccione la comuna</div>';
	if ( empty($TipoMsje) )     $errors[9] 	  = '<div class="bubble">Seleccione el tipo de mensaje</div>';
	if ( empty($Depto) )    	$errors[10] 	  = '<div class="bubble">Seleccione un Departamento</div>';
	if ( empty($Fecha) )     	$errors[11]   = '<div class="bubble">Ingrese una fecha</div>';
	if ( empty($Detalle) )     	$errors[12]   = '<div class="bubble">Escriba un mensaje</div>';


//Validaciones de ingreso de datos optativos

	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[1]	    = '<div class="bubble">El Rut no es valido</div>'; 
		}
	}

	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[5]	    = '<div class="bubble">El Email no es valido</div>'; 
		}
	}
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[6]	    = '<div class="bubble">Ingrese un telefono fijo valido</div>'; 
		}
	}
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[13]	    = '<div class="bubble">Ingrese un telefono celular valido</div>'; 
		}
	}
	
	
	
	
?>