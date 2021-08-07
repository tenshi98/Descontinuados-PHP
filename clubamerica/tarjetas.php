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


<!-- SALUDOS VIRTUALES/CASTING -->  


<?
$sql_vs="Select nombre,codigo,foto,enviado from videos_saludos where estado='1' and tipo=1 group by nombre,codigo,foto order by enviado desc";

$result = mysql_query($sql_vs,$dbCasting);
$cuatro_mas=mysql_fetch_array($result)
?>
                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
                        	<div class="cont_slider saludos_v">
                            	<h3>El más popular</h3>
                            
                            	<div class="slider_item">
                                	<figcaption class="chat_live">
                                    	<a href=""><img src="../imagesVS/<?=$cuatro_mas["foto"]?>"></a>
                                            
                                        </figcaption>
                                            
                                    
                                	<h2><a href="">Envía tus saludos a todos tus amigos</a></h2>
                                    
                                
                               <ul class="social_vch">
                               	<li><a href=""></a></li>
                               	<li class="tw_vch"><a href=""></a></li>
                               </ul>
                               
                                <ul class="balls">
                                	<li class="active_b"><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                </ul>
                                </div>
                             	
                            
                            </div>
                            
                            <div class="cont_sorteos_semana tab_salu_v">
                                    	<h2 class="head_h2">TARJETAS CON VIDEO SALUDOS</h2>
                                       <div class="sort_semana">
                                       		<ul class="princ_sem">
                                       			<li ><a href="saludos.php">COMBINADOS</a></li>
                                                <li class="active"><a href="tarjetas.php">EN TARJETAS</a></li>
                                                
                                       		</ul>
                                            <div class="list_sorteo">
                                            	<div class="selec_personaje">
                                                	<h3>Selecciona personaje</h3>
                                                	
                                                </div>
                                            
                                            
                                            	<ul class="bloq_sorteo">

<?
$sql_vs="Select nombre,foto,enviado,estado from personajes_tarjetas where estado='1' order by enviado desc";
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{
	 				$nombre=$row['nombre'];
	  				$codigo=trim($row['codigo']);
	  				$foto_vs=$row['foto'];	
						$sql_vs1="Select sum(enviado) as enviado from personajes_tarjetas where estado='1' and nombre='".$nombre."'";

						$result1 = mysql_query($sql_vs1,$dbCasting);
						$row1=mysql_fetch_array($result1);
						$enviado=$row1['enviado']/4;	 
				 if ($nombre!="") {
				 			$c=$c+1;
				 			$van=1;?>
                                                  <li class="span8">
                                                    	<figcaption>
                                                            <a href="tarjetas1.php?codigo=<?=$nombre?>">
                                                                <img src="../imagesVS/<?=$foto_vs?>">
                                                            </a>
                                                        </figcaption>
                                                            <h2><a href="tarjetas1.php?codigo=<?=$nombre?>"><?=$nombre?></a></h2>
                                                            <h4> <span></span><?echo $enviado;?></h4>
                                                  </li>
<?}

if ($c==3) {
	  				$c=0;?>
	  				</ul>
	  				
	  				<ul class="bloq_sorteo">
	  			<?}


}?>                                                 

                                            	
                                           

                                            </div>
                                       
                                       </div>
                                    </div>
                            
                            
                            
                            
                            
                        	
                        </div>

<!-- SALUDOS VIRTUALES/CASTING -->  
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
