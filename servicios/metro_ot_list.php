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
$location = "metro_ot_list.php";
//se crea la ot
if ( !empty($_GET['new_ot']) )     {
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresas_ot_listado.php';//se crean los datos
	}
//formulario para crear ot
if ( !empty($_POST['submit1']) ) {
	//agrego una nueva locacion
	$location .= "?new=".$_GET['new_1']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_listado_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresas_ot_listado.php';//se crean los datos
}
//formulario para agregar trabajadores a la ot
if ( !empty($_POST['submit2']) ) {
	//agrego una nueva locacion
	$location .= "?new_2=".$_GET['new_2']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_resp.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_resp_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresas_ot_resp.php';//se crean los datos
}
//formulario para agregar comentarios a la ot
if ( !empty($_POST['submit3']) ) {
	//agrego una nueva locacion
	$location .= "?new=".$_GET['new_3']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_comment.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_comment_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresas_ot_comment.php';//se crean los datos
}

//formulario para editar ot
if ( !empty($_POST['edit1']) ) {
	//agrego una nueva locacion
	$location .= "?new=".$_GET['edit_1']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_listado_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresas_ot_listado.php';//se crean los datos
}
//formulario para editar trabajador
if ( !empty($_POST['edit2']) ) {
	//agrego una nueva locacion
	$location .= "?new=".$_GET['edit_2']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_resp.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_resp_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresas_ot_resp.php';//se crean los datos
}
//formulario para editar trabajador
if ( !empty($_POST['edit3']) ) {
	//agrego una nueva locacion
	$location .= "?new=".$_GET['edit_3']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_comment.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_comment_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresas_ot_comment.php';//se crean los datos
}

//formulario para cerrar ot
if ( !empty($_POST['submitclose']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_listado_2.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresas_ot_listado.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/

//eliminamos al responsable desde la pantalla de responsables
if ( !empty($_GET['del_1']) )     {
	//agrego una nueva locacion
	$location .= "?new_2=".$_GET['new_2']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresas_ot_resp.php';
}
//eliminamos al responsable desde la pantalla principal
if ( !empty($_GET['del_2']) )     {
	//agrego una nueva locacion
	$location .= "?new=".$_GET['del_2']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresas_ot_resp.php';
}
//eliminamos el comentario desde la pantalla principal
if ( !empty($_GET['del_3']) )     {
	//agrego una nueva locacion
	$location .= "?new=".$_GET['del_3']."&emp=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresas_ot_comment.php';
}
//eliminamos la ot desde la ventana principal
if ( !empty($_GET['del_4']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['del_4'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresas_ot_listado.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Listado de Ordenes de Trabajo</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo2.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<script src="ckeditor/ckeditor.js" type="text/javascript" ></script>
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
<div class="title"><p>Creacion de Ordenes de trabajo</p></div>
	<div class="content">        
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
if ( ! empty($_GET['edit_3']) ) { 
// SE TRAEN LOS DATOS DE SOLO UNA LINEA	
$query = "SELECT Texto
FROM `empresas_ot_comment`
WHERE idComment = {$_GET['comment']}  ";
$resultado = mysql_query ($query, $dbConn);
$rowpunto = mysql_fetch_assoc ($resultado);	 
?>
<div>  
<div class="fleft"><h1>Editar Orden de Trabajado - Ingreso de comentarios</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['edit_3']?>&emp=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>	 

<table class="tableform">
<form  method="post">
	<tr>
    	<td width="120"><label>Comentario</label></td>
        <td height="300"><textarea class="ckeditor" name="Texto" placeholder="Comentario" ><?php echo $rowpunto['Texto'] ?></textarea></td>
	</tr>
<script>
// Replace the <textarea id="editor"> with an CKEditor
// instance, using default configurations.
CKEDITOR.replace( 'Texto', {
 toolbar: [[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList' ],]
});
</script>
    <tr>
		<td></td>
        <input name="idComment"  type="hidden" value="<?php echo $_GET['comment'] ?>" />
		<td><div class="fright"> <input name="edit3" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['edit_2']) ) { 
//obtengo el listado de los empleados
$arrNombres = array();
$query = "SELECT idTrabajador, Nombre
FROM `trabajadores_listado`
WHERE idEmpresa = {$_GET['emp']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNombres,$row );
} 
 ?>
<div>  
<div class="fleft"><h1>Editar Orden de Trabajado - Editar Responsables</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['edit_2']?>&emp=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Trabajo</label></td>
        <td colspan="3"><select name="idTrabajador" required="" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ($arrNombres as $nombres ) { ?>              
                <option value="<?php echo $nombres['idTrabajador']; ?>" <?php if ( $nombres['idTrabajador'] ==  $_GET['resp'] ) echo 'selected="selected"' ?>><?php echo $nombres['Nombre']; ?></option>          
				<?php } ?>
			</select><?php echo $errors[1] ?></td>
    </tr>

    <tr>
		<td colspan="3"></td>
        <input name="idResp"  type="hidden" value="<?php echo $_GET['idResp'] ?>" />
		<td><div class="fright"> <input name="edit2" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table> 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['edit_1']) ) { 
//obtengo el listado de los trabajos
$arrCategorias = array();
$query = "SELECT 
empresas_item_list.idItemlist,
empresas_item_list.Nombre,
empresas_item_cat.Nombre_cat AS nombre_cat,
empresas_item_cat.Nombre_Sub AS nombre_sub
FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`  ON empresas_item_cat.idItemcat   = empresas_item_list.idItemcat
WHERE empresas_item_list.idEmpresa = {$_GET['emp']}   ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
//obtengo un listado con las ubicaciones de la empresa
$arrUbicaciones = array();
$query = "SELECT idNombre, Nombre
FROM `empresas_niveles_nombres`
WHERE idEmpresa = {$_GET['emp']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrUbicaciones,$row );
}
// SE TRAEN LOS DATOS DE SOLO UNA LINEA	
$query = "SELECT f_Inicio, idItemlist, n_Doc, h_Inicio, h_Termino, idUbicacion
FROM `empresas_ot_listado`
WHERE idOt = {$_GET['edit_1']}  ";
$resultado = mysql_query ($query, $dbConn);
$rowpunto = mysql_fetch_assoc ($resultado);  
?>
<div>  
<div class="fleft"><h1>Editar Orden de Trabajado - Datos Basicos</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['edit_1']?>&emp=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form name="f1" method="post">
	<tr>
    	<td><label>Trabajo</label></td>
        <td colspan="5"><select name="idItemlist" required="" onchange="cambia_tarea()" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ($arrCategorias as $categorias ) { ?>              
                <option value="<?php echo $categorias['idItemlist']; ?>" <?php if ( $categorias['idItemlist'] == $rowpunto['idItemlist'] ) echo 'selected="selected"' ?>><?php echo $categorias['nombre_cat'].'-'.$categorias['nombre_sub'].'-'.$categorias['Nombre']; ?></option>          
				<?php } ?>
			</select><?php echo $errors[1] ?></td>
    </tr>
    <tr> 
		<td><label>N° OT Sisman</label></td>
		<td><input name="n_Doc"  type="text" required="" value="<?php echo $rowpunto['n_Doc']; ?>"/><?php echo $errors[3] ?></td>
        <td><label>Ubicacion</label></td>
        <td><select name="idUbicacion" required="" >
			<option value="" selected>Seleccione una Ubicacion</option>
				<?php foreach ($arrUbicaciones as $ubicaciones ) { ?>
                <option value="<?php echo $ubicaciones['idNombre']; ?>" <?php if ( $ubicaciones['idNombre'] == $rowpunto['idUbicacion'] ) echo 'selected="selected"' ?>><?php echo $ubicaciones['Nombre']; ?></option>
				<?php } ?>
			</select></td>
        <td></td>
        <td></td> 
	</tr>
    <tr>
		<td colspan="5"></td>
        <input name="idOt"  type="hidden" value="<?php echo $_GET['edit_1'] ?>" />
		<input name="idEmpresa"  type="hidden" value="<?php echo $_GET['emp'] ?>" />
        <input name="f_Inicio"  type="hidden" value="<?php echo date("Y-m-d")?>" />
		<td><div class="fright"> <input name="edit1" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new_3']) ) {?>
<div>  
<div class="fleft"><h1>Crear nueva Orden de Trabajado - Ingreso de comentarios</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['new_3']?>&emp=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>	 

<table class="tableform">
<form  method="post">
	<tr>
    	<td width="120"><label>Comentario</label></td>
        <td height="300"><textarea class="ckeditor" placeholder="Comentario" name="Texto"></textarea></td>
<script>
// Replace the <textarea id="editor"> with an CKEditor
// instance, using default configurations.
CKEDITOR.replace( 'Texto', {
 toolbar: [[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList' ],]
});
</script>
	</tr>
    <tr>
		<td></td>
        <input name="idOt"  type="hidden" value="<?php echo $_GET['new_3'] ?>" />
		<td><div class="fright"> <input name="submit3" type="submit" value="Agregar &raquo;" /> </div></td>
	</tr>
</form>
</table>
	 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new_2']) ) { 
//obtengo el listado de los empleados
$arrNombres = array();
$query = "SELECT idTrabajador, Nombre
FROM `trabajadores_listado`
WHERE idEmpresa = {$_GET['emp']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNombres,$row );
}
//obtengo el listado de los empleados asignados a una ot
$arrResponsables = array();
$query = "SELECT 
empresas_ot_resp.idResp,
trabajadores_listado.Nombre AS nombre_resp,
trabajadores_listado.Cargo AS cargo_resp
FROM `empresas_ot_resp`
LEFT JOIN `trabajadores_listado`  ON trabajadores_listado.idTrabajador   = empresas_ot_resp.idTrabajador
WHERE empresas_ot_resp.idOt = {$_GET['new_2']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrResponsables,$row );
}
?>

<div>  
<div class="fleft"><h1>Crear nueva Orden de Trabajado - Agregar Responsables</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['new_2']?>&emp=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Encargado</label></td>
        <td><select name="idTrabajador" required="" >
			<option value="" selected>Seleccione un Trabajador</option>
				<?php foreach ($arrNombres as $nombres ) { ?>
                <option value="<?php echo $nombres['idTrabajador']; ?>" ><?php echo $nombres['Nombre']; ?></option> 
				<?php } ?>
			</select><?php echo $errors[1] ?></td>
    	<input name="idOt"  type="hidden" value="<?php echo $_GET['new_2'] ?>" />
		<td width="180"><input name="submit2" type="submit" value="Asignar &raquo;" /></td>
	</tr>
</form>
</table>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre</th>
   <th>Cargo</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrResponsables as $responsable) { ?>
  <tr> 
   <td><?php echo $responsable['nombre_resp']; ?></td>
   <td><?php echo $responsable['cargo_resp']; ?></td>
   <td>
    <a href="<?php echo $location; ?>?new_2=<?php echo $_GET['new_2']; ?>&emp=<?php echo $_GET['emp']; ?>&del_1=true&del_x=<?php echo $responsable['idResp']; ?>"><input type="image" src="img/icn_trash.png" title="Borrar"></a>	  
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new_1']) ) { 
//obtengo el listado de los trabajos
$arrCategorias = array();
$query = "SELECT 
empresas_item_list.idItemlist,
empresas_item_list.Nombre,
empresas_item_cat.Nombre_cat AS nombre_cat,
empresas_item_cat.Nombre_Sub AS nombre_sub
FROM `empresas_item_list`
LEFT JOIN `empresas_item_cat`  ON empresas_item_cat.idItemcat   = empresas_item_list.idItemcat
WHERE empresas_item_list.idEmpresa = {$_GET['emp']}  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
} 
//obtengo un listado con las ubicaciones de la empresa
$arrUbicaciones = array();
$query = "SELECT idNombre, Nombre
FROM `empresas_niveles_nombres`
WHERE idEmpresa = {$_GET['emp']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrUbicaciones,$row );
} 
?>
<div>  
<div class="fleft"><h1>Crear nueva Orden de Trabajado - Datos Basicos</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['new_1']?>&emp=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form name="f1" method="post">
	<tr>
    	<td><label>Trabajo</label></td>
        <td colspan="5"><select name="idItemlist" required="" onchange="cambia_tarea()" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ($arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['idItemlist']; ?>" ><?php echo $categorias['nombre_cat']; ?> - <?php echo $categorias['nombre_sub']; ?> - <?php echo $categorias['Nombre']; ?></option>
				<?php } ?>
			</select><?php echo $errors[1] ?></td>
    </tr>
    <tr>  
		<td><label>N° OT Sisman</label></td>
		<td><input name="n_Doc"  type="text" required="" /><?php echo $errors[3] ?></td> 
        <td><label>Ubicacion</label></td>
        <td><select name="idUbicacion" required="" >
			<option value="" selected>Seleccione una Ubicacion</option>
				<?php foreach ($arrUbicaciones as $ubicaciones ) { ?>
                <option value="<?php echo $ubicaciones['idNombre']; ?>" ><?php echo $ubicaciones['Nombre']; ?></option>
				<?php } ?>
			</select></td>
        <td></td>
        <td></td> 
	</tr>
    <tr>
		<td colspan="5"></td>
        <input name="idOt"  type="hidden" value="<?php echo $_GET['new_1'] ?>" />
		<input name="idEmpresa"  type="hidden" value="<?php echo $_GET['emp'] ?>" />
        <input name="f_Inicio"  type="hidden" value="<?php echo date("Y-m-d")?>" />
		<td><div class="fright"> <input name="submit1" type="submit" value="Agregar &raquo;" /> </div></td>
	</tr>
</form>
</table>


<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
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
(SELECT COUNT(idSublist) FROM empresas_item_sublist WHERE idItemlist = id_trabajo ) AS count_tareas,
empresas_ot_listado.h_Inicio,
empresas_ot_listado.h_Termino,
empresas_niveles_nombres.Nombre AS nombre_ubicacion
FROM `empresas_ot_listado`
LEFT JOIN `empresas_item_list`         ON empresas_item_list.idItemlist         = empresas_ot_listado.idItemlist
LEFT JOIN `empresas_item_cat`          ON empresas_item_cat.idItemcat           = empresas_item_list.idItemcat
LEFT JOIN `empresas_niveles_nombres`   ON empresas_niveles_nombres.idNombre     = empresas_ot_listado.idUbicacion
WHERE empresas_ot_listado.idOt = {$_GET['new']}  ";
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
WHERE empresas_ot_resp.idOt = {$_GET['new']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrResponsables,$row );
}
//obtengo el listado de los comentarios asignados a una ot
$arrComentarios = array();
$query = "SELECT idComment, Texto
FROM `empresas_ot_comment`
WHERE idOt = {$_GET['new']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrComentarios,$row );
}


?>
<div>  
<div class="fleft"><h1>Creacion de nueva Orden de Trabajo</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
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

  <?php //se verifica que los datos basicos esten vacios, si es asi envia al formulario de creacion de nuevo, si es falso envia al de edicion 
  if (empty($rowpunto['nombre_trabajo'])) {?>
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Datos Basicos</div>
  <div class="fright"><a href="<?php echo $location; ?>?new_1=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>">Agregar</a></div>
  </td></tr>
  <?php } else {?>
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Datos Basicos</div>
  <div class="fright"><a href="<?php echo $location; ?>?edit_1=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>">Editar</a></div>
  </td></tr>
  <tr> 
   <td>N° OT</td>
   <td><?php echo n_doc($rowpunto['idOt']); ?></td>
  </tr>
   <tr> 
   <td>N° Ot Sisman</td>
   <td><?php echo n_doc($rowpunto['n_Doc']); ?></td>
  </tr>
  <tr> 
   <td>Fecha</td>
   <td><?php echo Fecha_estandar($rowpunto['f_Inicio']); ?></td>
  </tr>
  <tr> 
   <td>Trabajo</td>
   <td><?php echo $rowpunto['nombre_cat'].' - '.$rowpunto['nombre_Sub'].' - '.$rowpunto['nombre_trabajo']; ?></td>
  </tr>
  <tr> 
   <td>Ubicacion del Trabajo</td>
   <td><?php echo $rowpunto['nombre_ubicacion']; ?></td>
  </tr>
  <?php } ?>
  
  

 
  
  
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Encargados</div>
  <div class="fright"><a href="<?php echo $location; ?>?new_2=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>">Agregar</a></div>
  </td></tr>
  <?php foreach ($arrResponsables as $responsable) { ?>
  <tr>
   <td><?php echo $responsable['cargo_resp']; ?></td> 
   <td><div class="fleft"><?php echo $responsable['nombre_resp']; ?></div>
       <div class="fright"> 
       		<a href="<?php echo $location; ?>?edit_2=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>&idResp=<?php echo $responsable['idResp']?>&resp=<?php echo $responsable['idTrabajador']?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
            <a href="<?php echo $location; ?>?del_2=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>&del_x=<?php echo $responsable['idResp']?>"><input type="image" src="img/icn_trash.png" title="Borrar"></a>
       </div>
   </td>
 </tr> 
 <?php } ?> 
 
 
  <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Comentarios</div>
  <div class="fright"><a href="<?php echo $location; ?>?new_3=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>">Agregar</a></div>
  </td></tr>
  <?php foreach ($arrComentarios as $comentarios) { ?>
  <tr> 
   <td colspan="2"><div class="fleft"><?php echo $comentarios['Texto']; ?></div>
       <div class="fright">
       		<a href="<?php echo $location; ?>?edit_3=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>&comment=<?php echo $comentarios['idComment']?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
            <a href="<?php echo $location; ?>?del_3=<?php echo $_GET['new']?>&emp=<?php echo $_GET['emp']?>&del=<?php echo $comentarios['idComment']?>"><input type="image" src="img/icn_trash.png" title="Borrar"></a>
       </div>
 </td> 
 </tr> 
 <?php } ?>
  
   
 
 <tr><td colspan="2" style="background-color: #EEE;">
  <div class="fleft">Cerrar Orden de Trabajo</div>
  <div class="fright"></div>
  </td></tr>
  
<?php 

	//se verifica que los datos basicos esten vacios para evitar ver esta parte 
if (!empty($rowpunto['nombre_trabajo'])) {?>
<form  method="post">
       <tr>
       <?php if ($rowpunto['nombre_cat']=='Mantenimiento Correctivo'){?>
    	<td><label>Tiempo utilizado</label></td>
        
        	<td><div class="fleft"><input name="t_usado" type="time" required="" /><?php echo $errors[1]; ?></div>
            <?php } else {?>
            <td colspan="2"><div class="fleft"><input name="t_usado" type="hidden" value="01:00:00" /></div>
            <?php }?>
            <input name="idOt"  type="hidden" value="<?php echo $rowpunto['idOt']?>"/>
        	<input name="f_Termino"  type="hidden" value="<?php echo date("Y-m-d")?>"/>
        	<input name="Estado"  type="hidden" value="9"/>
            <input name="cantidad" type="hidden" required="" value="1" />
  			<div class="fright"><input name="submitclose" type="submit" value="Cerrar &raquo;" /></div>
  		</td>
      </tr>
    </form>
  <?php } ?>
 
 
 </tbody> 
 </table>
</div>
</article>
	   
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 	
//obtengo el listado de las ot
$arrTrabajos = array();
$query = "SELECT 
empresas_ot_listado.idOt,
empresas_ot_listado.f_Inicio,
empresas_item_list.Nombre AS nombre_tarea,
detalle_general.Nombre AS estado
FROM `empresas_ot_listado`
LEFT JOIN `empresas_item_list`         ON empresas_item_list.idItemlist         = empresas_ot_listado.idItemlist
LEFT JOIN `detalle_general`            ON detalle_general.id_Detalle            = empresas_ot_listado.Estado
WHERE empresas_ot_listado.idEmpresa = {$_GET['view']} AND Estado='8' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajos,$row );
}
 ?>
<div>  
<div class="fleft"><h1>Listado de Ordenes de Trabajo</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new_ot=<?php echo $_GET['view']?>" ><input name="" type="button" value="Crear Nuevo &raquo;" /></a></div>
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
 <?php foreach ($arrTrabajos as $trabajos) { ?>
  <tr> 
   <td><?php echo n_doc($trabajos['idOt']); ?></td>
   <td><?php echo Fecha_estandar($trabajos['f_Inicio']); ?></td>
   <td><?php echo $trabajos['estado']; ?></td>
   <td><?php echo $trabajos['nombre_tarea']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?new=<?php echo $trabajos['idOt']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <a href="<?php echo $location; ?>?del_4=<?php echo $_GET['view']; ?>&delet=<?php echo $trabajos['idOt']; ?>"><input type="image" src="img/icn_trash.png" title="Borrar"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
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