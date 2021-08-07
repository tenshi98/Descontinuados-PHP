<?php
    ini_set('display_errors',1);
    $mystring = dirname(__FILE__);
    require_once($mystring.'/../lib_pagoefectivo/code/configpe.php');
    $flag = true;
    if(!isset($_POST['data'])) $flag = false;

    if ($flag) {
        require_once($mystring.'/../lib_pagoefectivo/code/PagoEfectivo.php');
        require_once($mystring.'/../lib_pagoefectivo/code/be/be_notificacion.php');
        $pagoefectivo = new App_Service_PagoEfectivo();
        $estado = new BE_Notificacion();
        $data = $_POST['data'];

        //Para probar localmente
        //$data = '898B5B1DFB371B5D0A9BE5777684FF4A006351DDB5AAC92417F16FC7C6B1B6D3957B13A87711CB4861FA99F28C355D72F71005F3E40A14C8BF8228FC4A71A28DED449F8273E9A9D5945A26A758421737860D72116D6C673EFE9FF6EA8F0EF8749FF1D77F024FC942A3E7F4ED696A2B2E603DAAD9B9C9612B27010C3E8FBE83E7123AB8318764053E9E9017663F9695A302964FE7A39FED2420356F3D9070E30D0624B9C263230A031E0517FFD710A5DBCF1A11E60472AA69334EEF3E2B1BF2171D692DF9111272CDCB91C29112179E0C06472D6EBA58A27ACEE430F3662BD28825891A04AB84122EB12A9DCAEC33727B68A514B7920D305686708D8986FD0A54074CE43C9C8995834178E57A83938F666DC268F6A9A72450123AB8318764053EED77DD1F8C7D69E300C989E9BECCF3C364B147D2AF26A550123AB8318764053EB8A83A86AA87C84863B90D818FAAF9335E3F8B819863930C4E330F86147561A5C1AEDA041E3D1E1526BFC3E0BF80DD7104800FEDB9DE1F15E956834C19F0A8084548BB8163416D5E52CD7C4106356B3C6A3C8D858598E1E8FED87B3783A66B11D5E7CFD330BA8DE28F303C59EAA7D2E9AAFD7B6A4E9956B9169F7FF38BCA2973B5467DC5FDFC2C7EFA503BEAC92D42D3DBBAAC7615C0B241EAE74BCBEDFC133A3DF99DB18A30C4F6631D15BEB11B15A9528C3CED3A20F893AE4AAF912A07AE49FA6B28F9E0A1A1D8528C3CED3A20F893C1ACA6C25BE408512A6245A2372B8A408B4CCAB632703644E6A8ABFF23566A63FB9493FB74A6780B03B1E5561CE53D015B2B7DF2601072F6A69022101D8C400B64B17D50AA8E737BFB9493FB74A6780B102E3C5A835930711EE8D5771697063C13C95CAE44C28FE2C1E8E221EC125BF2C5D7F8CE5E1A917AB5467DC5FDFC2C7EDDEC966FB5C8C353691A304FFF54B91BEECBEA36635CB092C7F4EBF0141098BCF15EFB4CB2E0F05DB4CF68AA29129C613761586B2B9148519AD5CEC0988A1261AD8C56F17B26530FCF69DDC637ACE438D3346F4129C91D533761586B2B9148519AD5CEC0988A12613094A0A96FCA932581BD75C4A1C97FF5D90F4B7D1883D9D5110BA8E41B49E0429125CFB5CEBDDBDC92EC1F5917B40708C93CFA9BAFD0F319172C4F18735160E92D9C894B79AB5A017FA499F2E36FDA6813F87902602F55E379E7BC6B85DA9859C39E7442E1BF4B215023D8E4B7C3163057E24D906F6A37B913F87902602F55E3FED87B3783A66B1129A5747FF17A76206B4A5270F836219963B90D818FAAF93307BBCB94C842544C6CF59ACE15E3456FE75FC6C8CA6AFDA2017327E77F2F0298FED87B3783A66B11BEC5D70FA3DB7FF48BE2122087C8A4B853AC1E18BC9A96D7BEC5D70FA3DB7FF48BE2122087C8A4B8C9744DCD277FDDC3DD7C8AC026DB14FDFF2A96A09AEE688957E24D906F6A37B9F56F0F9F2E85B74CFED87B3783A66B117C2ADAD31D2485EB589951F6B9444BC200D3145211526D8CF324000DE55157B6FF2A96A09AEE6889A7FAAB2FDB13D0AC39D81BC15A87EF0D123AB8318764053E713CBA76C2A7CDA4A2B43D6995ECE07AFED87B3783A66B11E12557AD360B6422B4FAB2D7F4599E1FA0FF86E622B2CD6896A7D142A2B89A6E8152FC53232BA5541FD6CA0A8F18B388067C34188341CDB568A514B7920D305615CB02C562C11AD28BE2122087C8A4B853AC1E18BC9A96D7DD82BA032A7120097EA739120F8844A0B6B136001D8A33FD97DD7FB96FF41ACA221EB82BBD807716A19680BEC7830342C60D7306CCCA80686D2990764A870B4097DD7FB96FF41ACAFE6FF4F0626055DAE0FC4583CE2B94A719D6B5F1D3159B2BB0488CB5E9ACB3437EF6C5543AC6503AED82157DE1B9A492E7E9169D0E05F56875A2FE3FF47C1614FED87B3783A66B117D5A3F7EDB6A9652129D74509D253428EEDB945572916B6B666E77ED2C57A6616BE3DCB5239E63F3038286EF55BC84CF1ED73AA30FD8B3B361C77432A9519C0E7478B33FAD3C59CAEEDB945572916B6B07EBFD53EE2786A6D4D19F486B57F8BE39B1B8BDC6AA8E51EB224D8F295F8E277CA71E446DE3EED56381899E4FCF691F444344F28D9FE38704375F93627CC67CC66C6AAF59C8B9C5554CC68B54A8C82EFED87B3783A66B11A5C81F19BA46F129DDC6D7169AFF488C3907FDAD52FE99E1C1A906509F2163FCC3E0C55DF9F35B50200641A0462E98A338D24286570B3415123AB8318764053E7EF6C5543AC6503AFBEDC6EC7594A980FE6FF4F0626055DAE0FC4583CE2B94A7DEB7AEA51976A30B8819804E69EF8B2FC3B80D6C885522DC6C615C14BEAE1A09C7664C0834366C120125D81CF71AF067F30237C75EB80EBD0E86EE003A69F7C9C66C6AAF59C8B9C5EE9CB273B7B4AEE078A742178DFA88FD9854DD3EE194BE6F73240A85497A459653AC1E18BC9A96D7A7857A569F12B87CCC8A852E3DAB8D3A2EA2998F82A878A4C8EC13E88BFB585D2EA2998F82A878A463D6998C2470D570F8A35B807D8684F21B9C09C5FD4B51303B63B28D2C979F6CC438D0A80B02C4763149101C1515AA63E6A2F3108059B842F15EFB4CB2E0F05D71272D58C27BE07E9247A285BE1A66B1560C82C92BECBBB2286827C0D304434BEDC5F9AA8FBE15DECF69DDC637ACE438FF8168C5E49E25D39247A285BE1A66B1860D72116D6C673E7A1A87B6142DACADA5C2F50ECF25A4AB050F7CBB7D65F166A66D2539A20BF6DDFD8BFC32D477F4EAA12304F9C58B73CC8D66002C1B91E2DC0D04D35F25330A5169B72E69D5DC9C7371272D58C27BE07E04750CECD1F26651FED87B3783A66B116371D9A4DD0EBF61B098E33A504502098CF1EC4DF876DEC31B2A52FBBCE8DDDABCEDE4739670584DFED87B3783A66B11E7FE9B68808061A7BB3AEFDC3BF06ADA8FA0B7A676BB59BB8A3D796540CEF3859B2369BE68DEBF05E8382F32DD6BF11C17A339BB61CA9B555BC7F2DEF49F73B963D6998C2470D5705BC7F2DEF49F73B9C8EC13E88BFB585D2FAAFE409973BF497114811473D42FB9958D1E743179A54A6EB3E0D54085E533CF1A11E60472AA691FEB8D03C2BBFD7912CE5538A63ACB7F3D78A086870202D1|161E50808FE4544F65A02A7C84D86B9E6495F401C9F95A4E1EB49BCAA0E16A7CC48B1228B610ED0D73010995799B7FD7B79D831790B7C6C51D03820DADAF68FE4B833E17E78DAD94F60A9429C9E9D76ED191EA12764408BFFAE684ABC7DA9AD79384989761C4C4BEB442AF9E74826CA4251210DD31FA72A30B2D79EBB56D02C370BB11C9267FE4F28018FC4979DAA778C7FE35D884FAF93FCBBE5B1CF714E5DA2F5F46F7F3FB36E2DE085311B2EA679ADB18DF0C3CD41331363F34DA414A0C702F3C918A1715702CEE96150F80D6E1CA3377E8687FA2966878E1904B48D220E087700DCB1424364C89B3829D13C3D8F1B5162FD23C05CEEDAC06BB2E65CF8856';
        $paymentResponse = simplexml_load_string($pagoefectivo->desencriptarData($data));
        //obtengo la orden cip
        $ordenCip = $paymentResponse->CIP->NumeroOrdenPago;
        $ordenCip = trim($ordenCip, "0000000");
        $ordenCip = trim($ordenCip, "000000");
        $ordenCip = trim($ordenCip, "00000");
        
        //Conecto a la base de datos externa
		function conectar2 ($servidor, $usuario, $pass, $base) {
			$db_con = mysql_connect ($servidor,$usuario,$pass);
			if (!$db_con) return false; 
			if (!mysql_select_db ($base, $db_con)) return false;
			if (!mysql_query("SET NAMES 'utf8'")) return false;
			return $db_con; 
		}

        if($paymentResponse!=null){
           	
            switch ($paymentResponse->Estado) {
                case $estado->Extornado:
                        
                    //conecto con la base del sistema
					$dbConn1 = conectar2("localhost","root","petland","easy_pago");
					
					//Consulto la orden cip para obtener los otros datos necesarios
					$query = "SELECT idCliente, Monto, Fono
					FROM clientes_pago_efectivo  
					WHERE Cip='".$ordenCip."'";
					$resultado = mysql_query ($query, $dbConn1)or die(mysql_error());
					$rowcip = mysql_fetch_assoc ($resultado);
					
	
					
					if($rowcip){
						
						//actualizo el dato
						$query = "UPDATE clientes_pago_efectivo SET 
						Estado    = '3'
						WHERE Cip='".$ordenCip."'";
						$resultado_gcm = mysql_query ($query, $dbConn1)or die(mysql_error());
						
						// Recibo los datos a traves de post
						$idVendedor   = '1'; //no hay persona que realice la venta
						$idCliente    = $rowcip['idCliente'];
						$Monto        = $rowcip['Monto'];
						$Fono         = $rowcip['Fono'];
					   
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


						
						$dbConn2 = conectar2("190.98.210.37","userdbscl","petland","llappaperu");
						


						//Selecciono los datos del cliente a quien le estoy cargando datos
						$query = "SELECT dominio, usuario, gcm
						FROM sip  
						WHERE id_usuario='".$idCliente."'";
						$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
						$rowusr = mysql_fetch_assoc ($resultado);
						
						
						//se verifica caducidad
						$query = "SELECT * FROM cia  ";
						$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
						$rowusr_pre = mysql_fetch_assoc ($resultado);
						
						//Valido el monto con el cual se pago
						switch ($Monto) {

							case 5:  $puntosmas = $puntos_5;   $minutosmas = $minutos_5;  $foto = $rowusr_pre["foto_5"];  $video = $rowusr_pre["video_5"];  break;
							case 10: $puntosmas = $puntos_10;  $minutosmas = $minutos_10; $foto = $rowusr_pre["foto_10"]; $video = $rowusr_pre["video_10"]; break;
							case 20: $puntosmas = $puntos_20;  $minutosmas = $minutos_20; $foto = $rowusr_pre["foto_20"]; $video = $rowusr_pre["video_20"]; break;

						}

						//se toma la fecha
						$fecha_hoy = date('Y-m-j');
						$suma_dias= "+".$rowusr_pre["caducidad"]." day";
						$fecha_caduca = strtotime ( $suma_dias , strtotime ( $fecha_hoy ) ) ;
						$fecha_caduca = date ( 'Ymj' , $fecha_caduca );

						//se actualizan los puntos del usuario
						$query = "UPDATE sip SET 
						permiso_foto    = ".$foto.",
						permiso_grabar  = ".$video.",
						caduca          = '".$fecha_caduca."',
						puntos          = puntos-".$puntosmas." 
						WHERE id_usuario='".$idCliente."'";
						$resultado_gcm = mysql_query ($query, $dbConn2)or die(mysql_error());
						
						//$recargas_aaazu='insert into recargas_aaazu (id_usuario) values ('.$idCliente.')';
						$recargas_aaazu="insert into recargas_aaazu (id_usuario, monto, vendedor, descripcion) 
						values (".$idCliente.",".$puntosmas.",'Pago Efectivo', 'Datos entregados: CIP:".$ordenCip."')";
						$resul_anexosql=mysql_query($recargas_aaazu, $dbConn2);
						
						
						/*$dbConn3 = conectar2($rowusr["dominio"],"llappaphone","camdie00","asterisk");
						
						//se actualizan los puntos del usuario
						$query = "UPDATE users SET 
						monto_user = monto_user-".$minutosmas." 
						where extension='".$rowusr['usuario']."' ";
						$res2 = mysql_query ($query, $dbConn3)or die(mysql_error());*/
							
						
						
								
							
						//Se envia mensaje de recarga
						$collapseKey = $idCliente;
						$apiKey      = "AIzaSyAQ2evyHcN2j85vstAnyTxRf268AsEqTx8";
						$messageText = "AAAZU!! Tu recarga por ".$Monto." S/. fue reversada con exito. idmsg3";
						$fecha       = '';

						$userIdentificador = $rowusr["gcm"];
						$headers = array('Authorization:key=' . $apiKey);
						$data_and = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
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
						mysql_close($dbConn1);
						mysql_close($dbConn2);
						mysql_close($dbConn3);
						
						echo 'Estado: PENDIENTE DE PAGO';
						
					}else{
						echo 'Cip no encontrado';
					}    
                        
                        
                        
                        
                        
                    
                    
                    
                    break;

                case $estado->Pagado:#Pagado
                    
					//conecto con la base del sistema
					$dbConn1 = conectar2("localhost","root","petland","easy_pago");
					
					//Consulto la orden cip para obtener los otros datos necesarios
					$query = "SELECT idCliente, Monto, Fono
					FROM clientes_pago_efectivo  
					WHERE Cip='".$ordenCip."'";
					$resultado = mysql_query ($query, $dbConn1)or die(mysql_error());
					$rowcip = mysql_fetch_assoc ($resultado);
					
	
					
					if($rowcip){
						
						//actualizo el dato
						$query = "UPDATE clientes_pago_efectivo SET 
						Estado    = '2'
						WHERE Cip='".$ordenCip."'";
						$resultado_gcm = mysql_query ($query, $dbConn1)or die(mysql_error());
						
						// Recibo los datos a traves de post
						$idVendedor   = '1'; //no hay persona que realice la venta
						$idCliente    = $rowcip['idCliente'];
						$Monto        = $rowcip['Monto'];
						$Fono         = $rowcip['Fono'];
					   
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


						
						$dbConn2 = conectar2("190.98.210.37","userdbscl","petland","llappaperu");
						


						//Selecciono los datos del cliente a quien le estoy cargando datos
						$query = "SELECT dominio, usuario, gcm
						FROM sip  
						WHERE id_usuario='".$idCliente."'";
						$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
						$rowusr = mysql_fetch_assoc ($resultado);
						
						
						//se verifica caducidad
						$query = "SELECT * FROM cia  ";
						$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
						$rowusr_pre = mysql_fetch_assoc ($resultado);
						
						//Valido el monto con el cual se pago
						switch ($Monto) {

							case 5:  $puntosmas = $puntos_5;   $minutosmas = $minutos_5;  $foto = $rowusr_pre["foto_5"];  $video = $rowusr_pre["video_5"];  break;
							case 10: $puntosmas = $puntos_10;  $minutosmas = $minutos_10; $foto = $rowusr_pre["foto_10"]; $video = $rowusr_pre["video_10"]; break;
							case 20: $puntosmas = $puntos_20;  $minutosmas = $minutos_20; $foto = $rowusr_pre["foto_20"]; $video = $rowusr_pre["video_20"]; break;

						}

						//se toma la fecha
						$fecha_hoy = date('Y-m-j');
						$suma_dias= "+".$rowusr_pre["caducidad"]." day";
						$fecha_caduca = strtotime ( $suma_dias , strtotime ( $fecha_hoy ) ) ;
						$fecha_caduca = date ( 'Ymj' , $fecha_caduca );

						//se actualizan los puntos del usuario
						$query = "UPDATE sip SET 
						permiso_foto    = ".$foto.",
						permiso_grabar  = ".$video.",
						caduca          = '".$fecha_caduca."',
						puntos          = puntos+".$puntosmas." 
						WHERE id_usuario='".$idCliente."'";
						$resultado_gcm = mysql_query ($query, $dbConn2)or die(mysql_error());
						
						
						$dbConn3 = conectar2($rowusr["dominio"],"llappaphone","camdie00","asterisk");
						
						//se actualizan los puntos del usuario
						$query = "UPDATE users SET 
						monto_user = monto_user+".$minutosmas." 
						where extension='".$rowusr['usuario']."' ";
						$res2 = mysql_query ($query, $dbConn3)or die(mysql_error());
							
						//Inserto los datos de la venta
						$Fecha     = date('Y-m-j');
						$Ano       = date("Y");
						$Mes       = date("n");
						
						if(isset($idVendedor) && $idVendedor != ''){    $a  = "'".$idVendedor."'" ;  }else{$a  = "''";}
						if(isset($idCliente) && $idCliente != ''){      $a .= ",'".$idCliente."'" ;  }else{$a .= ",''";}
						if(isset($Monto) && $Monto != ''){              $a .= ",'".$Monto."'" ;      }else{$a .= ",''";}
						if(isset($Fecha) && $Fecha != ''){              $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
						if(isset($Fono) && $Fono != ''){                $a .= ",'".$Fono."'" ;       }else{$a .= ",''";}
						if(isset($Ano) && $Ano != ''){                  $a .= ",'".$Ano."'" ;        }else{$a .= ",''";}
						if(isset($Mes) && $Mes != ''){                  $a .= ",'".$Mes."'" ;        }else{$a .= ",''";}
						
						$query  = "INSERT INTO `clientes_ventas` (idCliente, idComprador, Monto, Fecha, Fono, Ano, idMes)VALUES ({$a})";
						$result = mysql_query($query, $dbConn1);
						
								
							
						//Se envia mensaje de recarga
						$collapseKey = $idCliente;
						$apiKey      = "AIzaSyAQ2evyHcN2j85vstAnyTxRf268AsEqTx8";
						$messageText = "AAAZU!! Tu recarga por ".$Monto." S/. fue realizada con exito. idmsg3";
						$fecha       = '';

						$userIdentificador = $rowusr["gcm"];
						$headers = array('Authorization:key=' . $apiKey);
						$data_and = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
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
						mysql_close($dbConn1);
						mysql_close($dbConn2);
						mysql_close($dbConn3);
						
						echo 'Estado: PAGADO';
						
					}else{
						echo 'Cip no encontrado';
					}
					
					     
                   
                break;

                case $estado->Expirado:#Cip Vencido Pendiente
                    
                    
					//conecto con la base del sistema
					$dbConn1 = conectar2("localhost","root","petland","easy_pago");
					
					//Consulto la orden cip para obtener los otros datos necesarios
					$query = "SELECT idCliente, Monto, Fono
					FROM clientes_pago_efectivo  
					WHERE Cip='".$ordenCip."'";
					$resultado = mysql_query ($query, $dbConn1)or die(mysql_error());
					$rowcip = mysql_fetch_assoc ($resultado);

					if($rowcip){
						
						//actualizo el dato
						$query = "UPDATE clientes_pago_efectivo SET 
						Estado    = '3'
						WHERE Cip='".$ordenCip."'";
						$resultado_gcm = mysql_query ($query, $dbConn1)or die(mysql_error());
						
						echo 'Estado: EXPIRADO';
						
					}else{
						echo 'Cip no encontrado';
					}
                    
                    
                    break;
                
                default: echo 'Estado: ERROR';
						 http_response_code(400);
						 header( "HTTP/1.1 400 Bad Request");
						 return;
            }
            

            
            

        }else{
			echo 'Estado: ERROR CONEXIÓN WEB SERVICE';
 		    http_response_code(401);
			header( "HTTP/1.1 401 ERROR CONEXIÓN WEB SERVICE");
	   }
   }else{
      echo 'Estado: ERROR PARAMETROS';
 	  http_response_code(402);
      header( "HTTP/1.1 402 ERROR PARAMETROS");
   }
?>
