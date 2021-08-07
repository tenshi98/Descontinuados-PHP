<?php 
session_start();
//Se capturan los valores de las variables get
$x_iduser = $_GET["id"];
$x_room   = $_GET["room"];

//se verifica si se han enviado datos desde un formulario
if(isset($_POST['submit']))
{
$con = mysql_connect("localhost","root","petland");
if (!$con)
  {
  die('Error en la coneccion: ' . mysql_error());
  }
//realizo la conexion a la base de datos
mysql_select_db("jootes", $con);
	$user_id     = $x_iduser;
	$room        = $x_room;
	$msg         = $_POST['mensaje'];
	$timestamp   = $stime=date("H:i:s",time()-21600);
	//guardo los datos dentro de la base de datos	
	mysql_query("INSERT INTO chat(user_id, room, msg, timestamp )VALUES('$user_id', '$room', '$msg', '$timestamp')");
}

//llamo a las funciones
require_once('funciones.php');
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat</title>


<link href="estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="component.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="modernizr.custom.js"></script>
<script src="jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>


</head>

<body onLoad="Repetir()">
<form method="POST" name="" action="">
<div class="refresh" id="chatbox" >
<?php
//conecto con la base de datos
$con = mysql_connect("localhost","root","petland");
if (!$con)
  {
  die('Error en la coneccion: ' . mysql_error());
  }

mysql_select_db("jootes", $con);

$result = mysql_query("SELECT
chat.msg AS mensaje,
chat.timestamp AS hora,
usuarios.nombre AS nombre,
chat.user_id,
imagenes.imagen AS imagen_perfil

FROM chat 
LEFT JOIN ejecutivos   ON ejecutivos.id_ejecutiv   =  chat.user_id
LEFT JOIN usuarios     ON usuarios.username        =  ejecutivos.login
LEFT JOIN imagenes     ON imagenes.usuario         =  ejecutivos.login

WHERE chat.room = '".$x_room."'
ORDER BY chat.id DESC");

 while($row = mysql_fetch_array($result)){?>
<?php if($row['user_id']!=$x_iduser){ ?>


<div class="chatbox fleft color_left">
	<div class="picture fleft">
    <?php if($row['imagen_perfil']==''){ ?>
    	<img src="img/usr.png"  />
    <?php } else {?>
    	<img src="<?php echo $row['imagen_perfil']; ?>"  />
    <?php } ?>
     </div>
    <div class="text fleft">
        <div class="tittle">
            <div class="name"><p><?php echo $row['nombre']; ?></p></div>
            <div class="date"><p><?php echo $row['hora']; ?></p></div>
            <div class="clear"></div>
        </div>
        <div class="body_text">
            <p><?php echo expresiones($row['mensaje']);?></p>
        </div> 
  </div>
  <div class="clear"></div> 
</div>


<?php } else {?>
<div class="chatbox fright color_right">
	<div class="picture fleft">
    <?php if($row['imagen_perfil']==''){ ?>
    	<img src="img/usr.png"  />
    <?php } else {?>
    	<img src="<?php echo $row['imagen_perfil']; ?>"  />
    <?php } ?>
     </div>
    <div class="text fleft">
        <div class="tittle">
            <div class="name"><p><?php echo $row['nombre']; ?></p></div>
            <div class="date"><p><?php echo $row['hora']; ?></p></div>
            <div class="clear"></div>
        </div>
        <div class="body_text">
            <p><?php echo expresiones($row['mensaje']);?></p>
        </div> 
  </div>
  <div class="clear"></div> 
</div>


<?php } ?>

 
 <?php }
mysql_close($con);
?>

</div>

<script type="text/javascript">

	function actualiza(){
    	$("#chatbox").load("refresh.php?idusuario=<?php echo $x_iduser ?>&nroom=<?php echo $x_room ?>");

	}


	function Repetir() {
	setInterval( "actualiza()", 1000 ); //multiplicas la cantidad de segundos por mil
	}
	
	function insertar(msg){
		var valorInput = $("#textb").val();
		$("#textb").val(valorInput + "   " + msg );
	}

</script>




<div class="mensaje">
	<div class="boton fleft">
        <div id="dl-menu" class="dl-menuwrapper">
            <button class="dl-trigger">Open Menu</button>
            
            <ul class="dl-menu">
            
                <li><a onclick="insertar(':))');" class="emobutton" ><img  src='emo/1.gif' /></a></li>
                <li><a onclick="insertar(';))');" class="emobutton" ><img  src='emo/2.gif' /></a></li>
                <li><a onclick="insertar(';;)');" class="emobutton" ><img src='emo/3.gif' /></a></li>
                <li><a onclick="insertar(':D');" class="emobutton" ><img src='emo/4.gif' /></a></li>
                <li><a onclick="insertar(';)');" class="emobutton" ><img src='emo/5.gif' /></a></li>
                <li><a onclick="insertar(':p');" class="emobutton" ><img src='emo/6.gif' /></a></li>
                <li><a onclick="insertar(':((');" class="emobutton" ><img src='emo/7.gif' /></a></li>
                <li><a onclick="insertar(':)');" class="emobutton" ><img src='emo/8.gif' /></a></li>
                <li><a onclick="insertar(':(');" class="emobutton" ><img src='emo/9.gif' /></a></li>
                <li><a onclick="insertar(':X');" class="emobutton" ><img src='emo/10.gif' /></a></li>
                <li><a onclick="insertar('=((');" class="emobutton" ><img src='emo/11.gif' /></a></li>
                <li><a onclick="insertar(':-o');" class="emobutton" ><img src='emo/12.gif' /></a></li>
                <li><a onclick="insertar(':-/');" class="emobutton" ><img src='emo/13.gif' /></a></li>
                <li><a onclick="insertar(':-*');" class="emobutton" ><img src='emo/14.gif' /></a></li>
                <li><a onclick="insertar(':|');" class="emobutton" ><img src='emo/15.gif' /></a></li>
                <li><a onclick="insertar('8-}');" class="emobutton" ><img src='emo/16.gif' /></a></li>
                <li><a onclick="insertar(':)]');" class="emobutton" ><img src='emo/17.gif' /></a></li>
                <li><a onclick="insertar('~x(');" class="emobutton" ><img src='emo/18.gif' /></a></li>
                <li><a onclick="insertar(':-t');" class="emobutton" ><img src='emo/19.gif' /></a></li>
                <li><a onclick="insertar('b-(');" class="emobutton" ><img src='emo/20.gif' /></a></li>
                <li><a onclick="insertar(':-L');" class="emobutton" ><img src='emo/21.gif' /></a></li>
                <li><a onclick="insertar('x(');" class="emobutton" ><img src='emo/22.gif' /></a></li>
                <li><a onclick="insertar('=))');" class="emobutton" ><img src='emo/23.gif' /></a></li>        
                                                    
            </ul>    
        
        </div>
    </div>
    <div class="texto fleft"><input class="textmsg" name="mensaje" type="text" id="textb"/></div>
  <div class="clear"></div>  
</div>

<div class="fcenter">
<input name="submit" type="submit" value="Enviar" id="post_button" />
</div>

</form>
   
</body>
</html>
