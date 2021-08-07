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

// variable de error activa
$response = array("error" => TRUE);

//Compruebo si recibi los datos
if (isset($_POST['Fono'])) {
	
	// Recibo los datos a traves de post
    $Fono        = $_POST['Fono'];

	//Conecto a la base de datos externa
	function conectar2 ($servidor, $usuario, $pass, $base) {
		$db_con = mysql_connect ($servidor,$usuario,$pass);
		if (!$db_con) return false; 
		if (!mysql_select_db ($base, $db_con)) return false;
		if (!mysql_query("SET NAMES 'utf8'")) return false;
		return $db_con; 
	}
	$dbConn2 = conectar2("190.98.210.37","userdbscl","petland","llappaperu");


	//Selecciono datos del usuario
	$query = "SELECT id_ejecutiv, nom_ejecutiv, fono_ejecutiv
	FROM ejecutivos  
	WHERE fono_ejecutiv LIKE '%$Fono%' LIMIT 1";
	$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
	$row_data = mysql_fetch_assoc ($resultado);
    


	//Si el usuario existe y esta activo
    if (isset($row_data)&&$row_data!='') {
        $response["error"] = FALSE;
        
        //obtengo los datos personales
        $response["user"]["Nombre"]     = $row_data["nom_ejecutiv"];
        $response["user"]["Fono"]       = $row_data["fono_ejecutiv"];
        $response["user"]["idCliente"]  = $row_data["id_ejecutiv"];

        echo json_encode($response);

    //Si no hay datos envio mensaje de error
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Usuario no registrado o numero telefonico mal ingresado";
        echo json_encode($response);
    }
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Telefono no ingresado";
    echo json_encode($response);
}


?>
