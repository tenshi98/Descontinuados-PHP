<?php session_start();
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"]."  dispositivo     ".$_GET["dispositivo"];
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
//require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../preguntas/AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
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
if ($_GET["donde"]=='porvencer') {
		$location = "porvencer.php"; 
	}else{
		$location = "gracias_cel_01.php";
	}
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
/**********************************************************************************************************************************/
/*                                  Se verifica que el usuario exista dentro de la base de datos                                  */
/**********************************************************************************************************************************/


$sql ="SELECT id_ejecutiv FROM ejecutivos WHERE imei='".$_GET["imei"]."'";
$res=mysql_query($sql,$dbConn); 
$numeroRegistros=mysql_num_rows($res); 
	//Agregamos direcciones
	$newlocation = 'pide_rut.php';
	$newlocation.='?imei='.$_GET['imei'];
	$newlocation.='&longitud='.$_GET['longitud'];
	$newlocation.='&latitud='.$_GET['latitud'];
	$newlocation.='&id='.$_GET['id'];
	$newlocation.='&dispositivo='.$_GET['dispositivo'];


	//echo $newlocation;
	
if ($numeroRegistros==0)  {
	//Redirijo a la solicitud de rut
	header( 'Location: '.$newlocation );
	die;	
}

if ($_GET["id"]<>'') {
		$sql2="update ejecutivos set gcmcode='".$_GET["id"]."',dispositivo='".$_GET["dispositivo"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);
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
preguntas.link_data,
preguntas.Opcion1,
preguntas.Opcion2,
	preguntas.Opcion3,
	preguntas.Opcion4,
	preguntas.Opcion5,
(SELECT idUsuario FROM preguntas_resp  WHERE idPregunta = preguntas.idPregunta AND preguntas_resp.idUsuario = '{$row_usr['id_ejecutiv']}') AS usuario
FROM preguntas
WHERE preguntas.idPregunta = '{$_GET['pregunta']}' AND preguntas.Estado = 1 ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);

?>

<div class="widht90 fcenter perfil">
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


  <?php if ($row_data['link_data']!=''){ ?> 
  <tr><td> 
		
		<a href="<?php echo $row_data['link_data'];?>" target="_blank"><input id="post_button" type="button" value="Ver más información"/></a>
         
    </td></tr> 
   <?php }?>



   <? if ( $row_data['Opcion1']!='') {?><tr><td><input type="radio" name="Respuesta" value="1"><?php echo $row_data['Opcion1'];?></td></tr><tr><td></td></tr><?}?>
   <? if ( $row_data['Opcion2']!='') {?><tr><td><input type="radio" name="Respuesta" value="2"><?php echo $row_data['Opcion2'];?></td></tr><tr><td></td></tr><?}?>  
   <? if ( $row_data['Opcion3']!='') {?><tr><td><input type="radio" name="Respuesta" value="3"><?php echo $row_data['Opcion3'];?></td></tr><tr><td></td></tr><?}?>
   <? if ( $row_data['Opcion4']!='') {?><tr><td><input type="radio" name="Respuesta" value="4"><?php echo $row_data['Opcion4'];?></td></tr><tr><td></td></tr><?}?>
   <? if ( $row_data['Opcion5']!='') {?><tr><td><input type="radio" name="Respuesta" value="5"><?php echo $row_data['Opcion5'];?></td></tr><tr><td></td></tr><?}?>
      <tr>
        <td>
         <input type="hidden" name="idPregunta" value="<?php echo $_GET['pregunta'];?>" >
         <input type="hidden" name="idUsuario" value="<?php echo $row_usr['id_ejecutiv'];?>" >
         <input name="submit_resp" type="submit"  id="post_button" value="Responder" />
    <?php } 
	
	if ( ! empty($_GET['donde']) ) {	
		if ($_GET['donde']=="porvencer") {?>
			<a href="porvencer.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&act=Psvirtual"><input id="post_button" type="button" value="Volver"/></a>
		<?}else{?>
			<a href="cerradas.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&act=Psvirtual"><input id="post_button" type="button" value="Volver"/></a>
		<?}
	}else{?>
			<a href="<?php echo $location.'?cat='.$_GET['cat'].'&imei='.$_GET['imei'] ?>"><input id="post_button" type="button" value="Volver"/></a>
	<?}?>
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
	preguntas.Opcion1,
	preguntas.Opcion2,
		preguntas.Opcion3,
		preguntas.Opcion4,
		preguntas.Opcion5,
(SELECT idUsuario FROM preguntas_resp  WHERE idPregunta = preguntas.idPregunta AND preguntas_resp.idUsuario = '{$row_usr['id_ejecutiv']}') AS usuario,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '1') AS resp_opcion1,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '2') AS resp_opcion2,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '3') AS resp_opcion3,
	(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '4') AS resp_opcion4,
	(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '5') AS resp_opcion5
FROM preguntas
WHERE preguntas.idCatPreg = '{$_GET['cat']}' AND preguntas.Estado = 1
ORDER BY idPregunta ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPreguntas,$row );
}?>
<div class="widht90 fcenter perfil">
<h1>Preguntas Activas</h1>

<?php foreach ($arrPreguntas as $pregunta) { 
$var_total = $pregunta['resp_opcion1']+ $pregunta['resp_opcion2'];
$por_opcion1 = ($pregunta['resp_opcion1']/$var_total)*100;
$por_opcion2 = ($pregunta['resp_opcion2']/$var_total)*100;	
	?>
<div class="q_box">
    <div class="quest">
    <?php echo $pregunta['Pregunta']; if ($pregunta['usuario']!=''&&$pregunta['usuario']==$row_usr['id_ejecutiv']){ echo '- <em><strong>Respondida</strong></em>';
  ?>
<table>
<tr><td width="19%" align="center"><span class="arial_tit_gris"><?php echo "Total".'</span><br />'.$var_total; ?></td>
	<td width="19%" align="center"><span class="arial_tit_gris"><?php echo $pregunta['Opcion1'].'</span><br />('.porcentaje_cd($por_opcion1).')'; ?></td>
    <td width="19%" align="center"><span class="arial_tit_gris"><?php echo $pregunta['Opcion2'].'</span><br />('.porcentaje_cd($por_opcion2).')'; ?></td>
    <td width="19%" align="center"><span class="arial_tit_gris"><?php echo $pregunta['Opcion3'].'</span><br />('.porcentaje_cd($por_opcion3).')'; ?></td>
	<td width="19%" align="center"><span class="arial_tit_gris"><?php echo $pregunta['Opcion4'].'</span><br />('.porcentaje_cd($por_opcion4).')'; ?></td>
	<td width="19%" align="center"><span class="arial_tit_gris"><?php echo $pregunta['Opcion5'].'</span><br />('.porcentaje_cd($por_opcion5).')'; ?></td>
	</tr>
</table>

  <?
}?>
    </div>
    <div class="button">
    <a class="btn_list btn-app" href="<?php echo $location.'?cat='.$_GET['cat'].'&pregunta='.$pregunta['idPregunta'].'&imei='.$_GET['imei'] ?>"><i class="fap fap-eye"></i> Votar</a>
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

<div class="widht90 fcenter perfil">

<!--div class="section group">
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
</div-->





	 <div class="clear"></div>
<!-- BOTON -->
 <a href="carta.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&act=Sosclick">
 <div id="post_button1" class="btn_color_celeste" >
	<div class="cont_imagen" ><img src="images/carta.png" ></div>
	 <div style=" float:right; width:74%;height: 100%;display:table;" ><p class="clase_botones">Carta de Bienvenida de Camilo Escalona</p></div>
	 <div class="clear"></div>
 </div>
 </a>
<!-- BOTON -->

	 <div class="clear"></div>
<!-- BOTON -->
  <a href="allende.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&act=Sosclick">
 <div id="post_button1" class="btn_color_celeste1" >
	<div class="cont_imagen" ><img src="images/allende.png" ></div>
	 <div style=" float:right; width:74%;height: 100%;display:table;" ><p class="clase_botones">Salvador Allende</p></div>
	 <div class="clear"></div>
 </div>
 </a>
<!-- BOTON -->
<!-- BOTON -->
 <a href="porvencer.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&act=Sosclick">
 <div id="post_button1" class="btn_color_celeste2" >
  <div class="cont_imagen" ><img src="images/encuesta.png" ></div>
	 <div style=" float:right; width:74%;height: 100%;display:table;" ><p class="clase_botones">Consultas sin Responder</p></div>
	 <div class="clear"></div>
 </div>
 </a>
<!-- BOTON -->

	 <div class="clear"></div>
<!-- BOTON -->
  <a href="migrupo.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&act=Sosclick">
 <div id="post_button1" class="btn_color_celeste3" >
 <div class="cont_imagen" ><img src="images/temas.png" ></div>
	 <div style=" float:right; width:74%;height: 100%;display:table;" ><p class="clase_botones">Temas</p></div>
	 <div class="clear"></div>
 </div>
 </a>
<!-- BOTON -->

	 <div class="clear"></div>
<div class="section group">
    <div class="sello_agua">
    <p class="cuerpo_gris_12"><span class="tit_red">Juntos Somos Más</span><br />
        <br />
        Nuevas Consultas aparecen cada semana.<br />
        <strong>Necesitamos de tu Participación</strong><br />
      Por favor Revisa y responde periódicamente.<br />
      <br />
      </p>
    
    </div>
</div>

                
   
</div> 

<?php } ?>

</div>



</body>
</html>