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
$location = "gracias_cel_01.php";
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
$row_data = mysql_fetch_assoc ($res);	

	//echo $newlocation;
	
if ($numeroRegistros==0)  {
	//Redirijo a la solicitud de rut
	header( 'Location: '.$newlocation );
	die;	
}

if ($_GET["id"]<>'') {
		$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$dbConn);
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
<!-- MENU DESPLEGABLE-->
<?require_once 'mmenu.php';?>
<!-- MENU DESPLEGABLE-->

<div class="height100 widht100">
<div class="widht90 fcenter perfil">
    <table style="font-family:Arial, Helvetica, sans-serif; padding: 10px;" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><h2><strong>Carta al  Pueblo Socialista</strong></h2></td>
  </tr>
  <tr>
    <td  align="justify"><p>He  aceptado postular a la Presidencia del Partido Socialista, en el periodo  2015-2017, para ahondar y acentuar su responsabilidad fundamental en la derrota  de la desigualdad y en el robustecimiento de la democracia en Chile. Es mi  convicci&oacute;n que la justicia social se abrir&aacute; paso a trav&eacute;s del perfeccionamiento y profundizaci&oacute;n de las instituciones  democr&aacute;ticas; ello es lo que garantizar&aacute; su proyecci&oacute;n y  permanencia en el tiempo. </p>
      <p>De  esta manera hago m&iacute;a la gran conclusi&oacute;n a la que llegara nuestro recordado  compa&ntilde;ero Clodomiro Almeyda, recogiendo las lecciones generadas por el colapso  del sistema burocr&aacute;tico-autoritario en Europa del Este, denominado  &quot;socialismo real&quot;, en el sentido que la vocaci&oacute;n esencial del ideal socialista  se renov&oacute; y revigorizo profundamente para constituirse &quot;en una  opci&oacute;n radical por la raz&oacute;n y la justicia&quot;.</p>
      <p>Esta  posici&oacute;n de principios separa aguas de cualquier tentaci&oacute;n mesi&aacute;nica de  pretender imponer por medio de la fuerza un modelo preestablecido de estructura  estatal, sino que los socialistas act&uacute;an y trabajan desde la convicci&oacute;n que la  democracia en cuanto &quot;gobierno del pueblo por y para el pueblo&quot; se  despliega, crece y alcanza su madurez desde las circunstancias hist&oacute;ricas  propias de cada naci&oacute;n. Cada pueblo debe ser el due&ntilde;o de su destino, como nos  lo legara con tanta insistencia, el Presidente m&aacute;rtir Salvador Allende.</p>
      <p>De  manera que asumimos que lasdebilidades e imperfecciones de la democracia se  sanan con m&aacute;s democracia.</p>
      <p>Por  eso, me anima la tarea de abrir camino en Chile hacia un Estado social y  democr&aacute;tico de Derecho, que logre dejar atr&aacute;s las fuertes resistencias que a&uacute;n  generan aquellas estructuras que provienen del car&aacute;cter subsidiario del Estado,  que impuesto por la dictadura se ha reformado s&oacute;lo en parte en los 25 a&ntilde;os que  van desde el restablecimiento de la democracia.</p>
      <p>Avanzar  en esa direcci&oacute;n, significa apoyar lealmente el gobierno, liderado por la  Presidenta Michelle Bachelet y sustentado en el bloque de Partidos que se han  agrupado en la Nueva Mayor&iacute;a; este es un esfuerzo pol&iacute;tico-program&aacute;tico sin  precedentes agrupando en una misma decisi&oacute;n de gobernar el pa&iacute;s a fuerzas que  han sido fundamentales en el progreso social de Chile y que formaron parte del  gran abanico de fuerzas que tuvo la capacidad, fortaleza y madurez de poner  t&eacute;rmino a la dictadura.</p>
      <p>Este  entendimiento se debe preservar y robustecer por encima de cualquier  divergencia en la contingencia cotidiana. Si alguna de estas agrupaciones  partidarias faltara el conglomerado ya no ser&iacute;a la mayor&iacute;a requerida para dar  curso, sostener y consolidar las reformas estructurales comprometidas con el  pa&iacute;s y la acci&oacute;n gubernativa se ver&iacute;a seriamente afectada. Esto significa que  el libre intercambio de opiniones sea debidamente encauzado hacia el logro de  los objetivos comunes. El pluralismo y la diversidad consustanciales a la  amplitud del bloque pol&iacute;tico de la Nueva Mayor&iacute;a tienen como condici&oacute;n para ser  fecundos el ejercicio de la unidad para concretar las transformaciones  program&aacute;ticas que le inspiran,</p>
      <p>En  consecuencia, la acci&oacute;n pol&iacute;tica que vamos a desarrollar tiene su pilar  esencial en el apoyo leal y consistente a las reformas impulsadas desde el  gobierno y se proyecta hacia el objetivo de enfrentar y reducir, a trav&eacute;s de  reformas sucesivas, la desigualdad social existente en el pa&iacute;s. Ello exige un  proyecto pol&iacute;tico a largo plazo, que desde una mirada de amplia mayor&iacute;a  nacional, sea capaz de aislar y superar el ideologismo neoliberal que a&uacute;n anima a la derecha en Chile.      </p>
      <p>Arribamos  a la concreci&oacute;n de estas nuevas metas rescatando el valor del esfuerzo de los  socialistas para reimplantar el r&eacute;gimen democr&aacute;tico en Chile. Dimos una lucha  muy dura, dolorosa y supimos mantener una tenacidad inquebrantable hasta que la  libertad volvi&oacute; a nuestro suelo. Por eso, aunque la tarea tuvo debilidades e  imperfecciones nos enorgullecemos de lo realizado ya que nunca nos rendimos y  jam&aacute;s abandon&aacute;remos el necesario ejercicio de tributar el reconocimiento que  merece la memoria de nuestros m&aacute;rtires. Hoy Carlos Lorca es un legado  imborrable que pertenece a los j&oacute;venes socialistas y Salvador Allende es una  figura que distingue a Chile en el mundo.</p>
      <p>Asimismo,  valoramos el arduo esfuerzo que desde 1990 hasta la fecha fue rehaciendo las  conquistas, derechos y libertades conculcados por la dictadura. El Chile  Solidario, el Estatuto Docente, la Jornada Escolar Completa, el AUGE, la  creaci&oacute;n del FOSIS, la Reforma Previsional que cre&oacute; la Pensi&oacute;n B&aacute;sica Solidaria  y el APS, la iniciativa Chile crece contigo, los planes de Viviendas sociales y  de Agua Potable Rural, en fin, una labor que nos hizo un pa&iacute;s m&aacute;s fuerte y m&aacute;s  seguro de s&iacute; mismo.</p>
      <p> Pero nos aflige la desigualdad y el  atraso que existe en muchas regiones, expresado en bolsones de pobreza, brotes  delincuenciales, drogadicci&oacute;n, alcoholismo y violencia intrafamiliar. Los  fuertes contrastes sociales nos afectan como pa&iacute;s, de ellos arranca la  intolerancia en el debate y el escaso valor que otorgamos a la diversidad.  Asimismo, en los segmentos de opini&oacute;n que est&aacute;n incomunicados entre s&iacute; surgen  grupos que exigen que los dem&aacute;s piensen como ellos; tal vez, sin darse cuenta  los alcanza la huella pegajosa del autoritarismo.</p>
      <p>Tales  obst&aacute;culos nos demanda proyectar una cultura libertaria, capaz de derrotar la  discriminaci&oacute;n en todo &aacute;mbito, de ejercer el debate de ideas con amplitud, de  no temer y no agredir la opini&oacute;n diferente; hay que dejar atr&aacute;s la mala  pr&aacute;ctica de la descalificaci&oacute;n personal que no hacen m&aacute;s que reflejar  odiosidades que son inconducentes. Se trata de situar como eje de la  preocupaci&oacute;n p&uacute;blica la consecuci&oacute;n de mayores grados de igualdad, en el marco  de nuestra diversidad esencial como individuos y la pertenencia a las  vertientes de pensamiento que nos identifican.</p>
      <p>Adem&aacute;s,  en el &aacute;mbito program&aacute;tico hay que proyectarse a largo plazo e impulsar la  reactivaci&oacute;n y diversificaci&oacute;n de la econom&iacute;a, hay que ampliar la base  industrial del pa&iacute;s, el potencial energ&eacute;tico y la incorporaci&oacute;n de la ciencia y  la tecnolog&iacute;a al proceso productivo. Ello requiere un Estado m&aacute;s &aacute;gil y m&aacute;s  fuerte. Su presencia debe estar donde el progreso social lo solicite y no  limitarse a llegar donde el mercado no existe.</p>
      <p>Aspiramos  a una sociedad fundada en el ejercicio de la raz&oacute;n y la libertad, sin traumas  ni complejos, con una sana memoria hist&oacute;rica, formada por gente que hace del  trabajo social una vocaci&oacute;n, que rechaza el parasitismo que se niega a  contribuir al esfuerzo colectivo y que condena la codicia ilimitada en los  negocios, reivindicamos una &eacute;tica de servicio p&uacute;blico que deplora el aprovechamiento  personal de las funciones p&uacute;blicas.</p>
      <p>Condenamos  la demagogia y el clientelismo que envilece el servicio p&uacute;blico, como que en  ciertas campa&ntilde;as electorales algunas candidaturas intentan la compra de  conciencias regalando enseres o paquetes con alimentos. Esa conducta siembra el  apoliticismo y abre la puerta al populismo.</p>
      <p>Por  el contrario, no hay democracia sin Partidos pol&iacute;ticos; su tarea no se puede  reemplazar por la acci&oacute;n de caudillos por iluminados que estos se muestren. Me  propongo reponer la deliberaci&oacute;n pol&iacute;tica, dentro y fuera del socialismo, con  la altura de miras que se requiere.</p>
      <p>Se  trata de dignificar la pol&iacute;tica, de levantar sus preocupaciones desde el foso  de las recriminaciones mutuas hacia una interlocuci&oacute;n activa con la sociedad civil  y los movimientos sociales e ir creando las condiciones que permitan avanzar  hacia una nueva Constituci&oacute;n, nacida en democracia, cuyo fundamento de  principios sea el respeto irrestricto a los Derechos Humanos.</p>
      <p>En  esa perspectiva se ir&aacute; configurando el Estado Social y Democr&aacute;tico de Derecho  que pueda derrotar la desigualdad. La tarea que nos convoca no se har&aacute; en un  abrir y cerrar de ojos, requiere una voluntad de acci&oacute;n mirando un horizonte  libertario y de fraternidad humana que da sentido a la perspectiva socialista,</p>
    <p>Eso  es lo que me motiva. Ning&uacute;n &aacute;nimo subalterno me inquieta el esp&iacute;ritu. La gran  tarea es hacer realidad la justicia social en democracia. Por eso, la unidad es  necesaria, todos somos parte de este esfuerzo.      </p></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="center">JUNTOS SOMOS M&aacute;S</td>
  </tr>
  <tr>
    <td align="center"><strong>Camilo Escalona</strong></td>
  </tr>
  <tr>
    <td align="right"><p>&nbsp;</p>
    <h5>30 de Octubre del 2014.</h5></td>
  </tr>
</table>

<div class="clear"></div>

<div id="loaded_data"></div>


<div class="clear"></div>
<div class="border_btn"></div>

<!--a href="<?php echo $location.'?imei='.$_GET['imei'] ?>"><input id="post_button" type="button" value="Volver"/></a-->

</div>



</div>


</body>
</html>