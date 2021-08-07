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
	if ( !empty($_POST['idVista']) )     $idVista     = $_POST['idVista'];
	if ( !empty($_POST['idRobo']) )      $idRobo      = $_POST['idRobo'];
	if ( !empty($_POST['idCliente']) )   $idCliente   = $_POST['idCliente'];
	if ( !empty($_POST['Fecha']) )       $Fecha       = $_POST['Fecha'];
	if ( !empty($_POST['Hora']) )        $Hora        = $_POST['Hora'];
	if ( !empty($_POST['Longitud']) )    $Longitud    = $_POST['Longitud'];
	if ( !empty($_POST['Latitud']) )     $Latitud     = $_POST['Latitud'];
	if ( !empty($_POST['Gsm']) )         $Gsm 	      = $_POST['Gsm'];
	if ( !empty($_POST['vista']) )       $vista       = $_POST['vista'];

	
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
			case 'idVista':    if(empty($idVista)){   $error['idVista']     = 'error/No ha ingresado el id ';}break;
			case 'idRobo':     if(empty($idRobo)){    $error['idRobo']      = 'error/No ha ingresado el idRobo del sistema';}break;
			case 'idCliente':  if(empty($idCliente)){ $error['idCliente']   = 'error/No ha ingresado la id del cliente';}break;
			case 'Fecha':      if(empty($Fecha)){     $error['Fecha']       = 'error/No ha ingresado la fecha';}break;
			case 'Hora':       if(empty($Hora)){      $error['Hora']        = 'error/No ha ingresado la hora';}break;
			case 'Longitud':   if(empty($Longitud)){  $error['Longitud']    = 'error/No ha ingresado la Longitud';}break;
			case 'Latitud':    if(empty($Latitud)){   $error['Latitud']     = 'error/No ha ingresado la Latitud';}break;
			case 'Gsm':        if(empty($Gsm)){       $error['Gsm']         = 'error/No ha ingresado el Gsm';}break;
			case 'vista':      if(empty($vista)){     $error['vista']       = 'error/No ha ingresado la vista';}break;
			
			
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
				if(isset($idRobo) && $idRobo != ''){         $a = "'".$idRobo."'" ;        }else{$a ="''";}
				if(isset($idCliente) && $idCliente != ''){   $a .= ",'".$idCliente."'" ;   }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){           $a .= ",'".$Fecha."'" ;       }else{$a .= ",''";}
				if(isset($Hora) && $Hora != ''){             $a .= ",'".$Hora."'" ;        }else{$a .= ",''";}
				if(isset($Longitud) && $Longitud != ''){     $a .= ",'".$Longitud."'" ;    }else{$a .= ",''";}
				if(isset($Latitud) && $Latitud != ''){       $a .= ",'".$Latitud."'" ;     }else{$a .= ",''";}
				if(isset($Gsm) && $Gsm != ''){               $a .= ",'".$Gsm."'" ;         }else{$a .= ",''";}
				if(isset($vista) && $vista != ''){           $a .= ",'".$vista."'" ;       }else{$a .= ",''";}

				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `alertas_avistadas` (idRobo, idCliente, Fecha, Hora, Longitud, Latitud, Gsm, vista) VALUES ({$a} )";
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
				$a = "idVista='".$idVista."'" ;
				if(isset($idRobo) && $idRobo != ''){         $a .= ",idRobo='".$idRobo."'" ;}
				if(isset($idCliente) && $idCliente != ''){   $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($Fecha) && $Fecha != ''){           $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Hora) && $Hora != ''){             $a .= ",Hora='".$Hora."'" ;}
				if(isset($Longitud) && $Longitud != ''){     $a .= ",Longitud='".$Longitud."'" ;}
				if(isset($Latitud) && $Latitud != ''){       $a .= ",Latitud='".$Latitud."'" ;}
				if(isset($Gsm) && $Gsm != ''){               $a .= ",Gsm='".$Gsm."'" ;}
				if(isset($vista) && $vista != ''){           $a .= ",vista='".$vista."'" ;}

		
				// inserto los datos de registro en la db
				$query  = "UPDATE `alertas_avistadas` SET ".$a." WHERE idVista = '$idVista'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `alertas_avistadas` WHERE idVista = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>