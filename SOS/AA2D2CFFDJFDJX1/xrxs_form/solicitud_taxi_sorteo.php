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
	if ( !empty($_POST['idSorteo']) )     $idSorteo      = $_POST['idSorteo'];
	if ( !empty($_POST['idSolicitud']) )  $idSolicitud   = $_POST['idSolicitud'];
	if ( !empty($_POST['idCliente']) )    $idCliente     = $_POST['idCliente'];
	if ( !empty($_POST['idTaxista']) )    $idTaxista     = $_POST['idTaxista'];
	if ( !empty($_POST['Estado']) )       $Estado        = $_POST['Estado'];
	
	
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
			case 'idSorteo':     if(empty($idSorteo)){      $error['idSorteo']       = 'error/No ha ingresado el id del sistema';}break;
			case 'idSolicitud':  if(empty($idSolicitud)){   $error['idSolicitud']    = 'error/No ha ingresado el idSolicitud del sistema';}break;
			case 'idCliente':    if(empty($idCliente)){     $error['idCliente']      = 'error/No ha ingresado la imagen';}break;
			case 'idTaxista':    if(empty($idTaxista)){     $error['idTaxista']      = 'error/No ha ingresado el email';}break;
			case 'Estado':       if(empty($Estado)){        $error['Estado']         = 'error/No ha ingresado la razon social';}break;
			
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
				if(isset($idSolicitud) && $idSolicitud != ''){  $a = "'".$idSolicitud."'" ;    }else{$a ="''";}
				if(isset($idCliente) && $idCliente != ''){      $a .= ",'".$idCliente."'" ;    }else{$a .= ",''";}
				if(isset($idTaxista) && $idTaxista != ''){      $a .= ",'".$idTaxista."'" ;    }else{$a .= ",''";}
				if(isset($Estado) && $Estado != ''){            $a .= ",'".$Estado."'" ;       }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `solicitud_taxi_sorteo` (idSolicitud, idCliente, idTaxista, Estado) VALUES ({$a} )";
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
				$a = "idSorteo='".$idSorteo."'" ;
				if(isset($idSolicitud) && $idSolicitud != ''){  $a .= ",idSolicitud='".$idSolicitud."'" ;}
				if(isset($idCliente) && $idCliente != ''){      $a .= ",idCliente='".$idCliente."'" ;}
				if(isset($idTaxista) && $idTaxista != ''){      $a .= ",idTaxista='".$idTaxista."'" ;}
				if(isset($Estado) && $Estado != ''){            $a .= ",Estado='".$Estado."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `solicitud_taxi_sorteo` SET ".$a." WHERE idSorteo = '$idSorteo'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `solicitud_taxi_sorteo` WHERE idSorteo = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>