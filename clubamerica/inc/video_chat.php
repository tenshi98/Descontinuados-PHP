<?php 
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
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

<div class="video_chat">
	<img src="img/temporales/vchat.jpg"/>
    
    <h2 class="head_h2">SALAS DE VIDEOCHAT</h2>
    <?php foreach ($arrVideochat as $chat) { ?>
		<div class="cont_btn">
        	<?php $ruta= str_replace(' ','_',$chat['Nombre']);  ?>
			<a href="chat_videochat_username.php?room=<?php echo md5($chat['idRoom']).'&r='.$chat['idRoom'].'&name='.$ruta; ?>">
            <?php echo $chat['Nombre']; ?>  <span>&raquo;</span>
            </a>      
		</div>
    <?php } ?>  
      
</div>

<div class="salas_chat">
	<h2 class="head_h2">ACTIVIDAD</h2>
    <p class="chat_subtittle">Ultimos Conectados</p>
	
    <ul>
    <?php foreach ($arrUser as $usuarios) {?>
    <?php $sala= str_replace('_',' ',$usuarios['sala']);  ?>
		<li>
			<span class="cont_ft_chat span4">
				<img src="<?php echo $usuarios['url_img']; ?>"/>
				<span class="online"></span>
			</span>
			<span class="txt_chat span20"><?php echo $usuarios['Nombre'].' a las '.$usuarios['hora'].' hrs <br/>En '.$sala; ?></span>
		</li>
    <?php } ?> 
    </ul> 
</div>

<div class="salas_chat">
	<h2 class="head_h2">SALAS DE CHAT</h2>
	<?php foreach ($arrChat as $chat) { ?>
    <div class="cont_btn marg_10">
    	<?php $ruta= str_replace(' ','_',$chat['Nombre']);  ?>
		<a target="new" href="chat_live.php?room=<?php echo md5($chat['idChat']).'&r='.$chat['idChat'].'&name='.$ruta; ?>">
        	<?php echo $chat['Nombre']; ?>  <span>&raquo;</span>
        </a>
	</div>
    <?php } ?>
</div>