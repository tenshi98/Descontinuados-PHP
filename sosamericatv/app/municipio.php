<?
require("../conexion.php");
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];
$sql ="SELECT imei FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>


<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/crea_usuario.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
            <input type="hidden" name="msg_error" value="1">
</form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>

<?}

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		}
if ($_GET["id"]!='' and $gcmcode=='') {
		$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);

}


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>

<link href="estilo.css" rel="stylesheet" type="text/css" />


</head>

<body >

	

<table style="padding-top:20px;" align="center" height="98% " width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="32%" height="23%" align="center" valign="middle" bgcolor="#FF6600" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="incendio" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Incendio en Progreso">
	<a href="#" onclick="document.incendio.submit(); return false" ><img src="images/incendio.png" width="90%" border="0"/></a>
	</form>
	</td>
    <td  width="2" rowspan="7" align="center" valign="middle">&nbsp;</td>
    <td width="32%" align="center" valign="middle" bgcolor="#CC0000" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="ambulancia" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Solicitud de Ambulancia">
	<a href="#" onclick="document.ambulancia.submit(); return false" ><img src="images/ambulancia.png" width="90%" border="0"/></a>
	</form>
	</td>
    <td style="min-widtht:20px; max-width:25px !important;" width="2" rowspan="7" align="center" valign="middle">&nbsp;</td>
    <td width="32%" align="center" valign="middle" bgcolor="#333333" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="electricidad" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Suministro Electrico">
	<a href="#" onclick="document.electricidad.submit(); return false" ><img src="images/luz.png" width="90%" border="0"/></a>
	</form>	
	</td>
  </tr>

  <tr>
    <td width="33%" height="2" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
  </tr>

  <tr>
    <td width="32%" height="23%" align="center" valign="middle" bgcolor="#29598D" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="semaforo" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Problemas en Semaforo">
	<a href="#" onclick="document.semaforo.submit(); return false" ><img src="images/semaforo.png" width="90%" border="0"/></a>
	</form>	
	</td>
    <td width="32%" align="center" valign="middle" bgcolor="#CC3300" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="peligro" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Peligro en la Via">
	<a href="#" onclick="document.peligro.submit(); return false" ><img src="images/peligro.png" width="90%" border="0"/></a>
	</form>	
	</td>
    <td width="32%" align="center" valign="middle" bgcolor="#006600" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="arbol" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Arbol Peligroso">
	<a href="#" onclick="document.arbol.submit(); return false" ><img src="images/arbol.png" width="90%" border="0"/></a>
	</form>
	</td>
  </tr>

  <tr>
    <td width="33%" height="2" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
  </tr>

  <tr>
    <td width="32%" height="23%" align="center" valign="middle" bgcolor="#58839C" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="calzada" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Peligro en la Calzada">
	<a href="#" onclick="document.calzada.submit(); return false" ><img src="images/calzada.png" width="90%" border="0"/></a>
	</form>	
	</td>
    <td width="32%" align="center" valign="middle" bgcolor="#339999" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="grifo" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Problemas de Grifo">
	<a href="#" onclick="document.grifo.submit(); return false" ><img src="images/grifo.png" width="90%" border="0"/></a>
	</form>	
	</td>
    <td width="32%" align="center" valign="middle" bgcolor="#663333" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="basura" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Escombros/Basura en la via">
	<a href="#" onclick="document.basura.submit(); return false" ><img src="images/basura.png" width="90%" border="0"/></a>
	</form>	
	</td>
  </tr>

  <tr>
    <td width="33%" height="2" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
  </tr>

  <tr>
    <td width="32%" height="23%" align="center" valign="middle" bgcolor="#663399" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="pelea" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Pelea callejera">
	<a href="#" onclick="document.pelea.submit(); return false" ><img src="images/pelea.png" width="90%" border="0"/></a>
	</form>	
	</td>
    <td width="32%" align="center" valign="middle" bgcolor="#000000" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="alumbrado" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Problemas Alumbrado Publico">
	<a href="#" onclick="document.alumbrado.submit(); return false" ><img src="images/alumbrado.png" width="90%" border="0"/></a>
	</form>
	</td>
    <td width="32%" align="center" valign="middle" bgcolor="#FF9900" class="sombra_interna esquina_red_bot padding_bot">
	
	<form name="otros" method="post" action="http://<?=$nombreurl?>/app/municipal.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Otros no clasificados">
	<a href="#" onclick="document.otros.submit(); return false" ><img src="images/otros.png" width="90%" border="0"/></a>
	</form>
	</td>
  </tr>
</table>



</body>
</html>

