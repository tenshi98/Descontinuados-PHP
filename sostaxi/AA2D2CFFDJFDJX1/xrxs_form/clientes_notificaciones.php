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
	if ( !empty($_POST['idNotificacion']) )   $idNotificacion   = $_POST['idNotificacion'];
	if ( !empty($_POST['idAlerta']) )         $idAlerta         = $_POST['idAlerta'];
	if ( !empty($_POST['idCliente']) )        $idCliente        = $_POST['idCliente'];
	if ( !empty($_POST['idRecibidor']) )      $idRecibidor      = $_POST['idRecibidor'];
	if ( !empty($_POST['idTipoAlerta']) )     $idTipoAlerta     = $_POST['idTipoAlerta'];
	if ( !empty($_POST['mensaje']) )          $mensaje          = $_POST['mensaje'];
	if ( !empty($_POST['Fecha']) )            $Fecha            = $_POST['Fecha'];
	if ( !empty($_POST['Leida']) )            $Leida 	        = $_POST['Leida'];
	if ( !empty($_POST['idVehiculo']) )       $idVehiculo       = $_POST['idVehiculo'];

	
	
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
			case 'idNotificacion':  if(empty($idNotificacion)){  $error['idNotificacion']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idAlerta':        if(empty($idAlerta)){        $error['idAlerta']        = 'error/No ha ingresado el idAlerta del sistema';}break;
			case 'idCliente':       if(empty($idCliente)){       $error['idCliente']       = 'error/No ha ingresado la imagen';}break;
			case 'idRecibidor':     if(empty($idRecibidor)){     $error['idRecibidor']     = 'error/No ha ingresado el email';}break;
			case 'idTipoAlerta':    if(empty($idTipoAlerta)){    $error['idTipoAlerta']    = 'error/No ha ingresado la razon social';}break;
			case 'mensaje':         if(empty($mensaje)){         $error['mensaje']         = 'error/No ha ingresado el mensaje';}break;
			case 'Fecha':           if(empty($Fecha)){           $error['Fecha']           = 'error/No ha ingresado la Fecha';}break;
			case 'Leida':           if(empty($Leida)){           $error['Leida']           = 'error/No ha ingresado el Leida';}break;
			case 'idVehiculo':      if(empty($idVehiculo)){      $error['idVehiculo']      = 'error/No ha ingresado el idVehiculo';}break;
			
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
				if(isset($idAlerta) && $idAlerta != ''){          $a = "'".$idAlerta."'" ;        }else{$a ="''";}
				if(isset($idCliente) && $idCliente != ''){        $a .= ",'".$idCliente."'" ;     }else{$a .= ",''";}
				if(isset($idRecibidor) && $idRecibidor != ''){    $a .= ",'".$idRecibidor."'" ;   }else{$a .= ",''";}
				if(isset($idTipoAlerta) && $idTipoAlerta != ''){  $a .= ",'".$idTipoAlerta."'" ;  }else{$a .= ",''";}
				if(isset($mensaje) && $mensaje != ''){            $a .= ",'".$mensaje."'" ;       }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){                $a .= ",'".$Fecha."'" ;         }else{$a .= ",''";}
				if(isset($Leida) && $Leida != ''){                $a .= ",'".$Leida."'" ;         }else{$a .= ",''";}
				if(isset($idVehiculo) && $idVehiculo != ''){      $a .= ",'".$idVehiculo."'" ;    }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_notificaciones` (idAlerta, idCliente, idRecibidor, idTipoAlerta, mensaje, Fecha, Leida, idVehiculo) VALUES ({$a} )";
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
				$a = "idNotificacion='".$idNotificacion."'" ;
				if(isset($idAlerta) && $idAlerta != ''){           $a .= ",idAlerta='".$idAlerta."'" ;}
				if(isset($idCliente) && $idCliente != ''){         $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($idRecibidor) && $idRecibidor != ''){     $a .= ",idRecibidor='".$idRecibidor."'" ;}
				if(isset($idTipoAlerta) && $idTipoAlerta != ''){   $a .= ",idTipoAlerta='".$idTipoAlerta."'" ;}
				if(isset($mensaje) && $mensaje != ''){             $a .= ",mensaje='".$mensaje."'" ;}
				if(isset($Fecha) && $Fecha != ''){                 $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Leida) && $Leida != ''){                 $a .= ",Leida='".$Leida."'" ;}
				if(isset($idVehiculo) && $idVehiculo != ''){       $a .= ",idVehiculo='".$idVehiculo."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_notificaciones` SET ".$a." WHERE idNotificacion = '$idNotificacion'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_notificaciones` WHERE idNotificacion = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>