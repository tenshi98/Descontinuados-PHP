<?php
require_once('./nombre_pag.php');
require_once('./conexion.php');
require("./PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;

$foto_top= "images/top_vacio.png";
$mail->AddEmbeddedImage($foto_top, 'foto_top','file/top.png','base64','image/png');
$foto_base= "images/video_escalona.jpg";
$mail->AddEmbeddedImage($foto_base, 'foto_base','images/video_escalona.jpg','base64','image/png');
$foto= "images/video_escalona.jpg";
$mail->AddEmbeddedImage($foto, 'imagen1','file/imagen1.jpg','base64','image/jpg');
$foto_play="images/video_escalona.jpg";
$mail->AddEmbeddedImage($foto_play, 'foto_play','file/play_video_4.png','base64','image/png');


$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "m" , $tiempo ); 
$seg= date ( "s" , $tiempo ); 
$hora=$hora.$min.$seg;

$Fecha=getdate(); 
$numeroRegistros=0;
$Anio=$Fecha["year"]; 
$mes=$Fecha["mon"]; 
$dia=$Fecha["mday"]; 
if ($mes<10) {
	$mesdis="0".$mes;
}else{
	$mesdis=$mes;
}
if ($dia<10) {
	$diadis="0".$dia;
}else{
$diadis=$dia;
}
$fecha=$Anio.$mesdis.$diadis;



		   $origen=$_POST['mail'];
		   $mensaje=$_POST['mensaje'];
		  $asunto="Te Invito a compartir Juntos Somos Mas";
		  $nombre=$fila['nombre'];




if ($_POST["correo1"]<>"") {
$enviado=1;
$recibidor=$_POST["correo1"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo2"]<>"") {
$enviado=1;
$recibidor=$_POST["correo2"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo3"]<>"") {
$enviado=1;
$recibidor=$_POST["correo3"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo4"]<>"") {
$enviado=1;
$recibidor=$_POST["correo4"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo5"]<>"") {
$enviado=1;
$recibidor=$_POST["correo5"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo6"]<>"") {
$enviado=1;
$recibidor=$_POST["correo6"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo7"]<>"") {
$enviado=1;
$recibidor=$_POST["correo7"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo8"]<>"") {
$enviado=1;
$recibidor=$_POST["correo8"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo9"]<>"") {
$enviado=1;
$recibidor=$_POST["correo9"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($_POST["correo10"]<>"") {
$enviado=1;
$recibidor=$_POST["correo10"];
$videomail  = "http://www.juntossomosmas.cl/video_invita.html";
$sql="insert into correos (origen,destino) values ('" . $origen . "','" . $recibidor . "')";
$resultado = mysql_query($sql,$base);
$mail->From=$origen;
	$mail->FromName=$origen;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($recibidor);
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
			$body .=  "<table width='510' border='0' cellspacing='0' cellpadding='0' id='table7' height='321'><tr><td height=98 class='arial_12_blue' align=center >";
			$body .=  "<p><font color='#000000' face='Arial'>". $origen.", te ha reenviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
			$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='510' border='0' cellspacing='0' cellpadding='0' id='table8'>";
			$body .=  "<tr><td width='510' height='321' align='center' valign='middle'>&nbsp;</td></tr></table>";
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
if ($enviado=1) {
?>
<form name="formulario" method="post" action="http://<?=$nombreurl?>/index.html">
            <input type="hidden" name="msg_error" value="1">
</form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>
<?}else{?>
           <br><br><br><blockquote>
              <p><span class="arial_24_blue">Necesitas ingresar a lo menos un correo.</span></p>
            </blockquote><br><br><br>
<?}?>

