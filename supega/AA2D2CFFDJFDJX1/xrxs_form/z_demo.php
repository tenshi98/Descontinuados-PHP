<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require '../AA2D2CFFDJFDJX1/lib_gcm/GCMPushMessage.php';
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['mensaje']) )      $mensaje        = $_POST['mensaje'];
	if ( !empty($_POST['texto']) )        $texto          = $_POST['texto'];
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
			case 'mensaje':  if(empty($mensaje)){   $error['mensaje']   = 'error/No ha ingresado el mensaje';}break;
			case 'texto':    if(empty($texto)){     $error['texto']     = 'error/No ha ingresado el texto';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'demo':

			//Busco los contactos del cliente con un GSM establecido
			$arrContactos = array();
			$query = "SELECT GSM
			FROM `clientes_listado`
			WHERE idDisponibilidad = 1 AND GSM!='' AND idTipo=1";
			$resultado = mysql_query ($query, $dbConn);
			$total = mysql_num_rows ($resultado);
			while ( $row = mysql_fetch_assoc ($resultado)) {
			array_push( $arrContactos,$row );
			}
			
			if($total==0) {$error['profesionales'] = 'error/No hay profesionales disponibles';}
				
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//seteo de datos
				$apiKey = "AIzaSyDTfsctSuv4-zH8nMWB_lsDE7S_-AOX_kQ";
				$message = "Notificacion de trabajo";
				
				foreach ($arrContactos as $contacto) { 
					
					//Se envia el mensaje
					$devices = array($contacto['GSM']);
					
					$gcpm = new GCMPushMessage($apiKey);
					$gcpm->setDevices($devices);
					$gcpm->send($message, array('title' => 'Test title'));
					
					
					//Se almacena la alerta
					$a  = "'2'" ;        
					$a .= ",'0'" ; 
					$a .= ",'".fecha_actual()."'" ; 
					$a .= ",'".$mensaje."'" ; 
					$a .= ",'5'" ; 
					$a .= ",'1'" ; 

						
					// inserto los datos de registro en la db
					$query  = "INSERT INTO `clientes_trabajos` (idOfertador, idTrabajador, Fecha, Descripcion, Tiempo, idEstado) 
					VALUES ({$a} )";
					$result = mysql_query($query, $dbConn);
					//recibo el último id generado por mi sesion
					$ultimo_id = mysql_insert_id($dbConn);
	
	
					//Se registra el mensaje en la tabla de mensajes
					$a = "'2'" ;
					$a .= ",'3'" ;
					$a .= ",'".$mensaje."'" ;
					$a .= ",'".$texto."'" ;
					$a .= ",'1'" ;
					$a .= ",'".fecha_actual()."'" ;
					$a .= ",'".hora_actual()."'" ;
					$a .= ",'".$ultimo_id."'" ;
					$a .= ",'-12.0805608632947'" ;
					$a .= ",'-77.0112420835567'" ;
					
					
					$query  = "INSERT INTO `clientes_notificaciones` (idCliente, idTipoNoti, mensaje, texto, idEstado, Fecha, Hora, 
					idTrabajos, Latitud, Longitud) VALUES ({$a} )";
					$result = mysql_query($query, $dbConn);
					
					header( 'Location: '.$location.'?send=true' );
					die;
					
					
				}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			}
	
		break;
/*******************************************************************************************************************/		

/*******************************************************************************************************************/
	}
?>
