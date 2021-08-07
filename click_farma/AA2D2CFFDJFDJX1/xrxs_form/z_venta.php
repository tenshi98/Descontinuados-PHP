<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['Fono']) )         $Fono          = $_POST['Fono'];
	if ( !empty($_POST['Monto']) )        $Monto         = $_POST['Monto'];
	if ( !empty($_POST['idCliente']) )    $idCliente     = $_POST['idCliente'];
	if ( !empty($_POST['idVendedor']) )   $idVendedor    = $_POST['idVendedor'];
	if ( !empty($_POST['Valor']) )        $Valor         = $_POST['Valor'];

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'filtro':

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
			$query = "SELECT id_ejecutiv
			FROM ejecutivos  
			WHERE fono_ejecutiv LIKE '%$Fono%' LIMIT 1";
			$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
			$rowdata = mysql_fetch_assoc ($resultado);
	
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Genero el filtro
				$q = '?filter=true';
				if(isset($rowdata) && $rowdata != '') {       $q .= '&ejec='.$rowdata['id_ejecutiv']; }
				if(isset($Monto) && $Monto != '') {           $q .= '&mount='.$Monto ; }
				
				header( 'Location: vender_2.php'.$q );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'venta':	
		
			//Compruebo si recibi los datos
			if (isset($idVendedor)&&isset($idCliente)&&isset($Monto)) {
				
			   
			   //Conecto a la base de datos externa
				function conectar2 ($servidor, $usuario, $pass, $base) {
					$db_con = mysql_connect ($servidor,$usuario,$pass);
					if (!$db_con) return false; 
					if (!mysql_select_db ($base, $db_con)) return false;
					if (!mysql_query("SET NAMES 'utf8'")) return false;
					return $db_con; 
				}
			
			   //Selecciono los datos del cliente a quien le estoy cargando datos
				$query = "SELECT Saldo
				FROM clientes_listado  
				WHERE idCliente='".$idVendedor."'";
				$resultado = mysql_query ($query, $dbConn);
				$rowcliente = mysql_fetch_assoc ($resultado);
				
				$NuevoSaldo = $rowcliente['Saldo'] - $Valor;
				
				if($NuevoSaldo>0){
					
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

						case 1:  
							$puntosmas  = $rowusr_pre["puntos_5"];   
							$minutosmas = $rowusr_pre["minutos_5"];  
							$foto       = $rowusr_pre["foto_5"];  
							$video      = $rowusr_pre["video_5"]; 
							$submonto   = 5; 
						break;
						
						case 2: 
							$puntosmas  = $rowusr_pre["puntos_10"];  
							$minutosmas = $rowusr_pre["minutos_10"]; 
							$foto       = $rowusr_pre["foto_10"]; 
							$video      = $rowusr_pre["video_10"]; 
							$submonto   = 10; 
						break;
						
						case 3: 
							$puntosmas  = $rowusr_pre["puntos_20"];  
							$minutosmas = $rowusr_pre["minutos_20"]; 
							$foto       = $rowusr_pre["foto_20"]; 
							$video      = $rowusr_pre["video_20"]; 
							$submonto   = 20; 
						break;
						
						case 4:  
							$puntosmas  = $rowusr_pre["puntos_5_mas"];   
							$minutosmas = $rowusr_pre["minutos_5_mas"];  
							$foto       = $rowusr_pre["foto_5_mas"];  
							$video      = $rowusr_pre["video_5_mas"];  
							$submonto   = 5; 
						break;
						
						case 5: 
							$puntosmas  = $rowusr_pre["puntos_10_mas"];  
							$minutosmas = $rowusr_pre["minutos_10_mas"]; 
							$foto       = $rowusr_pre["foto_10_mas"]; 
							$video      = $rowusr_pre["video_10_mas"]; 
							$submonto   = 10; 
						break;
						
						case 6: 
							$puntosmas  = $rowusr_pre["puntos_20_mas"];  
							$minutosmas = $rowusr_pre["minutos_20_mas"]; 
							$foto       = $rowusr_pre["foto_20_mas"]; 
							$video      = $rowusr_pre["video_20_mas"]; 
							$submonto   = 20; 
						break;

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
					$Fecha          = fecha_actual();
					$Ano            = ano_actual();
					$Mes            = mes_actual();
					
					if(isset($idVendedor) && $idVendedor != ''){    $a  = "'".$idVendedor."'" ;  }else{$a  = "''";}
					if(isset($idCliente) && $idCliente != ''){      $a .= ",'".$idCliente."'" ;  }else{$a .= ",''";}
					if(isset($submonto) && $submonto != ''){        $a .= ",'".$submonto."'" ;   }else{$a .= ",''";}
					if(isset($Fecha) && $Fecha != ''){              $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
					if(isset($Fono) && $Fono != ''){                $a .= ",'".$Fono."'" ;       }else{$a .= ",''";}
					if(isset($Ano) && $Ano != ''){                  $a .= ",'".$Ano."'" ;        }else{$a .= ",''";}
					if(isset($Mes) && $Mes != ''){                  $a .= ",'".$Mes."'" ;        }else{$a .= ",''";}
					
					$query  = "INSERT INTO `clientes_ventas` (idCliente, idComprador, Monto, Fecha, Fono, Ano, idMes)VALUES ({$a})";
					$result = mysql_query($query, $dbConn);
					
			
					//Actualizo el valor de la venta en la bd
					$query  = "UPDATE clientes_listado SET Saldo = '{$NuevoSaldo}'	
					WHERE idCliente    = '{$idVendedor}'";
					$result = mysql_query($query, $dbConn);
							
						
					//Se envia mensaje de recarga
					$collapseKey = $idCliente;
					$apiKey      = "AIzaSyAQ2evyHcN2j85vstAnyTxRf268AsEqTx8";
					$messageText = "AAAZU!! Tu recarga por ".$submonto." S/. fue realizada con exito. idmsg3";
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
					mysql_close($dbConn2);
					mysql_close($dbConn3);
					
					header( 'Location: vender.php?sell=true' );
					die;

					
				}else{
					header( 'Location: '.$location.'&falta=true' );
					die;
				}
				
			//Mensaje de error en caso de que se ejecute el formulario sin los datos post
			} else {
				header( 'Location: '.$location.'&error=true' );
				die;
			}
		
		break;
/*******************************************************************************************************************/
	}
?>
