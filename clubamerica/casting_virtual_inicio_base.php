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
                 		<div class="wrapper_casting">
                         	<ul class="tab_prin">
                        		<li class="active_tab" ><a href="casting_virtual_inicio.php">HOME</a></li>
                        		<li ><a href="casting_virtual_book.php">BOOK</a></li>
                        		<li ><a href="casting_virtual_vpresentacion.php">VIDEO PRESENTACIÓN</a></li>
                        		<li ><a href="casting_virtual_compartir.php">COMPARTE TUS VIDEOS</a></li>
                        	</ul>
                            <div class="cont_casting">
                            	<div class="casting_16 span16">
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
                                                	<a href="perfil.php" rel="shadowbox;width=900;height=550">Editar</a>
                                                </div>
                                            
                                            </div>
                                       		<div class="desc_cast box">
                                            	<h3>Descripción</h3>
                                            	<p><?php echo $row_usuario["PostObjetivo"]?>.

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