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
/**********************************************************************************************************************************/
/*                                               Se ejecutan instrucciones                                                        */
/**********************************************************************************************************************************/
//Ubicacion 
$location= 'list_votaciones.php'.$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para votar
if ( !empty($_POST['submit']) )  { 
	//agrego nuevas ubicaciones
	if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){
	$location.="&filtercat=".$_GET['filtercat'];	
	}
	if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){
	$location.="&filterGroup=".$_GET['filterGroup'];	
	}
	if(isset($_GET['level_view'])&&$_GET['level_view']!=''){
	$location.="&level_view=".$_GET['level_view'];	
	}
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_votos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_votos.php';
}
//formulario para votar
if ( !empty($_POST['submit_update']) )  { 
	//agrego nuevas ubicaciones
	if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){
	$location.="&filtercat=".$_GET['filtercat'];	
	}
	if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){
	$location.="&filterGroup=".$_GET['filterGroup'];	
	}
	if(isset($_GET['level_view'])&&$_GET['level_view']!=''){
	$location.="&level_view=".$_GET['level_view'];	
	}
	if(isset($_GET['edit_noti'])&&$_GET['edit_noti']!=''){
	$location.="&edit_noti=".$_GET['edit_noti'];	
	}
	
	
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_votos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_votos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_votos.php';
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
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<section class="tabs <?php echo $config_app['noti_width'].' '.$config_app['noti_border'].' '.$config_app['noti_shadow'].' '.$config_app['noti_aling'].' '.$config_app['noti_color']?>">
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view_result']) ) { 
$arrPregunta = array();
$query = "SELECT
preguntas_listado.Pregunta,
preguntas_respuestas.Respuesta,
SUM(clientes_votos.Cantidad) AS suma
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
	$total = $total+$pregunta['suma'];
} 
//agrego nuevas ubicaciones
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){
$location.="&filtercat=".$_GET['filtercat'];	
}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){
$location.="&filterGroup=".$_GET['filterGroup'];	
}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){
$location.="&level_view=".$_GET['level_view'];	
}

?>


<table class="height100">
   <tr height="10%">
    <td width="20%"><?php if($_GET['level_view']!=3){ ?><a  href="<?php echo $location; ?>"><img src="img/atras1.png" width="40" height="40" /></a><?php }?></td>
    <td width="80%"><p style="margin-left:10px; margin-top:5px; color:#666;">Resultados:</p></td>
  </tr>
  <tr>
    <td style="padding: 2%;" colspan="2">
 
<p><?php echo $arrPregunta[0]['Pregunta']; ?></p><br /> 
<p><?php echo 'Total Votos : '.$total.' Votos'; ?></p><br />           
<?php 
//Variable para seleccion de clase
$clase = 1;
//Imprimo los resultados
foreach ($arrPregunta as $pregunta) { 
echo $pregunta['Respuesta'].' ('.$pregunta['suma'].' Votos)<br />';
	echo '<progress class="barr'.$clase.'" id="bar" value="'.$pregunta['suma'].'" max="'.$total.'"></progress><br />';
	$clase++;
	//reseteo la variable clase
	if ($clase==6){$clase=1;}
 } ?>

    </td>
  </tr> 
</table> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['mod']) ) {
$query = "SELECT
preguntas_listado.Pregunta,
preguntas_respuestas.Respuesta,
clientes_votos.Cantidad
FROM `clientes_votos`
LEFT JOIN `preguntas_listado`      ON preguntas_listado.idPregunta       = clientes_votos.idPregunta
LEFT JOIN `preguntas_respuestas`   ON preguntas_respuestas.idRespuesta   = clientes_votos.idRespuesta
WHERE clientes_votos.idVoto = {$_GET['mod']}
";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//agrego nuevas ubicaciones
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){
$location.="&filtercat=".$_GET['filtercat'];	
}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){
$location.="&filterGroup=".$_GET['filterGroup'];	
}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){
$location.="&level_view=".$_GET['level_view'];	
}
if(isset($_GET['edit_noti'])&&$_GET['edit_noti']!=''){
$location.="&edit_noti=".$_GET['edit_noti'];	
}

?>


<table class="height100">
   <tr height="10%">
    <td width="20%"><?php if($_GET['level_view']!=3){ ?><a  href="<?php echo $location; ?>"><img src="img/atras1.png" width="40" height="40" /></a><?php }?></td>
    <td width="80%"><p style="margin-left:10px; margin-top:5px; color:#666;">Editar Votos</p></td>
  </tr>
  <tr>
    <td style="padding: 2%;" colspan="2">
 
<br /><p><?php echo $rowdata['Pregunta']; ?></p><br />           

<div class="form <?php echo $config_app['form_color'] ?>" style="width:100%"> 
 <table>
<form method="post" name='f1'>
  <tr>
    <td width="70%"><p style="padding-top:5px;"><?php echo $rowdata['Respuesta']; ?></p></td>
    <td width="30%"><input name="Cantidad" type="number" value="<?php echo $rowdata['Cantidad'] ?>" /></td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="hidden" name="idVoto"  value="<?php echo $_GET['mod'] ?>" >
    <input type="submit"   value="Actualizar"  name="submit_update"  >
    </td>
  </tr>
</form>
</table>
</div>

    </td>
  </tr> 
</table>	


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['edit_noti']) ) {
$arrPregunta = array();
$query = "SELECT
clientes_votos.idVoto,
preguntas_listado.Pregunta,
preguntas_respuestas.Respuesta,
clientes_votos.Cantidad
FROM `clientes_votos`
LEFT JOIN `preguntas_listado`      ON preguntas_listado.idPregunta       = clientes_votos.idPregunta
LEFT JOIN `preguntas_respuestas`   ON preguntas_respuestas.idRespuesta   = clientes_votos.idRespuesta
WHERE clientes_votos.idPregunta = {$_GET['edit_noti']} AND clientes_votos.idCliente = {$arrCliente['idCliente']}
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPregunta,$row );
}
//agrego nuevas ubicaciones
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){
$location.="&filtercat=".$_GET['filtercat'];
$w.="&filtercat=".$_GET['filtercat'];	
}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){
$location.="&filterGroup=".$_GET['filterGroup'];
$w.="&filterGroup=".$_GET['filterGroup'];	
}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){
$location.="&level_view=".$_GET['level_view'];	
$w.="&level_view=".$_GET['level_view'];
}

?>


<table class="height100">
   <tr height="10%">
    <td width="20%"><?php if($_GET['level_view']!=3){ ?><a  href="<?php echo $location; ?>"><img src="img/atras1.png" width="40" height="40" /></a><?php }?></td>
    <td width="80%"><p style="margin-left:10px; margin-top:5px; color:#666;">Resultados:</p></td>
  </tr>
  <tr>
    <td style="padding: 2%;" colspan="2">
 
<br /><p><?php echo $arrPregunta[0]['Pregunta']; ?></p><br />           

 
 <table>
<?php foreach ($arrPregunta as $pregunta) {?>
  <tr>
    <td width="85%"><p style="padding-top:5px;"><?php echo $pregunta['Respuesta'].' ('.$pregunta['Cantidad'].' Votos)'; ?></p></td>
    <td width="15%">  
        <a  href="list_votaciones.php<?php echo $w.'&edit_noti='.$_GET['edit_noti'].'&mod='. $pregunta['idVoto'] ?>"><img src="img/edit1.png" width="100%"  /></a>
        </td>
  </tr>
<?php } ?>
</table>

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
ORDER BY idRespuesta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRespuestas,$row );
} 
//agrego nuevas ubicaciones
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){      $location.="&filtercat=".$_GET['filtercat'];	}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){  $location.="&filterGroup=".$_GET['filterGroup'];	}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){    $location.="&level_view=".$_GET['level_view'];	}
?>

<table class="height100">
   <tr height="10%">
    <td width="20%"><?php  if($_GET['level_view']!=3){?><a  href="<?php echo $location; ?>" ><img src="img/atras1.png" width="40" height="40" /> </a><?php }?></td>
    <td width="80%"><p style="margin-left:10px; margin-top:5px; color:#666;"><?php echo $row_data['Pregunta'] ?></p></td>
  </tr>
  <tr>
    <td style="padding: 2%;" colspan="2">
    
<?php 
//se verifica si tiene la sesion activa para poder botar
if (empty($arrCliente) ) {
echo '<a class="'.$config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_color_texto'].' '.$config_app['btn_enlace_sombra'].' '.$config_app['btn_enlace_border'].' btn_link fright" href="login.php'.$w.'&return_to1=list_preguntas.php">Iniciar Sesion</a>';
}else{ ?>	
<div class="form <?php echo $config_app['form_color'] ?>" style="width:100%">
<form method="post" name='f1'>
<br/>

<table>
<?php foreach ($arrRespuestas as $respuestas) {?>
  <tr>
    <td width="70%"><?php echo $respuestas['Respuesta']; ?></td>
    <td width="30%">
    	<input name="repuesta_<?php echo $respuestas['idRespuesta'] ?>" type="number" />
        <input type="hidden" name="idRespuesta[]"  value="<?php echo $respuestas['idRespuesta'] ?>" />
    </td>
  </tr>
<?php } ?>  

  <tr>
    <td colspan="2">
    <input type="hidden" name="idPregunta"  value="<?php echo $_GET['view_noti'] ?>" >
    <input type="hidden" name="idCliente"   value="<?php echo $arrCliente['idCliente'] ?>" >
    <input type="submit"   value="Guardar"  name="submit" onclick="return validacion()" >
    <script type="text/javascript">
	function validacion(){
		
	<?php foreach ($arrRespuestas as $respuestas) { ?>	
	if(document.f1.repuesta_<?php echo $respuestas['idRespuesta']; ?>.value.length==0) { 
		document.f1.repuesta_<?php echo $respuestas['idRespuesta']; ?>.focus();   
		alert('No has ingresado los datos'); 
		return false; 
	   }else{   		  
	<?php  }?> 
	return true; 		  
	<?php foreach ($arrRespuestas as $respuestas) { ?>	 
			} 
	<?php  }?>  
	}
	</script>
    </td>
  </tr>
</table> 
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
$xyz.='&filtercat='.$_GET['filtercat'];
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){
$location.="&filterGroup=".$_GET['filterGroup'];
$xyz.='&filterGroup='.$_GET['filterGroup'];	
}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){
$location.="&level_view=".$_GET['level_view'];	
$xyz.='&level_view='.$_GET['level_view'];	
}
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
$('#resultados_1').load("list_votaciones_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg.$xyz.'&app_conf='.$_GET['app_conf']; ?>", {'group_no_1':track_load_1}, function() {track_load_1++;}); //load first group
	
   
   //Detecta el scroll de la ventana
    $(window).scroll(function() { //detect page scroll
       
	   
	   //Modifica el tamaño de la ventana
        if($(window).scrollTop() + $(window).height() == $(document).height()) {  //user scrolled to bottom of the page?
        
           
            if(track_load_1 <= total_groups_1 && loading_1==false) {//there's more data to load
                loading_1 = true; //prevent further ajax loading_1
                $('.animation_image_1').show(); //show loading_1 image
                //load data from the server using a HTTP POST request
                $.post('list_votaciones_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg.$xyz; ?>',{'group_no_1': track_load_1}, function(data){              
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
    <td width="20%"><a  href="<?php echo 'principal.php'.$w; ?>" ><img src="img/atras1.png" width="40" height="40" /> </a></td>
    <td width="80%"><h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-left:10px; margin-top:5px;"><?php echo $rowdata['Nombre'] ?></h1></td>
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