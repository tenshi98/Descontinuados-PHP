<?
require_once('../nombre_pag.php');
require_once('../conexion.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$g_pagina?></title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />


    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='./js/infogrid.js'></script>   
    
    <script src="../scripts/jquery171.js" type="text/javascript"></script>
    <script src="../scripts/jquery.validate.js" type="text/javascript"></script>
    <script src="../scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="../scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />
     
    <script type="text/javascript">
    <!--
        $().ready(function() {
            $("#frmlogin").validate();
            $("#usuario").focus();
        });
    // -->
    </script>
     
    
</head>
<?php
 $fecha = date("d/m/Y"); 
$room= substr(md5(uniqid(rand())),0,10);
?>
<body >

<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" >
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">



        <tr>
          <td  colspan="3" align="center" valign="middle" class="borde_button"></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" height="191" align="left" ><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="115"><img src="http://<?=$g_nombreurl?>/images/candado.png" width="85" height="143" /></td>
                    <td width="168" align="left" valign="middle" class="Arial2">Ingrese su Correo con el que se registro, la password le llegar&aacute; a su correo (revise tambien su bandeja de SPAM).</td>
                  </tr>
                  </table></td>
                <td width="481" align="center">
				<form id="chat" name="chat"  method="POST" action="index1.php?room=<?=$room?>">
				<input type='hidden' name='invita' value='SI'>
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="4" class="Arial2"><span class="Arial4">Ingrese para Chat</span></td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="20">&nbsp;</td>
                      <td height="25" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="Arial2">Correo</td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2"><input name="usuario" type="text" class="tabla_cont_social required" id="usuario" size="50" maxlength="50" onkeypress="return isAlpha(event);" value="" /></td>
                    </tr>
                    
					<tr>
                      <td>&nbsp;</td><td >&nbsp;</td><td height="18" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><input type="submit" class="rojo_sombra" value="Enviar Invitacion" /> &nbsp; &nbsp; &nbsp; &nbsp;
                          <input type="reset" class="rojo_sombra" value="Limpiar" /></td>
                      <td align="right"></td>
                    </tr>

                    </table>
                </form></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle">&nbsp;</td>
        </tr>

      </table></td>
  </tr>
</table>
</div>
</body>
</html>
