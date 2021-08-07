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
productos_recetas_productos.idReceta

FROM `productos_recetas_productos`
LEFT JOIN `productos_recetas`             ON productos_recetas.idReceta                 = productos_recetas_productos.idReceta
LEFT JOIN `productos_recetas_dificultad`  ON productos_recetas_dificultad.idDificultad  = productos_recetas.idDificultad
WHERE productos_recetas_productos.idProducto = '".$_GET['idProducto']."'
ORDER BY productos_recetas.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRecetas,$row );
}

//imprimo los datos
echo '<h1>Recetas</h1>';
//se verifica si existen recetas
if($arrRecetas){
	foreach ($arrRecetas as $recetas) { ?>
		<a onclick="receta(<?php echo $recetas['idReceta'] ?>);" > 
			<div class="receta_head">
				<div class="pic fleft">
					<img alt="Producto" src="<?php echo $ubiquity.$recetas['NombreImagen']?>">
				</div>
				<div class="info fleft">
					<h2><?php echo $recetas['Nombrereceta'] ?></h2>
					<hr/>
					<p class="fright">
						<span class="evaluacion"><img src="img/prod_valora.png"> <?php echo $recetas['Dificultad'] ?></span>
						<span class="precio"><img src="img/prod_valor_producto.png"> <?php echo $recetas['Minutos'] ?></span>
						<span class="precio"><img src="img/prod_valor_producto.png"> <?php echo $recetas['NPorciones'] ?></span>
					</p>
				</div>
				<div class="clear"></div>
			</div>
		</a>	
	<?php } ?>
	<script>
	function receta(idReceta) {

		$('#x_content').load('productos_detalle_tab3_det.php?idProducto=<?php echo $_GET['idProducto'] ?>&idReceta='+idReceta);

	}	
	</script>
<?php }else{ 
echo '<div class="receta_content">';
echo '<p>no existen datos relacionados para este producto</p>';
echo '</div>';	
}
?>


