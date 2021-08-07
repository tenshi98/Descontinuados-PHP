<?php 
// Se traen todos los datos de la empresa
$query = "SELECT  Nombre
FROM `core_datos`
WHERE id_Datos = '1'";
$resultado = mysql_query ($query, $dbConn);
$rowempresa = mysql_fetch_assoc ($resultado);?>

<div id="copyright" class="opacity">
    <p>2014 &copy; <?php echo $rowempresa['Nombre']; ?>. Todos los derechos reservados.</p>
</div>