<?php
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/app_functions.php';

// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                                        Aplicacion                                                              */
/**********************************************************************************************************************************/    

$Fono = '98215151';

error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
$conexion= @mysql_connect('190.98.210.37', 'userdbscl', 'petland');
if (!$conexion) {
    die('Error de conexion n: ' . mysql_error());
}
echo 'Connected successfully';
mysql_select_db("llapaperu", $conexion);

$queEmp = "SELECT * FROM nom_ejecutiv WHERE fono_ejecutiv LIKE '98215151'";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

*/
/*
	if (!($base=mysql_connect("190.98.210.37","userdbscl","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }else{
		if (!mysql_select_db("llapaperu", $base)){    
			  echo "No he podido abrir la base de datos llapaperu";
			  exit();
		}else{
			echo "Conexion exitosa";
		}
	}
*/
	
	
function conectar2 ($servidor, $usuario, $pass, $base) {
	$db_con = mysql_connect ($servidor,$usuario,$pass);
	if (!$db_con) return false; 
	if (!mysql_select_db ($base, $db_con)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con; 
}



$dbConn2 = conectar2("190.98.210.37","userdbscl","petland","llappaperu");




	
	
	//Selecciono datos del usuario
	$query = "SELECT nom_ejecutiv, fono_ejecutiv
	FROM ejecutivos  
	WHERE fono_ejecutiv LIKE '98215151'";
	$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
	$row_data = mysql_fetch_assoc ($resultado);
		

	
	
/*     
//calcula distancias
function getBoundaries($lat, $lng, $distance = 1, $earthRadius = 6371)
{
    $return = array();
     
    // Los angulos para cada dirección
    $cardinalCoords = array('north' => '0',
                            'south' => '180',
                            'east' => '90',
                            'west' => '270');
    $rLat = deg2rad($lat);
    $rLng = deg2rad($lng);
    $rAngDist = $distance/$earthRadius;
    foreach ($cardinalCoords as $name => $angle)
    {
        $rAngle = deg2rad($angle);
        $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
        $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
         $return[$name] = array('lat' => (float) rad2deg($rLatB), 
                                'lng' => (float) rad2deg($rLonB));
    }
    return array('min_lat'  => $return['south']['lat'],
                 'max_lat' => $return['north']['lat'],
                 'min_lng' => $return['west']['lng'],
                 'max_lng' => $return['east']['lng']);
}


// Recibo los datos a traves de post
    $lng  = -77.053367; //$_POST['Longitud'];
    $lat  = -12.097397; //$_POST['Latitud'];
    $fecha = fecha_actual();
   
    //Consulta Haversine
    $dsn = 'mysql:dbname=app_seguridad;host=localhost';
	$usuario = 'root';
	$pass = 'petland';

	$distance = 100; // Sitios que se encuentren en un radio de 1KM
	$box = getBoundaries($lat, $lng, $distance);
	$pdo = new PDO($dsn, $usuario, $pass);
	$stmt = $pdo->query('SELECT 
						eventos_listado.Fecha,
						eventos_listado.Hora,
						eventos_listado.Longitud AS LongEvento,
						eventos_listado.Latitud AS LatEvento,
						clientes_listado.Nombre AS NombreCliente,
						eventos_tipos.Nombre AS TipoEvento, 
						( 6371 * ACOS( 
								 COS( RADIANS(' . $lat . ') ) 
								* COS(RADIANS( eventos_listado.Latitud ) ) 
								* COS(RADIANS( eventos_listado.Longitud ) 
								- RADIANS(' . $lng . ') ) 
								+ SIN( RADIANS(' . $lat . ') ) 
								* SIN(RADIANS( eventos_listado.Latitud ) ) 
							)
						) AS distance 
						 FROM eventos_listado 
						 LEFT JOIN clientes_listado ON clientes_listado.idCliente = eventos_listado.idCliente
						 LEFT JOIN eventos_tipos ON eventos_tipos.idTipoEvento = eventos_listado.idTipoEvento
						 WHERE (eventos_listado.Latitud BETWEEN ' . $box['min_lat']. ' AND ' . $box['max_lat'] . ')
						 AND (eventos_listado.Longitud BETWEEN ' . $box['min_lng']. ' AND ' . $box['max_lng']. ')
						 AND eventos_listado.Fecha = "'.$fecha.'"
						 HAVING distance < ' . $distance . '
						 ORDER BY distance ASC');






	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo '<pre>';
	print_r($rows);
	echo '</pre>';

/*
	while ($rows2 = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $rows2['Fecha'].'<br/>';
		echo $rows2['Hora'].'<br/>';
		echo $rows2['LongEvento'].'<br/>';
		echo $rows2['LatEvento'].'<br/>';
		echo $rows2['NombreCliente'].'<br/>';
		echo $rows2['TipoEvento'].'<br/>';
	}

*/






?>
