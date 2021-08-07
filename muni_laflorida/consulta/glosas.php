<?php
session_start();
    include("conectar_bd.php"); 
    conectar_bd();
    include("conectar_np.php"); 

$fecha = date("d/m/Y");
$grabada=0;
if ($_POST["posteo"]==1) {
	$sql="insert into wf_glosas (descrip_glosa) values ('".$_POST["descripcion"]."')";
	mysql_query($sql,$conexio);
	$grabada=1;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>San Miguel == Consulta Vecinos == Registrar Usuario </title>
 
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

 <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
 
    <script src="./scripts/jquery171.js" type="text/javascript"></script>
    <script src="./scripts/jquery.validate.js" type="text/javascript"></script>
    <script src="./scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="./scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />
 
 
</head>
<body>
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="./images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ciudadana<br />
            <span class="Arial2_red">Uso Exclusivo de la Municipalidad de San Miguel</span></td>
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
                <td width="481" align="left" bgcolor="#FFFFFF">

<table align="center" width="600px">
 
<tr>
    <td colspan="2" align="center"><span class="Arial4">Registrar Nuevas Glosas</span></td>
</tr>
 
<tr>
    <td colspan="2" class="Arial2">Las Glosas son utilizadas en la descripci&oacute;n fija<br> que usa el sistema en los Flujos de Trabajo <b>(WF)</b>.
    </td>
</tr>
<tr><td colspan="2" align="right" valign="middle" class="borde_button"><input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="location='principal.php'"/>&nbsp;&nbsp;&nbsp;</td></tr>
     
<form id="registrar_usuario" name="registrar_usuario"  method="POST" action="glosas.php">    
<input type=hidden name=posteo value=1>
     	<tr><td colspan="2">&nbsp;</td></tr>
			<?if ($grabada==1) {?>
				<tr><td colspan="2"><span class="Arial2_red">Registro Grabado</span></td></tr>
			<?}else{?>
				<tr><td colspan="2">&nbsp;</td></tr>
			<?}?>
    <tr>
        <td class="Arial2"><label for="tx_nombre">Descripci&oacute;n de la Glosa</label></td>
        <td>
            <input type="text" name="descripcion" id="descripcion"  size="30"  maxlength="150" />
        </td>
    </tr>
    
	<tr><td colspan="2">&nbsp;</td></tr>
 	<tr><td colspan="2">&nbsp;</td></tr>
<tr>
 
    <td align="center" colspan="2">
        <input type="button" onClick="javascript:window.history.back();" name="cancelar" value="Cancelar y Volver" class="rojo_sombra" >
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="registrarme" value="Guardar Glosa" class="rojo_sombra">
    </td>
</tr>
 
</table>
</form>
</td>
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