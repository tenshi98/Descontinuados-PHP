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
$location = "empresas_ot_search.php";
//formulario para crear nivel
if ( !empty($_POST['submit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/empresas_ot_search.php';//creacion de variables
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Busqueda de Ordenes de Trabajo</title>
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
<div class="title"><p>Busqueda de Ordenes de Trabajo</p></div>
	<div class="content">  
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
if ( ! empty($_GET['idot']) ) { 
// SE TRAEN LOS DATOS DE SOLO UNA LINEA	
$query = "SELECT 
empresas_ot_listado.idOt,
empresas_ot_listado.f_Inicio,
empresas_item_cat.Nombre_cat AS nombre_cat,
empresas_item_cat.Nombre_Sub AS nombre_Sub,
empresas_item_list.Nombre AS nombre_trabajo,
empresas_item_list.idItemlist AS id_trabajo,
empresas_item_list.unidad AS unidad,
empresas_ot_listado.n_Doc,
(SELECT COUNT(idSublist) FROM empresas_item_sublist WHERE idItemlist = id_trabajo ) AS count_tareas
FROM `empresas_ot_listado`
LEFT JOIN `empresas_item_list`         ON empresas_item_list.idItemlist         = empresas_ot_listado.idItemlist
LEFT JOIN `empresas_item_cat`          ON empresas_item_cat.idItemcat           = empresas_item_list.idItemcat
WHERE empresas_ot_listado.idOt = {$_GET['idot']}  ";
$resultado = mysql_query ($query, $dbConn);
$rowpunto = mysql_fetch_assoc ($resultado); 
//obtengo el listado de los empleados asignados a una ot
$arrResponsables = array();
$query = "SELECT 
empresas_ot_resp.idResp,
empresas_ot_resp.idTrabajador,
trabajadores_listado.Nombre AS nombre_resp,
trabajadores_listado.Cargo AS cargo_resp
FROM `empresas_ot_resp`
LEFT JOIN `trabajadores_listado`  ON trabajadores_listado.idTrabajador   = empresas_ot_resp.idTrabajador
WHERE empresas_ot_resp.idOt = {$_GET['idot']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrResponsables,$row );
}
//obtengo el listado de los comentarios asignados a una ot
$arrComentarios = array();
$query = "SELECT idComment, Texto
FROM `empresas_ot_comment`
WHERE idOt = {$_GET['idot']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrComentarios,$row );
}
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS QUE SE VAN A CONSUMIR
$arrBodega = array();
$query = "SELECT 
zint_bodega.idBodega, 
zint_articulo.Nombre_art as nombre_articulo,
zint_bodega.Cantidad,
zint_uml.Nombre AS nombre_medida
FROM `zint_bodega`
INNER JOIN `zint_articulo`   ON zint_articulo.idArticulo   = zint_bodega.idArticulo
INNER JOIN `zint_uml`        ON zint_uml.idUml             = zint_articulo.idUml
WHERE zint_bodega.N_doc = {$_GET['idot']} AND zint_bodega.Estado = '14'
 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBodega,$row );
}
mysql_free_result($resultado);
// Se trae el listado con las tareas
$arrTareas = array();
$query = "SELECT 
empresas_ot_tareas.idTarea, 
empresas_item_sublist.Nombre AS nombre_tarea,
empresas_niveles_nombres.Nombre AS nombre_ubicacion
FROM `empresas_ot_tareas`
INNER JOIN `empresas_item_sublist`     ON empresas_item_sublist.idSublist     = empresas_ot_tareas.idSublist
INNER JOIN `empresas_niveles_nombres`  ON empresas_niveles_nombres.idNombre   = empresas_ot_tareas.idNombre
WHERE empresas_ot_tareas.idOt = {$_GET['idot']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTareas,$row );
}
mysql_free_result($resultado);
// Se trae el listado con los costos
$arrCostosRel = array();
$query = "SELECT  idCostos, Texto, costo
FROM `empresas_ot_costosrel`
WHERE idOt = {$_GET['idot']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCostosRel,$row );
}
mysql_free_result($resultado);
?>
<div>  
<div class="fleft"><h1>Visualizar Orden de Trabajo</h1></div>
<div class="clear"></div></div>	 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th width="200">Datos</th>
   <th>Detalles</th>
  </tr> 
 </thead>
 <tbody> 
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Datos Basicos</div>
  </td></tr>
  <tr> 
   <td>N° OT</td>
   <td><?php echo n_doc($rowpunto['idOt']); ?></td>
  </tr>
   <tr> 
   <td>N° Doc</td>
   <td><?php echo n_doc($rowpunto['n_Doc']); ?></td>
  </tr>
  <tr> 
   <td>Fecha</td>
   <td><?php echo Fecha_estandar($rowpunto['f_Inicio']); ?></td>
  </tr> 
  <tr> 
   <td>Categoria</td>
   <td><?php echo $rowpunto['nombre_cat']; ?></td>
  </tr>
  <tr> 
   <td>Subcategoria</td>
   <td><?php echo $rowpunto['nombre_Sub']; ?></td>
  </tr>
  <tr> 
   <td>Trabajo</td>
   <td><?php echo $rowpunto['nombre_trabajo']; ?></td>
  </tr>

  <?php //se verifica la existencia de la variable
  if ($rowpunto['count_tareas']>0){ ?>
  <tr><td colspan="2" style="background-color: #EEE;">
   <div class="fleft">Tareas</div> </td></tr>
  <?php }  ?>
  
   <?php foreach ($arrTareas as $tareas) { ?>
  <tr>
   <td><?php echo $tareas['nombre_ubicacion']; ?></td> 
   <td><div class="fleft"><?php echo $tareas['nombre_tarea']; ?></div></td>
 </tr> 
 <?php } ?>
 
 <?php //se verifica si es un costo no considerado
  if ($rowpunto['nombre_trabajo']=="D1.1 - Montos no considerados"){ ?>
  <tr><td colspan="2" style="background-color: #EEE;">
   <div class="fleft">Costos no Considerados</div></td></tr>
  <?php }  ?>
  <?php foreach ($arrCostosRel as $costos) { ?>
  <tr>
   <td colspan="2"><div class="fleft"><?php echo $costos['Texto'].', presupuesto aprobado por '.Valores_sd($costos['costo']); ?></div></td>
 </tr> 
 <?php } ?> 
 
  
  
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Encargados</div>
  </td></tr>
  <?php foreach ($arrResponsables as $responsable) { ?>
  <tr>
   <td><?php echo $responsable['cargo_resp']; ?></td> 
   <td><div class="fleft"><?php echo $responsable['nombre_resp']; ?></div></td>
 </tr> 
 <?php } ?> 
 
 
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Comentarios</div>
  </td></tr>
  <?php foreach ($arrComentarios as $comentarios) { ?>
  <tr> 
   <td colspan="2"><div class="fleft"><?php echo $comentarios['Texto']; ?></div></td> 
 </tr> 
 <?php } ?>
  
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Materiales Aportados</div>
  </td></tr> 
  <?php foreach ($arrBodega as $bodega) { ?>
  <tr> 
 <td><?php echo $bodega['nombre_articulo']; ?></td> 
   <td><div class="fleft"><?php echo number_format($cantidad3=($bodega['Cantidad']*'-1'),3,',','.'); ?> <?php echo $bodega['nombre_medida']; ?></div></td> 
 </tr> 
 <?php } ?> 
 
 </tbody> 
 </table>
</div>
</article>  

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['emp']) ) { 
//RECUPERO EL FILTRO DESDE GET
$q = "WHERE empresas_ot_listado.idEmpresa = '{$_GET['emp']}' "; 
//filtro de f_Inicio
if(isset($_GET['f_Inicio']) && $_GET['f_Inicio'] != '' && isset($_GET['f_Termino']) && $_GET['f_Termino'] != ''){ 
 $q .= "AND empresas_ot_listado.f_Inicio BETWEEN '{$_GET['f_Inicio']}' AND '{$_GET['f_Termino']}' " ; 
}
//filtro de idItemlist
if(isset($_GET['idItemlist']) && $_GET['idItemlist'] != ''){ 
 $q .= "AND empresas_ot_listado.idItemlist = '{$_GET['idItemlist']}' " ; 
}
//filtro de Estado
if(isset($_GET['Estado']) && $_GET['Estado'] != ''){ 
 $q .= "AND empresas_ot_listado.Estado = '{$_GET['Estado']}' " ; 
}
//filtro de idUsuario
if(isset($_GET['idUsuario']) && $_GET['idUsuario'] != ''){ 
 $q .= "AND empresas_ot_listado.idUsuario = '{$_GET['idUsuario']}' " ; 
}
//filtro de idTrabajador
if(isset($_GET['idTrabajador']) && $_GET['idTrabajador'] != ''){ 
 $q .= "AND empresas_ot_resp.idTrabajador = '{$_GET['idTrabajador']}' " ; 
}
// SE TRAE UN LISTADO DE TODAS LAS SOLICITUDES REALIZADAS
$arrSolicitudes = array();
$query = "SELECT 
empresas_ot_listado.idOt,
empresas_ot_listado.f_Inicio,
empresas_item_list.Nombre AS nombre_tarea,
detalle_general.Nombre AS estado
FROM `empresas_ot_listado`
LEFT JOIN `empresas_item_list`    ON empresas_item_list.idItemlist     = empresas_ot_listado.idItemlist
LEFT JOIN `detalle_general`       ON detalle_general.id_Detalle        = empresas_ot_listado.Estado
LEFT JOIN `empresas_ot_resp`      ON empresas_ot_resp.idOt             = empresas_ot_listado.idOt
".$q." 
ORDER BY empresas_ot_listado.f_Inicio DESC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSolicitudes,$row );
}
mysql_free_result($resultado); ?>
<div>  
<div class="fleft"><h1>Listado de Coincidencias</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th width="90">N° OT</th>
   <th width="100">Fecha</th>
   <th width="60">Estado</th>
   <th>Trabajo</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrSolicitudes as $trabajos) { ?>
  <tr> 
   <td><?php echo n_doc($trabajos['idOt']); ?></td>
   <td><?php echo Fecha_estandar($trabajos['f_Inicio']); ?></td>
   <td><?php echo $trabajos['estado']; ?></td>
   <td><?php echo $trabajos['nombre_tarea']; ?></td>
   <td>
	<a target="_blank" href="<?php echo $location; ?>?idot=<?php echo $trabajos['idOt']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

<div>  
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>        
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los trabajos
$arrTrabajo = array();
$query = "SELECT idItemlist, Nombre
FROM `empresas_item_list`
WHERE idEmpresa = {$_GET['view']}
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajo,$row );
}
// Se trae un listado con todos los estados
$arrEstado = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo = '3'
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEstado,$row );
}
// Se trae un listado con todos los usuarios
$arrUser = array();
$query = "SELECT idUsuario, Nombre
FROM `usuarios_listado`
WHERE Estado = '6'
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUser,$row );
}
// Se trae un listado con todos los responsables
$arrResponsable = array();
$query = "SELECT idTrabajador, Nombre
FROM `trabajadores_listado`
WHERE idEmpresa = {$_GET['view']}
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrResponsable,$row );
}
 ?>
 <div>  
<div class="fleft"><h1>Generacion de informes</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Fecha desde</label></td>
        <td><input type="date" name="f_Inicio" /></td>
        <td><label>Fecha hasta</label></td>
        <td><input type="date" name="f_Termino" /></td>
    </tr>
    <tr>
    	<td><label>Trabajo</label></td>
        <td width="30%"><select name="idItemlist" >
        	<option value="">Seleccione un trabajo</option>
 			<?php foreach ( $arrTrabajo as $trabajo ) { ?>
				<option value="<?php echo $trabajo['idItemlist']; ?>"><?php echo $trabajo['Nombre']; ?></option>
			<?php } ?>
        </select></td>
        <td><label>Estado</label></td>
        <td><select name="Estado" >
        	<option value="">Seleccione un estado</option>
 			<?php foreach ( $arrEstado as $estado ) { ?>
				<option value="<?php echo $estado['id_Detalle']; ?>"><?php echo $estado['Nombre']; ?></option>
			<?php } ?>
        </select></td>
    </tr>
    <tr>
    	<td><label>Usuario</label></td>
        <td><select name="idUsuario" >
        	<option value="">Seleccione un usuario</option>
 			<?php foreach ( $arrUser as $user ) { ?>
				<option value="<?php echo $user['idUsuario']; ?>"><?php echo $user['Nombre']; ?></option>
			<?php } ?>
        </select></td>
        <td><label>Responsable</label></td>
        <td><select name="idTrabajador" >
        	<option value="">Seleccione un responsable</option>
 			<?php foreach ( $arrResponsable as $responsable ) { ?>
				<option value="<?php echo $responsable['idTrabajador']; ?>"><?php echo $responsable['Nombre']; ?></option>
			<?php } ?>
        </select></td>
    </tr>
    <tr>
		<td colspan="4"><div class="fright"> <input name="submit" type="submit" value="Buscar &raquo;" /> </div></td>
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