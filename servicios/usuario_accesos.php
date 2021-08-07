<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/listado_errores.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se define la variables vacias para evitar errores                                            */
/**********************************************************************************************************************************/
$errors[1]='';
$errors[2]='';
$errors[3]='';
$errors[4]='';
$errors[5]='';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "usuario_accesos.php";
//formulario para crear nivel
if ( !empty($_POST['submit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_accesos.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_accesos_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/usuario_accesos.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/usuario_accesos.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Listado de accesos directos</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo2.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<table class="table" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" height="39px;">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_nav.php'; ?>     
    </td>
  </tr>
  <tr>
    <td width="220px;" bgcolor="#eee">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_lateral.php'; ?>  
    </td>
    <td height="100%">
    	<div class="body">
		<!-- InstanceBeginEditable name="content" -->
<div class="modulo widht_modulo_full">
<div class="title"><p>Listado de accesos</p></div>
	<div class="content"> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////
//Traigo el listado con los permisos entregados
$arrListado = array();
$query = "SELECT 
admin_permisos.idAdmin_permisos,
detalle_general.Nombre AS Tipo, 
admin_permisos.Direccionweb, 
admin_permisos.Nombre
FROM usuarios_permisos 
INNER JOIN admin_permisos   ON admin_permisos.idAdmin_permisos   = usuarios_permisos.idAdmin_permisos
INNER JOIN detalle_general  ON detalle_general.id_Detalle        = admin_permisos.Tipo 
WHERE usuarios_permisos.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY Tipo, Nombre";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrListado,$row );
}
mysql_free_result($resultado);
//Traigo el listado con los permisos entregados con accesos
$arrAccesos = array();
$query = "SELECT 
usuarios_accesos.idAccesos,
detalle_general.Nombre AS Tipo, 
admin_permisos.Nombre AS nombre_permiso
FROM usuarios_accesos 
INNER JOIN admin_permisos   ON admin_permisos.idAdmin_permisos   = usuarios_accesos.idAdmin_permisos
INNER JOIN detalle_general  ON detalle_general.id_Detalle        = admin_permisos.Tipo 
WHERE usuarios_accesos.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY Tipo, nombre_permiso";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrAccesos,$row );
}
mysql_free_result($resultado);



?>           
<div>   
<div class="fleft"><h2>Listado de accesos Directos</h2></div>
<div class="clear"></div></div>

<table class="tableform">
<form action="" method="post">
<tr>
	<td><label>Listado de Permisos</label></td>
	<td> <select name="idAdmin_permisos">
<option value="" selected>Seleccione un Permiso</option>
<?php foreach ( $arrListado as $listado ) { ?>
<option value="<?php echo $listado['idAdmin_permisos']; ?>" ><?php echo $listado['Tipo'].'-'.$listado['Nombre']; ?></option>
<?php } ?></select> <?php echo $errors[1] ?>
 </td>
 	<input name="idUsuario"  type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" />
	<td colspan="4"><div class="fright"> <input name="submit" type="submit" value="Asignar &raquo;" /></div></td>
</tr>
</form>
</table>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Accesos ya definidos</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrAccesos as $accesos) { ?>
  <tr> 
   <td><?php echo $accesos['Tipo'].' - '.$accesos['nombre_permiso']; ?></td>
   <td>
  <?php $ubicacion=$location.'?del='.$accesos['idAccesos'];?>
   <a onclick="msg('<?php echo $ubicacion ?>')" ><input type="image" src="img/icn_trash.png" title="Borrar"></a>  
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>		
		
        
</div>
</div>			
		<!-- InstanceEndEditable --> 
    	</div>
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>