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


<link rel="stylesheet" type="text/css" href="css/style.css" />
<?php 
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


    <div class="cuerpo_gris_12"><center><span class="tit_red">Top Ten</span></center>
	<strong>Me Siguen: </strong><?=$numeroRegistros_siguen?>&nbsp;/&nbsp;<strong>Sigo: </strong><?=$numeroRegistros_sigo?>&nbsp;/&nbsp;<strong>Pendientes: </strong><?=$numeroRegistros_pendientes?><br><br>
	

   </div>






<?


if ( $_POST['Seguir1']=="Seguir" ) {
		$query  = "insert into ejecutivo_seguidores (mi_id,id_sigo) values (".$row_data["id_ejecutiv"].",".$_POST["valor"].")";
		$result = mysql_query($query, $dbConn);
}

if ( $_POST['Elimina']=="Eliminar" ) {
		$query  = "delete from ejecutivo_seguidores where  mi_id=".$row_data["id_ejecutiv"]." and id_sigo=".$_POST["valor"];
		$result = mysql_query($query, $dbConn);
}
//Busca a todos
//$topten= " SELECT  id_sigo ,tipo, COUNT( * ) AS total FROM  ejecutivo_seguidores GROUP BY id_sigo ORDER BY total DESC LIMIT 10";

// Busca solo grupos
$topten= " SELECT  id_sigo ,tipo, COUNT( * ) AS total FROM  ejecutivo_seguidores where tipo='G' GROUP BY id_sigo ORDER BY total DESC LIMIT 10";
$resultado = mysql_query ($topten, $dbConn);
while ( $pregunta = mysql_fetch_assoc ($resultado)) {
if ($pregunta['tipo']=='P') {
	$sql01 ="SELECT nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv='".$pregunta['id_sigo']."'";
	$res01=mysql_query($sql01,$dbConn); 
	$row_data01 = mysql_fetch_assoc ($res01);
	$nombre=$row_data01['nom_ejecutiv'];
}else{
	$sql01 ="SELECT nombre_grupo,creador FROM grupo WHERE id_grupo='".$pregunta['id_sigo']."'";
	$res01=mysql_query($sql01,$dbConn); 
	$row_data01 = mysql_fetch_assoc ($res01);
		$nombre=$row_data01['creador'];
		$grupo=$row_data01['nombre_grupo'];
		$sql011 ="SELECT nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv='".$row_data01['creador']."'";
	$res011=mysql_query($sql011,$dbConn); 
	$row_data011 = mysql_fetch_assoc ($res011);
	$nombre_creador=$row_data011['nom_ejecutiv'];

}



?>


<div id="vpbconetnts" >

	<? if ($pregunta["id_sigo"]==$row_data["id_ejecutiv"]) {
		if ($pregunta['tipo']=='P') {?>
				<div style=" float:left; width:90%;" align="left">
<span class="fecha_gris_12"><strong><?php echo $nombre;?><br>Seguidores :</strong><?php echo $pregunta['total']-1;?> <br>	</span>
</div>
		<?}else{?>
				<div style=" float:left; width:90%;" align="left">
<span class="fecha_gris_12"><strong>Nombre Grupo:</strong> <?php echo $grupo;?><br><strong>Creador: </strong><?php echo $nombre_creador;?><br><strong>Seguidores : </strong><?php echo $pregunta['total']-1;?><br>	</span>
</div>

		<?}?>
	<?}else{		
			if ($pregunta['tipo']=='P') {?>
				<div style=" float:left; width:90%;" align="left">
<span class="fecha_gris_12"><strong><?php echo $nombre;?><br><strong>Seguidores : </strong><?php echo $pregunta['total']-1;?> <br>	</span>
</div>
			<?}else{?>
				<div style=" float:left; width:90%;" align="left">
<span class="fecha_gris_12"><strong>Nombre Grupo:</strong> <?php echo $grupo;?><br><strong>Creador: </strong><?php echo $nombre_creador;?><br><strong>Seguidores : </strong><?php echo $pregunta['total']-1;?><br>	</span>
</div>

			<?}?>

				
<?
$query_sigo = "SELECT id from ejecutivo_seguidores where mi_id=".$row_data["id_ejecutiv"]." and id_sigo=".$pregunta["id_sigo"];
$resultado_sigo = mysql_query ($query_sigo, $dbConn);
$numeroRegistros_sigo=mysql_num_rows($resultado_sigo); 
if ($numeroRegistros_sigo==0){		?>
	<form id="fsms1<?=$_GET['imei']?>" name="fsms1<?=$_GET['imei']?>" action="topten.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
		<input type="hidden" name="valor" value='<?=$pregunta["id_sigo"]?>'>
		<input id="Seguir1" name="Seguir1" type="image" src="images/invita4.png" value="Seguir" alt="Seguir" width="30"/>
    </form>		
<?}else{?>

	<form id="fsms2<?=$_GET['imei']?>" name="fsms2<?=$_GET['imei']?>" action="topten.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
		<input type="hidden" name="valor" value='<?=$pregunta["id_sigo"]?>'>
		<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="30"/>
    </form>	
        
		
<?	}
	}?>
	 <br clear="all" />
    </div>	

<?php }
?>


</div>



</div>



</body>
</html>