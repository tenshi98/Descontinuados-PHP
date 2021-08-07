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
require_once 'core/mobile_components.php';
/**********************************************************************************************************************************/
/*                                               Se ejecutan instrucciones                                                        */
/**********************************************************************************************************************************/
//Ubicacion 
$location= 'list_paginas.php'.$w;
//agrego nuevas ubicaciones
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){      $location.="&filtercat=".$_GET['filtercat'];}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){  $location.="&filterGroup=".$_GET['filterGroup'];}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){    $location.="&level_view=".$_GET['level_view'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Paginas</title>
	<!-- InstanceEndEditable -->
	<!-- InstanceBeginEditable name="head" -->
	<script src="js/jquery.min.js"></script>
	<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<?php 
$section_class = '';
$section_class .= $config_app['noti_width'].' ';
$section_class .= $config_app['noti_border'].' ';
$section_class .= $config_app['noti_shadow'].' ';
$section_class .= $config_app['noti_aling'].' ';
$section_class .= $config_app['noti_color'];?>
<section class="tabs <?php echo $section_class; ?>">
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view_noti']) ) { 
// Se trae un listado con todos los usuarios
$arrNoticias = array();
$query = "SELECT 
paginas_listado.Titulo,
paginas_listado.Texto
FROM `paginas_listado`
ORDER BY paginas_listado.Fecha DESC ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>

<table class="height100">
	<tr height="10%">
		<td width="20%">
			<?php  if($_GET['level_view']!=3){ 
				echo link_btn('cancelar',$location,'Volver','',$config_app);
			}?>    
		</td>
		<td width="80%">
			<?php echo tag_text('title2','h1',$row_data['Titulo'],$config_app);?>
		</td>
	</tr>
	<tr>
		<td style="padding: 2%;" colspan="2">
			<?php echo $row_data['Texto'] ?>
		</td>
	</tr> 
</table> 


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['filtercat']) ) { 
$cant_reg = 10;
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idPagListado FROM `paginas_listado` WHERE idPagCat={$_GET['filtercat']}  AND idTipoCliente='{$_GET['app_conf']}'";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas_1 = ceil($cuenta_registros / $cant_reg);
//agrego nuevas ubicaciones
$xyz='';
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){      $xyz.='&filtercat='.$_GET['filtercat'];	}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){  $xyz.='&filterGroup='.$_GET['filterGroup'];	}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){    $xyz.='&level_view='.$_GET['level_view'];	}
//Obtengo el nombre de la categoria
$query = "SELECT Nombre FROM `paginas_categorias` WHERE idPagCat={$_GET['filtercat']}  AND idTipoCliente='{$_GET['app_conf']}'";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>
<script>
$(document).ready(function() {
	//Inicializacion de variables
    var track_load_1 = 0; //total loaded record group(s)
    var loading_1  = false; //to prevents multipal ajax loads
    var total_groups_1 = <?php echo $total_paginas_1; ?>; //total record group(s)	
   
   //Declaracion de los divs en donde se guardara la informacion
	$('#resultados_1').load("list_paginas_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg.$xyz.'&app_conf='.$_GET['app_conf']; ?>", {'group_no_1':track_load_1}, function() {track_load_1++;}); //load first group
	
   
   //Detecta el scroll de la ventana
    $(window).scroll(function() { //detect page scroll
       
	   
	   //Modifica el tamaño de la ventana
        if($(window).scrollTop() + $(window).height() == $(document).height()) {  //user scrolled to bottom of the page?
        
           
            if(track_load_1 <= total_groups_1 && loading_1==false) {//there's more data to load
                loading_1 = true; //prevent further ajax loading_1
                $('.animation_image_1').show(); //show loading_1 image
                //load data from the server using a HTTP POST request
                $.post('list_paginas_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg.$xyz; ?>',{'group_no_1': track_load_1}, function(data){              
                    $("#resultados_1").append(data); //append received data into the element
                    //hide loading_1 image
                    $('.animation_image_1').hide(); //hide loading_1 image once data is received
                    track_load_1++; //loaded group increment
                    loading_1 = false;
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                   
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image_1').hide(); //hide loading_1 image
                    loading_1 = false;
                });
            }	
			
        }
    });
});
</script>

<table class="height100">
	<tr height="10%">
		<td width="20%">
			<?php  if($_GET['level_view']!=2){   
				echo link_btn('cancelar',$location,'Volver','',$config_app);
			}?>    
		</td>
		<td width="80%">
			<?php echo tag_text('title2','h1',$rowdata['Nombre'],$config_app);?>
		</td>
	</tr>
	<tr height="90%">
		<td style="padding: 2%;" colspan="2">
			<div class="content <?php echo $config_app['noti_separator'] ?>">
				<ul id="resultados_1"></ul>
				<div class="animation_image_1" style="display:none" align="center"><img src="img/ajax-loader.gif"></div>
			</div>	
			<div class=" clear"></div>        
		</td>
	</tr> 
</table> 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Variable de filtrado
$z='';
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){
$z=" WHERE idPagGrupo={$_GET['filterGroup']}  AND idTipoCliente='{$_GET['app_conf']}' ";	
}
// Se trae un listado con todos los usuarios
$arrCategorias = array();
$query = "SELECT  idPagCat, Nombre, imagen
FROM `paginas_categorias`
".$z."
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
?>

<table class="height100">
	<tr height="10%">
		<td width="20%">
			<?php  if($_GET['level_view']!=1){ 
				echo link_btn('cancelar','principal.php'.$w,'Volver','',$config_app);
			}?>
		</td>
		<td width="80%">
			<?php echo tag_text('title2','h1','Categorias Noticias',$config_app);?>
		</td>
	</tr>
	<tr height="90%">
		<td style="padding: 2%;" colspan="2">
			<div class="content <?php echo $config_app['noti_separator'] ?>" >
				<ul id="resultados_1">
					<?php 
					foreach ($arrCategorias as $categorias) {
						echo '<li>';
							echo noti_title('',$categorias['Nombre'],$config_app);
							echo link_btn('enlace',$location.'&filtercat='.$categorias['idPagCat'],'Ver','fright',$config_app);
							echo '<div class="clear" style="display:inline;"></div>';		
						echo '</li>';			
					 }?>
				</ul>
			</div>
			<div class=" clear"></div>   
		</td>
	</tr>
</table>
<?php } ?>
</section>  

<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
