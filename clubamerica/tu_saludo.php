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
                                	<h2 class="span12">De, <?echo $row_saludo["nombre"]?> <?echo $row_saludo["apellido"]?>.</h2>

                                </div>
<center>

<div class="cont_slider">
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="407" height="306"/>
             <param name="allowScriptAccess" value="sameDomain" />			<?$Infor="peliculas/saludos_p.swf?video1=http://www.naturalphone.cl/videosaludos/".$row_saludo["sal01"]."&video2=http://www.naturalphone.cl/videosaludos/".$row_saludo["sal02"]."&video3=http://www.naturalphone.cl/videosaludos/".$row_saludo["sal03"]."&video4=http://www.naturalphone.cl/videosaludos/".$row_saludo["sal04"];?>
			<param name='movie' value='<?=$Infor?>' />
			<param name="quality" value="High" />
    	    <param name=wmode value=transparent>
			<embed src='<?=$Infor?>' quality='high'  width='405' height='340' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			</embed>
			<param name="movie">
			</object>
				<div class="cont_btn"><a href="saludos.php" >ENVIA TUS PROPIOS SALUDOS COMBINADOS</a></div>
	   

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
