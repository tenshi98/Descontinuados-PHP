<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o sal03.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idSaludo']) )      $idSaludo     = $_POST['idSaludo'];
	if ( !empty($_POST['id_usuario']) )    $id_usuario   = $_POST['id_usuario'];
	if ( !empty($_POST['sal01']) )         $sal01        = $_POST['sal01'];
	if ( !empty($_POST['sal02']) )         $sal02        = $_POST['sal02'];
	if ( !empty($_POST['sal03']) )         $sal03        = $_POST['sal03'];
	if ( !empty($_POST['sal04']) )         $sal04        = $_POST['sal04'];
	if ( !empty($_POST['correo1']) )       $correo1      = $_POST['correo1'];
	if ( !empty($_POST['correo2']) )       $correo2      = $_POST['correo2'];
	if ( !empty($_POST['correo3']) )       $correo3      = $_POST['correo3'];
	if ( !empty($_POST['correo4']) )       $correo4      = $_POST['correo4'];
	if ( !empty($_POST['correo5']) )       $correo5      = $_POST['correo5'];
	if ( !empty($_POST['asunto']) )        $asunto       = $_POST['asunto'];
	if ( !empty($_POST['mensaje']) )       $mensaje      = $_POST['mensaje'];
	
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
			case 'idSaludo':    if(empty($idSaludo)){    $error['idSaludo']    = 'error/No ha ingresado la id del saludo';}break;
			case 'id_usuario':  if(empty($id_usuario)){  $error['id_usuario']  = 'error/No ha ingresado la id del usuario';}break;
			case 'sal01':       if(empty($sal01)){       $error['sal01']       = 'error/No ha seleccionado el primer video';}break;
			case 'sal02':       if(empty($sal02)){       $error['sal02']       = 'error/No ha seleccionado el segundo video';}break;
			case 'sal03':       if(empty($sal03)){       $error['sal03']       = 'error/No ha seleccionado el tercer video';}break;
			case 'sal04':       if(empty($sal04)){       $error['sal04']       = 'error/No ha seleccionado el cuarto video';}break;
			case 'correo1':     if(empty($correo1)){     $error['correo1']     = 'error/No ha ingresado el primer correo';}break;
			case 'correo2':     if(empty($correo2)){     $error['correo2']     = 'error/No ha ingresado el segundo correo';}break;
			case 'correo3':     if(empty($correo3)){     $error['correo3']     = 'error/No ha ingresado el tercer correo';}break;
			case 'correo4':     if(empty($correo4)){     $error['correo4']     = 'error/No ha ingresado el cuarto correo';}break;
			case 'correo5':     if(empty($correo5)){     $error['correo5']     = 'error/No ha ingresado el quinto correo';}break;
			case 'asunto':      if(empty($asunto)){      $error['asunto']      = 'error/No ha ingresado el asunto del saludo';}break;
			case 'mensaje':     if(empty($mensaje)){     $error['mensaje']     = 'error/No ha ingresado el mensaje del saludo';}break;
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
				if(isset($id_usuario) && $id_usuario != ''){   $a = "'".$id_usuario."'" ;  }else{$a ="''";}
				if(isset($sal01) && $sal01 != ''){             $a .= ",'".$sal01."'" ;     }else{$a .= ",''";}
				if(isset($sal02) && $sal02 != ''){             $a .= ",'".$sal02."'" ;     }else{$a .= ",''";}
				if(isset($sal03) && $sal03 != ''){             $a .= ",'".$sal03."'" ;     }else{$a .= ",''";}
				if(isset($sal04) && $sal04 != ''){             $a .= ",'".$sal04."'" ;     }else{$a .= ",''";}
				if(isset($correo1) && $correo1 != ''){         $a .= ",'".$correo1."'" ;   }else{$a .= ",''";}
				if(isset($correo2) && $correo2 != ''){         $a .= ",'".$correo2."'" ;   }else{$a .= ",''";}
				if(isset($correo3) && $correo3 != ''){         $a .= ",'".$correo3."'" ;   }else{$a .= ",''";}
				if(isset($correo4) && $correo4 != ''){         $a .= ",'".$correo4."'" ;   }else{$a .= ",''";}
				if(isset($correo5) && $correo5 != ''){         $a .= ",'".$correo5."'" ;   }else{$a .= ",''";}
				if(isset($asunto) && $asunto != ''){           $a .= ",'".$asunto."'" ;    }else{$a .= ",''";}
				if(isset($mensaje) && $mensaje != ''){         $a .= ",'".$mensaje."'" ;   }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `saludos_videos_enviados` (id_usuario, sal01, sal02, sal03, sal04, correo1, correo2, correo3, correo4, correo5, asunto, mensaje) VALUES ({$a} )";
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
				$a = "idSaludo='".$idSaludo."'" ;
				if(isset($id_usuario) && $id_usuario != ''){    $a .= ",id_usuario='".$id_usuario."'" ;}
				if(isset($sal01) && $sal01 != ''){              $a .= ",sal01='".$sal01."'" ;}
				if(isset($sal02) && $sal02 != ''){              $a .= ",sal02='".$sal02."'" ;}
				if(isset($sal03) && $sal03 != ''){              $a .= ",sal03='".$sal03."'" ;}
				if(isset($sal04) && $sal04 != ''){              $a .= ",sal04='".$sal04."'" ;}
				if(isset($correo1) && $correo1 != ''){          $a .= ",correo1='".$correo1."'" ;}
				if(isset($correo2) && $correo2 != ''){          $a .= ",correo2='".$correo2."'" ;}
				if(isset($correo3) && $correo3 != ''){          $a .= ",correo3='".$correo3."'" ;}
				if(isset($correo4) && $correo4 != ''){          $a .= ",correo4='".$correo4."'" ;}
				if(isset($correo5) && $correo5 != ''){          $a .= ",correo5='".$correo5."'" ;}
				if(isset($asunto) && $asunto != ''){            $a .= ",asunto='".$asunto."'" ;}
				if(isset($mensaje) && $mensaje != ''){          $a .= ",mensaje='".$mensaje."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_videos_enviados` SET ".$a." WHERE idSaludo = '$idSaludo'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	

			//Obtengo el nombre fisico 
			$sal = $_GET['del'].'mp4';
			
			//borro el archivo
			if(unlink($arrUsuario['ex_videos'].'Combinados/'.$sal03)){	
					
				//se borra al usuario
				$query  = "DELETE FROM `saludos_videos_enviados` WHERE idSaludo = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
				
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}else{
			
				//se borra al usuario
				$query  = "DELETE FROM `saludos_videos_enviados` WHERE idSaludo = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
				
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}	
			
		break;	
				
/*******************************************************************************************************************/
	}
?>