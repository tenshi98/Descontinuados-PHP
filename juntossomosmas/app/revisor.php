<?php 
define('XMBCXRXSKGC', 1);
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
$imei = $_REQUEST['imei'];
//$imei='356878051272119';


$query = "SELECT 
ejecutivos.sms1,
ejecutivos.sms2,
ejecutivos.sms3,
ejecutivos.sms4,
ejecutivos.sms5, 
(SELECT COUNT(b.fono_ejecutiv) FROM ejecutivos b WHERE b.fono_ejecutiv LIKE CONCAT('09', ejecutivos.sms1 ) ) AS contar1,
(SELECT COUNT(b.fono_ejecutiv) FROM ejecutivos b WHERE b.fono_ejecutiv LIKE CONCAT('09', ejecutivos.sms2 ) ) AS contar2,
(SELECT COUNT(b.fono_ejecutiv) FROM ejecutivos b WHERE b.fono_ejecutiv LIKE CONCAT('09', ejecutivos.sms3 ) ) AS contar3,
(SELECT COUNT(b.fono_ejecutiv) FROM ejecutivos b WHERE b.fono_ejecutiv LIKE CONCAT('09', ejecutivos.sms4 ) ) AS contar4,
(SELECT COUNT(b.fono_ejecutiv) FROM ejecutivos b WHERE b.fono_ejecutiv LIKE CONCAT('09', ejecutivos.sms5 ) ) AS contar5 

FROM ejecutivos WHERE imei= '".$imei."' Limit 1";
$resultado = mysql_query ($query, $dbConn);
$rowusr=mysql_fetch_array($resultado);
echo $rowusr["sms1"].",".$rowusr["sms2"].",".$rowusr["sms3"].",".$rowusr["sms4"].",".$rowusr["sms5"].",".$rowusr["contar1"].",".$rowusr["contar2"].",".$rowusr["contar3"].",".$rowusr["contar4"].",".$rowusr["contar5"];

	?>
