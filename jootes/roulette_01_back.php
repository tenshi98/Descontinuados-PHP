<?
require("conexion.php");
require("nombre_pag.php");
//Ejecuto la consulta
$sql ="SELECT
ejecutivos.id_ejecutiv,
ejecutivos.fono_ejecutiv,
ejecutivos.login,
ejecutivos.cod_fono,
ejecutivos.lon,
ejecutivos.lat,
filtros.busco,
filtros.tucondicion,
filtros.radio
FROM ejecutivos 
INNER JOIN filtros ON filtros.id_usuario = ejecutivos.id_ejecutiv
WHERE login='".$_GET["login"]."'";
$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 
//Verifico si la cantidad de registros es distinto de 0
if ($numeroRegistros==0) {?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos, debera confirmar sus datos en el sitio,\n desintalar e instalar la aplicacion.");
			window.location = "http://<?php echo $nombreurl; ?>";
		</SCRIPT>
<?php
}

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res)){
		  $id_usuario    = $fila['id_ejecutiv'];
		  $telefono      = $fila["fono_ejecutiv"];
		  $sender        = $fila["login"];
		  $cod_fono      = $fila["cod_fono"];
		  $lon           = $fila["lon"];
		  $lat           = $fila["lat"];
		  $busco         = $fila["busco"];
		  $tucondicion   = $fila["tucondicion"];
		  $radio         = $fila["radio"];
		  
			/*$sql_busco="select * from filtros where id_usuario=".$id_usuario;
			$res_busco=mysql_query($sql_busco,$base);
			while($fila_busco=mysql_fetch_array($res_busco))
				{
					$busco=$fila_busco["busco"];
					$tucondicion=$fila_busco["tucondicion"];
					$radio=$fila_busco["radio"];
				}*/
}
//calculo de la posicion
$var_kil=0.00450004500045;
$longitud_up = $lon-($var_kil*$radio);
$longitud_down = $lon+($var_kil*$radio);
$latitud_up = $lat-($var_kil*$radio);
$latitud_down = $lat+($var_kil*$radio);
//Realizo la consulta para llamar a x persona
if ($tucondicion=='T') {
	$aleatorio="SELECT 
	filtros.id_usuario, 
	filtros.soy,
	ejecutivos.direccion_img AS img_perfil,
	ejecutivos.fono_ejecutiv,
	ejecutivos.nom_ejecutiv,
	ejecutivos.ciudad_ejecutiv,
	ejecutivos.login
	FROM filtros 
	INNER JOIN ejecutivos ON ejecutivos.id_ejecutiv = filtros.id_usuario
	where filtros.soy='".$busco."' and filtros.id_usuario<>".$id_usuario." 
	AND ejecutivos.lon BETWEEN '".$longitud_up."' AND '".$longitud_down."'
	AND ejecutivos.lat BETWEEN'".$latitud_up."' AND '".$latitud_down."'
	ORDER BY RAND() LIMIT 1";
}else{
	$aleatorio="SELECT
	filtros.id_usuario, 
	filtros.soy,
	ejecutivos.direccion_img AS img_perfil,
	ejecutivos.fono_ejecutiv,
	ejecutivos.nom_ejecutiv,
	ejecutivos.ciudad_ejecutiv,
	ejecutivos.login
	FROM filtros 
	INNER JOIN ejecutivos ON ejecutivos.id_ejecutiv = filtros.id_usuario
	where filtros.soy='".$busco."' and filtros.id_usuario<>".$id_usuario." 
	AND ejecutivos.lon BETWEEN '".$longitud_up."' AND '".$longitud_down."'
	AND ejecutivos.lat BETWEEN '".$latitud_up."' AND '".$latitud_down."'
	ORDER BY RAND() LIMIT 1";
} 



$res_aleatorio=mysql_query($aleatorio,$base);
			while($fila_aleatorio=mysql_fetch_array($res_aleatorio))
				{
					$encontrado           = $fila_aleatorio["id_usuario"];
					$telefono_encontrado  = $fila_aleatorio["fono_ejecutiv"];
					$nombre_encontrado    = $fila_aleatorio["nom_ejecutiv"];
					$ciudad_encontrado    = $fila_aleatorio["ciudad_ejecutiv"];
					$username_chat        = $fila_aleatorio["login"];
					$imagen_id            = $fila_aleatorio['img_perfil'];
						
					if ($fila_aleatorio["soy"]=='M') {
						$soy_aletorio='Hombre';
					}else{
						$soy_aletorio='Mujer';
					}
				/*	if ($fila_aleatorio["micondicion"]=='E') $con_aletorio='Heterosexual';
					if ($fila_aleatorio["micondicion"]=='B') $con_aletorio='Bisexual';
					if ($fila_aleatorio["micondicion"]=='H') $con_aletorio='Homosexual';

					$sql_aleatorio ="SELECT * FROM ejecutivos WHERE id_ejecutiv=" . $encontrado;
					//echo $sql_aleatorio."<br>";
					$res_encontrado=mysql_query($sql_aleatorio,$base); 
					while($fila_encontrado=mysql_fetch_array($res_encontrado))
					{
						$telefono_encontrado=$fila_encontrado["fono_ejecutiv"];
						$nombre_encontrado=$fila_encontrado["nom_ejecutiv"];
						$ciudad_encontrado=$fila_encontrado["ciudad_ejecutiv"];
						$username_chat=$fila_encontrado["login"];

					}*/
				}

$latitud=$_GET["latitud"];
$longitud=$_GET["longitud"];

$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "m" , $tiempo ); 
$seg= date ( "s" , $tiempo ); 
$horaproc=$hora.$min.$seg;

$Fecha=getdate(); 
$numeroRegistros=0;
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<10) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio."-".$mesdis."-".$diadis;


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Roulette</title>
<style type="text/css">
<!--
body {
	background-color: #ffffff;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo2 {
	color: #0267ff;
	font-size: 24px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo3 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo5 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #000066;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
.Estilo7 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo71 {color: #FF0000; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>


</head>
<body>


<TABLE align=center valign=middle>
<TR>
	<TD align=center valign=middle height=100 class=Estilo71>
	Te estamos comunicando con <?php echo $nombre_encontrado; ?>,<br>
	de  <?php echo $ciudad_encontrado; ?>,<br>
	es <?php echo $soy_aletorio; ?>.<br>
	</TD>
</TR>
<TR>
<TD align=center valign=middle height=100>
								<?php /*
$consulta = "SELECT * FROM imagenes WHERE usuario =".$encontrado." ORDER BY RAND() LIMIT 1";
//echo $consulta;
$res_imagen=mysql_query($consulta,$base); 
$numeroRegistros2=mysql_num_rows($res_imagen); 
if($numeroRegistros2>0) {
	while($datos=mysql_fetch_array($res_imagen))
		{
    $imagen_id = $datos['imagen_id'];
	//$imagen = $datos['imagen'];
    //$tipo = $datos['tipo_imagen'];
		}
}
								//header("Content-type: $tipo");
								echo '<img src="http://www.jootes.cl/imagen.php?id=' . $imagen_id . '" width="200" />';
								*/?>
<?php if(!isset($imagen_id)){ ?>
<img src="<?php echo $imagen_id; ?>" width="200" />
<?php } else { ?>
<img src="images/hombre.png" width="200" />
<?php } ?>

                                


	</TD>
</TR>

<form id="call" name="call" method="POST" action="roulette_02.php">
<input type="hidden" name=telefono value="<?=$telefono?>">
<input type="hidden" name=telefono_encontrado value="<?=$telefono_encontrado?>">
<input type="hidden" name=id_usuario value="<?=$id_usuario?>">
<input type="hidden" name=latitud value="<?=$latitud?>">
<input type="hidden" name=longitud value="<?=$longitud?>">
<input type="hidden" name=sender value="<?=$sender?>">
<input type="hidden" name=nombre_encontrado value="<?=$nombre_encontrado?>">
<TR>
	<TD align=center valign=middle height=100>
	<input  type="image" src="http://<?=$nombreurl?>/images/confirma.png" name="envia"    >
<br>
	</TD>
</TR>
</form>
<?
$room= substr(md5(uniqid(rand())),0,10);
?>
<form id="chat" name="chat" method="POST" action="http://<?=$urlcorta?>/notificaciones/envia_mensajes.php">
 <input type="hidden" name=tag value="sendmessage">
 <input type="hidden" name="message" id="message" value="<?=$room?>-Tienes una Invitacion al Chat de jOOtes" />
 <input type="hidden" name="username" id="username" value='<?=$username_chat?>'  >
<input type="hidden" name="enviador" id="enviador" value='<?=$_GET["login"]?>'  >
 <input type="hidden" name="collapsekey" id="collapsekey" value='<?=$id_usuario?>'/>
 <input type="hidden" name="link" id="link" value="http://<?=$urlcorta?>/chat/index2.php?room=<?=$room?>" />
 <input type="hidden" name="id_usuario" id="id_usuario" value='<?=$id_usuario?>' />
  <input type="hidden" name="room" id="room" value='<?=$room?>' />
 <input type="hidden" name="tipo" id="tipo" value='chat' />
 <input type="hidden" name="puntos" id="puntos" value='0' />
<TR>
	<TD align=center valign=middle height=100>
	<input  type="image" src="http://<?=$nombreurl?>/images/confirma_chat.png" name="envia"    >
<br>
	</TD>
</TR>
</form>
</TABLE>


</body>
</html>