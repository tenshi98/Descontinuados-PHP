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
	if ( !empty($_POST['idElementos']) )    $idElementos    = $_POST['idElementos'];
	if ( !empty($_POST['Nombre']) )         $Nombre         = $_POST['Nombre'];
	if ( !empty($_POST['Tipo_elemento']) )  $Tipo_elemento  = $_POST['Tipo_elemento'];
	if ( !empty($_POST['Orden']) )          $Orden          = $_POST['Orden'];
	if ( !empty($_POST['idArea']) )         $idArea         = $_POST['idArea'];
	if ( !empty($_POST['idPagelist']) )     $idPagelist     = $_POST['idPagelist'];
	if ( !empty($_POST['body_col']) )       $body_col       = $_POST['body_col'];
	if ( !empty($_POST['body_fil']) )       $body_fil 	    = $_POST['body_fil'];
	if ( !empty($_POST['grid_color']) )     $grid_color     = $_POST['grid_color'];
	if ( !empty($_POST['grid_border']) )    $grid_border    = $_POST['grid_border'];
	if ( !empty($_POST['grid_shadow']) )    $grid_shadow    = $_POST['grid_shadow'];
	if ( !empty($_POST['grid_img']) )       $grid_img 	    = $_POST['grid_img'];
	if ( !empty($_POST['url_img']) )        $url_img 	    = $_POST['url_img'];
	if ( !empty($_POST['idTipoBoton']) )    $idTipoBoton    = $_POST['idTipoBoton'];
	if ( !empty($_POST['Archivo']) )        $Archivo 	    = $_POST['Archivo'];
	if ( !empty($_POST['idTipoAlerta']) )   $idTipoAlerta   = $_POST['idTipoAlerta'];
	if ( !empty($_POST['cercanos']) )       $cercanos       = $_POST['cercanos'];
	if ( !empty($_POST['contactar']) )      $contactar      = $_POST['contactar'];
	if ( !empty($_POST['desplegar']) )      $desplegar      = $_POST['desplegar'];
	if ( !empty($_POST['login']) )          $login          = $_POST['login'];
	if ( !empty($_POST['idGrupo']) )        $idGrupo        = $_POST['idGrupo'];
	if ( !empty($_POST['idCat']) )          $idCat          = $_POST['idCat'];
	if ( !empty($_POST['idListado']) )      $idListado      = $_POST['idListado'];
	if ( !empty($_POST['level_view']) )     $level_view     = $_POST['level_view'];
	if ( !empty($_POST['pantalla']) )       $pantalla       = $_POST['pantalla'];
	if ( !empty($_POST['tipofuncion']) )    $tipofuncion    = $_POST['tipofuncion'];
	if ( !empty($_POST['Fono']) )           $Fono           = $_POST['Fono'];
	
	
	
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
			case 'idElementos':   if(empty($idElementos)){     $error['idElementos']    = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':        if(empty($Nombre)){          $error['Nombre']         = 'error/No ha ingresado el Nombre del sistema';}break;
			case 'Tipo_elemento': if(empty($Tipo_elemento)){   $error['Tipo_elemento']  = 'error/No ha ingresado la imagen';}break;
			case 'Orden':         if(empty($Orden)){           $error['Orden']          = 'error/No ha ingresado el email';}break;
			case 'idArea':        if(empty($idArea)){          $error['idArea']         = 'error/No ha ingresado la razon social';}break;
			case 'idPagelist':    if(empty($idPagelist)){      $error['idPagelist']     = 'error/No ha ingresado el idPagelist';}break;
			case 'body_col':      if(empty($body_col)){        $error['body_col']       = 'error/No ha ingresado la body_col';}break;
			case 'body_fil':      if(empty($body_fil)){        $error['body_fil']       = 'error/No ha ingresado el body_fil';}break;
			case 'grid_color':    if(empty($grid_color)){      $error['grid_color']     = 'error/No ha ingresado el grid_color';}break;
			case 'grid_border':   if(empty($grid_border)){     $error['grid_border']    = 'error/No ha ingresado la grid_border';}break;
			case 'grid_shadow':   if(empty($grid_shadow)){     $error['grid_shadow']    = 'error/No ha ingresado el grid_shadow';}break;	
			case 'grid_img':      if(empty($grid_img)){        $error['grid_img']       = 'error/No ha ingresado la carpeta de imagenes';}break;
			case 'url_img':       if(empty($url_img)){         $error['url_img']        = 'error/No ha ingresado la carpeta de mp3';}break;
			case 'idTipoBoton':   if(empty($idTipoBoton)){     $error['idTipoBoton']    = 'error/No ha ingresado la carpeta de videos';}break;
			case 'Archivo':       if(empty($Archivo)){         $error['Archivo']        = 'error/No ha ingresado la web de videos';}break;
			case 'idTipoAlerta':  if(empty($idTipoAlerta)){    $error['idTipoAlerta']   = 'error/No ha ingresado la web de videos';}break;
			case 'cercanos':      if(empty($cercanos)){        $error['cercanos']       = 'error/No ha ingresado la web de videos';}break;
			case 'contactar':     if(empty($contactar)){       $error['contactar']      = 'error/No ha ingresado la web de talento';}break;
			case 'desplegar':     if(empty($desplegar)){       $error['desplegar']      = 'error/No ha ingresado la web de talento';}break;
			case 'login':         if(empty($login)){           $error['login']          = 'error/No ha ingresado la web de talento';}break;
			case 'idGrupo':       if(empty($idGrupo)){         $error['idGrupo']        = 'error/No ha ingresado la web de talento';}break;
			case 'idCat':         if(empty($idCat)){           $error['idCat']          = 'error/No ha ingresado la web de talento';}break;
			case 'idListado':     if(empty($idListado)){       $error['idListado']      = 'error/No ha ingresado la web de talento';}break;
			case 'level_view':    if(empty($level_view)){      $error['level_view']     = 'error/No ha ingresado la web de talento';}break;
			case 'pantalla':      if(empty($pantalla)){        $error['pantalla']       = 'error/No ha ingresado la web de talento';}break;
			case 'tipofuncion':   if(empty($tipofuncion)){     $error['tipofuncion']    = 'error/No ha ingresado la web de talento';}break;
			case 'Fono':          if(empty($Fono)){            $error['Fono']           = 'error/No ha ingresado la web de talento';}break;

			
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
			
			//Se verifica si el usuario existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM app_areas_elementos WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El sistema ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){                $a = "'".$Nombre."'" ;            }else{$a ="''";}
				if(isset($Tipo_elemento) && $Tipo_elemento != ''){  $a .= ",'".$Tipo_elemento."'" ;   }else{$a .= ",''";}
				if(isset($Orden) && $Orden != ''){                  $a .= ",'".$Orden."'" ;           }else{$a .= ",''";}
				if(isset($idArea) && $idArea != ''){                $a .= ",'".$idArea."'" ;          }else{$a .= ",''";}
				if(isset($idPagelist) && $idPagelist != ''){        $a .= ",'".$idPagelist."'" ;      }else{$a .= ",''";}
				if(isset($body_col) && $body_col != ''){            $a .= ",'".$body_col."'" ;        }else{$a .= ",''";}
				if(isset($body_fil) && $body_fil != ''){            $a .= ",'".$body_fil."'" ;        }else{$a .= ",''";}
				if(isset($grid_color) && $grid_color != ''){        $a .= ",'".$grid_color."'" ;      }else{$a .= ",''";}
				if(isset($grid_border) && $grid_border != ''){      $a .= ",'".$grid_border."'" ;     }else{$a .= ",''";}
				if(isset($grid_shadow) && $grid_shadow != ''){      $a .= ",'".$grid_shadow."'" ;     }else{$a .= ",''";}
				if(isset($grid_img) && $grid_img != ''){            $a .= ",'".$grid_img."'" ;        }else{$a .= ",''";}
				if(isset($url_img) && $url_img != ''){              $a .= ",'".$url_img."'" ;         }else{$a .= ",''";}
				if(isset($idTipoBoton) && $idTipoBoton != ''){      $a .= ",'".$idTipoBoton."'" ;     }else{$a .= ",''";}
				if(isset($Archivo) && $Archivo != ''){              $a .= ",'".$Archivo."'" ;         }else{$a .= ",''";}
				if(isset($idTipoAlerta) && $idTipoAlerta != ''){    $a .= ",'".$idTipoAlerta."'" ;    }else{$a .= ",''";}
				if(isset($cercanos) && $cercanos != ''){            $a .= ",'".$cercanos."'" ;        }else{$a .= ",''";}
				if(isset($contactar) && $contactar != ''){          $a .= ",'".$contactar."'" ;       }else{$a .= ",''";}
				if(isset($desplegar) && $desplegar != ''){          $a .= ",'".$desplegar."'" ;       }else{$a .= ",''";}
				if(isset($login) && $login != ''){                  $a .= ",'".$login."'" ;           }else{$a .= ",''";}
				if(isset($idGrupo) && $idGrupo != ''){              $a .= ",'".$idGrupo."'" ;         }else{$a .= ",''";}
				if(isset($idCat) && $idCat != ''){                  $a .= ",'".$idCat."'" ;           }else{$a .= ",''";}
				if(isset($idListado) && $idListado != ''){          $a .= ",'".$idListado."'" ;       }else{$a .= ",''";}
				if(isset($level_view) && $level_view != ''){        $a .= ",'".$level_view."'" ;      }else{$a .= ",''";}
				if(isset($pantalla) && $pantalla != ''){            $a .= ",'".$pantalla."'" ;        }else{$a .= ",''";}
				if(isset($tipofuncion) && $tipofuncion != ''){      $a .= ",'".$tipofuncion."'" ;     }else{$a .= ",''";}
				if(isset($Fono) && $Fono != ''){                    $a .= ",'".$Fono."'" ;            }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `app_areas_elementos` (Nombre, Tipo_elemento, Orden, idArea, idPagelist, body_col, body_fil, grid_color, 
				grid_border, grid_shadow, grid_img, url_img, idTipoBoton, Archivo, idTipoAlerta, cercanos, contactar, desplegar , login, 
				idGrupo, idCat, idListado, level_view, pantalla, tipofuncion, Fono) VALUES ({$a} )";
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
				$a = "idElementos='".$idElementos."'" ;
				if(isset($Nombre) && $Nombre != ''){               $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Tipo_elemento) && $Tipo_elemento != ''){ $a .= ",Tipo_elemento='".$Tipo_elemento."'" ;}
				if(isset($Orden) && $Orden != ''){                 $a .= ",Orden='".$Orden."'" ;}
				if(isset($idArea) && $idArea != ''){               $a .= ",idArea='".$idArea."'" ;}
				if(isset($idPagelist) && $idPagelist != ''){       $a .= ",idPagelist='".$idPagelist."'" ;}
				if(isset($body_col) && $body_col != ''){           $a .= ",body_col='".$body_col."'" ;}
				if(isset($body_fil) && $body_fil != ''){           $a .= ",body_fil='".$body_fil."'" ;}
				if(isset($grid_color) && $grid_color != ''){       $a .= ",grid_color='".$grid_color."'" ;}
				if(isset($grid_border) && $grid_border != ''){     $a .= ",grid_border='".$grid_border."'" ;}
				if(isset($grid_shadow) && $grid_shadow != ''){     $a .= ",grid_shadow='".$grid_shadow."'" ;}
				if(isset($grid_img) && $grid_img != ''){           $a .= ",grid_img='".$grid_img."'" ;}
				if(isset($url_img) && $url_img != ''){             $a .= ",url_img='".$url_img."'" ;}
				if(isset($idTipoBoton) && $idTipoBoton != ''){     $a .= ",idTipoBoton='".$idTipoBoton."'" ;}
				if(isset($Archivo) && $Archivo != ''){             $a .= ",Archivo='".$Archivo."'" ;}
				if(isset($idTipoAlerta) && $idTipoAlerta != ''){   $a .= ",idTipoAlerta='".$idTipoAlerta."'" ;}
				if(isset($cercanos) && $cercanos != ''){           $a .= ",cercanos='".$cercanos."'" ;}
				if(isset($contactar) && $contactar != ''){         $a .= ",contactar='".$contactar."'" ;}	
				if(isset($desplegar) && $desplegar != ''){         $a .= ",desplegar='".$desplegar."'" ;}
				if(isset($login) && $login != ''){                 $a .= ",login='".$login."'" ;}
				if(isset($idGrupo) && $idGrupo != ''){             $a .= ",idGrupo='".$idGrupo."'" ;}
				if(isset($idCat) && $idCat != ''){                 $a .= ",idCat='".$idCat."'" ;}
				if(isset($idListado) && $idListado != ''){         $a .= ",idListado='".$idListado."'" ;}
				if(isset($level_view) && $level_view != ''){       $a .= ",level_view='".$level_view."'" ;}
				if(isset($pantalla) && $pantalla != ''){           $a .= ",pantalla='".$pantalla."'" ;}
				if(isset($tipofuncion) && $tipofuncion != ''){     $a .= ",tipofuncion='".$tipofuncion."'" ;}
				if(isset($Fono) && $Fono != ''){                   $a .= ",Fono='".$Fono."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `app_areas_elementos` SET ".$a." WHERE idElementos = '$idElementos'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
/					
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `app_areas_elementos` WHERE idElementos = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>