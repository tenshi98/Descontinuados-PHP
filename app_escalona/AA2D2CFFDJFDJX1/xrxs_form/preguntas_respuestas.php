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
	if ( !empty($_POST['idRespuesta']) )   $idRespuesta   = $_POST['idRespuesta'];
	if ( !empty($_POST['idPregunta']) )    $idPregunta    = $_POST['idPregunta'];
	if ( !empty($_POST['Respuesta']) )     $Respuesta     = $_POST['Respuesta'];
	
	
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
			case 'idRespuesta':  if(empty($idRespuesta)){  $error['idRespuesta']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idPregunta':   if(empty($idPregunta)){   $error['idPregunta']   = 'error/No ha ingresado el idPregunta del sistema';}break;
			case 'Respuesta':    if(empty($Respuesta)){    $error['Respuesta']    = 'error/No ha ingresado la imagen';}break;
			
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
				if(isset($idPregunta) && $idPregunta != ''){   $a = "'".$idPregunta."'" ;    }else{$a ="''";}
				if(isset($Respuesta) && $Respuesta != ''){     $a .= ",'".$Respuesta."'" ;   }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `preguntas_respuestas` (idPregunta, Respuesta) VALUES ({$a} )";
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
				$a = "idRespuesta='".$idRespuesta."'" ;
				if(isset($idPregunta) && $idPregunta != ''){   $a .= ",idPregunta='".$idPregunta."'" ;}
				if(isset($Respuesta) && $Respuesta != ''){     $a .= ",Respuesta='".$Respuesta."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `preguntas_respuestas` SET ".$a." WHERE idRespuesta = '$idRespuesta'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
					
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `preguntas_respuestas` WHERE idRespuesta = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>