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

                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
                        	<div class="cont_saludos_v box vtarjetas">
                            	<div class="salud_combinado">
                                	<h2 class="span14">TARJETAS CON VIDEO SALUDOS</h2>
                                   	<select class="span10" name="">
                                   	  <option value="Tarjeta Simple">Tarjeta Simple</option>
                                    </select> 
                                </div>

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

$num_caracteres = "10"; //cantidad de caracteres de la clave
$codigo_tarjeta = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
$Infor="peliculas/grabador_tarjeta.swf?mi_var=" . $directorio. "&id=" . $usuario . "&IP_in=" . $IPE . "&nombre_video=tarjeta_" . $codigo_tarjeta;
?>
<form action="envia_tarjeta.php" method="post" name="formulario">
<input type="hidden" name="correo1" value="<?=$_POST["correo1"]?>">
<input type="hidden" name="correo2" value="<?=$_POST["correo2"]?>">
<input type="hidden" name="correo3" value="<?=$_POST["correo3"]?>">
<input type="hidden" name="correo4" value="<?=$_POST["correo4"]?>">
<input type="hidden" name="correo5" value="<?=$_POST["correo5"]?>">
<input type="hidden" name="mensaje" value="<?=$_POST["mensaje"]?>">
<input type="hidden" name="asunto" value="<?=$_POST["asunto"]?>">
<input type="hidden" name="nombre" value="<?=$_POST["nombre"]?>">
<input type="hidden" name="musica" value="<?=$_POST["musica"]?>">
<input type="hidden" name="motivo" value="<?=$_POST["motivo"]?>">
<input type="hidden" name="nombre_video" value="tarjeta_<?=$codigo_tarjeta?>">
                              		<div class="video_talento">
                                     	<h3>4. Graba tu video con tu saludo</h3>
                                        
                                        <div class="cont_video_talento ">
                                        	<div class="name_video">
                                            	Tiempo restante <span>30 seg</span> 
                                            </div>
                                            <div class="video_p box">
                                            	<div class="span16 vp">
             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="409" id="seguridad1" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="<?=$Infor?>" />
			<param name="quality" value="High" />
    	    <param name=wmode value="transparent">
			<embed src="<?=$Infor?>" quality='high' width='550' height='409' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			<param name="movie"></object>
			<br><center><a href="ver_video.php?correo=tarjeta_<?=$codigo_tarjeta?>" rel="shadowbox;width=640;height=360"><img src="img/bot_reproduce.png" border=0/></a>
                                                </div>
                                            </div>
                                        </div>
                                     </div>

										<div class="cont_botonesg_videos">
                                         <div class="span10">
                                         	<input name="VOLVER" type="button" value="VOLVER" id="VOLVER">
                                         </div>
                                         <div class="span14">
                                         	<input name="ENVIAR" type="submit" value="ENVIAR" id="ENVIAR">
                                         </div>
                                         </div>

</form>  
                                
                            	

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
