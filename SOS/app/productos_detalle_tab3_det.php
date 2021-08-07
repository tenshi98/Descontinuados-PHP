<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
// obtengo puntero de conexion con la db
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//VARIABLE DE SISTEMA CON LA UBICACION DE LOS ARCHIVOS
//$ubiquity = 'http://localhost/SOS/administracion/upload/';
$ubiquity = 'http://190.98.210.36/sostaxi/administracion/upload/';
//se traen todas las recetas que tengan el producto
$arrRecetas = array();
$query = "SELECT 
productos_recetas.Nombre AS Nombrereceta,
productos_recetas_dificultad.Nombre AS Dificultad,
productos_recetas.Minutos,
productos_recetas.NPorciones,
productos_recetas.NombreImagen,
productos_recetas.Preparacion

FROM `productos_recetas`
LEFT JOIN `productos_recetas_dificultad`  ON productos_recetas_dificultad.idDificultad  = productos_recetas.idDificultad
WHERE productos_recetas.idReceta = '".$_GET['idReceta']."' ";
$resultado = mysql_query ($query, $dbConn);
$row_receta = mysql_fetch_assoc ($resultado);

//se traen todos los productos de la receta
$arrProductos = array();
$query = "SELECT 
productos_listado.Nombre AS NombreProducto,
productos_recetas_productos.TextoAntes,
productos_recetas_productos.TextoDespues,
productos_listado_pasillos.Nombre AS NombrePasillo

FROM `productos_recetas_productos`
LEFT JOIN `productos_listado`             ON productos_listado.idProducto           = productos_recetas_productos.idProducto
LEFT JOIN `productos_listado_pasillos`    ON productos_listado_pasillos.idPasillo   = productos_listado.idPasillo
WHERE productos_recetas_productos.idReceta = '".$_GET['idReceta']."'
ORDER BY productos_listado.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrProductos,$row );
}

?>
<h1>Receta</h1>

<div class="receta_head">
	<div class="pic fleft">
		<img alt="Producto" src="<?php echo $ubiquity.$row_receta['NombreImagen']?>">
	</div>
	<div class="info fleft">
		<h2><?php echo $row_receta['Nombrereceta'] ?></h2>
		<hr/>
		<p class="fright">
			<span class="evaluacion"><img src="img/prod_valora.png"> <?php echo $row_receta['Dificultad'] ?></span>
			<span class="precio"><img src="img/prod_valor_producto.png"> <?php echo $row_receta['Minutos'] ?></span>
			<span class="precio"><img src="img/prod_valor_producto.png"> <?php echo $row_receta['NPorciones'] ?></span>
		</p>
	</div>
	<div class="clear"></div>
</div>

<h1>Ingredientes</h1>

<div class="receta_content">
	<ul>
		<?php foreach ($arrProductos as $prod) { ?>
			<li>
				<span class="fleft"><?php echo $prod['TextoAntes'].' '.$prod['NombreProducto'].' '.$prod['TextoDespues'] ?></span>
				<span class="fright pasillo"><?php echo $prod['NombrePasillo'] ?></span>
				<div class="clear"></div>
			</li>
		<?php } ?>
	</ul>
</div>

<h1>Paso a paso</h1>

<div class="receta_content">
	<?php echo $row_receta['Preparacion'] ?>
</div>

<div class="clear"></div>
<br/>
<div class="receta_content">
	<a onclick="producto(<?php echo $_GET['idProducto'] ?>);" class="btn" >Volver</a>
</div>

<script>
function producto(idProducto) {

	$('#x_content').load('productos_detalle_tab3.php?idProducto='+idProducto);

}	
</script>



