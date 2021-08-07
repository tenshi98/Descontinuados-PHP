<?php
//archivo que contiene la conexion
include("mysql.inc.php");
try{
	$db = new MySQL();
	$arrayreempla=array("/","");
	
	// Se traen todos los datos de la empresa
	$listar= $db ->consulta("SELECT  path_upload FROM `core_datos` WHERE id_Datos = '1' ");
	$row=($db->fetch_array($listar));
	$folder=$row['path_upload'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $folder ;
	$archivo= str_replace($arrayreempla," ", $_FILES['Filedata']['name']);
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$type= explode(".", $archivo);
	$extension = end($type);
	$imagen= time(). "-" . $archivo;
	$descrip= $_REQUEST['des'];
	$targetFile = str_replace("//", "/", $targetPath) . $imagen;
	
//Se inserta el archivo dentro de la base de datos
$insert = $db->consulta("INSERT INTO `tbl_temp_files` (`id_Oirs`, `nombre` , `descripcion` , `tipo`, `status` )VALUES('".$_GET['id_Oirs']."','$imagen','$descrip','$extension','1')");


//Se crean las variables a utilizar
date_default_timezone_set("Chile/Continental");
$Hora           = date("H:i:s",time());
$Fecha          = date("Y-m-d");
$idUsuario      = $_GET['idUsuario'];	
//Se crea el detalle 
$Detalle        = 'Se ha adjuntado el archivo '.$imagen.' con la descripcion: '.$descrip.'';	
//Se inserta el registro dentro del historial
$insert = $db->consulta("INSERT INTO `oirs_historial` (`id_Oirs`, `idUsuario` , `Fecha` , `Hora`, `Detalle` )VALUES('".$_GET['id_Oirs']."','$idUsuario','$Fecha','$Hora','$Detalle')");	
	
		
	
		if ($insert){
			echo "1";
			move_uploaded_file($tempFile, $targetFile);
		}else{
			echo "0";
		}
	} 
	catch (Exception $ex) 
	{
	echo "0";
}
?>