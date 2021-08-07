
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
			verlistadoimagenes();
		})
		
		function verlistadoimagenes(){
			var randomnumber=Math.random()*11;
			$.post("uploadify_libs/viewimagenes.php?id_Oirs=<?php echo $_GET['id_Oirs'] ?>",{randomnumber:randomnumber},
				function(data){
					$("#viewimagenes").html(data).slideDown("slow");
				});
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
        <div id="viewimagenes"></div>
    </div>
</body>
</html>