<?
require("../conexion.php");
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];
$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		  $sms1=$fila['sms1'];
		  $sms2=$fila['sms2'];
		  $sms3=$fila['sms3'];
		  $sms4=$fila['sms4'];
		  $sms5=$fila['sms5'];
		}

if ($_GET["id"]<>'') {
		$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);
}


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css"  rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>
	        
</head>

<body >

	<div class="alto_50">
	<table width="100%" border="0" height="49%" cellspacing="0" cellpadding="0"  valign="middle">
  <tr>
    <td width="30%" align="center" valign="middle">&nbsp;</td>


    <td width="40%" align="center"  valign="middle" bgcolor="#DF7401"  height="25%" class="sombra_interna">
	<!-- carrete2 -->
	<form name="formucarrete" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Carrete Sano">
	<a href="#" onclick="document.formucarrete.submit(); return false" ><img src="images/carrete2.png" width="31%" id="Image5" border=0 align="center" /></a>
	</form>
	<!-- carrete2 -->
</td>



<td width="30%" align="center" valign="middle">&nbsp;</td>
    </tr>
</table>





<br><br><br>
<center>
<h1>Pedir Ubicacion</h1>
</center>

<table class="table_msg">
 
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>

<? if ($sms1<>'0') {
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms1 . "' LIMIT 1";
	$result1 = mysql_query($sql1,$base);
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
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms2 . "' LIMIT 1";
	$result1 = mysql_query($sql1,$base);
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
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms3 . "' LIMIT 1";
	$result1 = mysql_query($sql1,$base);
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
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms4 . "' LIMIT 1";
	$result1 = mysql_query($sql1,$base);
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
	$sql1 = "SELECT login,nom_ejecutiv,fono_ejecutiv FROM ejecutivos WHERE fono_ejecutiv='09" . $sms5 . "' LIMIT 1";
	$result1 = mysql_query($sql1,$base);
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





</div>





</body>
</html>

