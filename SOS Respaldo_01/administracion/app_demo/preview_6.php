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
title1_size,
title1_color,
title2_size,
title2_color,
title3_size,
title3_color,
title4_size,
title4_color,
title5_size,
title5_color
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
        <h1 class="<?php echo $rowdata['title1_size'].' '.$rowdata['title1_color'] ?>">Titulo</h1>
        <h1 class="<?php echo $rowdata['title2_size'].' '.$rowdata['title2_color'] ?>">Subtitulo 1</h1>
        <h1 class="<?php echo $rowdata['title3_size'].' '.$rowdata['title3_color'] ?>">Subtitulo 2</h1>
        <h1 class="<?php echo $rowdata['title4_size'].' '.$rowdata['title4_color'] ?>">Subtitulo 3</h1>
        <h1 class="<?php echo $rowdata['title5_size'].' '.$rowdata['title5_color'] ?>">Texto</h1>	</td></tr>
</table>


</body>
</html>