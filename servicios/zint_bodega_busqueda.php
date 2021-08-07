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
$location = "zint_bodega_busqueda.php";
//formulario para crear nivel
if ( !empty($_POST['submit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_bodega_busqueda.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_bodega_busqueda_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/zint_bodega_busqueda.php';//se crean los datos
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Busqueda de Solicitud</title>
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
<div class="title"><p>Busqueda de Solicitudes</p></div>
	<div class="content">         
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['fecha_desde']) ) { 
// traemos y ordenamos los datos segun la pagina
$num_pag = $_GET["pagina"];
$cant_reg = 24;

if (!$num_pag){
$comienzo = 0 ;
$num_pag = 1 ;
} else {
$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//RECUPERO EL FILTRO DESDE GET
$q = "WHERE zint_bodega_solicitud.idEmpresa = '{$_GET['view']}' AND fSolicitud BETWEEN '{$_GET['fecha_desde']}' AND '{$_GET['fecha_hasta']}' "; 
//filtro de cliente interno
if(isset($_GET['cint']) && $_GET['cint'] != ''){ 
 $q .= "AND tipo_cliente='1' AND idCliente = '{$_GET['cint']}'" ; 
}
//filtro de cliente externo
if(isset($_GET['cext']) && $_GET['cext'] != ''){ 
 $q .= "AND tipo_cliente='2' AND idCliente =  '{$_GET['cext']}'" ; 
}
//filtro de resposable
if(isset($_GET['responsable']) && $_GET['responsable'] != ''){ 
 $q .= "AND Responsable = '{$_GET['responsable']}'" ; 
}
//filtro de estado
if(isset($_GET['estado']) && $_GET['estado'] != ''){ 
 $q .= "AND Estado = '{$_GET['estado']}'" ; 
}
//filtro de numero de solicitud
if(isset($_GET['n_solicitud']) && $_GET['n_solicitud'] != ''){ 
 $q .= "AND idSolicitud = '{$_GET['n_solicitud']}'" ; 
}
$resultado = mysql_query("SELECT idSolicitud FROM `zint_bodega_solicitud`
".$q.""); 
//CALCULO EL TOTAL DE PAGINAS
$total_registros = mysql_num_rows($resultado);
$total_paginas = ceil($total_registros / $cant_reg);

// SE TRAE UN LISTADO DE TODAS LAS SOLICITUDES REALIZADAS
$arrSolicitudes = array();
$query = "SELECT 
zint_bodega_solicitud.idSolicitud, 
zint_bodega_solicitud.fSolicitud, 
usuarios_listado.Nombre AS nombre_responsable,
zint_bodega_solicitud.Estado
FROM `zint_bodega_solicitud`
INNER JOIN `usuarios_listado`  ON usuarios_listado.idUsuario = zint_bodega_solicitud.Responsable
".$q." 
ORDER BY fSolicitud DESC
LIMIT $comienzo, $cant_reg";
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrSolicitudes,$row );
}
mysql_free_result($resultado2);
 ?> 	

<div>  
<div class="fleft"><h1>Listado de Solicitudes Filtradas</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>N° Solicitud</th>
   <th>Fecha Solicitud</th>
   <th>Solicitante</th>
   <th>Estado solicitud</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody>

<?php foreach ($arrSolicitudes as $solicitud) { ?>  
  <tr> 
   <td><?php echo n_doc($solicitud['idSolicitud']); ?></td>
   <td><?php echo Fecha_completa($solicitud['fSolicitud']); ?></td>
   <td><?php echo $solicitud['nombre_responsable']; ?></td>
   <?php //COMPRUEBO EL ESTADO DE LA SOLICITUD, SI ESTA CERRADA SE BLOQUEA EL ACCESO
   if($solicitud['Estado']=='3'){?> <td>Abierta</td>  <?php }else{?> <td>Cerrada</td> <?php }?>
   <td>
	<a target="_blank" href="zint_bodega_busqueda_print.php?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $solicitud['idSolicitud']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>


<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// se trae un listado con todos los trabajadores de la empresa seleccionada
$arrTrabajador = array();
$query = "SELECT idTrabajador, Nombre FROM `trabajadores_listado`
WHERE Estado='6' AND idEmpresa={$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajador,$row );
}
mysql_free_result($resultado);
// se trae un listado de todos los usuarios que tengan asignada la empresa
$arrUsuarios = array();
$query = "SELECT idUsuario, Nombre FROM `usuarios_listado`
WHERE Estado='6' AND idEmpresa={$_GET['view']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsuarios,$row );
}
mysql_free_result($resultado);
// se trae un listado de todas las empresas
$arrEmpresas = array();
$query = "SELECT idEmpresa, Nombre FROM `empresas_listado`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmpresas,$row );
}
mysql_free_result($resultado);
// se trae un listado con los estados de la Solicitud
$arrTipo = array();
$query = "SELECT id_Detalle, Nombre FROM `detalle_general`
WHERE Tipo='3'  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
mysql_free_result($resultado);?> 

<div>  
<div class="fleft"><h1>Filtro de Busqueda</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Fecha Inicio</label></td>
        <td><input type="date" name="fecha_desde" placeholder="Fecha (dd-mm-aaaa)"  required=""/><?php echo $errors[1] ?></td>
        <td><label>Fecha Termino</label></td>
        <td><input type="date" name="fecha_hasta" placeholder="Fecha (dd-mm-aaaa)"  required=""/><?php echo $errors[1] ?></td>
        <td><label>Cliente Interno</label></td>
        <td><select name="cliente_interno">
			<option value="" selected>Seleccione Cliente interno</option>
			<?php foreach ( $arrTrabajador as $trabajador ) { ?>
			<option value="<?php echo $trabajador['idTrabajador']; ?>"><?php echo $trabajador['Nombre']; ?></option><?php } ?></select></td>
        <td><label>Cliente Externo</label></td>
        <td><select name="cliente_externo">
			<option value="" selected>Seleccione Cliente externo</option>
			<?php foreach ( $arrEmpresas as $empresas ) { ?>
			<option value="<?php echo $empresas['idEmpresa']; ?>"><?php echo $empresas['Nombre']; ?></option><?php } ?></select></td>
    </tr>
    <tr>
    	<td><label>Responsable</label></td>
        <td><select name="responsable">
			<option value="" selected>Seleccione un Responsable</option>
			<?php foreach ( $arrUsuarios as $usuarios ) { ?>
			<option value="<?php echo $usuarios['idUsuario']; ?>"><?php echo $usuarios['Nombre']; ?></option><?php } ?></select></td> 
        <td><label>Estado</label></td>
        <td><select name="estado">
			<option value="" selected>Seleccione un Estado</option>
			<?php foreach ( $arrTipo as $tipo ) { ?>
			<option value="<?php echo $tipo['id_Detalle']; ?>"><?php echo $tipo['Nombre']; ?></option><?php } ?></select></td>
        <td><label>N° Solicitud</label></td>
        <td><input type="text" name="n_solicitud"  placeholder="Buscar por n° de solicitud" /></td>
        <td> </td>
        <td> </td>
    </tr>
    <tr>
		<td colspan="8"><div class="fright"> <input name="submit" type="submit" value="Consultar &raquo;" /> </div></td>
	</tr>
</form>
</table>
 	
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 	
 // SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrUsers = array();
$query = "SELECT 
empresas_listado.idEmpresa, 
empresas_listado.Nombre
FROM `empresas_listado`
INNER JOIN `usuarios_empresas`     ON usuarios_empresas.idEmpresa      = empresas_listado.idEmpresa
WHERE usuarios_empresas.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY empresas_listado.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div>  
<div class="fleft"><h1>Listado de Empresas</h1></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre de la Empresa</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['Nombre']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?view=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

<?php } ?>		
</div>
</div>		
		<!-- InstanceEndEditable --> 
    	</div>
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>