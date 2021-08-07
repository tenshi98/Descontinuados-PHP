<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';

// obtengo puntero de conexion con la db
$dbConn = conectar();

// Se traen todos los datos 
$query = "SELECT 
background_color,

msg_error_color_body,
msg_error_color_text,
msg_error_width,
msg_error_border,
msg_error_border_color,

msg_alert_color_body,
msg_alert_color_text,
msg_alert_width,
msg_alert_border,
msg_alert_border_color,

msg_success_color_body,
msg_success_color_text,
msg_success_width,
msg_success_border,
msg_success_border_color,

msg_info_color_body,
msg_info_color_text,
msg_info_width,
msg_info_border,
msg_info_border_color

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
        <link rel="stylesheet" href="css/estilo.css">	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="<?php echo $rowdata['background_color'] ?>">

<div class="alert fcenter <?php echo $rowdata['msg_error_color_body'].' '.$rowdata['msg_error_color_text'].' '.$rowdata['msg_error_width'].' '.$rowdata['msg_error_border'].' '.$rowdata['msg_error_border_color'] ?>">
<i class="fa fa-ban"></i>
<p class="long_txt"><b>Error!</b> Error.</p>
</div>

<div class="alert fcenter <?php echo $rowdata['msg_alert_color_body'].' '.$rowdata['msg_alert_color_text'].' '.$rowdata['msg_alert_width'].' '.$rowdata['msg_alert_border'].' '.$rowdata['msg_alert_border_color'] ?>">
<i class="fa fa-exclamation-triangle"></i>
<p class="long_txt"><b>Alerta!</b> Alerta.</p>
</div>

<div class="alert fcenter <?php echo $rowdata['msg_success_color_body'].' '.$rowdata['msg_success_color_text'].' '.$rowdata['msg_success_width'].' '.$rowdata['msg_success_border'].' '.$rowdata['msg_success_border_color'] ?>">
<i class="fa fa-check"></i>
<p class="long_txt"><b>Correcto!</b> Correcto.</p>
</div>

<div class="alert fcenter <?php echo $rowdata['msg_info_color_body'].' '.$rowdata['msg_info_color_text'].' '.$rowdata['msg_info_width'].' '.$rowdata['msg_info_border'].' '.$rowdata['msg_info_border_color'] ?>">
<i class="fa fa-info"></i>
<p class="long_txt"><b>Informacion!</b> Informacion.</p>
</div>
    



</body>
</html>