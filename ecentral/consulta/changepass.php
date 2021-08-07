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
            <input type="hidden" name="msg_error" value="2">
        </form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>
<?}

//VALIDACION
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?=$g_pagina?></title>
     
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="./css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
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
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Vecinos<br />
            <span class="Arial2_red">Uso Exclusivo de la <?=$g_nombre_muni?></span></td>
          <td width="15%" align="center" valign="middle" class="fecha">24/08/2013</td>
        </tr>
        <tr>
          <td  colspan="3" align="center" valign="middle" class="borde_button"></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" height="191" align="left" ><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="115"><img src="./images/candado.png" width="85" height="143" /></td>
                    <td width="168" align="left" valign="middle" class="Arial2">Cambie su clave y conf&iacute;rmela reingres&aacute;ndola</td>
                  </tr>
                  </table></td>
                <td width="481" align="center">





<form name='cambia' method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
<table align="center" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td colspan="2" align="center"><span class="Arial4">Cambiar Clave de Acceso (Contrase&ntilde;a)</span></td>
</tr>
<tr>
    <td colspan="2" valign="top"><span class="Arial2">Le enviaremos una notificaci&oacute;n del cambio a su correo electr&oacute;nico<br /></span>
    </td>
</tr>
<tr>
    <td class="Arial2">Escriba su contrase&ntilde;a anterior:</td>
<td><input type='password' name='pass_old' class='tabla_cont_social required' /></td></tr>
<tr>
<td class="Arial2">Escriba su contrase&ntilde;a nueva:</td>
<td><input type='password' name='pass_new1' class="tabla_cont_social required" /></td></tr>
<tr>
<td class="Arial2">Nuevamente escriba su contrase&ntilde;a:</td>
<td><input type='password' name='pass_new2' class="tabla_cont_social required" /></td></tr>
<tr><td colspan="2" valign="top" align="center"><br />
<input type="button" onClick="javascript: location.href='index.php'" name="cancelar" value="Volver" class="rojo_sombra"  > &nbsp;&nbsp;&nbsp;&nbsp;
<input type='submit' name='ok' value='Cambiar Clave' class="rojo_sombra"/></td></tr>
</table>
</form>
<? 
//observa si se creo la instancia de pass_old
//en caso afirmativo verificamos los datos enviados
//por el form ‘cambia’
if (isset($_POST["pass_old"])){
	/*primero verifica que haya capturado algo
	
	en los tres campos requeridos*/
	if(($_POST["pass_old"] != "") && ($_POST["pass_new1"] != "") && ($_POST["pass_new2"] != "")){
	/* si ningun dato es vacio, verificamos que pass_old coincida */
	
	$sql = "SELECT tx_nombre,tx_apellidoPaterno,tx_apellidoMaterno,tx_correo FROM tbl_users WHERE id_usuario='".$_SESSION['uid']."' AND tx_password='".md5($_POST['pass_old'])."'";
	$result = mysql_query($sql);
		if ($result){
		  $nombre = mysql_fetch_assoc($result);
		}
	//si la consulta regreso un resultado entonces
	//se verifica los pass_new
		if (!empty ($nombre['tx_nombre'])){
			if ($_POST['pass_new1'] == $_POST['pass_new2']){
				//si llega aqui todo esta bien, realizamos el cambio
				//en la bd
				$qry = "UPDATE tbl_users SET tx_password='".md5($_POST['pass_new1'])."' where id_usuario=".$_SESSION['uid'] ;
				
				mysql_query($qry) or die ("Error al modificar PASS".mysql_error());
				echo "<span class='Arial4'>*** Actualizada con &eacute;xito ***</span>";
				/* if (mail($nombre['tx_correo'],"Cambio de password","Tu nueva contraseña es:".$_POST['pass_new1'],"Enviado por: Consulta Vecinos"))
				  echo "<br />Email Enviado con &eacute;xito";
				else  
				  echo "<br />Error al enviar Email"; */
			} else {
				echo "<span class='Arial4'><font color='red'>*** Error las contrase&ntilde;as son distintas</font></span>";
			}
			
		} else {
			echo "<span class='Arial4'><font color='red'>*** Error en los datos capturados, intente de nuevo</font></span>";
		}
	}else{
	    echo "<span class='Arial4'><font color='red'>Los tres datos son requeridos, intente de nuevo</font></span>";
	}

}
?>
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
