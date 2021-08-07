<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href="css/pure.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" height="100%" >
  <tr height="60px" bgcolor="#fff">
    <td width="20%">&nbsp;</td>
    <td colspan="3" width="60%"><h1 class="app_tittle">Inicio</h1></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff" >
    <td colspan="5">
	<!-- InstanceBeginEditable name="texto" -->
<table width="100%" height="100%"  >
  <tr height="40px" bgcolor="#C1272D">
    <td><a class="submenu" href="principal_news.php<?php echo $w; ?>">Noticias</a></td>
    <td><a class="submenu" href="principal_ranking.php<?php echo $w; ?>">Ranking</a></td>
    <td><a class="submenu" href="principal_folow.php<?php echo $w; ?>">Siguiendo</a></td>
    <td><a class="submenu submenu_active" href="principal_link.php<?php echo $w; ?>">Vinculo</a></td>
  </tr>
  <tr>
    <td colspan="4">
    
    </td>
  </tr>
</table>	
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
  <?php require_once 'core/footer.php';?>
</table>
</body>
<!-- InstanceEnd --></html>
