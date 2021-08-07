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
btn_aceptar_color_fondo, 
btn_aceptar_ancho, 
btn_aceptar_radio, 
btn_aceptar_float,
btn_aceptar_color_texto,
btn_aceptar_sombra
FROM `app_ajustes_generales`
WHERE id = 1";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="<?php echo $rowdata['background_color'] ?>">
  
<a class="<?php echo $rowdata['btn_aceptar_color_fondo'].' '.$rowdata['btn_aceptar_ancho'].' '.$rowdata['btn_aceptar_radio'].' '.$rowdata['btn_aceptar_float'].' '.$rowdata['btn_aceptar_color_texto'].' '.$rowdata['btn_aceptar_sombra'] ?> btn_link " href="#">Aceptar</a>


</body>
</html>