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
$location = "empresas_item_sublist.php";
//formulario para crear nivel
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['new'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_item_sublist.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_item_sublist_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresas_item_sublist.php';//se crean los datos
}
//formulario para editar nivel
if ( !empty($_POST['submit_edit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_item_sublist.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_item_sublist_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresas_item_sublist.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresas_item_sublist.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Itemizado - Sublistado</title>
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
<div class="title"><p>Itemizado - SubListado</p></div>
	<div class="content">          
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
//obtengo el listado de los trabajos
$arrCategorias = array();
$query = "SELECT 
empresas_item_list.idItemlist,
empresas_item_list.Nombre,
empresas_item_cat.Nombre_cat AS nombre_cat,
empresas_item_cat.Nombre_Sub AS nombre_sub
FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`  ON empresas_item_cat.idItemcat   = empresas_item_list.idItemcat
WHERE empresas_item_list.idEmpresa = {$_GET['emp']} AND empresas_item_list.cobro='2' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
//obtengo el listado de las frecuencias
$arrFrecuencias = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo = '7'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFrecuencias,$row );
} 
//Obtengo los datos de este item
$query = "SELECT idItemlist, Nombre, idFrecuencia
FROM `empresas_item_sublist`
WHERE idSublist = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowitemsublist = mysql_fetch_assoc ($resultado);
 ?> 
<div>  
<div class="fleft"><h1>Editar SubItem del Trabajo</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Trabajo</label></td>
        <td colspan="3"><select name="idItemlist" required="" >
			<option value="" selected>Seleccione una Clasificacion</option>
			<?php foreach ($arrCategorias as $categorias ) { ?>				
            <option value="<?php echo $categorias['idItemlist']; ?>" <?php if ( $categorias['idItemlist'] == $rowitemsublist['idItemlist'] ) echo 'selected="selected"' ?>><?php echo $categorias['nombre_cat'].'-'.$categorias['nombre_sub'].'-'.$categorias['Nombre']; ?></option>     
				<?php } ?></select><?php echo $errors[1] ?></td>
    </tr>
		<td><label>Nombre</label></td>
		<td><input name="Nombre"  type="text" required="" value="<?php echo $rowitemsublist['Nombre']; ?>" /<?php echo $errors[2] ?>></td>
        <td><label>Frecuencia</label></td>
        <td><select name="idFrecuencia" required="" >
			<option value="" selected>Seleccione una Frecuencia</option>
			<?php foreach ($arrFrecuencias as $frecuencias ) { ?>
			<option value="<?php echo$frecuencias['id_Detalle']; ?>" <?php if ( $frecuencias['id_Detalle'] == $rowitemsublist['idFrecuencia'] ) echo 'selected="selected"' ?>><?php echo $frecuencias['Nombre']; ?></option>
			<?php } ?></select><?php echo $errors[3] ?></td>
    <tr>
        <input name="idSublist"  type="hidden" value="<?php echo $_GET['id'] ?>" />
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['emp'] ?>" />
		<td colspan="4"><div class="fright"> <input name="submit_edit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>


<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) {  
//obtengo el listado de los trabajos
$arrCategorias = array();
$query = "SELECT 
empresas_item_list.idItemlist,
empresas_item_list.Nombre,
empresas_item_cat.Nombre_cat AS nombre_cat,
empresas_item_cat.Nombre_Sub AS nombre_sub
FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`  ON empresas_item_cat.idItemcat   = empresas_item_list.idItemcat
WHERE empresas_item_list.idEmpresa = {$_GET['new']} AND empresas_item_list.cobro='2' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
//obtengo el listado de las frecuencias
$arrFrecuencias = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo = '7'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFrecuencias,$row );
} 
 ?> 
<div>  
<div class="fleft"><h1>Crear Nuevo SubItem para el trabajo</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['new']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Trabajo</label></td>
        <td colspan="3"><select name="idItemlist" required="" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ($arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['idItemlist']; ?>" ><?php echo $categorias['nombre_cat'].'-'.$categorias['nombre_sub'].'-'.$categorias['Nombre']; ?></option><?php } ?></select><?php echo $errors[1] ?></td>
    </tr>
		<td><label>Nombre</label></td>
		<td><input name="Nombre"  type="text" required="" /<?php echo $errors[2] ?>></td>
        <td><label>Frecuencia</label></td>
        <td><select name="idFrecuencia" required="" >
			<option value="" selected>Seleccione una Frecuencia</option>
			<?php foreach ($arrFrecuencias as $frecuencias ) { ?>
            <option value="<?php echo $frecuencias['id_Detalle']; ?>" ><?php echo $frecuencias['Nombre']; ?></option><?php } ?></select><?php echo $errors[3] ?></td>
    <tr>
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['new'] ?>" />
		<td colspan="4"><div class="fright"> <input name="submit" type="submit" value="Crear &raquo;" /> </div></td>
	</tr>
</form>
</table> 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
//obtengo los nombres de los niveles
$query = "SELECT 
empresas_item_cat.Nombre_cat AS Nombre_cat,
empresas_item_cat.Nombre_Sub AS Nombre_Sub,
empresas_item_list.Nombre AS nombre_list,
empresas_item_sublist.idSublist,
empresas_item_sublist.Nombre AS nombre_sub,
detalle_general.Nombre AS nombre_frec
FROM `empresas_item_sublist`
LEFT JOIN `empresas_item_list`  ON empresas_item_list.idItemlist  = empresas_item_sublist.idItemlist
LEFT JOIN `empresas_item_cat`   ON empresas_item_cat.idItemcat    = empresas_item_list.idItemcat
LEFT JOIN `detalle_general`     ON detalle_general.id_Detalle     = empresas_item_sublist.idFrecuencia
WHERE empresas_item_sublist.idEmpresa = {$_GET['view']}";

$resultado = mysql_query ($query, $dbConn);
while ( $row_ot[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
array_pop($row_ot);
array_multisort($row_ot, SORT_ASC);
?> 

<div>  
<div class="fleft"><h1>Listado del itemizado</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['view']?>" ><input name="" type="button" value="Crear Nuevo &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre</th>
   <th>Frecuencia</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody>
<?php filtrar($row_ot, 'nombre_list'); 
foreach($row_ot as $tipo=>$productos){ ?>
<tr><td colspan="5" style="background-color: #EEE;"><?php echo $productos[0]['Nombre_cat'].' - '.$productos[0]['nombre_sub'].' - '.$tipo;?></td></tr>

 <?php foreach ($productos as $nombres) { ?>  
  <tr> 
   <td><?php echo $nombres['nombre_sub']; ?></td>
   <td><?php echo $nombres['nombre_frec']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?id=<?php echo $nombres['idSublist']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <?php $ubicacion=$location.'?del='.$nombres['idSublist'].'&emp='.$_GET['view'];?>
   <a onclick="msg('<?php echo $ubicacion ?>')" ><input type="image" src="img/icn_trash.png" title="Borrar"></a>   
 </td> 
 </tr> 
 <?php } 
 }?>	 
 </tbody> 
 </table>
</div>
</article>

<div>  
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 
 
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