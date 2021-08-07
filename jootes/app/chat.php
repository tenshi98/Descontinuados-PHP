<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'url.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
//Se capturan los valores de las variables get
$x_iduser = $_GET["id"];
$x_room   = $_GET["room"];
//se verifica si se han enviado datos desde un formulario
if(isset($_POST['submit'])){
	//cargo las variables con los valores deseados
	$user_id     = $x_iduser;
	$room        = $x_room;
	$msg         = $_POST['mensaje'];
	$timestamp   = $stime=date("H:i:s");
	$datestamp    = $stime=date("Y-m-d");
	//ejecuto la consulta
	$query  = "INSERT INTO `chat` (user_id, room, msg, timestamp,datestamp) VALUES ('$user_id', '$room', '$msg', '$timestamp', '$datestamp')";
	$result = mysql_query($query, $dbConn);
}

//cargo la conversacion dentro de un array
$arrChat = array();
$query = "SELECT
chat.msg AS mensaje,
chat.timestamp AS hora,
ejecutivos.nom_ejecutiv AS nombre,
chat.user_id,
ejecutivos.direccion_img AS imagen_perfil
FROM chat 
LEFT JOIN ejecutivos   ON ejecutivos.id_ejecutiv   =  chat.user_id
WHERE chat.room = '".$x_room."'
ORDER BY chat.id DESC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrChat,$row );
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.dlmenu.js"></script>
<script>
	$(function() {
		$( '#dl-menu' ).dlmenu();
	});
</script>
</head>

<body onLoad="Repetir()">
<script type="text/javascript">
	function actualiza(){
    	$("#chatbox").load("chat_refresh.php?idusuario=<?php echo $x_iduser ?>&nroom=<?php echo $x_room ?>");
	}
	function Repetir() {
	setInterval( "actualiza()", 1000 ); //multiplicas la cantidad de segundos por mil
	}
	function insertar(msg){
		var valorInput = $("#textb").val();
		$("#textb").val(valorInput + "   " + msg );
	}
</script>

<form method="post">
<div class="refresh" id="chatbox" >

	<?php foreach ($arrChat as $row) { ?>
    <?php if($row['user_id']!=$x_iduser){ ?>
    <div class="chatbox fleft color_left">
    <?php } else {?>
    <div class="chatbox fright color_right">
    <?php } ?>
    
        <div class="picture fleft">
        <?php if($row['imagen_perfil']==''){ ?>
            <img src="images/usr.png"  />
        <?php } else {?>
            <img src="<?php echo $row['imagen_perfil']; ?>"  />
        <?php } ?>
         </div>
        <div class="text fleft">
             <p><?php echo $row['nombre']; ?> dijo : <?php echo expresiones($row['mensaje']);?><br/>
                <?php echo $row['hora']; ?></p>
      </div>
      <div class="clear"></div> 
    </div>
    <?php } // cierre del foreach ?>
</div>

<div class="mensaje">
	<div class="boton fleft">
        <div id="dl-menu" class="dl-menuwrapper">
            <button class="dl-trigger">Open Menu</button>
            
            <ul class="dl-menu">
            
                <li><a onclick="insertar(':))');" class="emobutton" ><img src='images/emo/1.gif' /></a></li>
                <li><a onclick="insertar(';))');" class="emobutton" ><img src='images/emo/2.gif' /></a></li>
                <li><a onclick="insertar(';;)');" class="emobutton" ><img src='images/emo/3.gif' /></a></li>
                <li><a onclick="insertar(':D');"  class="emobutton" ><img src='images/emo/4.gif' /></a></li>
                <li><a onclick="insertar(';)');"  class="emobutton" ><img src='images/emo/5.gif' /></a></li>
                <li><a onclick="insertar(':p');"  class="emobutton" ><img src='images/emo/6.gif' /></a></li>
                <li><a onclick="insertar(':((');" class="emobutton" ><img src='images/emo/7.gif' /></a></li>
                <li><a onclick="insertar(':)');"  class="emobutton" ><img src='images/emo/8.gif' /></a></li>
                <li><a onclick="insertar(':(');"  class="emobutton" ><img src='images/emo/9.gif' /></a></li>
                <li><a onclick="insertar(':X');"  class="emobutton" ><img src='images/emo/10.gif' /></a></li>
                <li><a onclick="insertar('=((');" class="emobutton" ><img src='images/emo/11.gif' /></a></li>
                <li><a onclick="insertar(':-o');" class="emobutton" ><img src='images/emo/12.gif' /></a></li>
                <li><a onclick="insertar(':-/');" class="emobutton" ><img src='images/emo/13.gif' /></a></li>
                <li><a onclick="insertar(':-*');" class="emobutton" ><img src='images/emo/14.gif' /></a></li>
                <li><a onclick="insertar(':|');"  class="emobutton" ><img src='images/emo/15.gif' /></a></li>
                <li><a onclick="insertar('8-}');" class="emobutton" ><img src='images/emo/16.gif' /></a></li>
                <li><a onclick="insertar(':)]');" class="emobutton" ><img src='images/emo/17.gif' /></a></li>
                <li><a onclick="insertar('~x(');" class="emobutton" ><img src='images/emo/18.gif' /></a></li>
                <li><a onclick="insertar(':-t');" class="emobutton" ><img src='images/emo/19.gif' /></a></li>
                <li><a onclick="insertar('b-(');" class="emobutton" ><img src='images/emo/20.gif' /></a></li>
                <li><a onclick="insertar(':-L');" class="emobutton" ><img src='images/emo/21.gif' /></a></li>
                <li><a onclick="insertar('x(');"  class="emobutton" ><img src='images/emo/22.gif' /></a></li>
                <li><a onclick="insertar('=))');" class="emobutton" ><img src='images/emo/23.gif' /></a></li>        
                                                    
            </ul>    
        
        </div>
    </div>
    <div class="texto fleft"><input class="textmsg2" name="mensaje" type="text" id="textb"/></div>
  <div class="clear"></div>  
</div>

<div class="fcenter">
<input name="submit" type="submit" value="Enviar" id="post_button" />
</div>

</form>
   
</body>
</html>
