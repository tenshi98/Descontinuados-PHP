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

<div class="height95 widht100">
<div class="widht90 fcenter perfil height100">

<p class="s4">Intervenci&oacute;n del senador Camilo Escalona en el homenaje de la Concertaci&oacute;n al ex Presidente Salvador Allende</p><p><span><IMG width="126" height="85" src="../images/Image_006.jpg"/></span></p><p class="s11">Senador Camilo Escalona, presidente del PS</p><p class="s12">Estimados  colegas,  se&ntilde;ores  Senadores,  se&ntilde;ora  Senadora,  se&ntilde;ores  ex  parlamentarios   que  est&aacute;n  en  las  tribunas,  se&ntilde;ores Ministros, se&ntilde;or ex Ministro de Salvador Allende que nos acompa&ntilde;a, estimados familiares, invitados de la Fundaci&oacute;n Salvador Allende:</p><p class="s12">Rendimos en esta tarde homenaje a quien fuera Senador, Presidente del Senado y Presidente de la Rep&uacute;blica, al doctor Salvador Allende, que fue un l&iacute;der estudiantil, dirigente del Partido Socialista, dirigente comunal, dirigente regional, Secretario General del Partido Socialista, Diputado de la Rep&uacute;blica, Ministro de Salud de un Gobierno de ancha base democr&aacute;tica, como lo fue el Gobierno de Pedro Aguirre Cerda, Senador, candidato presidencial en cuatro oportunidades, Presidente del Senado y Presidente de la Rep&uacute;blica.</p><p class="s12">Su vida es su legado. Fue un luchador infatigable que promovi&oacute; la idea socialista en todos los rincones de Chile, bregando por un gran proyecto: alcanzar la mayor&iacute;a nacional que permitiese construir la nueva sociedad en democracia, pluralismo y libertad.</p><p class="s12">Recuerdo que semanas antes de las elecciones de marzo de 1973, elecciones parlamentarias en un Chile convulso, reuni&oacute; a los dirigentes estudiantiles  que apoyaban su Gobierno para hacer una ardiente convocatoria a que trabajaran intensamente  para ganar las conciencias juveniles y lograr tener mayor&iacute;a en el Parlamento que se eleg&iacute;a en aquella ocasi&oacute;n.</p><p class="s12">"Se  imaginan  j&oacute;venes  lo  que  ello  significar&iacute;a?"  -se  preguntaba-  "C&oacute;mo  har&iacute;amos  historia  desde  nuestro  lejano  Chile?", subrayaba, para a&ntilde;adir: "lograr&iacute;amos evitar el camino del enfrentamiento, del derramamiento de sangre o de la guerra civil en la construcci&oacute;n de un nuevo modelo de sociedad socialista".</p><p class="s12">Allende era un socialista libertario, que luchaba con conciencia, disciplina y lealtad por sus ideales.</p><p class="s12">"Tenemos que ser mayor&iacute;a" era el centro nervioso de su mensaje pol&iacute;tico, muy lejos del equ&iacute;voco de creer que ser de Izquierda es ser minor&iacute;a, que mientras m&aacute;s sectario y peque&ntilde;o el esp&iacute;ritu de partido, mejor. Por el contrario, para Allende la pol&iacute;tica era hacer democracia con may&uacute;sculas; construir pa&iacute;s; hacer de Chile una gran naci&oacute;n. Para Allende, el gran sentido cuotidiano de la acci&oacute;n  pol&iacute;tica  era construir  y consolidar  s&oacute;lidas  y potentes  mayor&iacute;as  nacionales  portadoras  de nuestros  grandes  objetivos program&aacute;ticos. La teor&iacute;a de las minor&iacute;as iluminadas que reemplazan a los pueblos, a los partidos y a la coaliciones se desplom&oacute; hace rato, no sin dejar a su paso un inconmensurable costo social y humano a las fuerzas de Izquierda.</p><p class="s12">Por ello, en el af&aacute;n de ser mayor&iacute;a, el pensamiento de Salvador Allende est&aacute; m&aacute;s vigente que nunca. Unir y no dividir ten&iacute;a que ver con el sentido mismo de la condici&oacute;n que &eacute;l entend&iacute;a era la condici&oacute;n de los socialistas.</p><p class="s12">Allende pensaba de acuerdo a la realidad chilena porque era un fruto robusto de la lucha centenaria del pueblo de Chile. Ten&iacute;a un gran sentido de la tarea hist&oacute;rica que lo distingu&iacute;a. Pero en ning&uacute;n caso se ve&iacute;a como un iluminado, como un mes&iacute;as de esos que aparecen de cuando en cuando, y much&iacute;simo menos pensaba que su carisma obedec&iacute;a a una simple y fulgurante carrera medi&aacute;tica.</p><p class="s4">Archivos Salvador Allende</p><p class="s12">Allende  era  la  lucha  del  siglo  XX  de  los  trabajadores  chilenos.  Allende  era  un  profundo  protagonista   popular,  sereno, responsable e intuitivo.</p><p class="s12">Fue un hombre que pens&oacute; a Chile en forma integral. Se preocup&oacute; de los principales temas del pa&iacute;s, como la salud, la educaci&oacute;n, la vivienda.</p><p class="s12">Pens&oacute; tambi&eacute;n en la integraci&oacute;n de Chile en la comunidad internacional. Sab&iacute;a como pocos que la lucha contra la pobreza no es tarea de un solo pa&iacute;s sino una labor com&uacute;n a todos los pueblos que luchan por su desarrollo.</p><p class="s12">Por  eso,  privilegi&oacute;  desde  su  Gobierno  las  relaciones  con  los  pueblos  vecinos,  luchando  contra  las  llamadas  "fronteras ideol&oacute;gicas" que marcaban la vida internacional durante la Guerra Fr&iacute;a. Por eso luch&oacute; por relaciones profundas, especialmente con Per&uacute;, Bolivia, Argentina, tarea que con orgullo la democracia Chilena ha retomado desde 1990 en adelante.</p><p class="s12">Allende fue un destacado dirigente estudiantil y luego, como l&iacute;der pol&iacute;tico, se preocup&oacute; tambi&eacute;n del derecho de los j&oacute;venes a tener una mejor educaci&oacute;n.</p><p class="s12">Allende supo interpretar la idiosincrasia del pueblo chileno, que quiere justicia social, pero abomina de las aventuras. Chile es un pueblo  que  anhela  derrotar  la  pobreza  y la  desigualdad  por  la  v&iacute;a  de  la  lucha  social,  por  el  camino  del  despertar  de  las conciencias, m&aacute;s que siguiendo libretos surgidos de otras realidades.</p><p class="s12">Por eso que Allende insist&iacute;a en que la revoluci&oacute;n chilena era una "revoluci&oacute;n con sabor a empanadas y vino tinto".</p><p class="s12">Allende vive en el pueblo chileno y en el coraz&oacute;n del mundo porque mostr&oacute; un nuevo camino, un camino original, distinto al que hasta ese momento otros exhib&iacute;an, una v&iacute;a chilena que se forj&oacute; durante d&eacute;cadas.</p><p class="s12">Allende fue un visionario. Se adelant&oacute; a su tiempo. Su manera de pensar el cambio social rompi&oacute; todos los moldes y los r&iacute;gidos esquemas de los modelos tradicionales imperantes en su &eacute;poca.</p><p class="s12">La democracia por la que Allende luch&oacute; se impuso al final en Am&eacute;rica Latina. Atr&aacute;s qued&oacute; la oscura &eacute;poca de las dictaduras militares. Hoy, cuando  hay libertades  plenas y derechos  pol&iacute;ticos  garantizados  por la estabilidad  democr&aacute;tica  que tanto nos cost&oacute; recuperar y alcanzar, emerge como nunca la figura de Allende y su reclamo del cambio social en democracia, pluralismo y libertad.</p><p class="s12">La v&iacute;a democr&aacute;tica se&ntilde;alada por Allende sigue m&aacute;s vigente que nunca.</p><p class="s12">El camino de ir siempre de la mano del pueblo, no como una secta de iluminados  que promete enso&ntilde;aciones  inalcanzables  y tampoco como un grupo oportunista y/o populista, que solo responde al eco del d&iacute;a a d&iacute;a. All&iacute; hay una clave allendista, parte de su sello, de su sabidur&iacute;a: permanecer siempre en el coraz&oacute;n del pueblo; saber a cabalidad sus inquietudes y anhelos, sus alegr&iacute;as y necesidades, y orientarlos en una pol&iacute;tica fecunda, con sentido estrat&eacute;gico.</p><p class="s12">"Todo lo que soy, se lo debo a mi pueblo y al Partido Socialista", dijo Allende. Por eso, los socialistas estamos orgullosos de ser la casa que cobij&oacute; los sue&ntilde;os y aspiraciones de nuestro gran compa&ntilde;ero. Allende siempre tuvo presente que a pesar de todo su gran carisma, de su personalidad cautivante, de sus vibrantes y emotivos</p><p class="s12">discursos era gracias al Partido Socialista que sus ideas y planteamientos se hac&iacute;an carne en el pueblo de Chile.</p><p class="s12">Allende, al se&ntilde;alar que lleg&oacute; a ser l&iacute;der popular y Presidente del pa&iacute;s gracias a su Partido y su pueblo sepult&oacute; todo atisbo de caudillismo, de personalismo, de aquel individualismo est&eacute;ril que tanto da&ntilde;o causa a las democracias en el mundo entero.</p><p class="s12">El Partido Socialista solo puede tener palabras de gratitud con Salvador Allende. Su figura se convirti&oacute; en sin&oacute;nimo de lo que somos para el mundo entero. Miles de j&oacute;venes que no le conocieron en vida abrazan hoy sus ideales. A&uacute;n m&aacute;s, hoy es una figura de relevancia mundial que, a cien a&ntilde;os de su nacimiento, sigue m&aacute;s vigente y actual que nunca. Allende brilla en &aacute;frica y en Asia, en Europa y en Am&eacute;rica Latina y en todos los lugares donde hay injusticia y desigualdad, como una forma concreta de decir que la justicia social es posible y que la humanidad abre paso a surcos nuevos hacia una nueva sociedad.</p>
<p class="s12">Allende fue de aquellos imprescindibles.</p>

<div class="clear"></div>

<div id="loaded_data"></div>


<div class="clear"></div>
<div class="border_btn"></div>



</div>



</div>


</body>
</html>