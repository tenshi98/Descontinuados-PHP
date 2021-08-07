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
	if ( !empty($_GET['table']) )                 $table                    = $_GET['table'];
	if ( !empty($_GET['val']) )                   $val                      = $_GET['val'];
	if ( !empty($_GET['app_conf']) )              $app_conf                 = $_GET['app_conf'];	
	if ( !empty($_POST['id']) )                   $id                       = $_POST['id'];
	if ( !empty($_POST['comport_alcance']) )      $comport_alcance          = $_POST['comport_alcance'];
	if ( !empty($_POST['comport_busq_taxi_1']) )  $comport_busq_taxi_1      = $_POST['comport_busq_taxi_1'];
	if ( !empty($_POST['comport_busq_taxi_2']) )  $comport_busq_taxi_2      = $_POST['comport_busq_taxi_2'];
	if ( !empty($_POST['comport_espera']) )       $comport_espera           = $_POST['comport_espera'];
	
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
			case 'table':                if(empty($table)){                $error['table']                = 'error/No ha ingresado el id del sistema';}break;
			case 'val':                  if(empty($val)){                  $error['val']                  = 'error/No ha ingresado el Nombre del sistema';}break;
			case 'app_conf':             if(empty($app_conf)){             $error['app_conf']             = 'error/No ha ingresado la imagen';}break;
			case 'id':                   if(empty($id)){                   $error['id']                   = 'error/No ha ingresado el email';}break;
			case 'comport_alcance':      if(empty($comport_alcance)){      $error['comport_alcance']      = 'error/No ha ingresado la razon social1';}break;
			case 'comport_busq_taxi_1':  if(empty($comport_busq_taxi_1)){  $error['comport_busq_taxi_1']  = 'error/No ha ingresado la razon social2';}break;
			case 'comport_busq_taxi_2':  if(empty($comport_busq_taxi_2)){  $error['comport_busq_taxi_2']  = 'error/No ha ingresado la razon social3';}break;
			case 'comport_espera':       if(empty($comport_espera)){       $error['comport_espera']       = 'error/No ha ingresado la razon social4';}break;

		}
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'table':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//por ultimo actualizo el estado de los ajustes generales
				$query  = "UPDATE `clientes_tipos` SET {$table} = '{$val}' WHERE idTipoCliente = {$app_conf} ";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location );
				die;

			}	
	
		break;	
/*******************************************************************************************************************/		
		case 'submit_alcance':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Actualizo la vista de las alarmas
				$query  = "UPDATE `clientes_tipos` SET comport_alcance='{$comport_alcance}' WHERE idTipoCliente = '{$id}'";
				$result = mysql_query($query, $dbConn);

				header( 'Location: '.$location );
				die;

			}	
	
		break;	
/*******************************************************************************************************************/		
		case 'submit_alcance_taxi_1':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Actualizo la vista de las alarmas
				$query  = "UPDATE `clientes_tipos` SET comport_busq_taxi_1='{$comport_busq_taxi_1}' WHERE idTipoCliente = '{$id}'";
				$result = mysql_query($query, $dbConn);
			
				header( 'Location: '.$location );
				die;

			}	
	
		break;	
/*******************************************************************************************************************/		
		case 'submit_alcance_taxi_2':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Actualizo la vista de las alarmas
				$query  = "UPDATE `clientes_tipos` SET comport_busq_taxi_2='{$comport_busq_taxi_2}' WHERE idTipoCliente = '{$id}'";
				$result = mysql_query($query, $dbConn);
			
				header( 'Location: '.$location );
				die;

			}	
	
		break;
/*******************************************************************************************************************/		
		case 'submit_espera':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Actualizo la vista de las alarmas
				$query  = "UPDATE `clientes_tipos` SET comport_espera='{$comport_espera}' WHERE idTipoCliente = '{$id}'";
				$result = mysql_query($query, $dbConn);
			
				header( 'Location: '.$location );
				die;

			}	
	
		break;		
/*******************************************************************************************************************/
	}
?>
