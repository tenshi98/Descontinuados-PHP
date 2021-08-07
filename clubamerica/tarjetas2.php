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
                            	<div class="salud_combinado"><h2 class="span14">TARJETAS CON VIDEO SALUDOS</h2></div>
<form name="formulario" action="tarjetas3.php"  method="post">
<input type="hidden" name="nombre" value="<?=$_GET["codigo"]?>">
<input type="hidden" name="motivo" value="<?=$_GET["motivo"]?>">
                              		<div class="cont_sorteos_semana tab_salu_v">
                                       <div class="sort_semana">
                                			<div class="ingre_destinatarios marb20">
                                    			<h3>2. Selecciona una canción de fondo para tu tarjeta</h3>
													<div class="select_cancion">
                                        				<div class="span12">

																<?
																$i=0;
																$directorio = opendir("./imagesVS/".$_GET["motivo"]); //ruta actual
																while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
																{
																	if (is_dir($archivo))//verificamos si es o no un directorio
																	{  
																	//NADA
																	}else{
																$i=$i+1;
																		$arreglo_musical[$i]= $archivo;
																		
																}}?>
																<select name="musica">
																<?
																for ($x=0;$x<$i; $x++) {
																	$paso=$arreglo_musical[$x];
																		list($nombre_musica, $extension) =    explode('.', $paso);
																		$nombre_musica_ver= str_replace('_', ' ', $nombre_musica).'<br>'; 
																		$nombre_musica_ver= str_replace('-', ' ', $nombre_musica_ver).'<br>'; 
																		if ($extension=="MP3" or $extension=="mp3" or $extension=="mid" or $extension=="MID") {?>
																		<option value="<?php echo $paso;?>"><?php echo $nombre_musica_ver;?></option>
																		<?}
																}
																	?>
																</select>
														</div>
                                        				<div class="span12 contrl_dow">
															<div class="contrls">
																<input class="play_dw" name="" type="button" onclick="cambia_musica()">
																<!--input class="stop_dw" name="" type="button"-->
<script> 
function cambia_musica(){
	var Componente
	Componente = document.formulario.musica[document.formulario.musica.selectedIndex].value

		Shadowbox.open({
        content:    'ver_tarjeta.php?musica='+Componente+'&nombre=<?=$_GET["codigo"]?>&tarjeta=<?=$_GET["motivo"]?>',
        player:     "iframe",
        title:      "Preview",
        height:     480,
        width:      640
				});
	
}
</script>      

															</div>
														</div>
													</div>
												</div>
                              		<div class="ingre_destinatarios">
                                    	<h3>3. Ingresa Destinatarios</h3>
                                        <div class="cont_destinatarios">
                                        	<div class="item_destinatario">
                                            	<div class="span6">Correo destino 1:</div>
                                        		<div class="span18"><input name="correo1" type="text"></div>
                                                <span class="oblig">(Obligatorio)</span>
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
                                            	<div class="span6">Asunto:</div>
                                        		<div class="span18"><input name="asunto" type="text"></div>
                                            </div>
                                             <div class="item_destinatario">
                                            	<div class="span6">Mensaje:</div>
                                        		<div class="span18"><textarea name="mensaje" cols="" rows=""></textarea></div>
                                            </div>
                                        </div>
                                    </div>

</form>  
                                
                            	
										<div class="cont_botonesg_videos">
                                         <div class="span10">
                                         	<input name="VOLVER" type="button" value="VOLVER" id="VOLVER">
                                         </div>
                                         <div class="span14">
                                         	<input name="ENVIAR" type="submit" value="CONTINUAR" id="CONTINUAR">
                                         </div>
                                         </div>
                            </div></div></div></div>                            
                   
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
