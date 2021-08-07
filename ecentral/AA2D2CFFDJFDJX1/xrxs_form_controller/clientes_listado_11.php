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
	//Verifico si el vecino ya existe
	//Se verifica si el usuario existe
	if(isset($Rut)){
		$sql_Rut = mysql_query("SELECT Rut FROM clientes_listado WHERE Rut='".$Rut."'"); 
		$n_Rut = mysql_num_rows($sql_Rut);
	} else {$n_Rut=0;}
	// se verifica si el correo ya existe
	if(isset($email)){
		$sql_email = mysql_query("SELECT email FROM clientes_listado WHERE email='".$email."'");
		$n_email = mysql_num_rows($sql_email);
	} else {$n_email=0;}
	
	
	//Validaciones

	if($n_Rut > 0)               $errors[1]       = '<h4 class="alert_error">El Rut ya esta en uso</h4>';
	if($n_email > 0)             $errors[2]       = '<h4 class="alert_error">El email ya esta en uso</h4>';
	if ( empty($Nombres) )       $errors[3] 	  = '<h4 class="alert_error">No ha ingresado el nombre del vecino</h4>';
	if ( empty($ApellidoPat) )   $errors[4] 	  = '<h4 class="alert_error">No ha ingresado el apellido Paterno</h4>';
	if ( empty($ApellidoMat) )   $errors[5] 	  = '<h4 class="alert_error">No ha ingresado el apellido Materno</h4>';
	if ( empty($Rut) )           $errors[6] 	  = '<h4 class="alert_error">No ha ingresado el Rut del vecino</h4>';
	if ( empty($Sexo) )          $errors[7] 	  = '<h4 class="alert_error">No ha seleccionado el sexo del vecino</h4>';    
    if ( empty($Fono1) )         $errors[8] 	  = '<h4 class="alert_error">No ha ingresado el telefono de casa del vecino</h4>';	
	if ( empty($idCiudad) )      $errors[9] 	  = '<h4 class="alert_error">No ha seleccionado una region</h4>';
	if ( empty($idComuna) )      $errors[10] 	  = '<h4 class="alert_error">No ha seleccionado una comuna</h4>';
	if ( empty($idCalle) )       $errors[11] 	  = '<h4 class="alert_error">No ha seleccionado una calle</h4>';
	if ( empty($n_calle) )       $errors[12] 	  = '<h4 class="alert_error">No ha ingresado el numero de la casa</h4>';
	
	
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[13]	    = '<h4 class="alert_error">Ingrese un telefono de casa valido</h4>'; 
		}
	}	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[14]	    = '<h4 class="alert_error">Ingrese un telefono celular valido</h4>'; 
		}
	}
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[15]	    = '<h4 class="alert_error">Ingrese un Rut valido</h4>';
		}
	}
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[16]	    = '<h4 class="alert_error">Ingrese un email valido</h4>';
		}
	}
	//Valida si el fono ingresado es un numero telefonico
	if(isset($n_calle)){
		if (validarnumero($n_calle)) {   
			$errors[17]	    = '<h4 class="alert_error">Ingrese un numero de casa valido</h4>'; 
		}
	}
?>