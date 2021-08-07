<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
//$neomode=3;
define('neomode', 3);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                                          Seguridad                                                             */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Cargamos la ubicacion 
	$location = "principal.php";
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuario_login.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuario_login_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/usuario_login_2.php';
}
//formulario para recuperar contraseña
if ( !empty($_POST['submit_pass']) )  { 
//defino la variable del mensaje en vacio
$cabeceras = "";
	//Cargamos la ubicacion 
	$location = "principal.php";
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuario_getpass.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuario_getpass_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_mail/usuario_getpass.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plant0.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Login</title>
<!-- InstanceEndEditable -->
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type='text/javascript' src='js/infogrid.js'></script>
<link rel="icon" type="image/png" href="img/mifavicon.png" />
<!-- InstanceBeginEditable name="head" -->



<!-- InstanceEndEditable -->
</head>

<body >
<div align="center">
<!-- InstanceBeginEditable name="Bodytext" -->
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( ! empty($_GET['forgot']) ) { ?>
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
			<script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
			<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td width="100%"  colspan="3" align="center" valign="middle" class="borde_button"></td>
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
                <td width="481" align="center"><form method="post" name="form1" id="form1">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="4" class="Arial2"><span class="Arial4">Ingresa tu correo electronico y el sistema automaticamente te enviara una nueva clave.</span></td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="20">&nbsp;</td>
                      <td height="25" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="Arial2">Correo Electronico</td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2">
           				<input name="mail" type="text"  placeholder="Correo Electronico"  required="required" />
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="Arial2">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2">&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>
                      	<input name="submit_pass" type="submit" class="rojo_sombra" value="Recuperar" />
                        <input type="reset" class="rojo_sombra" value="Limpiar" /></td>
                      <td align="right"><span class="Arial2_red"><a class="Arial2_red" href="index.php">* Volver</a></span></td>
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
          <p>2013 Todos los Derechos reservados. Ilustre Municipalidad de San Miguel</p>
          <p>&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 } else { ?>
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
		 <script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
		<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td width="100%"  colspan="3" align="center" valign="middle" class="borde_button"></td>
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
                <td width="481" align="center"><form method="post" name="form1" id="form1">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="4" class="Arial2"><span class="Arial4">Ingrese su Nombre de Usuario y Contraseña</span></td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="20">&nbsp;</td>
                      <td height="25" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="Arial2">Usuario</td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2">
						<input name="usuario" type="text"  placeholder="Nombre de usuario" required="" />
                      </td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Contrase&ntilde;a</span></td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2">
						<input name="password" type="password"  placeholder="Contraseña" required="" />
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>
                      	<input name="submit_login" type="submit" class="rojo_sombra" value="Ingresar" />
                        <input type="reset" class="rojo_sombra" value="Limpiar" /></td>
                      <td align="right"><span class="Arial2_red"><a class="Arial2_red" href="index.php?forgot=true">* Olvidé Mi Contraseña</a></span></td>
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
          <p>2013 Todos los Derechos reservados. Ilustre Municipalidad de San Miguel</p>
          <p>&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php } ?>


<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
