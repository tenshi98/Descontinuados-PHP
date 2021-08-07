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
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';

//SE TRAEN LOS DATOS DE LA SOLICITUD
$query = "SELECT 
zint_bodega_solicitud.idSolicitud, 
zint_bodega_solicitud.fSolicitud,
zint_bodega_solicitud.Comentario,
zint_bodega_solicitud.tipo_cliente,
trabajadores_listado.Nombre AS cliente_interno,
empresas_listado.Nombre AS cliente_externo,
usuarios_listado.Nombre AS nombre_responsable
FROM `zint_bodega_solicitud`
INNER JOIN `usuarios_listado`        ON usuarios_listado.idUsuario            = zint_bodega_solicitud.Responsable
INNER JOIN `trabajadores_listado`    ON trabajadores_listado.idTrabajador     = zint_bodega_solicitud.idCliente
INNER JOIN `empresas_listado`        ON empresas_listado.idEmpresa            = zint_bodega_solicitud.idCliente
WHERE  zint_bodega_solicitud.idSolicitud={$_GET['solicitud']}
ORDER BY zint_bodega_solicitud.fSolicitud DESC";
$resultado = mysql_query ($query, $dbConn);
$rowsol = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); 
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS QUE SE VAN A CONSUMIR
$arrBodega = array();
$query = "SELECT 
zint_bodega.idBodega, 
zint_articulo.Nombre_art as nombre_articulo,
zint_bodega.Cantidad,
zint_bodega.Comentario,
zint_uml.Nombre AS nombre_medida
FROM `zint_bodega`
INNER JOIN `zint_articulo`   ON zint_articulo.idArticulo   = zint_bodega.idArticulo
INNER JOIN `zint_uml`        ON zint_uml.idUml             = zint_articulo.idUml
WHERE zint_bodega.idSolicitud = {$_GET['solicitud']} 
 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBodega,$row );
}
mysql_free_result($resultado); 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Solicitud de materiales</title>
<link href="css/print1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">
 <div class="logo">
  <div class="imagen">
   <img src="img/logoempresa.jpg"  alt="logo" />
  </div>
  
   <div class="datos">
     <h1>Solicitud de materiales</h1>
     <p><strong>N° Solicitud : </strong><?php echo n_doc($rowsol['idSolicitud']); ?></p>
     <p><strong>Fecha Solicitud : </strong><?php echo Fecha_completa($rowsol['fSolicitud']); ?></p>
     <p><strong>Responsable de la solicitud : </strong><?php echo $rowsol['nombre_responsable']; ?></p>
   </div>
 </div>
<div class="clear"></div>
<div class="content-listado" >
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Articulo solicitado</th>
   <th>Cantidad</th>
   <th>Uso</th>
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrBodega as $bodega) { ?>
  <tr>
   <td><?php echo $bodega['nombre_articulo']; ?></td>
   <td><?php echo Cantidades_cd($bodega['Cantidad']*'-1').' '.$bodega['nombre_medida']; ?></td>
   <td><?php echo $bodega['Comentario']; ?></td>
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>

<div class="box">

<?php if($rowsol['tipo_cliente']=='1'){
echo '<p>Cliente Interno : '.$rowsol['cliente_interno'].'</p>';
}else{
echo '<p>Cliente Externo : '.$rowsol['cliente_externo'].'</p>';	
}
echo '<p>'.$rowsol['Comentario'].'</p>'; ?>

</div>


</div>

<div class="footer">
 <div class="left">
   <p>Firma encargado</p>
 </div>
 <div class="right">
   <p>Firma usuario</p>
 </div>
</div>
<div class="clear"></div>



</body>
</html>