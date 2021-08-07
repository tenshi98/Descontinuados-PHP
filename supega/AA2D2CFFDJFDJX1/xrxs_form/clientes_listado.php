<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridClientead                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idCliente']) )        $idCliente          = $_POST['idCliente'];
	if ( !empty($_POST['idSistema']) )        $idSistema          = $_POST['idSistema'];
	if ( !empty($_POST['idEstado']) )         $idEstado           = $_POST['idEstado'];
	if ( !empty($_POST['idTipo']) )           $idTipo             = $_POST['idTipo'];
	if ( !empty($_POST['idSexo']) )           $idSexo             = $_POST['idSexo'];
	if ( !empty($_POST['email']) )            $email              = $_POST['email'];
	if ( !empty($_POST['Nombre']) )           $Nombre 	          = $_POST['Nombre'];
	if ( !empty($_POST['Edad']) )             $Edad 	          = $_POST['Edad'];
	if ( !empty($_POST['Rut']) )              $Rut 	              = $_POST['Rut'];
	if ( !empty($_POST['fNacimiento']) )      $fNacimiento 	      = $_POST['fNacimiento'];
	if ( !empty($_POST['Fono1']) )            $Fono1 	          = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )            $Fono2 	          = $_POST['Fono2'];
	if ( !empty($_POST['Departamento']) )     $Departamento       = $_POST['Departamento'];
	if ( !empty($_POST['Provincia']) )        $Provincia          = $_POST['Provincia'];
	if ( !empty($_POST['Distrito']) )         $Distrito           = $_POST['Distrito'];
	if ( !empty($_POST['Direccion']) )        $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['password']) )         $password           = $_POST['password'];
	if ( !empty($_POST['repassword']) )       $repassword         = $_POST['repassword'];
	if ( !empty($_POST['oldpassword']) )      $oldpassword        = $_POST['oldpassword'];
	if ( !empty($_POST['fcreacion']) )        $fcreacion          = $_POST['fcreacion'];
	if ( !empty($_POST['factualizacion']) )   $factualizacion     = $_POST['factualizacion'];
	if ( !empty($_POST['IMEI']) )             $IMEI               = $_POST['IMEI'];
	if ( !empty($_POST['GSM']) )              $GSM                = $_POST['GSM'];
	if ( !empty($_POST['Latitud']) )          $Latitud            = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) )         $Longitud           = $_POST['Longitud'];
	if ( !empty($_POST['dispositivo']) )      $dispositivo        = $_POST['dispositivo'];
	if ( !empty($_POST['Saldo']) )            $Saldo              = $_POST['Saldo'];
	if ( !empty($_POST['idUsuario']) )        $idUsuario          = $_POST['idUsuario'];
	if ( !empty($_POST['img']) )              $img                = $_POST['img'];
	if ( !empty($_POST['idProfesion']) )      $idProfesion        = $_POST['idProfesion'];
	if ( !empty($_POST['idDisponibilidad']) ) $idDisponibilidad   = $_POST['idDisponibilidad'];
	if ( !empty($_POST['Descripcion']) )      $Descripcion        = $_POST['Descripcion'];
	if ( !empty($_POST['nEstrellas']) )       $nEstrellas         = $_POST['nEstrellas'];
	
	if ( !empty($_POST['MontoReal']) )        $MontoReal          = $_POST['MontoReal'];
	if ( !empty($_POST['Monto']) )            $Monto              = $_POST['Monto'];




/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
			case 'idCliente':         if(empty($idCliente)){         $error['idCliente']          = 'error/No ha ingresado el id';}break;
			case 'idSistema':         if(empty($idSistema)){         $error['idSistema']          = 'error/No ha seleccionado el sistema';}break;
			case 'idEstado':          if(empty($idEstado)){          $error['idEstado']           = 'error/No ha seleccionado el Estado';}break;
			case 'idTipo':            if(empty($idTipo)){            $error['idTipo']             = 'error/No ha seleccionado el tipo de cliente';}break;
			case 'idSexo':            if(empty($idSexo)){            $error['idSexo']             = 'error/No ha seleccionado el sexo';}break;
			case 'email':             if(empty($email)){             $error['email']              = 'error/No ha ingresado el email';}break;
			case 'Nombre':            if(empty($Nombre)){            $error['Nombre']             = 'error/No ha ingresado el Nombre';}break;
			case 'Edad':              if(empty($Edad)){              $error['Edad']               = 'error/No ha ingresado la edad';}break;
			case 'Rut':               if(empty($Rut)){               $error['Rut']                = 'error/No ha ingresado el DNI';}break;	
			case 'fNacimiento':       if(empty($fNacimiento)){       $error['fNacimiento']        = 'error/No ha ingresado la fecha de nacimiento';}break;
			case 'Fono1':             if(empty($Fono1)){             $error['Fono1']              = 'error/No ha ingresado el telefono';}break;
			case 'Fono2':             if(empty($Fono2)){             $error['Fono2']              = 'error/No ha ingresado el telefono';}break;
			case 'Departamento':      if(empty($Departamento)){      $error['Departamento']       = 'error/No ha seleccionado la ciudad';}break;
			case 'Provincia':         if(empty($Provincia)){         $error['Provincia']          = 'error/No ha seleccionado la comuna';}break;
			case 'Distrito':          if(empty($Distrito)){          $error['Distrito']           = 'error/No ha seleccionado la comuna';}break;
			case 'Direccion':         if(empty($Direccion)){         $error['Direccion']          = 'error/No ha ingresado la cdireccion';}break;
			case 'password':          if(empty($password)){          $error['password']           = 'error/No ha ingresado una contraseña';}break;
			case 'repassword':        if(empty($repassword)){        $error['repassword']         = 'error/No ha ingresado la repeticion de la clave';}break;
			case 'oldpassword':       if(empty($oldpassword)){       $error['oldpassword']        = 'error/No ha ingresado su clave antigua';}break;
			case 'fcreacion':         if(empty($fcreacion)){         $error['fcreacion']          = 'error/No ha ingresado la fecha de creacion';}break;
			case 'factualizacion':    if(empty($factualizacion)){    $error['factualizacion']     = 'error/No ha ingresado la fecha de actualizacion';}break;
			case 'IMEI':              if(empty($IMEI)){              $error['IMEI']               = 'error/No ha ingresado el imei';}break;
			case 'GSM':               if(empty($GSM)){               $error['GSM']                = 'error/No ha ingresado el gsm';}break;
			case 'Latitud':           if(empty($Latitud)){           $error['Latitud']            = 'error/No ha ingresado la latitud';}break;
			case 'Longitud':          if(empty($Longitud)){          $error['Longitud']           = 'error/No ha ingresado la longitud';}break;
			case 'dispositivo':       if(empty($dispositivo)){       $error['dispositivo']        = 'error/No ha ingresado la longitud';}break;
			case 'Saldo':             if(empty($Saldo)){             $error['Saldo']              = 'error/No ha ingresado la longitud';}break;
			case 'idUsuario':         if(empty($idUsuario)){         $error['idUsuario']          = 'error/No ha ingresado la id del usuario';}break;
			case 'img':               if(empty($img)){               $error['img']                = 'error/No ha ingresado una imagen';}break;
			case 'idProfesion':       if(empty($idProfesion)){       $error['idProfesion']        = 'error/No ha seleccionado una profesion';}break;
			case 'idDisponibilidad':  if(empty($idDisponibilidad)){  $error['idDisponibilidad']   = 'error/No ha indicado la disponibilidad';}break;
			case 'Descripcion':       if(empty($Descripcion)){       $error['Descripcion']        = 'error/No ha ingresado una descripcion';}break;
			case 'nEstrellas':        if(empty($nEstrellas)){        $error['nEstrellas']         = 'error/No ha ingresado el numero de estrellas';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono1)){if(validarnumero($Fono1)) {        $error['Fono1']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Fono2)){if(validarnumero($Fono2)) {        $error['Fono2']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($password)&&isset($repassword)){
		if ( $password <> $repassword )      $error['password']     = 'error/Las contraseñas ingresadas no coinciden'; 
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':

			//Verifico otros datos
			
			//Se verifica si el dato existe
			/*if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM clientes_listado WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La nombre de la persona ya existe en el sistema';}*/
			
			// se verifica si el rut ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM clientes_listado WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El DNI ya existe en el sistema';}
			
			// se verifica si el correo ya existe
			if(isset($email)){
				$sql_email = mysql_query("SELECT email FROM clientes_listado WHERE email='".$email."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['email'] = 'error/El correo de ingresado ya existe en el sistema';}
			
			
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				$fcreacion       = fechahora_actual();    //Se obtiene la fecha actual
				$factualizacion  = fechahora_actual();    //Se obtiene la fecha actual
				
				//filtros
				if(isset($idSistema) && $idSistema != ''){                 $a  = "'".$idSistema."'" ;          }else{$a ="''";}
				if(isset($idEstado) && $idEstado != ''){                   $a .= ",'".$idEstado."'" ;          }else{$a .= ",''";}
				if(isset($idTipo) && $idTipo != ''){                       $a .= ",'".$idTipo."'" ;            }else{$a .= ",''";}
				if(isset($idSexo) && $idSexo != ''){                       $a .= ",'".$idSexo."'" ;            }else{$a .= ",''";}
				if(isset($email) && $email != ''){                         $a .= ",'".$email."'" ;             }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",'".$Nombre."'" ;            }else{$a .= ",''";}
				if(isset($Edad) && $Edad != ''){                           $a .= ",'".$Edad."'" ;              }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                             $a .= ",'".$Rut."'" ;               }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",'".$fNacimiento."'" ;       }else{$a .= ",''";}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",'".$Fono1."'" ;             }else{$a .= ",''";}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",'".$Fono2."'" ;             }else{$a .= ",''";}
				if(isset($Departamento) && $Departamento != ''){           $a .= ",'".$Departamento."'" ;      }else{$a .= ",''";}
				if(isset($Provincia) && $Provincia != ''){                 $a .= ",'".$Provincia."'" ;         }else{$a .= ",''";}
				if(isset($Distrito) && $Distrito != ''){                   $a .= ",'".$Distrito."'" ;          }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",'".$Direccion."'" ;         }else{$a .= ",''";}
				if(isset($password) && $password != ''){                   $a .= ",'".md5($password)."'" ;     }else{$a .= ",''";}
				if(isset($fcreacion) && $fcreacion != ''){                 $a .= ",'".$fcreacion."'" ;         }else{$a .= ",''";}
				if(isset($factualizacion) && $factualizacion != ''){       $a .= ",'".$factualizacion."'" ;    }else{$a .= ",''";}
				if(isset($IMEI) && $IMEI != ''){                           $a .= ",'".$IMEI."'" ;              }else{$a .= ",''";}
				if(isset($GSM) && $GSM != ''){                             $a .= ",'".$GSM."'" ;               }else{$a .= ",''";}
				if(isset($Latitud) && $Latitud != ''){                     $a .= ",'".$Latitud."'" ;           }else{$a .= ",''";}
				if(isset($Longitud) && $Longitud != ''){                   $a .= ",'".$Longitud."'" ;          }else{$a .= ",''";}
				if(isset($dispositivo) && $dispositivo != ''){             $a .= ",'".$dispositivo."'" ;       }else{$a .= ",''";}
				if(isset($Saldo) && $Saldo != ''){                         $a .= ",'".$Saldo."'" ;             }else{$a .= ",''";}
				if(isset($idUsuario) && $idUsuario != ''){                 $a .= ",'".$idUsuario."'" ;         }else{$a .= ",''";}
				if(isset($img) && $img != ''){                             $a .= ",'".$img."'" ;               }else{$a .= ",''";}
				if(isset($idProfesion) && $idProfesion != ''){             $a .= ",'".$idProfesion."'" ;       }else{$a .= ",''";}
				if(isset($idDisponibilidad) && $idDisponibilidad != ''){   $a .= ",'".$idDisponibilidad."'" ;  }else{$a .= ",''";}
				if(isset($Descripcion) && $Descripcion != ''){             $a .= ",'".$Descripcion."'" ;       }else{$a .= ",''";}
				if(isset($nEstrellas) && $nEstrellas != ''){               $a .= ",'".$nEstrellas."'" ;        }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_listado` (idSistema, idEstado, idTipo, idSexo, email, Nombre, Edad, Rut, fNacimiento, Fono1, Fono2, Departamento, 
				Provincia, Distrito, Direccion, password, fcreacion, factualizacion, IMEI, GSM, Latitud, Longitud, dispositivo, Saldo, idUsuario, img, idProfesion
				idDisponibilidad, Descripcion, nEstrellas) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				
				//
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'update':	
		
			//Verificacion de la contraseña
			if(isset($oldpassword)){
				$sql_email = mysql_query("SELECT password FROM clientes_listado WHERE idCliente='".$idCliente."' AND password='".md5($oldpassword)."' ");
				$n2 = mysql_num_rows($sql_email);
				if($n2 == 0) {$error['password'] = 'error/Las contraseñas ingresadas no coinciden';}
			}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idCliente='".$idCliente."'" ;
				if(isset($idSistema) && $idSistema != ''){                 $a .= ",idSistema='".$idSistema."'" ;}
				if(isset($idEstado) && $idEstado != ''){                   $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($idTipo) && $idTipo != ''){                       $a .= ",idTipo='".$idTipo."'" ;}
				if(isset($idSexo) && $idSexo != ''){                       $a .= ",idSexo='".$idSexo."'" ;}
				if(isset($email) && $email != ''){                         $a .= ",email='".$email."'" ;}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Edad) && $Edad != ''){                           $a .= ",Edad='".$Edad."'" ;}
				if(isset($Rut) && $Rut != ''){                             $a .= ",Rut='".$Rut."'" ;}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",fNacimiento='".$fNacimiento."'" ;}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",Fono1='".$Fono1."'" ;}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",Fono2='".$Fono2."'" ;}
				if(isset($Departamento) && $Departamento!= ''){            $a .= ",Departamento='".$Departamento."'" ;}
				if(isset($Provincia) && $Provincia!= ''){                  $a .= ",Provincia='".$Provincia."'" ;}
				if(isset($Distrito) && $Distrito!= ''){                    $a .= ",Distrito='".$Distrito."'" ;}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($password) && $password!= ''){                    $a .= ",password='".md5($password)."'" ;}
				if(isset($fcreacion) && $fcreacion!= ''){                  $a .= ",fcreacion='".$fcreacion."'" ;}
				if(isset($factualizacion) && $factualizacion!= ''){        $a .= ",factualizacion='".$factualizacion."'" ;}
				if(isset($IMEI) && $IMEI!= ''){                            $a .= ",IMEI='".$IMEI."'" ;}
				if(isset($GSM) && $GSM!= ''){                              $a .= ",GSM='".$GSM."'" ;}
				if(isset($Latitud) && $Latitud!= ''){                      $a .= ",Latitud='".$Latitud."'" ;}
				if(isset($Longitud) && $Longitud!= ''){                    $a .= ",Longitud='".$Longitud."'" ;}
				if(isset($dispositivo) && $dispositivo!= ''){              $a .= ",dispositivo='".$dispositivo."'" ;}
				if(isset($Saldo) && $Saldo!= ''){                          $a .= ",Saldo='".$Saldo."'" ;}
				if(isset($idUsuario) && $idUsuario!= ''){                  $a .= ",idUsuario='".$idUsuario."'" ;}
				if(isset($img) && $img!= ''){                              $a .= ",img='".$img."'" ;}
				if(isset($idProfesion) && $idProfesion!= ''){              $a .= ",idProfesion='".$idProfesion."'" ;}
				if(isset($idDisponibilidad) && $idDisponibilidad!= ''){    $a .= ",idDisponibilidad='".$idDisponibilidad."'" ;}
				if(isset($Descripcion) && $Descripcion!= ''){              $a .= ",Descripcion='".$Descripcion."'" ;}
				if(isset($nEstrellas) && $nEstrellas!= ''){                $a .= ",nEstrellas='".$nEstrellas."'" ;}

				
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	

						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_listado` WHERE idCliente = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
/*******************************************************************************************************************/
		case 'estado':	
		
			$idCliente  = $_GET['id'];
			$estado     = $_GET['estado'];
			$query  = "UPDATE clientes_listado SET idEstado = '$estado'	
			WHERE idCliente    = '$idCliente'";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location.'&edited=true' );
			die; 


		break;	
/*******************************************************************************************************************/
		case 'recarga':	
		
			//Actualizo monto
			if(isset($Saldo)&&$Saldo!=''){$nSaldo = $Saldo; }else{$nSaldo = 0;}
			$Nuevo_monto = $Monto + $nSaldo;
	
			$query  = "UPDATE clientes_listado SET Saldo = '{$Nuevo_monto}'	
			WHERE idCliente    = '{$idCliente}'";
			$result = mysql_query($query, $dbConn);
			
			//Guardo mi recarga
			$Fecha          = fecha_actual();
			$Ano            = ano_actual();
			$Mes            = mes_actual();
			if(isset($idCliente) && $idCliente != ''){   $a  = "'".$idCliente."'" ;   }else{$a  = "''";}
			if(isset($idUsuario) && $idUsuario != ''){   $a .= ",'".$idUsuario."'" ;  }else{$a .= ",''";}
			if(isset($MontoReal) && $MontoReal != ''){   $a .= ",'".$MontoReal."'" ;  }else{$a .= ",''";}
			if(isset($Monto) && $Monto != ''){           $a .= ",'".$Monto."'" ;      }else{$a .= ",''";}
			if(isset($Fecha) && $Fecha != ''){           $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
			if(isset($Ano) && $Ano != ''){               $a .= ",'".$Ano."'" ;        }else{$a .= ",''";}
			if(isset($Mes) && $Mes != ''){               $a .= ",'".$Mes."'" ;        }else{$a .= ",''";}
			
			$query  = "INSERT INTO `clientes_recargas` (idCliente, idUsuario, MontoReal, Monto, Fecha, Ano, idMes)VALUES ({$a})";
			$result = mysql_query($query, $dbConn);
			
		
			//Envio notificacion
			$query = "SELECT GSM, Nombre, dispositivo
			FROM `clientes_listado`
			WHERE idCliente = {$idCliente}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);


			//Se crean las variables
			$reg_id = $rowdata['GSM'];
			$msj = $rowdata['Nombre'].', Has recibido una recarga de '.$Monto.' Soles';
			
			if($rowdata['dispositivo']=='android'){
				
				
				//Envio el mensaje por android
				$apiKey = "AIzaSyDTfsctSuv4-zH8nMWB_lsDE7S_-AOX_kQ";
				$devices = array($reg_id);
	
				$gcpm = new GCMPushMessage($apiKey);
				$gcpm->setDevices($devices);
				$gcpm->send($msj, array('title' => 'Alerta'));

			} elseif($rowdata['dispositivo']=='iphone') {
				//Envio el mensaje por iphone
				//iosnoti( $reg_id, $msj );
			}
			
			// Recibo los datos a traves de post
			$idTipoAlerta     = 5;
			$idSubTipoAlerta  = 9;
			$Fecha            = fecha_actual();
			$Hora             = hora_actual();

			
			//Se almacena la alerta
			if(isset($idCliente) && $idCliente != ''){               $a  = "'".$idCliente."'" ;         }else{$a ="''";}
			if(isset($idTipoAlerta) && $idTipoAlerta != ''){         $a .= ",'".$idTipoAlerta."'" ;     }else{$a .= ",''";}
			if(isset($idSubTipoAlerta) && $idSubTipoAlerta != ''){   $a .= ",'".$idSubTipoAlerta."'" ;  }else{$a .= ",''";}
			if(isset($Fecha) && $Fecha != ''){                       $a .= ",'".$Fecha."'" ;            }else{$a .= ",''";}
			if(isset($Hora) && $Hora != ''){                         $a .= ",'".$Hora."'" ;             }else{$a .= ",''";}
			if(isset($Longitud) && $Longitud != ''){                 $a .= ",'".$Longitud."'" ;         }else{$a .= ",''";}
			if(isset($Latitud) && $Latitud != ''){                   $a .= ",'".$Latitud."'" ;          }else{$a .= ",''";}
				
			// inserto los datos de registro en la db
			$query  = "INSERT INTO `alertas_listado` (idCliente, idTipoAlerta, idSubTipoAlerta, Fecha, Hora, Longitud, Latitud) 
			VALUES ({$a} )";
			$result = mysql_query($query, $dbConn);
			//recibo el último id generado por mi sesion
			$ultimo_id = mysql_insert_id($dbConn);
	
	
			//Se registra el mensaje en la tabla de mensajes
			$a = "'".$ultimo_id."'" ;
			$a .= ",'".$idCliente."'" ;
			$a .= ",'".$msj."'" ;
			$a .= ",'1'" ;
			$a .= ",'".fecha_actual()."'" ;
			$a .= ",'".hora_actual()."'" ;
			$a .= ",'".$idTipoAlerta."'" ;
			$a .= ",'".$idSubTipoAlerta."'" ;
			$a .= ",''" ;
			$a .= ",'".$msj."'" ;
			
			$query  = "INSERT INTO `clientes_notificaciones` (idAlerta, idCliente, mensaje, idEstado, Fecha, Hora, idTipoAlerta, idSubTipoAlerta, Fono, Texto) VALUES ({$a} )";
			$result = mysql_query($query, $dbConn);
			

			header( 'Location: '.$location.'&edited=true' );
			die; 


		break;	
		
/*******************************************************************************************************************/
		//Cambia el nivel del permiso
		case 'submit_img':	

			if ($_FILES["imgLogo"]["error"] > 0){ 
				$error['imgLogo']     = 'error/Ha ocurrido un error'; 
			} else {
			  //Se verifican las extensiones de los archivos
			  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			  //Se verifica que el archivo subido no exceda los 100 kb
			  $limite_kb = 1000;
			  //Sufijo
			  $sufijo = 'usr_img_';
			  
			  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
				//Se especifica carpeta de destino
				$ruta = "upload/".$sufijo.$_FILES['imgLogo']['name'];
				//Se verifica que el archivo un archivo con el mismo nombre no existe
				if (!file_exists($ruta)){
				  //Se mueve el archivo a la carpeta previamente configurada
				  $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
				  if ($resultado){
					
					//Filtro para idSistema
					if ( !empty($_POST['idUsuario']) )    $idUsuario       = $_POST['idUsuario'];
					
					$a = "idUsuario='".$idUsuario."'" ;
					$a .= ",Direccion_img='".$sufijo.$_FILES['imgLogo']['name']."'" ;

					// inserto los datos de registro en la db
					$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
					$result = mysql_query($query, $dbConn);
					
					header( 'Location: '.$location );
					die;
					
					
				  } else {
					$error['imgLogo']     = 'error/Ocurrio un error al mover el archivo'; 
				  }
				} else {
				  $error['imgLogo']     = 'error/El archivo '.$_FILES['imgLogo']['name'].' ya existe'; 
				}
			  } else {
				$error['imgLogo']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
			  }
			}


		break;	
/*******************************************************************************************************************/
		//Cambia el nivel del permiso
		case 'del_img':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT Direccion_img
			FROM `usuarios_listado`
			WHERE idUsuario = {$arrUsuario['idUsuario']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Direccion_img'];
			//variables
			$a = "idUsuario='".$arrUsuario['idUsuario']."'" ;
			$a .= ",Direccion_img=''" ;

			if(unlink('upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '{$arrUsuario['idUsuario']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'?id_img=true' );
				die;

			}else{

				// actualizo los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '{$arrUsuario['idUsuario']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'?id_img=true' );
				die;

			} 


		break;	
/*******************************************************************************************************************/		
		case 'login':  
		//si no hay errores
		if ( empty($error) ) {
			
			// verificamos que los datos ingresados correspondan a un usuario
			if ( $arrCliente = esCliente($Rut,md5($password),$dbConn) ) {
					//Verifico si el usuario esta activo o inactivo
					if($arrCliente['idEstado']==1){
						
						// definimos las sesiones
						$_SESSION['Rut'] 	    = $arrCliente['Rut'];
						$_SESSION['password']	= $arrCliente['password'];
							

						// si todo esta bien te redirige hacia la pagina principal
						header( 'Location: '.$location );
						die;
						
					} else {
						// si el usuario esta inactivo reenvia a una pagina
						$error['idUsuario']   = 'error/Su usuario esta desactivado, Contactese con el administrador';
					}		
				//si no reconoce al usuario, envia un error	
				} else {
					$error['idUsuario']   = 'error/El nombre de usuario o contraseña no coinciden';
			}
		} 
		 break;						
/*******************************************************************************************************************/
	}
?>
