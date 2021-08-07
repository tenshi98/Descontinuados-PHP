<?php

require_once('nombre_pag.php');
require_once('conexion.php');
require("PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;

if ($_POST["correo"]<>"" or $_POST['comentarios']<>"") {
$enviado=1;
$nombre=$_POST['nombre'];
$origen=$_POST['correo'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['comentarios'];

$mail->From=$origen;
	$mail->FromName=$nombre;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($concopia);
	$mail->Subject = $asunto;
	$mail->IsHTML(true);
			$body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"";
			$body .= "\"http://www.w3.org/TR/html4/loose.dtd\">";
			$body .= "<html>";
			$body .= "<head>";
			$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
			$body .= "<title>Informativo</title>";
			$body .= "</head>";
			$body .= " ";
			$body .= "<body bgcolor=#ffffff>";
			$body .= "";
			$body .=  "<table width='575' border='0' cellspacing='0' cellpadding='0' id='table7' height='494'><tr><td height=98 class='arial_12_blue' align=center  >";
			$body .=  "<p><font color='#000000' face='Arial'>". $nombre."(".$origen."),  Escribio en ". $nombreurl."</font></p><font color='#000000' face='Arial'><strong>Asunto: ". $asunto."</strong><br /></font><br /><br /><font color='#000000' face='Arial'>Mensaje: ". $mensaje."<br /></font></td></tr></table>";
			$body .= "</body></html>";

			$mail->MsgHTML($body);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}
			else
			{

  			 $mail->ClearAddresses();
			}

}
	header( 'Location: index.html' );
	die;

?>
