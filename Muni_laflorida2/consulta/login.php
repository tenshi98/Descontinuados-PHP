<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>San Miguel == Consulta Vecinos == Login </title>
<link href="./css/estilo.css" rel="stylesheet" type="text/css" />
<link href="./css/style.css" rel="stylesheet" type="text/css" />

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='./js/infogrid.js'></script>   
    
    <script src="./scripts/jquery171.js" type="text/javascript"></script>
    <script src="./scripts/jquery.validate.js" type="text/javascript"></script>
    <script src="./scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="./scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />
     
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
?>
<body >
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Vecinos<br />
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
                <td width="343" height="191" align="left" ><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="115"><img src="images/candado.png" width="85" height="143" /></td>
                    <td width="168" align="left" valign="middle" class="Arial2">Ingrese Su Nombre de Usuario y Contrase&ntilde;a para iniciar sesi&oacute;n</td>
                  </tr>
                  </table></td>
                <td width="481" align="center"><form id="frmlogin" name="frmlogin"  method="POST" action="validarUsuario.php">
				
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="4" class="Arial2"><span class="Arial4">Ingrese su Nombre de Usuario y Contrase&ntilde;a</span></td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="20">&nbsp;</td>
                      <td height="25" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="Arial2">Usuario</td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2"><input name="usuario" type="text" class="tabla_cont_social required" id="usuario" size="50" maxlength="20" onkeypress="return isAlpha(event);" value="" /></td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Contrase&ntilde;a</span></td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2"><input name="password" type="password" class="tabla_cont_social required" id="password" size="50" maxlength="20" onkeypress="return isAlpha(event);" value="" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><input type="submit" class="rojo_sombra" value="Ingresar" /> &nbsp; &nbsp;
                          <input type="reset" class="rojo_sombra" value="Limpiar" /></td>
                      <td align="right"><span class="Arial2_red"><a class="Arial2_red" href="recuperarPassword.php">* Olvid&eacute; Mi Contrase&ntilde;a</a></span></td>
                    </tr>
	<?php
	
	//Mostrar errores de validacion de usuario, en caso de que lleguen
	
		if( isset( $_POST['msg_error'] ) )
		{
			switch( $_POST['msg_error'] )
			{
				case 1:
			?>
			<script type="text/javascript"> 
				jAlert("El usuario o password son incorrectos.", "Seguridad");
				$("#password").focus();
			</script>
			<?php
				break;			
				case 2:
			?>
			<script type="text/javascript"> 
				jAlert("La secci\xF3n a la que intentaste entrar est\xE1 restringida.\n S\xF3lo permitida para usuarios registrados.", "Seguridad");
			</script>
			<?php		
				break;
			}		//Fin switch
		}
			?>
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
          <p>2013 Todos los Derechos reservados. Ilustre Municipalidad de San Miguel</p>
          <p>&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
</body>
</html>
