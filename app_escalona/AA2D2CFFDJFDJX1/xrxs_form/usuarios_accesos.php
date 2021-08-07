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
	if ( !empty($_POST['idAcceso']) )    $idAcceso    = $_POST['idAcceso'];
	if ( !empty($_POST['idUsuario']) )   $idUsuario   = $_POST['idUsuario'];
	if ( !empty($_POST['Fecha']) )       $Fecha       = $_POST['Fecha'];
	if ( !empty($_POST['Hora']) )        $Hora        = $_POST['Hora'];
	
	
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
			case 'idAcceso':   if(empty($idAcceso)){  $error['idAcceso']   = 'error/No ha ingresado el id del sistema';}break;
			case 'idUsuario':  if(empty($idUsuario)){ $error['idUsuario']  = 'error/No ha ingresado el idUsuario del sistema';}break;
			case 'Fecha':      if(empty($Fecha)){     $error['Fecha']      = 'error/No ha ingresado la imagen';}break;
			case 'Hora':       if(empty($Hora)){      $error['Hora']       = 'error/No ha ingresado el email';}break;	
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
				if(isset($idUsuario) && $idUsuario != ''){  $a = "'".$idUsuario."'" ;   }else{$a ="''";}
				if(isset($Fecha) && $Fecha != ''){          $a .= ",'".$Fecha."'" ;     }else{$a .= ",''";}
				if(isset($Hora) && $Hora != ''){            $a .= ",'".$Hora."'" ;      }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_accesos` (idUsuario, Fecha, Hora) VALUES ({$a} )";
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
				$a = "idAcceso='".$idAcceso."'" ;
				if(isset($idUsuario) && $idUsuario != ''){   $a .= ",idUsuario='".$idUsuario."'" ;}
				if(isset($Fecha) && $Fecha != ''){           $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Hora) && $Hora != ''){             $a .= ",Hora='".$Hora."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_accesos` SET ".$a." WHERE idAcceso = '$idAcceso'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `usuarios_accesos` WHERE idAcceso = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>