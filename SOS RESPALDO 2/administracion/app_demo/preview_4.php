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
list_shadow,
list_color_border,
list_sep,
list_width,
list_alin,
list_deg,
list_border,
list_tittle_size,
list_tittle_color,
list_text_size,
list_text_color
FROM `app_ajustes_generales`
WHERE id = {$_GET['app_conf']}";
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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="<?php echo $rowdata['background_color'] ?>">
  
<table class="tb_lister <?php echo $rowdata['list_shadow'].' '.$rowdata['list_color_border'].' '.$rowdata['list_sep'].' '.$rowdata['list_width'].' '.$rowdata['list_alin'] ?>  ">
  
  <tr class="<?php echo $rowdata['list_deg'] ?>">
    <td width="30%"><img src="img/01.jpg" class="<?php echo $rowdata['list_border'] ?>"></td>
    <td width="70%">
        <a href="#"  >
            <div class="lister_content" >
                <h1 class="<?php echo $rowdata['list_tittle_size'].' '.$rowdata['list_tittle_color'] ?>">Titulo</h1>    
                <p class="<?php echo $rowdata['list_text_size'].' '.$rowdata['list_text_color'] ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>    
            </div>
        </a> 
    </td>
  </tr>
  <tr class="<?php echo $rowdata['list_deg'] ?>">
    <td width="30%"><img src="img/02.jpg" class="<?php echo $rowdata['list_border'] ?>"></td>
    <td width="70%">
        <a href="#"  >
            <div class="lister_content" >
                <h1 class="<?php echo $rowdata['list_tittle_size'].' '.$rowdata['list_tittle_color'] ?>">Titulo</h1>    
                <p class="<?php echo $rowdata['list_text_size'].' '.$rowdata['list_text_color'] ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>    
            </div>
        </a> 
    </td>
  </tr>
  <tr class="<?php echo $rowdata['list_deg'] ?>">
    <td width="30%"><img src="img/03.jpg" class="<?php echo $rowdata['list_border'] ?>"></td>
    <td width="70%">
        <a href="#"  >
            <div class="lister_content" >
                <h1 class="<?php echo $rowdata['list_tittle_size'].' '.$rowdata['list_tittle_color'] ?>">Titulo</h1>    
                <p class="<?php echo $rowdata['list_text_size'].' '.$rowdata['list_text_color'] ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>    
            </div>
        </a> 
    </td>
  </tr>
  <tr class="<?php echo $rowdata['list_deg'] ?>">
    <td width="30%"><img src="img/04.jpg" class="<?php echo $rowdata['list_border'] ?>"></td>
    <td width="70%">
        <a href="#"  >
            <div class="lister_content" >
                <h1 class="<?php echo $rowdata['list_tittle_size'].' '.$rowdata['list_tittle_color'] ?>">Titulo</h1>    
                <p class="<?php echo $rowdata['list_text_size'].' '.$rowdata['list_text_color'] ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>    
            </div>
        </a> 
    </td>
  </tr>
  <tr class="<?php echo $rowdata['list_deg'] ?>">
    <td width="30%"><img src="img/05.jpg" class="<?php echo $rowdata['list_border'] ?>"></td>
    <td width="70%">
        <a href="#"  >
            <div class="lister_content" >
                <h1 class="<?php echo $rowdata['list_tittle_size'].' '.$rowdata['list_tittle_color'] ?>">Titulo</h1>    
                <p class="<?php echo $rowdata['list_text_size'].' '.$rowdata['list_text_color'] ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>    
            </div>
        </a> 
    </td>
  </tr>
  <tr class="<?php echo $rowdata['list_deg'] ?>">
    <td width="30%"><img src="img/06.jpg" class="<?php echo $rowdata['list_border'] ?>"></td>
    <td width="70%">
        <a href="#"  >
            <div class="lister_content" >
                <h1 class="<?php echo $rowdata['list_tittle_size'].' '.$rowdata['list_tittle_color'] ?>">Titulo</h1>    
                <p class="<?php echo $rowdata['list_text_size'].' '.$rowdata['list_text_color'] ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>    
            </div>
        </a> 
    </td>
  </tr>
  
  
</table>



</body>
</html>