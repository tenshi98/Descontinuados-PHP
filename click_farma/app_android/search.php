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
if (isset($_POST['Especialidad']) ) {
	
	// Recibo los datos a traves de post
    $Especialidad       = $_POST['Especialidad'];
   
    //Verifico que el resultado no sea yo mismo
	$z="WHERE Especialidad='".$Especialidad."'";
	//verifico que este dispuesto a recibir llamadas
	$z .= " AND idDisponibilidad = 1 " ;
	//esta activo en el sistema
	$z .= " AND idEstado = 1 " ;
	

	//Realizo la consulta	
	$query="SELECT 
	Nombre, idMedico, Fono1, Especialidad
	FROM medicos_listado 
	".$z."	
	ORDER BY nLlamadas DESC 
	LIMIT 1";		  
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);


	
	
    //Si el usuario existe y esta inactivo
    if (isset($row_data)&&$row_data!='') {
		$response["error"] = FALSE;
        $response["user"]["Nombre"]        = $row_data["Nombre"];
        $response["user"]["idMedico"]      = $row_data["idMedico"];
        $response["user"]["fonoMedico"]    = $row_data["Fono1"];
        $response["user"]["especialidad"]  = $row_data["Especialidad"];
        
        echo json_encode($response);
    //Si no hay datos envio mensaje de error
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "No se han encontrado personas";
        echo json_encode($response);
    }
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos no han sido ingresados";
    echo json_encode($response);
}


?>
