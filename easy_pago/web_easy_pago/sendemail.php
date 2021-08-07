<?php	
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                                    Recepcion de datos                                                          */
/**********************************************************************************************************************************/
if(isset($_POST['name'])&&$_POST['name']!=''){   $name  = @trim(stripslashes($_POST['name']));  }else{$name   ='';}
if(isset($_POST['email'])&&$_POST['email']!=''){ $email = @trim(stripslashes($_POST['email'])); }else{$email  ='';}
if(isset($_POST['phone'])&&$_POST['phone']!=''){ $phone = @trim(stripslashes($_POST['phone'])); }else{$phone  ='';}
/**********************************************************************************************************************************/
/*                                                  generacion de variables                                                       */
/**********************************************************************************************************************************/
$de_correo     = 'noresponder@naturalphone.com.pe';//correo natural phone
$de_nombre     = 'Natural Phone';
$asunto        = 'Notificacion de inscripcion';
$mensaje       = 'Sus datos han sido registrados, dentro de poco un ejecutivo se comunicara con usted';
$para_correo   = 'carlos.valenzuela.silva@gmail.com';//correo natural phone
/**********************************************************************************************************************************/
/*                                                       envio de correo                                                          */
/**********************************************************************************************************************************/

	//envio de correo de con la clave nueva
	$mail             = new PHPMailer();
	$mail->IsHTML(true);
	$mail->SMTPAuth   = true;
	$mail->Host       = "localhost";
	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	//====== DE QUIEN ES ========
	$mail->From      = $de_correo;
	$mail->FromName  = $de_nombre;
	$mail->Sender    = $de_correo;
	$mail->AddReplyTo("".$de_correo."", "Responde a este mail");
	//====== PARA QUIEN =========
	$mail->Subject = $asunto ;
	$mail->AddAddress($email);    
	//====== MENSAJE =========
	$strBody = $mensaje ;
	$mail->MsgHTML($strBody);
	if(!$mail->Send()){
		$mail->ClearAddresses();
	}else{
		$mail->ClearAddresses();
	}
	
	
	//envio de correo de con la clave nueva
	$mail             = new PHPMailer();
	$mail->IsHTML(true);
	$mail->SMTPAuth   = true;
	$mail->Host       = "localhost";
	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	//====== DE QUIEN ES ========
	$mail->From      = $de_correo;
	$mail->FromName  = $de_nombre;
	$mail->Sender    = $de_correo;
	$mail->AddReplyTo("".$de_correo."", "Responde a este mail");
	//====== PARA QUIEN =========
	$mail->Subject = $asunto ;
	$mail->AddAddress($para_correo);    
	//====== MENSAJE =========
	$strBody = 'Correo:'.$email.' - Nombre:'.$name.' - Fono:'.$phone.', favor comunicarse a la brevedad' ;
	$mail->MsgHTML($strBody);
	if(!$mail->Send()){
		$mail->ClearAddresses();
	}else{
		$mail->ClearAddresses();
	}				
	
	
?>
