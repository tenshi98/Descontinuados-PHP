<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$regiones = $selects->cargarregiones();
foreach($regiones as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>