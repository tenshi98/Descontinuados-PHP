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
$location = "gracias_cel_01.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_resp']) )  { 
	//Agregamos direcciones
	$location.='?cat='.$_GET['cat'];
	$location.='&interfaz='.$_GET['interfaz'];
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
 if ( ! empty($_GET['pregunta']) ) { 
//Se trae solo la id del usuario
$query = "SELECT id_ejecutiv
FROM ejecutivos
WHERE imei = '{$_GET['imei']}'  ";
$resultado = mysql_query ($query, $dbConn);
$row_usr = mysql_fetch_assoc ($resultado);
//Se trae un listado con las preguntas
$query = "SELECT
preguntas.idPregunta,
preguntas.Pregunta,
preguntas.Opcion1,
preguntas.Opcion2,
(SELECT idUsuario FROM preguntas_resp  WHERE idPregunta = preguntas.idPregunta AND preguntas_resp.idUsuario = '{$row_usr['id_ejecutiv']}') AS usuario
FROM preguntas
WHERE preguntas.idPregunta = '{$_GET['pregunta']}' AND preguntas.Estado = 1 ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);

?>

<div class="widht80 fcenter perfil">
<h1>Pregunta</h1> 
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<form method="post"  data-ajax="false"  > 
<table class="table_msg">
   <tr><td><?php echo $row_data['Pregunta'];?></td></tr>
   <tr><td> 
   <?php if ($row_data['usuario']!=''&&$row_data['usuario']==$row_usr['id_ejecutiv']){ ?>
        Ya has respondido a esta pregunta, gracias por participar
   <?php } else { ?>
   </td></tr>
   <tr><td><input type="radio" name="Respuesta" value="1"><?php echo $row_data['Opcion1'];?></td></tr>
   <tr><td></td></tr>
   <tr><td><input type="radio" name="Respuesta" value="2"><?php echo $row_data['Opcion2'];?></td></tr>
   <tr><td></td></tr>
      <tr>
        <td>
         <input type="hidden" name="idPregunta" value="<?php echo $_GET['pregunta'];?>" >
         <input type="hidden" name="idUsuario" value="<?php echo $row_usr['id_ejecutiv'];?>" >
         <input name="submit_resp" type="submit"  id="post_button" value="Responder" />
    <?php } ?>
         <a href="<?php echo $location.'?cat='.$_GET['cat'].'&interfaz='.$_GET['interfaz'].'&imei='.$_GET['imei'] ?>"><input id="post_button" type="button" value="Volver"/></a>
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
(SELECT idUsuario FROM preguntas_resp  WHERE idPregunta = preguntas.idPregunta AND preguntas_resp.idUsuario = '{$row_usr['id_ejecutiv']}') AS usuario
FROM preguntas
WHERE preguntas.idCatPreg = '{$_GET['cat']}' AND preguntas.idInterfaz = '{$_GET['interfaz']}' AND preguntas.Estado = 1
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
    <?php echo $pregunta['Pregunta']; if ($pregunta['usuario']!=''&&$pregunta['usuario']==$row_usr['id_ejecutiv']){ echo '- <em><strong>Respondida</strong></em>';}?>
    </div>
    <div class="button">
    <a class="btn_list btn-app" href="<?php echo $location.'?cat='.$_GET['cat'].'&interfaz='.$_GET['interfaz'].'&pregunta='.$pregunta['idPregunta'].'&imei='.$_GET['imei'] ?>"><i class="fap fap-eye"></i> Ver</a>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="border_btn"></div>
<?php } ?>

<a href="<?php echo $location.'?imei='.$_GET['imei'] ?>"><input id="post_button" type="button" value="Volver"/></a>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//Se traen los datos de la configuracion de la interfaz
$query = "SELECT idInterfaz, img_fondo, img_icono
FROM interfaz 
WHERE active = '1'";
$resultado = mysql_query ($query, $dbConn);
$row_interfaz = mysql_fetch_assoc ($resultado);
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

<table class="<?php echo $row_interfaz['img_fondo'] ?>" align="center" height="98% " border="0" cellspacing="0" cellpadding="0">
<tr>  
    <td height="20%" colspan="5" align="center" valign="middle"  >
    <form name="formugrp" method="post" action="gracias_cel_02.php?longitud=<? echo $_GET["longitud"].'&latitud='.$_GET["latitud"].'&imei='.$_GET["imei"].'&id='.$_GET["id"]?>">
      <input type="hidden" name="activacion" value="Sosclick">
      <a href="#" onClick="document.formugrp.submit(); return false" ><img src="images/sosclick.png" width="98%"  /></a>
    </form>
    </td>
</tr>
<tr>
    <td height="40%"  colspan="5" align="center" valign="middle"  >
    <p><center><a href="#"><img src="images/<?php echo $row_interfaz['img_icono'] ?>" width="85%" border="0"  /></a></center></p>
    </td>
<tr>
<?php $contador = 0; ?>
<?php foreach ($arrCategorias as $categoria) { ?>
<?php $contador++; ?>
	<td width="153" height="37%" align="right" valign="top" >
        <a href="<?php echo $location.'?cat='.$categoria['idCatPreg'].'&interfaz='.$row_interfaz['idInterfaz'].'&imei='.$_GET['imei'] ?>">
        	<img src="images/<?php echo $categoria['img'] ?>" width="98%" border="0" />
        </a>
    </td>
<?php if ($contador!=3){echo '<td width="3" align="center" valign="middle"></td>';} ?>
<?php } ?>
</tr>
</table>

<?php } ?>

</div>



</body>
</html>