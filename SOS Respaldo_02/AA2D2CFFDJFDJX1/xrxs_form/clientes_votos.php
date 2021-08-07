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
	if ( !empty($_POST['idVoto']) )       $idVoto       = $_POST['idVoto'];
	if ( !empty($_POST['idCliente']) )    $idCliente    = $_POST['idCliente'];
	if ( !empty($_POST['idPregunta']) )   $idPregunta   = $_POST['idPregunta'];
	if ( !empty($_POST['idRespuesta']) )  $idRespuesta  = $_POST['idRespuesta'];
	
	
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
			case 'idVoto':      if(empty($idVoto)){      $error['idVoto']       = 'error/No ha ingresado el id del sistema';}break;
			case 'idCliente':   if(empty($idCliente)){   $error['idCliente']    = 'error/No ha ingresado el idCliente del sistema';}break;
			case 'idPregunta':  if(empty($idPregunta)){  $error['idPregunta']   = 'error/No ha ingresado la imagen';}break;
			case 'idRespuesta': if(empty($idRespuesta)){ $error['idRespuesta']  = 'error/No ha ingresado el email';}break;
			
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
				if(isset($idCliente) && $idCliente != ''){       $a = "'".$idCliente."'" ;       }else{$a ="''";}
				if(isset($idPregunta) && $idPregunta != ''){     $a .= ",'".$idPregunta."'" ;    }else{$a .= ",''";}
				if(isset($idRespuesta) && $idRespuesta != ''){   $a .= ",'".$idRespuesta."'" ;   }else{$a .= ",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_votos` (idCliente, idPregunta, idRespuesta) VALUES ({$a} )";
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
				$a = "idVoto='".$idVoto."'" ;
				if(isset($idCliente) && $idCliente != ''){      $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($idPregunta) && $idPregunta != ''){    $a .= ",idPregunta='".$idPregunta."'" ;}
				if(isset($idRespuesta) && $idRespuesta != ''){  $a .= ",idRespuesta='".$idRespuesta."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_votos` SET ".$a." WHERE idVoto = '$idVoto'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_votos` WHERE idVoto = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>