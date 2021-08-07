<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 3);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                          Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "principal_clave.php";
//formulario para cambiar la clave
if ( !empty($_POST['submit_clave']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_7.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_listado.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_8.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_listado.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plant1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Cambio de clave</title>
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
<?php require_once 'core/menu.php'; ?>
<div align="center">
<!-- InstanceBeginEditable name="Bodytext" -->
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
usuarios_listado.email, 
usuarios_listado.Nombre
FROM `usuarios_listado`
WHERE usuarios_listado.idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);?>
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
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	
    <tbody>
   <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
 
 
<form id="registrar_usuario" name="registrar_usuario"  method="POST" >
 
<table align="center" width="600px">
 
    <tr>
        <td colspan="2" align="center"><span class="Arial4">Registrar Nuevo Usuario</span></td>
    </tr>
    <tr>
        <td colspan="2" class="Arial2">Para registrar un usuario, s&oacute;lo debes llenar
        los siguientes campos y pulsar el bot&oacute;n <b>Registrar Usuario</b>. La cuenta del usuario, se activa inmediatamente.
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right" valign="middle" class="borde_button"></td>
   	</tr> 
    <tr>
       <td class="Arial2"><label for="tx_nombre">Nombre Completo</label></td>
       <td><input type="text" name="Nombre" autocomplete="off" value="<?php if (isset($Nombre)) {echo $Nombre;}else{echo $rowusr['Nombre'];}?>" required="required" /></td>
    </tr> 
    <tr>
       <td class="Arial2"><label for="tx_correo">Correo electronico</label></td>
       <td><input type="text" name="email"  autocomplete="off" value="<?php if (isset($email)) {echo $email;}else{echo $rowusr['email'];}?>" required="required"/></td>
    </tr>
    
    <tr><td colspan="2">&nbsp;</td></tr>
 	<tr>
        <td align="center" colspan="2">
            <input name="idUsuario" type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" />
            <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Cancelar y Volver</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit_edit" value="Modificar Datos" class="rojo_sombra">
        </td>
	</tr>
</table>
</form>
</td>
              </tr>
              
    </tbody>
</table>
  		  </td>
		</tr></table>
    </td></tr>
</table> 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['clave']) ) {?> 
 
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
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	
    <tbody>
   <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
 
 
<form id="registrar_usuario" name="registrar_usuario"  method="POST" >
 
<table align="center" width="600px">
 
    <tr>
        <td colspan="2" align="center"><span class="Arial4">Registrar Nuevo Usuario</span></td>
    </tr>
    <tr>
        <td colspan="2" class="Arial2">Para registrar un usuario, s&oacute;lo debes llenar
        los siguientes campos y pulsar el bot&oacute;n <b>Registrar Usuario</b>. La cuenta del usuario, se activa inmediatamente.
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right" valign="middle" class="borde_button"></td>
   	</tr> 
    <tr>
       <td class="Arial2"><label for="tx_nombre">Clave Antigua</label></td>
       <td><input type="text" name="oldpassword" autocomplete="off" required="required"/></td>
    </tr> 
    <tr>
       <td class="Arial2"><label for="tx_correo">Clave Nueva</label></td>
       <td><input type="text" name="password" autocomplete="off" required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label for="tx_correo">Repetir Clave Nueva</label></td>
       <td><input type="text" name="repassword" autocomplete="off" required="required"/></td>
    </tr>
    
    <tr><td colspan="2">&nbsp;</td></tr>
 	<tr>
        <td align="center" colspan="2">
            <input name="idUsuario" type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" />
            <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Cancelar y Volver</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit_clave" value="Modificar Clave" class="rojo_sombra">
        </td>
	</tr>
</table>
</form>
</td>
              </tr>
              
    </tbody>
</table>
  		  </td>
		</tr></table>
    </td></tr>
</table>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { ?>
 <table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE B</span></td>
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
          <td  colspan="3" align="center" valign="middle" class="borde_button"></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" align="center" ><img src="images/conducir.png" width="200" height="198" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="3" class="Arial4">Menú Principal de Administración</td>
                      </tr>
                    <tr>
                      <td width="106">&nbsp;</td>
                      <td width="39">&nbsp;</td>
                      <td width="151" height="25">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Modificar Clave</span></td>
                      <td>&nbsp;</td>
                      <td height="25"><a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>?clave=true">Cambiar clave</a></td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">Modificar Datos Personales</span></td>
                      <td>&nbsp;</td>
                      <td height="25"><a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>?id=true">Cambiar datos</a></td>
                    </tr>  
                  </table>
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
          <p>2013 Todos los Derechos reservados. Ilustre Municipalidad de San Miguel</p>
          <p>&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table> 
<?php }?> 
<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
