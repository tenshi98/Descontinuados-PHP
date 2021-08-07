<?php session_start();

//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
/**********************************************************************************************************************************/
/*                                        Se filtran las entradas para evitar ataques                                             */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                 Realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
//capturo la identificacion del equipo
if(isset($_GET['imei']))  		$id_gcm = $_GET['imei'];
$sql_id = "select login from ejecutivos where imei='".$id_gcm."'";
$result_id = mysql_query($sql_id, $dbConn);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision == 0){?>

		<script language="javascript">
			alert("Los datos ingresados son erroneos, debera confirmar sus datos en el sitio,\n desintalar e instalar la aplicacion.");
		</SCRIPT>
	
	<form name="formulario" method="post" action="pide_rut.php?longitud=<?=$_GET["longitud"]?>&latitud=<?=$_GET["latitud"]?>&imei=<?=$_GET["imei"]?>&id=<?=$_GET["id"]?>&dispositivo=<?=$_GET["dispositivo"]?>">
            <input type="hidden" name="msg_error" value="1">
</form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>
	<?
} else {
	while($registro_id=mysql_fetch_array($result_id)) { 
	$login=$registro_id["login"];
	}
}
/**********************************************************************************************************************************/
/*                                                         Actualizo mi posicion                                                  */
/**********************************************************************************************************************************/
//actualizo mi posicion en la tabla de ejecutivos para asi obtener datos mas exactos
if ($_GET['longitud']!='' or $_GET['longitud']!=0 or $_GET['longitud']!='0.0') {
	$sql = "UPDATE ejecutivos
	SET lon=".$_GET['longitud'].", lat=".$_GET['latitud']."
	WHERE login='".$login."'";
	$resultado2 = mysql_query($sql,$dbConn);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Perfil</title>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body topmargin=0 leftmargin=0>


<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
ejecutivos.nom_ejecutiv AS nombre,
ejecutivos.sms1 AS sms1,
ejecutivos.sms2 AS sms2,
ejecutivos.sms3 AS sms3,
ejecutivos.sms4 AS sms4,
ejecutivos.sms5 AS sms5,
ejecutivos.login AS email,
ejecutivos.radio AS radio,
ejecutivos.lat AS latitud,
ejecutivos.lon AS longitud,
ejecutivos.fono_ejecutiv AS fono,
ejecutivos.ciudad_ejecutiv AS ciudad,
ejecutivos.fono_alarma AS fono_alarma,
ejecutivos.departamento AS departamento,
ejecutivos.region AS region,
ejecutivos.dir_ejecutiv AS direccion
FROM `ejecutivos`
WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); 
$telefono_llamar=$rowusr['fono'];
$tengo=0;


?>
<table class="fondo_gris2" width="100%" border="0" cellpadding="0" cellspacing="0">


  <tr>
    <td align="center" ><p class="america_bco">Mi Perfil</p>
      <table class="fondo_bco" width="90%" border="0" cellspacing="0" cellpadding="0" align=center>

  


  <tr>  
  <td width="10%">&nbsp;</td>
    <td>
    <p class="america_14_gris">nombre : &nbsp;<strong><?php echo $rowusr['nombre']; ?></strong></p>
    <p class="america_14_gris">
	<? if ($_GET["dispositivo"]=='android') {?>
		email : &nbsp;
	<?}else{?>
		usuario : &nbsp;
	<?}?>
	<strong><?php echo $rowusr['email']; ?></strong></p>
    <p class="america_14_gris">direcci&oacute;n : &nbsp;<strong><?php echo $rowusr['direccion']; ?></strong></p>
	<p class="america_14_gris">dpt : &nbsp;<strong>
	
			<?$queryubicacion = "SELECT Nombre from ubicacion_departamento WHERE idDepartamento = '".$rowusr['departamento']."'";
		$resultadoubicacion = mysql_query ($queryubicacion, $dbConn);
		$rowubicacion = mysql_fetch_assoc ($resultadoubicacion); 
		echo $rowubicacion["Nombre"];  ?></strong>
	</p>
    <p class="america_14_gris">provincia : &nbsp;<strong>
	
			<?$queryubicacion = "SELECT Nombre from ubicacion_provincia WHERE idProvincia = '".$rowusr['region']."'";
		$resultadoubicacion = mysql_query ($queryubicacion, $dbConn);
		$rowubicacion = mysql_fetch_assoc ($resultadoubicacion); 
		echo $rowubicacion["Nombre"]; ?></strong>
	</p>
    <p class="america_14_gris">distrito : &nbsp;<strong>
	<?$queryubicacion = "SELECT Nombre from ubicacion_distrito WHERE idDistrito = '".$rowusr['ciudad']."'";
		$resultadoubicacion = mysql_query ($queryubicacion, $dbConn);
		$rowubicacion = mysql_fetch_assoc ($resultadoubicacion); 
		echo $rowubicacion["Nombre"]; ?></strong></p>
    <p class="america_14_gris">tel&eacute;fono : &nbsp;<strong><?php echo substr($telefono_llamar,2); ?></strong></p>
    </td>
  </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td width="10%">&nbsp;</td>
    <td align="center">
   
		<a href="usr_perfil_edit.php?id=<?=$_GET['id']?>&perfil=<?=$login?>&imei=<?=$_GET['imei']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>" target="_self">
		<input name="button3" type="submit" value="MODIFICAR" id="post_button" class="bot_orange1" /></a>


	
    </td>
  </tr>
 <tr>
  <td width="10%">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
 </table>

<?
if ( $_POST['que']=="Elimina" ) {
		$query  = "UPDATE ejecutivos SET ".$_POST["cual"]." = '0'	WHERE login     = '$login'";
		$result = mysql_query($query, $dbConn);
}
?>

<div class="height100 widht100">
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT  sms1, sms2, sms3, sms4, sms5,carr1, carr2, carr3, carr4, carr5, nom_ejecutiv FROM ejecutivos WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
	while($rowusr=mysql_fetch_array($resultado)) {
		$sms1_v=$rowusr['sms1'];
		$sms2_v=$rowusr['sms2'];		
		$sms3_v=$rowusr['sms3'];	
		$sms4_v=$rowusr['sms4'];
		$sms5_v=$rowusr['sms5'];	
		$carr1_v=$rowusr['carr1'];
		$carr2_v=$rowusr['carr2'];		
		$carr3_v=$rowusr['carr3'];	
		$carr4_v=$rowusr['carr4'];
		$carr5_v=$rowusr['carr5'];	
		$nombre=$rowusr['nom_ejecutiv'];	
	}
		?>


<tr>
    <td align="center" ><p class="america_bco">Eliminar Contactos <br>(Red de Seguridad)</p>
      <table class="fondo_bco" width="90%" border="0" cellspacing="0" cellpadding="0" align=center>
	  <tr><td>
	        <table class="fondo_bco" width="80%" border="0" cellspacing="0" cellpadding="0" align=center>
<?php  if (isset($errors[1])) {echo $errors[1];}?>






 
  <tr>
    <td >&nbsp;</td>
  </tr>
<form id="fsms1" name="fsms1" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms1'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms1_v<>'0' and $sms1_v<>'') {
	$sql1 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms1_v . "' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
$numeroRegistros=mysql_num_rows($result1); 
if ($numeroRegistros==0)  {?>
	<tr><td  width="90%">Contacto no ha instalado la aplicacion</td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms1_v;?></td> </tr>
<?}else{
	while($data1=mysql_fetch_array($result1)) {?>

	<tr><td width="90%"><?=$data1["nom_ejecutiv"]?></td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms1_v;?><br>

	</td> </tr>

	<?
	}
	} 
}?>
</form>

  <tr>
    <td >&nbsp;</td>
  </tr>

<form id="fsms2" name="fsms2" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms2'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms2_v<>'0' and $sms2_v<>'') {
	$sql2 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms2_v . "' LIMIT 1";
	$result2 = mysql_query($sql2,$dbConn);
	$numeroRegistros=mysql_num_rows($result2); 
if ($numeroRegistros==0)  {?>
		<tr><td  width="90%">Contacto no ha instalado la aplicacion</td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms2_v;?></td> </tr>
<?}else{
	while($data2=mysql_fetch_array($result2)) {?>

		<tr><td width="90%"><?=$data2["nom_ejecutiv"]?></td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms2_v;?></td> </tr>

	<?} 
}

 }?>
</form>
  <tr>
    <td >&nbsp;</td>
  </tr>
<form id="fsms3" name="fsms3" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms3'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms3_v<>'0' and $sms3_v<>'') {
	$sql3 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms3_v . "' LIMIT 1";
	$result3 = mysql_query($sql3,$dbConn);
$numeroRegistros=mysql_num_rows($result3); 
if ($numeroRegistros==0)  {?>
		<tr><td  width="90%">Contacto no ha instalado la aplicacion</td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms3_v;?></td> </tr>
<?}else{
	while($data3=mysql_fetch_array($result3)) {?>

		<tr><td width="90%"><?=$data3["nom_ejecutiv"]?></td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms3_v;?></td> </tr>

	<?} 
}

 }?>
</form>
  <tr>
    <td >&nbsp;</td>
  </tr>
<form id="fsms4" name="fsms4" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms4'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms4_v<>'0' and $sms4_v<>'') {
	$sql4 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms4_v . "' LIMIT 1";
	$result4 = mysql_query($sql4,$dbConn);
$numeroRegistros=mysql_num_rows($result4); 
if ($numeroRegistros==0)  {?>
		<tr><td  width="90%">Contacto no ha instalado la aplicacion</td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms4_v;?>&nbsp;</td> </tr>
<?}else{
	while($data4=mysql_fetch_array($result4)) {?>

		<tr><td width="90%"><?=$data4["nom_ejecutiv"]?></td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms4_v;?><br>
	</td> </tr>

	<?} 
}

 }?>
</form>
  <tr>
    <td >&nbsp;</td>
  </tr>
<form id="fsms5" name="fsms5" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms5'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms5_v<>'0' and $sms5_v<>'') {
	$sql5 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms5_v . "' LIMIT 1";
	$result5 = mysql_query($sql5,$dbConn);
$numeroRegistros=mysql_num_rows($result5); 
if ($numeroRegistros==0)  {?>
		<tr><td  width="90%">Contacto no ha instalado la aplicacion</td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms5_v;?><br>
	</td> </tr>
<?}else{
	while($data5=mysql_fetch_array($result5)) {?>

		<tr><td width="90%"><?=$data5["nom_ejecutiv"]?></td>
	<td width="10%">	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/eliminar.png" value="Eliminar" alt="Eliminar" /></td>
	</tr>
    <tr><td ><?php echo $sms5_v;?><br>
	</td> </tr>

	<?} 
}

}?>
</form>
</table> 
	</td> </tr>
</table> 

 <!-- UBCICACION ACTUAL -->
<table class="fondo_gris2" width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
 <?php if ($_GET['latitud']!=0){?>
    <td align="center" ><center><p class="america_bco">Mi ubicacion actual</p></center>
      <p class="america_bco"> 
	  <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>
    <script type="text/javascript">  
    function inicializar() {  
        if (GBrowserIsCompatible()) {  
            var map = new GMap2(document.getElementById("map"));  
            map.setCenter(new GLatLng(<?php echo $_GET['latitud']; ?>, <?php echo $_GET['longitud']; ?>), 15);  
        }  
        map.addOverlay(new GMarker(new GLatLng(<?php echo $_GET['latitud']; ?>, <?php echo $_GET['longitud']; ?>)));  
    } 
    </script> 
    <div id="map" style="width:100%; height:350px; margin-top:10px; ">  
    <script type="text/javascript">inicializar();</script>  
    </div></p></td>
<?php } else {?>
    <td>
    <h1>El usuario no activo su GPS</h1>

	</td>
    <?php } ?>  
  </tr>
</table>

<!-- UBCICACION ACTUAL -->

</td>
  </tr>


</table>


   






</body>
</html>