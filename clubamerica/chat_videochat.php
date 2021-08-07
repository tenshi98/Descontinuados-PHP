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
/**********************************************************************************************************************************/
/*                                                       Ejecuto las consultas                                                    */
/**********************************************************************************************************************************/
//ubico los datos del usuario
$query = "SELECT  id, rol
FROM `user_listado`
WHERE email='{$_COOKIE['sess_demo_correo']}' ";
$resultado = mysql_query ($query, $dbCasting);
$row_data = mysql_fetch_assoc ($resultado);
//declaro variables
$usr_id   = $row_data['id']; 
$usr_rol  = $row_data['rol'];       
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
     
                            <!-- scripts used for broadcasting -->
                            <script src="js/firebase.js"> </script> <!-- Signaling -->
                            <script src="js/RTCPeerConnection-v1.5.js"> </script> <!-- WebRTC simple wrapper -->
                            <script src="js/broadcast.js"> </script> <!-- Multi-user connectivity handler -->
                            <!-- This Library is used to detect WebRTC features -->
                            <script src="js/DetectRTC.js"></script>
                            
                            <?php if($usr_rol==2){?>
                            <div class="CSSTableGenerator streaming_input" id="trans1">
                            <table >
                            	<thead>
                                	<tr><th colspan="2">Crear Streaming</th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="70%">
                                            <input type="hidden" id="broadcasting-option" value="Audio + Video" >
                                            <input type="text" id="broadcast-name" placeholder="Ingrese el nombre para la sesion" >
                                        </td>
                                        <td><button id="setup-new-broadcast" class="botonblue">Crear nueva sesion</button></td>
                                    </tr> 
                                </tbody>                  
                            </table>
                            </div>
                            <?php }?>
                            
                            
                            <div id="videos-container"></div>
                            
                            <?php if($usr_rol==1){?>
                            <div class="CSSTableGenerator" id="trans2">
                            <table id="rooms-list">
                            	<thead>
                                	<tr><th colspan="2">Streaming en emision</th></tr>
                                </thead>
                                <tbody>
                                
                                </tbody>              
                            </table>
                            </div>
                            <?php }?>
                            <div id="consulta1" style="display:none" ></div>
                            <script>
							//defino variables internas
                            var user_chat_id = <?php echo $usr_id ?>;
							var user_chat_room = '<?php echo $_GET['room'] ?>';
                            </script>
                            <script src="js/Muaz_Khan.js"></script> 
                            
 	
                        </div>
                        <aside class="span8">
                        
                            <div id="chat_vis" style="display:none" >
                                <?php 
                                //defino la ubicacion del iframe
                                $frame='inc/videochat_chat.php';
                                $frame.='?room='.$_GET['room'];
                                $frame.='&r='.$_GET['r'];
                                $frame.='&name='.$_GET['name'];
                                $frame.='&id='.$usr_id;
                                ?>
                                <iframe style="width:100%; height:100%;" frameborder="0" noresize scrolling="No" src="<?php echo $frame;?>"></iframe>
                            </div>
                            <div class="clear_fix"></div>
                    		
                            <div id="trans3">
                            <?php 
								//Video chat  
        						require_once('inc/publicidad_sorteo.php'); 
								//Video chat  
        						require_once('inc/video_chat.php'); 
								//Publicidad
								require_once('inc/publicidad_derecha.php');
								?> 
                            </div>     
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