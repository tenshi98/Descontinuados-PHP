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
require_once 'core/gsm.php';
require_once 'core/sesion_cliente_2.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "espia.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idEspiaCat,idCliente,Fecha,idEstado,Texto';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/espia_listado.php';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
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
<?php 
//Listado de errores no manejables
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Espia enviado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list_mobile($error);};?>
<!-- InstanceBeginEditable name="text" -->
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['new']) ) { 
$query = "SELECT  imagen, grid_color, grid_img
FROM `espia_categorias`
WHERE idEspiaCat={$_GET['new']}
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
// Se traen todos los datos 
$query = "SELECT 
background_color, 
form_color
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata2 = mysql_fetch_assoc ($resultado);
?>

	<table class="tb_1-2">
		
		<tr>
            <td rowspan="1" colspan="2">
                <div class="box_col_0 background_color_56 border_radius0 sombra_box_00 center_img_1">
                    <a href="<?php echo $location ?>">
                        <img src="img/denuncia_tit.png" border="0">
                    </a>
                </div>
            </td>
        </tr>
		
		<tr>
            <td rowspan="1" colspan="2"  >
                <div class="box_img ">
                    <img src="img/texto_espia_reporta.png" border="0" width="100%">
                </div>
            </td>
        </tr>
		<tr>
            <td rowspan="1" colspan="2">
                <div class="<?php echo 'box_col_0 '.$rowdata['grid_color'].' '.$rowdata['grid_img'] ?>">
                    <a href="">
                        <img src="img/logo<?php echo $rowdata['imagen']?>" border="0">
                    </a>
                </div>
            </td>
        </tr>
		<tr>
            <td rowspan="1" colspan="2">
                <div class="form <?php echo $rowdata2['form_color'] ?>" style="margin-top:15px;">
					<form method="post">
					
						<div class="input">
							<label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
							<input type="text" name="Nrecorrido"  placeholder="Numero de recorrido" />
						</div>
						
						<div class="input"><label id="icon" for="name">
							<i class="fa fa-anchor"></i></label>      
							<input type="text" name="Nparada" placeholder="Numero Parada" />
						</div>
						
						<textarea placeholder="Ingrese comentario" name="Texto" ></textarea>
						
						<input type="hidden" name="idEspiaCat"  value="<?php echo $_GET['new'] ?>" >
						<input type="hidden" name="idCliente"   value="<?php echo $arrCliente['idCliente'] ?>" >
						<input type="hidden" name="Fecha"       value="<?php echo fecha_actual() ?>" >
						<input type="hidden" name="idEstado"    value="1" >
						<input type="submit" value="Enviar"  name="submit" >
				   
					</form>
                </div>
            </td>
        </tr>
    </table>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 	
// Se trae un listado con todos los usuarios
$componentes = array();
$query = "SELECT  idEspiaCat, imagen, Margen, grid_color, grid_border, grid_shadow, grid_img, body_col
FROM `espia_categorias`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $componentes,$row );
}

?>  
	<table class="tb_1-2">
		
		<tr>
            <td rowspan="1" colspan="2">
                <div class="box_col_0 background_color_56 border_radius0 sombra_box_00 center_img_1">
                    <a href="<?php echo 'principal.php'.$w ?>">
                        <img src="img/denuncia_tit.png" border="0">
                    </a>
                </div>
            </td>
        </tr>
		
		<tr>
            <td rowspan="1" colspan="2"  >
                <div class="box_img ">
                    <img src="img/texto_espia.png" border="0" width="100%">
                </div>
            </td>
        </tr>
		
        <tr>
        <?php 
		
		//Cantidad de columnas para la tabla    
		$xx=2;
		//Variable al recorrer tabla	 
		$xy=0;
		foreach ($componentes as $idcomp) { 
		$xy = $xy+$idcomp['body_col'];
		?>
            <td colspan="<?php echo $idcomp['body_col']?>" >   	
                <a href="<?php echo $location.'&new='.$idcomp['idEspiaCat'] ?>">
                    <div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/<?php echo $idcomp['imagen'] ?>" border="0" />           
                    </div>
                </a>
            </td>
        <?php 
        //Verifico si la columna actual es igal al limite de columnas, si es asi creo una nueva fila
        if($xy==$xx){$xy=0; echo '</tr><tr>';}
        //Cierre del for each
           } 
        //Verifico si al terminar el ciclo  faltan por generar columnas vacias
         if($xy<$xx){ for ($i = $xy; $i < $xx; $i++) {echo '<td></td>';} } ?>
        </tr>
		
    </table>

<?php } ?>	

      
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>