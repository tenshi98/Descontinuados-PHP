<?php
session_start();
require_once('../nombre_pag.php');
require_once('../conexion.php');

$resultado22=mysql_query("update ejecutivos set estado_fono='0' where login='" . $_GET["cierro"] . "'",$base); 
?>

<html>
	<head>
<!--#include file="../nombre_pag.asp"-->
<title>.:: <?=$pagina?> ::.</title>
<link href="../estilo.css" rel="stylesheet" type="text/css">
	</head>
			
<body  topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
	

<div align="center">
<table id="Tabla_01" width="284" border="0" cellpadding="0" cellspacing="0">
	<tr height="20">
		<td height="20" align="left" valign="top"><!--- Borde Superior --->
    <img src="../images/pop_01.png" width="20" height="20" alt=""></td>
	  <td height="20" align="left" valign="top" background="../images/pop_02.png" style="background-position:top; background-repeat:repeat-x">&nbsp;</td>
		<td width="21" height="20" align="left" valign="top">
			<img src="../images/pop_03.png" width="20" height="20" alt=""></td>
	</tr>
    <tr><td width="20" align="left" valign="top" background="../images/pop_04.png" style="background-position:left; background-repeat:repeat-y;"><br /></td>
    <td align="left" valign="top" bgcolor="#F2F2F2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top" class="Estilo1"><img src="../images/logo_chico.png" ></td>
        </tr>
    </table></td>
    <td align="left" valign="top" background="../images/pop_06.png" style=" background-repeat:repeat-y; background-position:right;" width="21"><br /></td>
    </tr>
	<tr>
	  <td width="20" align="left" valign="top" background="../images/pop_04.png" style="background-position:left; background-repeat:repeat-y;">
        <!--- Menu Lateral Izquierdo --->
        <!--- FIN Menu Lateral Izquierdo --->
	  </td>
	  <td height="120" align="center" valign="top" bgcolor="#F2F2F2">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td align="center" class="Estilo3">
			<table width="95%" border="0" cellpadding="0" cellspacing="0">
		      <tr>
		        <td height="80" align="right" class="Estilo3" width="60%"><span class="arial_10_neg_bold">Posici&oacute;n de Teléfono Cerrada</span><span class="Estilo4">.</span></td>
		        <td width="31%" align="center"><img src="../images/desactiva_bot.png" width="60" height="62"></td>
		        </tr>
		      <tr>
		        <td height="80" colspan="2" align="center" valign="middle" class="arial_10_neg_bold"><span class="arial_10_neg_bold">Ya no recibiendo llamadas.<br>
		         </span></td>
		        </tr>
		      <tr>
		        <td height="20" colspan="2" align="center" valign="middle" class="Estilo3"><span class="arial_10_neg_bold">Puedes cerrar esta ventana</span></td>
		        </tr>
	        </table></td>
	      </tr>
		  <tr>
		    <td height="20" align="center" valign="bottom"><a href="#" 
            onClick="javascript:window.close();" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen7','','../images/cerrar_up.png',1)"><img src="../images/cerrar.png" name="Imagen7" width="88" height="30" border="0"></a></td>
	      </tr>
		  </table>
		  <!--- Area de Contenidos --->
        
        
<!--- Fin  Area de Contenidos ---></td>
		<td align="left" valign="top" background="../images/pop_06.png" style=" background-repeat:repeat-y; background-position:right;">
	  </td>
	</tr>
	<tr height="25"><!--- Borde Inferior --->
		<td height="25" align="left" valign="top"><img src="../images/pop_07.png" width="20" height="25" alt=""></td>
	  <td align="left" valign="top" background="../images/pop_08.png" style="background-position:top; background-repeat:repeat-x"></td>
		<td height="25" align="left" valign="top">
			<img src="../images/pop_09.png" width="20" height="25" alt=""></td>
	</tr>
  </table>
</div>
</body>
</html>