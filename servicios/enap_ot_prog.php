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
/**********************************************************************************************************************************/
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "enap_ot_prog.php";
//formulario para crear permiso
if ( !empty($_POST['submit']) )  { 
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&month=".$_GET['month']."&year=".$_GET['year'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_prog.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_prog_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresas_ot_prog.php';//se crean los datos
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) )  {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&month=".$_GET['month']."&year=".$_GET['year'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresas_ot_prog.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresas_ot_prog_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresas_ot_prog.php';//se crean los datos
}

/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view'].'&month='.$_GET['month'].'&year='.$_GET['year'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresas_ot_prog.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Programacion</title>
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
<div class="title"><p>Programacion</p></div>
	<div class="content">
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
if ( ! empty($_GET['id']) ) { 
// Se trae el listado con solo el dato de la frecuencia
$query = "SELECT idFrecuencia, valor
FROM `empresas_ot_prog`
WHERE idProg = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowfrecuencia = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);
// se trae un listado de las frecuencias
$arrFrecuencia = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo='7' AND Abreviatura='1' 
ORDER BY id_Detalle";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFrecuencia,$row );
} 
?>    
    
<div>   
<div class="fleft"><h1>Editar Frecuencia Existente</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div> 
</div>   

<table class="tableform">
<form  method="post">
	<tr>
    <td><label>Valor</label></td>
	<td><select name="idFrecuencia" required="" >
			<option value="" selected>Seleccione una Frecuencia</option>
				<?php foreach ( $arrFrecuencia as $frecuencia ) { ?>
                    <option value="<?php echo $frecuencia['id_Detalle']; ?>" <?php if ( $frecuencia['id_Detalle'] == $rowfrecuencia['idFrecuencia'] ) echo 'selected="selected"' ?>><?php echo $frecuencia['Nombre']; ?></option>
				<?php } ?>
			</select><?php echo $errors[1] ?></td>

    <td width="180"><label>Dias Habiles a trabajar</label></td>
    <td width="180"><input type="text" name="valor"  placeholder="Dias"  required="" value="<?php echo $rowfrecuencia['valor']; ?>"/><?php echo $errors[2] ?></td>
	</tr>
    <tr>
    	<input name="idProg"  type="hidden" value="<?php echo $_GET['id'] ?>" />
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['view'] ?>" />
        <input name="month"  type="hidden" value="<?php echo $_GET['month'] ?>" />
        <input name="year"  type="hidden" value="<?php echo $_GET['year'] ?>" />
		<td colspan="4"><div class="fright"> <input name="submit_edit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>
    
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['month']) ) { 
// se trae un listado de las frecuencias
$arrFrecuencia = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo='7' AND Abreviatura='1' 
ORDER BY id_Detalle";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFrecuencia,$row );
}
//obtengo el listado de las programaciones ya realizadas
$arrCantidades = array();
$query = "SELECT 
detalle_general.Nombre AS nfrecuencia,
empresas_ot_prog.valor AS cantidad,
empresas_ot_prog.idProg
FROM `empresas_ot_prog`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = empresas_ot_prog.idFrecuencia
WHERE empresas_ot_prog.idEmpresa = {$_GET['view']} AND empresas_ot_prog.month = {$_GET['month']} AND empresas_ot_prog.year = {$_GET['year']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCantidades,$row );
}
?>
 
<div>  
<div class="fleft"><h1>Listado de Programaciones realizadas</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    <td><label>Valor</label></td>
	<td><select name="idFrecuencia" required="" >
			<option value="" selected>Seleccione una Frecuencia</option>
				<?php foreach ( $arrFrecuencia as $frecuencia ) { ?>
					<option value="<?php echo $frecuencia['id_Detalle']; ?>"><?php echo $frecuencia['Nombre']; ?></option>
				<?php } ?>
			</select><?php echo $errors[1] ?></td>

    <td width="180"><label>Dias Habiles a trabajar</label></td>
    <td width="180"><input type="text" name="valor"  placeholder="Dias"  required=""/><?php echo $errors[2] ?></td>
	</tr>
    <tr>
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['view'] ?>" />
        <input name="month"  type="hidden" value="<?php echo $_GET['month'] ?>" />
        <input name="year"  type="hidden" value="<?php echo $_GET['year'] ?>" />
		<td colspan="4"><div class="fright"> <input name="submit" type="submit" value="Agregar &raquo;" /> </div></td>
	</tr>
</form>
</table>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Frecuencia</th> 
   <th width="120">Dias Habiles</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrCantidades as $cantidades) { ?>
  <tr> 
   <td><?php echo $cantidades['nfrecuencia']; ?></td>
   <td><?php echo $cantidades['cantidad']; ?></td>
   <td>
    <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&month=<?php echo $_GET['month']; ?>&year=<?php echo $_GET['year']; ?>&id=<?php echo $cantidades['idProg']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&month=<?php echo $_GET['month']; ?>&year=<?php echo $_GET['year']; ?>&del=<?php echo $cantidades['idProg']; ?>"><input type="image" src="img/icn_trash.png" title="Borrar"></a>   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// se trae un listado con los meses
$arrMeses = array();
$query = "SELECT Nombre, Abreviatura
FROM `detalle_general`
WHERE Tipo='8' 
ORDER BY id_Detalle";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrMeses,$row );
}?>
<div>  
<div class="fleft"><h1>Listado de Meses</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Meses</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrMeses as $meses) { ?>
  <tr> 
   <td><?php echo $meses['Nombre']; ?></td>
   <td>
   <?php //obtengo el año actual
   $year = date("Y");
   ?>
	<a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&month=<?php echo $meses['Abreviatura']; ?>&year=<?php echo $year; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>
 
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