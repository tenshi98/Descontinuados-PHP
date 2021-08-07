<?php session_start();

//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config2.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
$location = "gracias_cel_01.php?id=".$_GET['id']."&latitud=".$_GET['latitud']."&longitud=".$_GET['longitud']."&imei=".$_GET['imei'];

		
		//se toma la fecha de ingreso
		$datestamp    = $stime=date("Ymd");
		$fecha_ing=$datestamp;
		//defino el grupo
		$grupo="sosamerica";
		//Otros datos
		$radio="1";
		$publicidad="Si";
		$estado_usr='1';
		if(isset($_GET['id'])){
			$gcmcode=$_GET['id'];	
		}else{
			$gcmcode='';
		}

		if(isset($_GET['imei'])){
			$imei=$_GET['imei'];	
		}else{
			$imei='';
		}

		if(isset($_GET['latitud'])){
			$latitud=$_GET['latitud'];	
		}else{
			$latitud="''";
		}
		
		if(isset($_GET['longitud'])){
			$longitud=$_GET['longitud'];	
		}else{
			$longitud="''";
		}
		if(isset($_GET['dispositivo'])){
			$dispositivo=$_GET['dispositivo'];	
		}else{
			$dispositivo='';
		}
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];	
		}else{
			$nombre='';
		}
		$idfb=$_POST['idfb'];
		if(isset($_POST['correo'])){
			$login=$_POST['correo'];	
			$correo=$_POST['correo'];
		}else{
			$login=$idfb;
			$correo='';
		}
		if(isset($_POST['ciudad'])){
			$ciudad=$_POST['ciudad'];	
		}else{
			$ciudad='';
		}
		
		$telefono='09'.$_POST['fono'];
		//envio el sms al celular con el nuevo codigo

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `ejecutivos` (nom_ejecutiv, fono_ejecutiv, ciudad_ejecutiv, login,pass, fecha_ingreso, mail_ejecutiv, grupo, publicidad, estado_usr,gcmcode,imei,lon,lat,dispositivo,id_fb) VALUES ('{$nombre}','{$telefono}','{$ciudad}','{$login}','1234',{$fecha_ing},'{$correo}','{$grupo}', '{$publicidad}', '{$estado_usr}', '{$gcmcode}', '{$imei}', {$longitud}, {$latitud}, '{$dispositivo}', '{$idfb}'  )";
		//echo $query;
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.'&create=true' );
		die;

?>
