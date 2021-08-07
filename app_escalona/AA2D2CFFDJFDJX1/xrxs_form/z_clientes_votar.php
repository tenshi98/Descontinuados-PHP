<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridClientead                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idVoto']) )            $idVoto            = $_POST['idVoto'];
	if ( !empty($_POST['idCliente']) )         $idCliente         = $_POST['idCliente'];
	if ( !empty($_POST['idPregunta']) )        $idPregunta        = $_POST['idPregunta'];
	if ( !empty($_POST['idRespuesta']) )       $idRespuesta       = $_POST['idRespuesta'];
	if ( !empty($_POST['Cantidad']) )          $Cantidad          = $_POST['Cantidad'];
	
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
			case 'idVoto':       if(empty($idVoto)){       $error['idVoto']        = 'error/No ha ingresado el idCliente del sistema';}break;
			case 'idCliente':    if(empty($idCliente)){    $error['idCliente']     = 'error/No ha ingresado el fcreacion del sistema';}break;
			case 'idPregunta':   if(empty($idPregunta)){   $error['idPregunta']    = 'error/No ha ingresado la imagen';}break;
			case 'idRespuesta':  if(empty($idRespuesta)){  $error['idRespuesta']   = 'error/No ha ingresado el email';}break;
			case 'Cantidad':     if(empty($Cantidad)){     $error['Cantidad']      = 'error/No ha ingresado la razon social';}break;
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
				
				foreach($_POST['idRespuesta'] AS $b => $m) {
					
					$idRespuesta = "'".$m."'" ;
					$Cantidad = "'".$_POST['repuesta_'.$m.'']."'" ;;
					
					// inserto los datos de registro en la db
					$query  = "INSERT INTO `clientes_votos` (idCliente, idPregunta, idRespuesta, Cantidad) VALUES ({$idCliente},{$idPregunta},{$idRespuesta},{$Cantidad} )";
					$result = mysql_query($query, $dbConn);
					
					
				}
				header( 'Location: '.$location.'&created=true' );
				die;
			}

		break;
					
/*******************************************************************************************************************/
	}
?>