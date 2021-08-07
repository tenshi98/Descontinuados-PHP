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
$location = "empresas_item_list.php";
//formulario para crear nivel
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['new'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresa_item_list.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresa_item_list_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresa_item_list.php';//se crean los datos
}
//formulario para editar nivel
if ( !empty($_POST['submit_edit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresa_item_list.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresa_item_list_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresa_item_list.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresa_item_list.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Itemizado - Listado</title>
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
<div class="title"><p>Itemizado - Listado</p></div>
	<div class="content">          
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
//obtengo los nombres de las categorias
$arrCategorias = array();
$query = "SELECT idItemcat, Nombre_cat, Nombre_Sub
FROM `empresas_item_cat`
WHERE idEmpresa = {$_GET['emp']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrCategorias,$row );
}
//Obtengo los datos de este item
$query = "SELECT idItemcat, Nombre, unidad, valor_unidad, v_unitario,cobro
FROM `empresas_item_list`
WHERE idItemlist = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowitemlist = mysql_fetch_assoc ($resultado);
 ?> 
<div>  
<div class="fleft"><h1>Editar Item del Itemizado</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Clasificacion</label></td>
        <td colspan="7"><select name="idItemcat" required="" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ($arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['idItemcat']; ?>" <?php if ( $categorias['idItemcat'] == $rowitemlist['idItemcat'] ) echo 'selected="selected"' ?>><?php echo $categorias['Nombre_cat']; ?> - <?php echo $categorias['Nombre_Sub']; ?></option> 
				<?php } ?>
			</select><?php echo $errors[1] ?></td>
    </tr>
	<tr>
    	<td><label>Nombre</label></td>
		<td width="280"><input name="Nombre"  type="text" required="" value="<?php echo $rowitemlist['Nombre']; ?>"/><?php echo $errors[2] ?></td>  
		<td><label>Unidad Medida</label></td>
        <td width="120"><select name="unidad" >
			<option value="" selected>Seleccione una Unidad Medida</option>
			<option value="c/u" <?php if ( $rowitemlist['unidad'] == "c/u" ) echo 'selected="selected"' ?> >c/u</option>	
            <option value="día" <?php if ( $rowitemlist['unidad'] == "día" ) echo 'selected="selected"' ?> >día</option>
            <option value="Gl"  <?php if ( $rowitemlist['unidad'] == "Gl" ) echo 'selected="selected"' ?> >Gl</option>
            <option value="há"  <?php if ( $rowitemlist['unidad'] == "há" ) echo 'selected="selected"' ?> >há</option>
            <option value="hr"  <?php if ( $rowitemlist['unidad'] == "hr" ) echo 'selected="selected"' ?> >hr</option>
            <option value="kg"  <?php if ( $rowitemlist['unidad'] == "kg" ) echo 'selected="selected"' ?> >kg</option>
            <option value="Kilo" <?php if ( $rowitemlist['unidad'] == "Kilo" ) echo 'selected="selected"' ?> >Kilo</option>
            <option value="lav. vehic." <?php if ( $rowitemlist['unidad'] == "lav. vehic." ) echo 'selected="selected"' ?> >lav. vehic.</option>
            <option value="m2"  <?php if ( $rowitemlist['unidad'] == "m2" ) echo 'selected="selected"' ?> >m2</option>
            <option value="m3"  <?php if ( $rowitemlist['unidad'] == "m3" ) echo 'selected="selected"' ?> >m3</option>
            <option value="mes" <?php if ( $rowitemlist['unidad'] == "mes" ) echo 'selected="selected"' ?> >mes</option>
			</select><?php echo $errors[1] ?>
        </td>
        <td><label>Valor UM</label></td>
		<td width="40"><input name="valor_unidad"  type="text" value="<?php echo $rowitemlist['valor_unidad']; ?>"/></td>
        <td><label>Valor Unitario</label></td>
		<td width="80"><input name="v_unitario"  type="text" value="<?php echo $rowitemlist['v_unitario']; ?>"/></td>  
	</tr>
    <tr>
    	<td><label>Tipo Cobro</label></td>
        <td><select name="cobro" required="" >
			<option value="" selected>Seleccione un tipo de cobro</option>
            <option value="1" <?php if ( $rowitemlist['cobro'] == 1 ) echo 'selected="selected"' ?> >Fijo</option>
            <option value="2" <?php if ( $rowitemlist['cobro'] == 2 ) echo 'selected="selected"' ?> >Segun Tareas</option>
            <option value="3" <?php if ( $rowitemlist['cobro'] == 3 ) echo 'selected="selected"' ?> >Segun Solicitud</option>
			</select></td>
        <td colspan="6"></td>
    </tr>
    <tr>
    	<input name="idItemlist"  type="hidden" value="<?php echo $_GET['id'] ?>" />
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['emp'] ?>" />
		<td colspan="8"><div class="fright"> <input name="submit_edit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>      

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) {  
//obtengo los nombres de las categorias
$arrCategorias = array();
$query = "SELECT idItemcat, Nombre_cat, Nombre_Sub
FROM `empresas_item_cat`
WHERE idEmpresa = {$_GET['new']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrCategorias,$row );
}
 ?> 
<div>  
<div class="fleft"><h1>Crear Nuevo Item para el Itemizado</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['new']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Nombre</label></td>
        <td colspan="7"><select name="idItemcat" required="" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ($arrCategorias as $categorias ) { ?>
				<option value="<?php echo $categorias['idItemcat']; ?>"><?php echo $categorias['Nombre_cat']; ?> - <?php echo $categorias['Nombre_Sub']; ?></option>
				<?php } ?>
			</select><?php echo $errors[1] ?></td>
    </tr>
	<tr>
    	<td><label>Nombre</label></td>
		<td width="280"><input name="Nombre"  type="text" required="" /><?php echo $errors[2] ?></td>  
		<td><label>Unidad Medida</label></td>
        <td width="120"><select name="unidad" >
			<option value="" selected>Seleccione una Unidad Medida</option>
			<option value="c/u" >c/u</option>	
            <option value="día" >día</option>
            <option value="Gl" >Gl</option>
            <option value="há" >há</option>
            <option value="hr" >hr</option>
            <option value="kg" >kg</option>
            <option value="Kilo" >Kilo</option>
            <option value="lav. vehic." >lav. vehic.</option>
            <option value="m2" >m2</option>
            <option value="m3" >m3</option>
            <option value="mes" >mes</option>
			</select><?php echo $errors[1] ?>
        </td>
        <td><label>Valor UM</label></td>
		<td width="40"><input name="valor_unidad"  type="text" /></td>
        <td><label>Valor Unitario</label></td>
		<td width="80"><input name="v_unitario"  type="text" /></td>  
	</tr>
    <tr>
    	<td><label>Tipo Cobro</label></td>
        <td><select name="cobro" required="" >
			<option value="" selected>Seleccione un tipo de cobro</option>
            <option value="1" >Fijo</option>
            <option value="2" >Segun Tareas</option>
            <option value="3" >Segun Solicitud</option>
			</select></td>
        <td colspan="6"></td>
    </tr>
    <tr>
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['new'] ?>" />
		<td colspan="8"><div class="fright"> <input name="submit" type="submit" value="Crear &raquo;" /> </div></td>
	</tr>
</form>
</table> 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
//obtengo los nombres de los niveles
$query = "SELECT 
empresas_item_cat.Nombre_cat AS Nombre_cat,
empresas_item_cat.Nombre_Sub AS Nombre_Sub,
empresas_item_cat.idItemcat AS id_categorias,
empresas_item_list.idItemlist, 
empresas_item_list.Nombre, 
empresas_item_list.unidad, 
empresas_item_list.valor_unidad, 
empresas_item_list.v_unitario,
empresas_item_list.cobro
FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`  ON empresas_item_cat.idItemcat  = empresas_item_list.idItemcat
WHERE empresas_item_list.idEmpresa = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row_ot[] = mysql_fetch_assoc ($resultado));
mysql_free_result($resultado);
array_pop($row_ot);
array_multisort($row_ot, SORT_ASC);?> 

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
   <th>Unidad Medida</th>
   <th>Valor UM</th>
   <th>Valor Unitario</th>
   <th width="120">Tipo Cobro</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody>
<?php filtrar($row_ot, 'id_categorias'); 
foreach($row_ot as $tipo=>$productos){ ?>
<tr><td colspan="6" style="background-color: #EEE;"><?php echo $productos[0]['Nombre_cat'];?> - <?php echo $productos[0]['Nombre_Sub'];?></td></tr>

 <?php foreach ($productos as $nombres) { ?>  
  <tr> 
   <td><?php echo $nombres['Nombre']; ?></td>
   <td><?php echo $nombres['unidad']; ?></td>
   <td><?php echo Cantidades_sd($nombres['valor_unidad']); ?></td>
   <td width="100"><?php echo Valores_sd($nombres['v_unitario']); ?></td>
   <td><?php if ($nombres['cobro']==1) { 
   					echo 'Fijo'; } 
			 elseif ($nombres['cobro']==2) { 
			 		echo 'Segun Tareas'; }
			 elseif ($nombres['cobro']==3) { 
			 		echo 'Segun Solicitud'; } 
			 else { echo 'Sin Asignar'; } ?>
   </td>
   <td>
	<a href="<?php echo $location; ?>?id=<?php echo $nombres['idItemlist']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <?php $ubicacion=$location.'?del='.$nombres['idItemlist'].'&emp='.$_GET['view'];?>
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