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
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "metro_ot_inf_02.php";
//formulario para agregar comentarios a la ot
if ( !empty($_POST['submit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/informes_consumos.php';//creacion de variables
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Informe de Consumos</title>
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
<div class="title"><p>Informe de Consumos</p></div>
<div class="content">         
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
if ( ! empty($_GET['idart']) ) {
//RECUPERO EL FILTRO DESDE GET
$q = "WHERE zint_bodega.idEmpresa = '{$_GET['emp']}' "; 
//filtro de f_Inicio
if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != '' && isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
 $q .= "AND zint_bodega.fMovimiento BETWEEN '{$_GET['f_inicio']}' AND '{$_GET['f_termino']}' " ; 
}
// Se trae un listado con el total de las horas de los operadores
$arrArticulo = array();
$query = "SELECT
zint_bodega.N_doc AS n_orden,
zint_bodega.fMovimiento AS fecha,
empresas_item_list.Nombre AS nombre_trabajo,
zint_bodega.Cantidad AS cantidad,
zint_uml.Nombre AS unidad_medida
FROM `zint_bodega`
INNER JOIN `empresas_ot_listado`  ON empresas_ot_listado.idOt        = zint_bodega.N_doc
LEFT JOIN `empresas_item_list`    ON empresas_item_list.idItemlist   = empresas_ot_listado.idItemlist
LEFT JOIN `zint_articulo`         ON zint_articulo.idArticulo        = zint_bodega.idArticulo
LEFT JOIN `zint_uml`              ON zint_uml.idUml                  = zint_articulo.idUml
".$q." AND zint_bodega.idArticulo={$_GET['idart']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrArticulo,$row );
}
mysql_free_result($resultado);
?> 

<div>  
<div class="fleft"><h1>Listado de Consumos de <?php echo $_GET['art']; ?></h1></div>
<?php 
   //Filtro para empresa
   $a = '?emp='.$_GET['emp'] ;
   //filtro de f_inicio
   if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != ''){ 
    $a .= '&f_inicio='.$_GET['f_inicio'] ;
   }
   //filtro de f_termino
   if(isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
    $a .= '&f_termino='.$_GET['f_termino'] ;
   }
   //filtro de idTrabajador
   if(isset($_GET['idArticulo']) && $_GET['idArticulo'] != ''){ 
    $a .= '&idArticulo='.$_GET['idArticulo'] ;
   }		
?>   
<div class="fright"><a href="<?php echo $location.''.$a; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th width="80">OT</th>
   <th width="100">Fecha</th>
   <th>Trabajo</th>
   <th width="120">Cantidad</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrArticulo as $articulo) { ?>
  <tr> 
   <td><a target="_blank" href="ver_ot2.php?idot=<?php echo $articulo['n_orden']; ?>"><?php echo n_doc($articulo['n_orden']); ?></a></td>
   <td><?php echo Fecha_estandar($articulo['fecha']); ?></td>
   <td><?php echo $articulo['nombre_trabajo']; ?></td>
   <td><?php echo Cantidades_cd($articulo['cantidad']).' '.$articulo['unidad_medida']; ?> </td>
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['emp']) ) {	 
//RECUPERO EL FILTRO DESDE GET
$q = "WHERE zint_bodega.idEmpresa = '{$_GET['emp']}' "; 
//filtro de f_Inicio
if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != '' && isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
 $q .= "AND zint_bodega.fMovimiento BETWEEN '{$_GET['f_inicio']}' AND '{$_GET['f_termino']}' " ; 
}
//filtro de idArticulo
if(isset($_GET['idArticulo']) && $_GET['idArticulo'] != '' ){ 
 $q .= "AND zint_bodega.idArticulo = '{$_GET['idArticulo']}' " ; 
} 
// Se trae un listado con el total de las horas de los operadores
$arrArticulos = array();
$query = "SELECT
zint_bodega.idArticulo AS idArticulo,
zint_articulo.Nombre_art AS nombre,
SUM(zint_bodega.Cantidad) AS suma_cantidad
FROM `zint_bodega`
LEFT JOIN `zint_articulo`  ON zint_articulo.idArticulo  = zint_bodega.idArticulo
".$q." AND Tipo_doc='20'
GROUP BY nombre ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrArticulos,$row );
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
   <th>Nombre Articulo</th>
   <th width="80">Cantidad</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrArticulos as $articulos) { ?>
  <tr> 
   <td><?php echo $articulos['nombre']; ?></td>
   <td><?php echo Cantidades_cd($articulos['suma_cantidad']); ?></td>
   <td>
   <?php 
   //Filtro para empresa
        $a = '?emp='.$_GET['emp'] ;
		//filtro de f_inicio
		if(isset($_GET['f_inicio']) && $_GET['f_inicio'] != ''){ 
        	$a .= '&f_inicio='.$_GET['f_inicio'] ;
        }
		//filtro de f_termino
		if(isset($_GET['f_termino']) && $_GET['f_termino'] != ''){ 
        	$a .= '&f_termino='.$_GET['f_termino'] ;
        }
		//filtro de idArticulo
		if(isset($_GET['idArticulo']) && $_GET['idArticulo'] != ''){ 
        	$a .= '&idArticulo='.$_GET['idArticulo'] ;
        }
		//Se asigna la variable del trabajador
		$a .= '&idart='.$articulos['idArticulo'] ;
		//Se asigna la variable del trabajador
		$a .= '&art='.$articulos['nombre'] ;		
		?>
	<a href="<?php echo $location.''.$a; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>		
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) {
// Se trae un listado con los articulos de la empresa
$arrArticulos = array();
$query = "SELECT idArticulo, Nombre_art
FROM `zint_articulo` 
WHERE idEmpresa = {$_GET['view']}
ORDER BY Nombre_art ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrArticulos,$row );
}
mysql_free_result($resultado); ?>
<div>  
<div class="fleft"><h1>Filtro de seleccion</h1></div>
<div class="clear"></div></div> 

<table class="tableform">
<form  method="post">
	<tr>
    	<td width="100"><label>Fecha Inicio</label></td>
        <td width="70"><input type="date" name="f_inicio"/></td>
        <td width="120"><label>Fecha Termino</label></td>
        <td width="70"><input type="date" name="f_termino"/></td>
        <td><label>Articulo</label></td>
        <td><select name="idArticulo" >
		<option value="" selected>Seleccione un Articulo</option>
		<?php foreach ( $arrArticulos as $articulos ) { ?>
		<option value="<?php echo $articulos['idArticulo']; ?>"><?php echo $articulos['Nombre_art']; ?></option><?php } ?></select></td>
	</tr>
    <tr>
		<td colspan="5"></td>
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['view'] ?>" />
		<td><div class="fright"> <input name="submit" type="submit" value="Buscar &raquo;" /> </div></td>
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