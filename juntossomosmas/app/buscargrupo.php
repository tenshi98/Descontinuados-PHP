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
$volver = "administrar.php";
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
<div class="widht80 fcenter perfil">



<?php 

if ( $_POST['Seguir1']=="Seguir" ) {
		$query  = "insert into ejecutivo_seguidores (mi_id,id_sigo,tipo,creador_grupo,aceptado) values (".$row_data["id_ejecutiv"].",".$_POST["valor"].",'G',".$_POST["creador"].",0)";
		$result = mysql_query($query, $dbConn);
}

if ( $_POST['Elimina']=="Eliminar" ) {
		$query  = "delete from ejecutivo_seguidores where  mi_id=".$row_data["id_ejecutiv"]." and id_sigo=".$_POST["valor"]." and tipo='G'";
		$result = mysql_query($query, $dbConn);
}

$query = "SELECT id from ejecutivo_seguidores where aceptado=1 and  (( creador_grupo=".$row_data["id_ejecutiv"]." and tipo='G')  or (id_sigo=".$row_data["id_ejecutiv"]." and tipo='P'))";
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros_siguen=mysql_num_rows($resultado); 
$query = "SELECT id from ejecutivo_seguidores where mi_id=".$row_data["id_ejecutiv"]." and aceptado=1";
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros_sigo=mysql_num_rows($resultado); 
$query = "SELECT * from ejecutivo_seguidores WHERE aceptado=0 and  (( creador_grupo=".$row_data["id_ejecutiv"]." and tipo='G')  or (id_sigo=".$row_data["id_ejecutiv"]." and tipo='P'))";
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros_pendientes=mysql_num_rows($resultado); 
//Se trae un listado con las preguntas
 ?>



    <div class="cuerpo_gris_12"><center><span class="tit_red">Busqueda por Grupo</span></center>
	<strong>Me Siguen: </strong><?=$numeroRegistros_siguen?>&nbsp;/&nbsp;<strong>Sigo: </strong><?=$numeroRegistros_sigo?>&nbsp;/&nbsp;<strong>Pendientes: </strong><?=$numeroRegistros_pendientes?><br><br>
	

   </div>





<?
$sql_vpb="select nombre_grupo,id_grupo,creador FROM grupo WHERE nombre_grupo like '%".$_POST["grupo"]."%' order by id_grupo asc ";
$sql_vpb = str_replace(" ", "3xyzxyz3", $sql_vpb);
$sql_vpb = str_replace("'", "potocaca", $sql_vpb);

?>

<script type="text/javascript"> jQuery.noConflict(); </script>
<script type="text/javascript" src="js/jquery-v1.8.3.js"> </script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/load-more-post.js"></script>


<script type="text/javascript">
$(document).ready(function() {


	$('#loaded_data').vasplus_post_scroller({

		vpb_total_per_load  : 5, // Total number of posts per scroll to be loaded on the page
		vpb_start           : 0, // Default - loading start at 0 offset
		vpb_no_more         : 'No hay mas Datos', // This is the message shown to the user when the post is finished
		vpb_load_more       : 'Cargar mas Datos', // This is the message shown to the user when set auto scroll to false to load more data    
		vpb_delay           : 600, // Wait after this time when a user scrolls down to start again
		vpb_auto_load       : true, // Set to true for auto scroll and set to false to scroll manually
		vpb_page_identifier : 'laod-more-post', // Not really necessary unless you need it otherwise leave it alone
		vpb_url             : 'laod-more-post.php?cat=0&sql_vpb=<?=$sql_vpb?>&que_es=bgrupo&id=<?=$_GET['id']?>&longitud=<?=$_GET["longitud"]?>&latitud=<?=$_GET["latitud"]?>&imei=<?=$_GET["imei"]?>&yo=<?=$row_data["id_ejecutiv"]?>', // This is the URL to the page that gets content from the database
		vpb_loading_div_id  : 'vpb_loading_box' // This is the ID of the div where the loaded contents will be displayed
		
	});
	
});

</script>


<div id="loaded_data"></div>


<div class="clear"></div>
<div class="border_btn"></div>

</div></div>



</body>
</html>