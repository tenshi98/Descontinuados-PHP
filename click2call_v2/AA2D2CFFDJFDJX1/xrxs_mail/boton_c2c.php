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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])   ) {
 
		if(isset($asunto)&&$asunto!=''){
		$postdata = $asunto;
		}else{
		$postdata = 'mensaje';
		}
		if(isset($telefono)&&$telefono!=''){
		$fono = $telefono;
		}else{
		$fono = 'sin telefono';
		}
		
		//envio de correo de con la clave nueva
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->SMTPAuth   = true;
		$mail->Host       = "localhost";
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		//====== DE QUIEN ES ========
		$mail->From=$mail;
		$mail->FromName=$nombre;
		$mail->Sender=$mail;
		$mail->AddReplyTo("".$mail."", "Responde a este mail");
		//====== PARA QUIEN =========
		$mail->Subject = $postdata;
		$mail->AddAddress( $rowdata['email_principal']);    
		//====== MENSAJE =========
		$strBody = "<p>Nombre: ".$nombre."<br/>";
		$strBody .= "Correo: ".$mail."<br/>";
		$strBody .= "Telefono: ".$fono."<br/>";
		$strBody .= "Asunto: ".$postdata."</p>";
		$strBody .= "<p>Mensaje: ".$mensaje."</p>";
		$mail->MsgHTML($strBody);
		if(!$mail->Send()){
			$mail->ClearAddresses();
		}else{
			$mail->ClearAddresses();
		}
		
		header( 'Location: boton.php?send=true' );
		die;
		
}
?>