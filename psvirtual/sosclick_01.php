<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once('nombre_pag.php');
require_once('conexion.php');


$sql ="SELECT * FROM ejecutivos WHERE login='" . $_GET["login"] . "' AND pass='" . $_GET["pass"] . "'";

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos, debera confirmar sus datos en el sitio,\n desintalar e instalar la aplicacion.");
			window.location = "http://<?=$nombreurl?>";
		</SCRIPT>
<?
}else{
		while($fila=mysql_fetch_array($res))
		{
		
		  $nombre=$fila['nom_ejecutiv'];
		  $correo_ejecutivo=$fila['mail_ejecutiv'];
		  $id=$fila['id_ejecutiv'];
		  $_SESSION['usuario']=$fila['id_ejecutiv'];
		  $correo=$fila['nom_ejecutiv'];
		  $login=$fila['login'];
		  $foto=$fila["foto"];
		  $telefono=$fila["fono_ejecutiv"];
		  $sms1=$fila["sms1"];
		  $sms2=$fila["sms2"];
		  $sms3=$fila["sms3"];

				$sql2="select * from tipo_usuario where tipo='". $fila['tipo_usuario'] ."'";
				$res2=mysql_query($sql2,$base); 
					while($fila2=mysql_fetch_array($res2))
					{
						$descripcion=$fila2["descripcion"];
						$anexo_ip=$fila2["anexo_ip"];
						$click2call=$fila2["click2call"];
						$correos=$fila2["correos"];
						$existe=1;
					}

		}

}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--#include file="nombre_pag.asp"-->
<title>.:: <?=$pagina?> ::.</title>

<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<script src="AC_RunActiveContent.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>

<body topmargin=0 leftmargin=0>
		<div align="center">
	<table border="0" width="98%" cellspacing="0" cellpadding="0" id="table5" height="25">
				<tr>
			<td align="center"  valign="middle" ><b><?=$nombre?></b></td>
			</tr>

	</table>

<table border="0" width="98%" cellspacing="0" cellpadding="0" id="table5" height="49">
				<tr>
			<td align=right valign="bottom" colspan="3"><p align="center"><b><font color="#000080">Si el <b><?=$telefono?></b> numero no corresponde al que deseas que se comunique, deberas ingresar a <?=$nombreurl?> con tu cuenta y modificarlo en la administracion.</font></b>
			</td>
	</tr>
	</table>


</div>

</body>
</html>
