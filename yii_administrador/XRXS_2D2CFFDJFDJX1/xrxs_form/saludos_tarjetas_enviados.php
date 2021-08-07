<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o tarjeta.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idTarjetas']) )      $idTarjetas    = $_POST['idTarjetas'];
	if ( !empty($_POST['id_usuario']) )      $id_usuario    = $_POST['id_usuario'];
	if ( !empty($_POST['fecha_video']) )     $fecha_video   = $_POST['fecha_video'];
	if ( !empty($_POST['codigo']) )          $codigo        = $_POST['codigo'];
	if ( !empty($_POST['tarjeta']) )         $tarjeta       = $_POST['tarjeta'];
	if ( !empty($_POST['idMusica']) )        $idMusica      = $_POST['idMusica'];
	if ( !empty($_POST['VideoSaludo']) )     $VideoSaludo   = $_POST['VideoSaludo'];
	if ( !empty($_POST['correo1']) )         $correo1       = $_POST['correo1'];
	if ( !empty($_POST['correo2']) )         $correo2       = $_POST['correo2'];
	if ( !empty($_POST['correo3']) )         $correo3       = $_POST['correo3'];
	if ( !empty($_POST['correo4']) )         $correo4       = $_POST['correo4'];
	if ( !empty($_POST['correo5']) )         $correo5       = $_POST['correo5'];
	if ( !empty($_POST['asunto']) )          $asunto        = $_POST['asunto'];
	if ( !empty($_POST['mensaje']) )         $mensaje       = $_POST['mensaje'];
	
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
			case 'idTarjetas':    if(empty($idTarjetas)){  $error['idTarjetas']   = 'error/No ha ingresado la id de la tarjeta';}break;
			case 'id_usuario':    if(empty($id_usuario)){  $error['id_usuario']   = 'error/No ha ingresado la id del usuario';}break;
			case 'fecha_video':   if(empty($fecha_video)){ $error['fecha_video']  = 'error/No ha ingresado la fecha del video';}break;
			case 'codigo':        if(empty($codigo)){      $error['codigo']       = 'error/No ha ingresado el codigo';}break;
			case 'tarjeta':       if(empty($tarjeta)){     $error['tarjeta']      = 'error/No ha ingresado la tarjeta';}break;
			case 'idMusica':      if(empty($idMusica)){    $error['idMusica']     = 'error/No ha seleccionado una idMusica';}break;
			case 'VideoSaludo':   if(empty($VideoSaludo)){ $error['VideoSaludo']  = 'error/No ha subido un video';}break;
			case 'correo1':       if(empty($correo1)){     $error['correo1']      = 'error/No ha ingresado el primer correo';}break;
			case 'correo2':       if(empty($correo2)){     $error['correo2']      = 'error/No ha ingresado el segundo correo';}break;
			case 'correo3':       if(empty($correo3)){     $error['correo3']      = 'error/No ha ingresado el tercer correo';}break;
			case 'correo4':       if(empty($correo4)){     $error['correo4']      = 'error/No ha ingresado el cuarto correo';}break;
			case 'correo5':       if(empty($correo5)){     $error['correo5']      = 'error/No ha ingresado el quinto correo';}break;
			case 'asunto':        if(empty($asunto)){      $error['asunto']       = 'error/No ha ingresado el asunto de la tarjeta';}break;
			case 'mensaje':       if(empty($mensaje)){     $error['mensaje']      = 'error/No ha ingresado el mensaje de la tarjeta';}break;
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
			

		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($id_usuario) && $id_usuario != ''){      $a = "'".$id_usuario."'" ;       }else{$a ="''";}
				if(isset($fecha_video) && $fecha_video != ''){    $a .= ",'".$fecha_video."'" ;    }else{$a .= ",''";}
				if(isset($codigo) && $codigo != ''){              $a .= ",'".$codigo."'" ;         }else{$a .= ",''";}
				if(isset($tarjeta) && $tarjeta != ''){            $a .= ",'".$tarjeta."'" ;        }else{$a .= ",''";}
				if(isset($idMusica) && $idMusica != ''){          $a .= ",'".$idMusica."'" ;       }else{$a .= ",''";}
				if(isset($VideoSaludo) && $VideoSaludo != ''){    $a .= ",'".$VideoSaludo."'" ;    }else{$a .= ",''";}
				if(isset($correo1) && $correo1 != ''){            $a .= ",'".$correo1."'" ;        }else{$a .= ",''";}
				if(isset($correo2) && $correo2 != ''){            $a .= ",'".$correo2."'" ;        }else{$a .= ",''";}
				if(isset($correo3) && $correo3 != ''){            $a .= ",'".$correo3."'" ;        }else{$a .= ",''";}
				if(isset($correo4) && $correo4 != ''){            $a .= ",'".$correo4."'" ;        }else{$a .= ",''";}
				if(isset($correo5) && $correo5 != ''){            $a .= ",'".$correo5."'" ;        }else{$a .= ",''";}
				if(isset($asunto) && $asunto != ''){              $a .= ",'".$asunto."'" ;         }else{$a .= ",''";}
				if(isset($mensaje) && $mensaje != ''){            $a .= ",'".$mensaje."'" ;        }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `saludos_videos_listado` (id_usuario, fecha_video, codigo, tarjeta, idMusica, VideoSaludo,correo1,correo2,correo3,correo4,correo5,asunto,mensaje) VALUES ({$a} )";
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
				$a = "idTarjetas='".$idTarjetas."'" ;
				if(isset($id_usuario) && $id_usuario != ''){    $a .= ",id_usuario='".$id_usuario."'" ;}
				if(isset($fecha_video) && $fecha_video != ''){  $a .= ",fecha_video='".$fecha_video."'" ;}
				if(isset($codigo) && $codigo != ''){            $a .= ",codigo='".$codigo."'" ;}
				if(isset($tarjeta) && $tarjeta != ''){          $a .= ",tarjeta='".$tarjeta."'" ;}
				if(isset($idMusica) && $idMusica != ''){        $a .= ",idMusica='".$idMusica."'" ;}
				if(isset($VideoSaludo) && $VideoSaludo != ''){  $a .= ",VideoSaludo='".$VideoSaludo."'" ;}
				if(isset($correo1) && $correo1 != ''){          $a .= ",correo1='".$correo1."'" ;}
				if(isset($correo2) && $correo2 != ''){          $a .= ",correo2='".$correo2."'" ;}
				if(isset($correo3) && $correo3 != ''){          $a .= ",correo3='".$correo3."'" ;}
				if(isset($correo4) && $correo4 != ''){          $a .= ",correo4='".$correo4."'" ;}
				if(isset($correo5) && $correo5 != ''){          $a .= ",correo5='".$correo5."'" ;}
				if(isset($asunto) && $asunto != ''){            $a .= ",asunto='".$asunto."'" ;}
				if(isset($mensaje) && $mensaje != ''){          $a .= ",mensaje='".$mensaje."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_videos_listado` SET ".$a." WHERE idTarjetas = '$idTarjetas'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT VideoSaludo
			FROM `saludos_tarjetas_enviados`
			WHERE idTarjetas = {$_GET['del']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);
			
			//Obtengo el nombre fisico del tarjeta
			$tarjeta = $rowdata['VideoSaludo'];
			
			if(unlink($arrUsuario['ex_upload'].$tarjeta)){	
					
				//se borra el dato
				$query  = "DELETE FROM `saludos_tarjetas_enviados` WHERE idTarjetas = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
				
				header( 'Location: '.$location.'&deleted=true' );
				die;
			
			}else{
			
				//se borra el dato
				$query  = "DELETE FROM `saludos_tarjetas_enviados` WHERE idTarjetas = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
				
				header( 'Location: '.$location.'&deleted=true' );
				die;
			
			}

		break;	
				
/*******************************************************************************************************************/
	}
?>