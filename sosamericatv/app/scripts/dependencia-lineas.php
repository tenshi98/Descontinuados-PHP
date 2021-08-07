<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }
   if (!mysql_select_db("sostaxi",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
$lineas = new selects();
$lineas->code = $_GET["code"];
$lineas = $lineas->cargarlineas();
foreach($lineas as $key=>$value)
{

$sql="SELECT responsable_servicio,nombre_fantasia FROM lineas WHERE id_linea = ".$value." order by responsable_servicio";
$resultado_sql = mysql_query ($sql,$base);
$rowusr = mysql_fetch_assoc ($resultado_sql); 

				if ($rowusr["nombre_fantasia"]<>'') {
					$nombre = $rowusr["nombre_fantasia"];
				}else{
					$nombre = $rowusr["responsable_servicio"];				
				}

		echo "<option value=\"$value\">$nombre</option>";
}
?>