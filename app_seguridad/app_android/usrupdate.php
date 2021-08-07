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

	//Se toman en cuenta todos los datos
	if ( !empty($_POST['idCliente']) )        $idCliente          = $_POST['idCliente'];
	if ( !empty($_POST['idSistema']) )        $idSistema          = $_POST['idSistema'];
	if ( !empty($_POST['idEstado']) )         $idEstado           = $_POST['idEstado'];
	if ( !empty($_POST['idTipo']) )           $idTipo             = $_POST['idTipo'];
	if ( !empty($_POST['email']) )            $email              = $_POST['email'];
	if ( !empty($_POST['Nombre']) )           $Nombre 	          = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )              $Rut 	              = $_POST['Rut'];
	if ( !empty($_POST['fNacimiento']) )      $fNacimiento 	      = $_POST['fNacimiento'];
	if ( !empty($_POST['Direccion']) )        $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['Fono1']) )            $Fono1 	          = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )            $Fono2 	          = $_POST['Fono2'];
	if ( !empty($_POST['Departamento']) )     $Departamento       = $_POST['Departamento'];
	if ( !empty($_POST['Provincia']) )        $Provincia          = $_POST['Provincia'];
	if ( !empty($_POST['Distrito']) )         $Distrito           = $_POST['Distrito'];
	if ( !empty($_POST['unique_id']) )        $unique_id          = $_POST['unique_id'];
	if ( !empty($_POST['password']) )         $password           = $_POST['password'];
	if ( !empty($_POST['fcreacion']) )        $fcreacion          = $_POST['fcreacion'];
	if ( !empty($_POST['factualizacion']) )   $factualizacion     = $_POST['factualizacion'];
	if ( !empty($_POST['IMEI']) )             $IMEI               = $_POST['IMEI'];
	if ( !empty($_POST['GSM']) )              $GSM                = $_POST['GSM'];
	if ( !empty($_POST['Latitud']) )          $Latitud            = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) )         $Longitud           = $_POST['Longitud'];
	if ( !empty($_POST['dispositivo']) )      $dispositivo        = $_POST['dispositivo'];
	
	
	//se realizan las validaciones 
	//if(isset($Rut)){if(RutValidate($Rut)==0){            $errors["error"]='true';  $response["error_msg"] = 'El Rut ingresado no es valido'; }}
	if(isset($email)){if(validaremail($email)){ }else{   $errors["error"]='true';  $response["error_msg"] = 'El Email ingresado no es valido'; }}
	if(isset($Fono1)){if(validarnumero($Fono1)) {        $errors["error"]='true';  $response['error_msg'] = 'Ingrese un numero telefonico valido'; }}
	if(isset($Fono2)){if(validarnumero($Fono2)) {        $errors["error"]='true';  $response['error_msg'] = 'Ingrese un numero telefonico valido'; }}
	
	
	//Si no hay errores actualizo los datos
	if ( empty($errors) &&isset($email)&&isset($Nombre)&&isset($Rut)&&isset($Direccion)) {
		
		//Tomo la fecha actual
		$factualizacion = fecha_actual();
		
		//Filtros
		$a = "idCliente='".$idCliente."'" ;
		if(isset($idSistema) && $idSistema != ''){           $a .= ",idSistema='".$idSistema."'" ;}
		if(isset($idEstado) && $idEstado != ''){             $a .= ",idEstado='".$idEstado."'" ;}
		if(isset($idTipo) && $idTipo != ''){                 $a .= ",idTipo='".$idTipo."'" ;}
		if(isset($email) && $email != ''){                   $a .= ",email='".$email."'" ;}
		if(isset($Nombre) && $Nombre != ''){                 $a .= ",Nombre='".$Nombre."'" ;}
		if(isset($Rut) && $Rut != ''){                       $a .= ",Rut='".$Rut."'" ;}
		if(isset($fNacimiento) && $fNacimiento != ''){       $a .= ",fNacimiento='".$fNacimiento."'" ;}
		if(isset($Direccion) && $Direccion != ''){           $a .= ",Direccion='".$Direccion."'" ;}
		if(isset($Fono1) && $Fono1 != ''){                   $a .= ",Fono1='".$Fono1."'" ;}
		if(isset($Fono2) && $Fono2 != ''){                   $a .= ",Fono2='".$Fono2."'" ;}
		if(isset($Departamento) && $Departamento!= ''){      $a .= ",Departamento='".$Departamento."'" ;}
		if(isset($Provincia) && $Provincia!= ''){            $a .= ",Provincia='".$Provincia."'" ;}
		if(isset($Distrito) && $Distrito!= ''){              $a .= ",Distrito='".$Distrito."'" ;}
		if(isset($unique_id) && $unique_id!= ''){            $a .= ",unique_id='".$unique_id."'" ;}
		if(isset($password) && $password!= ''){              $a .= ",password='".$password."'" ;}
		if(isset($fcreacion) && $fcreacion!= ''){            $a .= ",fcreacion='".$fcreacion."'" ;}
		if(isset($factualizacion) && $factualizacion!= ''){  $a .= ",factualizacion='".$factualizacion."'" ;}
		if(isset($IMEI) && $IMEI!= ''){                      $a .= ",IMEI='".$IMEI."'" ;}
		if(isset($GSM) && $GSM!= ''){                        $a .= ",GSM='".$GSM."'" ;}
		if(isset($Latitud) && $Latitud!= ''){                $a .= ",Latitud='".$Latitud."'" ;}
		if(isset($Longitud) && $Longitud!= ''){              $a .= ",Longitud='".$Longitud."'" ;}
		if(isset($dispositivo) && $dispositivo!= ''){        $a .= ",dispositivo='".$dispositivo."'" ;}

				
		// actualizo los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
		$result = mysql_query($query, $dbConn);
		
		//Selecciono datos del usuario
		$query = "SELECT GSM
		FROM clientes_listado 
		WHERE idCliente = '$idCliente'";
		$resultado = mysql_query ($query, $dbConn);
		$row_data = mysql_fetch_assoc ($resultado);
		
		//Actualizo los contactos de los demas si mi numero existe en ellos
		if(isset($Fono1) && $Fono1 != ''){  
			$query  = "UPDATE `clientes_contactos` SET Estado='Registrado', GSM = '{$row_data["GSM"]}', idClienteMain = '{$idCliente}'
			WHERE Fono = '{$Fono1}' AND Estado='No Registrado' AND GSM!=''";
			$result = mysql_query($query, $dbConn);
		}
		if(isset($Fono2) && $Fono2 != ''){  
			$query  = "UPDATE `clientes_contactos` SET Estado='Registrado', GSM = '{$row_data["GSM"]}', idClienteMain = '{$idCliente}' 
			WHERE Fono = '{$Fono2}' AND Estado='No Registrado' AND GSM!=''";
			$result = mysql_query($query, $dbConn);
		}
		
		
		$response["error"] = FALSE;
		echo json_encode($response);
	//actualizo solo la posicion del cliente
	}elseif (isset($Latitud)&&isset($Longitud)&&isset($idCliente)) {
		
		//Tomo la fecha actual
		$factualizacion = fecha_actual();
		
		//Filtros
		$a = "idCliente='".$idCliente."'" ;
		if(isset($Latitud) && $Latitud!= ''){                 $a .= ",Latitud='".$Latitud."'" ;}
		if(isset($Longitud) && $Longitud!= ''){               $a .= ",Longitud='".$Longitud."'" ;}
		if(isset($factualizacion) && $factualizacion!= ''){   $a .= ",factualizacion='".$factualizacion."'" ;}
			
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
		$result = mysql_query($query, $dbConn);
		
		$response["error"] = FALSE;
		echo json_encode($response);
		
	//Si hay errores los muestro por pantalla			
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "No se ha podido actualizar la informacion";
		echo json_encode($response);
	
	}





?>
