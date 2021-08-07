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
	if ( !empty($_POST['idAgenda']) )      $idAgenda      = $_POST['idAgenda'];
	if ( !empty($_POST['idSistema']) )     $idSistema     = $_POST['idSistema'];
	if ( !empty($_POST['idUsuario']) )     $idUsuario     = $_POST['idUsuario'];
	if ( !empty($_POST['Nombre']) )        $Nombre        = $_POST['Nombre'];
	if ( !empty($_POST['Fono']) )          $Fono          = $_POST['Fono'];
	
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
			case 'idAgenda':   if(empty($idAgenda)){    $error['idAgenda']   = 'error/No ha ingresado el id';}break;
			case 'idSistema':  if(empty($idSistema)){   $error['idSistema']  = 'error/No ha ingresado el sistema';}break;
			case 'idUsuario':  if(empty($idUsuario)){   $error['idUsuario']  = 'error/No ha ingresado el usuario';}break;
			case 'Nombre':     if(empty($Nombre)){      $error['Nombre']     = 'error/No ha ingresado el nombre';}break;
			case 'Fono':       if(empty($Fono)){        $error['Fono']       = 'error/No ha ingresado el fono';}break;
		}
	}

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el dato existe
			if(isset($idUsuario)){
				$sql_usuario = mysql_query("SELECT idUsuario FROM agenda_telefonica WHERE Fono='".$Fono."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['idUsuario'] = 'error/El Contacto ya existe en el sistema';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){   $a  = "'".$idSistema."'" ;    }else{$a  ="''";}
				if(isset($idUsuario) && $idUsuario != ''){   $a .= ",'".$idUsuario."'" ;   }else{$a .=",''";}
				if(isset($Nombre) && $Nombre != ''){         $a .= ",'".$Nombre."'" ;      }else{$a .=",''";}
				if(isset($Fono) && $Fono != ''){             $a .= ",'".$Fono."'" ;        }else{$a .=",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `agenda_telefonica` (idSistema, idUsuario, Nombre, Fono) VALUES ({$a} )";
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
				$a = "idAgenda='".$idAgenda."'" ;
				if(isset($idSistema) && $idSistema != ''){   $a .= ",idSistema='".$idSistema."'" ;}
				if(isset($idUsuario) && $idUsuario != ''){   $a .= ",idUsuario='".$idUsuario."'" ;}
				if(isset($Nombre) && $Nombre != ''){         $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Fono) && $Fono != ''){             $a .= ",Fono='".$Fono."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `agenda_telefonica` SET ".$a." WHERE idAgenda = '$idAgenda'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `agenda_telefonica` WHERE idAgenda = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
					
/*******************************************************************************************************************/
	}
?>
