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
                        	<div class="cont_saludos_v box">
                            	<div class="salud_combinado">
                                	<h2 class="span12">VIDEO SALUDO COMBINADO</h2>
                                   	<!--select class="span12" name="">
                                   	  <option value="Nicola Porcella">Nicola Porcella</option>
                                   	</select--> 
                                </div>
                               <FORM action="combinado1.php" method="post"  data-ajax="false"  >
                              		<div class="combina_frases">
                                	<h3>1. Combina las frases de tu personaje</h3>
                                    <div class="cont_combina_f">
                                    	<div class="span12">
                                        	<img src="../imagesVS/<?=$_GET["foto"]?>"/>
                                        </div>
                                   	  <div class="span12 combos_sv">
                                            <div class="cont_combos_sv">




                                                <select class="span22" name="video1">
                                                  <option value="Selecciona tu saludo de entrada">Selecciona tu saludo de entrada</option>
 <?
$sql_vs="Select * from videos_saludos where codigo='".$_GET["codigo"]."'  and tipo='1'  order by glosa desc";
  	  $c=0;
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{
   
	  $glosa1=$row['glosa'];
	  $video1=$row['cero'];	  
		 ?>
      <option value='<?=$video1?>'>&nbsp;&nbsp;<?=$glosa1?></option>
<?}?>      
                                              </select>
                                               <span class="span2">*</span>
                                            </div>

                                        	<div class="cont_combos_sv">
                                              <select class="span22" name="video2">
                                        	 		 <option value="Selecciona tu broma">Selecciona tu broma</option>
                                                  
 <?
$sql_vs="Select * from videos_saludos where codigo='".$_GET["codigo"]."'  and tipo='2'  order by glosa desc";
  	  $c=0;
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{
   
	  $glosa1=$row['glosa'];
	  $video1=$row['cero'];	  
		 ?>
      <option value='<?=$video1?>'>&nbsp;&nbsp;<?=$glosa1?></option>
<?}?>      

                                              </select>
                                              <span class="span2">*</span>
                                            </div>
                                            <div class="cont_combos_sv">
                                              <select class="span22" name="video3">
                                        		  <option value="Elige tu invitación">Elige tu invitación</option>
 <?
$sql_vs="Select * from videos_saludos where codigo='".$_GET["codigo"]."'  and tipo='3'  order by glosa desc";
  	  $c=0;
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{
   
	  $glosa1=$row['glosa'];
	  $video1=$row['cero'];	  
		 ?>
      <option value='<?=$video1?>'>&nbsp;&nbsp;<?=$glosa1?></option>
<?}?>    
                                              </select>
                                              <span class="span2">*</span>
                                           </div>
                                           <div class="cont_combos_sv">
                                                 <select class="span22" name="video4">
                                                  <option value="Elige la despedida">Elige la despedida</option>
 <?
$sql_vs="Select * from videos_saludos where codigo='".$_GET["codigo"]."'  and tipo='4'  order by glosa desc";
  	  $c=0;
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{
   
	  $glosa1=$row['glosa'];
	  $video1=$row['cero'];	  
		 ?>
      <option value='<?=$video1?>'>&nbsp;&nbsp;<?=$glosa1?></option>
<?}?>    
                                              </select>
                                              <span class="span2">*</span>
                                           </div>
                                           <h4>* Campos Obligatorios</h4>

                                      </div>
                                   <div class="cont_btn"><input name="ENVIAR" type="submit" value="CONTINUAR" id="ENVIAR"></div>
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
