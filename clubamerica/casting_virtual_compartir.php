<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->

	 
if ( !empty($_GET["video"]) ) {

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

}
?>
<script type="text/javascript" src="tabs/tabber.js"></script>

<link rel="stylesheet" href="tabs/tabs.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="css/tabs2.css" TYPE="text/css" MEDIA="screen">
<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>

<body>

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
                 <div class="wrapper_b">
                 		<div class="wrapper_casting">
                         	<ul class="tab_prin">
                        		<li  ><a href="casting_virtual_inicio.php">HOME</a></li>
                        		<li ><a href="casting_virtual_book.php">BOOK</a></li>
                        		<li ><a href="casting_virtual_vpresentacion.php">VIDEO PRESENTACIÓN</a></li>
                        		<li class="active_tab"><a href="casting_virtual_compartir.php">COMPARTE TUS VIDEOS</a></li>
                        	</ul>
                            <div class="cont_casting">
                            	<div class="casting_16 span16 compartir_v">
                                	 <div class="cont_video_perfil">
                                     		<h3>Tus videos de presentación</h3>
                                          <h4> Se compartirán los videos que estén seleccionados</h4>
<form method="post" name="listFiles" id="listFiles" action="envia_casting.php">


                                     		<div class="cont_share_video">
											<? if ($row_usuario['PostFoto1']!="") {?>
                                            	<div class="item_share_v">
                                                	<div class="cont_check span2">
													<? if ($row_usuario['estadovideo1']==1) {?>
														<input name="video" type="radio" value="<?=$row_usuario['PostFoto1']?>">
													<?}?>
													</div>
                                                    <figcaption class="span9">
													<a href="ver_video.php?correo=<?=$row_usuario['PostFoto1']?>" rel=shadowbox;width=640;height=360>
													<img src="fotos/<?php echo $row_usuario['PostFoto1'];?>.jpg"/>
													<span class="ico_play"> </span></a></figcaption>
                                                	<div class="preview_v span12"><a href="ver_video.php?correo=<?=$row_usuario['PostFoto1']?>" rel=shadowbox;width=640;height=360>
													<input name="" type="button"></a></div>
                                                </div>
												<?}?>
											<? if ($row_usuario['PostFoto2']!="") {?>
												<div class="item_share_v">
                                                	<div class="cont_check span2">
													<? if ($row_usuario['estadovideo2']==1) {?>
														<input name="video" type="radio" value="<?=$row_usuario['PostFoto2']?>">
													<?}?>
													</div>
                                                    <figcaption class="span9">
													<a href="ver_video.php?correo=<?=$row_usuario['PostFoto2']?>" rel=shadowbox;width=640;height=360>
													<img src="fotos/<?php echo $row_usuario['PostFoto2'];?>.jpg"/>
													<span class="ico_play"> </span></a></figcaption>
                                                	<div class="preview_v span12"><a href="ver_video.php?correo=<?=$row_usuario['PostFoto2']?>" rel=shadowbox;width=640;height=360>
													<input name="" type="button"></a></div>
                                                </div>
												<?}?>
											<? if ($row_usuario['PostFoto3']!="") {?>
												<div class="item_share_v">
                                                	<div class="cont_check span2">													
													<? if ($row_usuario['estadovideo3']==1) {?>
														<input name="video" type="radio" value="<?=$row_usuario['PostFoto3']?>">
													<?}?>
													</div>
                                                    <figcaption class="span9">
													<a href="ver_video.php?correo=<?=$row_usuario['PostFoto3']?>" rel=shadowbox;width=640;height=360>
													<img src="fotos/<?php echo $row_usuario['PostFoto3'];?>.jpg"/>
													<span class="ico_play"> </span></a></figcaption>
                                                	<div class="preview_v span12">
													<a href="ver_video.php?correo=<?=$row_usuario['PostFoto3']?>" rel=shadowbox;width=640;height=360>
													<input name="" type="button"></a></div>
                                                </div>
												<?}?>											
                                            </div>
                                    </div>

									<div class="cont_video_perfil enviar_a">
                                     		<h3>Enviar a un amigo</h3>
                                       <div class="cont_send_video">
                                            	<div class="send_video">
                                                	<span class="span6">
                                                    	E-mail de destino:
                                                    </span>
                                                    <span class="span18">
                                                    	<input name="correo" type="text">
                                                    </span>
                                                </div>
                                                <div class="send_video">
                                                	<span class="span6">
                                                    	Nombre de destinatario:
                                                    </span>
                                                    <span class="span18">
                                                    	<input name="nombre" type="text">
                                                    </span>
                                                </div>
                                         </div>
                                   </div>


 <script>
  function checkAll(formId, cName)
  {
         for (i=0,n=formId.elements.length;i<n;i++)
         {
    if (formId.elements[i].className.indexOf(cName) !=-1)
    {
         if( formId.elements[i].checked == true )
      formId.elements[i].checked = false;
         }else{
      formId.elements[i].checked = true;


document.f1.elements[i].checked=0 

    }
         }
  }

function deseleccionar_todo(){ 
   for (i=0;i<document.listFiles.elements.length;i++) 
      if(document.listFiles.elements[i].type == "checkbox")	
         document.listFiles.elements[i].checked=0 
}

   function seleccionar_todo(){ 
   for (i=0;i<document.listFiles.elements.length;i++) 
      if(document.listFiles.elements[i].type == "checkbox")	
         document.listFiles.elements[i].checked=1 
} 

  </script>

<!--  CORREOS -->


                                     <div class="video_talento tus_contactos ">
                                     	<h3>Tus contactos</h3>

<? 
$sql  = "Select * from correos where usuario='" . $row_usuario["PostEmail"] . "'";
$res=mysql_query($sql,$dbCasting); 
$numeroamigos=mysql_num_rows($res); 
if ($numeroamigos==0) {?>

			<span class="goole_1_rojo"> Usted no tiene contactos a quien enviar este Video mail. </span>
<h4><a href="trans/index.php" rel="shadowbox;width=700;height=600">Importar Contactos</a></h4>
<?}else{?>
<div class="selc_datos">
										
<h4><a href="javascript:seleccionar_todo()">Seleccionar Todos</a> | <a href="javascript:deseleccionar_todo()">Marcar Ninguno</a> </h4><br>
<h4><a href="trans/index.php" rel="shadowbox;width=700;height=600">Importar Contactos</a></h4></div>

<div class="cont_video_talento" style="overflow-y: scroll; overflow-x: hidden; height: 600px; padding-right: 5px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?$contador=0;
	$letrab="";
$sql  = "Select * from correos where usuario='" . $row_usuario["PostEmail"] . "' and estado='1' order by destino asc";
$res=mysql_query($sql,$dbCasting); 
while($fila_correo=mysql_fetch_array($res)) {
$contador=$contador+1;
$destino=$fila_correo["destino"];
$id=$fila_correo["id_correo"];
$letra=strtoupper(substr($destino,0,1));
if ($letra<>$letrab) {
$letrab=$letra;
$contador=1;
?>
<tr><td align=left><br><h2><?=$letra?></h2><br></td></tr>
<?}
 
if ($contador==1) {?>
<tr>
<?}?>
<td align=left >
<input type="checkbox"  name="formId" value="<?=$destino?>" /><?=$destino?></span><br />
</td>
<?if ($contador==3) {
$contador=0; ?>
</tr>
<? }
}?>
</table>


 </div>
 
 <br><br>
<div class="cont_btn"><input name="ENVIAR" type="submit" value="ENVIAR" id="ENVIAR"></div>
</form>
<div class="clear"></div>


<?}?>
  

<!--  CORREOS -->


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
                 	
                 
                
                
            <!-- FOOTER -->	

<?   
    // MENU NAVEGACION --->
        require_once('inc/footer.php');         
     // MENU NAVEGACION --->
?>



<!-- FOOTER -->	
            </div>
    		
    
    </section>



</body></html>