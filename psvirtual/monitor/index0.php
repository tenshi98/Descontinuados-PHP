<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');

$latidud="-33.04862";
$longitud="-71.60531";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />




</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" >

<table align="center" width="1050" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="234" height="40" align="center" valign="bottom">
	<img src="http://<?=$nombreurl?>/images/top_logo_ch.png" width="234" height="40" border="0" /></td>
    <td background="http://<?=$nombreurl?>/images/linea_dot.png" width="1" rowspan="5" align="center" valign="bottom"></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<img src="http://<?=$nombreurl?>/images/botton_logo_ch.png" width="234" height="85" /></td>
    <td width="581" align="center" valign="top"><span class="titulo_rojo_ppal_gd">Menu Principal de Opciones</span></td>
  </tr>
</table>
     <table width="900" border="0" height=600 cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td height=50>&nbsp;</td>
		
		<td >
        <form method="post" id="geocoding_form" action="alarmas.php">
          <div class="input"><label for="address">Alarmas:</label>

			<input type="submit" class="btn" value="Entrar" /> &nbsp; &nbsp;
          </div>
        </form>
		</td>
	   </tr>

      <tr>
        <td height=50>&nbsp;</td>
		
		<td >
        <form method="post" id="geocoding_form" action="vigilancia.php">
          <div class="input"><label for="address">&Uacute;ltima Ubicaci&oacute;n M&oacute;viles:</label>

			<input type="submit" class="btn" value="Entrar" /> &nbsp; &nbsp;
          </div>
        </form>
		</td>
	   </tr>
		<tr>
		<td height=50>&nbsp;</td>
		
		<td >
        <form method="post" id="geocoding_form" action="historico_fecha.php">
          <div class="input"><label for="address">Hist&oacute;rico por fecha:</label>

				<select name="fecha" id="fecha" class="cajaGris" >

				<option value="0" SELECTED>Selecciona la Fecha</option>
<?
$SQL_lee4="select LEFT( fecha_hora, 10 ) as fecha  from activaciones group by LEFT( fecha_hora, 10 )  order by LEFT( fecha_hora, 10 ) desc";
$res=mysql_query($SQL_lee4,$base); 

while($fila=mysql_fetch_array($res)) {
		$fecha = $fila["fecha"];
		?>
		
	<option value="<?=$fecha?>"><?=$fecha?></option>
	

<?}?>
</select>




			<input type="submit" class="btn" value="Entrar" /> &nbsp; &nbsp;
          </div>
        </form>
		</td>
	   </tr>
		<tr>
		<td height=50>&nbsp;</td>
		
		<td >
        <form method="post" id="geocoding_form" action="historico_usuario.php">
          <div class="input"><label for="address">Hist&oacute;rico por Usuarios:</label>
				<input type="hidden" name="dedonde" value="menu">
				<select name="usuario" id="usuario" class="cajaGris" >

				<option value="0" SELECTED>Selecciona el Usuario</option>
<?
$SQL_lee4="select id_usuario  from activaciones group by id_usuario  order by id_usuario desc";
$res=mysql_query($SQL_lee4,$base); 

while($fila=mysql_fetch_array($res)) {
		$id_usuario = $fila["id_usuario"];

		$sql3="SELECT * FROM ejecutivos where  id_ejecutiv=".$fila["id_usuario"]; 
		$gral3=mysql_query($sql3,$base);
		while($registro2=mysql_fetch_array($gral3)) 
		{ $ejecutivo=$registro2["nom_ejecutiv"];



		?>
		
	<option value="<?=$id_usuario?>"><?=$ejecutivo?></option>
	

<?
		}}?>
</select>





			<input type="submit" class="btn" value="Entrar" /> &nbsp; &nbsp;
          </div>
        </form>
		</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
     </table>	
<div align="center">
<div id="map" style="width: 800px; height: 600px" ></div>
</div>
<!-- PIE  -->
<?   
    require_once('../inc/pie.incl');  
?>
  
 <!-- PIE  -->
</body>
</html>
