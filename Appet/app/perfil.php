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
<?php if(isset($_GET['mod'])){echo '<div class="alert alert-success" ><strong>Mensaje</strong> Datos actualizados correctamente</div>';}?>    
<?php 
// Se traen los datos de la persona
$query = "SELECT 
clientes_listado.Nombres, 
clientes_listado.ApellidoPat, 
clientes_listado.ApellidoMat, 
clientes_listado.Fono1, 
clientes_listado.Fono2, 
clientes_listado.email,
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_ubicacion_calles.Nombre AS nombre_calle,
clientes_listado.n_calle, 
clientes_listado.Sexo
FROM `clientes_listado`
LEFT JOIN `mnt_ubicacion_ciudad`    ON mnt_ubicacion_ciudad.idCiudad    = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`   ON mnt_ubicacion_comunas.idComuna   = clientes_listado.idComuna
LEFT JOIN `mnt_ubicacion_calles`    ON mnt_ubicacion_calles.idCalle     = clientes_listado.idCalle
WHERE idCliente = '{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
$rowUser = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);
?>    
<table width="100%" >
   <tr class="perfil_img">
    <td width="40%" rowspan="2" height="100"><img src="upload_perfil/d.jpg" /></td>
    <td width="60%">
    <p class="fleft">Posteos<br /><span>15</span></p>
    <p class="fleft">Seguidores<br /><span>15</span></p>
    <p class="fleft no_border_right">Siguiendo<br /><span>15</span></p>
    <div class="clear"></div></td>
  </tr>
  <tr>
    <td><a href="perfil_mod.php<?php echo $w ?>" class="pure-button pure-button-4 pure-input-1 normal_boton">Editar Perfil</a></td>
  </tr>
  <tr class="perfil_info">
    <td colspan="2">
    <div class="infobox">
    <p><strong>Nombre : </strong> <?php echo $rowUser['Nombres'].' '.$rowUser['ApellidoPat'].' '.$rowUser['ApellidoMat'] ?></p>
    <p><strong>Contacto :  </strong></p>
	<?php if($rowUser['Fono1']!=''){echo '<p class="contacto">Fono : '.$rowUser['Fono1'].'</p>';}?>
    <?php if($rowUser['Fono2']!=''){echo '<p class="contacto">Cel : '.$rowUser['Fono2'].'</p>';}?>
    <?php if($rowUser['email']!=''){echo '<p class="contacto">Email : '.$rowUser['email'].'</p>';}?>
    <p><strong>Vivo en : </strong> <?php echo $rowUser['nombre_calle'].' '.$rowUser['n_calle'].', '.$rowUser['nombre_comuna'].', '.$rowUser['nombre_ciudad'] ?></p>
    
    
    </div>
    </td>
  </tr>
  <tr class="perfil_menu">
    <td colspan="2" height="30">
    <p class="fleft">Soy <?php if($rowUser['Sexo']=='M'){echo 'Padre';}else{echo 'Madre';}?> de :</p>
    <a href="ini_register.php<?php echo $w ?>" class="pure-button pure-button-4 pure-input-1 normal_boton fright">Agregar Hijos</a>
    <div class="clear"></div>
    </td>
  </tr>
  <tr class="mascota_box">
    <td><img src="upload_mascota/2.jpg" /></td>
    <td><p>Nombre Mascota<br />Icono raza-genero-edad</p></td>
  </tr>
  <tr class="mascota_box">
    <td><img src="upload_mascota/2.jpg" /></td>
    <td><p>Nombre Mascota<br />Icono raza-genero-edad</p></td>
  </tr>
  <tr class="mascota_box">
    <td><img src="upload_mascota/2.jpg" /></td>
    <td><p>Nombre Mascota<br />Icono raza-genero-edad</p></td>
  </tr>
  <tr class="mascota_box">
    <td><img src="upload_mascota/2.jpg" /></td>
    <td><p>Nombre Mascota<br />Icono raza-genero-edad</p></td>
  </tr>
  <tr class="mascota_box">
    <td><img src="upload_mascota/2.jpg" /></td>
    <td><p>Nombre Mascota<br />Icono raza-genero-edad</p></td>
  </tr> 
</table>	
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
  <?php require_once 'core/footer.php';?>
</table>
</body>
<!-- InstanceEnd --></html>
