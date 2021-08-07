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
	if ( !empty($_POST['idEmpresa']) ) $idEmpresa   = $_POST['idEmpresa'];
	if ( !empty($_POST['idCliente']) ) $idCliente   = $_POST['idCliente'];
	if ( !empty($_POST['Nombre']) )    $Nombre      = $_POST['Nombre'];
	if ( !empty($_POST['Fono']) )      $Fono        = $_POST['Fono'];
	if ( !empty($_POST['Email']) )     $Email       = $_POST['Email'];

	
	
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
			case 'idEmpresa':  if(empty($idEmpresa)){   $error['idEmpresa']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idCliente':  if(empty($idCliente)){   $error['idCliente']  = 'error/No ha ingresado el idCliente del sistema';}break;
			case 'Nombre':     if(empty($Nombre)){      $error['Nombre']     = 'error/No ha ingresado la imagen';}break;
			case 'Fono':       if(empty($Fono)){        $error['Fono']       = 'error/No ha ingresado el email';}break;
			case 'Email':      if(empty($Email)){       $error['Email']      = 'error/No ha ingresado la razon social';}break;
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($Email)){if(validaremail($Email)){ }else{   $error['Email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono)){if (validarnumero($Fono)) {         $error['Fono']	   = 'error/Ingrese un numero telefonico valido'; }}

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idCliente) && $idCliente != ''){   $a = "'".$idCliente."'" ;   }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){         $a .= ",'".$Nombre."'" ;    }else{$a .= ",''";}
				if(isset($Fono) && $Fono != ''){             $a .= ",'".$Fono."'" ;      }else{$a .= ",''";}
				if(isset($Email) && $Email != ''){           $a .= ",'".$Email."'" ;     }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_contacto_empresas` (idCliente, Nombre, Fono, Email) VALUES ({$a} )";
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
				$a = "idEmpresa='".$idEmpresa."'" ;
				if(isset($idCliente) && $idCliente != ''){   $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($Nombre) && $Nombre != ''){         $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Fono) && $Fono != ''){             $a .= ",Fono='".$Fono."'" ;}
				if(isset($Email) && $Email != ''){           $a .= ",Email='".$Email."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_contacto_empresas` SET ".$a." WHERE idEmpresa = '$idEmpresa'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_contacto_empresas` WHERE idEmpresa = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
					
/*******************************************************************************************************************/
	}
?>