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
$result = mysql_query("select * from parametros",$dbCasting);

while($row=mysql_fetch_array($result))
{
		  $ipe_in=$row['IP_interna'];
		  $ipe_out=$row['IP_externa'];
		  $datos=$row['donde'];
		  list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $row['IP_interna']);
		  list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $row['IP_externa']);
		  
}	

$mi_ip = $_SERVER['REMOTE_ADDR']; 
list($ip1, $ip2, $ip3, $ip4) =split( '[.]', $mi_ip);
$inicio=$ip1_in.".".$ip2_in.".".$ip3_in.".";


if ($mi_ip == "200.119.246.138")
			{
				 $IPE_ok=$ip1_in.".".$ip2_in.".".$ip3_in.".".$ip4_in;
			}
			  else
			{
	 			$IPE_ok=$ip1_out.".".$ip2_out.".".$ip3_out.".".$ip4_out;
}

$pos = strpos($_GET["video"], ".jpg");
if ($pos === false) {
	$video=$_GET["video"].".flv";
} else {
	$video=str_replace('.jpg', '.flv', $_GET["correo"]);
	
}
$video=$datos.$video;


if (substr($_GET["video"], 0,5)=="nph1_") { $usuario=str_replace('nph1_', '', $_GET["video"]);}
if (substr($_GET["video"], 0,5)=="nph2_") { $usuario=str_replace('nph2_', '', $_GET["video"]);}
if (substr($_GET["video"], 0,5)=="nph3_") { $usuario=str_replace('nph3_', '', $_GET["video"]);}

$saludo="select * from Postulante where user_atv='".$usuario."'";
$result_saludo =mysql_query($saludo,$dbCasting);
$row_saludo = mysql_fetch_assoc ($result_saludo); 
if (substr($_GET["video"], 0,5)=="nph1_") { $mi_gracia=$row_saludo["PostProfesion1"];}
if (substr($_GET["video"], 0,5)=="nph2_") { $mi_gracia=$row_saludo["PostProfesion2"];}
if (substr($_GET["video"], 0,5)=="nph3_") { $mi_gracia=$row_saludo["PostProfesion3"];}
?>     

                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">

                        	<div class="cont_saludos_v box">
                            	<div class="salud_combinado">
                                	<h2 class="span12"><?echo $row_saludo["PostNombres"]?> <?echo $row_saludo["PostApellPapa"]?>, <?echo $mi_gracia?>.</h2>

                                </div>
<center>

<div class="cont_slider">
<script type='text/javascript' src='http://<?=$nombreurl?>/jw/jwplayer.js'></script>
<div id="intro">
<div id="container">Cargando Videos...</div>
<script type="text/javascript"> 
jwplayer("container").setup
({ 
        flashplayer: "http://<?=$nombreurl?>/jw/player.swf", 
		autostart: true,
        file: "<?=$video?>",
		skin: "http://<?=$nombreurl?>/jw/glow.zip",		
								width: 620,
								height: 347,
}); 
</script> 
</div>
				<div class="cont_btn"><a href="casting_virtual_inicio.php" >CREA TU PROPIO CASTING VIRTUAL Y COMPARTELO CON TUS AMIGOS</a></div>
	   

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
