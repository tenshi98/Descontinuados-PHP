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
	if ( !empty($_POST['Titulo']) )      $Titulo      = $_POST['Titulo'];
	if ( !empty($_POST['Mensaje']) )     $Mensaje     = $_POST['Mensaje'];
	if ( !empty($_POST['idCliente']) )   $idCliente   = $_POST['idCliente'];

	
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
			case 'Titulo':     if(empty($Titulo)){     $error['Titulo']      = 'error/No ha ingresado el titulo ';}break;
			case 'Mensaje':    if(empty($Mensaje)){    $error['Mensaje']     = 'error/No ha ingresado el Mensaje';}break;
			case 'idCliente':  if(empty($idCliente)){  $error['idCliente']   = 'error/No ha ingresado la id del cliente';}break;	
		}
	}

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'envio1':

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Busco los datos del cliente		
				$query="SELECT email
				FROM clientes_listado 
				WHERE idCliente = '".$idCliente."' AND email!=''  ";	  
				$resultado2 = mysql_query ($query, $dbConn);
				$row_data = mysql_fetch_assoc ($resultado2);
				mysql_free_result($resultado2);

					if(isset($row_data['email'])&&$row_data['email']!=''){	
						//envio de correo de con la clave nueva
						$mail             = new PHPMailer();
						$mail->IsHTML(true);
						$mail->SMTPAuth   = true;
						$mail->Host       = "localhost";
						//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
						//====== DE QUIEN ES ========
						$mail->From=$arrUsuario['email'];
						$mail->FromName=$arrUsuario['Nombre'];
						$mail->Sender=$arrUsuario['email'];
						$mail->AddReplyTo("".$arrUsuario['email']."", "Responde a este mail");
						//====== PARA QUIEN =========
						$mail->Subject = $Titulo ;
						$mail->AddAddress($row_data['email']);    
						//====== MENSAJE =========
						$strBody = $Mensaje;
						$mail->MsgHTML($strBody);
						if(!$mail->Send()){
							$mail->ClearAddresses();
						}else{
							$mail->ClearAddresses();
						}
					}
				//Reenvio a una nueva direccion
				header( 'Location: '.$location.'&mms_send=true' );
				die;
				
			}
	
		break;
						
						
/*******************************************************************************************************************/
	}
?>