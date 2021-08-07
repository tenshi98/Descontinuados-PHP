<?
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require("conexion.php");
require("nombre_pag.php");
/**********************************************************************************************************************************/
/*                                 realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
//capturo la identificacion del equipo
if(isset($_GET['id']))  $id_gcm = $_GET['id'];
$sql_id = "select login from ejecutivos where gcmcode='".$id_gcm."'";
$result_id = mysql_query($sql_id,$base);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){
	header( "Location: app/login.php?id=".$_GET['id'] );
	die;
} else {
	while($registro_id=mysql_fetch_array($result_id)) { 
	$login=$registro_id["login"];
	}
}
/**********************************************************************************************************************************/
/*                                                         Actualizo mi posicion                                                  */
/**********************************************************************************************************************************/
//actualizo mi posicion en la tabla de ejecutivos
$sql = "UPDATE ejecutivos
SET lon=".$_GET['longitud'].", lat=".$_GET['latitud']."
WHERE login='".$login."'";
$resultado2 = mysql_query($sql,$base);
/**********************************************************************************************************************************/
/*                                              Consulto por mis datos personales                                                 */
/**********************************************************************************************************************************/
//Ejecuto la consulta
$sql ="SELECT
ejecutivos.id_ejecutiv,
ejecutivos.fono_ejecutiv,
ejecutivos.login,
ejecutivos.cod_fono,
filtros.busco,
filtros.tucondicion,
filtros.radio
FROM ejecutivos 
INNER JOIN filtros ON filtros.id_usuario = ejecutivos.id_ejecutiv
WHERE login='".$login."'";
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
		  $lon           = $_GET['longitud'];//obtengo la longitud de la direccion
		  $lat           = $_GET['latitud'];//obtengo la latitud de la direccion
		  $busco         = $fila["busco"];
		  $tucondicion   = $fila["tucondicion"];
		  $radio         = $fila["radio"];
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
while($fila_aleatorio=mysql_fetch_array($res_aleatorio)){
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

<?php if(!isset($nombre_encontrado)){; ?>
<TABLE align=center valign=middle>
<TR>
	<TD align=center valign=middle height=100 class=Estilo71>
	Lo sentimos, no hay nadie dentro de tu rango de <?php echo $radio?> kilometros, puedes ampliar el rango en las preferencias de ti perfil
	</TD>    
</TR>
</TABLE>
<?php } else { ?>



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
		<?php if(!isset($imagen_id)){ ?>
        <img src="<?php echo $imagen_id; ?>" width="200" />
        <?php } else { ?>
        <img src="images/hombre.png" width="200" />
        <?php } ?>
	</TD>
</TR>

<form id="call" name="call" method="POST" action="roulette_02.php">
<input type="hidden" name=telefono value="<?php echo $telefono; ?>">
<input type="hidden" name=telefono_encontrado value="<?php echo $telefono_encontrado; ?>">
<input type="hidden" name=id_usuario value="<?php echo $id_usuario; ?>">
<input type="hidden" name=latitud value="<?php echo $latitud; ?>">
<input type="hidden" name=longitud value="<?php echo $longitud; ?>">
<input type="hidden" name=sender value="<?php echo $sender; ?>">
<input type="hidden" name=nombre_encontrado value="<?php echo $nombre_encontrado; ?>">
<TR>
	<TD align=center valign=middle height=100>
		<input  type="image" src="http://<?php echo $nombreurl?>/images/confirma.png" name="envia"><br>
	</TD>
</TR>
</form>
<?php $room= substr(md5(uniqid(rand())),0,10);?>
<form id="chat" name="chat" method="POST" action="http://<?php echo $urlcorta; ?>/notificaciones/envia_mensajes.php">
<input type="hidden" name=tag value="sendmessage">
<input type="hidden" name="message" id="message" value="<?php echo $room; ?>-Tienes una Invitacion al Chat de jOOtes" />
<input type="hidden" name="username" id="username" value='<?php echo $username_chat; ?>'  >
<input type="hidden" name="enviador" id="enviador" value='<?php echo $login; ?>'  >
<input type="hidden" name="collapsekey" id="collapsekey" value='<?php echo $id_usuario; ?>'/>
<input type="hidden" name="link" id="link" value="http://<?php echo $urlcorta; ?>/chat/index2.php?room=<?php echo $room; ?>" />
<input type="hidden" name="id_usuario" id="id_usuario" value='<?php echo $id_usuario; ?>' />
<input type="hidden" name="room" id="room" value='<?php echo $room; ?>' />
<input type="hidden" name="tipo" id="tipo" value='chat' />
<input type="hidden" name="puntos" id="puntos" value='0' />
<TR>
	<TD align=center valign=middle height=100>
		<input  type="image" src="http://<?php echo $nombreurl; ?>/images/confirma_chat.png" name="envia"><br>
	</TD>
</TR>
</form>
</TABLE>
<?php } ?>

</body>
</html>