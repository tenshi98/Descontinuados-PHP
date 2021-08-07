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
$location = "busqueda.php";
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/cliente_search.php';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plant1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Busqueda</title>
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['search']) ) { 
// SE TRAE UN LISTADO DE TODOS LOS USUARIOS
$arrCliente = array();
$query = "SELECT 
clientes_listado.idCliente, 
clientes_listado.Rut, 
clientes_listado.Nombres, 
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat, 
clientes_listado.Fono1,
detalle_general.Nombre AS estado
FROM clientes_listado 
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.Estado
WHERE clientes_listado.Rut LIKE '%{$_GET['search']}%' AND Estado = '1'
ORDER BY clientes_listado.Nombres ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCliente,$row );
}?>

<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCION CLASE </span></td>
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
	<thead>
      <tr>
        <th width="200" align="center" >Rut</th>
        <th align="center" >Nombre del Vecino</th>
        <th width="100" align="center" >Fono</th>
        <th width="100" align="center" >Estado</th>
        <th width="80" align="center" >Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($arrCliente as $usuarios) { ?>
    <tr>
        <td width="200" align="center"><?php echo $usuarios['Rut']; ?></td>
        <td align="center"><?php echo $usuarios['Nombres'].' '.$usuarios['ApellidoPat'].' '.$usuarios['ApellidoMat']; ?></td>
        <td width="100" align="center"><?php echo $usuarios['Fono1']; ?></td>
        <td width="100" align="center"><?php echo $usuarios['estado']; ?></td>
        <td width="80"  align="center" class="options-width">
          <a href="pruebas.php?usr=<?php echo $usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
       </td>
    </tr>
<?php } ?>
    </tbody>
<?php require_once 'core/footer.php';?> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['error']) )  {  ?>
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCION CLASE </span></td>
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
          <td width="100%"  colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td height="191" align="center" ><form action="checklogin.php" method="post" name="form1" id="form1">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="4" align="center" class="Arial2"><span class="Arial4"><img src="images/lupa_carpeta.jpg" width="201" height="168" /></span></td>
                      </tr>
                    <tr>
                      <td height="50" colspan="4" align="center" valign="middle"><span class="Arial2_red">No existe</span><span class="Arial2"><span class="Arial2"> informacion que coincida con su Busqueda</span></span></td>
                    </tr>
                    </table>
                  
                </form></td>
                </tr>
            </tbody>
<?php require_once 'core/footer.php';?> 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {  ?>
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCION CLASE B</span></td>
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
                <td width="343" align="center" ><img src="images/nuevo-carnet-2013.jpg" width="300" height="191" /></td>
                <td width="481" align="center"><form method="post" name="form1" id="form1">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="25" colspan="4" class="Arial4">Ingrese el Numero de la Cedula Consultar</td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="20">&nbsp;</td>
                      <td height="25" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><span class="Arial2">N Cedula</span></td>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2"><input name="Rut" type="text" value="" required="required" /></td>
                    </tr>
                    <tr><td colspan="">&nbsp;</td></tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>
                      	<input type="submit" class="rojo_sombra" value="Buscar" name="submit" />
                        <input type="reset" class="rojo_sombra" value="Limpiar" />
                        <a class="rojo_sombra margin_button btn" href="principal.php">Volver</a>
                        </td>
                      <td align="right">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2" class="Arial2_red">&nbsp;</td>
                    </tr>
                  </table>
                </form></td>
              </tr>
            </tbody>
            
<?php require_once 'core/footer.php';?>            
<?php } ?>

<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
