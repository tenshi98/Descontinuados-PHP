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

<div class="widht80 fcenter perfil">


<div class="height100 widht100">
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT  sms1, sms2, sms3, sms4, sms5, nom_ejecutiv FROM ejecutivos WHERE ejecutivos.login = '".$login."' and dispositivo='android'";
$resultado = mysql_query ($query, $dbConn);
	while($rowusr=mysql_fetch_array($resultado)) {
		$sms1=$rowusr['sms1'];
		$sms2=$rowusr['sms2'];		
		$sms3=$rowusr['sms3'];	
		$sms4=$rowusr['sms4'];
		$sms5=$rowusr['sms5'];	
		$nombre=$rowusr['nom_ejecutiv'];	
	}
		?>


<div class="widht80 fcenter perfil">



<h1>Solicitar Ubicacion (Solo Android)</h1>



<table class="table_msg">
 
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>

<? if ($sms1<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms1 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	while($data1=mysql_fetch_array($result1)) {?>
	<form id="fsms1" name="fsms1" action="ubicar.php?telefono=<?=$data1["fono_ejecutiv"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
	<tr><td colspan="2"><?=$data1["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms1;?><br>
	<center>
	<input type="hidden" name="que" value='Donde Estas'>
	<input id="Elimina" name="Elimina" type="image" src="../images/mytracks_icon.png" value="Donde Estas" alt="Donde Estas" />
	</center>
	</td> </tr>
</form>
	<?
	}
}?>

<? if ($sms2<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms2 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	while($data1=mysql_fetch_array($result1)) {?>
		<form id="fsms12" name="fsms1" action="ubicar.php?telefono=<?=$data1["fono_ejecutiv"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
	<tr><td colspan="2"><?=$data1["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms2;?><br>
	<center>
	<input type="hidden" name="que" value='Donde Estas'>
	<input id="Elimina" name="Elimina" type="image" src="../images/mytracks_icon.png" value="Donde Estas" alt="Donde Estas" />
	</center>
	</td> </tr>
</form>
	<?
	}
}?>

<? if ($sms3<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms3 . "'  and dispositivo='android' LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	while($data1=mysql_fetch_array($result1)) {?>
		<form id="fsms13" name="fsms1" action="ubicar.php?telefono=<?=$data1["fono_ejecutiv"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
	<tr><td colspan="2"><?=$data1["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms3;?><br>
	<center>
	<input type="hidden" name="que" value='Donde Estas'>
	<input id="Elimina" name="Elimina" type="image" src="../images/mytracks_icon.png" value="Donde Estas" alt="Donde Estas" />
	</center>
	</td> </tr>
</form>
	<?
	}
}?>

<? if ($sms4<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms4 . "'  and dispositivo='android'  LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	while($data1=mysql_fetch_array($result1)) {?>
		<form id="fsms14" name="fsms1" action="ubicar.php?telefono=<?=$data1["fono_ejecutiv"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
	<tr><td colspan="2"><?=$data1["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms4;?><br>
	<center>
	<input type="hidden" name="que" value='Donde Estas'>
	<input id="Elimina" name="Elimina" type="image" src="../images/mytracks_icon.png" value="Donde Estas" alt="Donde Estas" />
	</center>
	</td> </tr>
</form>
	<?
	}
}?>

<? if ($sms5<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms5 . "'  and dispositivo='android'  LIMIT 1";
	$result1 = mysql_query($sql1,$dbConn);
	while($data1=mysql_fetch_array($result1)) {?>
		<form id="fsms15" name="fsms1" action="ubicar.php?telefono=<?=$data1["fono_ejecutiv"]?>&id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" > 
	<tr><td colspan="2"><?=$data1["nom_ejecutiv"]?></td></tr>
    <tr><td colspan="2"><?php echo $sms5;?><br>
	<center>
	<input id="donde" name="donde" type="image" src="../images/mytracks_icon.png" value="Donde Estas" alt="Donde Estas" />
	</center>
	</td> </tr>
</form>
	<?
	}
}?>
</table>  

   
<br>
    <div class="widht80 fcenter">
		<a href="http://<?=$nombreurl?>/app/gracias_cel_01.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>"" target="_self">
		<input name="submit" type="button" value="Volver" id="post_button" /></a>
	</div>
<br>


</div> 

</div>
</body>
</html>