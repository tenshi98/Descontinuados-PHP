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
	if ( !empty($_POST['idImagen']) )    $idImagen     = $_POST['idImagen'];
	if ( !empty($_POST['idVehiculo']) )  $idVehiculo   = $_POST['idVehiculo'];
	if ( !empty($_POST['idCliente']) )   $idCliente    = $_POST['idCliente'];
	if ( !empty($_POST['Fecha']) )       $Fecha        = $_POST['Fecha'];
	if ( !empty($_POST['Nombre']) )      $Nombre       = $_POST['Nombre'];
	
	
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
			case 'idImagen':    if(empty($idImagen)){     $error['idImagen']     = 'error/No ha ingresado el id del sistema';}break;
			case 'idVehiculo':  if(empty($idVehiculo)){   $error['idVehiculo']   = 'error/No ha ingresado el idVehiculo del sistema';}break;
			case 'idCliente':   if(empty($idCliente)){    $error['idCliente']    = 'error/No ha ingresado la imagen';}break;
			case 'Fecha':       if(empty($Fecha)){        $error['Fecha']        = 'error/No ha ingresado el email';}break;
			case 'Nombre':      if(empty($Nombre)){       $error['Nombre']       = 'error/No ha ingresado la razon social';}break;
			
		}
	}

	
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
				if(isset($idVehiculo) && $idVehiculo != ''){   $a = "'".$idVehiculo."'" ;     }else{$a ="''";}
				if(isset($idCliente) && $idCliente != ''){     $a .= ",'".$idCliente."'" ;    }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){             $a .= ",'".$Fecha."'" ;        }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){           $a .= ",'".$Nombre."'" ;       }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_vehiculos_img` (idVehiculo, idCliente, Fecha, Nombre) VALUES ({$a} )";
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
				$a = "idImagen='".$idImagen."'" ;
				if(isset($idVehiculo) && $idVehiculo != ''){  $a .= ",idVehiculo='".$idVehiculo."'" ;}
				if(isset($idCliente) && $idCliente != ''){    $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($Fecha) && $Fecha != ''){            $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Nombre) && $Nombre != ''){          $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_vehiculos_img` SET ".$a." WHERE idImagen = '$idImagen'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_vehiculos_img` WHERE idImagen = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
							
/*******************************************************************************************************************/
	}
?>