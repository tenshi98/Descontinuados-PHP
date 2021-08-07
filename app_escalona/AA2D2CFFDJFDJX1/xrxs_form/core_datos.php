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
	if ( !empty($_POST['id_Datos']) )         $id_Datos         = $_POST['id_Datos'];
	if ( !empty($_POST['email_principal']) )  $email_principal  = $_POST['email_principal'];
	if ( !empty($_POST['Nombre']) )           $Nombre           = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )              $Rut              = $_POST['Rut'];
	if ( !empty($_POST['Direccion']) )        $Direccion        = $_POST['Direccion'];
	if ( !empty($_POST['Fono']) )             $Fono             = $_POST['Fono'];
	if ( !empty($_POST['Ciudad']) )           $Ciudad           = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )           $Comuna 	        = $_POST['Comuna'];
	if ( !empty($_POST['UrlApp']) )           $UrlApp           = $_POST['UrlApp'];
	if ( !empty($_POST['tareasServer']) )     $tareasServer     = $_POST['tareasServer'];
	
	
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
			case 'id_Datos':         if(empty($id_Datos)){         $error['id_Datos']        = 'error/No ha ingresado el id del sistema';}break;
			case 'email_principal':  if(empty($email_principal)){  $error['email_principal'] = 'error/No ha ingresado el email_principal del sistema';}break;
			case 'Nombre':           if(empty($Nombre)){           $error['Nombre']          = 'error/No ha ingresado la imagen';}break;
			case 'Rut':              if(empty($Rut)){              $error['Rut']             = 'error/No ha ingresado el email';}break;
			case 'Direccion':        if(empty($Direccion)){        $error['Direccion']       = 'error/No ha ingresado la razon social';}break;
			case 'Fono':             if(empty($Fono)){             $error['Fono']            = 'error/No ha ingresado el Fono';}break;
			case 'Ciudad':           if(empty($Ciudad)){           $error['Ciudad']          = 'error/No ha ingresado la Ciudad';}break;
			case 'Comuna':           if(empty($Comuna)){           $error['Comuna']          = 'error/No ha ingresado el Comuna';}break;
			case 'UrlApp':           if(empty($UrlApp)){           $error['UrlApp']          = 'error/No ha ingresado el UrlApp';}break;
			case 'tareasServer':     if(empty($tareasServer)){     $error['tareasServer']    = 'error/No ha ingresado la tareasServer';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email_principal)){if(validaremail($email_principal)){ }else{   $error['email_principal']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono)){if (validarnumero($Fono)) {                             $error['Fono']	             = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){                                $error['Rut']               = 'error/El Rut ingresado no es valido'; }}
	
	
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($email_principal)){
				$sql_usuario = mysql_query("SELECT email_principal FROM core_datos WHERE email_principal='".$email_principal."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['email_principal'] = 'error/El email ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($Nombre)){
				$sql_email = mysql_query("SELECT Nombre FROM core_datos WHERE Nombre='".$Nombre."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Nombre'] = 'error/El Nombre ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($email_principal) && $email_principal != ''){   $a = "'".$email_principal."'" ;  }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){                     $a .= ",'".$Nombre."'" ;         }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                           $a .= ",'".$Rut."'" ;            }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){               $a .= ",'".$Direccion."'" ;      }else{$a .= ",''";}
				if(isset($Fono) && $Fono != ''){                         $a .= ",'".$Fono."'" ;           }else{$a .= ",''";}
				if(isset($Ciudad) && $Ciudad != ''){                     $a .= ",'".$Ciudad."'" ;         }else{$a .= ",''";}
				if(isset($Comuna) && $Comuna != ''){                     $a .= ",'".$Comuna."'" ;         }else{$a .= ",''";}
				if(isset($UrlApp) && $UrlApp != ''){                     $a .= ",'".$UrlApp."'" ;         }else{$a .= ",''";}
				if(isset($tareasServer) && $tareasServer != ''){         $a .= ",'".$tareasServer."'" ;   }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `core_datos` (email_principal, Nombre, Rut, Direccion, Fono, Ciudad, Comuna, UrlApp, tareasServer) VALUES ({$a} )";
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
				$a = "id_Datos='".$id_Datos."'" ;
				if(isset($email_principal) && $email_principal != ''){  $a .= ",email_principal='".$email_principal."'" ;}
				if(isset($Nombre) && $Nombre != ''){                    $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Rut) && $Rut != ''){                          $a .= ",Rut='".$Rut."'" ;}
				if(isset($Direccion) && $Direccion != ''){              $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono) && $Fono != ''){                        $a .= ",Fono='".$Fono."'" ;}
				if(isset($Ciudad) && $Ciudad != ''){                    $a .= ",Ciudad='".$Ciudad."'" ;}
				if(isset($Comuna) && $Comuna != ''){                    $a .= ",Comuna='".$Comuna."'" ;}
				if(isset($UrlApp) && $UrlApp != ''){                    $a .= ",UrlApp='".$UrlApp."'" ;}
				if(isset($tareasServer) && $tareasServer != ''){        $a .= ",tareasServer='".$tareasServer."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `core_datos` SET ".$a." WHERE id_Datos = '$id_Datos'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `core_datos` WHERE id_Datos = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;													
/*******************************************************************************************************************/
	}
?>