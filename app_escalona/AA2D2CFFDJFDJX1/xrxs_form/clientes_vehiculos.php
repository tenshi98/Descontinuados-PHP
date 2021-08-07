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
	if ( !empty($_POST['idVehiculo']) )      $idVehiculo        = $_POST['idVehiculo'];
	if ( !empty($_POST['idCliente']) )       $idCliente         = $_POST['idCliente'];
	if ( !empty($_POST['PPU']) )             $PPU               = $_POST['PPU'];
	if ( !empty($_POST['idMarca']) )         $idMarca           = $_POST['idMarca'];
	if ( !empty($_POST['idModelo']) )        $idModelo          = $_POST['idModelo'];
	if ( !empty($_POST['idTransmision']) )   $idTransmision     = $_POST['idTransmision'];
	if ( !empty($_POST['fTransferencia']) )  $fTransferencia    = $_POST['fTransferencia'];
	if ( !empty($_POST['idColorV_1']) )      $idColorV_1 	    = $_POST['idColorV_1'];
	if ( !empty($_POST['idColorV_2']) )      $idColorV_2        = $_POST['idColorV_2'];
	if ( !empty($_POST['fFabricacion']) )    $fFabricacion      = $_POST['fFabricacion'];
	if ( !empty($_POST['N_Motor']) )         $N_Motor 	        = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )        $N_Chasis 	        = $_POST['N_Chasis'];
	if ( !empty($_POST['Obs']) )             $Obs 	            = $_POST['Obs'];
	
	
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
			case 'idVehiculo':      if(empty($idVehiculo)){      $error['idVehiculo']       = 'error/No ha ingresado el id del vehiculo';}break;
			case 'idCliente':       if(empty($idCliente)){       $error['idCliente']        = 'error/No ha ingresado el idCliente del sistema';}break;
			case 'PPU':             if(empty($PPU)){             $error['PPU']              = 'error/No ha ingresado la patente';}break;
			case 'idMarca':         if(empty($idMarca)){         $error['idMarca']          = 'error/No ha ingresado la marca';}break;
			case 'idModelo':        if(empty($idModelo)){        $error['idModelo']         = 'error/No ha ingresado el modelo';}break;
			case 'idTransmision':   if(empty($idTransmision)){   $error['idTransmision']    = 'error/No ha ingresado la transmision';}break;
			case 'fTransferencia':  if(empty($fTransferencia)){  $error['fTransferencia']   = 'error/No ha ingresado la Transferencia';}break;
			case 'idColorV_1':      if(empty($idColorV_1)){      $error['idColorV_1']       = 'error/No ha ingresado el idColorV_1';}break;
			case 'idColorV_2':      if(empty($idColorV_2)){      $error['idColorV_2']       = 'error/No ha ingresado el idColorV_2';}break;
			case 'fFabricacion':    if(empty($fFabricacion)){    $error['fFabricacion']     = 'error/No ha ingresado la fFabricacion';}break;
			case 'N_Motor':         if(empty($N_Motor)){         $error['N_Motor']          = 'error/No ha ingresado el Numero Motor';}break;	
			case 'N_Chasis':        if(empty($N_Chasis)){        $error['N_Chasis']         = 'error/No ha ingresado la Numero de Chasis';}break;
			case 'Obs':             if(empty($Obs)){             $error['Obs']              = 'error/No ha ingresado las observaciones';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($PPU)){
		if(ValidaPatente($PPU)){   $error['PPU']             = 'error/La patente ingresada no tiene el formato correcto'; }
		if(palabra_corto($PPU,6)){ $error['palabra_corto']   = 'error/La patente ingresada tiene mas de los 6 digitos solicitados'; }
		if(palabra_largo($PPU,6)){ $error['palabra_largo']   = 'error/La patente ingresada no tiene los 6 digitos solicitados'; }
	}	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($PPU)){
				$sql_usuario = mysql_query("SELECT PPU FROM clientes_vehiculos WHERE PPU='".$PPU."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['PPU'] = 'error/La patente ya esta en uso';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idCliente) && $idCliente != ''){            $a = "'".$idCliente."'" ;         }else{$a ="''";}
				if(isset($PPU) && $PPU != ''){                        $a .= ",'".$PPU."'" ;             }else{$a .= ",''";}
				if(isset($idMarca) && $idMarca != ''){                $a .= ",'".$idMarca."'" ;         }else{$a .= ",''";}
				if(isset($idModelo) && $idModelo != ''){              $a .= ",'".$idModelo."'" ;        }else{$a .= ",''";}
				if(isset($idTransmision) && $idTransmision != ''){    $a .= ",'".$idTransmision."'" ;   }else{$a .= ",''";}
				if(isset($fTransferencia) && $fTransferencia != ''){  $a .= ",'".$fTransferencia."'" ;  }else{$a .= ",''";}
				if(isset($idColorV_1) && $idColorV_1 != ''){          $a .= ",'".$idColorV_1."'" ;      }else{$a .= ",''";}
				if(isset($idColorV_2) && $idColorV_2 != ''){          $a .= ",'".$idColorV_2."'" ;      }else{$a .= ",''";}
				if(isset($fFabricacion) && $fFabricacion != ''){      $a .= ",'".$fFabricacion."'" ;    }else{$a .= ",''";}
				if(isset($N_Motor) && $N_Motor != ''){                $a .= ",'".$N_Motor."'" ;         }else{$a .= ",''";}
				if(isset($N_Chasis) && $N_Chasis != ''){              $a .= ",'".$N_Chasis."'" ;        }else{$a .= ",''";}
				if(isset($Obs) && $Obs != ''){                        $a .= ",'".$Obs."'" ;             }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_vehiculos` (idCliente, PPU, idMarca, idModelo, idTransmision, fTransferencia, idColorV_1, idColorV_2, fFabricacion, N_Motor, N_Chasis, Obs) VALUES ({$a} )";
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
				$a = "idVehiculo='".$idVehiculo."'" ;
				if(isset($idCliente) && $idCliente != ''){            $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($PPU) && $PPU != ''){                        $a .= ",PPU='".$PPU."'" ;}
				if(isset($idMarca) && $idMarca != ''){                $a .= ",idMarca='".$idMarca."'" ;}
				if(isset($idModelo) && $idModelo != ''){              $a .= ",idModelo='".$idModelo."'" ;}
				if(isset($idTransmision) && $idTransmision != ''){    $a .= ",idTransmision='".$idTransmision."'" ;}
				if(isset($fTransferencia) && $fTransferencia != ''){  $a .= ",fTransferencia='".$fTransferencia."'" ;}
				if(isset($idColorV_1) && $idColorV_1 != ''){          $a .= ",idColorV_1='".$idColorV_1."'" ;}
				if(isset($idColorV_2) && $idColorV_2 != ''){          $a .= ",idColorV_2='".$idColorV_2."'" ;}
				if(isset($fFabricacion) && $fFabricacion != ''){      $a .= ",fFabricacion='".$fFabricacion."'" ;}
				if(isset($N_Motor) && $N_Motor != ''){                $a .= ",N_Motor='".$N_Motor."'" ;}
				if(isset($N_Chasis) && $N_Chasis != ''){              $a .= ",N_Chasis='".$N_Chasis."'" ;}
				if(isset($Obs) && $Obs != ''){                        $a .= ",Obs='".$Obs."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_vehiculos` SET ".$a." WHERE idVehiculo = '$idVehiculo'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_vehiculos` WHERE idVehiculo = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
							
/*******************************************************************************************************************/
	}
?>