<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';

// obtengo puntero de conexion con la db
$dbConn = conectar();

// Se traen todos los datos de mi usuario
$query = "SELECT 
background_color, 
btn_enlace_color_fondo, 
btn_enlace_ancho, 
btn_enlace_radio, 
btn_enlace_float,
btn_enlace_color_texto,
btn_enlace_sombra,
btn_enlace_border,
btn_aceptar_color_fondo,
btn_aceptar_ancho,
btn_aceptar_radio,
btn_aceptar_float,
btn_aceptar_color_texto,
btn_aceptar_sombra,
btn_aceptar_border,
btn_cancelar_color_fondo,
btn_cancelar_ancho,
btn_cancelar_radio,
btn_cancelar_float,
btn_cancelar_color_texto,
btn_cancelar_sombra,
btn_cancelar_border,
btn_otros_color_fondo,
btn_otros_ancho,
btn_otros_radio,
btn_otros_float,
btn_otros_color_texto,
btn_otros_sombra,
btn_otros_border
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	<link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="<?php echo $rowdata['background_color'] ?>">
   
<a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_ancho'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_float'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'].' '.$rowdata['btn_enlace_border'] ?> btn_link" href="#">Enlace</a>

<a class="<?php echo $rowdata['btn_aceptar_color_fondo'].' '.$rowdata['btn_aceptar_ancho'].' '.$rowdata['btn_aceptar_radio'].' '.$rowdata['btn_aceptar_float'].' '.$rowdata['btn_aceptar_color_texto'].' '.$rowdata['btn_aceptar_sombra'].' '.$rowdata['btn_aceptar_border'] ?> btn_link" href="#">Aceptar</a>

<a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_ancho'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_float'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'].' '.$rowdata['btn_cancelar_border'] ?> btn_link" href="#">Cancelar</a>

<a class="<?php echo $rowdata['btn_otros_color_fondo'].' '.$rowdata['btn_otros_ancho'].' '.$rowdata['btn_otros_radio'].' '.$rowdata['btn_otros_float'].' '.$rowdata['btn_otros_color_texto'].' '.$rowdata['btn_otros_sombra'].' '.$rowdata['btn_otros_border'] ?> btn_link" href="#">Otros</a>

</body>
</html>