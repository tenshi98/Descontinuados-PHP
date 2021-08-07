<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();

if(!session_is_registered(myusernam)){
header("location:login.php");
}

require_once('../nombre_pag.php');
require_once('../conexion2.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
        <head>
<style type="text/css">
<!--
ul {
        list-style: none;
        margin: 0;
        padding: 0;
        }

/* =-=-=-=-=-=-=-[Menu Three]-=-=-=-=-=-=-=- */

#menu3 {
        width: 240px;
        border: 0px solid #ccc;
        margin: 8px;
        }

#menu3 li a {
          voice-family: "\"}\"";
          voice-family: inherit;
          height: 32px;
          font-weight: bold;
        text-decoration: none;
        }

#menu3 li a:link, #menu3 li a:visited {
        color: #FFF;
        display: block;
        background: url(./images/boton_menu1.gif);
        padding: 7px 0 0 16px;
        }

#menu3 li a:hover, #menu3 li #current, #menu3 li a:active {
        color: #FFFFDD;
        background: url(./images/boton_menu1.gif) 0 -36px;
        padding: 7px 0 0 16px;
        }
-->
</style>
<link href="estilo2.css" rel="stylesheet" type="text/css" />
</head>
<body class="body">
<?
$vusuar=$_GET["us"];
$idusuario1="";
$typeuser1="";
$mailusuario1="";
// echo "AQUI VAMOS " .$vusuar."<BR />";
$sql="SELECT idusuar, tipousuar, correousuar FROM atderivadores WHERE usuarlog=".$vusuar ;
$result=mysql_query($sql, $base);
while($fila2=mysql_fetch_array($result))  {
     $typeuser1=trim($fila2["tipousuar"]);
	 $idusuario1=trim($fila2["idusuar"]);
	 $mailusuario1=trim($fila2["correousuar"]);
}
	
?>
<table width="990" height="66" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#2C6F96"><p class="Titulo">Consulta Virtual</p></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#333333"><p class="txt_footer">P&aacute;gina para uso exclusivo del Personal Municipal</p></td>
  </tr>
</table>
<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"><p>&nbsp;</p>
      <table id="table1" border="0" height="163" width="834">
      <tbody>
        <tr><td align="center" valign="middle">
<div id="menu3">
<ul>
 <!-- CSS Tabs -->

<? if ($typeuser1 == '3') { ?>
<li><a href="piderut.php" class="bot_sombra_ch">Buscar por RUT</a></li>
<img src="images/espacio.gif" height="2" border="0" />
<!-- li><a href="audiencia.html" class="bot_sombra_ch">Buscar por Nombre</a></li> 
<img src="images/espacio.gif" height="2" border="0" />
<li><a href="manten_audiencia.php?t=<?=$typeuser1?>&u=<?=$idusuario1?>" class="bot_sombra_ch">Mantenci&oacute;n &nbsp;de&nbsp; Peticiones &nbsp;de&nbsp; Audiencia</a></li>
<img src="images/espacio.gif" height="2" border="0" />
<? } ?>
<li><a href="manten_atvirtual.php?t=<?=$typeuser1?>&u=<?=$idusuario1?>" class="bot_sombra_ch">Mantenci&oacute;n Atenciones Virtuales</a></li>
<img src="images/espacio.gif" height="2" border="0" />
<li><a href="estadistico00.php" class="bot_sombra_ch">Estad&iacute;sticas Atenci&oacute;n Virtual</a></li>
<img src="images/espacio.gif" height="2" border="0" /-->
<li><a href="changepass.php" class="bot_sombra_ch">Cambio de Claves</a></li>
</ul>
</div>
		  </td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#2C6F96"><p class="txt_footer">Página para uso exclusivo de Personal Municipal</p></td>
  </tr>
</table>
</body>
</html>