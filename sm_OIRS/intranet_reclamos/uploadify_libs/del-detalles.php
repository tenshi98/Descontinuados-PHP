<?php
	include("mysql.inc.php");
	$db = new MySQL();
	
	$details = $_POST['id'];
	
	if ($details) {
		$query=$db->consulta("SELECT * FROM tbl_temp_files WHERE id_files=".$details);
		$row=$db->fetch_array($query);
		
			echo "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" class=\"table_details\" width=\"400\">";
				echo "<tr>";
					echo "<td align=\"right\"><strong>Nombre:</strong></td>";
					echo "<td width=\"10\">&nbsp;</td>";
					echo "<td>".$row['nombre']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td align=\"right\"><strong>Tipo:</strong></td>";
					echo "<td width=\"10\">&nbsp;</td>";
					echo "<td>".$row['tipo']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td align=\"right\"><strong>url:</strong></td>";
					echo "<td width=\"10\">&nbsp;</td>";
					echo "<td>http://localhost/subirimagen/uploads/".$row['nombre']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
					echo "<td>&nbsp;</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td colspan=\"3\" align=\"center\"><a href=\"uploads/".$row['nombre']."\" class=\"a_demo_two\">Descargar</a></td>";
				echo "</tr>";
			echo "</table>";
			echo "<br /><br />";
			echo "<p align=\"center\" class=\"footer_details\">Modified by <a href=\"http://www.facebook.com/pages/Wconexion/202752103092255\" target=\"_blank\">Wconexion</a></p>";
	} else {
		echo "No hay informacion";
	}
	
	

?>