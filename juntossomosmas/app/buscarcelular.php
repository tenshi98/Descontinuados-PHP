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
		$query  = "insert into ejecutivo_seguidores (mi_id,id_sigo,tipo) values (".$row_data["id_ejecutiv"].",".$_POST["valor"].",'P')";
		$result = mysql_query($query, $dbConn);
}

if ( $_POST['Elimina']=="Eliminar" ) {
		$query  = "delete from ejecutivo_seguidores where  mi_id=".$row_data["id_ejecutiv"]." and id_sigo=".$_POST["valor"]." and tipo='P'";
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



    <div class="cuerpo_gris_12"><center><span class="tit_red">Busqueda por Numero Celular</span></center>
	<strong>Me Siguen: </strong><?=$numeroRegistros_siguen?>&nbsp;/&nbsp;<strong>Yo sigo: </strong><?=$numeroRegistros_sigo?>&nbsp;/&nbsp;<strong>pendientes: </strong><?=$numeroRegistros_pendientes?><br><br>
	

   </div>
   





<?




$ejecutivos="select nom_ejecutiv,id_ejecutiv FROM ejecutivos WHERE fono_ejecutiv like '%".$_POST["celular"]."%'";
$res01=mysql_query($ejecutivos,$dbConn); 
while ( $row_data01 = mysql_fetch_assoc ($res01)) {

$topten= " SELECT  COUNT( * ) AS total FROM  ejecutivo_seguidores where id_sigo=".$row_data01["id_ejecutiv"]." and tipo='P'";
$resultado = mysql_query ($topten, $dbConn);
$pregunta = mysql_fetch_assoc ($resultado);
$cuantos_siguen=$pregunta['total']-1;
if ($cuantos_siguen<0) {
	$cuantos_siguen=0;
	}
?>


<div class="q_box">
    <div class="quest">

	<? if ($row_data01["id_ejecutiv"]==$row_data["id_ejecutiv"]) {?>
		<strong><?php echo $row_data01['nom_ejecutiv'];?></strong><br><?php echo $cuantos_siguen;?> Seguidores<br>
	<?}else{?>
	
	
	<strong><?php echo $row_data01['nom_ejecutiv'];?></strong><br><?php echo $cuantos_siguen;?> Seguidores<br>
<?
$query_sigo = "SELECT id from ejecutivo_seguidores where mi_id=".$row_data["id_ejecutiv"]." and id_sigo=".$row_data01["id_ejecutiv"];

$resultado_sigo = mysql_query ($query_sigo, $dbConn);
$numeroRegistros_sigo=mysql_num_rows($resultado_sigo); 
if ($numeroRegistros_sigo==0){		?>

        <div align="center">
	<form id="fsms1<?=$_GET['imei']?>" name="fsms1<?=$_GET['imei']?>" action="buscarnombre.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
		<input type="hidden" name="valor" value='<?=$row_data01["id_ejecutiv"]?>'>
		<input type="hidden" name="celular" value='<?=$_POST["celular"]?>'>
		<input id="Seguir1" name="Seguir1" type="image" src="images/invita4.png" value="Seguir" alt="Seguir" width="30"/>
    </form>		
        </div>
<?}else{?>
	        <div align="center">
	<form id="fsms2<?=$_GET['imei']?>" name="fsms2<?=$_GET['imei']?>" action="buscarnombre.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
		<input type="hidden" name="valor" value='<?=$row_data01["id_ejecutiv"]?>'>
		<input type="hidden" name="celular" value='<?=$_POST["celular"]?>'>
		<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="30"/>
    </form>	
        </div>	
		
<?	}
	}?>
    
    </div>

    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="border_btn"></div>
<?php }
?>


</div>



</div>



</body>
</html>