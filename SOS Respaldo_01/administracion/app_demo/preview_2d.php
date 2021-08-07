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

// Se traen todos los datos 
$query = "SELECT 
background_color, 
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
  
<a class="<?php echo $rowdata['btn_otros_color_fondo'].' '.$rowdata['btn_otros_ancho'].' '.$rowdata['btn_otros_radio'].' '.$rowdata['btn_otros_float'].' '.$rowdata['btn_otros_color_texto'].' '.$rowdata['btn_otros_sombra'].' '.$rowdata['btn_otros_border'] ?> btn_link " href="#">Otros</a>


</body>
</html>