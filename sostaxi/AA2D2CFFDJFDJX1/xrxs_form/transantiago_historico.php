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
	if ( !empty($_POST['idHistorico']) )   $idHistorico   = $_POST['idHistorico'];
	if ( !empty($_POST['Fecha']) )         $Fecha         = $_POST['Fecha'];
	if ( !empty($_POST['Hora']) )          $Hora          = $_POST['Hora'];
	if ( !empty($_POST['idCliente']) )     $idCliente     = $_POST['idCliente'];
	if ( !empty($_POST['idRecorrido']) )   $idRecorrido   = $_POST['idRecorrido'];
	if ( !empty($_POST['idRuta']) )        $idRuta        = $_POST['idRuta'];
	if ( !empty($_POST['Latitud']) )       $Latitud       = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) )      $Longitud      = $_POST['Longitud'];
	if ( !empty($_POST['idConductor']) )   $idConductor   = $_POST['idConductor'];
	
	
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
			case 'idHistorico':    if(empty($idHistorico)){   $error['idHistorico']  = 'error/No ha ingresado el id del sistema';}break;
			case 'Fecha':          if(empty($Fecha)){         $error['Fecha']        = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Hora':           if(empty($Hora)){          $error['Hora']         = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idCliente':      if(empty($idCliente)){     $error['idCliente']    = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idRecorrido':    if(empty($idRecorrido)){   $error['idRecorrido']  = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idRuta':         if(empty($idRuta)){        $error['idRuta']       = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Latitud':        if(empty($Latitud)){       $error['Latitud']      = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Longitud':       if(empty($Longitud)){      $error['Longitud']     = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idConductor':    if(empty($idConductor)){   $error['idConductor']  = 'error/No ha ingresado el Fecha del sistema';}break;
			
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
				if(isset($Fecha) && $Fecha != ''){               $a  = "'".$Fecha."'" ;          }else{$a  ="''";}
				if(isset($Hora) && $Hora != ''){                 $a .= ",'".$Hora."'" ;          }else{$a .=",''";}
				if(isset($idCliente) && $idCliente != ''){       $a .= ",'".$idCliente."'" ;     }else{$a .=",''";}
				if(isset($idRecorrido) && $idRecorrido != ''){   $a .= ",'".$idRecorrido."'" ;   }else{$a .=",''";}
				if(isset($idRuta) && $idRuta != ''){             $a .= ",'".$idRuta."'" ;        }else{$a .=",''";}
				if(isset($Latitud) && $Latitud != ''){           $a .= ",'".$Latitud."'" ;       }else{$a .=",''";}
				if(isset($Longitud) && $Longitud != ''){         $a .= ",'".$Longitud."'" ;      }else{$a .=",''";}
				if(isset($idConductor) && $idConductor != ''){   $a .= ",'".$idConductor."'" ;   }else{$a .=",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `transantiago_historico` (Fecha, Hora, idCliente, idRecorrido, idRuta, Latitud, Longitud, idConductor) VALUES ({$a} )";
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
				$a = "idHistorico='".$idHistorico."'" ;
				if(isset($Fecha) && $Fecha != ''){               $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Hora) && $Hora != ''){                 $a .= ",Hora='".$Hora."'" ;}
				if(isset($idCliente) && $idCliente != ''){       $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($idRecorrido) && $idRecorrido != ''){   $a .= ",idRecorrido='".$idRecorrido."'" ;}
				if(isset($idRuta) && $idRuta != ''){             $a .= ",idRuta='".$idRuta."'" ;}
				if(isset($Latitud) && $Latitud != ''){           $a .= ",Latitud='".$Latitud."'" ;}
				if(isset($Longitud) && $Longitud != ''){         $a .= ",Longitud='".$Longitud."'" ;}
				if(isset($idConductor) && $idConductor != ''){   $a .= ",idConductor='".$idConductor."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `transantiago_historico` SET ".$a." WHERE idHistorico = '$idHistorico'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `transantiago_historico` WHERE idHistorico = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>