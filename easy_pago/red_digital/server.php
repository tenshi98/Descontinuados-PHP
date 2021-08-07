<?php

//Conecto a la base de datos externa
function conectar2 ($servidor, $usuario, $pass, $base) {
	$db_con = mysql_connect ($servidor,$usuario,$pass);
	if (!$db_con) return false; 
	if (!mysql_select_db ($base, $db_con)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con; 
}	
	
// Validar cliente
function SearchClient($Fono){

	$dbConn2 = conectar2("190.98.210.37","userdbscl","petland","llappaperu");
	
	//Se consulta por el numero
	$query = "SELECT id_ejecutiv FROM ejecutivos WHERE fono_ejecutiv LIKE '%$Fono%'";
	$resultado = mysql_query ($query, $dbConn2);
	$row_data = mysql_num_rows ($resultado);
	
	if($row_data!=0){
		return "OK";
	}else{
		return "Usuario no registrado o numero telefonico mal ingresado";
	}
	
}

// Venta cliente
function SellClient($Fono, $Monto, $Cellid ){

	//Conexion a la base de datos del sistema
	$dbConn = conectar2("190.98.210.37","root","petland","easy_pago");
	$dbConn2 = conectar2("190.98.210.37","userdbscl","petland","llappaperu");

	//Se consulta por el numero telefonico 
	$query = "SELECT id_ejecutiv FROM ejecutivos WHERE fono_ejecutiv LIKE '%$Fono%'";
	$resultado = mysql_query ($query, $dbConn2);
	$row_data = mysql_num_rows ($resultado);
	$rowdata  = mysql_fetch_assoc ($resultado);
	
	//Selecciono un PIN desocupado
	$query = "SELECT id_pin FROM pin WHERE activacion=0 AND fecha_activacion='' AND imei=0 AND fecha_envio=0 AND valor='".$Monto."' LIMIT 1  ";
	$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
	$rowusr_pin = mysql_fetch_assoc ($resultado);
	$valorpin = mysql_num_rows ($resultado);
	
	
	if($Monto==0 OR $Monto=='') {        $error['monto']     = 'monto';return "No ha ingresado un monto";}
	if($row_data==0 OR $row_data=='') {  $error['row_data']  = 'monto';return "Usuario no registrado o numero telefonico mal ingresado";}
	if($Cellid==0 OR $Cellid=='') {      $error['Cellid']    = 'monto';return "No ha indicado la id del vendedor";}
	if($valorpin==0 OR $valorpin=='') {  $error['valorpin']  = 'monto';return "El valor indicado no corresponde a ningun PIN";}
			
		// si no hay errores ejecuto el codigo	
		if ( empty($error) ) {
			
			$idCliente    = $rowdata['id_ejecutiv'];
			$Fecha        = date('Y-m-j');
			$idPin    = $rowusr_pin['id_pin'];
			
			if(isset($Cellid) && $Cellid != ''){         $a  = "'".$Cellid."'" ;      }else{$a  = "''";}
			if(isset($idCliente) && $idCliente != ''){   $a .= ",'".$idCliente."'" ;  }else{$a .= ",''";}
			if(isset($Monto) && $Monto != ''){           $a .= ",'".$Monto."'" ;      }else{$a .= ",''";}
			if(isset($Fecha) && $Fecha != ''){           $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
			if(isset($Fono) && $Fono != ''){             $a .= ",'".$Fono."'" ;       }else{$a .= ",''";}
			if(isset($idPin) && $idPin != ''){           $a .= ",'".$idPin."'" ;      }else{$a .= ",''";}
			
			$query  = "INSERT INTO `clientes_red_digital` (idCliente, idComprador, Monto, Fecha, Fono, idPin)VALUES ({$a})";
			$result = mysql_query($query, $dbConn)or die(mysql_error());
			
			
			return 'OK';
			
	/*		
			// Recibo los datos a traves de post
			$idCliente    = $rowdata['id_ejecutiv'];

			//Se crean las variables
			$valor_existe   = 0;
			$valor_usr      = 0;
			$valor_invita   = 0;
			$valor_regsitro = 0;
			$puntos_5       = 5000;
			$puntos_10      = 10000;
			$puntos_15      = 15000;
			$puntos_20      = 20000;
			$puntos_25      = 25000;
			$puntos_30      = 30000;
			$minutos_5      = 1.88;
			$minutos_10     = 3.75;
			$minutos_15     = 5.63;
			$minutos_20     = 7.5;
			$minutos_25     = 9.5;
			$minutos_30     = 11.25;
			$valor_minutos  = 0.15;
			$completar      = 3000;
			$invitar        = 1000;

			//Selecciono los datos del cliente a quien le estoy cargando datos
			$query = "SELECT dominio, usuario, gcm
			FROM sip  
			WHERE id_usuario='".$idCliente."'";
			$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
			$rowusr = mysql_fetch_assoc ($resultado);
			
			//Valido el monto con el cual se pago
			switch ($Monto) {

				case 5:  $puntosmas = $puntos_5;   $minutosmas = $minutos_5;   break;
				case 10: $puntosmas = $puntos_10;  $minutosmas = $minutos_10;  break;
				case 15: $puntosmas = $puntos_15;  $minutosmas = $minutos_15;  break;
				case 20: $puntosmas = $puntos_20;  $minutosmas = $minutos_20;  break;
				case 25: $puntosmas = $puntos_25;  $minutosmas = $minutos_25;  break;
				case 30: $puntosmas = $puntos_30;  $minutosmas = $minutos_30;  break;

			}
			
			
			//se verifica caducidad
			$query = "SELECT caducidad FROM cia ";
			$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
			$rowusr_pre = mysql_fetch_assoc ($resultado);
			
			//se toma la fecha
			$fecha_hoy = date('Y-m-j');
			$suma_dias= "+".$rowusr_pre["caducidad"]." day";
			$fecha_caduca = strtotime ( $suma_dias , strtotime ( $fecha_hoy ) ) ;
			$fecha_caduca = date ( 'Ymj' , $fecha_caduca );

			//se actualizan los puntos del usuario
			$query = "UPDATE sip SET 
			caduca = '".$fecha_caduca."',
			puntos = puntos+".$puntosmas." 
			WHERE id_usuario='".$idCliente."'";
			$resultado_gcm = mysql_query ($query, $dbConn2)or die(mysql_error());
			
			
	
			$dbConn3 = conectar2($rowusr["dominio"],"llappaphone","camdie00","asterisk");
			
			//se guarda el saldo del usuario
			$query = "SELECT monto_user FROM users where extension='".$rowusr['usuario']."' ";
			$resultado = mysql_query ($query, $dbConn3)or die(mysql_error());
			$rowusr_min = mysql_fetch_assoc ($resultado);
			
			$nmin = $rowusr_min['monto_user']+$minutosmas;
			//se actualizan los puntos del usuario
			$query = "UPDATE users SET monto_user = ".$nmin." where extension='".$rowusr['usuario']."' ";
			$res2 = mysql_query ($query, $dbConn3)or die(mysql_error());
			
			
			
			//Se actualizan los datos del PIN
			$query = "UPDATE pin SET 
				activacion       = 1, 
				fecha_envio      = '".$fecha_hoy."', 
				fecha_venta      = '".$fecha_hoy."', 
				fecha_activacion = '".$fecha_hoy."', 
				imei             = '".$rowusr['usuario']."', 
				puntodeventa='".$Cellid."'
			WHERE id_pin='".$rowusr_pin['id_pin']."' ";
			$res2 = mysql_query ($query, $dbConn2)or die(mysql_error());
			
			
		
			//Se envia mensaje de recarga
			$collapseKey = $idCliente;
			$apiKey      = "AIzaSyAQ2evyHcN2j85vstAnyTxRf268AsEqTx8";
			$messageText = "AAAZU!! Tu recarga por ".$Monto." S/. fue realizada con exito. idmsg3";
			$fecha       = '';

			$userIdentificador = $rowusr["gcm"];
			$headers = array('Authorization:key='.$apiKey);
			$data_and = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			
			if ($headers) {	
										
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_and);
				$response = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);
			}

			//se cierran las conexiones a la base de datos
			mysql_close($dbConn2);
			mysql_close($dbConn3);
			* 
			* */
		
			
			
		}	
	
}

// Validar cliente
function Reprint($Cellid){

	$dbConn = conectar2("190.98.210.37","root","petland","easy_pago");
	
	if($Cellid==0 OR $Cellid=='') {  $error['monto']  = 'monto';return "No ha indicado la id del vendedor";}
	
	// si no hay errores ejecuto el codigo	
	if ( empty($error) ) {
		//Selecciono un PIN ya creado
		$query = "SELECT idVentas, idCliente, idComprador, Monto, Fecha, Fono, idPin
		FROM `clientes_red_digital`
		WHERE idCliente = '{$Cellid}'
		ORDER BY idVentas DESC 
		LIMIT 1";
		$resultado = mysql_query ($query, $dbConn)or die(mysql_error());
		$rowusr_pin = mysql_num_rows ($resultado);
		$rr = mysql_fetch_assoc ($resultado);
				

		if($rowusr_pin!=0){
			return 'Datos: idVentas='.$rr["idVentas"].'-vendedor='.$rr["idCliente"].'comprador='.$rr["idComprador"].'-Monto='.$rr["Monto"].'-Fono='.$rr["Fono"].'-idPin='.$rr["idPin"];
		}else{
			return "No existen datos";
		}	
	}
	
	
}

// Borrar Venta
function DellSell($Cellid){

	$dbConn = conectar2("190.98.210.37","root","petland","easy_pago");
	
	if($Cellid==0 OR $Cellid=='') {  $error['monto']  = 'monto';return "No ha indicado la id del vendedor";}
	
	// si no hay errores ejecuto el codigo	
	if ( empty($error) ) {
		
		//Selecciono un PIN ya creado
		$query = "SELECT idVentas
		FROM `clientes_red_digital`
		WHERE idCliente = '{$Cellid}'
		ORDER BY idVentas DESC 
		LIMIT 1";
		$resultado = mysql_query ($query, $dbConn)or die(mysql_error());
		$rowusr_pin = mysql_num_rows ($resultado);
		$rr = mysql_fetch_assoc ($resultado);
		
		
		//se borran los permisos del usuario
		$query  = "DELETE FROM `clientes_red_digital` WHERE idVentas = '{$rr["idVentas"]}' ";
		$result = mysql_query($query, $dbConn);


		if($result){
			return 'Datos reversados correctamente';
		}else{
			return "No se han podido reversar los datos";
		}
		
	}
	
	
}

// Create SoapServer object using WSDL file.
// For the simplicity, our SoapServer is set to operate in non-WSDL mode. So we do not need a WSDL file
$server = new SoapServer(null, array('uri'=>'http://rdigital.naturalphone.com.pe'));
// Add AddHello() function to the SoapServer using addFunction()
$server->addFunction("SearchClient");
$server->addFunction("SellClient");
$server->addFunction("Reprint");
$server->addFunction("DellSell");
// To process the request, call handle() method of SoapServer.
$server->handle();


?> 

