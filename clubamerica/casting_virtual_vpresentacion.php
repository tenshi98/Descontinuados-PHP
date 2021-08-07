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
                        		<li><a href="casting_virtual_book.php">BOOK</a></li>
                        		<li  class="active_tab"><a href="casting_virtual_vpresentacion.php">VIDEO PRESENTACIÓN</a></li>
                        		<li ><a href="casting_virtual_compartir.php">COMPARTE TUS VIDEOS</a></li>
                        	</ul>                            	
							<?
$result = mysql_query("select * from parametros ",$dbCasting);

while($row=mysql_fetch_array($result))
{
		  $ipe_in=$row['IP_interna'];
		  $ipe_out=$row['IP_externa'];
		  $datos=$row['donde'];
		  $directorio=$row['directorio'];
		  list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $row['IP_interna']);
		  list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $row['IP_externa']);
		  
}	

$mi_ip = $_SERVER['REMOTE_ADDR']; 
list($ip1, $ip2, $ip3, $ip4) =split( '[.]', $mi_ip);
$inicio=$ip1_in.".".$ip2_in.".".$ip3_in.".";


if ($mi_ip == "200.119.246.138" or $mi_ip == "192.168.1.25")
			{
				 $IPE=$ip1_in.".".$ip2_in.".".$ip3_in.".".$ip4_in;
			
			  }else{
			
	 			$IPE=$ip1_out.".".$ip2_out.".".$ip3_out.".".$ip4_out;
}

$Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&id=" . $usuario . "&IP_in=" . $IPE . "&nombre_video=" . $row_usuario['PostEmail'];
?>
                            <div class="cont_casting">
                            	<div class="casting_16 span16 presentacio_v">
                                	 <div class="cont_video_perfil">
                                     		<h3>Instrucciones</h3>
                                           <ul>
                                           	<li class="span6 i1">
                                            	<figcaption></figcaption>
                                                <h4>Para poder grabar tu video tienes que tener cámara web y micrófono</h4>
                                            </li>
                                           	<li class="span6 i2">
                                            	<figcaption></figcaption>
                                                <h4>Puedes grabar hasta 1 video por cada talento de un m&iacute;nimo de 10 segundos cada uno</h4>
                                            </li>
                                            <li class="span6 i3">
                                            	<figcaption></figcaption>
                                                <h4>Los videos que subas, están sujetos a una revisión antes de que puedan ser vistos por el resto de los socios</h4>
                                            </li>
                                            <li class="span6 i4">
                                            	<figcaption></figcaption>
                                                <h4>Luego de grabar el video y antes de enviarlos podrás previsualizarlos y regrabarlo si lo deseas</h4>
                                            </li>
                                           </ul>
                                     </div>
                                     <div class="video_talento">

                                     	<h3>Talento</h3>






                                        <div class="cont_video_talento ">

										<section class="tabs noti_hover noti_checked ">
       
       
        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
        <label for="tab-1" class="tab-label-1 "><i class="fa fa-inbox"><?php echo $row_usuario['PostProfesion1'];?></i></label>
        
        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
        <label for="tab-2" class="tab-label-2 "><i class="fa fa-share-square-o"><?php echo $row_usuario['PostProfesion2'];?></i></label>
        
        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
        <label for="tab-3" class="tab-label-3 "><i class="fa fa-taxi"><?php echo $row_usuario['PostProfesion3'];?></i></label>
        
     <div class="clear-shadow"></div>
  
        
        
        <div class="content ">
          
          <div class="content-1"> <?php  $Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&IP_in=" . $IPE . "&nombre_video=nph1_" . $row_usuario['PostEmail'];?>
		  
		  

             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="409" id="seguridad1" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="<?=$Infor?>" />
			<param name="quality" value="High" />
    	    <param name=wmode value="transparent">
			<embed src="<?=$Infor?>" quality='high' width='550' height='409' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			<param name="movie"></object>
 
		  <br><center><a href="ver_video.php?correo=<?=$row_usuario['PostFoto1']?>" rel="shadowbox;width=640;height=360"><img src="img/bot_reproduce.png" border=0/></a>
		  </div>
          <div class="content-2">
		  <?php $Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&IP_in=" . $IPE . "&nombre_video=nph2_" . $row_usuario['PostEmail'];?>
		  
             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="409" id="seguridad1" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="<?=$Infor?>" />
			<param name="quality" value="High" />
    	    <param name=wmode value="transparent">
			<embed src="<?=$Infor?>" quality='high' width='550' height='409' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			<param name="movie"></object>
		  
		  <br><center><a href="ver_video.php?correo=<?=$row_usuario['PostFoto2']?>" rel="shadowbox;width=640;height=360"><img src="img/bot_reproduce.png" border=0/></a>
		  </div>
          <div class="content-3"><?php $Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&IP_in=" . $IPE . "&nombre_video=nph3_" . $row_usuario['PostEmail'];?>
		  
		  
             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="409" id="seguridad1" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="<?=$Infor?>" />
			<param name="quality" value="High" />
    	    <param name=wmode value="transparent">
			<embed src="<?=$Infor?>" quality='high' width='550' height='409' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			<param name="movie"></object>
		  <br><center><a href="ver_video.php?correo=<?=$row_usuario['PostFoto3']?>" rel="shadowbox;width=640;height=360"><img src="img/bot_reproduce.png" border=0/></a>

          
        </div>
        <div class=" clear"></div>  
      
</section>


                                        	
                                        </div>
                                     </div>





                                     <div class="cont_sorteos_semana">
                                    	<h2 class="head_h2">SORTEOS DE LA SEMANA</h2>
                                       <div class="sort_semana">
                                       		 
                                            <div class="list_sorteo">
                                            	<ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 005</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>
                                                <ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>
                                            </div>
                                       
                                       </div>
                                    </div> </div>



                               
								
								
								
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