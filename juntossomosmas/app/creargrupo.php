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
$foro = "foro0.php";
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


$sql ="SELECT id_ejecutiv,nom_ejecutiv FROM ejecutivos WHERE imei='".$_GET["imei"]."'";
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
$nombre_mio=$row_data['nom_ejecutiv'];
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<!-- MENU DESPLEGABLE-->
<?require_once 'mmenu.php';?>
<!-- MENU DESPLEGABLE-->

<div class="height100 widht100">
<div class="widht80 fcenter perfil">



<?php 



if ($_GET["guardar"] != '') {
	if($_POST["grupo"] == ''){
		echo '<font color="#ff0000">Escribe un Nombre</font>';
		$escribir = $guardar;
		}else {
			$existe= " SELECT * FROM  grupo where nombre_grupo='".$_POST["grupo"]."'";
			$resultado = mysql_query ($existe, $dbConn);
			$numeroRegistros_grupo=mysql_num_rows($resultado); 
			if ($numeroRegistros_grupo==0) {
				$fecha_paso=date("Y-m-d H:i:s");
				$sql = "INSERT INTO  grupo (nombre_grupo ,creador ,fecha)VALUES ('".$_POST["grupo"]."',".$row_data["id_ejecutiv"].",'".$fecha_paso."')";
				mysql_query($sql,$dbConn);
				$topten= " SELECT  id_grupo FROM  grupo where fecha='".$fecha_paso."' and nombre_grupo='".$_POST["grupo"]."' and creador=".$row_data["id_ejecutiv"];
				$resultado = mysql_query ($topten, $dbConn);
				$indice = mysql_fetch_assoc ($resultado);
				$query  = "insert into ejecutivo_seguidores (mi_id,id_sigo,tipo,creador_grupo,aceptado) values (".$row_data["id_ejecutiv"].",".$indice["id_grupo"].",'G',".$row_data["id_ejecutiv"].",1)";
				$result = mysql_query($query, $dbConn);
				$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/envia_creacion.php?mensaje='Se ha creado el Grupo ".$_POST["grupo"]."3xyzxyz30' &";
				$fp = shell_exec($command);

					echo '<font color="#ff0000">grupo Creado Satisfactoriamente</font>';
			}else {
				echo '<font color="#ff0000">Nombre de Grupo Existe</font>';
				$escribir = $guardar;
			}
		}	
}
 ?>



    <div class="cuerpo_gris_12"><center><span class="tit_red">Nombre del Grupo</span></center><br>
		<form id="formcel" name="formcel" action="?guardar=1&imei=<?=$_GET['imei']?>&cat=<?=$_GET["cat"]?>"  method="post" target="_self" >
		<input type="text" name="grupo"  placeholder="Ingresar Nombre del Grupo" maxlength="75">
		<input id="post_button" type="submit" value="Crear Grupo"/>
    </form>	
	




<div class="clear"></div>


<div class="border_btn"></div>



</div>



</div>



</body>
</html>