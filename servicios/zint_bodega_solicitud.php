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
$location = "zint_bodega_solicitud.php";
//Se crea una nueva solicitud
if ( !empty($_GET['new']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&pagina=1";
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/zint_bodega_solicitud.php';}
//formulario para crear comentario
if ( !empty($_POST['submit_coment']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&solicitud=".$_GET['solicitud'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_bodega_solicitud.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_bodega_solicitud_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/zint_bodega_solicitud.php';//se crean los datos
}
//formulario para editar nivel
if ( !empty($_POST['submit_cliente']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&solicitud=".$_GET['solicitud'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_bodega_solicitud.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_bodega_solicitud_2.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/zint_bodega_solicitud.php';//se crean los datos
}
//formulario para crear ingreso
if ( !empty($_POST['submit_temp']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&solicitud=".$_GET['solicitud']."&newmat=true";
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_bodega_ingresos.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_bodega_ingresos_2.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_bodega_ingresos_3.php';//subconsulta para revisar cantidaddes
	//modificamos los valores de la variable cantidad, para poder llevar un orden en bodega respecto a las unidades
	$cantidad2 = $Cantidad/$row_div['divisor'];
	$Cantidad  = $cantidad2*'-1';
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/zint_bodega_ingresos.php';//se crean los datos
}
//Furmulario para actualizar el estado
if ( !empty($_GET['apr']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&solicitud=".$_GET['solicitud']."&newmat=true";
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/zint_bodega_egresos.php';}
	
//formulario para crear ingreso
if ( !empty($_POST['submit_insert']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/zint_bodega_egresos_2.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
//se borra un dato
if ( !empty($_GET['del_bod']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&solicitud=".$_GET['solicitud']."&newmat=true";
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/zint_bodega_ingresos.php';}
//se borra un dato
if ( !empty($_GET['del_2']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view']."&solicitud=".$_GET['solicitud'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/zint_bodega_egresos.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Bodega - Solicitud Egreso</title>
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
<div class="title"><p>Solicitudes de materiales</p></div>
<div class="content"> 
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['newmat']) ) {   
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS
$arrArticulos = array();
$query = "SELECT idArticulo,Nombre_art
FROM `zint_articulo` 
WHERE idEmpresa={$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrArticulos,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS QUE ESTAN EN BODEGA SIN APROBAR
$arrBodega = array();
$query = "SELECT 
zint_bodega.idBodega, 
zint_articulo.Nombre_art as nombre_articulo,
zint_bodega.Cantidad,
zint_bodega.Comentario
FROM `zint_bodega`
INNER JOIN `zint_articulo`    ON zint_articulo.idArticulo    = zint_bodega.idArticulo
WHERE zint_bodega.idEmpresa = {$_GET['view']} AND zint_bodega.idUsuario = {$arrUsuario['idUsuario']} AND zint_bodega.Estado = '13' AND zint_bodega.operacion = '18'
 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBodega,$row );
}
mysql_free_result($resultado);	?>


<div>  
<div class="fleft"><h1>Crear Nuevo Egreso de Bodega</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<table class="tableform">         
<form  method="post"> 
<tr>
	<td><label>Articulo</label></td>
	<td><select name="idArticulo" required="">
<option value="" selected>Seleccione un articulo</option>
<?php foreach ( $arrArticulos as $articulos ) { ?>
<option value="<?php echo $articulos['idArticulo']; ?>"><?php echo $articulos['Nombre_art']; ?></option><?php } ?></select><?php echo $errors[1] ?></td>
	<td><label>Cantidad</label></td>
    <td><input type="text" name="Cantidad"  placeholder="Cantidad"  required=""/></td>
</tr>
<tr>
	<tr>
    <td><label>Comentario</label></td>
    <td colspan="3"><textarea name="Comentario"  style="height:120px; width:100%;" required=""></textarea></td>
    
    </tr>
	<input name="idEmpresa"    type="hidden" value="<?php echo $_GET['view'] ?>" />
    <input name="Tipo_doc"     type="hidden" value="17" />
    <input name="N_doc"        type="hidden" value="<?php echo $_GET['solicitud'] ?>" />
    <input name="idUsuario"    type="hidden" value="<?php echo $arrUsuario['idUsuario'] ?>" />
    <input name="operacion"    type="hidden" value="18" />
    <input name="contar_cero"  type="hidden" value="1" />
    <input name="idSolicitud"  type="hidden" value="<?php echo $_GET['solicitud'] ?>" />
    
	<td colspan="4"><div class="fright"> <input name="submit_temp" type="submit"  value="Ingresar &raquo;" /> </div></td>
</tr>
</form>
</table>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre del Articulo</th>
   <th>Justificacion</th>
   <th>Cantidad</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrBodega as $bodega) { ?>
  <tr> 
  <td><?php echo $bodega['nombre_articulo']; ?></td>
   <td><?php echo cortar($bodega['Comentario'], 120) ?></td>
   <td><?php echo Cantidades_cd($bodega['Cantidad']*-1); ?></td>
   <td>	   
    <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>&newmat=true&apr=<?php echo $bodega['idBodega'] ?>&value=19"><input type="image" src="img/icn_alert_success2.png" title="Aprobar solicitud"></a>
    <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>&newmat=true&del_bod=<?php echo $bodega['idBodega'] ?>"><input type="image" src="img/icn_logout_2.png" title="Eliminar"></a>
    
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

<?php /////////////////////////////////////////////// VISTA NORMAL /////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['cliente']) ) { 
// SE TRAE UN LISTADO DE TODOS LOS USUARIOS QUE SEAN LUBRICADORES U OPERADORES
$arrUsuarios = array();
$query = "SELECT idTrabajador, Nombre FROM `trabajadores_listado`
WHERE Estado='6'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsuarios,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrEmpresas = array();
$query = "SELECT idEmpresa, Nombre FROM `empresas_listado`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmpresas,$row );
}
mysql_free_result($resultado);?>

<div>  
<div class="fleft"><h1>Seleccion del Cliente</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div> 

<table class="tableform">         
<form  name ='f1' method="post"> 
<tr>
	<td width="120"><label>Tipo cliente</label></td>
	<td><select name="tipo_cliente" onchange="cambia_cliente()" required="">
	<option value="" selected>Seleccione un cliente</option>
	<option value="1">Interno</option>
	<option value="2">Externo</option>
	</select><?php echo $errors[1]; ?></td>
    <td width="120"><label>Nombre cliente</label></td>
    <td><select name="idCliente" required="">
	<option value="" selected>Seleccione un cliente</option>
	</select><?php echo $errors[2]; ?></td>
</tr>
<script>
<?php
//IMPRIMO EL ID DEL USUARIO
echo'var idInt_1=new Array("Seleccione un operador"';
foreach ($arrUsuarios as $usuario) { 
echo',"'.$usuario['idTrabajador'].'"';
 }
 echo')
';
//IMPRIMO EL ID DE LA EMPRESA
echo'var idInt_2=new Array("Seleccione una empresa"';
foreach ($arrEmpresas as $empresas) { 
echo',"'.$empresas['idEmpresa'].'"';
 }
 echo')
';
//IMPRIMO EL nombre DEL USUARIO
echo'var nombreInt_1=new Array("Seleccione un operador"';
foreach ($arrUsuarios as $usuario) { 
echo',"'.$usuario['Nombre'].'"';
 }
 echo')
';
//IMPRIMO EL nombre DE LA EMPRESA
echo'var nombreInt_2=new Array("Seleccione una empresa"';
foreach ($arrEmpresas as $empresas) { 
echo',"'.$empresas['Nombre'].'"';
 }
 echo')
';
?>
function cambia_cliente(){
	var cliente
	cliente = document.f1.tipo_cliente[document.f1.tipo_cliente.selectedIndex].value
	if (cliente != '') {
		mis_int=eval("nombreInt_" + cliente)
		mis_idint=eval("idInt_" + cliente)
		num_int = mis_int.length
		document.f1.idCliente.length = num_int
		for(i=0;i<num_int;i++){
		   document.f1.idCliente.options[i].value=mis_idint[i]
		   document.f1.idCliente.options[i].text=mis_int[i]
		}	
	}else{
		document.f1.idCliente.length = 1
		document.f1.idCliente.options[0].value = ""
	    document.f1.idCliente.options[0].text = "Seleccione un Area"
	}
	document.f1.idCliente.options[0].selected = true
}

</script>
<tr>
	<input name="idSolicitud"  type="hidden" value="<?php echo $_GET['solicitud'] ?>" />
	<td colspan="4"><div class="fright"> <input name="submit_cliente" type="submit"  value="Editar &raquo;" /> </div></td>
</tr>
</form>
</table>

<?php /////////////////////////////////////////////// VISTA NORMAL /////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['newcom']) ) { 
//SE TRAE EL COMENTARIO EN CASO DE EXISTIR
$query = "SELECT Comentario FROM `zint_bodega_solicitud`
WHERE  idSolicitud={$_GET['solicitud']}";
$resultado = mysql_query ($query, $dbConn);
$rowsol = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); ?>

<div>  
<div class="fleft"><h1>Ingreso de Comentarios</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>	

<table class="tableform">         
<form  method="post"> 
<tr>
	<td width="120"><label>Comentario</label></td>
	<td><textarea name="Comentario" rows="15"  style="height:220px" required=""><?php echo $rowsol['Comentario']; ?></textarea><?php echo $errors[1] ?></td>
</tr>
<tr>
	<input name="idSolicitud"  type="hidden" value="<?php echo $_GET['solicitud'] ?>" />
	<td colspan="2"><div class="fright"> <input name="submit_coment" type="submit"  value="Editar &raquo;" /> </div></td>
</tr>
</form>
</table>


<?php /////////////////////////////////////////////// VISTA NORMAL /////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['solicitud']) ) { 
$query = "SELECT 
zint_bodega_solicitud.idSolicitud, 
zint_bodega_solicitud.fSolicitud,
zint_bodega_solicitud.Comentario,
zint_bodega_solicitud.tipo_cliente,
trabajadores_listado.Nombre AS cliente_interno,
empresas_listado.Nombre AS cliente_externo,
usuarios_listado.Nombre AS nombre_responsable
FROM `zint_bodega_solicitud`
LEFT JOIN `usuarios_listado`        ON usuarios_listado.idUsuario            = zint_bodega_solicitud.Responsable
LEFT JOIN `trabajadores_listado`    ON trabajadores_listado.idTrabajador     = zint_bodega_solicitud.idCliente
LEFT JOIN `empresas_listado`        ON empresas_listado.idEmpresa            = zint_bodega_solicitud.idCliente
WHERE  zint_bodega_solicitud.idSolicitud='{$_GET['solicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$rowsol = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); 
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
WHERE zint_bodega.idSolicitud = {$_GET['solicitud']} AND zint_bodega.Estado = '19'
 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBodega,$row );
}
mysql_free_result($resultado); 
?>
<div>  
<div class="fleft"><h1>Listado de Solicitudes</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']?>&pagina=1" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="fright"><a href="zint_bodega_solicitud_print.php?view=<?php echo $_GET['view']?>&solicitud=<?php echo $_GET['solicitud']?>" ><input name="" type="button" value="Version imprimible &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th colspan="4">Datos de la Solicitud</th>
  </tr> 
 </thead>
 <tbody> 
   <tr><td><strong>N° Solicitud</strong></td>                <td colspan="3"><?php echo n_doc($rowsol['idSolicitud']); ?></td></tr>
   <tr><td><strong>Fecha Solicitud</strong></td>             <td colspan="3"><?php echo Fecha_completa($rowsol['fSolicitud']); ?></td></tr>
   <tr><td><strong>Responsable de la solicitud</strong></td> <td colspan="3"><?php echo $rowsol['nombre_responsable']; ?></td></tr>
   <?php ///////////// Ingreso de cliente ///////////// ?>
   <tr class="title"><td colspan="4"><strong>Cliente Destino</strong> 
     <div class="fright">
       <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>&cliente=true" ><input type="image" src="img/icn_new_article.png" title="Crear"></a>
    </div> 
   </td></tr>
  <?php //CONSULTO SI LA CELDA CON EL CLIENTE ESTA VACIA, SI ES ASI NO SE IMPRIME EN PANTALLA
if(!empty($rowsol['tipo_cliente'])){
echo '<tr><td colspan="4">';
//COMPARO SI EL TIPO ES INTERNO E IMPRIMO EL VALOR CORRECTO
if($rowsol['tipo_cliente']=='1'){	
echo 'Cliente Interno '.$rowsol['cliente_interno'].'';
} else {
echo 'Cliente Externo '.$rowsol['cliente_externo'].'';
   }
echo '</td></tr>'; 
 }
///////////// Ingreso de comentarios ///////////// ?>
<tr class="title"><td colspan="4"><strong>Ingreso de Comentario</strong> 
 <div class="fright">
  <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>&newcom=true" ><input type="image" src="img/icn_new_article.png" title="Crear"></a>
  </div> 
</td></tr> 
<?php //CONSULTO SI LA CELDA CON EL COMENTARIO ESTA VACIA, SI ES ASI NO SE IMPRIME EN PANTALLA
if(!empty($rowsol['Comentario'])){?>  
<tr><td colspan="4"><?php echo $rowsol['Comentario']; ?></td></tr> 
<?php }
///////////// Materiales ///////////// ?>
<tr class="title"><td colspan="4"><strong>Materiales Solicitados</strong> 
 <div class="fright">
  <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>&newmat=true" ><input type="image" src="img/icn_new_article.png" title="Crear"></a>
  </div> 
</td></tr>

<?php foreach ($arrBodega as $bodega) { ?>
  <tr> 
   <td colspan="2"><?php echo $bodega['nombre_articulo']; ?></td>
   <td><?php echo Cantidades_cd($cantidad3=($bodega['Cantidad']*'-1')); ?> <?php echo $bodega['nombre_medida']; ?></td>
   <td width="40">
    <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $_GET['solicitud']; ?>&del_2=<?php echo $bodega['idBodega']; ?>"><input type="image" src="img/icn_logout_2.png" title="Borrar"></a>  
 </td> 
 </tr> 
 <?php } ?> 
 
 </tbody> 
 </table>
</div>
</article>
 
 <div>  
<div class="fright">
<?php
//SE CREA EL FORMULARIO CON EL CUAL SE HACEN LOS CONSUMOS EN LA BASE DE DATOS
echo "<form  method='post'> ";
echo "<input type='hidden' name='idSolicitud'  value='".$rowsol['idSolicitud']."' />";
foreach ($arrBodega as $bodega) { 
echo "<input type='hidden' name='idBodega[]'  value='".$bodega['idBodega']."' />";
}//CIERRE DEL FOREACH
echo "<input name='submit_insert' type='submit'  value='Cerrar Solicitud &raquo;' />";
echo "</form>";
?>
</div>
<div class="clear"></div></div>
      
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) {
// traemos y ordenamos los datos segun la pagina
$num_pag = $_GET["pagina"];
$cant_reg = 30;
if (!$num_pag){
$comienzo = 0 ;
$num_pag = 1 ;
} else {
$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//traemos un listado con todos los articulos
 $query = "SELECT idSolicitud
 FROM `zint_bodega_solicitud` 
 WHERE idEmpresa = {$_GET['view']}  ";
 $registros = mysql_query ($query, $dbConn);
 $cuenta_registros = mysql_num_rows($registros);
// se establece la cantidad de paginas a mostrar
$total_paginas = ceil($cuenta_registros / $cant_reg);


// SE TRAE UN LISTADO DE TODAS LAS SOLICITUDES REALIZADAS
$arrSolicitudes = array();
$query = "SELECT 
zint_bodega_solicitud.idSolicitud, 
zint_bodega_solicitud.fSolicitud, 
usuarios_listado.Nombre AS nombre_responsable,
zint_bodega_solicitud.Estado
FROM `zint_bodega_solicitud`
INNER JOIN `usuarios_listado`  ON usuarios_listado.idUsuario = zint_bodega_solicitud.Responsable
WHERE zint_bodega_solicitud.idEmpresa = '{$_GET['view']}'
ORDER BY fSolicitud DESC
LIMIT $comienzo, $cant_reg";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSolicitudes,$row );
}
mysql_free_result($resultado);
//REVISO SI OPERADOR TIENE UNA SOLICITUD ABIERTA
$query = "SELECT Estado
FROM `zint_bodega_solicitud`
WHERE Responsable = {$arrUsuario['idUsuario']} AND Estado='13'";
$resultado = mysql_query ($query, $dbConn);
$numero = mysql_num_rows($resultado); // obtenemos el número de filas
mysql_free_result($resultado);
?>		
<div>  
<div class="fleft"><h1>Listado de Solicitudes</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<?php if ( $numero > 0 ){ ?>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>" ><input onclick="return validacion()" type="button" value="Crear nuevo &raquo;" /></a></div>
<?php  } else { ?>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&new=true" ><input name="" type="button" value="Crear nuevo &raquo;" /></a></div>
<?php  } ?>

<div class="clear"></div></div>

<script language="javascript">
function validacion(){
   alert('Debes cerrar todas las Solicitudes que tengas abiertas antes de crear una nueva'); 
   return false; //devolvemos el foco			
}
</script>

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
   
   <?php if($solicitud['Estado']=='13'){?>
   <td>Abierta</td>
   <td>
    <a href="<?php echo $location; ?>?view=<?php echo $_GET['view']; ?>&solicitud=<?php echo $solicitud['idSolicitud']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>
   </td> 
   <?php }else{?>
   <td>Cerrada</td> 
   <td></td>
   <?php }?>
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>


<div class="paginacion">
<?php if(($num_pag - 1) > 0) { 
echo '<a href="'.$location.'?view='.$_GET['view'].'&pagina='.($num_pag-1).'" class="fleft"><img src="img/f-izquierda.png" width="29" height="22" alt="img" /></a>';
} ?>

<div class="center fleft">
<p><?php echo $num_pag;?> de <?php echo $total_paginas;?></p>  
</div>

<?php if(($num_pag + 1)<=$total_paginas) {
echo '<a href="'.$location.'?view='.$_GET['view'].'&pagina='.($num_pag+1).'" class="fright"><img src="img/f-derecha.png" width="29" height="22" alt="img" /></a>';	
} ?>
<div class="clear"></div>
</div>
		
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
	<a href="<?php echo $location; ?>?view=<?php echo $usuarios['idEmpresa']; ?>&pagina=1"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
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