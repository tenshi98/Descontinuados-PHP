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
	if ( !empty($_GET['id']) )    $id     = $_GET['id'];
	if ( !empty($_GET['all']) )   $all    = $_GET['all'];
	
	if ( !empty($_POST['idNotificaciones']) )   $idNotificaciones      = $_POST['idNotificaciones'];
	if ( !empty($_POST['idSistema']) )          $idSistema             = $_POST['idSistema'];
	if ( !empty($_POST['idUsuario']) )          $idUsuario             = $_POST['idUsuario'];
	if ( !empty($_POST['Titulo']) )             $Titulo                = $_POST['Titulo'];
	if ( !empty($_POST['Notificacion']) )       $Notificacion          = $_POST['Notificacion'];
	if ( !empty($_POST['Fecha']) )              $Fecha                 = $_POST['Fecha'];
	if ( !empty($_POST['idUsrReceptor']) )      $idUsrReceptor         = $_POST['idUsrReceptor'];
	if ( !empty($_POST['tipo']) )               $tipo                  = $_POST['tipo'];
	if ( !empty($_POST['Nombre']) )             $Nombre                = $_POST['Nombre'];
	if ( !empty($_POST['rango_a']) )            $rango_a               = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) )            $rango_b               = $_POST['rango_b'];
	if ( !empty($_POST['Ciudad']) )             $Ciudad                = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )             $Comuna                = $_POST['Comuna'];
	if ( !empty($_POST['Direccion']) )          $Direccion             = $_POST['Direccion'];

	
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
			case 'idNotificaciones': if(empty($idNotificaciones)){  $error['idNotificaciones']  = 'error/No ha ingresado el id';}break;
			case 'idSistema':        if(empty($idSistema)){         $error['idSistema']         = 'error/No ha ingresado el sistema';}break;
			case 'idUsuario':        if(empty($idUsuario)){         $error['idUsuario']         = 'error/No ha ingresado el usuario creador';}break;
			case 'Titulo':           if(empty($Titulo)){            $error['Titulo']            = 'error/No ha ingresado el titulo';}break;
			case 'Notificacion':     if(empty($Notificacion)){      $error['Notificacion']      = 'error/No ha ingresado la notificacion';}break;
			case 'Fecha':            if(empty($Fecha)){             $error['Fecha']             = 'error/No ha ingresado la fecha';}break;
			case 'idUsrReceptor':    if(empty($idUsrReceptor)){     $error['idUsrReceptor']     = 'error/No ha ingresado el usuario receptor';}break;
			case 'tipo':             if(empty($tipo)){              $error['tipo']              = 'error/No ha seleccionado el tipo de usuario';}break;
			case 'Nombre':           if(empty($Nombre)){            $error['Nombre']            = 'error/No ha ingresado el nombre';}break;
			case 'rango_a':          if(empty($rango_a)){           $error['rango_a']           = 'error/No ha ingresado la fecha de nacimiento inicio';}break;
			case 'rango_b':          if(empty($rango_b)){           $error['rango_b']           = 'error/No ha ingresado la fecha de nacimiento termino';}break;
			case 'Ciudad':           if(empty($Ciudad)){            $error['Ciudad']            = 'error/No ha ingresado la ciudad';}break;
			case 'Comuna':           if(empty($Comuna)){            $error['Comuna']            = 'error/No ha ingresado la comuna';}break;
			case 'Direccion':        if(empty($Direccion)){         $error['Direccion']         = 'error/No ha ingresado la direccion';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'aprobar_uno':

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				$query  = "UPDATE `notificaciones_ver` SET idEstado=2, FechaVisto='".fecha_actual()."' WHERE idNoti = '$id'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&aprobar_uno=true' );
				die;

			}

		break;
/*******************************************************************************************************************/		
		case 'aprobar_todos':

			$query  = "UPDATE `notificaciones_ver` SET idEstado=2, FechaVisto='".fecha_actual()."' WHERE idUsuario = '$all' AND idEstado=1";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&aprobar_todos=true' );
				die;

		break;
/*******************************************************************************************************************/		
		case 'enviar_masivo':
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){         $a  = "'".$idSistema."'" ;          }else{$a  ="''";}
				if(isset($idUsuario) && $idUsuario != ''){         $a .= ",'".$idUsuario."'" ;         }else{$a .=",''";}
				if(isset($Titulo) && $Titulo != ''){               $a .= ",'".$Titulo."'" ;            }else{$a .=",''";}
				if(isset($Notificacion) && $Notificacion != ''){   $a .= ",'".$Notificacion."'" ;      }else{$a .=",''";}
				if(isset($Fecha) && $Fecha != ''){                 $a .= ",'".$Fecha."'" ;             }else{$a .=",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `notificaciones_listado` (idSistema,idUsuario,Titulo,Notificacion,Fecha) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				//recibo el último id generado por mi sesion
				$ultimo_id = mysql_insert_id($dbConn);
				
				//variables para armar el mensaje
				$Notificacion  = '<a href="view_notificacion.php?view='.$ultimo_id.'" title="Ver Informacion" class="icon-ver info-tooltip"></a>';
				$Notificacion .= $Titulo;
				$Estado = '1';
				
				//busco a todos los usuarios del sistema
				$arrPermiso = array();
				$query = "SELECT idUsuario
				FROM usuarios_listado 
				WHERE idSistema = '{$idSistema}'";
				$resultado = mysql_query ($query, $dbConn);
				while ( $row = mysql_fetch_assoc ($resultado)) {
				array_push( $arrPermiso,$row );
				}

				//Inserto el mensaje de entrega de materiales
				foreach($arrPermiso as $permiso) {
					if(isset($idSistema) && $idSistema != ''){                         $a  = "'".$idSistema."'" ;               }else{$a  ="''";}
					if(isset($permiso['idUsuario']) && $permiso['idUsuario'] != ''){   $a .= ",'".$permiso['idUsuario']."'" ;   }else{$a .=",''";}
					if(isset($Notificacion) && $Notificacion != ''){                   $a .= ",'".$Notificacion."'" ;           }else{$a .=",''";}
					if(isset($Fecha) && $Fecha != ''){                                 $a .= ",'".$Fecha."'" ;                  }else{$a .=",''";}
					if(isset($Estado) && $Estado != ''){                               $a .= ",'".$Estado."'" ;                 }else{$a .=",''";}
					if(isset($ultimo_id) && $ultimo_id != ''){                         $a .= ",'".$ultimo_id."'" ;              }else{$a .=",''";}
					
					// inserto los datos de registro en la db
					$query  = "INSERT INTO `notificaciones_ver` (idSistema,idUsuario,Notificacion, Fecha, idEstado, idNotificaciones) VALUES ({$a} )";
					$result = mysql_query($query, $dbConn);
				}
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'enviar_usuario':
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){         $a  = "'".$idSistema."'" ;          }else{$a  ="''";}
				if(isset($idUsuario) && $idUsuario != ''){         $a .= ",'".$idUsuario."'" ;         }else{$a .=",''";}
				if(isset($Titulo) && $Titulo != ''){               $a .= ",'".$Titulo."'" ;            }else{$a .=",''";}
				if(isset($Notificacion) && $Notificacion != ''){   $a .= ",'".$Notificacion."'" ;      }else{$a .=",''";}
				if(isset($Fecha) && $Fecha != ''){                 $a .= ",'".$Fecha."'" ;             }else{$a .=",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `notificaciones_listado` (idSistema,idUsuario,Titulo,Notificacion,Fecha) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				//recibo el último id generado por mi sesion
				$ultimo_id = mysql_insert_id($dbConn);
				
				//variables para armar el mensaje
				$Notificacion  = '<a href="view_notificacion.php?view='.$ultimo_id.'" title="Ver Informacion" class="icon-ver info-tooltip"></a>';
				$Notificacion .= $Titulo;
				$Estado = '1';
				
				if(isset($idSistema) && $idSistema != ''){            $a  = "'".$idSistema."'" ;          }else{$a  ="''";}
				if(isset($idUsrReceptor) && $idUsrReceptor != ''){    $a .= ",'".$idUsrReceptor."'" ;     }else{$a .=",''";}
				if(isset($Notificacion) && $Notificacion != ''){      $a .= ",'".$Notificacion."'" ;      }else{$a .=",''";}
				if(isset($Fecha) && $Fecha != ''){                    $a .= ",'".$Fecha."'" ;             }else{$a .=",''";}
				if(isset($Estado) && $Estado != ''){                  $a .= ",'".$Estado."'" ;            }else{$a .=",''";}
				if(isset($ultimo_id) && $ultimo_id != ''){            $a .= ",'".$ultimo_id."'" ;         }else{$a .=",''";}
					
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `notificaciones_ver` (idSistema,idUsuario,Notificacion, Fecha, idEstado, idNotificaciones) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				
				
				
				
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/
		case 'enviar_filtro':	

			$z = '&filtro=true';
			if(isset($tipo)&&$tipo!='') {               $z .= '&tipo='.$tipo;}  
			if(isset($Nombre)&&$Nombre!='') {           $z .= '&Nombre='.$Nombre;} 
			if(isset($rango_a)&&$rango_a!='') {         $z .= '&rango_a='.$rango_a;}  
            if(isset($rango_b)&&$rango_b!='') {         $z .= '&rango_b='.$rango_b;}  
			if(isset($Ciudad)&&$Ciudad!='') {           $z .= '&Ciudad='.$Ciudad; }  
			if(isset($Comuna)&&$Comuna!='') {           $z .= '&Comuna='.$Comuna; } 
			if(isset($Direccion)&&$Direccion!='') {     $z .= '&Direccion='.$Direccion;} 
			if(isset($idSistema)&&$idSistema!='') {     $z .= '&idSistema='.$idSistema;}  
						
			header( 'Location: '.$location.$z );
			die;

		break;	
/*******************************************************************************************************************/		
		case 'enviar_filtrados':	
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){         $a  = "'".$idSistema."'" ;          }else{$a  ="''";}
				if(isset($idUsuario) && $idUsuario != ''){         $a .= ",'".$idUsuario."'" ;         }else{$a .=",''";}
				if(isset($Titulo) && $Titulo != ''){               $a .= ",'".$Titulo."'" ;            }else{$a .=",''";}
				if(isset($Notificacion) && $Notificacion != ''){   $a .= ",'".$Notificacion."'" ;      }else{$a .=",''";}
				if(isset($Fecha) && $Fecha != ''){                 $a .= ",'".$Fecha."'" ;             }else{$a .=",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `notificaciones_listado` (idSistema,idUsuario,Titulo,Notificacion,Fecha) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				//recibo el último id generado por mi sesion
				$ultimo_id = mysql_insert_id($dbConn);
				
				//variables para armar el mensaje
				$Notificacion  = '<a href="view_notificacion.php?view='.$ultimo_id.'" title="Ver Informacion" class="icon-ver info-tooltip"></a>';
				$Notificacion .= $Titulo;
				$Estado = '1';
				
				//busco a todos los usuarios del sistema
				$z = 'WHERE idUsuario >0';
				if(isset($_GET['tipo']) && $_GET['tipo'] != ''){                 $z .= " AND tipo = '{$_GET['search']}'";}
				if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  {           $z .= " AND Nombre LIKE '%{$_GET['Nombre']}%' " ;}
				if(isset($_GET['Ciudad']) && $_GET['Ciudad'] != '')  {           $z .= " AND Ciudad LIKE '%{$_GET['Ciudad']}%'" ;}
				if(isset($_GET['Comuna']) && $_GET['Comuna'] != '')  {           $z .= " AND Comuna LIKE '%{$_GET['Comuna']}%'" ;}
				if(isset($_GET['Direccion']) && $_GET['Direccion'] != '')  {     $z .= " AND Direccion LIKE '%{$_GET['Direccion']}%'" ;}
				if(isset($_GET['idSistema']) && $_GET['idSistema'] != '')  {     $z .= " AND idSistema = '".$_GET['idSistema']."'" ;}
				if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
					$z .= " AND fNacimiento BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;
				}
				$arrPermiso = array();
				$query = "SELECT idUsuario
				FROM usuarios_listado 
				".$z;
				$resultado = mysql_query ($query, $dbConn);
				while ( $row = mysql_fetch_assoc ($resultado)) {
				array_push( $arrPermiso,$row );
				}

				//Inserto el mensaje de entrega de materiales
				foreach($arrPermiso as $permiso) {
					if(isset($idSistema) && $idSistema != ''){                         $a  = "'".$idSistema."'" ;               }else{$a  ="''";}
					if(isset($permiso['idUsuario']) && $permiso['idUsuario'] != ''){   $a .= ",'".$permiso['idUsuario']."'" ;   }else{$a .=",''";}
					if(isset($Notificacion) && $Notificacion != ''){                   $a .= ",'".$Notificacion."'" ;           }else{$a .=",''";}
					if(isset($Fecha) && $Fecha != ''){                                 $a .= ",'".$Fecha."'" ;                  }else{$a .=",''";}
					if(isset($Estado) && $Estado != ''){                               $a .= ",'".$Estado."'" ;                 }else{$a .=",''";}
					if(isset($ultimo_id) && $ultimo_id != ''){                         $a .= ",'".$ultimo_id."'" ;              }else{$a .=",''";}
					
					// inserto los datos de registro en la db
					$query  = "INSERT INTO `notificaciones_ver` (idSistema,idUsuario,Notificacion, Fecha, idEstado, idNotificaciones) VALUES ({$a} )";
					$result = mysql_query($query, $dbConn);
				}
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `notificaciones_listado` WHERE idNotificaciones = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/
	}
?>
