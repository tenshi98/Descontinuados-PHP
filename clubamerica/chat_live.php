<?php session_start();
/**********************************************************************************************************************************/
/*                                                      Verifico la sesion                                                        */
/**********************************************************************************************************************************/
if (isset($_GET["cierro"])&&$_GET["cierro"]=="si") {
	session_destroy();
}
if(!isset($_COOKIE['sess_demo'])){ 
	header( 'Location: index.php' );
	die;
}
if (!isset($_GET["room"]) or $_GET["room"]=='' or !isset($_GET["r"]) or $_GET["r"]=='' or !isset($_GET["name"]) or $_GET["name"]=='') {
	header( 'Location: index.php' );
	die;
}
/**********************************************************************************************************************************/
/*                                                         Se carga el head                                                       */
/**********************************************************************************************************************************/
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

    <div class="message-container">
        <div class="message-north">
            <div class="message-thread" id="messages" >

            </div>
        </div>
        <div class="message-south">
            <textarea cols="20" rows="3" id="text" disabled></textarea>
            <button id="send">Enviar</button>
        </div>
    </div>
  			             
<?php }else{ ?>
	
    <h1 class="msg_h1">Inicia Sesion Primero</h1>	                   

<?php } ?>
        	
                        </div>
                        <aside class="span8">

<?php if(isset($_COOKIE['sess_demo'])){ ?>
<div class="message-container">
        <div class="message-north">
        	<div id="tittle_box" style="display:none;"></div>
            <div id="user_lister" style="display:none;"></div>
            <div id="caja-creacion">
                        <input type="text" id="conference-name" placeholder="Nombre de la habitacion">
                        <button id="start-conferencing" href="#">Crear habitacion</button>
            </div>
            <ul class="message-user-list" id="rooms-list"></ul>
		</div>
    </div>
<?php } ?>                        
                        
                        
                        
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
    
<script src="js/firebase.js"> </script>
<script src="js/RTCPeerConnection-v1.6.js"> </script>
<script src="js/hangout.js"> </script>
<script src="js/hangout-ui.js"> </script>
    
</body>
</html>