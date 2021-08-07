<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->

	 
if ( !empty($_POST['submit_edit']) ) {
$sql_Postulante="UPDATE Postulante set   PostProfesion1='".$_POST["PostProfesion1"]."', PostProfesion2='".$_POST["PostProfesion2"]."', PostProfesion3='".$_POST["PostProfesion3"]."', PostProduccion1='".$_POST["PostProduccion1"]."', PostProduccion2='".$_POST["PostProduccion2"]."', PostProduccion3='".$_POST["PostProduccion3"]."', PostObjetivo='".$_POST["PostObjetivo"]."',  PostActivo='1'  WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; 

$result_graba_Postulante =mysql_query($sql_Postulante,$dbCasting);
		header( 'Location: casting_virtual_inicio.php' );
		die;
}
?>
<script type="text/javascript" src="tabs/tabber.js"></script>
<link rel="stylesheet" href="tabs/tabs.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="tabs/example-print.css" TYPE="text/css" MEDIA="print">

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
<div class="cont_casting">
<div class="tabber">

     <div class="tabbertab">
<h2>HOME</h2>
				<p><div class="casting_16">
                                	<div class="slider_cast">
                                    	<figcaption>
                                            <a href="">
                                                <img src="img/temporales/img5.jpg">  <span class="ico_play"> </span>
                                            </a>
                                        </figcaption>
                                        <h2><a href="">Bienvenido al Casting Virtual de América Televisión. Entérate en qué consiste</a></h2>
                                        <ul class="balls">
                                	<li class="active_b"><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                </ul>
                                    </div>
                                    <div class="cont_sorteos_semana">
                                    	<h2 class="head_h2">SORTEOS DE LA SEMANA</h2>
                                       <div class="sort_semana">
                                       		<ul class="princ_sem">
                                       			<li class="active"><a href="">LOS MÁS VALORADOS</a></li>
                                                <li><a href="">LOS MÁS RECIENTES</a></li>
                                                <li class="bloq_search"> <input  name="" type="text" class="srch_s" value="Categorías"> <input class="btn_s" name="" type="button"> </li>
                                       		</ul>
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
                                                <ul class="bloq_sorteo">
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
                                            	<div class="cont_btn">
                                        <a href="">VER TODOS <span>»</span></a>
                                    </div>
                                            </div>
                                       
                                       </div>
                                    </div>
                                
                                </div>
                               
										 
										 
										 </p>
     </div>


     <div class="tabbertab">
<h2>BOOK</h2>
	  <p>
<form method="post" name="formulario" data-ajax="false"  >
                            	<div class="casting_16 ">
                                	 <div class="cont_book_perfil">
                                     		<h3>Mi Perfil</h3>
                                            <div class="b_perfil">
                                            	<div class="fotoperfil_d box">
                                                		  <div class="span12"><img src="<?php echo $_COOKIE['sess_demo_avatar']; ?>"/></div>
                                                    
                                                    <div class="span12">
                                                    	<div class="datos_book">
                                                        	<h3><?php echo $row_usuario["PostNombres"]?></h3>
                                                        <h4><?php echo $row_usuario["PostApellPapa"]?> <?php echo $row_usuario["PostApellMama"]?></h4>
                                                        <h5><?php echo $edad;?> años</h5>
                                                        <h5><a href=""><?php echo $row_usuario["PostEmail"]?></a></h5>
                                                        
                                                        </div>
                                                        <div class="b_cont_datos">
                                                        <h4><strong>Dirección:</strong></h4>
                                                        <h4><?php echo $row_usuario["PostDireccion"]?></h4>
                                                	</div>
                                                    <div class="datos_bloq2">
                                                    	<div class="span12">
                                                        		<div class="b_cont_datos">
                                                                    <h4><strong>Ciudad</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostCiudad"]?></h4>
                                                                </div>
                                                                <div class="b_cont_datos">
                                                                    <h4><strong>Teléfono fijo</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostFonoFijo"]?></h4>
                                                                </div>
                                                        </div>
                                                    	<div class="span12">
                                                        		<div class="b_cont_datos">
                                                                    <h4><strong>País</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostNacionalidad"]?></h4>
                                                                </div>
                                                                <div class="b_cont_datos">
                                                                    <h4><strong>Teléfono Móvil</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostFonoCel"]?></h4>
                                                                </div>
                                                        
                                                        </div>
                                                    </div>
                                               	  </div>

                                                </div>
                                                  
                                                     
                                                    
                                                    
                                                    <div class="cont_btn"><a href="">EDITAR PERFIL</a></div>
                                            </div>
                                     </div>
                                     <div class="cont_book_talento">
                                     		<h2 class="head_h2">Talento</h2>
                                            <div class="bloq_talent">
                                            	<h4>Tus 3 habilidades mas importantes en orden de prioridad</h4>
                                                <ul>
                                                    <li class="span8">1 <span>
                                                    <select name="PostProfesion1"  id="PostProfesion1" >
												<option selected="selected" value="<?=$row_usuario['PostProfesion1']?>"><?=$row_usuario['PostProfesion1']?></option>
												<?
												$sql_profesion1 = "SELECT ProfDesc FROM Profesion order by ProfDesc ASC"; 
												$result_profesion1 =mysql_query($sql_profesion1,$dbCasting);
												while ($registro_profesion1= mysql_fetch_array($result_profesion1))  {   
												?>
												<option value="<?=$registro_profesion1['ProfDesc']?>"><?=$registro_profesion1['ProfDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">2 <span>
                                                    <select name="PostProfesion2"  id="PostProfesion2" >
												<option selected="selected" value="<?=$row_usuario['PostProfesion2']?>"><?=$row_usuario['PostProfesion2']?></option>
												<?
												$sql_profesion2 = "SELECT ProfDesc FROM Profesion order by ProfDesc ASC"; 
												$result_profesion2 =mysql_query($sql_profesion2,$dbCasting);
												while ($registro_profesion2= mysql_fetch_array($result_profesion2))  {   
												?>
												<option value="<?=$registro_profesion2['ProfDesc']?>"><?=$registro_profesion2['ProfDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">3 <span>
                                                    <select name="PostProfesion3"  id="PostProfesion3" >
												<option selected="selected" value="<?=$row_usuario['PostProfesion3']?>"><?=$row_usuario['PostProfesion3']?></option>
												<?
												$sql_profesion3 = "SELECT ProfDesc FROM Profesion order by ProfDesc ASC"; 
												$result_profesion3 =mysql_query($sql_profesion3,$dbCasting);
												while ($registro_profesion3= mysql_fetch_array($result_profesion3))  {   
												?>
												<option value="<?=$registro_profesion3['ProfDesc']?>"><?=$registro_profesion3['ProfDesc']?></option>
												<?}?>
												</select></span> </li>
                                                </ul>
                                            </div>
                                            
                                            <div class="bloq_talent">
                                                 <h3>Descripción de tu perfil</h3>
                                                 <textarea name="PostObjetivo" cols="" rows=""><?php echo $row_usuario["PostObjetivo"]?></textarea>
                                            </div>
                                            <div class="bloq_talent">
                                            	<h3>Producciones de tu interés (casting)</h3>
                                            	<h4>Tus 3 habilidades mas importantes en orden de prioridad</h4>
                                                <ul>
                                                    <li class="span8">1 <span>
                                                    <select name="PostProduccion1"  id="PostProduccion1" >
												<option selected="selected" value="<?=$row_usuario['PostProduccion1']?>"><?=$row_usuario['PostProduccion1']?></option>
												<?
												$sql_produccion1 = "SELECT ProdDesc FROM Producciones order by ProdDesc ASC"; 
												$result_produccion1 =mysql_query($sql_produccion1,$dbCasting);
												while ($registro_produccion1= mysql_fetch_array($result_produccion1))  {   
												?>
												<option value="<?=$registro_produccion1['ProdDesc']?>"><?=$registro_produccion1['ProdDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">2 <span>
                                                    <select name="PostProduccion2"  id="PostProduccion2" >
												<option selected="selected" value="<?=$row_usuario['PostProduccion2']?>"><?=$row_usuario['PostProduccion2']?></option>
												<?
												$sql_produccion2 = "SELECT ProdDesc FROM Producciones order by ProdDesc ASC"; 
												$result_produccion2 =mysql_query($sql_produccion2,$dbCasting);
												while ($registro_produccion2= mysql_fetch_array($result_produccion2))  {   
												?>
												<option value="<?=$registro_produccion2['ProdDesc']?>"><?=$registro_produccion2['ProdDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">3 <span>
                                                     <select name="PostProduccion3"  id="PostProduccion3" >
												<option selected="selected" value="<?=$row_usuario['PostProduccion3']?>"><?=$row_usuario['PostProduccion3']?></option>
												<?
												$sql_produccion3 = "SELECT ProdDesc FROM Producciones order by ProdDesc ASC"; 
												$result_produccion3 =mysql_query($sql_produccion3,$dbCasting);
												while ($registro_produccion3= mysql_fetch_array($result_produccion3))  {   
												?>
												<option value="<?=$registro_produccion3['ProdDesc']?>"><?=$registro_produccion3['ProdDesc']?></option>
												<?}?>
												</select></span> </li>
                                             </ul>
                                          </div>
                                            
                                           
                                           <div class="bloq_talent">
										   <?php if($row_usuario['PostreciboNoticias']==1) {?>
                                           		<input name="PostreciboNoticias" type="checkbox" value="1" checked> Deseo recibir noticias de castings, en VIVOS y campa&ntilde;as de los portales de Am&eacute;rica Televisión
											<?}else{?>
                                           		<input name="PostreciboNoticias" type="checkbox" value="0" > Deseo recibir noticias de castings, en VIVOS y campa&ntilde;as de los portales de Am&eacute;rica Televisión
											<?}?>
                                           </div>
										     <div class="cont_btn"><input name="submit_edit" type="submit"  id="post_button" Value="GUARDAR"/></div>
                                     </div>

                                </div>
								
								</form>
	 </p>
     </div>


     <div class="tabbertab">
<h2>VIDEO PRESENTACI&Oacute;N</h2>
	  <p>Tab 3 content.</p>
     </div>

     <div class="tabbertab">
<h2>COMPARTE TUS VIDEOS</h2>
	  <p>                           
	  

                            									
									</p>
     </div>

</div>
                            
                        
            















<aside class="span8">
                                		<div class="datos_cast">
                                       		<div class="prf_cast">
                                            	<div class="span8">
                                                <figcaption>
                                                	<img src="<?php echo $_COOKIE['sess_demo_avatar']; ?>"/>
                                               	<span class="budget"></span>
                                                </figcaption>
                                                	
                                              </div>
                                            	<div class="span16">
                                                    <h3><?php echo $row_usuario["PostNombres"]?></h3>
                                                 	<h4><?php echo $row_usuario["PostApellPapa"]?> <?php echo $row_usuario["PostApellMama"]?></h4>
                                                  	<h5><?php echo $edad;?> años</h5>
                                                    <h5><a href=""><?php echo $row_usuario["PostEmail"]?></a></h5>
                                                </div>
                                            </div>
                                            <div class="cont_presnt box">
                                            	  <div class="resultados">
                                                        <h4>
                                                            Presentación <span class="r_red">30%</span>
                                                        </h4>
                                                        <div class="cont_resul">
                                                            <span class="bg_r" style="width:30%;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="resultados">
                                                        <h4>
                                                             
                                                            Book <span class="r_green">90%</span>
                                                        </h4>
                                                        <div class="cont_resul">
                                                            <span class="bg_g" style="width:90%;"></span>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="edt_prf box">
                                            	<div class="span20">
                                                	<?php echo $row_usuario["PostProfesion1"]?>, <?php echo $row_usuario["PostProfesion2"]?>, <?php echo $row_usuario["PostProfesion3"]?>
                                                </div>
                                            	<div class="span4">
                                                	<a href="">Editar</a>
                                                </div>
                                            
                                            </div>
                                       		<div class="desc_cast box">
                                            	<h3>Descripción</h3>
                                            	<p><?php echo $row_usuario["PostObjetivo"]?>.
</p>
                                         </div>
                                            
                                            
                                        </div>
                            
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



</body></html>