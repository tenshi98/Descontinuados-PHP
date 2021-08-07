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

// obtengo puntero de conexion con la db
$dbConn = conectar();

// Se traen todos los datos 
$query = "SELECT 
background_color, 
usr_img_border, 
usr_img_border_radius, 
usr_img_shadow, 
usr_img_width,
usr_name_lettersize,
usr_name_lettercolor,
usr_name_pat_lettersize,
usr_name_pat_lettercolor,
usr_name_pat_lettersize_2,
usr_name_pat_lettercolor_2
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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="<?php echo $rowdata['background_color'] ?>">
  
<table class="tb_user"><tr>	<td> 
            <div class="cover"> 
                  <img src="img/avatar.jpg" class="<?php echo $rowdata['usr_img_border'].' '.$rowdata['usr_img_border_radius'].' '.$rowdata['usr_img_shadow'].' '.$rowdata['usr_img_width'] ?>" /> 
                  <p class="name <?php echo $rowdata['usr_name_lettersize'].' '.$rowdata['usr_name_lettercolor'] ?>">Bienvenido</p>
                  <p class="name_pat <?php echo $rowdata['usr_name_pat_lettersize'].' '.$rowdata['usr_name_pat_lettercolor'] ?>">Visita</p>
                  <p class="name_pat <?php echo $rowdata['usr_name_pat_lettersize_2'].' '.$rowdata['usr_name_pat_lettercolor_2'] ?>">Datos</p>      		</div>	</td></tr>
</table>


</body>
</html>