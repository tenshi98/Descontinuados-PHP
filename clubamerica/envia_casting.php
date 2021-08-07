<?php session_start();
/**********************************************************************************************************************************/
/*                                 Realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
  
    // BOTON FLOTANTE --->
        require_once('inc/head.php');         
     // BOTON FLOTANTE --->
?>

<body  >

<?   
    // MENU CINTILLO --->
        require_once('inc/menu_cintillo.php'); 
		    // MENU CINTILLO --->
?>

	<section class="wrapper row-fluid">
    		<div class="cont_wrapper">

<?   
    // MENU NAVEGACION --->
        require_once('inc/menu_nav_login.php');         
     // MENU NAVEGACION --->
?>
                
                <div class="wrapper_b">
                	  <div class="body_ca">
<!-- BLOQUE CENTRAL IZQUIERDO -->
                	<div class="bloq_news">
                    	<div class="span16">
		<!-- Envio de correos -->
		<div class="cont_slider">
<div class="cont_video_talento" style="overflow-y: scroll; overflow-x: hidden; height: 350px; padding-right: 5px;">
	
<?   

$datos_relevantes=0;
$datos_relevantes1=0;
$datos_relevantes2=0;
if ($_POST["video"]!="") {
$video=$_POST["video"].".jpg";
}else{
$datos_relevantes=1;
}

$result = mysql_query("select * from parametros",$dbCasting);
while($row=mysql_fetch_array($result))
{
		  $datos=$row['donde'];

}
$foto_frame1="/var/www/".$residencia."/fotos/".$video;
$video_cambiar= $datos . $_POST["video"].".flv";
$command = "ffmpeg -y -ss 3 -i ".$video_cambiar." -f mjpeg -vframes 1 -s 240x240 -an ".$foto_frame1;
$fp = shell_exec($command);
?>


	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top">
		
<!-- CONTENIDO -->




<?
require("PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;


$foto_top= "img/top_vacio.png";
$mail->AddEmbeddedImage($foto_top, 'foto_top','file/top.png','base64','image/png');

$foto_base= "img/centro_modulo.png";
$mail->AddEmbeddedImage($foto_base, 'foto_base','file/centro.png','base64','image/png');

$foto= "fotos/".$_POST["video"].".jpg";
$mail->AddEmbeddedImage($foto, 'imagen1','file/imagen1.jpg','base64','image/jpg');

$foto_play="img/play_video_4.png";
$mail->AddEmbeddedImage($foto_play, 'foto_play','file/play_video_4.png','base64','image/png');

 ?>
<center><h2>Se han enviado los siguientes correos:</h2><br></center>


<?if ($_POST["correo"]<>"") {?>
	<center><span class=celda_con_div><?=$_POST["correo"]?></span><br></center>
	<?
	$contador=$contador+1;
	$mail->From=$row_usuario["PostEmail"];
	$mail->FromName=$nombre_usu;
	$mail->Sender=$row_usuario["PostEmail"];
	$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
	$mail->Subject = "Te invito a ver mi Presentación";
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
	$mail->AddAddress($_POST["correo"]);
	$videomail  = "http://".$nombreurl."/tu_correo.php?video=".$_POST["video"]."&tc=".$_POST["correo"];
	$body .=  "<table width='575' border='0' cellspacing='0' cellpadding='0' id='table7' height='494'><tr><td height=98 class='rial_12_blue' align=right   >";
	$body .=  "<p><font color='#000000' face='Arial'>". $nombre_usu.", te han enviado el Siguiente Mensaje</font></p><font color='#000000' face='Arial'>Mira mi presentacion para Club America<br /></font></td></tr>";
	$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='570' border='0' cellspacing='0' cellpadding='0' id='table8'>";
	$body .=  "<tr><td width='356' height='20' align='center' valign='middle'>&nbsp;</td><td width='214' rowspan='2' align='center'>&nbsp;</td></tr>";
	$body .=  "<tr><td align='center' height=372 valign='middle'  ><table border='0' width='235' height='235' id='table1'  background=\"cid:imagen1\" style='background-repeat: no-repeat'>";
	$body .=  "<tr><td align='center'  width='240' height='240'><a href=". $videomail . "><img src='cid:foto_play' border=0></a></td></tr></table></a></td></table>";
	$body .= "</body></html>";
			$mail->MsgHTML($body);
			if(!$mail->Send())
			{

				$mail->ClearAddresses();
			}else
			{

  			 $mail->ClearAddresses();
			}

 }else{
	 $datos_relevantes1=1;
 }


if ($_POST["formId"]<>"") {
$contador=0;
echo $_POST["formId"];
$Nombres = explode (',', $_POST["formId"]);
while (list($i,$Valor)=each($Nombres))
			{
?>

<center><span class=celda_con_div><?=$Valor?></span><br></center>

<?
	$mail->From=$row_usuario["PostEmail"];
	$mail->FromName=$nombre_usu;
	$mail->Sender=$row_usuario["PostEmail"];
	$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
	$mail->Subject = "Te invito a ver mi Presentación";
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
	$mail->AddAddress($Valor);
	$videomail  = "http://".$nombreurl."/tu_correo.php?video=".$_POST["video"]."&tc=".$fila_receptor["destino"];
	$body .=  "<table width='575' border='0' cellspacing='0' cellpadding='0' id='table7' height='494'><tr><td height=98 class='rial_12_blue' align=center   background=\"cid:foto_top\">";
	$body .=  "<p><font color='#FFFFFF' face='Arial'>". $nombre_usu.", te han enviado el Siguiente Mensaje</font></p><font color='#FFFFFF' face='Arial'>Mira mi presentacion para Club America<br /></font></td></tr>";
	$body .=  "<tr><td align='center' valign='middle' background=\"cid:foto_base\"><a href=". $videomail . "><table width='570' border='0' cellspacing='0' cellpadding='0' id='table8'>";
	$body .=  "<tr><td width='356' height='20' align='center' valign='middle'>&nbsp;</td><td width='214' rowspan='2' align='center'>&nbsp;</td></tr>";
	$body .=  "<tr><td align='center' height=372 valign='middle'  ><table border='0' width='235' height='235' id='table1'  background=\"cid:imagen1\" style='background-repeat: no-repeat'>";
	$body .=  "<tr><td align='center'  width='240' height='240'><a href=". $videomail . "><img src='cid:foto_play' border=0></a></td></tr></table></a></td></table>";
	$body .= "</body></html>";
			$mail->MsgHTML($body);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}else{
  			 $mail->ClearAddresses();
			}
	}




//$sql_leido="update videos_correos set cuantos=".$contador." where nombre_video='".$_POST["video"]."'";

//$res=mysql_query($sql_leido,$base); 


}else{

	 $datos_relevantes2=1;

 }


if ($datos_relevantes==1) {?>
           <br><br><br>
              <p><h2>No has seleccionado un Video.</h2></p>
            <br>
			<div class="cont_btn"><input name="ENVIAR" type="submit" value="Volver" onclick="javascript:history.back()" id="ENVIAR"></div>

<?}else{
	if ($datos_relevantes1==0 or $datos_relevantes2==0) {?>
	  <br><br><br><blockquote>
              <p><h2>El Video Mail fue enviado con &eacute;xito.</h2></p>
            </blockquote><br>

	<?}else{?>
		<br><br><br>
			<h2> Falta Informaci&oacute;n Relevante para el Env&iacute;o de los correos. </h2><br><br><br>
<div class="cont_btn"><input name="ENVIAR" type="submit" value="Volver" onclick="javascript:history.back()" id="ENVIAR"></div>
<?}
}
?>


<!-- CONTENIDO -->
		</td>
      </tr>
    </table>
</div>
</div>
		<!-- Envio de correos -->
 


                        	<div class="cont_tabs_n">
<!-- SALUDOS VIRTUALES/CASTING -->        
<?   
    // SALUDOS VIRTUALES --->
        require_once('inc/saludos_virtuales.php');         
     // SALUDOS VIRTUALES --->
?>		
                            	
    
<?   
    // CASTING --->
        require_once('inc/casting.php');         
     // CASTING --->
?>		
                            	
<!-- SALUDOS VIRTUALES/CASTING  -->  
                                    
<!-- MUSICA/SORTEOS  -->                                  
                              
<?   
    // MUSICA/SORTEOS --->
        require_once('inc/musica_sorteos.php');         
     // MUSICA/SORTEOS --->
?>  


<!-- MUSICA/SORTEOS  -->  



<!-- BLOQUE CENTRAL IZQUIERDO -->	

<!-- BLOQUE DERECHO -->	
<aside class="span8">

		<!-- VIDEO CHAT -->                         
<?   
    // MENU NAVEGACION --->
        require_once('inc/video_chat.php');         
     // MENU NAVEGACION --->
?>        

		<!-- VIDEO CHAT -->  
		<!-- PUBLICIDAD -->  


<?   
        require_once('inc/publicidad_derecha.php');         
?> 


		<!-- PUBLICIDAD -->  
</aside>
                    </div>

                </div>

<!-- BLOQUE DERECHO -->	

<!-- BLOQUE CENTRAL IZQUIERDO -->	


		<!-- PUBLICIDAD -->  

<?   
    // MENU NAVEGACION --->
        require_once('inc/publicidad_centro.php');         
     // MENU NAVEGACION --->
?>  


		<!-- PUBLICIDAD -->  

		<!-- VIDA SOCIAL -->  
               
<?   
        require_once('inc/social.php');         
?>   

		<!-- VIDA SOCIAL -->  



		<!-- GANADORES -->  
<?   
        require_once('inc/ganadores.php');         
?>                   	
		<!-- GANADORES -->  



		<!-- REDES SOCIALES -->  
<?   
        require_once('inc/redes_sociales.php');         
?>  
		<!-- REDES SOCIALES -->                
                	
              
<!-- BLOQUE CENTRAL IZQUIERDO -->	
<!-- FOOTER -->	

<?   
    // MENU NAVEGACION --->
        require_once('inc/footer.php');         
     // MENU NAVEGACION --->
?>



<!-- FOOTER -->	
            </div>
    		
    
    </section>

</body>
</html>
