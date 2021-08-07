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
if($revision == 0){
	header( "Location: login.php?id=".$_GET['id']."&longitud=".$_GET['longitud']."&latitud=".$_GET['latitud'].'&imei='.$_GET['imei'] );
	die;
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
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="height100 widht100">
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
ejecutivos.region AS region,
ejecutivos.dir_ejecutiv AS direccion
FROM `ejecutivos`
WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); 
$telefono_llamar=substr($rowusr['fono'], -8);
$tengo=0;

$qry="select descripcion from regiones where region=".$rowusr['region'];
	
$resultadodesc = mysql_query ($qry, $dbConn);
$rowdesc = mysql_fetch_assoc ($resultadodesc); 

?>
<div class="widht80 fcenter perfil">

<table class="table_msg">
  <tr>
    <td><h1>Detalles de mi perfil</h1></td>
  </tr>
 
  <tr>
    <td>
    <h1>Datos Basicos</h1>
    <p><strong>Nombre : </strong>&nbsp;<?php echo $rowusr['nombre']; ?></p>
    <p><strong>Email : </strong>&nbsp;<?php echo $rowusr['email']; ?></p>
    <p><strong>Direccion : </strong>&nbsp;<?php echo $rowusr['direccion']; ?></p>
    <p><strong>Region : </strong>&nbsp;<?php echo $rowdesc['descripcion']; ?></p>
    <p><strong>Comuna : </strong>&nbsp;<?php echo $rowusr['ciudad']; ?></p>
    <p><strong>Fono : </strong>&nbsp;<?php echo $telefono_llamar; ?></p>
	<p><strong><span color="#FF0000">Fono Alarma : </span></strong>&nbsp;<?php echo $rowusr['fono_alarma']; ?></p>
    </td>
  </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <div class="widht80 fcenter">
		<a href="usr_perfil_edit.php?id=<?=$_GET['id']?>&perfil=<?=$login?>&imei=<?=$_GET['imei']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>" target="_self">
		<input name="submit" type="button" value="Modificar Datos" id="post_button" /></a>
	</div>
    </td>
  </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
 


</table>



</div>


</div>
<?
if ( $_POST['que']=="Elimina" ) {
		$query  = "UPDATE ejecutivos SET ".$_POST["cual"]." = '0'	WHERE login     = '$login'";
		$result = mysql_query($query, $dbConn);
}
?>

<div class="height100 widht100">
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT  sms1, sms2, sms3, sms4, sms5, nom_ejecutiv FROM ejecutivos WHERE ejecutivos.login = '".$login."'";
$resultado = mysql_query ($query, $dbConn);
	while($rowusr=mysql_fetch_array($resultado)) {
		$sms1_v=$rowusr['sms1'];
		$sms2_v=$rowusr['sms2'];		
		$sms3_v=$rowusr['sms3'];	
		$sms4_v=$rowusr['sms4'];
		$sms5_v=$rowusr['sms5'];	
		$nombre=$rowusr['nom_ejecutiv'];	
	}
		?>


<div class="widht80 fcenter perfil">
<?php  if (isset($errors[1])) {echo $errors[1];}?>


<h1>Eliminar Contactos (Red de Seguridad)</h1>


<table class="table_msg">
 
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
<form id="fsms1" name="fsms1" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms1'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms1_v<>'0' and $sms1_v<>'') {
	$sql1 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms1_v . "' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
$numeroRegistros=mysql_num_rows($result1); 
if ($numeroRegistros==0)  {?>
	<tr><td colspan="2">Contacto no ha instalado la aplicacion</td></tr>
    <tr><td colspan="2"><?php echo $sms1_v;?>&nbsp;<!--a href="tel:<?=$sms1_v?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/llama2_full_up.png',1)"><img src="images/llama2_full.png" width="300" height="89" id="Image1" /></a--><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>
<?}else{
	while($data1=mysql_fetch_array($result1)) {?>

	<tr><td colspan="2"><?=$data1["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms1_v;?><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>

	<?
	}
	} 
}?>
</form>

<form id="fsms2" name="fsms2" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms2'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms2_v<>'0' and $sms2_v<>'') {
	$sql2 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms2_v . "' LIMIT 1";
	$result2 = mysql_query($sql2,$dbConn);
	$numeroRegistros=mysql_num_rows($result2); 
if ($numeroRegistros==0)  {?>
	<tr><td colspan="2">Contacto no ha instalado la aplicacion</td></tr>
    <tr><td colspan="2"><?php echo $sms2_v;?>&nbsp;<!--a href="tel:<?=$sms2_v?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/llama2_full_up.png',1)"><img src="images/llama2_full.png" width="300" height="89" id="Image1" /></a--><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>
<?}else{
	while($data2=mysql_fetch_array($result2)) {?>

	<tr><td colspan="2"><?=$data2["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms2_v;?><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>

	<?} 
}

 }?>
</form>

<form id="fsms3" name="fsms3" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms3'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms3_v<>'0' and $sms3_v<>'') {
	$sql3 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms3_v . "' LIMIT 1";
	$result3 = mysql_query($sql3,$dbConn);
$numeroRegistros=mysql_num_rows($result3); 
if ($numeroRegistros==0)  {?>
	<tr><td colspan="2">Contacto no ha instalado la aplicacion</td></tr>
    <tr><td colspan="2"><?php echo $sms3_v;?>&nbsp;<!--a href="tel:<?=$sms3_v?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/llama2_full_up.png',1)"><img src="images/llama2_full.png" width="300" height="89" id="Image1" /></a--><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>
<?}else{
	while($data3=mysql_fetch_array($result3)) {?>

	<tr><td colspan="2"><?=$data3["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms3_v;?><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>

	<?} 
}

 }?>
</form>

<form id="fsms4" name="fsms4" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms4'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms4_v<>'0' and $sms4_v<>'') {
	$sql4 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms4_v . "' LIMIT 1";
	$result4 = mysql_query($sql4,$dbConn);
$numeroRegistros=mysql_num_rows($result4); 
if ($numeroRegistros==0)  {?>
	<tr><td colspan="2">Contacto no ha instalado la aplicacion</td></tr>
    <tr><td colspan="2"><?php echo $sms4_v;?>&nbsp;<!--a href="tel:<?=$sms4_v?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/llama2_full_up.png',1)"><img src="images/llama2_full.png" width="300" height="89" id="Image1" /></a--><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>
<?}else{
	while($data4=mysql_fetch_array($result4)) {?>

	<tr><td colspan="2"><?=$data4["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms4_v;?><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>

	<?} 
}

 }?>
</form>

<form id="fsms5" name="fsms5" action="usr_perfil.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
<input type="hidden" name="cual" value='sms5'>
<input type="hidden" name="nombre" value='<?=$nombre?>'>
<? if ($sms5_v<>'0' and $sms5_v<>'') {
	$sql5 = "SELECT login,nom_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms5_v . "' LIMIT 1";
	$result5 = mysql_query($sql5,$dbConn);
$numeroRegistros=mysql_num_rows($result5); 
if ($numeroRegistros==0)  {?>
	<tr><td colspan="2">Contacto no ha instalado la aplicacion</td></tr>
    <tr><td colspan="2"><?php echo $sms5_v;?>&nbsp;<!--a href="tel:<?=$sms5_v?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/llama2_full_up.png',1)"><img src="images/llama2_full.png" width="300" height="89" id="Image1" /></a--><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>
<?}else{
	while($data5=mysql_fetch_array($result5)) {?>

	<tr><td colspan="2"><?=$data5["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms5_v;?><br>
	<center>
	<input type="hidden" name="que" value='Elimina'>
	<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" />
	</center>
	</td> </tr>

	<?} 
}

}?>
</form>

</table>  

   



</div> 

</div>
</body>
</html>