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
$location = "zint_bodega.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Bodega - Stock</title>
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
<div class="title"><p>Stock - Bodega</p></div>
	<div class="content">          
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['idart']) ) {  
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
 $query = "SELECT idBodega
 FROM `zint_bodega` 
 WHERE idEmpresa = {$_GET['emp']} AND idArticulo = {$_GET['idart']} AND Estado = '14'";
 $registros = mysql_query ($query, $dbConn);
 $cuenta_registros = mysql_num_rows($registros);
// se establece la cantidad de paginas a mostrar
$total_paginas = ceil($cuenta_registros / $cant_reg); 

$arrBodega = array();
$query = "SELECT 
zint_bodega.fMovimiento,
detalle_general.Nombre AS tipo_movimiento,
tipo_doc.Nombre AS tipo_doc,
zint_bodega.N_doc,
zint_bodega.Procedencia,
zint_bodega.Cantidad,
zint_bodega.Valor
FROM `zint_bodega`
INNER JOIN `detalle_general`             ON detalle_general.id_Detalle   = zint_bodega.operacion
INNER JOIN `detalle_general` tipo_doc    ON tipo_doc.id_Detalle          = zint_bodega.Tipo_doc
WHERE zint_bodega.idEmpresa = {$_GET['emp']} AND zint_bodega.idArticulo = {$_GET['idart']} AND zint_bodega.Estado = '14'
ORDER BY fMovimiento DESC 
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBodega,$row );
}
mysql_free_result($resultado);
 ?>         
<div>  
<div class="fleft"><h1>Historial de Ingresos de <?php echo $_GET['name']; ?></h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Fecha Movimiento</th>
   <th>Tipo Movimiento</th>
   <th>Tipo Documentos</th>
   <th>N° Documentos</th>
   <th>Cantidad</th>
   <th>$/uni</th>
   <th>Procedencia</th> 
  </tr> 
 </thead>
 <tbody>

<?php foreach ($arrBodega as $bodega) { ?>  
  <tr> 
   <td><?php echo Fecha_estandar($bodega['fMovimiento']); ?></td>
   <td><?php echo $bodega['tipo_movimiento']; ?></td>
   <td><?php echo $bodega['tipo_doc']; ?></td>
   <td><?php echo n_doc($bodega['N_doc']); ?></td>
   <td><?php echo Cantidades_cd($bodega['Cantidad']).' '.$_GET['uml']; ?></td>
   <?php if ( $bodega['tipo_movimiento']=='Ingreso' ) {?> 
    <td><?php echo Valores_sd($bodega['Valor']); ?></td>
    <td><?php echo $bodega['Procedencia']; ?></td>
    <?php } else { ?>
    <td style="background-color:#eee;"></td>
    <td style="background-color:#eee;"></td>
    <?php } ?>
    
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>
		
<div class="paginacion">
<?php if(($num_pag - 1) > 0) { 
echo '<a href="'.$location.'?idart='.$_GET['idart'].'&pagina='.($num_pag-1).'&name='.$_GET['name'].'&uml='.$_GET['uml'].'&emp='.$_GET['emp'].'" class="fleft"><img src="img/f-izquierda.png" width="29" height="22" alt="img" /></a>';
} ?>

<div class="center fleft">
<p><?php echo $num_pag;?> de <?php echo $total_paginas;?></p>  
</div>

<?php if(($num_pag + 1)<=$total_paginas) {
echo '<a href="'.$location.'?idart='.$_GET['idart'].'&pagina='.($num_pag+1).'&name='.$_GET['name'].'&uml='.$_GET['uml'].'&emp='.$_GET['emp'].'" class="fright"><img src="img/f-derecha.png" width="29" height="22" alt="img" /></a>';	
} ?>
<div class="clear"></div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS FILTRADOS Y AGRUPADOS
$arrBodega = array();
$query = "SELECT  
zint_bodega.idEmpresa, 
zint_bodega.idArticulo, 
zint_articulo.Nombre_art AS nombre_articulo, 
SUM(zint_bodega.Cantidad) AS suma_cantidad, 
SUM(zint_bodega.Valor) AS suma_valor, 
COUNT(zint_bodega.Valor) AS cuenta_valor,
zint_uml.Nombre AS unidad_med,
SUM(zint_bodega.contar_cero) AS cuenta_cero
FROM `zint_bodega`
INNER JOIN `zint_articulo` ON zint_articulo.idArticulo = zint_bodega.idArticulo
LEFT JOIN `zint_uml` ON zint_uml.idUml = zint_articulo.idUml
WHERE zint_bodega.idEmpresa = {$_GET['view']}  AND zint_bodega.Estado = '14'
GROUP BY zint_articulo.idArticulo
 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBodega,$row );
}
mysql_free_result($resultado);
?>
<div>  
<div class="fleft"><h1>Stock en Bodega</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre del Articulo</th>
   <th>Stock</th>
   <th>Valor Promedio unitario</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody>

<?php foreach ($arrBodega as $bodega) { ?>  
  <tr> 
   <td><?php echo $bodega['nombre_articulo']; ?></td>
   <td><?php echo Cantidades_cd($bodega['suma_cantidad']).' '. $bodega['unidad_med']; ?></td>
   <td><?php $promedio= $bodega['suma_valor']/($bodega['cuenta_valor']-$bodega['cuenta_cero']); echo Valores_cd($promedio); ?></td>
   <td>
	<a href="<?php echo $location; ?>?idart=<?php echo $bodega['idArticulo'];  ?>&pagina=1&name=<?php echo $bodega['nombre_articulo']; ?>&uml=<?php echo $bodega['unidad_med']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_categories.png" title="Editar"></a>    	   
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