<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "principal.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_resp']) )  { 
	//Agregamos direcciones
	$location.='?cat='.$_GET['cat'];
	$location.='&imei='.$_GET['imei'];
	$location.='&respuesta=true';
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/respuestas.php';
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/respuestas_1.php';
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/respuestas.php';
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>
 
<body>

<div class="height100 widht100">
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//Se trae solo la pregunta activa
$query = "SELECT
preguntas.Pregunta,
preguntas.Opcion1,
preguntas.Opcion2,
preguntas.idPregunta AS id_pregunta,
preguntas_resp.idPregunta AS id_compara
FROM preguntas
LEFT JOIN preguntas_resp ON preguntas_resp.idPregunta = preguntas.idPregunta
WHERE preguntas.idPregunta = '{$_GET['id']}' AND preguntas.Estado = 1 ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
//Se trae solo la id del usuario
$query = "SELECT id_ejecutiv
FROM ejecutivos
WHERE imei = '{$_GET['imei']}'  ";
$resultado = mysql_query ($query, $dbConn);
$row_usr = mysql_fetch_assoc ($resultado);?>

<div class="widht80 fcenter perfil">
<h1>Pregunta</h1> 
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<form method="post"  data-ajax="false"  > 
<table class="table_msg">
   <tr><td><?php echo $row_data['Pregunta'];?></td></tr>
   <tr><td>
   <?php if ($row_data['id_compara']!=''&&$row_data['id_compara']==$row_data['id_pregunta']){ ?>
        Ya has respondido a esta pregunta, gracias por participar
   <?php } else { ?>
   </td></tr>
   <tr><td><input type="radio" name="Respuesta" value="1"><?php echo $row_data['Opcion1'];?></td></tr>
   <tr><td></td></tr>
   <tr><td><input type="radio" name="Respuesta" value="2"><?php echo $row_data['Opcion2'];?></td></tr>
   <tr><td></td></tr>
      <tr>
        <td>
         <input type="hidden" name="idPregunta" value="<?php echo $_GET['id'];?>" >
         <input type="hidden" name="idUsuario" value="<?php echo $row_usr['id_ejecutiv'];?>" >
         <input name="submit_resp" type="submit"  id="post_button" value="Responder" />
    <?php } ?>
         <a href="<?php echo $location.'?cat='.$_GET['cat'].'&imei='.$_GET['imei'] ?>"><input id="post_button" type="button" value="Volver"/></a>
        </td>
      </tr>
</table>  

   
</form>
 
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['cat']) ) { 
//Se trae solo la id del usuario
$query = "SELECT id_ejecutiv
FROM ejecutivos
WHERE imei = '{$_GET['imei']}'  ";
$resultado = mysql_query ($query, $dbConn);
$row_usr = mysql_fetch_assoc ($resultado);
//Se trae un listado con las preguntas
$arrPreguntas = array();
$query = "SELECT
preguntas.idPregunta,
preguntas.Pregunta,
preguntas_resp.idPregunta AS id_compara,
preguntas_resp.idUsuario
FROM preguntas
LEFT JOIN preguntas_resp ON preguntas_resp.idPregunta = preguntas.idPregunta
WHERE preguntas.idCatPreg = '{$_GET['cat']}' AND preguntas.Estado = 1
ORDER BY idPregunta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPreguntas,$row );
}?>
<div class="widht80 fcenter perfil">
<h1>Preguntas Activas</h1>

<?php foreach ($arrPreguntas as $pregunta) { ?>
<div class="q_box">
    <div class="quest">
    <?php echo $pregunta['Pregunta']; if ($pregunta['id_compara']!=''&&$pregunta['id_compara']==$pregunta['idPregunta']&&$pregunta['idUsuario']==$row_usr['id_ejecutiv']){ echo '- <em><strong>Respondida</strong></em>';}?>
    </div>
    <div class="button">
    <a class="btn_list btn-app" href="<?php echo $location.'?cat='.$_GET['cat'].'&id='.$pregunta['idPregunta'].'&imei='.$_GET['imei'] ?>"><i class="fap fap-eye"></i> </a>
    </div>
    <div class="clear"></div>
</div>

<?php } ?>

<a href="<?php echo $location.'?imei='.$_GET['imei'] ?>"><input id="post_button" type="button" value="Volver"/></a>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT ejecutivos.nom_ejecutiv AS nombre FROM `ejecutivos` WHERE ejecutivos.imei = '".$_GET["imei"]."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); 
//Se trae un listado con las categorias
$arrCategorias = array();
$query = "SELECT
preguntas_categorias.idCatPreg,
preguntas_categorias.img
FROM preguntas_categorias
ORDER BY idCatPreg ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
?>

<div class="widht80 fcenter perfil">

<div class="section group">
<?php $contador = 0; ?>
<?php foreach ($arrCategorias as $categoria) { ?>
<?php $contador++; ?>
    <div class="col span_1_of_8 colorgrid_<?php echo $categoria['idCatPreg'] ?>">
        <a href="<?php echo $location.'?cat='.$categoria['idCatPreg'].'&imei='.$_GET['imei'] ?>">
        	<img src="images/<?php echo $categoria['img'] ?>" class="siteimage">
        </a>
    </div>
<?php if ($contador==3){echo '</div><div class="section group">';$contador=0;} ?>
<?php } ?>
</div>

<div class="clear"></div>

<div class="section group">
    <div class="sello_agua">
    <p class="cuerpo_gris_12"><span class="tit_red">Menú Encuestas</span><br />
        <br />
        Nuevas Encuestas aparecen cada semana.<br />
        <strong>Necesitamos de tu Participación</strong><br />
      Por favor Revisa y vota periódicamente <br />
      <br />
      </p>
    
    </div>
</div>

                
   
</div> 

<?php } ?>

</div>



</body>
</html>