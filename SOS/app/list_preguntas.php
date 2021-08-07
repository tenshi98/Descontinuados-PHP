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
$location= 'list_preguntas.php'.$w;
//agrego nuevas ubicaciones
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){      $location.="&filtercat=".$_GET['filtercat'];}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){  $location.="&filterGroup=".$_GET['filterGroup'];}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){    $location.="&level_view=".$_GET['level_view'];}
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para votar
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	$form_obligatorios = 'idPregunta,idCliente,idRespuesta';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Preguntas</title>
	<!-- InstanceEndEditable -->
	<!-- InstanceBeginEditable name="head" -->
	<script src="js/jquery.min.js"></script>
	<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<?php 
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list_mobile($error);};?>
<?php 
$section_class  = '';
$section_class .= $config_app['noti_width'].' ';
$section_class .= $config_app['noti_border'].' ';
$section_class .= $config_app['noti_shadow'].' ';
$section_class .= $config_app['noti_aling'].' ';
$section_class .= $config_app['noti_color'];?>
<section class="tabs <?php echo $section_class; ?>">
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view_result']) ) { 
$arrPregunta = array();
$query = "SELECT
preguntas_listado.Pregunta,
preguntas_respuestas.Respuesta,
COUNT(clientes_votos.idRespuesta) AS conteo
FROM `preguntas_listado`
LEFT JOIN `preguntas_respuestas` ON preguntas_respuestas.idPregunta = preguntas_listado.idPregunta
LEFT JOIN `clientes_votos` ON clientes_votos.idRespuesta = preguntas_respuestas.idRespuesta
WHERE preguntas_listado.idPregunta = {$_GET['view_result']}
GROUP BY preguntas_listado.idPregunta, preguntas_respuestas.idRespuesta ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPregunta,$row );
}
//Primero cuento la cantidad total de respuestas
$total=0;
foreach ($arrPregunta as $pregunta) { 
	$total = $total+$pregunta['conteo'];
} 
?>


<table class="height100">
	<tr height="10%">
		<td width="20%">
			<?php  if($_GET['level_view']!=3){  
				echo link_btn('cancelar',$location,'Volver','',$config_app);
			}?>
		</td>
		<td width="80%">
			<?php echo tag_text('title2','h1','Resultados:',$config_app);?>
		</td>
	</tr>
	<tr>
		<td style="padding: 2%;" colspan="2">
			<br />
			<p><?php echo $arrPregunta[0]['Pregunta']; ?></p><br />           
			<?php 
			//Variable para seleccion de clase
			$clase = 1;
			//Imprimo los resultados
			foreach ($arrPregunta as $pregunta) { 
				echo $pregunta['Respuesta'].'<br />';
				echo '<progress class="barr'.$clase.'" id="bar" value="'.$pregunta['conteo'].'" max="'.$total.'"></progress><br />';
				$clase++;
				//reseteo la variable clase
				if ($clase==6){$clase=1;}
			} ?>
		</td>
	</tr> 
</table> 

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view_noti']) ) { 
// Se trae un listado con todos los usuarios
$arrNoticias = array();
$query = "SELECT  Pregunta
FROM `preguntas_listado`
WHERE idPregunta= {$_GET['view_noti']}";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
// se tren todas las respuesta de la pregunta
$arrRespuestas = array();
$query = "SELECT idRespuesta, Respuesta
FROM `preguntas_respuestas`
WHERE idPregunta = {$_GET['view_noti']}
ORDER BY Respuesta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRespuestas,$row );
} ?>

<table class="height100">
	<tr height="10%">
		<td width="20%">
			<?php  if($_GET['level_view']!=3){ 
				echo link_btn('cancelar',$location,'Volver','',$config_app);
			}?>    
		</td>
		<td width="80%">
			<?php echo tag_text('title2','h1','Pregunta:',$config_app);?>
		</td>
	</tr>
	<tr>
		<td style="padding: 2%;" colspan="2">   
		<?php 
		//se verifica si tiene la sesion activa para poder botar
		if (empty($arrCliente) ) {
			echo link_btn('enlace','login.php'.$w.'&return_to1=list_preguntas.php','Iniciar Sesion','',$config_app);
		}else{ 
			echo $row_data['Pregunta']; ?>
			<div class="form <?php echo $config_app['form_color'] ?>">
				<br/><br/>
				<form method="post">
					<div>
						<?php 
						//Se genera una variable para contar
						$nn=0;
						//recorro
						foreach ($arrRespuestas as $respuestas) { 
							//se crea variable para el check del primer valor
							$check='';
							if ($nn==0){$check .= 'checked="checked"';}
							//se imprimen los rsdiobutton
							echo '<input id="'.$respuestas['idRespuesta'].'" type="radio" name="idRespuesta" value="'.$respuestas['idRespuesta'].'" '.$check.'  />';
							echo '<label for="'.$respuestas['idRespuesta'].'" class="radio" chec>'.$respuestas['Respuesta'].'</label>';
							$nn++; 
						} 
						?>  
					</div>
					<br/><br/>
					<input type="hidden" name="idPregunta"  value="<?php echo $_GET['view_noti'] ?>" >
					<input type="hidden" name="idCliente"   value="<?php echo $arrCliente['idCliente'] ?>" >
					<input type="submit"   value="Votar"  name="submit" >
				</form> 
			</div>  
		<?php }?> 
		</td>
	</tr> 
</table> 


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else { 
$cant_reg = 10;
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idPregunta FROM `preguntas_listado` WHERE idTipoCliente='{$_GET['app_conf']}' AND Estado=2 ";
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
$query = "SELECT Nombre FROM `preguntas_categorias` WHERE idCategorias={$_GET['filtercat']}  AND idTipoCliente='{$_GET['app_conf']}'";
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
	$('#resultados_1').load("list_preguntas_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg.$xyz.'&app_conf='.$_GET['app_conf']; ?>", {'group_no_1':track_load_1}, function() {track_load_1++;}); //load first group
	
   
	//Detecta el scroll de la ventana
    $(window).scroll(function() { //detect page scroll
       
	   
	   //Modifica el tamaño de la ventana
        if($(window).scrollTop() + $(window).height() == $(document).height()) {  //user scrolled to bottom of the page?
        
           
            if(track_load_1 <= total_groups_1 && loading_1==false) {//there's more data to load
                loading_1 = true; //prevent further ajax loading_1
                $('.animation_image_1').show(); //show loading_1 image
                //load data from the server using a HTTP POST request
                $.post('list_preguntas_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg.$xyz; ?>',{'group_no_1': track_load_1}, function(data){              
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
		<td width="20%"></td>
		<td width="80%">
			<?php echo tag_text('title2','h1',$rowdata['Nombre'],$config_app);?>
		</td>
	</tr>
	<tr height="90%">
		<td style="padding: 2%;" colspan="2">
			<div class="content">
				<ul id="resultados_1"></ul>
				<div class="animation_image_1" style="display:none" align="center"><img src="img/ajax-loader.gif"></div>
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
