<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
/**********************************************************************************************************************************/
/*                                        Se filtran las entradas para evitar ataques                                             */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                 Realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
if ($_GET["cierro"]=="si") {
session_destroy();
}
$nombre_programa="saludos";
?>
<?   
    // BOTON FLOTANTE --->
        require_once('inc/head.php');         
     // BOTON FLOTANTE --->
?>

<body class="participa"  >
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
                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
                        	<div class="cont_slider saludos_v">
                            	<h3>El más popular</h3>
                            
                            	<div class="slider_item">
                                	<figcaption class="chat_live">
                                    	<a href=""><img src="img/temporales/img28.jpg"></a>
                                            
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
                                    	<h2 class="head_h2">VIDEOS SALUDOS PERSONALIZADOS</h2>
                                       <div class="sort_semana">
                                       		<ul class="princ_sem">
                                       			<li class="active"><a href="">COMBINADOS</a></li>
                                                <li><a href="">EN TARJETAS</a></li>
                                                
                                       		</ul>
                                            <div class="list_sorteo">
                                            	<div class="selec_personaje">
                                                	<h3>Selecciona personaje</h3>
                                                	<ul>
                                                		<li><a href="">LO MÁS NUEVO</a></li>
                                                		<li><a href="">LO MÁS POPULAR</a></li>
                                                		<li><a href="">TODO</a></li>
                                                	</ul>
                                                </div>
                                            
                                            
                                            	<ul class="bloq_sorteo">
                                           		  <li class="span8">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img29.jpg">
                                                                
                                                            </a>
                                                        </figcaption>
                                                       		  
                                                            <h2><a href="">Nicolas de las Casas</a></h2>
                                                            <h4> <span></span>12 005</h4>
                                                            
                                                  </li>
                                                  <li class="span8">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img29.jpg">
                                                                
                                                            </a>
                                                        </figcaption>
                                                       		  
                                                            <h2><a href="">Nicolas de las Casas</a></h2>
                                                            <h4> <span></span>12 005</h4>
                                                            
                                                  </li>
                                                  <li class="span8">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img29.jpg">
                                                                
                                                            </a>
                                                        </figcaption>
                                                       		  
                                                            <h2><a href="">Nicolas de las Casas</a></h2>
                                                            <h4> <span></span>12 005</h4>
                                                            
                                                  </li>
                                            	</ul>
                                                <ul class="bloq_sorteo">
                                           		  <li class="span8">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img29.jpg">
                                                                
                                                            </a>
                                                        </figcaption>
                                                       		  
                                                            <h2><a href="">Nicolas de las Casas</a></h2>
                                                            <h4> <span></span>12 005</h4>
                                                            
                                                  </li>
                                                  <li class="span8">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img29.jpg">
                                                                
                                                            </a>
                                                        </figcaption>
                                                       		  
                                                            <h2><a href="">Nicolas de las Casas</a></h2>
                                                            <h4> <span></span>12 005</h4>
                                                            
                                                  </li>
                                                  <li class="span8">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img29.jpg">
                                                                
                                                            </a>
                                                        </figcaption>
                                                       		  
                                                            <h2><a href="">Nicolas de las Casas</a></h2>
                                                            <h4> <span></span>12 005</h4>
                                                            
                                                  </li>
                                            	</ul>
                                           
                                            	<div class="cont_btn">
                                        <a href="">VER TODOS <span>»</span></a>
                                    </div>
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
