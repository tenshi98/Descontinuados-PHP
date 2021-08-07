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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
require_once 'core/update.php';
//require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "principal.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->



<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<?php
//VARIABLE DE SISTEMA CON LA UBICACION DE LOS ARCHIVOS
//$ubiquity = 'http://localhost/SOS/administracion/upload/';
$ubiquity = 'http://190.98.210.36/sostaxi/administracion/upload/';

//Se traen los datos del usuario
$query = "SELECT 
productos_listado.idProducto,
productos_listado.Nombre,
productos_listado.Fabricante,
productos_listado.idEvaluacion,
productos_listado.Evaluacion,
productos_listado.Precio,
productos_listado.Descripcion,
productos_listado.Nombre_imagen,
productos_listado_pasillos.Nombre AS Pasillo
FROM `productos_listado`
LEFT JOIN `productos_listado_pasillos` ON productos_listado_pasillos.idPasillo = productos_listado.idPasillo
WHERE CodigoProd = '".$_GET['CodigoProd']."'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($resultado);
//se traen todas las recetas que tengan el producto
$arrRecetas = array();
$query = "SELECT 
productos_recetas.Nombre AS Nombrereceta,
productos_recetas_dificultad.Nombre AS Dificultad,
productos_recetas.Minutos,
productos_recetas.NPorciones,
productos_recetas.NombreImagen

FROM `productos_recetas_productos`
LEFT JOIN `productos_recetas`             ON productos_recetas.idReceta                 = productos_recetas_productos.idReceta
LEFT JOIN `productos_recetas_dificultad`  ON productos_recetas_dificultad.idDificultad  = productos_recetas.idDificultad
WHERE productos_recetas_productos.idProducto = ".$row_data['idProducto']." 
ORDER BY productos_recetas.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRecetas,$row );
}
	
?>

<div class="prod_body">
	<div class="prod_head">
		<div class="pic fleft">
			<img src="<?php echo $ubiquity.$row_data['Nombre_imagen']?>">
		</div>
		<div class="info fleft">
			<h1><?php echo $row_data['Fabricante'] ?></h1>
			<h2><?php echo $row_data['Nombre'] ?></h2>
			<br/>
			<ul>
				<li><img src="img/prod_ubicacion.png"> <?php echo $row_data['Pasillo'] ?></li>
				<?php
				switch ($row_data['idEvaluacion']) {
					case 1://no saludable
						echo '<li><img src="img/prod_poco_saludable.png"> No saludable</li>';
						break;
					case 2://saludable
						echo '<li><img src="img/prod_saludable.png"> Saludable</li>';
						break;
					case 3://muy saludable
						echo '<li><img src="img/prod_muy_saludable.png"> Muy saludable</li>';
						break;
				}
				?>
			</ul>
			<hr/>
			<p class="fright">
				<span class="evaluacion"><img src="img/prod_valora.png"> <?php echo $row_data['Evaluacion'] ?></span>
				<span class="precio"><img src="img/prod_valor_producto.png"> <?php echo $row_data['Precio'] ?></span>
			</p>

		</div>
		<div class="clear"></div>
	</div>
	

<section class="prod_tabs">
    <input id="prod_tab-1" type="radio" name="radio-set" class="prod_tab-selector-1" checked="checked" />
    <label for="prod_tab-1" onclick="myFunction();"><img src="img/prod_comparte_bco.png"></label>

    <input id="prod_tab-2" type="radio" name="radio-set" class="prod_tab-selector-2" />
    <label for="prod_tab-2" onclick="myFunction();"><img src="img/prod_receta_bco.png"></label>

    <input id="prod_tab-3" type="radio" name="radio-set" class="prod_tab-selector-3" />
    <label for="prod_tab-3" onclick="myFunction();"><img src="img/prod_valora_bco.png"></label>
    
    <input id="prod_tab-4" type="radio" name="radio-set" class="prod_tab-selector-4" />
    <label for="prod_tab-4" onclick="myFunction();"><img src="img/prod_valora_bco.png"></label>
    
    <input id="prod_tab-5" type="radio" name="radio-set" class="prod_tab-selector-5" />
    <label for="prod_tab-5" onclick="myFunction();"><img src="img/prod_valora_bco.png"></label>


    <div class="clear-shadow"></div>

    <div class="prod_content">
        <div class="prod_content-1">
            <?php echo $row_data['Descripcion'] ?>
            <button onclick="myFunction()">Click me</button>

<p id="demo"></p>

<script>
function myFunction() {
    alert('hola');
}
</script> 
            <div class="clear"></div>
        </div>
        <div class="prod_content-2">
            
            <?php foreach ($arrRecetas as $recetas) { ?>
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
	
			<?php } ?>
	
	
            
            <div class="clear"></div>
        </div>
        <div class="prod_content-3">
          
          
           
            
            <div class="clear"></div>     
        </div>
        <div class="clear"></div>
    </div>
</section>
	
	
	
</div>





<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
