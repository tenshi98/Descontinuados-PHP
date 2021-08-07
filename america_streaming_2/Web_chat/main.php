<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';

// obtengo puntero de conexion con la db
$dbConn = conectar();

// Se trae un listado con todos los Videochat
$arrVideochat = array();
$query = "SELECT idRoom, Nombre
FROM `rooms_listado`
ORDER BY Nombre ASC  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVideochat,$row );
}
// Se trae un listado con todos los Chat
$arrChat = array();
$query = "SELECT idChat, Nombre
FROM `chats_listado`
ORDER BY Nombre ASC  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrChat,$row );
}

	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Principal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
		<link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
    <div class="content">
        <nav>
          <UL>
          <?php //Limitar la cantidad de objetos por pantalla
		  $objetos = 10;
		  ?>
          <?php foreach ($arrVideochat as $videochat) { ?>
           <li class="var_nav">
              <div class="link_bg"></div>
              <div class="link_title">
                <div class=icon> 
                <i class="fa fa-camera fa-2x"></i>
                </div>
                <?php $ruta= str_replace(' ','_',$videochat['Nombre']);  ?>
                <a target="new" href="videochat.php?room=<?php echo md5($videochat['idRoom']); ?>&r=<?php echo $videochat['idRoom']; ?>&name=<?php echo $ruta; ?>">
                	<span><?php echo $videochat['Nombre']; ?></span>
                </a>
              </div>
           </li>
           <?php $objetos = $objetos-1;?>
           <?php } ?>
           <?php foreach ($arrChat as $chat) { ?>
           <li class="var_nav">
              <div class="link_bg"></div>
              <div class="link_title">
                <div class=icon> 
                <i class="fa fa-weixin fa-2x"></i>
                </div>
                <?php $ruta= str_replace(' ','_',$chat['Nombre']);  ?>
                <a target="new" href="chat.php?room=<?php echo md5($chat['idChat']); ?>&r=<?php echo $chat['idChat']; ?>&name=<?php echo $ruta; ?>">
                	<span><?php echo $chat['Nombre']; ?></span>
                </a>
              </div>
           </li>
           <?php $objetos = $objetos-1;?>
           <?php } ?>
           <?php 
			   // Se traen a los ultimos 10 usuarios de los chats
				$arrUser = array();
				$query = "SELECT  Nombre, url_img, sala
				FROM `chat_temp`
				ORDER BY id DESC
				LIMIT {$objetos}  ";
				$resultado = mysql_query ($query, $dbConn);
				while ( $row = mysql_fetch_assoc ($resultado)) {
				array_push( $arrUser,$row );
				}
		   foreach ($arrUser as $usuarios) { ?>
           <?php $sala= str_replace('_',' ',$usuarios['sala']);  ?>
           <li class="var_user">
              <div class="avatar"><img src="<?php echo $usuarios['url_img']; ?>" ></div>
              <div class="info"><?php echo $usuarios['Nombre']; ?><br/><?php echo $sala; ?></div>
           </li>
           <?php } ?>
           
          </UL>
        </nav>
    
    </div>
		
    </body>
</html>