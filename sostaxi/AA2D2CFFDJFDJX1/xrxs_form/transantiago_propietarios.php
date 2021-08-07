<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idPropietario']) )     $idPropietario     = $_POST['idPropietario'];
	if ( !empty($_POST['Nombre']) )            $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['Apellido_Paterno']) )  $Apellido_Paterno  = $_POST['Apellido_Paterno'];
	if ( !empty($_POST['Apellido_Materno']) )  $Apellido_Materno  = $_POST['Apellido_Materno'];
	if ( !empty($_POST['Rut']) )               $Rut               = $_POST['Rut'];
	if ( !empty($_POST['Sexo']) )              $Sexo              = $_POST['Sexo'];
	if ( !empty($_POST['fNacimiento']) )       $fNacimiento       = $_POST['fNacimiento'];
	if ( !empty($_POST['email']) )             $email 	          = $_POST['email'];
	if ( !empty($_POST['Pais']) )              $Pais              = $_POST['Pais'];
	if ( !empty($_POST['idCiudad']) )          $idCiudad          = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )          $idComuna 	      = $_POST['idComuna'];
	if ( !empty($_POST['Direccion']) )         $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['Fono1']) )             $Fono1 	          = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )             $Fono2 	          = $_POST['Fono2'];
	if ( !empty($_POST['NombreEmpresa']) )     $NombreEmpresa     = $_POST['NombreEmpresa'];
	
	
/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
			case 'idPropietario':    if(empty($idPropietario)){    $error['idPropietario']     = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':           if(empty($Nombre)){           $error['Nombre']            = 'error/No ha ingresado el Nombre del sistema';}break;
			case 'Apellido_Paterno': if(empty($Apellido_Paterno)){ $error['Apellido_Paterno']  = 'error/No ha ingresado la imagen';}break;
			case 'Apellido_Materno': if(empty($Apellido_Materno)){ $error['Apellido_Materno']  = 'error/No ha ingresado el email';}break;
			case 'Rut':              if(empty($Rut)){              $error['Rut']               = 'error/No ha ingresado la razon social';}break;
			case 'Sexo':             if(empty($Sexo)){             $error['Sexo']              = 'error/No ha ingresado el Sexo';}break;
			case 'fNacimiento':      if(empty($fNacimiento)){      $error['fNacimiento']       = 'error/No ha ingresado la fNacimiento';}break;
			case 'email':            if(empty($email)){            $error['email']             = 'error/No ha ingresado el email';}break;
			case 'Pais':             if(empty($Pais)){             $error['Pais']              = 'error/No ha ingresado el Pais';}break;
			case 'idCiudad':         if(empty($idCiudad)){         $error['idCiudad']          = 'error/No ha ingresado la idCiudad';}break;
			case 'idComuna':         if(empty($idComuna)){         $error['idComuna']          = 'error/No ha ingresado el idComuna';}break;	
			case 'Direccion':        if(empty($Direccion)){        $error['Direccion']         = 'error/No ha ingresado la carpeta de imagenes';}break;
			case 'Fono1':            if(empty($Fono1)){            $error['Fono1']             = 'error/No ha ingresado la carpeta de mp3';}break;
			case 'Fono2':            if(empty($Fono2)){            $error['Fono2']             = 'error/No ha ingresado la carpeta de videos';}break;
			case 'NombreEmpresa':    if(empty($NombreEmpresa)){    $error['NombreEmpresa']     = 'error/No ha ingresado la carpeta de videos';}break;
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono1)){if (validarnumero($Fono1)) {       $error['Fono1']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Fono2)){if (validarnumero($Fono2)) {       $error['Fono2']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){            $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	
	
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el dato existe
			if(isset($Nombre)&&isset($Apellido_Paterno)&&isset($Apellido_Materno)){
				$sql_usuario = mysql_query("SELECT Nombre FROM transantiago_propietarios WHERE Nombre='".$Nombre."' AND Apellido_Paterno='".$Apellido_Paterno."' AND Apellido_Materno='".$Apellido_Materno."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El Usuario ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM transantiago_propietarios WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El Rut ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($NombreEmpresa)){
				$sql_email = mysql_query("SELECT NombreEmpresa FROM transantiago_propietarios WHERE NombreEmpresa='".$NombreEmpresa."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['NombreEmpresa'] = 'error/El Nombre de la Empresa ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){                       $a = "'".$Nombre."'" ;               }else{$a ="''";}
				if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){   $a .= ",'".$Apellido_Paterno."'" ;   }else{$a .= ",''";}
				if(isset($Apellido_Materno) && $Apellido_Materno != ''){   $a .= ",'".$Apellido_Materno."'" ;   }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                             $a .= ",'".$Rut."'" ;                }else{$a .= ",''";}
				if(isset($Sexo) && $Sexo != ''){                           $a .= ",'".$Sexo."'" ;               }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",'".$fNacimiento."'" ;        }else{$a .= ",''";}
				if(isset($email) && $email != ''){                         $a .= ",'".$email."'" ;              }else{$a .= ",''";}
				if(isset($Pais) && $Pais != ''){                           $a .= ",'".$Pais."'" ;               }else{$a .= ",''";}
				if(isset($idCiudad) && $idCiudad != ''){                   $a .= ",'".$idCiudad."'" ;           }else{$a .= ",''";}
				if(isset($idComuna) && $idComuna != ''){                   $a .= ",'".$idComuna."'" ;           }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",'".$Direccion."'" ;          }else{$a .= ",''";}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",'".$Fono1."'" ;              }else{$a .= ",''";}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",'".$Fono2."'" ;              }else{$a .= ",''";}
				if(isset($NombreEmpresa) && $NombreEmpresa != ''){         $a .= ",'".$NombreEmpresa."'" ;      }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `transantiago_propietarios` (Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, email, Pais, idCiudad, idComuna, Direccion, Fono1, Fono2, NombreEmpresa) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idPropietario='".$idPropietario."'" ;
				if(isset($Nombre) && $Nombre != ''){                      $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){  $a .= ",Apellido_Paterno='".$Apellido_Paterno."'" ;}
				if(isset($Apellido_Materno) && $Apellido_Materno != ''){  $a .= ",Apellido_Materno='".$Apellido_Materno."'" ;}
				if(isset($Rut) && $Rut != ''){                            $a .= ",Rut='".$Rut."'" ;}
				if(isset($Sexo) && $Sexo != ''){                          $a .= ",Sexo='".$Sexo."'" ;}
				if(isset($fNacimiento) && $fNacimiento != ''){            $a .= ",fNacimiento='".$fNacimiento."'" ;}
				if(isset($email) && $email != ''){                        $a .= ",email='".$email."'" ;}
				if(isset($Pais) && $Pais != ''){                          $a .= ",Pais='".$Pais."'" ;}
				if(isset($idCiudad) && $idCiudad != ''){                  $a .= ",idCiudad='".$idCiudad."'" ;}
				if(isset($idComuna) && $idComuna != ''){                  $a .= ",idComuna='".$idComuna."'" ;}
				if(isset($Direccion) && $Direccion != ''){                $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono1) && $Fono1 != ''){                        $a .= ",Fono1='".$Fono1."'" ;}
				if(isset($Fono2) && $Fono2 != ''){                        $a .= ",Fono2='".$Fono2."'" ;}
				if(isset($NombreEmpresa) && $NombreEmpresa != ''){        $a .= ",NombreEmpresa='".$NombreEmpresa."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `transantiago_propietarios` SET ".$a." WHERE idPropietario = '$idPropietario'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `transantiago_propietarios` WHERE idPropietario = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>