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
	if ( !empty($_POST['idSolicitud']) )                 $idSolicitud                 = $_POST['idSolicitud'];
	if ( !empty($_POST['idCliente']) )                   $idCliente                   = $_POST['idCliente'];
	if ( !empty($_POST['idTaxista']) )                   $idTaxista                   = $_POST['idTaxista'];
	if ( !empty($_POST['Fecha']) )                       $Fecha                       = $_POST['Fecha'];
	if ( !empty($_POST['Semana']) )                      $Semana                      = $_POST['Semana'];
	if ( !empty($_POST['Ano']) )                         $Ano                         = $_POST['Ano'];
	if ( !empty($_POST['Hora']) )                        $Hora                        = $_POST['Hora'];
	if ( !empty($_POST['Hora_Cancel']) )                 $Hora_Cancel 	              = $_POST['Hora_Cancel'];
	if ( !empty($_POST['Cliente_Longitud']) )            $Cliente_Longitud            = $_POST['Cliente_Longitud'];
	if ( !empty($_POST['Cliente_Latitud']) )             $Cliente_Latitud             = $_POST['Cliente_Latitud'];
	if ( !empty($_POST['Taxista_Longitud']) )            $Taxista_Longitud 	          = $_POST['Taxista_Longitud'];
	if ( !empty($_POST['Taxista_Latitud']) )             $Taxista_Latitud 	          = $_POST['Taxista_Latitud'];
	if ( !empty($_POST['CarreraFinalizada_Longitud']) )  $CarreraFinalizada_Longitud  = $_POST['CarreraFinalizada_Longitud'];
	if ( !empty($_POST['CarreraFinalizada_Latitud']) )   $CarreraFinalizada_Latitud   = $_POST['CarreraFinalizada_Latitud'];
	if ( !empty($_POST['Estado']) )                      $Estado 	                  = $_POST['Estado'];
	if ( !empty($_POST['taxista_vista']) )               $taxista_vista 	          = $_POST['taxista_vista'];
	if ( !empty($_POST['taxista_evaluacion']) )          $taxista_evaluacion          = $_POST['taxista_evaluacion'];
	if ( !empty($_POST['taxista_observacion']) )         $taxista_observacion         = $_POST['taxista_observacion'];
	if ( !empty($_POST['pasajero_evaluacion']) )         $pasajero_evaluacion         = $_POST['pasajero_evaluacion'];
	if ( !empty($_POST['pasajero_observacion']) )        $pasajero_observacion        = $_POST['pasajero_observacion'];
	if ( !empty($_POST['minutos']) )                     $minutos                     = $_POST['minutos'];
	if ( !empty($_POST['idDocumento']) )                 $idDocumento                 = $_POST['idDocumento'];
	if ( !empty($_POST['EstadoPago']) )                  $EstadoPago                  = $_POST['EstadoPago'];
	
	
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
			case 'idSolicitud':                 if(empty($idSolicitud)){                  $error['idSolicitud']                 = 'error/No ha ingresado el id del sistema';}break;
			case 'idCliente':                   if(empty($idCliente)){                    $error['idCliente']                   = 'error/No ha ingresado el idCliente del sistema';}break;
			case 'idTaxista':                   if(empty($idTaxista)){                    $error['idTaxista']                   = 'error/No ha ingresado la imagen';}break;
			case 'Fecha':                       if(empty($Fecha)){                        $error['Fecha']                       = 'error/No ha ingresado el email';}break;
			case 'Semana':                      if(empty($Semana)){                       $error['Semana']                      = 'error/No ha ingresado la razon social';}break;
			case 'Ano':                         if(empty($Ano)){                          $error['Ano']                         = 'error/No ha ingresado el Ano';}break;
			case 'Hora':                        if(empty($Hora)){                         $error['Hora']                        = 'error/No ha ingresado la Hora';}break;
			case 'Hora_Cancel':                 if(empty($Hora_Cancel)){                  $error['Hora_Cancel']                 = 'error/No ha ingresado el Hora_Cancel';}break;
			case 'Cliente_Longitud':            if(empty($Cliente_Longitud)){             $error['Cliente_Longitud']            = 'error/No ha ingresado el Cliente_Longitud';}break;
			case 'Cliente_Latitud':             if(empty($Cliente_Latitud)){              $error['Cliente_Latitud']             = 'error/No ha ingresado la Cliente_Latitud';}break;
			case 'Taxista_Longitud':            if(empty($Taxista_Longitud)){             $error['Taxista_Longitud']            = 'error/No ha ingresado el Taxista_Longitud';}break;	
			case 'Taxista_Latitud':             if(empty($Taxista_Latitud)){              $error['Taxista_Latitud']             = 'error/No ha ingresado la carpeta de imagenes';}break;
			case 'CarreraFinalizada_Longitud':  if(empty($CarreraFinalizada_Longitud)){   $error['CarreraFinalizada_Longitud']  = 'error/No ha ingresado la carpeta de mp3';}break;
			case 'CarreraFinalizada_Latitud':   if(empty($CarreraFinalizada_Latitud)){    $error['CarreraFinalizada_Latitud']   = 'error/No ha ingresado la carpeta de videos';}break;
			case 'Estado':                      if(empty($Estado)){                       $error['Estado']                      = 'error/No ha ingresado la web de videos';}break;
			case 'taxista_vista':               if(empty($taxista_vista)){                $error['taxista_vista']               = 'error/No ha ingresado la web de videos';}break;
			case 'taxista_evaluacion':          if(empty($taxista_evaluacion)){           $error['taxista_evaluacion']          = 'error/No ha ingresado la web de videos';}break;
			case 'taxista_observacion':         if(empty($taxista_observacion)){          $error['taxista_observacion']         = 'error/No ha ingresado la web de talento';}break;
			case 'pasajero_evaluacion':         if(empty($pasajero_evaluacion)){          $error['pasajero_evaluacion']         = 'error/No ha ingresado la web de talento';}break;
			case 'pasajero_observacion':        if(empty($pasajero_observacion)){         $error['pasajero_observacion']        = 'error/No ha ingresado la web de talento';}break;
			case 'minutos':                     if(empty($minutos)){                      $error['minutos']                     = 'error/No ha ingresado la web de talento';}break;
			case 'idDocumento':                 if(empty($idDocumento)){                  $error['idDocumento']                 = 'error/No ha ingresado la web de talento';}break;
			case 'EstadoPago':                  if(empty($EstadoPago)){                   $error['EstadoPago']                  = 'error/No ha ingresado la web de talento';}break;
			
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
				if(isset($idCliente) && $idCliente != ''){                                     $a = "'".$idCliente."'" ;                      }else{$a ="''";}
				if(isset($idTaxista) && $idTaxista != ''){                                     $a .= ",'".$idTaxista."'" ;                    }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){                                             $a .= ",'".$Fecha."'" ;                        }else{$a .= ",''";}
				if(isset($Semana) && $Semana != ''){                                           $a .= ",'".$Semana."'" ;                       }else{$a .= ",''";}
				if(isset($Ano) && $Ano != ''){                                                 $a .= ",'".$Ano."'" ;                          }else{$a .= ",''";}
				if(isset($Hora) && $Hora != ''){                                               $a .= ",'".$Hora."'" ;                         }else{$a .= ",''";}
				if(isset($Hora_Cancel) && $Hora_Cancel != ''){                                 $a .= ",'".$Hora_Cancel."'" ;                  }else{$a .= ",''";}
				if(isset($Cliente_Longitud) && $Cliente_Longitud != ''){                       $a .= ",'".$Cliente_Longitud."'" ;             }else{$a .= ",''";}
				if(isset($Cliente_Latitud) && $Cliente_Latitud != ''){                         $a .= ",'".$Cliente_Latitud."'" ;              }else{$a .= ",''";}
				if(isset($Taxista_Longitud) && $Taxista_Longitud != ''){                       $a .= ",'".$Taxista_Longitud."'" ;             }else{$a .= ",''";}
				if(isset($Taxista_Latitud) && $Taxista_Latitud != ''){                         $a .= ",'".$Taxista_Latitud."'" ;              }else{$a .= ",''";}
				if(isset($CarreraFinalizada_Longitud) && $CarreraFinalizada_Longitud != ''){   $a .= ",'".$CarreraFinalizada_Longitud."'" ;   }else{$a .= ",''";}
				if(isset($CarreraFinalizada_Latitud) && $CarreraFinalizada_Latitud != ''){     $a .= ",'".$CarreraFinalizada_Latitud."'" ;    }else{$a .= ",''";}
				if(isset($Estado) && $Estado != ''){                                           $a .= ",'".$Estado."'" ;                       }else{$a .= ",''";}
				if(isset($taxista_vista) && $taxista_vista != ''){                             $a .= ",'".$taxista_vista."'" ;                }else{$a .= ",''";}
				if(isset($taxista_evaluacion) && $taxista_evaluacion != ''){                   $a .= ",'".$taxista_evaluacion."'" ;           }else{$a .= ",''";}
				if(isset($taxista_observacion) && $taxista_observacion != ''){                 $a .= ",'".$taxista_observacion."'" ;          }else{$a .= ",''";}
				if(isset($pasajero_evaluacion) && $pasajero_evaluacion != ''){                 $a .= ",'".$pasajero_evaluacion."'" ;          }else{$a .= ",''";}
				if(isset($pasajero_observacion) && $pasajero_observacion != ''){               $a .= ",'".$pasajero_observacion."'" ;         }else{$a .= ",''";}
				if(isset($minutos) && $minutos != ''){                                         $a .= ",'".$minutos."'" ;                      }else{$a .= ",''";}
				if(isset($idDocumento) && $idDocumento != ''){                                 $a .= ",'".$idDocumento."'" ;                  }else{$a .= ",''";}
				if(isset($EstadoPago) && $EstadoPago != ''){                                   $a .= ",'".$EstadoPago."'" ;                   }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `solicitud_taxi_listado` (idCliente, idTaxista, Fecha, Semana, Ano, Hora, Hora_Cancel, Cliente_Longitud, Cliente_Latitud, 
				Taxista_Longitud, Taxista_Latitud, CarreraFinalizada_Longitud, CarreraFinalizada_Latitud, Estado, taxista_vista, taxista_evaluacion, 
				taxista_observacion, pasajero_evaluacion, pasajero_observacion, minutos, idDocumento, EstadoPago) VALUES ({$a} )";
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
				$a = "idSolicitud='".$idSolicitud."'" ;
				if(isset($idCliente) && $idCliente != ''){                                     $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($idTaxista) && $idTaxista != ''){                                     $a .= ",idTaxista='".$idTaxista."'" ;}
				if(isset($Fecha) && $Fecha != ''){                                             $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Semana) && $Semana != ''){                                           $a .= ",Semana='".$Semana."'" ;}
				if(isset($Ano) && $Ano != ''){                                                 $a .= ",Ano='".$Ano."'" ;}
				if(isset($Hora) && $Hora != ''){                                               $a .= ",Hora='".$Hora."'" ;}
				if(isset($Hora_Cancel) && $Hora_Cancel != ''){                                 $a .= ",Hora_Cancel='".$Hora_Cancel."'" ;}
				if(isset($Cliente_Longitud) && $Cliente_Longitud != ''){                       $a .= ",Cliente_Longitud='".$Cliente_Longitud."'" ;}
				if(isset($Cliente_Latitud) && $Cliente_Latitud != ''){                         $a .= ",Cliente_Latitud='".$Cliente_Latitud."'" ;}
				if(isset($Taxista_Longitud) && $Taxista_Longitud != ''){                       $a .= ",Taxista_Longitud='".$Taxista_Longitud."'" ;}
				if(isset($Taxista_Latitud) && $Taxista_Latitud != ''){                         $a .= ",Taxista_Latitud='".$Taxista_Latitud."'" ;}
				if(isset($CarreraFinalizada_Longitud) && $CarreraFinalizada_Longitud != ''){   $a .= ",CarreraFinalizada_Longitud='".$CarreraFinalizada_Longitud."'" ;}
				if(isset($CarreraFinalizada_Latitud) && $CarreraFinalizada_Latitud != ''){     $a .= ",CarreraFinalizada_Latitud='".$CarreraFinalizada_Latitud."'" ;}
				if(isset($Estado) && $Estado != ''){                                           $a .= ",Estado='".$Estado."'" ;}
				if(isset($taxista_vista) && $taxista_vista != ''){                             $a .= ",taxista_vista='".$taxista_vista."'" ;}
				if(isset($taxista_evaluacion) && $taxista_evaluacion != ''){                   $a .= ",taxista_evaluacion='".$taxista_evaluacion."'" ;}
				if(isset($taxista_observacion) && $taxista_observacion != ''){                 $a .= ",taxista_observacion='".$taxista_observacion."'" ;}
				if(isset($pasajero_evaluacion) && $pasajero_evaluacion != ''){                 $a .= ",pasajero_evaluacion='".$pasajero_evaluacion."'" ;}
				if(isset($pasajero_observacion) && $pasajero_observacion != ''){               $a .= ",pasajero_observacion='".$pasajero_observacion."'" ;}
				if(isset($minutos) && $minutos != ''){                                         $a .= ",minutos='".$minutos."'" ;}
				if(isset($idDocumento) && $idDocumento != ''){                                 $a .= ",idDocumento='".$idDocumento."'" ;}
				if(isset($EstadoPago) && $EstadoPago != ''){                                   $a .= ",EstadoPago='".$EstadoPago."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `solicitud_taxi_listado` SET ".$a." WHERE idSolicitud = '$idSolicitud'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `solicitud_taxi_listado` WHERE idSolicitud = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
							
/*******************************************************************************************************************/
	}
?>