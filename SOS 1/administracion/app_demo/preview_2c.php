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
btn_cancelar_color_fondo, 
btn_cancelar_ancho, 
btn_cancelar_radio, 
btn_cancelar_float,
btn_cancelar_color_texto,
btn_cancelar_sombra
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
  
<a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_ancho'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_float'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link " href="#">Cancelar</a>


</body>
</html>