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
	if ( !empty($_POST['idProducto']) )     $idProducto       = $_POST['idProducto'];
	if ( !empty($_POST['idCategoria']) )    $idCategoria      = $_POST['idCategoria'];
	if ( !empty($_POST['idSubcategoria']) ) $idSubcategoria   = $_POST['idSubcategoria'];
	if ( !empty($_POST['idCliente']) )      $idCliente        = $_POST['idCliente'];
	if ( !empty($_POST['Titulo']) )         $Titulo           = $_POST['Titulo'];
	if ( !empty($_POST['DescCorta']) )      $DescCorta        = $_POST['DescCorta'];
	if ( !empty($_POST['DescLarga']) )      $DescLarga        = $_POST['DescLarga'];
	if ( !empty($_POST['Url_imagen']) )     $Url_imagen       = $_POST['Url_imagen'];
	if ( !empty($_POST['Url_video']) )      $Url_video        = $_POST['Url_video'];
	if ( !empty($_POST['idNivel']) )        $idNivel          = $_POST['idNivel'];
	if ( !empty($_POST['NClases']) )        $NClases          = $_POST['NClases'];
	if ( !empty($_POST['Duracion']) )       $Duracion         = $_POST['Duracion'];
	if ( !empty($_POST['idIdioma']) )       $idIdioma         = $_POST['idIdioma'];
	if ( !empty($_POST['Votos_5']) )        $Votos_5          = $_POST['Votos_5'];
	if ( !empty($_POST['Votos_4']) )        $Votos_4          = $_POST['Votos_4'];
	if ( !empty($_POST['Votos_3']) )        $Votos_3          = $_POST['Votos_3'];
	if ( !empty($_POST['Votos_2']) )        $Votos_2          = $_POST['Votos_2'];
	if ( !empty($_POST['Votos_1']) )        $Votos_1          = $_POST['Votos_1'];
	if ( !empty($_POST['ValorAntiguo']) )   $ValorAntiguo     = $_POST['ValorAntiguo'];
	if ( !empty($_POST['ValorActual']) )    $ValorActual      = $_POST['ValorActual'];
	if ( !empty($_POST['idEstado']) )       $idEstado         = $_POST['idEstado'];
	if ( !empty($_POST['Observaciones']) )  $Observaciones    = $_POST['Observaciones'];
	
	
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
			case 'idProducto':      if(empty($idProducto)){      $error['idProducto']     = 'error/No ha ingresado el id';}break;
			case 'idCategoria':     if(empty($idCategoria)){     $error['idCategoria']    = 'error/No ha seleccionado una categoria';}break;
			case 'idSubcategoria':  if(empty($idSubcategoria)){  $error['idSubcategoria'] = 'error/No ha seleccionado una subcategoria';}break;
			case 'idCliente':       if(empty($idCliente)){       $error['idCliente']      = 'error/No ha seleccionado un cliente';}break;
			case 'Titulo':          if(empty($Titulo)){          $error['Titulo']         = 'error/No ha ingresado el titulo';}break;
			case 'DescCorta':       if(empty($DescCorta)){       $error['DescCorta']      = 'error/No ha ingresado la descripcion corta';}break;
			case 'DescLarga':       if(empty($DescLarga)){       $error['DescLarga']      = 'error/No ha ingresado la descripcion larga';}break;
			case 'Url_imagen':      if(empty($Url_imagen)){      $error['Url_imagen']     = 'error/No ha ingresado la direccion de la imagen';}break;
			case 'Url_video':       if(empty($Url_video)){       $error['Url_video']      = 'error/No ha ingresado la direccion del video';}break;
			case 'idNivel':         if(empty($idNivel)){         $error['idNivel']        = 'error/No ha seleccionado un nivel';}break;
			case 'NClases':         if(empty($NClases)){         $error['NClases']        = 'error/No ha ingresado la cantidad de clases';}break;
			case 'Duracion':        if(empty($Duracion)){        $error['Duracion']       = 'error/No ha ingresado la duracion';}break;
			case 'idIdioma':        if(empty($idIdioma)){        $error['idIdioma']       = 'error/No ha seleccionado un idioma';}break;
			case 'Votos_5':         if(empty($Votos_5)){         $error['Votos_5']        = 'error/No ha ingresado los votos';}break;
			case 'Votos_4':         if(empty($Votos_4)){         $error['Votos_4']        = 'error/No ha ingresado los votos';}break;
			case 'Votos_3':         if(empty($Votos_3)){         $error['Votos_3']        = 'error/No ha ingresado los votos';}break;
			case 'Votos_2':         if(empty($Votos_2)){         $error['Votos_2']        = 'error/No ha ingresado los votos';}break;
			case 'Votos_1':         if(empty($Votos_1)){         $error['Votos_1']        = 'error/No ha ingresado los votos';}break;
			case 'ValorAntiguo':    if(empty($ValorAntiguo)){    $error['ValorAntiguo']   = 'error/No ha ingresado el valor antiguo';}break;
			case 'ValorActual':     if(empty($ValorActual)){     $error['ValorActual']    = 'error/No ha ingresado el valor actual';}break;
			case 'idEstado':        if(empty($idEstado)){        $error['idEstado']       = 'error/No ha seleccionado el estado';}break;
			case 'Observaciones':   if(empty($Observaciones)){   $error['Observaciones']  = 'error/No ha ingresado la observacion';}break;
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
				if(isset($idCategoria) && $idCategoria != ''){         $a = "'".$idCategoria."'" ;         }else{$a ="''";}
				if(isset($idSubcategoria) && $idSubcategoria != ''){   $a .= ",'".$idSubcategoria."'" ;    }else{$a .=",''";}
				if(isset($idCliente) && $idCliente != ''){             $a .= ",'".$idCliente."'" ;         }else{$a .=",''";}
				if(isset($Titulo) && $Titulo != ''){                   $a .= ",'".$Titulo."'" ;            }else{$a .=",''";}
				if(isset($DescCorta) && $DescCorta != ''){             $a .= ",'".$DescCorta."'" ;         }else{$a .=",''";}
				if(isset($DescLarga) && $DescLarga != ''){             $a .= ",'".$DescLarga."'" ;         }else{$a .=",''";}
				if(isset($Url_imagen) && $Url_imagen != ''){           $a .= ",'".$Url_imagen."'" ;        }else{$a .=",''";}
				if(isset($Url_video) && $Url_video != ''){             $a .= ",'".$Url_video."'" ;         }else{$a .=",''";}
				if(isset($idNivel) && $idNivel != ''){                 $a .= ",'".$idNivel."'" ;           }else{$a .=",''";}
				if(isset($NClases) && $NClases != ''){                 $a .= ",'".$NClases."'" ;           }else{$a .=",''";}
				if(isset($Duracion) && $Duracion != ''){               $a .= ",'".$Duracion."'" ;          }else{$a .=",''";}
				if(isset($idIdioma) && $idIdioma != ''){               $a .= ",'".$idIdioma."'" ;          }else{$a .=",''";}
				if(isset($Votos_5) && $Votos_5 != ''){                 $a .= ",'".$Votos_5."'" ;           }else{$a .=",''";}
				if(isset($Votos_4) && $Votos_4 != ''){                 $a .= ",'".$Votos_4."'" ;           }else{$a .=",''";}
				if(isset($Votos_3) && $Votos_3 != ''){                 $a .= ",'".$Votos_3."'" ;           }else{$a .=",''";}
				if(isset($Votos_2) && $Votos_2 != ''){                 $a .= ",'".$Votos_2."'" ;           }else{$a .=",''";}
				if(isset($Votos_1) && $Votos_1 != ''){                 $a .= ",'".$Votos_1."'" ;           }else{$a .=",''";}
				if(isset($ValorAntiguo) && $ValorAntiguo != ''){       $a .= ",'".$ValorAntiguo."'" ;      }else{$a .=",''";}
				if(isset($ValorActual) && $ValorActual != ''){         $a .= ",'".$ValorActual."'" ;       }else{$a .=",''";}
				if(isset($idEstado) && $idEstado != ''){               $a .= ",'".$idEstado."'" ;          }else{$a .=",''";}
				if(isset($Observaciones) && $Observaciones != ''){     $a .= ",'".$Observaciones."'" ;     }else{$a .=",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `productos_listado` (idCategoria, idSubcategoria, idCliente, Titulo, DescCorta, DescLarga,
				Url_imagen, Url_video, idNivel, NClases, Duracion, idIdioma, Votos_5, Votos_4, Votos_3, Votos_2, Votos_1, ValorAntiguo,
				ValorActual, idEstado, Observaciones) VALUES ({$a} )";
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
				$a = "idProducto='".$idProducto."'" ;
				if(isset($idCategoria) && $idCategoria != ''){        $a .= ",idCategoria='".$idCategoria."'" ;}
				if(isset($idSubcategoria) && $idSubcategoria != ''){  $a .= ",idSubcategoria='".$idSubcategoria."'" ;}
				if(isset($idCliente) && $idCliente != ''){            $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($Titulo) && $Titulo != ''){                  $a .= ",Titulo='".$Titulo."'" ;}
				if(isset($DescCorta) && $DescCorta != ''){            $a .= ",DescCorta='".$DescCorta."'" ;}
				if(isset($DescLarga) && $DescLarga != ''){            $a .= ",DescLarga='".$DescLarga."'" ;}
				if(isset($Url_imagen) && $Url_imagen != ''){          $a .= ",Url_imagen='".$Url_imagen."'" ;}
				if(isset($Url_video) && $Url_video != ''){            $a .= ",Url_video='".$Url_video."'" ;}
				if(isset($idNivel) && $idNivel != ''){                $a .= ",idNivel='".$idNivel."'" ;}
				if(isset($NClases) && $NClases != ''){                $a .= ",NClases='".$NClases."'" ;}
				if(isset($Duracion) && $Duracion != ''){              $a .= ",Duracion='".$Duracion."'" ;}
				if(isset($idIdioma) && $idIdioma != ''){              $a .= ",idIdioma='".$idIdioma."'" ;}
				if(isset($Votos_5) && $Votos_5 != ''){                $a .= ",Votos_5='".$Votos_5."'" ;}
				if(isset($Votos_4) && $Votos_4 != ''){                $a .= ",Votos_4='".$Votos_4."'" ;}
				if(isset($Votos_3) && $Votos_3 != ''){                $a .= ",Votos_3='".$Votos_3."'" ;}
				if(isset($Votos_2) && $Votos_2 != ''){                $a .= ",Votos_2='".$Votos_2."'" ;}
				if(isset($Votos_1) && $Votos_1 != ''){                $a .= ",Votos_1='".$Votos_1."'" ;}
				if(isset($ValorAntiguo) && $ValorAntiguo != ''){      $a .= ",ValorAntiguo='".$ValorAntiguo."'" ;}
				if(isset($ValorActual) && $ValorActual != ''){        $a .= ",ValorActual='".$ValorActual."'" ;}
				if(isset($idEstado) && $idEstado != ''){              $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($Observaciones) && $Observaciones != ''){    $a .= ",Observaciones='".$Observaciones."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `productos_listado` SET ".$a." WHERE idProducto = '$idProducto'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `productos_listado` WHERE idProducto = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	

						
			header( 'Location: '.$location.'&deleted=true' );
			die;
	
		break;	
/*******************************************************************************************************************/
		case 'curso':	
		
			//se borra al usuario
			$query  = "UPDATE `productos_listado` SET idEstado={$_GET['estado']} WHERE idProducto = '{$_GET['modcurso']}'";
			$result = mysql_query($query, $dbConn);	

						
			header( 'Location: '.$location.'&acepted=true' );
			die;
	
		break;			
/*******************************************************************************************************************/
	}
?>