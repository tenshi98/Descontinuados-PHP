<?php session_start();
require("../nombre_pag.php");
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
	$nom_ejecutiv=$registro_id["nom_ejecutiv"];
	}
}
/**********************************************************************************************************************************/
/*                                                   Actualizo los registroa                                                      */
/**********************************************************************************************************************************/
// Se edita el area en la base de datos



if ( $_POST['que']=="Elimina" ) {
		$query  = "UPDATE ejecutivos SET ".$_POST["cual"]." = '0'	WHERE login     = '$login'";
		$result = mysql_query($query, $dbConn);
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

<?
if ( $_POST['que']=="Invita" ) {
		$query  = "UPDATE ejecutivos SET ".$_POST["cual"]." = '".$_POST["fono_ejecutiv"]."'	WHERE login     = '$login'";
		$result = mysql_query($query, $dbConn);
		$strBody = "quiero invitarte a instalar el sistema SOSCLICK en tu celular, para instalar, debes entrar al siguiente link http://www.sosclick.cl/app/sosclick.apk";
		$query  = "select * from  ejecutivos where fono_ejecutiv= '09".$_POST["fono_ejecutiv"]."'";
		$result = mysql_query($query, $dbConn);
		$existe_telefono=mysql_num_rows($result); 
	if ($existe_telefono==0)  {
		?>
		<!--iframe name="poto" frameborder=0 width="0" height="0" src="http://sms.sistek.cl/sms.aspx?id=12&text=<?=$strBody?>&to_number=<?=$_POST["fono_ejecutiv"]?>&username=9871944&password=8797744"></iframe--> 
		<iframe name="poto" frameborder=0 width="0" height="0" src="sms:+569<?=$_POST["fono_ejecutiv"]?>"></iframe> 


<!--iframe name="poto" frameborder=0 width="0" height="0" src="sms:<?=$_POST["fono_ejecutiv"]?>"></iframe--> 

	<?} else {

//INVITACION SI EXISTE
	$messageText = $_POST["nombre"].", te ha registrado para recibir sus alertas.";
	$collapseKey = $_POST["fono_ejecutiv"];
	$link = "http://".$nombreurl;
	$apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';
	$sql = "SELECT gcmcode FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $_POST["fono_ejecutiv"] . "' LIMIT 1";
	$result = mysql_query($sql,$dbConn);
	while($data=mysql_fetch_array($result)) 
	{
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);
   $data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		}
	} 
//INVITACION SI EXISTE



	}


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


<h1>Agregar o Eliminar Contactos</h1>


<table class="table_msg">
 
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
<form id="fsms1" name="fsms1" action="invitaciones.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
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
 }else{?>

 <tr><td colspan="2">Vac&iacute;o</td></tr>
    <tr><td colspan="2">09 - <input type="tel" name="fono_ejecutiv" placeholder="Tel&eacute;fono Movil" autocomplete="off">
<br>
	<center>
	<input type="hidden" name="que" value='Invita'>
	<input id="Invita" name="Invita" type="image" src="images/invita4.png" value="Invitar" alt="Invitar" />
	</center>
	</td></tr>

 <?}?>
</form>

<form id="fsms2" name="fsms2" action="invitaciones.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
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
 }else{?>

 <tr><td colspan="2">Vac&iacute;o</td></tr>
    <tr><td colspan="2">09 - <input type="tel" name="fono_ejecutiv" placeholder="Tel&eacute;fono Movil" autocomplete="off">
<br>
	<center>
	<input type="hidden" name="que" value='Invita'>
	<input id="Invita" name="Invita" type="image" src="images/invita4.png" value="Invitar" alt="Invitar" />
	</center>
	</td></tr>

 <?}?>
</form>

<form id="fsms3" name="fsms3" action="invitaciones.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
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
 }else{?>

 <tr><td colspan="2">Vac&iacute;o</td></tr>
    <tr><td colspan="2">09 - <input type="tel" name="fono_ejecutiv" placeholder="Tel&eacute;fono Movil" autocomplete="off">
<br>
	<center>
	<input type="hidden" name="que" value='Invita'>
	<input id="Invita" name="Invita" type="image" src="images/invita4.png" value="Invitar" alt="Invitar" />
	</center>
	</td></tr>

 <?}?>
</form>

<form id="fsms4" name="fsms4" action="invitaciones.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
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
 }else{?>

 <tr><td colspan="2">Vac&iacute;o</td></tr>
    <tr><td colspan="2">09 - <input type="tel" name="fono_ejecutiv" placeholder="Tel&eacute;fono Movil" autocomplete="off">
<br>
	<center>
	<input type="hidden" name="que" value='Invita'>
	<input id="Invita" name="Invita" type="image" src="images/invita4.png" value="Invitar" alt="Invitar" />
	</center>
	</td></tr>

 <?}?>
</form>

<form id="fsms5" name="fsms5" action="invitaciones.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
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
 }else{?>

 <tr><td colspan="2">Vac&iacute;o</td></tr>
    <tr><td colspan="2">09 - <input type="tel" name="fono_ejecutiv" placeholder="Tel&eacute;fono Movil" autocomplete="off">
<br>
	<center>
	<input type="hidden" name="que" value='Invita'>
	<input id="Invita" name="Invita" type="image" src="images/invita4.png" value="Invitar" alt="Invitar" />
	</center>
	</td></tr>

 <?}?>
</form>

</table>  

   



</div> 

</div>
</body>
</html>