<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->



$video=$_GET["video"].".jpg";

$result = mysql_query("select * from parametros",$dbCasting);
while($row=mysql_fetch_array($result))
{
		  $datos=$row['donde'];

}
$foto_frame1="/var/www/".$residencia."/fotos/".$video;
$video_cambiar= $datos . $_GET["video"].".flv";
//$video_cambiar= $datos . "1_Mail_20130307_d1a1".".flv";

$command = "ffmpeg -y -ss 3 -i ".$video_cambiar." -f mjpeg -vframes 1 -s 240x240 -an ".$foto_frame1;

$fp = shell_exec($command);

	$video=str_replace('.jpg', '.flv', $_GET["video"]);

if (substr($_GET["video"], 0,5)=="nph1_") {
	$sql_Postulante="UPDATE Postulante set  PostFoto1='".$video."',estadovideo1=0  WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; }
if (substr($_GET["video"], 0,5)=="nph2_") {
	$sql_Postulante="UPDATE Postulante set  PostFoto2='".$video."',estadovideo2=0  WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; }
if (substr($_GET["video"], 0,5)=="nph3_") {
	$sql_Postulante="UPDATE Postulante set  PostFoto3='".$video."',estadovideo3=0  WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; }
$result_graba_Postulante =mysql_query($sql_Postulante,$dbCasting);

require("PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;
$mail->From=$row_usuario["PostEmail"];
	$mail->FromName=$nombre_usu;
	$mail->Sender=$row_usuario["PostEmail"];
	$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
	$mail->Subject = "Ha reemplazado un Video de presentacion.";
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
	$mail->AddAddress($concopia);
	$videomail  = "http://".$nombreurl."/intranet_administracion";
	$body .=  "<table width='575' border='0' cellspacing='0' cellpadding='0' id='table7' height='494'><tr><td height=98 class='rial_12_blue' align=right   >";
	$body .=  "<p><font color='#000000' face='Arial'>". $nombre_usu.", Ha reemplazado un video de presentacion</font></p><font color='#000000' face='Arial'>Debes revisar y activar<br /></font><br><br><br><a href=". $videomail . ">REVISA AQUI!!</a></td></tr>";
	$body .=  "</table>";
	$body .= "</body></html>";
			$mail->MsgHTML($body);
			if(!$mail->Send())
			{

				$mail->ClearAddresses();
			}else
			{

  			 $mail->ClearAddresses();
			}

?>


<body>


  <div align="center">

<table border="0" width="93%" cellspacing="0" cellpadding="0" id="table1" >
	<tr>
		<td>
		<div align="center">
		<table border="0" width="86%" cellspacing="0" cellpadding="0" id="table2" height="265">

			<tr>
				<td class="georgia_bl_18_it_padd" align="center"><br><br><br>&nbsp; Grabaci&oacute;n Detenida<br>
				<img src="img/imagen_capturada.jpg" border='0' ></td>
			
				</td>
			</tr>
						<tr>
				<td align=center >
				<a href="#" onclick="javascript:window.close();" ><IMG alt="Cerrar Pagina" src="img/cerrar_ventana.png" border=0></a></td>
			</tr>
		</table>
		</div>

				</div>


    </div>	</body>

</html>