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
if (isset($_POST['email']) && isset($_POST['password'])) {
	
	// Recibo los datos a traves de post
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $dispositivo  = $_POST['dispositivo'];
    $IMEI         = $_POST['IMEI'];
    $GSM          = $_POST['GSM'];
    

    //Encripto la clave
    $password = md5($password);
    
    /*********************************************************************/
    /*                              Usuario                              */
    /*********************************************************************/
    //busco los datos en la base de datos
	$query = "SELECT idCliente, idEstado, email, Nombre, Rut, fNacimiento, Direccion, Fono1, Fono2, Departamento, Provincia, 
	Distrito, fcreacion, factualizacion, Saldo
	FROM clientes_listado 
	WHERE email = '{$email}' AND password = '{$password}'";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
	//Actualizo los datos del usuario al loguearse
	if (isset($row_data)&&$row_data!='') {
		
		$a = "idCliente='".$row_data['idCliente']."'" ;
		if(isset($dispositivo) && $dispositivo != ''){   $a .= ",dispositivo='".$dispositivo."'" ;}
		if(isset($IMEI) && $IMEI != ''){                 $a .= ",IMEI='".$IMEI."'" ;}
		if(isset($GSM) && $GSM != ''){                   $a .= ",GSM='".$GSM."'" ;}
					
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '{$row_data['idCliente']}'";
		$result = mysql_query($query, $dbConn);	
	}
	
	
	
	/*********************************************************************/
    /*                         Importar Contactos                        */
    /*********************************************************************/
	//primero hay que verificar si el Contacto existe en el sistema mediante busqueda recursiva
	$arrContactos = array();
	$query = "SELECT 
	clientes_contactos.idContacto,
	clientes_contactos.Fono,
	(SELECT GSM FROM clientes_listado WHERE Fono1 LIKE '%clientes_contactos.Fono%' OR Fono2 LIKE '%clientes_contactos.Fono%' LIMIT 1 ) AS GSM,
	(SELECT idCliente FROM clientes_listado WHERE Fono1 LIKE '%clientes_contactos.Fono%' OR Fono2 LIKE '%clientes_contactos.Fono%' LIMIT 1 ) AS idClienteMain
	FROM `clientes_contactos`
	WHERE idCliente = '{$row_data['idCliente']}' AND Estado='No Registrado' AND GSM!=''";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrContactos,$row );
	}
	//Actualizo los contactos que se hayan registrado posteriormente a la invitacion
	foreach ($arrContactos as $contacto) {
		
		$query  = "UPDATE `clientes_contactos` SET Estado='Registrado', GSM='".$contacto['GSM']."' , idClienteMain='".$contacto['idClienteMain']."' 
		WHERE idContacto = '".$contacto['idContacto']."'";
		$result = mysql_query($query, $dbConn);
		
	}

	//Busco los contactos del cliente una vez actualizados sus contactos
	$arrContactos = array();
	$query = "SELECT Nombre, Fono, Estado, GSM, idClienteMain, TipoContacto
	FROM `clientes_contactos`
	WHERE idCliente = '{$row_data['idCliente']}' ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrContactos,$row );
	}
	
	
	
	
	/*********************************************************************/
    /*                           Importar Zonas                          */
    /*********************************************************************/
	//obtengo el listado con las zonas
	$arrZonas = array();
	$query = "SELECT 
	seguridad_zonas_listado.idZona,
	seguridad_zonas_listado.Nombre,
	seguridad_zonas_listado.ColorCode,
	seguridad_zonas_listado.Nivel_peligrosidad,
	seguridad_zonas_listado_puntos.Latitud,
	seguridad_zonas_listado_puntos.Longitud
	
	FROM `seguridad_zonas_listado`
	LEFT JOIN `seguridad_zonas_listado_puntos`  ON seguridad_zonas_listado_puntos.idZona = seguridad_zonas_listado.idZona 
	ORDER BY seguridad_zonas_listado.idZona ASC, seguridad_zonas_listado_puntos.Orden ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrZonas,$row );
	}
	
	
	/*********************************************************************/
    /*                Importar redes a las que pertenezco                */
    /*********************************************************************/
	//Selecciono datos del usuario
	$arrRedes = array();
	$query = "SELECT 
	clientes_listado.Nombre,
	clientes_listado.Fono1
	FROM clientes_contactos 
	LEFT JOIN clientes_listado ON clientes_listado.idCliente = clientes_contactos.idCliente
	WHERE clientes_contactos.idClienteMain = '{$row_data['idCliente']}'";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrRedes,$row );
	}


	//Si el usuario existe y esta activo
    if (isset($row_data)&&$row_data!=''&&$row_data["idEstado"]==1) {
        $response["error"] = FALSE;
        
        //obtengo los datos personales
        $response["user"]["idCliente"]      = $row_data["idCliente"];
        $response["user"]["email"]          = $row_data["email"];
        $response["user"]["Nombre"]         = $row_data["Nombre"];
        $response["user"]["Rut"]            = $row_data["Rut"];
        $response["user"]["fNacimiento"]    = $row_data["fNacimiento"];
        $response["user"]["Direccion"]      = $row_data["Direccion"];
        $response["user"]["Fono1"]          = $row_data["Fono1"];
        $response["user"]["Fono2"]          = $row_data["Fono2"];
        $response["user"]["Departamento"]   = $row_data["Departamento"];
        $response["user"]["Provincia"]      = $row_data["Provincia"];
        $response["user"]["Distrito"]       = $row_data["Distrito"];
        $response["user"]["fcreacion"]      = $row_data["fcreacion"];
        $response["user"]["factualizacion"] = $row_data["factualizacion"];
        $response["user"]["Saldo"]          = $row_data["Saldo"];
        
        //obtengo el listado de contactos del usuario
        $i=0;
        foreach ($arrContactos as $contacto) {
			$response["fonos"][$i]["name"]          = $contacto["Nombre"];
			$response["fonos"][$i]["phone_number"]  = $contacto["Fono"];
			$response["fonos"][$i]["estado"]        = $contacto["Estado"];
			$response["fonos"][$i]["gsm"]           = $contacto["GSM"];
			$response["fonos"][$i]["idcliente"]     = $contacto["idClienteMain"];
			$response["fonos"][$i]["TipoContacto"]  = $contacto["TipoContacto"];
			$i++;
		}
		
		//obtengo el listado de las zonas peligrosas
        $i=0;
        foreach ($arrZonas as $zona) {
			$response["zonas"][$i]["idZona"]         = $zona["idZona"];
			$response["zonas"][$i]["Nombre"]         = $zona["Nombre"];
			$response["zonas"][$i]["Peligrosidad"]   = $zona["Nivel_peligrosidad"];
			$response["zonas"][$i]["ColorCode"]      = $zona["ColorCode"];
			$response["zonas"][$i]["Latitud"]        = $zona["Latitud"];
			$response["zonas"][$i]["Longitud"]       = $zona["Longitud"];
			$i++;
		}
		
		//obtengo el listado de las redes a las que pertenezco
        $i=0;
        foreach ($arrRedes as $redes) {
			$response["redes"][$i]["Nombre"]  = $redes["Nombre"];
			$response["redes"][$i]["Fono"]    = $redes["Fono1"];
			$i++;
		}
		
        echo json_encode($response);
    //Si el usuario existe y esta inactivo
    } elseif (isset($row_data)&&$row_data!=''&&$row_data["idEstado"]==2) {
		$response["error"] = TRUE;
        $response["error_msg"] = "Su usuario se encuentra inactivo, favor de contactar con el administrador";
        echo json_encode($response);
    //Si no hay datos envio mensaje de error
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Email o contraseña erroneos, intentelo nuevamente";
        echo json_encode($response);
    }
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Email o contraseña requeridos no han sido ingresados";
    echo json_encode($response);
}


?>
