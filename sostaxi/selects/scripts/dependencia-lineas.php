<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$lineas = new selects();
$lineas->code = $_GET["code"];
$lineas = $lineas->cargarlineas();
foreach($lineas as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>