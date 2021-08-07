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
	
	
	if($Monto==0 OR $Monto=='') {        $error['error']  = 'No ha ingresado un monto';}
	if($row_data==0 OR $row_data=='') {  $error['error']  = 'Usuario no registrado o numero telefonico mal ingresado';}
	if($Cellid==0 OR $Cellid=='') {      $error['error']  = 'No ha indicado la id de Cell Power';}
	if($valorpin==0 OR $valorpin=='') {  $error['error']  = 'El valor indicado no corresponde a ningun PIN';}
			
		// si no hay errores ejecuto el codigo	
		if ( empty($error) ) {
			
			// Recibo los datos a traves de post
			$idCliente    = $rowdata['id_ejecutiv'];

			//Se crean las variables
			$valor_existe   = 0;
			$valor_usr      = 0;
			$valor_invita   = 0;
			$valor_regsitro = 0;
			$puntos_5       = 5;
			$puntos_10      = 10;
			$puntos_15      = 15;
			$puntos_20      = 20;
			$puntos_25      = 25;
			$puntos_30      = 30;
			$minutos_5      = 1.88;
			$minutos_10     = 3.75;
			$minutos_15     = 5.63;
			$minutos_20     = 7.5;
			$minutos_25     = 9.5;
			$minutos_30     = 11.25;
			$valor_minutos  = 0.15;
			$completar      = 0;
			$invitar        = 0;

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
			
			//$recargas_aaazu='insert into recargas_aaazu (id_usuario) values ('.$idCliente.')';
			$recargas_aaazu="insert into recargas_aaazu (id_usuario, monto, vendedor, descripcion) 
					values (".$idCliente.",".$puntosmas.",'Cell Power', 'Datos entregados: 1.-Fono:".$Fono." 2.-Monto:".$Monto." 3.-Cellpower id:".$Cellid."')";
			$resul_anexosql=mysql_query($recargas_aaazu, $dbConn2);
			
	
			/*$dbConn3 = conectar2($rowusr["dominio"],"llappaphone","camdie00","asterisk");
			
			//se guarda el saldo del usuario
			$query = "SELECT monto_user FROM users where extension='".$rowusr['usuario']."' ";
			$resultado = mysql_query ($query, $dbConn3)or die(mysql_error());
			$rowusr_min = mysql_fetch_assoc ($resultado);
			
			$nmin = $rowusr_min['monto_user']+$minutosmas;
			//se actualizan los puntos del usuario
			$query = "UPDATE users SET monto_user = ".$nmin." where extension='".$rowusr['usuario']."' ";
			$res2 = mysql_query ($query, $dbConn3)or die(mysql_error());*/
			
			
			
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
			
			
			
			
			//Inserto los datos de la venta
			$dbConn = conectar2("localhost","root","petland","easy_pago");
			$puntodeventa  = $Cellid;
			$Fecha         = $fecha_hoy;
			$idPin         = $rowusr_pin['id_pin'];
			
			if(isset($puntodeventa) && $puntodeventa != ''){  $a  = "'".$puntodeventa."'" ;  }else{$a  = "''";}
			if(isset($Monto) && $Monto != ''){                $a .= ",'".$Monto."'" ;        }else{$a .= ",''";}
			if(isset($Fecha) && $Fecha != ''){                $a .= ",'".$Fecha."'" ;        }else{$a .= ",''";}
			if(isset($idPin) && $idPin != ''){                $a .= ",'".$idPin."'" ;        }else{$a .= ",''";}
			if(isset($Fono) && $Fono != ''){                  $a .= ",'".$Fono."'" ;         }else{$a .= ",''";}
			
			$query  = "INSERT INTO `clientes_cell_power` (puntodeventa, Monto, Fecha, idPin, Fono)VALUES ({$a})";
			$result = mysql_query($query, $dbConn);
	
	
		
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
			//mysql_close($dbConn3);
		
			return "OK";
			
		}else{
			
			//Inserto los datos de la venta
			$dbConn = conectar2("localhost","root","petland","easy_pago");
			$puntodeventa  = $Cellid;
			$Fecha         = date('Y-m-j');
			
			
			if(isset($puntodeventa) && $puntodeventa != ''){     $a  = "'".$puntodeventa."'" ;     }else{$a  = "''";}
			if(isset($Monto) && $Monto != ''){                   $a .= ",'".$Monto."'" ;           }else{$a .= ",''";}
			if(isset($Fecha) && $Fecha != ''){                   $a .= ",'".$Fecha."'" ;           }else{$a .= ",''";}
			if(isset($error['error']) && $error['error'] != ''){ $a .= ",'".$error['error']."'" ;  }else{$a .= ",''";}

			
			$query  = "INSERT INTO `clientes_cell_power` (puntodeventa, Monto, Fecha, Mensaje)VALUES ({$a})";
			$result = mysql_query($query, $dbConn);
			
			return $error['error'];
		}	
	
}

// Validar cliente
function Reprint($Cellid){

	$dbConn = conectar2("localhost","root","petland","easy_pago");
	
	if($Cellid==0 OR $Cellid=='') {  $error['monto']  = 'monto';return "No ha indicado la id";}
	
	// si no hay errores ejecuto el codigo	
	if ( empty($error) ) {
		
		//Selecciono un PIN ya creado
		$query = "SELECT puntodeventa, Monto, Fecha, idPin, Mensaje FROM clientes_cell_power WHERE puntodeventa = '{$Cellid}' LIMIT 1";
		$resultado = mysql_query ($query, $dbConn)or die(mysql_error());
		$rowusr_pin = mysql_num_rows ($resultado);
		$rr = mysql_fetch_assoc ($resultado);
		
		if(isset($rr["Mensaje"])&&$rr["Mensaje"]!=''){
			$response["result"]        = $rr["Mensaje"];
		}else{
			$response["result"]        = 'OK';
			$response["puntodeventa"]  = $rr["puntodeventa"];
			$response["Monto"]         = $rr["Monto"];
			$response["Fecha"]         = $rr["Fecha"];
			$response["idPin"]         = $rr["idPin"];
		}
		

		if($rowusr_pin>0){
			return $response;
		}else{
			$response["result"]        = 'NOEXIST';
			$response["puntodeventa"]  = 'NOEXIST';
			$response["Monto"]         = 'NOEXIST';
			$response["Fecha"]         = 'NOEXIST';
			$response["idPin"]         = 'NOEXIST';
			return $response;
			
		}
		
	}
	
	
	
}

// Create SoapServer object using WSDL file.
// For the simplicity, our SoapServer is set to operate in non-WSDL mode. So we do not need a WSDL file
$server = new SoapServer(null, array('uri'=>'http://cpower.naturalphone.com.pe'));
// Add AddHello() function to the SoapServer using addFunction().
$server->addFunction("SearchClient");
$server->addFunction("SellClient");
$server->addFunction("Reprint");
// To process the request, call handle() method of SoapServer.
$server->handle();


?> 

