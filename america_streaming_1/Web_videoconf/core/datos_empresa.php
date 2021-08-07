<?php // Se traen todos los datos de la empresa    idUsuario, Nombre, url_principal, email_principal, idTheme
$query = "SELECT  Nombre, email_principal
FROM `core_datos`
WHERE id_Datos = '1'";
$result = mysql_query ($query, $dbConn);
$rowempresa = mysql_fetch_assoc($result);?>