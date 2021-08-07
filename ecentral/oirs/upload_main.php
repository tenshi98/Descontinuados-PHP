<?php
//se borra un dato
if ( !empty($_GET['del']) )     {
		
	include("uploadify_libs/mysql.inc.php");
	$files=$_GET['del'];
	$dir="uploads/";

			//Creamos la estancia de conexion.
			$db = new MySQL();
			//Eliminamos el archivo antes de eliminar el registro
			$row=$db ->consulta("SELECT nombre FROM tbl_temp_files WHERE id_files=".$files);
			$rows=$db->fetch_array($row);
			$nombre = $rows['nombre'];
			unlink($dir.$rows['nombre']);
			
			//Eliminamos el registro de la BD
			$rows=$db->consulta("DELETE FROM tbl_temp_files WHERE id_files=".$files);

//Se crean las variables a utilizar
date_default_timezone_set("Chile/Continental");
$Hora           = date("H:i:s",time());
$Fecha          = date("Y-m-d");
$idUsuario      = $_GET['idUsuario'];	
//Se crea el detalle 
$Detalle        = 'Se ha borrado el archivo '.$nombre.'';	
//Se inserta el registro dentro del historial
$rows = $db->consulta("INSERT INTO `oirs_historial` (`id_Oirs`, `idUsuario` , `Fecha` , `Hora`, `Detalle` )VALUES('".$_GET['id_Oirs']."','$idUsuario','$Fecha','$Hora','$Detalle')");


}	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Subir archivos al servidor</title>

		<!-- CSS -->
		<link rel="stylesheet" href="css/estilos.css" type="text/css" />
		<!--<link href="http://fonts.googleapis.com/css?family=Aclonica:regular" rel="stylesheet" type="text/css" >-->

		<!-- Libreria JQuery -->
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script><!--se modifica por la version de jquery que tengan -->
        
        <!--PARA SUBIR ARCHIVOS -->
        <link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />
		<script type="text/javascript" src="uploadify/jquery.uploadify.js"></script>

        <!--FUNCIONES GENERALES -->
		<script type="text/javascript" >
        // JavaScript Document
		$(document).ready(function(){
			verformularionuevaimagen();
			verlistadoimagenes();
		})
		
		function verformularionuevaimagen(){
			var randomnumber=Math.random()*11;
			$.post("upload_img.php?id_Oirs=<?php echo $_GET['id_Oirs'] ?>&idUsuario=<?php echo $_GET['idUsuario'] ?>",{randomnumber:randomnumber}, 
				function(data){
					$("#upload_img").html(data).slideDown("slow");
				});
		}
		function verlistadoimagenes(){
			var randomnumber=Math.random()*11;
			$.post("uploadify_libs/listadoimagenes.php?id_Oirs=<?php echo $_GET['id_Oirs'] ?>&idUsuario=<?php echo $_GET['idUsuario']?>",{randomnumber:randomnumber},
				function(data){
					$("#listadoimagenes").html(data).slideDown("slow");
				});
		}
		function msg(direccion){
		if (confirm("¿Realmente deseas eliminar el archivo?")) {
				//Envía el formulario
				location=direccion;
			} else {
				//No envía el formulario
			   return false;
			}	
		}		
        </script>
		
		
		<!-- Table IU -->
		<style type="text/css" title="currentStyle">
			@import "css/demo_table_jui.css";
			@import "uploadify_themes_table_iu/black-tie/jquery-ui.css";
			.ui-tabs .ui-tabs-panel { padding: 10px }
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery-ui-tabs.js"></script>
		
  
        
        
		<!--<link rel="stylesheet" href="css/popup.css" />
		<script type="text/javascript" src="js/tinybox.js"></script>-->
</head>
<body>
    <div id="contenedor">
    	<div id="upload_img"></div>
        <div id="listadoimagenes"></div>
    </div>
</body>
</html>