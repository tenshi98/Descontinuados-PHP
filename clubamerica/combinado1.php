<?php session_start();




    // BOTON FLOTANTE --->
        require_once('inc/head.php');         
     // BOTON FLOTANTE --->
?>

<body class="participa"  >
<?php 
if(!isset($_COOKIE['sess_demo'])){ 
		header( 'Location: registro_inicio_sesion.php?contacto='.$nombre_programa );
		die;
}?>
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



<?
if ($_POST["ENVIAR"]=="ENVIAR SALUDO VIRTUAL") {
if ($_POST["correo1"]!='' or $_POST["correo2"]!='' or $_POST["correo3"]!='' or $_POST["correo4"]!='' or $_POST["correo5"]!='') {
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
//$armado=rand(1,1000);
$armado=substr(md5(uniqid(rand())),0,8);
$nom_vid = "saludo" . $armado;
$upd = "insert into saludos(id_correo,micorreo,Nombre,Apellido,fecha_video,hora_video,sal01,sal02,sal03,sal04,tusal,tudes,correo1,correo2,mensaje,leido,estado,asunto) values ('" . $nom_vid . "','" . $row_usuario["PostEmail"] . "','" . $row_usuario["PostNombres"] . "','" . $row_usuario["PostApellPapa"] . "','" . $fecha . "','" . $hora . "','" . $_POST["video1"] . "','" . $_POST["video2"] . "','" . $_POST["video3"] . "','" . $_POST["video4"] . "','','','" . $_POST["correo1"] . "','" . $_POST["correo2"] . "','" . $_POST["mensaje"] . "',0,0,'')";
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
	$mail->Subject = "Te envio este saludo";
	$mail->IsHTML(true);
	$mail->AddAddress($correo);
$videomail  = "http://".$nombreurl."/tu_saludo.php?video=".$nom_vid."&tc=".$correo; 

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
$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>VER EL VIDEO</a></span></span></td></tr>";
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
	$mail->Subject = "Te envio este saludo";
	$mail->IsHTML(true);
	$mail->AddAddress($correo);
$videomail  = "http://".$nombreurl."/tu_saludo.php?video=".$nom_vid."&tc=".$correo; 
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
$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>VER EL VIDEO</a></span></span></td></tr>";
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
	$mail->Subject = "Te envio este saludo";
	$mail->IsHTML(true);
	$mail->AddAddress($correo);
$videomail  = "http://".$nombreurl."/tu_saludo.php?video=".$nom_vid."&tc=".$correo; 
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
$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>VER EL VIDEO</a></span></span></td></tr>";
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
	$mail->Subject = "Te envio este saludo";
	$mail->IsHTML(true);
	$mail->AddAddress($correo);
$videomail  = "http://".$nombreurl."/tu_saludo.php?video=".$nom_vid."&tc=".$correo; 
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
$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>VER EL VIDEO</a></span></span></td></tr>";
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
	$mail->Subject = "Te envio este saludo";
	$mail->IsHTML(true);
	$mail->AddAddress($correo);
$videomail  = "http://".$nombreurl."/tu_saludo.php?video=".$nom_vid."&tc=".$correo; 
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
$body .= "<tr><td height='50' align='center' bgcolor='#2A4055'><span class='fuente_google'><span class='fuente_google2'><a href='". $videomail . "'>VER EL VIDEO</a></span></span></td></tr>";
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
$upd = "Update videos_saludos set enviado=enviado +1 where cero='" . $_POST["video1"] . "'";
$result = mysql_query($upd, $dbCasting);	
$upd = "Update videos_saludos set enviado=enviado +1 where cero='" . $_POST["video2"] . "'";
$result = mysql_query($upd, $dbCasting);
$upd = "Update videos_saludos set enviado=enviado +1 where cero='" . $_POST["video3"] . "'";
$result = mysql_query($upd, $dbCasting);
$upd = "Update videos_saludos set enviado=enviado +1 where cero='" . $_POST["video4"] . "'";
$result = mysql_query($upd, $dbCasting);
  
  ?>
                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
                        	<div class="cont_saludos_v box">
                            	<div class="salud_combinado">
                                	<h2 class="span12">VIDEO SALUDO COMBINADO SE ENVIO CON EXITO</h2>

                                </div>
                              		<div class="combina_frases">
                                	<h3>2. Previsualiza tu saludo</h3>
                                    <div class="cont_combina_f">
                                    	<div class="span12">
<?}else{         ?>       <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
                        	<div class="cont_saludos_v box">
                            	<div class="salud_combinado">
                                	<h2 class="span12">DEBES INGRESAR AL MENOS UN CORREO DE DESTINO</h2>

                                </div>
                              		<div class="combina_frases">
                                	<h3>2. Previsualiza tu saludo</h3>
                                    <div class="cont_combina_f">
                                    	<div class="span12">

<?	}							
}else{?>
                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
                        	<div class="cont_saludos_v box">
                            	<div class="salud_combinado">
                                	<h2 class="span12">VIDEO SALUDO COMBINADO</h2>

                                </div>
                              		<div class="combina_frases">
                                	<h3>2. Previsualiza tu saludo</h3>
                                    <div class="cont_combina_f">
                                    	<div class="span12">
<?}?>

<FORM  method="post"  data-ajax="false"> 
<input type="hidden" name="video1" value="<?=$_POST["video1"]?>">
<input type="hidden" name="video2" value="<?=$_POST["video2"]?>">
<input type="hidden" name="video3" value="<?=$_POST["video3"]?>">
<input type="hidden" name="video4" value="<?=$_POST["video4"]?>">

<? if  ($_POST["video1"]!="Selecciona tu saludo de entrada" and $_POST["video2"]!="Selecciona tu broma" and $_POST["video3"]!="Elige tu invitación" and $_POST["video4"]!="Elige la despedida")     {?>
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="407" height="306"/>
             <param name="allowScriptAccess" value="sameDomain" />			<?$Infor="peliculas/saludos_p.swf?video1=http://www.naturalphone.cl/videosaludos/".$_POST["video1"]."&video2=http://www.naturalphone.cl/videosaludos/".$_POST["video2"]."&video3=http://www.naturalphone.cl/videosaludos/".$_POST["video3"]."&video4=http://www.naturalphone.cl/videosaludos/".$_POST["video4"];?>
			<param name='movie' value='<?=$Infor?>' />
			<param name="quality" value="High" />
    	    <param name=wmode value=transparent>
			<embed src='<?=$Infor?>' quality='high'  width='405' height='340' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			</embed>
			<param name="movie">
			</object>
				<div class="cont_btn"><a href="javascript:history.back(1)" >SELECCIONAR NUEVA COMBINACION</a></div>
<?}else{?>
			<div class="cont_btn"><a href="javascript:history.back(1)" >NO HAS COMPLETADO LA SELECCION DE LOS VIDEOS, VOLVER</a></div>
<?}?>

                                        </div>
                                      </div>
                                    </div>
                              		<div class="ingre_destinatarios">
                                    	<h3>3. Ingresa Destinatarios</h3>
                                        <div class="cont_destinatarios">
                                        	<div class="item_destinatario">
                                            	<div class="span6">Correo destino 1:</div>
                                        		<div class="span18"><input name="correo1" type="text"></div>
                                            </div>
                                            <div class="item_destinatario">
                                            	<div class="span6">Correo destino 2:</div>
                                        		<div class="span18"><input name="correo2" type="text"></div>
                                            </div>
                                            <div class="item_destinatario">
                                            	<div class="span6">Correo destino 3:</div>
                                        		<div class="span18"><input name="correo3" type="text"></div>
                                            </div>
                                            <div class="item_destinatario">
                                            	<div class="span6">Correo destino 4:</div>
                                        		<div class="span18"><input name="correo4" type="text"></div>
                                            </div>
                                            <div class="item_destinatario">
                                            	<div class="span6">Correo destino 5:</div>
                                        		<div class="span18"><input name="correo5" type="text"></div>
                                            </div>
                                             <div class="item_destinatario">
                                            	<div class="span6">Mensaje:</div>
                                        		<div class="span18">
                                                	<textarea name="mensaje" cols="" rows=""></textarea>
                                                </div>
                                            </div>
                                             <div class="item_destinatario">
                                            	<div class="span6">&nbsp;</div>
                                        		<div class="span18 cont_btn_r">
                                                	<input name="ENVIAR" type="submit" value="ENVIAR SALUDO VIRTUAL" id="ENVIAR">
                                                	
                                                </div>
                                            </div>
                                        	
                                        
                                        </div>
                                    
                                    </div>
</form>  
                                
                            	
                            </div>
                            
                            
                            
                            
                            
                        	
                        </div>
                        <aside class="span8">
                        	
                         
<?   
        require_once('inc/publicidad_derecha.php');         
?> 
 <?   
        require_once('inc/gana_derecha.php');         
?> 
                                  

                          		<!-- VIDEO CHAT -->                         
<?   
    // MENU NAVEGACION --->
        require_once('inc/video_chat.php');         
     // MENU NAVEGACION --->
?>        

		<!-- VIDEO CHAT --> 
                            
                        </aside>
                    </div>
                	
                </div>
              	
                </div>
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
