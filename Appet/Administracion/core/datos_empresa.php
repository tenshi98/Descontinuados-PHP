<?php // Se traen todos los datos de la empresa
$query = "SELECT  idUsuario, Nombre, url_principal, email_principal, idTheme,Dias_alcalde
FROM `core_datos`
WHERE id_Datos = '1'";
$result = mysql_query ($query, $dbConn);
$rowempresa = mysql_fetch_assoc($result);?>