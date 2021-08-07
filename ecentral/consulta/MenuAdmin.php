<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
    include("conectar_bd.php"); 
    conectar_bd();
    include("conectar_np.php"); 
?>
<?php
//VALIDACION
    $sql = "SELECT * FROM tbl_users WHERE id_usuario = '".$_SESSION['uid']."'"; 
    $result =mysql_query($sql,$conexio);
$numeroRegistros=mysql_num_rows($result); 
if ($numeroRegistros==0)  {
	?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="1">
        </form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>
<?}

//VALIDACION
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$g_pagina?></title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />


    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/infogrid.js'></script>   
    
    
</head>
<?php
/*    $usuario = $_POST['Usr'];
    $password = $_POST['Pass'];
	$uid = $_POST['idUsr'];
*/
 $fecha = date("d/m/Y"); 
?>

<body >
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="./images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ciudadana<br />
            <span class="Arial2_red">Uso Exclusivo de la <?=$g_nombre_muni?></span></td>
          <td width="15%" align="center" valign="middle" class="fecha"><?php echo $fecha ?></td>
        </tr>
        <tr>
          <td  colspan="3" align="center" valign="middle" class="borde_button"></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF"><form action="checklogin.php" method="post" name="form1" id="form1">
				 <input type="hidden" name="idUsr" value='<?php echo $uid ?>' />
				 <input type="hidden" name="usuario" value='<?php echo $usr ?>' />
				 <input type="hidden" name="password" value='<?php echo $pw ?>' />
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="3" class="Arial4">Men&uacute; Administración</td>
                      </tr>
                    <tr>
                      <td width="106">&nbsp;</td>
                      <td width="39">&nbsp;</td>
                      <td width="151" height="25">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Agregar usuario</span></td>
                      <td>&nbsp;</td>
                      <td height="25"><input type="button" class="rojo_sombra_newus" value=" Agregar&nbsp;Usuario" onclick="parent.location='registro.php'" /></td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Listar Usuario</span></td>
                      <td>&nbsp;</td>
                      <td><input type="button" class="rojo_sombra_uslst" value=" Listar&nbsp; Usuario &nbsp;&nbsp;" onclick="parent.location='listadusuarios.php'" /></td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Agregar Glosas</span></td>
                      <td>&nbsp;</td>
                      <td><input type="button" class="rojo_sombra_uslst" value=" Agregar&nbsp;Glosas&nbsp;" onclick="parent.location='glosas.php'" /></td>
                    </tr>
                    <tr>
                      <td class="Arial2">Volver </td>
                      <td>&nbsp;</td>
                      <td class="Arial2_red"><input type="button" class="rojo_sombra_configura" value="Volver" onclick="javascript:window.history.back();" /></td>
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
        <tr>
          <td colspan="3" align="center" valign="middle" bgcolor="#666666" class="Arial3"><p>&nbsp;</p>
          <p><img src="images/logo_sm_bco.png" width="100" height="33" /></p>
          <p>2013 Todos los Derechos reservados. <?=$g_nombre_muni?></p>
          <p>&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
</body>
</html>
