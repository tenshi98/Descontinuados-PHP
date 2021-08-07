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

                                </div>
                                                     		<div class="cont_sorteos_semana tab_salu_v">
                                    	
                                       <div class="sort_semana">
                                       		<h3>
                                            1. Selecciona el motivo de la tarjeta <span>(Obligactorio)</span>
                                            </h3>
                                            <div class="list_sorteo">
                                            	
                                            
                                            
                                            	<ul class="bloq_sorteo">
                                           		 

<?
$sql_vs="Select nombre,foto,motivo,enviado,estado from tarjetas_saludos where nombre='".$_GET["codigo"]."' order by enviado desc";
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{
	 				$nombre=$row['nombre'];
	  				$enviado=trim($row['enviado']);
	  				$motivo=trim($row['motivo']);
						  				$foto_vs=$row['foto'];	
				 if ($nombre!="") {
				 			$c=$c+1;
				 			$van=1;?>
                                                  <li class="span8">
                                                    	<figcaption>
                                                            <a href="tarjetas2.php?codigo=<?=$nombre?>&motivo=<?=$motivo?>">
                                                                <img src="../imagesVS/<?=$motivo?>/<?=$foto_vs?>">
                                                            </a>
                                                        </figcaption>
                                                            <h2><a href="tarjetas2.php?codigo=<?=$nombre?>&motivo=<?=$motivo?>"><?=$motivo?></a></h2>
                                                            <h4> <span></span><?echo $enviado;?></h4>
                                                  </li>
<?}

if ($c==3) {
	  				$c=0;?>
	  				</ul>
	  				
	  				<ul class="bloq_sorteo">
	  			<?}


}?>       
                                            	</ul>
                                           
                                            	
                                            </div>
                                       
                                       </div>
                                    </div>
                              	
                        

                               
                           
                                
                            	
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
