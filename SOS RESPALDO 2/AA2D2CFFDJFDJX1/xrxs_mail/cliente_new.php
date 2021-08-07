<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/

	
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])&& !isset($errors[18])&& !isset($errors[19])&& !isset($errors[20])&& !isset($errors[21])  ) {
 

		//envio de correo de con la clave para ingresar por primera vez
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From=$rowempresa['email_principal'];
		$mail->FromName=$rowempresa['Nombre'];
		$mail->Sender=$rowempresa['email_principal'];
		$mail->AddReplyTo("".$rowempresa['email_principal']."", "Responde a este mail");
		//====== PARA QUIEN =========
		$mail->Subject = "Creacion de usuario" ;
		$mail->AddAddress($email);    
		//====== MENSAJE =========
		$strBody = "<p>Se ha creado correctamente su usuario, sin embargo debe ingresar la siguiente contraseña para activarlo:</p><p>".$create_pass."</p>";
		$mail->MsgHTML($strBody);
		if(!$mail->Send()){
			$mail->ClearAddresses();
		}else{
			$mail->ClearAddresses();
		}
		
		
}
?>