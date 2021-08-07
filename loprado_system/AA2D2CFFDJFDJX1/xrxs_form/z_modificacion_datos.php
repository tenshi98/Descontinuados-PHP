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
	if ( !empty($_POST['idUsuario']) )  $idUsuario   = $_POST['idUsuario'];
	if ( !empty($_POST['datos']) )      $datos       = $_POST['datos'];

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
			case 'idUsuario': if(empty($idUsuario)){  $error['idUsuario'] = 'error/No ha ingresado el usuario ';}break;
			case 'datos':     if(empty($datos)){      $error['datos']     = 'error/No ha ingresado los datos a modificar';}break;
		}
	}

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'mod':

			if ( empty($error) ) {
				
				//filtros
				if(isset($idUsuario) && $idUsuario != ''){   $a  = "'".$idUsuario."'" ;   }else{$a  ="''";}
				if(isset($datos) && $datos != ''){           $a .= ",'".$datos."'" ;      }else{$a .= ",''";}
				$a  .= ",'".fecha_actual()."'" ;
				$a  .= ",'1'" ;
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_sol_mod` (idUsuario, Datos, Fecha, idEstado) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&send=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'aprobar':

			if ( empty($error) ) {
				
				//Se marca la solicitud como aprobada
				$query  = "UPDATE `usuarios_sol_mod` SET idEstado=3 WHERE idModificaciones = {$_GET['aprobar']}";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&send=true' );
				die;
				
			}
	
		break;						
						
/*******************************************************************************************************************/
	}
?>
