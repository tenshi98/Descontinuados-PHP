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
<?
$sql_video="Select * from videos_correos where nombre_video='".$_GET["video"]."'";
$result = mysql_query($sql_video,$dbCasting);
while($row_video=mysql_fetch_array($result))
{?>
<h2 class="span12">De, <?echo $row_video["nombre"]?> <?echo $row_video["apellido"]?>.</h2><br><br>
<h2 class="span12">&nbsp;&nbsp;&nbsp;&nbsp;<?echo $row_video["mensaje"]?>.</h2><br><br><br>

<?
$sql_vs="Select foto from tarjetas_saludos where nombre='".$row_video["artista"]."' and motivo='".$row_video["motivo"]."'";
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{

?>
<audio source src="./imagesVS/<?=$row_video["motivo"]?>/<?=$row_video["musica"]?>" autoplay>      </audio>




  <TABLE width=600 height=450 background="./imagesVS/<?=$row_video["motivo"]?>/<?=$row["foto"]?>" >
  <TR>
  	<TD>&nbsp;</TD>
  </TR>
  </TABLE>
<?

}
}
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
?>
                                </div>
<center>
<?$Infor="peliculas/saludos_p.swf?video1=".$datos.$_GET["video"].".flv";?>
<div class="cont_slider">
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="407" height="306"/>
             <param name="allowScriptAccess" value="sameDomain" />			
			<param name='movie' value='<?=$Infor?>' />
			<param name="quality" value="High" />
    	    <param name=wmode value=transparent>
			<embed src='<?=$Infor?>' quality='high'  width='405' height='340' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			</embed>
			<param name="movie">
			</object>
				<div class="cont_btn"><a href="saludos.php" >ENVIA TUS PROPIOS SALUDOS</a></div>
	   

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
