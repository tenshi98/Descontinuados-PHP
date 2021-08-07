<?php session_start();
/**********************************************************************************************************************************/
/*                                                      Verifico la sesion                                                        */
/**********************************************************************************************************************************/
if (isset($_GET["cierro"])&&$_GET["cierro"]=="si") {
session_destroy();
}
/**********************************************************************************************************************************/
/*                                                         Se carga el head                                                       */
/**********************************************************************************************************************************/
require_once('inc/head.php');
/**********************************************************************************************************************************/
/*                                             Se llaman a los datos necesarios                                                   */
/**********************************************************************************************************************************/
// Se trae un listado con todos los Videochat
$arrVideochat = array();
$query = "SELECT idRoom, Nombre
FROM `rooms_listado`
ORDER BY Nombre ASC  ";
$resultado = mysql_query ($query, $dbCasting);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVideochat,$row );
}
// Se trae un listado con todos los Chat
$arrChat = array();
$query = "SELECT idChat, Nombre
FROM `chats_listado`
ORDER BY Nombre ASC  ";
$resultado = mysql_query ($query, $dbCasting);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrChat,$row );
}
// Se traen a los ultimos 10 usuarios de los chats
$arrUser = array();
$query = "SELECT  Nombre, url_img, sala, hora
FROM `chat_temp`
ORDER BY id DESC
LIMIT 5  ";
$resultado = mysql_query ($query, $dbCasting);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUser,$row );
}      
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
                         
                         
                            <div class="CSSTableGenerator">
                            <table>
                            	<thead>
                                	<tr><th colspan="2">SALAS DE VIDEOCHAT</th></tr>
                                </thead>
                                <tbody>
                                <?php foreach ($arrVideochat as $chat) { ?>
                                <tr>
                                    <td width="70%"><?php echo $chat['Nombre']; ?></td>
                                    <?php $ruta= str_replace(' ','_',$chat['Nombre']);  ?>
                                    <td>
                                    <a href="chat_videochat_username.php?room=<?php echo md5($chat['idRoom']).'&r='.$chat['idRoom'].'&name='.$ruta; ?>">
                                    <button>Ingresar</button>
                                    </a>
                                    </td>
                                </tr>   
                                <?php } ?>  
                                </tbody>              
                            </table>
                            </div>
                            
                            <div class="CSSTableGenerator">
                            <table>
                            	<thead>
                                	<tr><th colspan="2">ACTIVIDAD - Ultimos Conectados</th></tr>
                                </thead>
                                <tbody>
                                <?php foreach ($arrUser as $usuarios) {?>
                                <?php $sala= str_replace('_',' ',$usuarios['sala']);  ?>
                                <tr>
                                    <td width="10%"><img src="<?php echo $usuarios['url_img']; ?>"/></td>
                                    <td><span class="txt_chat span20"><?php echo $usuarios['Nombre'].' a las '.$usuarios['hora'].' hrs <br/>En '.$sala; ?></span></td>
                                </tr>    
                                <?php } ?>  
                                </tbody>              
                            </table>
                            </div>
                            
                            <div class="CSSTableGenerator">
                            <table>
                            	<thead>
                                	<tr><th colspan="2">SALAS DE CHAT</th></tr>
                                </thead>
                                <tbody>
                                <?php foreach ($arrChat as $chat) { ?>
                                <tr>
                                    <td width="70%"><?php echo $chat['Nombre']; ?></td>
                                    <?php $ruta= str_replace(' ','_',$chat['Nombre']);  ?>
                                    <td>
                                    <a href="chat_live.php?room=<?php echo md5($chat['idChat']).'&r='.$chat['idChat'].'&name='.$ruta; ?>">
                                    <button>Ingresar</button>
                                    </a>
                                    </td>
                                </tr>   
                                <?php } ?>  
                                </tbody>              
                            </table>
                            </div>
                            
                            
      
 	
                        </div>
                        <aside class="span8">
                            <div>
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