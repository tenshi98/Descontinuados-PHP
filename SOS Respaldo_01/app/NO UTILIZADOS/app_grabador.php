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
// obtengo puntero de conexion con la db
$dbConn = conectar();
// obtengo los datos enviados desde la aplicacion
$imei = $_REQUEST['imeinum'];
$nombre = $_REQUEST['nombre'];
$numero = $_REQUEST['numero'];
/**********************************************************************************************************************************/
/*                                                     Base de datos                                                              */
/**********************************************************************************************************************************/
//Busco la id del usuario con su imei
$query = "SELECT idCliente
FROM `clientes_listado` 
WHERE Imei = ".$imei;
$resultado = mysql_query ($query, $dbConn);
$row_id = mysql_fetch_assoc ($resultado);
//Verifico que el dato no este repetido
$query = "SELECT idCliente
FROM `clientes_contacto_amigos` 
WHERE idCliente = ".$row_id['idCliente']." AND Fono = ".$numero."";
$resultado = mysql_query ($query, $dbConn);
$n_repetido = mysql_num_rows ($resultado);

//Condiciono que el numero no este repetido
if($n_repetido==0&&$row_id['idCliente']!=0&&$row_id['idCliente']!=''){
	//Se crea la cadena a insertar
	$a = "'".$row_id['idCliente']."'" ;
	$a .= ", '1'" ;
	$a .= ", '".$nombre."'" ;
	$a .= ", '".$numero."'" ;

	// inserto los datos de registro en la db
	$query  = "INSERT INTO `clientes_contacto_amigos` (idCliente, idGrupo, Nombre, Fono) VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	
}



?>
