<?php	
	include("mysql.inc.php");
	$files=$_REQUEST['delete'];
	$dir="../uploads/";
	$contador=0;
	
	//Verificamos si lo que hemos enviado es un array
	if (is_array($files)){
		
		for ($i=0; $i <count($files) ; $i++){
			//Creamos la estancia de conexion.
			$db = new MySQL();
			//Eliminamos el archivo antes de eliminar el registro
			$row=$db ->consulta("SELECT nombre FROM tbl_temp_files WHERE id_files=".$files[$i]);
			$rows=$db->fetch_array($row);
			unlink($dir.$rows['nombre']);
			
			//Eliminamos el registro de la BD
			$rows=$db->consulta("DELETE FROM tbl_temp_files WHERE id_files=".$files[$i]);
			$contador++;
		} 
		//echo "Se han eliminado los $contador registros de la BD";
		echo '<script>window.alert("Se han eliminado los '.$contador.' registros de la BD!");location.href="../upload_main.php";</script>';
	} else {
		//echo "No se enviaron segistros para eliminar";
		echo '<script>window.alert("No se enviaron segistros para eliminar");location.href="../upload_main.php";</script>';
	}
?>