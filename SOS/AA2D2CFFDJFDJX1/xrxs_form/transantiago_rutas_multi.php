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
	if ( !empty($_POST['idRutaAlt']) )       $idRutaAlt     = $_POST['idRutaAlt'];
	if ( !empty($_POST['idTipo']) )          $idTipo        = $_POST['idTipo'];
	if ( !empty($_POST['idEstado']) )        $idEstado      = $_POST['idEstado'];
	if ( !empty($_POST['idDias']) )          $idDias        = $_POST['idDias'];
	if ( !empty($_POST['idRecorrido']) )     $idRecorrido   = $_POST['idRecorrido'];
	if ( !empty($_POST['idRuta']) )          $idRuta        = $_POST['idRuta'];
	if ( !empty($_POST['Nombre']) )          $Nombre        = $_POST['Nombre'];
	if ( !empty($_POST['Fecha']) )           $Fecha         = $_POST['Fecha'];
	if ( !empty($_POST['HoraInicio']) )      $HoraInicio    = $_POST['HoraInicio'];
	if ( !empty($_POST['HoraTermino']) )     $HoraTermino   = $_POST['HoraTermino'];
	if ( !empty($_POST['idCatimg']) )        $idCatimg      = $_POST['idCatimg'];
	if ( !empty($_POST['idListimg']) )       $idListimg     = $_POST['idListimg'];
	
	
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
			case 'idRutaAlt':     if(empty($idRutaAlt)){    $error['idRutaAlt']     = 'error/No ha ingresado el id del sistema';}break;
			case 'idTipo':        if(empty($idTipo)){       $error['idTipo']        = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idEstado':      if(empty($idEstado)){     $error['idEstado']      = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idDias':        if(empty($idDias)){       $error['idDias']        = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idRecorrido':   if(empty($idRecorrido)){  $error['idRecorrido']   = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idRuta':        if(empty($idRuta)){       $error['idRuta']        = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Nombre':        if(empty($Nombre)){       $error['Nombre']        = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Fecha':         if(empty($Fecha)){        $error['Fecha']         = 'error/No ha ingresado el nombre del sistema';}break;
			case 'HoraInicio':    if(empty($HoraInicio)){   $error['HoraInicio']    = 'error/No ha ingresado el nombre del sistema';}break;
			case 'HoraTermino':   if(empty($HoraTermino)){  $error['HoraTermino']   = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idCatimg':      if(empty($idCatimg)){     $error['idCatimg']      = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idListimg':     if(empty($idListimg)){    $error['idListimg']     = 'error/No ha ingresado el nombre del sistema';}break;
			
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
				
				//limpio los datos de la cadena de comprobacion
				$HoraInicio = str_replace(' ', '', $HoraInicio);
				$HoraTermino = str_replace(' ', '', $HoraTermino);
	
				//filtros
				if(isset($idTipo) && $idTipo != ''){              $a = "'".$idTipo."'" ;          }else{$a ="''";}
				if(isset($idEstado) && $idEstado != ''){          $a .= ",'".$idEstado."'" ;      }else{$a .=",''";}
				if(isset($idDias) && $idDias != ''){              $a .= ",'".$idDias."'" ;        }else{$a .=",''";}
				if(isset($idRecorrido) && $idRecorrido != ''){    $a .= ",'".$idRecorrido."'" ;   }else{$a .=",''";}
				if(isset($idRuta) && $idRuta != ''){              $a .= ",'".$idRuta."'" ;        }else{$a .=",''";}
				if(isset($Nombre) && $Nombre != ''){              $a .= ",'".$Nombre."'" ;        }else{$a .=",''";}
				if(isset($Fecha) && $Fecha != ''){                $a .= ",'".$Fecha."'" ;         }else{$a .=",''";}
				if(isset($HoraInicio) && $HoraInicio != ''){      $a .= ",'".$HoraInicio."'" ;    }else{$a .=",''";}
				if(isset($HoraTermino) && $HoraTermino != ''){    $a .= ",'".$HoraTermino."'" ;   }else{$a .=",''";}
				if(isset($idCatimg) && $idCatimg != ''){          $a .= ",'".$idCatimg."'" ;      }else{$a .=",''";}
				if(isset($idListimg) && $idListimg != ''){        $a .= ",'".$idListimg."'" ;     }else{$a .=",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `transantiago_rutas_multi` (idTipo, idEstado, idDias, idRecorrido, idRuta, Nombre, Fecha, HoraInicio, HoraTermino, idCatimg, idListimg) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//limpio los datos de la cadena de comprobacion
				$HoraInicio = str_replace(' ', '', $HoraInicio);
				$HoraTermino = str_replace(' ', '', $HoraTermino);
				
				//Filtros
				$a = "idRutaAlt='".$idRutaAlt."'" ;
				if(isset($idTipo) && $idTipo != ''){               $a .= ",idTipo='".$idTipo."'" ;}
				if(isset($idEstado) && $idEstado != ''){           $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($idDias) && $idDias != ''){               $a .= ",idDias='".$idDias."'" ;}
				if(isset($idRecorrido) && $idRecorrido != ''){     $a .= ",idRecorrido='".$idRecorrido."'" ;}
				if(isset($idRuta) && $idRuta != ''){               $a .= ",idRuta='".$idRuta."'" ;}
				if(isset($Nombre) && $Nombre != ''){               $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Fecha) && $Fecha != ''){                 $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($HoraInicio) && $HoraInicio != ''){       $a .= ",HoraInicio='".$HoraInicio."'" ;}
				if(isset($HoraTermino) && $HoraTermino != ''){     $a .= ",HoraTermino='".$HoraTermino."'" ;}
				if(isset($idCatimg) && $idCatimg != ''){           $a .= ",idCatimg='".$idCatimg."'" ;}
				if(isset($idListimg) && $idListimg != ''){         $a .= ",idListimg='".$idListimg."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `transantiago_rutas_multi` SET ".$a." WHERE idRutaAlt = '$idRutaAlt'";
				$result = mysql_query($query, $dbConn);

				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `transantiago_rutas_multi` WHERE idRutaAlt = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			//se borran los permisos del usuario
			$query  = "DELETE FROM `transantiago_rutas_multi_listado` WHERE idRutaAlt = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/		
		case 'update_off':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//limpio los datos de la cadena de comprobacion
				$HoraInicio = str_replace(' ', '', $HoraInicio);
				$HoraTermino = str_replace(' ', '', $HoraTermino);
				
				//Filtros
				$a = "idRutaAlt='".$idRutaAlt."'" ;
				if(isset($idTipo) && $idTipo != ''){               $a .= ",idTipo='".$idTipo."'" ;}
				if(isset($idEstado) && $idEstado != ''){           $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($idDias) && $idDias != ''){               $a .= ",idDias='".$idDias."'" ;}
				if(isset($idRecorrido) && $idRecorrido != ''){     $a .= ",idRecorrido='".$idRecorrido."'" ;}
				if(isset($idRuta) && $idRuta != ''){               $a .= ",idRuta='".$idRuta."'" ;}
				if(isset($Nombre) && $Nombre != ''){               $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Fecha) && $Fecha != ''){                 $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($HoraInicio) && $HoraInicio != ''){       $a .= ",HoraInicio='".$HoraInicio."'" ;}
				if(isset($HoraTermino) && $HoraTermino != ''){     $a .= ",HoraTermino='".$HoraTermino."'" ;}
				if(isset($idCatimg) && $idCatimg != ''){           $a .= ",idCatimg='".$idCatimg."'" ;}
				if(isset($idListimg) && $idListimg != ''){         $a .= ",idListimg='".$idListimg."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `transantiago_rutas_multi` SET ".$a." WHERE idRutaAlt = '$idRutaAlt'";
				$result = mysql_query($query, $dbConn);

			}
		
	
		break;	
/*******************************************************************************************************************/		
		case 'insert_to_edit':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//limpio los datos de la cadena de comprobacion
				$HoraInicio = str_replace(' ', '', $HoraInicio);
				$HoraTermino = str_replace(' ', '', $HoraTermino);
	
				//filtros
				if(isset($idTipo) && $idTipo != ''){              $a = "'".$idTipo."'" ;          }else{$a ="''";}
				if(isset($idEstado) && $idEstado != ''){          $a .= ",'".$idEstado."'" ;      }else{$a .=",''";}
				if(isset($idDias) && $idDias != ''){              $a .= ",'".$idDias."'" ;        }else{$a .=",''";}
				if(isset($idRecorrido) && $idRecorrido != ''){    $a .= ",'".$idRecorrido."'" ;   }else{$a .=",''";}
				if(isset($idRuta) && $idRuta != ''){              $a .= ",'".$idRuta."'" ;        }else{$a .=",''";}
				if(isset($Nombre) && $Nombre != ''){              $a .= ",'".$Nombre."'" ;        }else{$a .=",''";}
				if(isset($Fecha) && $Fecha != ''){                $a .= ",'".$Fecha."'" ;         }else{$a .=",''";}
				if(isset($HoraInicio) && $HoraInicio != ''){      $a .= ",'".$HoraInicio."'" ;    }else{$a .=",''";}
				if(isset($HoraTermino) && $HoraTermino != ''){    $a .= ",'".$HoraTermino."'" ;   }else{$a .=",''";}
				if(isset($idCatimg) && $idCatimg != ''){          $a .= ",'".$idCatimg."'" ;      }else{$a .=",''";}
				if(isset($idListimg) && $idListimg != ''){        $a .= ",'".$idListimg."'" ;     }else{$a .=",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `transantiago_rutas_multi` (idTipo, idEstado, idDias, idRecorrido, idRuta, Nombre, Fecha, HoraInicio, HoraTermino, idCatimg, idListimg) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				//recibo el último id generado por mi sesion
				$ultimo_id = mysql_insert_id($dbConn);
					
				header( 'Location: '.$location.'&id='.$ultimo_id );
				die;
				
			}
	
		break;		
							
/*******************************************************************************************************************/
	}
?>