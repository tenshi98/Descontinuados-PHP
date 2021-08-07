<?php session_start();
/**********************************************************************************************************************************/
/*                                 Realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
if (isset($_GET["cierro"])&&$_GET["cierro"]=="si") {
session_destroy();
}
$nombre_programa="chat_base";
//Se carga el head
require_once('inc/head.php');         
?>
<body>
<?php
//Menu superior   
require_once('inc/menu_cintillo.php'); 
?>	
	<section class="wrapper row-fluid">
    		<div class="cont_wrapper">
            	<?php //Menu y login 
        			require_once('inc/menu_nav_login.php');?>
                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
     

<?php if(isset($_COOKIE['sess_demo'])){ ?>

    <form method="post">     
    <div class="datos_cast">
        <div class="prf_cast">
            <div class="span8">
            <figcaption>
                <img src="<?php echo $_COOKIE['sess_demo_avatar']; ?>">                                            
                <span><a target="new" href="http://peruid.pe/"> Editar mi perfil</a></span>
            </figcaption>
                                                                
            </div>
            <div class="span16">
                <h3><?php echo $_COOKIE['sess_demo_name']; ?></h3>
                <h4><?php echo $_COOKIE['sess_demo_apellidos']; ?></h4>
                <h5>Ingresa tu Alias</h5>
                <input name="alias" type="text">   
            </div>
        </div>
        <div class="btn_login_usr"><input  name="" type="submit" value="ENTRAR AL VIDEO CHAT"></div>
    </div>
    </form> 			 
             
<?php }else{ ?>
	
    <h1 class="msg_h1">Inicia Sesion Primero</h1>	                   

<?php } ?>
                                             
                                        
                                        
                        	
                        </div>
                        <aside class="span8">
                            <?php 
								//Video chat  
        						require_once('inc/publicidad_sorteo.php'); 
								//Video chat  
        						require_once('inc/video_chat.php'); 
								//Publicidad
								require_once('inc/publicidad_derecha.php');
								?>  
                        </aside>
                    </div>
                </div>
                </div>
				<?php  //Footer
                require_once('inc/footer.php');         
                ?>
            </div>
    </section>
</body>
</html>