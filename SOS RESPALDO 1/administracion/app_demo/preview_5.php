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

btn_enlace_color_fondo, 
btn_enlace_ancho, 
btn_enlace_radio, 
btn_enlace_float,
btn_enlace_color_texto,
btn_enlace_sombra,

btn_cancelar_color_fondo,
btn_cancelar_ancho,
btn_cancelar_radio,
btn_cancelar_float,
btn_cancelar_color_texto,
btn_cancelar_sombra,
 
noti_width,
noti_border,
noti_shadow,
noti_aling,
noti_separator,
noti_color,
noti_tab_color,
noti_tab_hover,
noti_tab_check,
noti_ul_color_new,
noti_ul_color_tittle,
noti_ul_color_text,
noti_ul_size_new,
noti_ul_size_tittle,
noti_ul_size_text



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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="<?php echo $rowdata['background_color'] ?>">
  
<section class="tabs <?php echo $rowdata['noti_width'].' '.$rowdata['noti_border'].' '.$rowdata['noti_shadow'].' '.$rowdata['noti_aling'].' '.$rowdata['noti_color'].' '.$rowdata['noti_tab_hover'].' '.$rowdata['noti_tab_check'] ?>">
        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
        <label for="tab-1" class="tab-label-1 <?php echo $rowdata['noti_tab_color'] ?>"><i class="fa fa-angellist"></i></label>
        
        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
        <label for="tab-2" class="tab-label-2 <?php echo $rowdata['noti_tab_color'] ?>"><i class="fa fa-area-chart"></i></label>
        
        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
        <label for="tab-3" class="tab-label-3 <?php echo $rowdata['noti_tab_color'] ?>"><i class="fa fa-at"></i></label>
        
        <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
        <label for="tab-4" class="tab-label-4 <?php echo $rowdata['noti_tab_color'] ?>"><i class="fa fa-at"></i></label>
        
        <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" />
        <label for="tab-5" class="tab-label-5 <?php echo $rowdata['noti_tab_color'] ?>"><i class="fa fa-at"></i></label>
        
        <div class="clear-shadow"></div>
        
        
        <div class="content <?php echo $rowdata['noti_separator'] ?>">
          
          <div class="content-1">
              <ul>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                    
<table>
  <tr height="32px">
    <td width="70%">
   <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_color_texto']?> btn_link"  href="#">Borrar</a> 
    </td>
    <td width="30%">
    <a  class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_color_texto']?> btn_link" href="#">Borrar</a>
    </td>
  </tr>
</table>

                    
                    
                    
                    <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link fright" href="#">Borrar</a>
                    <a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'] ?> btn_link fright" href="#">Ver</a>
                    
                    
                          
                    <div class="clear" style="display:inline;"></div>
                  </li>
                  
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                    <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link fright" href="#">Borrar</a>
                    <a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'] ?> btn_link fright" href="#">Ver</a>      
                    <div class="clear" style="display:inline;"></div>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                   <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link fright" href="#">Borrar</a>
                    <a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'] ?> btn_link fright" href="#">Ver</a>      
                    <div class="clear" style="display:inline;"></div>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                    <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link fright" href="#">Borrar</a>
                    <a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'] ?> btn_link fright" href="#">Ver</a>      
                    <div class="clear" style="display:inline;"></div>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                    <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link fright" href="#">Borrar</a>
                    <a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'] ?> btn_link fright" href="#">Ver</a>      
                    <div class="clear" style="display:inline;"></div>
                  </li>
              </ul> 
          </div>
          <div class="content-2">
          		<ul>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                    <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link fright" href="#">Borrar</a>
                    <a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'] ?> btn_link fright" href="#">Ver</a>      
                    <div class="clear" style="display:inline;"></div>
                  </li>
              </ul>
          </div>
		  <div class="content-3">
          <ul>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                    
                    <a class="<?php echo $rowdata['btn_cancelar_color_fondo'].' '.$rowdata['btn_cancelar_radio'].' '.$rowdata['btn_cancelar_color_texto'].' '.$rowdata['btn_cancelar_sombra'] ?> btn_link fright" href="#">Borrar</a>
                    <a class="<?php echo $rowdata['btn_enlace_color_fondo'].' '.$rowdata['btn_enlace_radio'].' '.$rowdata['btn_enlace_color_texto'].' '.$rowdata['btn_enlace_sombra'] ?> btn_link fright" href="#">Ver</a>      
                    <div class="clear" style="display:inline;"></div>
                    
                    
                  </li> 
              </ul>
          </div>
          <div class="content-4">
          <ul>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
              </ul>
          </div>
          <div class="content-5">
          <ul>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
                  <li>
                  	<h1 class="<?php echo $rowdata['noti_ul_color_tittle'].' '.$rowdata['noti_ul_size_tittle'] ?>">
                    	<span class="<?php echo $rowdata['noti_ul_color_new'].' '.$rowdata['noti_ul_size_new'] ?>">Nuevo</span> Addison
                    </h1>
                    <p class="<?php echo $rowdata['noti_ul_color_text'].' '.$rowdata['noti_ul_size_text'] ?>">Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus.Nulla eget tempor dolor. 
                    Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor.</p>
                  </li>
              </ul>
          </div>
          
        </div>
        
<div class=" clear"></div>        
</section>

</body>
</html>