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
	
//Se validan si existe el usuario o el email asociado de este en la base de datos
	//Se verifica si el usuario existe
	if(isset($usuario)){
		$sql_Rut = mysql_query("SELECT usuario FROM clientes_listado WHERE usuario='".$usuario."'"); 
		$n_Rut = mysql_num_rows($sql_Rut);
	} else {$n_Rut=0;}
	// se verifica si el correo ya existe
	if(isset($email)){
		$sql_email = mysql_query("SELECT email FROM clientes_listado WHERE email='".$email."'");
		$n_email = mysql_num_rows($sql_email);
	} else {$n_email=0;}
	// Valido si el usuario existe
	if($n_Rut > 0) $errors[4]  = '<div class="alert alert-danger" ><strong>Error</strong> El nombre de usuario ya esta en uso</div>';
	
	//Valida si el email existe
	if($n_email > 0)   $errors[3]  = '<div class="alert alert-danger" ><strong>Error</strong> El email ya esta en uso</div>';
	
	//Valida si las contraseñas ingresadas son las mismas
	if(isset($password)&&isset($repassword)){
	if ( $password <> $repassword )      $errors[9]  = '<div class="alert alert-danger" ><strong>Error</strong>Las contraseñas ingresadas no coinciden</div>';
	}

//Validaciones de ingreso de datos obligatorios
	if ( empty($usuario) )          $errors[1] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un Nombre de usuario</div>';
	if ( empty($email) )            $errors[2] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un Correo</div>';
	if ( empty($Nombres) )          $errors[3] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un Nombre</div>';
	if ( empty($ApellidoPat) )      $errors[4] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese apellido Paterno</div>';
	if ( empty($ApellidoMat) )      $errors[5] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese apellido Materno</div>';
	if ( empty($Rut) )              $errors[6] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un Rut</div>';
	if ( empty($Sexo) )             $errors[7] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Seleccione un sexo</div>';
	if ( empty($idCiudad) )         $errors[8] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Seleccione una Ciudad</div>';
	if ( empty($idComuna) )         $errors[9] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Seleccione una comuna</div>';
	if ( empty($idCalle) )          $errors[10]   = '<div class="alert alert-danger" ><strong>Error</strong> Seleccione una Calle</div>';
	if ( empty($n_calle) )          $errors[11]   = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese una Direccion</div>';
	if ( empty($password) )         $errors[12]   = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese una clave</div>';
	if ( empty($repassword) )       $errors[13]   = '<div class="alert alert-danger" ><strong>Error</strong> Reingrese la clave</div>';
	

//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($n_calle)){
		if (validarnumero($n_calle)) {   
			$errors[11]	    = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un numero de calle valido</div>'; 
		}
	}
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[4]	    = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un numero telefonico valido</div>'; 
		}
	}
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[14]	    = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un numero telefonico valido</div>'; 
		}
	}
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[6]	    = '<div class="alert alert-danger" ><strong>Error</strong> El Rut ingresado no es valido</div>'; 
		}
	}
	
	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[5]	    = '<div class="alert alert-danger" ><strong>Error</strong> El Email ingresado no es valido</div>'; 
		}
	}	
	
?>