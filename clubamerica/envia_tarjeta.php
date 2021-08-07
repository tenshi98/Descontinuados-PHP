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
		<!-- SLIDER -->
  
    <!-- SALUDOS VIRTUALES --->
<?
$saludo="select * from saludos where id_correo='".$_GET["video"]."'";
$result_saludo =mysql_query($saludo,$dbCasting);
$row_saludo = mysql_fetch_assoc ($result_saludo); 
?>     

                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">

                        	<div class="cont_saludos_v box">
                            	<div class="salud_combinado">



<h2 class="span12">TARJETA DE SALUDOS.</h2><br><br>
<?
$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "m" , $tiempo ); 
$seg= date ( "s" , $tiempo ); 
$hora=$hora.":".$min.":".$seg;

$Fecha=getdate(); 
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<10) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio.$mesdis.$diadis;

if ($_POST["correo1"]!='' or $_POST["correo2"]!='' or $_POST["correo3"]!='' or $_POST["correo4"]!='' or $_POST["correo5"]!='') {
			if ( !empty($_POST["nombre_video"]) ) {
				$video=$_POST["nombre_video"].".jpg";
				$nom_vid=$_POST["nombre_video"];
				$result = mysql_query("select * from parametros",$dbCasting);
				while($row=mysql_fetch_array($result))
				{
					$datos=$row['donde']; 
				}
				$foto_frame1="/var/www/".$residencia."/fotos/".$video;
				$video_cambiar= $datos . $_POST["nombre_video"].".flv";
				$command = "ffmpeg -y -ss 3 -i ".$video_cambiar." -f mjpeg -vframes 1 -s 240x240 -an ".$foto_frame1;
				$fp = shell_exec($command);
			}
			
			$upd =  "insert into videos_correos(origen,nombre_video,nombre,apellido,fecha_video,hora_video,motivo,musica,artista,correo1,correo2,correo3,correo4,correo5,mensaje,leido,estado,asunto) values ('" . $_COOKIE['sess_demo_correo'] . "','" . $_POST["nombre_video"] . "','" . $_COOKIE['sess_demo_name'] . "','" . $_COOKIE['sess_demo_apellidos'] . "','" . $fecha . "','" . $hora . "','" . $_POST["motivo"] . "','" . $_POST["musica"] . "','" . $_POST["nombre"] . "','" . $_POST["correo1"] . "','" . $_POST["correo2"] . "','" . $_POST["correo3"] . "','" . $_POST["correo4"] . "','" . $_POST["correo5"] . "','" . $_POST["mensaje"] . "',0,1,'" . $_POST["asunto"] . "')";
			$result = mysql_query($upd, $dbCasting);

			require("PHPMailer_v5.1/class.phpmailer.php"); 
			$mail = new PHPMailer(); 
			$mail->Host = "localhost";
			$mail->SMTPAuth = true;

				if ($_POST["correo1"]!="") {
					$correo=$_POST["correo1"];
					$mail->From=$row_usuario["PostEmail"];
					$mail->FromName=$nombre_usu;
					$mail->Sender=$row_usuario["PostEmail"];
					$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
					$mail->Subject = "Te envio esta tarjeta de saludo";
					$mail->IsHTML(true);
					$mail->AddAddress($correo);
				$videomail  = "http://".$nombreurl."/tarjeta_saludo.php?video=".$nom_vid."&tc=".$correo; 

				$body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
				$body .= "<html xmlns='http://www.w3.org/1999/xhtml'><head>";
				$body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				$body .= "<title>Video Saludo - Club America</title><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
				$body .= "<style type='text/css'>";
				$body .= ".fuente_google {	font-family: Tahoma, Geneva, sans-serif;	color: #FFFFFF;	font-weight: 400;	font-size: 16px;}";
				$body .= ".fuente_google2 {	font-family: Tahoma, Geneva, sans-serif;	font-size: 15px;	color: #FFFFFF;	font-weight: 700;}";
				$body .= "a:link {	color: #FFF;	text-decoration: none;}";
				$body .= "a:visited {	text-decoration: none;}";
				$body .= "a:hover {	text-decoration: none;}";
				$body .= "a:active {	text-decoration: none;}";
				$body .= "</style>";
				$body .= "</head><body>";
				$body .= "<table width='399' border='0' align='center' cellpadding='0' cellspacing='0'>  ";
				$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>". $nombre_usu."</td></tr> ";
				$body .= "<tr><td align='center'><a href='". $videomail . "' border='0'><img src='".$nombreurl."/img/vs1.jpg' width='399' height='271' /></a></td></tr>";
				$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>MIRA AQUI LA TARJETA DE SALUDO</a></span></span></td></tr>";
				$body .= "</table></body></html>";


							$mail->MsgHTML($body);
							if(!$mail->Send())
							{
								$mail->ClearAddresses();
							}else
							{
							 $mail->ClearAddresses();
							}
				}
				if ($_POST["correo2"]!="") {
					$correo=$_POST["correo2"];
					$mail->From=$row_usuario["PostEmail"];
					$mail->FromName=$nombre_usu;
					$mail->Sender=$row_usuario["PostEmail"];
					$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
					$mail->Subject = "Te envio esta tarjeta de saludo";
					$mail->IsHTML(true);
					$mail->AddAddress($correo);
				$videomail  = "http://".$nombreurl."/tarjeta_saludo.php?video=".$nom_vid."&tc=".$correo; 
				$body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
				$body .= "<html xmlns='http://www.w3.org/1999/xhtml'><head>";
				$body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				$body .= "<title>Video Saludo - Club America</title><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
				$body .= "<style type='text/css'>";
				$body .= ".fuente_google {	font-family: Tahoma, Geneva, sans-serif;	color: #FFFFFF;	font-weight: 400;	font-size: 16px;}";
				$body .= ".fuente_google2 {	font-family: Tahoma, Geneva, sans-serif;	font-size: 15px;	color: #FFFFFF;	font-weight: 700;}";
				$body .= "a:link {	color: #FFF;	text-decoration: none;}";
				$body .= "a:visited {	text-decoration: none;}";
				$body .= "a:hover {	text-decoration: none;}";
				$body .= "a:active {	text-decoration: none;}";
				$body .= "</style>";
				$body .= "</head><body>";
				$body .= "<table width='399' border='0' align='center' cellpadding='0' cellspacing='0'>  ";
				$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>". $nombre_usu."</td></tr> ";
				$body .= "<tr><td align='center'><a href='". $videomail . "' border='0'><img src='".$nombreurl."/img/vs1.jpg' width='399' height='271' /></a></td></tr>";
				$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>MIRA AQUI LA TARJETA DE SALUDO</a></span></span></td></tr>";
				$body .= "</table></body></html>";


							$mail->MsgHTML($body);
							if(!$mail->Send())
							{
								$mail->ClearAddresses();
							}else
							{
							 $mail->ClearAddresses();
							}
				}
				if ($_POST["correo3"]!="") {
					$correo=$_POST["correo3"];
					$mail->From=$row_usuario["PostEmail"];
					$mail->FromName=$nombre_usu;
					$mail->Sender=$row_usuario["PostEmail"];
					$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
					$mail->Subject = "Te envio esta tarjeta de saludo";
					$mail->IsHTML(true);
					$mail->AddAddress($correo);
				$videomail  = "http://".$nombreurl."/tarjeta_saludo.php?video=".$nom_vid."&tc=".$correo; 
				$body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
				$body .= "<html xmlns='http://www.w3.org/1999/xhtml'><head>";
				$body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				$body .= "<title>Video Saludo - Club America</title><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
				$body .= "<style type='text/css'>";
				$body .= ".fuente_google {	font-family: Tahoma, Geneva, sans-serif;	color: #FFFFFF;	font-weight: 400;	font-size: 16px;}";
				$body .= ".fuente_google2 {	font-family: Tahoma, Geneva, sans-serif;	font-size: 15px;	color: #FFFFFF;	font-weight: 700;}";
				$body .= "a:link {	color: #FFF;	text-decoration: none;}";
				$body .= "a:visited {	text-decoration: none;}";
				$body .= "a:hover {	text-decoration: none;}";
				$body .= "a:active {	text-decoration: none;}";
				$body .= "</style>";
				$body .= "</head><body>";
				$body .= "<table width='399' border='0' align='center' cellpadding='0' cellspacing='0'>  ";
				$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>". $nombre_usu."</td></tr> ";
				$body .= "<tr><td align='center'><a href='". $videomail . "' border='0'><img src='".$nombreurl."/img/vs1.jpg' width='399' height='271' /></a></td></tr>";
				$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>MIRA AQUI LA TARJETA DE SALUDO</a></span></span></td></tr>";
				$body .= "</table></body></html>";


							$mail->MsgHTML($body);
							if(!$mail->Send())
							{
								$mail->ClearAddresses();
							}else
							{
							 $mail->ClearAddresses();
							}
				}
				if ($_POST["correo4"]!="") {
					$correo=$_POST["correo4"];
					$mail->From=$row_usuario["PostEmail"];
					$mail->FromName=$nombre_usu;
					$mail->Sender=$row_usuario["PostEmail"];
					$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
					$mail->Subject = "Te envio esta tarjeta de saludo";
					$mail->IsHTML(true);
					$mail->AddAddress($correo);
				$videomail  = "http://".$nombreurl."/tarjeta_saludo.php?video=".$nom_vid."&tc=".$correo; 
				$body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
				$body .= "<html xmlns='http://www.w3.org/1999/xhtml'><head>";
				$body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				$body .= "<title>Video Saludo - Club America</title><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
				$body .= "<style type='text/css'>";
				$body .= ".fuente_google {	font-family: Tahoma, Geneva, sans-serif;	color: #FFFFFF;	font-weight: 400;	font-size: 16px;}";
				$body .= ".fuente_google2 {	font-family: Tahoma, Geneva, sans-serif;	font-size: 15px;	color: #FFFFFF;	font-weight: 700;}";
				$body .= "a:link {	color: #FFF;	text-decoration: none;}";
				$body .= "a:visited {	text-decoration: none;}";
				$body .= "a:hover {	text-decoration: none;}";
				$body .= "a:active {	text-decoration: none;}";
				$body .= "</style>";
				$body .= "</head><body>";
				$body .= "<table width='399' border='0' align='center' cellpadding='0' cellspacing='0'>  ";
				$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>". $nombre_usu."</td></tr> ";
				$body .= "<tr><td align='center'><a href='". $videomail . "' border='0'><img src='".$nombreurl."/img/vs1.jpg' width='399' height='271' /></a></td></tr>";
				$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>MIRA AQUI LA TARJETA DE SALUDO</a></span></span></td></tr>";
				$body .= "</table></body></html>";


							$mail->MsgHTML($body);
							if(!$mail->Send())
							{
								$mail->ClearAddresses();
							}else
							{
							 $mail->ClearAddresses();
							}
				}
				if ($_POST["correo5"]!="") {
					$correo=$_POST["correo5"];
					$mail->From=$row_usuario["PostEmail"];
					$mail->FromName=$nombre_usu;
					$mail->Sender=$row_usuario["PostEmail"];
					$mail->AddReplyTo($row_usuario["PostEmail"], "Responde a este mail");
					$mail->Subject = "Te envio esta tarjeta de saludo";
					$mail->IsHTML(true);
					$mail->AddAddress($correo);
				$videomail  = "http://".$nombreurl."/tarjeta_saludo.php?video=".$nom_vid."&tc=".$correo; 
				$body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
				$body .= "<html xmlns='http://www.w3.org/1999/xhtml'><head>";
				$body .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				$body .= "<title>Video Saludo - Club America</title><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
				$body .= "<style type='text/css'>";
				$body .= ".fuente_google {	font-family: Tahoma, Geneva, sans-serif;	color: #FFFFFF;	font-weight: 400;	font-size: 16px;}";
				$body .= ".fuente_google2 {	font-family: Tahoma, Geneva, sans-serif;	font-size: 15px;	color: #FFFFFF;	font-weight: 700;}";
				$body .= "a:link {	color: #FFF;	text-decoration: none;}";
				$body .= "a:visited {	text-decoration: none;}";
				$body .= "a:hover {	text-decoration: none;}";
				$body .= "a:active {	text-decoration: none;}";
				$body .= "</style>";
				$body .= "</head><body>";
				$body .= "<table width='399' border='0' align='center' cellpadding='0' cellspacing='0'>  ";
				$body .= "<tr><td height='50' align='center' bgcolor='#A141BF' class='fuente_google'>". $nombre_usu."</td></tr> ";
				$body .= "<tr><td align='center'><a href='". $videomail . "' border='0'><img src='".$nombreurl."/img/vs1.jpg' width='399' height='271' /></a></td></tr>";
				$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>MIRA AQUI LA TARJETA DE SALUDO</a></span></span></td></tr>";
				$body .= "</table></body></html>";


							$mail->MsgHTML($body);
							if(!$mail->Send())
							{
								$mail->ClearAddresses();
							}else
							{
							 $mail->ClearAddresses();
							}
				}

$upd = "Update tarjetas_saludos set enviado=enviado +1 where nombre='" . $_POST["nombre"] . "' and motivo='".$_POST["motivo"]."'";
$result = mysql_query($upd, $dbCasting);
?>
                            	<div class="salud_combinado">
                                	<h2 class="span12">TARJETA DE SALUDO SE ENVIO CON EXITO</h2>

                                </div>
<?
}else{
?>
                            	<div class="salud_combinado">
                                	<h2 class="span12">DEBES INGRESAR AL MENOS UN CORREO DE DESTINO</h2>

                                </div>
<?
}
 
	

  
  ?>




                                </div>

<div class="cont_slider">


				<div class="cont_btn"><a href="saludos.php" >ENVIA OTRO SALUDO</a></div>
	   

</div>
</center>
</div></div></div></div>
     <!-- SALUDOS VIRTUALES --->




		<!-- SLIDER -->
 


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
