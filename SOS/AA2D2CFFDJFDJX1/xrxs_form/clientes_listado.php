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
	if ( !empty($_POST['fcreacion']) )        $fcreacion          = $_POST['fcreacion'];
	if ( !empty($_POST['usuario']) )          $usuario            = $_POST['usuario'];
	if ( !empty($_POST['password']) )         $password           = $_POST['password'];
	if ( !empty($_POST['idTipoCliente']) )    $idTipoCliente      = $_POST['idTipoCliente'];
	if ( !empty($_POST['Estado']) )           $Estado             = $_POST['Estado'];
	if ( !empty($_POST['email']) )            $email              = $_POST['email'];
	if ( !empty($_POST['Nombre']) )           $Nombre 	          = $_POST['Nombre'];
	if ( !empty($_POST['Apellido_Paterno']) ) $Apellido_Paterno   = $_POST['Apellido_Paterno'];
	if ( !empty($_POST['Apellido_Materno']) ) $Apellido_Materno   = $_POST['Apellido_Materno'];
	if ( !empty($_POST['Rut']) )              $Rut 	              = $_POST['Rut'];
	if ( !empty($_POST['Sexo']) )             $Sexo 	          = $_POST['Sexo'];
	if ( !empty($_POST['fNacimiento']) )      $fNacimiento 	      = $_POST['fNacimiento'];
	if ( !empty($_POST['Direccion']) )        $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['Fono1']) )            $Fono1 	          = $_POST['Fono1'];
	if ( !empty($_POST['Fono2']) )            $Fono2 	          = $_POST['Fono2'];
	if ( !empty($_POST['Url_imagen']) )       $Url_imagen         = $_POST['Url_imagen'];
	if ( !empty($_POST['Pais']) )             $Pais               = $_POST['Pais'];
	if ( !empty($_POST['idCiudad']) )         $idCiudad           = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )         $idComuna           = $_POST['idComuna'];
	if ( !empty($_POST['Ultimo_acceso']) )    $Ultimo_acceso      = $_POST['Ultimo_acceso'];
	if ( !empty($_POST['primer_ingreso']) )   $primer_ingreso     = $_POST['primer_ingreso'];
	if ( !empty($_POST['Imei']) )             $Imei               = $_POST['Imei'];
	if ( !empty($_POST['Gsm']) )              $Gsm                = $_POST['Gsm'];
	if ( !empty($_POST['Latitud']) )          $Latitud            = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) )         $Longitud           = $_POST['Longitud'];
	if ( !empty($_POST['Radio']) )            $Radio              = $_POST['Radio'];
	if ( !empty($_POST['Alarma']) )           $Alarma             = $_POST['Alarma'];
	if ( !empty($_POST['EstadoCarrera']) )    $EstadoCarrera      = $_POST['EstadoCarrera'];
	if ( !empty($_POST['dispositivo']) )      $dispositivo        = $_POST['dispositivo'];
	if ( !empty($_POST['create_pass']) )      $create_pass        = $_POST['create_pass'];
	if ( !empty($_POST['idPropietario']) )    $idPropietario      = $_POST['idPropietario'];
	if ( !empty($_POST['idRecorrido']) )      $idRecorrido        = $_POST['idRecorrido'];
	if ( !empty($_POST['idRuta']) )           $idRuta             = $_POST['idRuta'];
	if ( !empty($_POST['Orden']) )            $Orden              = $_POST['Orden'];
	if ( !empty($_POST['idConductor']) )      $idConductor        = $_POST['idConductor'];
	if ( !empty($_POST['PPU']) )              $PPU                = $_POST['PPU'];
	if ( !empty($_POST['idMarca']) )          $idMarca            = $_POST['idMarca'];
	if ( !empty($_POST['idModelo']) )         $idModelo           = $_POST['idModelo'];
	if ( !empty($_POST['idTransmision']) )    $idTransmision      = $_POST['idTransmision'];
	if ( !empty($_POST['fTransferencia']) )   $fTransferencia     = $_POST['fTransferencia'];
	if ( !empty($_POST['idColorV_1']) )       $idColorV_1         = $_POST['idColorV_1'];
	if ( !empty($_POST['idColorV_2']) )       $idColorV_2         = $_POST['idColorV_2'];
	if ( !empty($_POST['fFabricacion']) )     $fFabricacion       = $_POST['fFabricacion'];
	if ( !empty($_POST['N_Motor']) )          $N_Motor            = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )         $N_Chasis           = $_POST['N_Chasis'];
	if ( !empty($_POST['Obs']) )              $Obs                = $_POST['Obs'];
	if ( !empty($_POST['idDisponibilidad']) ) $idDisponibilidad   = $_POST['idDisponibilidad'];
	
	if ( !empty($_POST['rango_a']) ) $rango_a   = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) ) $rango_b   = $_POST['rango_b'];

	
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
			case 'idCliente':         if(empty($idCliente)){         $error['idCliente']          = 'error/No ha ingresado el idCliente del sistema';}break;
			case 'fcreacion':         if(empty($fcreacion)){         $error['fcreacion']          = 'error/No ha ingresado el fcreacion del sistema';}break;
			case 'usuario':           if(empty($usuario)){           $error['usuario']            = 'error/No ha ingresado la imagen';}break;
			case 'password':          if(empty($password)){          $error['password']           = 'error/No ha ingresado el email';}break;
			case 'idTipoCliente':     if(empty($idTipoCliente)){     $error['idTipoCliente']      = 'error/No ha ingresado la razon social';}break;
			case 'Estado':            if(empty($Estado)){            $error['Estado']             = 'error/No ha ingresado el Estado';}break;
			case 'email':             if(empty($email)){             $error['email']              = 'error/No ha ingresado la email';}break;
			case 'Nombre':            if(empty($Nombre)){            $error['Nombre']             = 'error/No ha ingresado el Nombre';}break;
			case 'Apellido_Paterno':  if(empty($Apellido_Paterno)){  $error['Apellido_Paterno']   = 'error/No ha ingresado el Apellido_Paterno';}break;
			case 'Apellido_Materno':  if(empty($Apellido_Materno)){  $error['Apellido_Materno']   = 'error/No ha ingresado la Apellido_Materno';}break;
			case 'Rut':               if(empty($Rut)){               $error['Rut']                = 'error/No ha ingresado el Rut';}break;	
			case 'Sexo':              if(empty($Sexo)){              $error['Sexo']               = 'error/No ha ingresado la carpeta de imagenes';}break;
			case 'fNacimiento':       if(empty($fNacimiento)){       $error['fNacimiento']        = 'error/No ha ingresado la carpeta de mp3';}break;
			case 'Direccion':         if(empty($Direccion)){         $error['Direccion']          = 'error/No ha ingresado la carpeta de vidClienteeos';}break;
			case 'Fono1':             if(empty($Fono1)){             $error['Fono1']              = 'error/No ha ingresado la web de vidClienteeos';}break;
			case 'Fono2':             if(empty($Fono2)){             $error['Fono2']              = 'error/No ha ingresado la web de vidClienteeos';}break;
			case 'Url_imagen':        if(empty($Url_imagen)){        $error['Url_imagen']         = 'error/No ha ingresado la web de vidClienteeos';}break;
			case 'Pais':              if(empty($Pais)){              $error['Pais']               = 'error/No ha ingresado la web de talento';}break;
			case 'idCiudad':          if(empty($idCiudad)){          $error['idCiudad']           = 'error/No ha ingresado la web de talento';}break;
			case 'idComuna':          if(empty($idComuna)){          $error['idComuna']           = 'error/No ha ingresado la web de talento';}break;
			case 'Ultimo_acceso':     if(empty($Ultimo_acceso)){     $error['Ultimo_acceso']      = 'error/No ha ingresado la web de talento';}break;
			case 'primer_ingreso':    if(empty($primer_ingreso)){    $error['primer_ingreso']     = 'error/No ha ingresado la web de talento';}break;
			case 'Imei':              if(empty($Imei)){              $error['Imei']               = 'error/No ha ingresado la web de talento';}break;
			case 'Gsm':               if(empty($Gsm)){               $error['Gsm']                = 'error/No ha ingresado la web de talento';}break;
			case 'Latitud':           if(empty($Latitud)){           $error['Latitud']            = 'error/No ha ingresado la web de talento';}break;
			case 'Longitud':          if(empty($Longitud)){          $error['Longitud']           = 'error/No ha ingresado la web de talento';}break;
			case 'Radio':             if(empty($Radio)){             $error['Radio']              = 'error/No ha ingresado la web de talento';}break;
			case 'Alarma':            if(empty($Alarma)){            $error['Alarma']             = 'error/No ha ingresado la web de talento';}break;
			case 'EstadoCarrera':     if(empty($EstadoCarrera)){     $error['EstadoCarrera']      = 'error/No ha ingresado la web de talento';}break;
			case 'dispositivo':       if(empty($dispositivo)){       $error['dispositivo']        = 'error/No ha ingresado la web de talento';}break;
			case 'create_pass':       if(empty($create_pass)){       $error['create_pass']        = 'error/No ha ingresado la web de talento';}break;
			case 'idPropietario':     if(empty($idPropietario)){     $error['idPropietario']      = 'error/No ha ingresado la web de talento';}break;
			case 'idRecorrido':       if(empty($idRecorrido)){       $error['idRecorrido']        = 'error/No ha ingresado la web de talento';}break;
			case 'idRuta':            if(empty($idRuta)){            $error['idRuta']             = 'error/No ha ingresado la web de talento';}break;
			case 'Orden':             if(empty($Orden)){             $error['Orden']              = 'error/No ha ingresado la web de talento';}break;
			case 'idConductor':       if(empty($idConductor)){       $error['idConductor']        = 'error/No ha ingresado la web de talento';}break;
			case 'PPU':               if(empty($PPU)){               $error['PPU']                = 'error/No ha ingresado la web de talento';}break;
			case 'idMarca':           if(empty($idMarca)){           $error['idMarca']            = 'error/No ha ingresado la web de talento';}break;
			case 'idModelo':          if(empty($idModelo)){          $error['idModelo']           = 'error/No ha ingresado la web de talento';}break;
			case 'idTransmision':     if(empty($idTransmision)){     $error['idTransmision']      = 'error/No ha ingresado la web de talento';}break;
			case 'fTransferencia':    if(empty($fTransferencia)){    $error['fTransferencia']     = 'error/No ha ingresado la web de talento';}break;
			case 'idColorV_1':        if(empty($idColorV_1)){        $error['idColorV_1']         = 'error/No ha ingresado la web de talento';}break;
			case 'idColorV_2':        if(empty($idColorV_2)){        $error['idColorV_2']         = 'error/No ha ingresado la web de talento';}break;
			case 'fFabricacion':      if(empty($fFabricacion)){      $error['fFabricacion']       = 'error/No ha ingresado la web de talento';}break;
			case 'N_Motor':           if(empty($N_Motor)){           $error['N_Motor']            = 'error/No ha ingresado la web de talento';}break;
			case 'N_Chasis':          if(empty($N_Chasis)){          $error['N_Chasis']           = 'error/No ha ingresado la web de talento';}break;
			case 'Obs':               if(empty($Obs)){               $error['Obs']                = 'error/No ha ingresado la web de talento';}break;
			case 'idDisponibilidad':  if(empty($idDisponibilidad)){  $error['idDisponibilidad']   = 'error/No ha ingresado la web de talento';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono1)){if(validarnumero($Fono1)) {        $error['Fono1']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Fono2)){if(validarnumero($Fono2)) {        $error['Fono2']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){            $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	if(isset($PPU)){
		if(ValidaPatente($PPU)){      $error['ValidaPatente']     = 'error/La patente ingresada no tiene el formato correcto'; }
		if(palabra_corto($PPU,6)){    $error['palabra_corto']     = 'error/La patente ingresada tiene mas de los 6 digitos solicitados'; }
		if(palabra_largo($PPU,6)){    $error['palabra_largo']     = 'error/La patente ingresada no tiene los 6 digitos solicitados'; }	
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
			if(isset($Nombre)&&isset($Apellido_Paterno)&&isset($Apellido_Materno)){
				$sql_usuario = mysql_query("SELECT Nombre FROM clientes_listado WHERE Nombre='".$Nombre."' AND Apellido_Paterno='".$Apellido_Paterno."' AND Apellido_Materno='".$Apellido_Materno."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La persona ya esta en uso';}
			
			// se verifica si el rut ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM clientes_listado WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El Rut ya esta en uso';}
			
			// se verifica si la patente ya existe
			if(isset($PPU)){
				$sql_email = mysql_query("SELECT PPU FROM clientes_listado WHERE PPU='".$PPU."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['PPU'] = 'error/La Patente ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($email)){
				$sql_email = mysql_query("SELECT email FROM clientes_listado WHERE email='".$email."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['email'] = 'error/El correo de ingresado ya existe';}
			
			// se verifica si el usuario ya existe
			if(isset($usuario)){
				$sql_email = mysql_query("SELECT usuario FROM clientes_listado WHERE usuario='".$usuario."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['usuario'] = 'error/El nombre de usuario ya existe';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($fcreacion) && $fcreacion != ''){                 $a = "'".$fcreacion."'" ;           }else{$a ="''";}
				if(isset($usuario) && $usuario != ''){                     $a .= ",'".$usuario."'" ;           }else{$a .= ",''";}
				if(isset($password) && $password != ''){                   $a .= ",'".md5($password)."'" ;     }else{$a .= ",''";}
				if(isset($idTipoCliente) && $idTipoCliente != ''){         $a .= ",'".$idTipoCliente."'" ;     }else{$a .= ",''";}
				if(isset($Estado) && $Estado != ''){                       $a .= ",'".$Estado."'" ;            }else{$a .= ",''";}
				if(isset($email) && $email != ''){                         $a .= ",'".$email."'" ;             }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",'".$Nombre."'" ;            }else{$a .= ",''";}
				if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){   $a .= ",'".$Apellido_Paterno."'" ;  }else{$a .= ",''";}
				if(isset($Apellido_Materno) && $Apellido_Materno != ''){   $a .= ",'".$Apellido_Materno."'" ;  }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                             $a .= ",'".$Rut."'" ;               }else{$a .= ",''";}
				if(isset($Sexo) && $Sexo != ''){                           $a .= ",'".$Sexo."'" ;              }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",'".$fNacimiento."'" ;       }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",'".$Direccion."'" ;         }else{$a .= ",''";}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",'".$Fono1."'" ;             }else{$a .= ",''";}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",'".$Fono2."'" ;             }else{$a .= ",''";}
				if(isset($Url_imagen) && $Url_imagen != ''){               $a .= ",'".$Url_imagen."'" ;        }else{$a .= ",''";}
				if(isset($Pais) && $Pais != ''){                           $a .= ",'".$Pais."'" ;              }else{$a .= ",''";}
				if(isset($idCiudad) && $idCiudad != ''){                   $a .= ",'".$idCiudad."'" ;          }else{$a .= ",''";}
				if(isset($idComuna) && $idComuna != ''){                   $a .= ",'".$idComuna."'" ;          }else{$a .= ",''";}
				if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){         $a .= ",'".$Ultimo_acceso."'" ;     }else{$a .= ",''";}
				if(isset($primer_ingreso) && $primer_ingreso != ''){       $a .= ",'".$primer_ingreso."'" ;    }else{$a .= ",''";}
				if(isset($Imei) && $Imei != ''){                           $a .= ",'".$Imei."'" ;              }else{$a .= ",''";}
				if(isset($Gsm) && $Gsm != ''){                             $a .= ",'".$Gsm."'" ;               }else{$a .= ",''";}
				if(isset($Latitud) && $Latitud != ''){                     $a .= ",'".$Latitud."'" ;           }else{$a .= ",''";}
				if(isset($Longitud) && $Longitud != ''){                   $a .= ",'".$Longitud."'" ;          }else{$a .= ",''";}
				if(isset($Radio) && $Radio != ''){                         $a .= ",'".$Radio."'" ;             }else{$a .= ",''";}
				if(isset($Alarma) && $Alarma != ''){                       $a .= ",'".$Alarma."'" ;            }else{$a .= ",''";}
				if(isset($EstadoCarrera) && $EstadoCarrera != ''){         $a .= ",'".$EstadoCarrera."'" ;     }else{$a .= ",''";}
				if(isset($dispositivo) && $dispositivo != ''){             $a .= ",'".$dispositivo."'" ;       }else{$a .= ",''";}
				if(isset($create_pass) && $create_pass != ''){             $a .= ",'".$create_pass."'" ;       }else{$a .= ",''";}
				if(isset($idPropietario) && $idPropietario != ''){         $a .= ",'".$idPropietario."'" ;     }else{$a .= ",''";}
				if(isset($idRecorrido) && $idRecorrido != ''){             $a .= ",'".$idRecorrido."'" ;       }else{$a .= ",''";}
				if(isset($idRuta) && $idRuta != ''){                       $a .= ",'".$idRuta."'" ;            }else{$a .= ",''";}
				if(isset($Orden) && $Orden != ''){                         $a .= ",'".$Orden."'" ;             }else{$a .= ",''";}
				if(isset($idConductor) && $idConductor != ''){             $a .= ",'".$idConductor."'" ;       }else{$a .= ",''";}
				if(isset($PPU) && $PPU != ''){                             $a .= ",'".$PPU."'" ;               }else{$a .= ",''";}
				if(isset($idMarca) && $idMarca != ''){                     $a .= ",'".$idMarca."'" ;           }else{$a .= ",''";}
				if(isset($idModelo) && $idModelo != ''){                   $a .= ",'".$idModelo."'" ;          }else{$a .= ",''";}
				if(isset($idTransmision) && $idTransmision != ''){         $a .= ",'".$idTransmision."'" ;     }else{$a .= ",''";}
				if(isset($fTransferencia) && $fTransferencia != ''){       $a .= ",'".$fTransferencia."'" ;    }else{$a .= ",''";}
				if(isset($idColorV_1) && $idColorV_1 != ''){               $a .= ",'".$idColorV_1."'" ;        }else{$a .= ",''";}
				if(isset($idColorV_2) && $idColorV_2 != ''){               $a .= ",'".$idColorV_2."'" ;        }else{$a .= ",''";}
				if(isset($fFabricacion) && $fFabricacion != ''){           $a .= ",'".$fFabricacion."'" ;      }else{$a .= ",''";}
				if(isset($N_Motor) && $N_Motor != ''){                     $a .= ",'".$N_Motor."'" ;           }else{$a .= ",''";}
				if(isset($N_Chasis) && $N_Chasis != ''){                   $a .= ",'".$N_Chasis."'" ;          }else{$a .= ",''";}
				if(isset($Obs) && $Obs != ''){                             $a .= ",'".$Obs."'" ;               }else{$a .= ",''";}
				if(isset($idDisponibilidad) && $idDisponibilidad != ''){   $a .= ",'".$idDisponibilidad."'" ;  }else{$a .= ",''";}
				

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_listado` (fcreacion, usuario, password, idTipoCliente, Estado, email, 
				Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, Direccion, 
				Fono1, Fono2, Url_imagen, Pais, idCiudad, idComuna, Ultimo_acceso, 
				primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma, EstadoCarrera, 
				dispositivo, create_pass, idPropietario, idRecorrido, idRuta, Orden, idConductor, PPU, 
				idMarca, idModelo, idTransmision, fTransferencia, idColorV_1, idColorV_2, fFabricacion, 
				N_Motor, N_Chasis, Obs, idDisponibilidad) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'insert_vehicle':

			//Verifico otros datos
			
			//Se verifica si el dato existe
			if(isset($PPU)){
				$sql_usuario = mysql_query("SELECT PPU FROM clientes_listado WHERE PPU='".$PPU."'  "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['PPU'] = 'error/La Patente ya esta en uso';}
			
			//Se busca el orden y se le asigna un valor
			if(isset($idRecorrido)){
				$query = "SELECT MAX(Orden) AS orden FROM `clientes_listado` WHERE idRecorrido = {$idRecorrido} ";
				$resultado = mysql_query ($query, $dbConn);
				$rowOrden = mysql_fetch_assoc ($resultado);
				if(isset($rowOrden['orden']) && $rowOrden['orden'] != '' ){$Orden=$rowOrden['orden']+1;}else{$Orden=1;}
			}	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($fcreacion) && $fcreacion != ''){                 $a = "'".$fcreacion."'" ;           }else{$a ="''";}
				if(isset($usuario) && $usuario != ''){                     $a .= ",'".$usuario."'" ;           }else{$a .= ",''";}
				if(isset($password) && $password != ''){                   $a .= ",'".md5($password)."'" ;     }else{$a .= ",''";}
				if(isset($idTipoCliente) && $idTipoCliente != ''){         $a .= ",'".$idTipoCliente."'" ;     }else{$a .= ",''";}
				if(isset($Estado) && $Estado != ''){                       $a .= ",'".$Estado."'" ;            }else{$a .= ",''";}
				if(isset($email) && $email != ''){                         $a .= ",'".$email."'" ;             }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",'".$Nombre."'" ;            }else{$a .= ",''";}
				if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){   $a .= ",'".$Apellido_Paterno."'" ;  }else{$a .= ",''";}
				if(isset($Apellido_Materno) && $Apellido_Materno != ''){   $a .= ",'".$Apellido_Materno."'" ;  }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                             $a .= ",'".$Rut."'" ;               }else{$a .= ",''";}
				if(isset($Sexo) && $Sexo != ''){                           $a .= ",'".$Sexo."'" ;              }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",'".$fNacimiento."'" ;       }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",'".$Direccion."'" ;         }else{$a .= ",''";}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",'".$Fono1."'" ;             }else{$a .= ",''";}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",'".$Fono2."'" ;             }else{$a .= ",''";}
				if(isset($Url_imagen) && $Url_imagen != ''){               $a .= ",'".$Url_imagen."'" ;        }else{$a .= ",''";}
				if(isset($Pais) && $Pais != ''){                           $a .= ",'".$Pais."'" ;              }else{$a .= ",''";}
				if(isset($idCiudad) && $idCiudad != ''){                   $a .= ",'".$idCiudad."'" ;          }else{$a .= ",''";}
				if(isset($idComuna) && $idComuna != ''){                   $a .= ",'".$idComuna."'" ;          }else{$a .= ",''";}
				if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){         $a .= ",'".$Ultimo_acceso."'" ;     }else{$a .= ",''";}
				if(isset($primer_ingreso) && $primer_ingreso != ''){       $a .= ",'".$primer_ingreso."'" ;    }else{$a .= ",''";}
				if(isset($Imei) && $Imei != ''){                           $a .= ",'".$Imei."'" ;              }else{$a .= ",''";}
				if(isset($Gsm) && $Gsm != ''){                             $a .= ",'".$Gsm."'" ;               }else{$a .= ",''";}
				if(isset($Latitud) && $Latitud != ''){                     $a .= ",'".$Latitud."'" ;           }else{$a .= ",''";}
				if(isset($Longitud) && $Longitud != ''){                   $a .= ",'".$Longitud."'" ;          }else{$a .= ",''";}
				if(isset($Radio) && $Radio != ''){                         $a .= ",'".$Radio."'" ;             }else{$a .= ",''";}
				if(isset($Alarma) && $Alarma != ''){                       $a .= ",'".$Alarma."'" ;            }else{$a .= ",''";}
				if(isset($EstadoCarrera) && $EstadoCarrera != ''){         $a .= ",'".$EstadoCarrera."'" ;     }else{$a .= ",''";}
				if(isset($dispositivo) && $dispositivo != ''){             $a .= ",'".$dispositivo."'" ;       }else{$a .= ",''";}
				if(isset($create_pass) && $create_pass != ''){             $a .= ",'".$create_pass."'" ;       }else{$a .= ",''";}
				if(isset($idPropietario) && $idPropietario != ''){         $a .= ",'".$idPropietario."'" ;     }else{$a .= ",''";}
				if(isset($idRecorrido) && $idRecorrido != ''){             $a .= ",'".$idRecorrido."'" ;       }else{$a .= ",''";}
				if(isset($idRuta) && $idRuta != ''){                       $a .= ",'".$idRuta."'" ;            }else{$a .= ",''";}
				if(isset($Orden) && $Orden != ''){                         $a .= ",'".$Orden."'" ;             }else{$a .= ",''";}
				if(isset($idConductor) && $idConductor != ''){             $a .= ",'".$idConductor."'" ;       }else{$a .= ",''";}
				if(isset($PPU) && $PPU != ''){                             $a .= ",'".$PPU."'" ;               }else{$a .= ",''";}
				if(isset($idMarca) && $idMarca != ''){                     $a .= ",'".$idMarca."'" ;           }else{$a .= ",''";}
				if(isset($idModelo) && $idModelo != ''){                   $a .= ",'".$idModelo."'" ;          }else{$a .= ",''";}
				if(isset($idTransmision) && $idTransmision != ''){         $a .= ",'".$idTransmision."'" ;     }else{$a .= ",''";}
				if(isset($fTransferencia) && $fTransferencia != ''){       $a .= ",'".$fTransferencia."'" ;    }else{$a .= ",''";}
				if(isset($idColorV_1) && $idColorV_1 != ''){               $a .= ",'".$idColorV_1."'" ;        }else{$a .= ",''";}
				if(isset($idColorV_2) && $idColorV_2 != ''){               $a .= ",'".$idColorV_2."'" ;        }else{$a .= ",''";}
				if(isset($fFabricacion) && $fFabricacion != ''){           $a .= ",'".$fFabricacion."'" ;      }else{$a .= ",''";}
				if(isset($N_Motor) && $N_Motor != ''){                     $a .= ",'".$N_Motor."'" ;           }else{$a .= ",''";}
				if(isset($N_Chasis) && $N_Chasis != ''){                   $a .= ",'".$N_Chasis."'" ;          }else{$a .= ",''";}
				if(isset($Obs) && $Obs != ''){                             $a .= ",'".$Obs."'" ;               }else{$a .= ",''";}
				if(isset($idDisponibilidad) && $idDisponibilidad != ''){   $a .= ",'".$idDisponibilidad."'" ;  }else{$a .= ",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_listado` (fcreacion, usuario, password, idTipoCliente, Estado, email, 
				Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, Direccion, 
				Fono1, Fono2, Url_imagen, Pais, idCiudad, idComuna, Ultimo_acceso, 
				primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma, EstadoCarrera, 
				dispositivo, create_pass, idPropietario, idRecorrido, idRuta, Orden, idConductor, PPU, 
				idMarca, idModelo, idTransmision, fTransferencia, idColorV_1, idColorV_2, fFabricacion, 
				N_Motor, N_Chasis, Obs, idDisponibilidad) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;		
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idCliente='".$idCliente."'" ;
				if(isset($fcreacion) && $fcreacion != ''){                 $a .= ",fcreacion='".$fcreacion."'" ;}
				if(isset($usuario) && $usuario != ''){                     $a .= ",usuario='".$usuario."'" ;}
				if(isset($password) && $password != ''){                   $a .= ",password='".md5($password)."'" ;}
				if(isset($idTipoCliente) && $idTipoCliente != ''){         $a .= ",idTipoCliente='".$idTipoCliente."'" ;}
				if(isset($Estado) && $Estado != ''){                       $a .= ",Estado='".$Estado."'" ;}
				if(isset($email) && $email != ''){                         $a .= ",email='".$email."'" ;}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){   $a .= ",Apellido_Paterno='".$Apellido_Paterno."'" ;}
				if(isset($Apellido_Materno) && $Apellido_Materno != ''){   $a .= ",Apellido_Materno='".$Apellido_Materno."'" ;}
				if(isset($Rut) && $Rut != ''){                             $a .= ",Rut='".$Rut."'" ;}
				if(isset($Sexo) && $Sexo != ''){                           $a .= ",Sexo='".$Sexo."'" ;}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",fNacimiento='".$fNacimiento."'" ;}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",Fono1='".$Fono1."'" ;}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",Fono2='".$Fono2."'" ;}
				if(isset($Url_imagen) && $Url_imagen != ''){               $a .= ",Url_imagen='".$Url_imagen."'" ;}
				if(isset($Pais) && $Pais != ''){                           $a .= ",Pais='".$Pais."'" ;}
				if(isset($idCiudad) && $idCiudad!= ''){                    $a .= ",idCiudad='".$idCiudad."'" ;}
				if(isset($idComuna) && $idComuna!= ''){                    $a .= ",idComuna='".$idComuna."'" ;}
				if(isset($Ultimo_acceso) && $Ultimo_acceso!= ''){          $a .= ",Ultimo_acceso='".$Ultimo_acceso."'" ;}
				if(isset($primer_ingreso) && $primer_ingreso!= ''){        $a .= ",primer_ingreso='".$primer_ingreso."'" ;}
				if(isset($Imei) && $Imei!= ''){                            $a .= ",Imei='".$Imei."'" ;}
				if(isset($Gsm) && $Gsm!= ''){                              $a .= ",Gsm='".$Gsm."'" ;}
				if(isset($Latitud) && $Latitud!= ''){                      $a .= ",Latitud='".$Latitud."'" ;}
				if(isset($Longitud) && $Longitud!= ''){                    $a .= ",Longitud='".$Longitud."'" ;}
				if(isset($Radio) && $Radio!= ''){                          $a .= ",Radio='".$Radio."'" ;}
				if(isset($Alarma) && $Alarma!= ''){                        $a .= ",Alarma='".$Alarma."'" ;}
				if(isset($EstadoCarrera) && $EstadoCarrera!= ''){          $a .= ",EstadoCarrera='".$EstadoCarrera."'" ;}
				if(isset($dispositivo) && $dispositivo!= ''){              $a .= ",dispositivo='".$dispositivo."'" ;}
				if(isset($create_pass) && $create_pass!= ''){              $a .= ",create_pass='".$create_pass."'" ;}
				if(isset($idPropietario) && $idPropietario!= ''){          $a .= ",idPropietario='".$idPropietario."'" ;}
				if(isset($idRecorrido) && $idRecorrido!= ''){              $a .= ",idRecorrido='".$idRecorrido."'" ;}
				if(isset($idRuta) && $idRuta!= ''){                        $a .= ",idRuta='".$idRuta."'" ;}
				if(isset($Orden) && $Orden!= ''){                          $a .= ",Orden='".$Orden."'" ;}
				if(isset($idConductor) && $idConductor!= ''){              $a .= ",idConductor='".$idConductor."'" ;}
				if(isset($PPU) && $PPU!= ''){                              $a .= ",PPU='".$PPU."'" ;}
				if(isset($idMarca) && $idMarca!= ''){                      $a .= ",idMarca='".$idMarca."'" ;}
				if(isset($idModelo) && $idModelo!= ''){                    $a .= ",idModelo='".$idModelo."'" ;}
				if(isset($idTransmision) && $idTransmision!= ''){          $a .= ",idTransmision='".$idTransmision."'" ;}
				if(isset($fTransferencia) && $fTransferencia!= ''){        $a .= ",fTransferencia='".$fTransferencia."'" ;}
				if(isset($idColorV_1) && $idColorV_1!= ''){                $a .= ",idColorV_1='".$idColorV_1."'" ;}
				if(isset($idColorV_2) && $idColorV_2!= ''){                $a .= ",idColorV_2='".$idColorV_2."'" ;}
				if(isset($fFabricacion) && $fFabricacion!= ''){            $a .= ",fFabricacion='".$fFabricacion."'" ;}
				if(isset($N_Motor) && $N_Motor!= ''){                      $a .= ",N_Motor='".$N_Motor."'" ;}
				if(isset($N_Chasis) && $N_Chasis!= ''){                    $a .= ",N_Chasis='".$N_Chasis."'" ;}
				if(isset($Obs) && $Obs!= ''){                              $a .= ",Obs='".$Obs."'" ;}
				if(isset($idDisponibilidad) && $idDisponibilidad!= ''){    $a .= ",idDisponibilidad='".$idDisponibilidad."'" ;}

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
			$query  = "UPDATE clientes_listado SET Estado = '$estado'	
			WHERE idCliente    = '$idCliente'";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location.'&edited=true' );
			die; 


		break;	
/*******************************************************************************************************************/		
		case 'update_disp':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idCliente='".$idCliente."'" ;
				if(isset($idDisponibilidad) && $idDisponibilidad!= ''){    $a .= ",idDisponibilidad='".$idDisponibilidad."'" ;}

				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
				$result = mysql_query($query, $dbConn);
				
			}
		
	
		break;	
/*******************************************************************************************************************/
		case 'up_orden':	

			$idCliente   = $_GET['up_orden'];
			$Orden    = $_GET['orden'];
			$busqueda = $Orden-1;
			//Primero busco el item que este sobre para actualizarle el orden
			$query = "SELECT  idCliente FROM `clientes_listado` WHERE Orden = {$busqueda} AND idRecorrido = {$_GET['view']}";
			$resultado = mysql_query ($query, $dbConn);
			$row_data = mysql_fetch_assoc ($resultado);
			//actualizo el orden de este item
			$query  = "UPDATE `clientes_listado` SET Orden = {$Orden} WHERE idCliente = {$row_data['idCliente']} ";
			$result = mysql_query($query, $dbConn);
			//actualizo el orden del item actual
			$query  = "UPDATE `clientes_listado` SET Orden = {$busqueda} WHERE idCliente = {$idCliente} ";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location );
			die;

		break;	
/*******************************************************************************************************************/
		case 'down_orden':	

			$idCliente   = $_GET['down_orden'];
			$Orden    = $_GET['orden'];
			$busqueda = $Orden+1;
			//Primero busco el item que este sobre para actualizarle el orden
			$query = "SELECT  idCliente FROM `clientes_listado` WHERE Orden = {$busqueda} AND idRecorrido = {$_GET['view']}";
			$resultado = mysql_query ($query, $dbConn);
			$row_data = mysql_fetch_assoc ($resultado);
			//actualizo el orden de este item
			$query  = "UPDATE `clientes_listado` SET Orden = {$Orden} WHERE idCliente = {$row_data['idCliente']} ";
			$result = mysql_query($query, $dbConn);
			//actualizo el orden del item actual
			$query  = "UPDATE `clientes_listado` SET Orden = {$busqueda} WHERE idCliente = {$idCliente} ";
			$result = mysql_query($query, $dbConn);
			
			header( 'Location: '.$location );
			die;

		break;	
/*******************************************************************************************************************/
		case 'filter_vehicle':	

			//Genero el filtro
			$q = '?filter=true';
			if(isset($idConductor) && $idConductor != '')        { $q .= '&idConductor='.$idConductor ; }
			if(isset($idPropietario) && $idPropietario != '')    { $q .= '&idPropietario='.$idPropietario ; }
			if(isset($idRecorrido) && $idRecorrido != '')        { $q .= '&idRecorrido='.$idRecorrido ; }
			if(isset($PPU) && $PPU != '')                        { $q .= '&PPU='.$PPU ; }
			if(isset($idMarca) && $idMarca != '')                { $q .= '&idMarca='.$idMarca ; }
			if(isset($idModelo) && $idModelo != '')              { $q .= '&idModelo='.$idModelo ; }
			if(isset($idTransmision) && $idTransmision != '')    { $q .= '&idTransmision='.$idTransmision ; }
			if(isset($idColorV_1) && $idColorV_1 != '')          { $q .= '&idColorV_1='.$idColorV_1 ; }
			if(isset($idColorV_2) && $idColorV_2 != '')          { $q .= '&idColorV_2='.$idColorV_2 ; }
			if(isset($fechaInicio) && $fechaInicio != '')        { $q .= '&fechaInicio='.$fechaInicio ; }
			if(isset($fechaTermino) && $fechaTermino != '')      { $q .= '&fechaTermino='.$fechaTermino ; }
			if(isset($N_Motor) && $N_Motor != '')                { $q .= '&N_Motor='.$N_Motor ; }
			if(isset($N_Chasis) && $N_Chasis != '')              { $q .= '&N_Chasis='.$N_Chasis ; }
			if(isset($rango_a) && $rango_a != '')                { $q .= '&rango_a='.$rango_a ; }
			if(isset($rango_b) && $rango_b != '')                { $q .= '&rango_b='.$rango_b ; }
			if(isset($Estado) && $Estado != '')                  { $q .= '&Estado='.$Estado ; }
			$q .= '&pagina=1';
		
			header( 'Location: '.$location.$q );
			die;

		break;	
/*******************************************************************************************************************/
		case 'block':	

			//filtros
			if(isset($_GET["idEncargado"]) && $_GET["idEncargado"] != ''){    $a = "'".$_GET["idEncargado"]."'" ;    }else{$a ="''";}
			if(isset($_GET["idTaxista"]) && $_GET["idTaxista"] != ''){        $a .= ",'".$_GET["idTaxista"]."'" ;    }else{$a .= ",''";}
			if(isset($_GET["Monto"]) && $_GET["Monto"] != ''){                $a .= ",'".$_GET["Monto"]."'" ;        }else{$a .= ",''";} 
			if(isset($_GET["EstadoPago"]) && $_GET["EstadoPago"] != ''){      $a .= ",'".$_GET["EstadoPago"]."'" ;   }else{$a .= ",''";}
			if(isset($_GET["FechaBloqueo"]) && $_GET["FechaBloqueo"] != ''){  $a .= ",'".$_GET["FechaBloqueo"]."'" ; }else{$a .= ",''";}
			
			// Inserto los datos en la tabla de bloqueo
			$query  = "INSERT INTO `taxista_bloqueos` (idEncargado, idTaxista, Monto, EstadoPago, FechaBloqueo) VALUES ({$a} )";
			$result = mysql_query($query, $dbConn);
			
			//Cambio el estado del usuario bloqueado
			$a = "idCliente='".$_GET["idTaxista"]."'" ;
			$a .= ",Estado=21" ;
		  
			// inserto los datos de registro en la db
			$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '{$_GET['idTaxista']}'";
			$result = mysql_query($query, $dbConn);
		
			header( 'Location: '.$location.'&bloqueo=true' );
			die;

		break;
/*******************************************************************************************************************/
		case 'login':	

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				// Se verifica si el usuario existe en la base de datos propia
				if ( $arrCliente = esCliente($usuario,md5($password),$dbConn) ) {
					//Verifico si el usuario esta activo o inactivo
					switch ($arrCliente['Estado']) {
						case 1:
							// definimos las sesiones
							$_SESSION['usuario']    = $arrCliente['usuario'];
							$_SESSION['password']	= $arrCliente['password'];
									
							//Almaceno la fecha del ingreso
							$fecha=fecha_actual();
							//Actualizo la tabla de los usuarios
							$sql = "UPDATE clientes_listado SET 
							Ultimo_acceso   = '".$fecha."', 
							Imei            = ".$imei.",
							Gsm             = '".$gsm."',
							Latitud         = '".$lat."',
							Longitud        = '".$lon."' 
							WHERE usuario='".$usuario."'";
							$resultado = mysql_query($sql,$dbConn);
							// si todo esta bien te redirige hacia la pagina principal
							header( 'Location: '.$root_to.$w.$move_to );
							die;
						break;
						case 2:
							//Se el usuario esta bloqueado envia a la pantalla de bloqueo
							header( 'Location: '.$location.'&block=true' );
							die;
						break;
						case 3:
							//Se el usuario esta inactivo se envia a la pantalla de activacion
							header( 'Location: '.$location.'&activate=true' );
							die;
						break;
						}		

				//Se el usuario no existe en nuestra base de datos va a la otra y lo registra en la nuestra
				} else {
					//si el usuario no existe se le recomienda inscribirse
					header( 'Location: '.$location.'&inex=true' );
					die;
				}
			
			
			}

		break;	
/*******************************************************************************************************************/
		case 'recover_pass':	

			//traigo los datos almacenados
			$query = "select email from clientes_listado where email='".$email."'";
			$resultado = mysql_query ($query, $dbConn);
			$rowusr = mysql_fetch_assoc ($resultado);
			//verifico si los datos ingresados son iguales a los almacenados
			if(isset($email)){
				if($rowusr['email']!=$email){  
					$error['email'] = 'error/El email ingresado no existe.';
				}	
			}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Generacion de nueva clave
				$num_caracteres = "10"; //cantidad de caracteres de la clave
				$clave = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
				$nueva_clave = md5($clave);//se codifica la clave
				
				//Actualizacion de la clave en la base de datos
				$query  = "UPDATE `clientes_listado` SET password='".$nueva_clave."' WHERE email='".$email."'";
				$result = mysql_query($query, $dbConn);
				
				//envio de correo de con la clave nueva
				$mail             = new PHPMailer();
				$mail->IsHTML(true);
				$mail->SMTPAuth   = true;
				$mail->Host       = "localhost";
				//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
				//====== DE QUIEN ES ========
				$mail->From=$rowempresa['email_principal'];
				$mail->FromName=$rowempresa['Nombre'];
				$mail->Sender=$rowempresa['email_principal'];
				$mail->AddReplyTo("".$rowempresa['email_principal']."", "Responde a este mail");
				//====== PARA QUIEN =========
				$mail->Subject = "Cambio de password" ;
				$mail->AddAddress($email);    
				//====== MENSAJE =========
				$strBody = "<p>Se ha generado una nueva contraseña para el usuario ".$email.", su nueva contraseña es: ".$nueva_clave."</p>";
				$mail->MsgHTML($strBody);
				if(!$mail->Send()){
					$mail->ClearAddresses();
				}else{
					$mail->ClearAddresses();
				}
				
				header( 'Location: '.$location );
				die;
			}

		break;
/*******************************************************************************************************************/
		case 'create_user':


			//Se verifica si el dato existe
			if(isset($Nombre)&&isset($Apellido_Paterno)&&isset($Apellido_Materno)){
				$sql_usuario = mysql_query("SELECT Nombre FROM clientes_listado WHERE Nombre='".$Nombre."' AND Apellido_Paterno='".$Apellido_Paterno."' AND Apellido_Materno='".$Apellido_Materno."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La persona ya esta en uso';}
			
			// se verifica si el rut ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM clientes_listado WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El Rut ya esta en uso';}
			
			// se verifica si la patente ya existe
			if(isset($PPU)){
				$sql_email = mysql_query("SELECT PPU FROM clientes_listado WHERE PPU='".$PPU."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['PPU'] = 'error/La Patente ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($email)){
				$sql_email = mysql_query("SELECT email FROM clientes_listado WHERE email='".$email."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['email'] = 'error/El correo de ingresado ya existe';}
			
			// se verifica si el usuario ya existe
			if(isset($usuario)){
				$sql_email = mysql_query("SELECT usuario FROM clientes_listado WHERE usuario='".$usuario."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['usuario'] = 'error/El nombre de usuario ya existe';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				if($config_app['comport_autoactivate']==2){
				
					//envio de correo de con la clave para ingresar por primera vez
					$mail             = new PHPMailer();
					$mail->IsHTML(true);
					$mail->SMTPAuth   = true;
					$mail->Host       = "localhost";
					//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
					//====== DE QUIEN ES ========
					$mail->From=$rowempresa['email_principal'];
					$mail->FromName=$rowempresa['Nombre'];
					$mail->Sender=$rowempresa['email_principal'];
					$mail->AddReplyTo("".$rowempresa['email_principal']."", "Responde a este mail");
					//====== PARA QUIEN =========
					$mail->Subject = "Creacion de usuario" ;
					$mail->AddAddress($email);    
					//====== MENSAJE =========
					$strBody = "<p>Se ha creado correctamente su usuario, sin embargo debe ingresar la siguiente contraseña para activarlo:</p><p>".$create_pass."</p>";
					$mail->MsgHTML($strBody);
					if(!$mail->Send()){
						$mail->ClearAddresses();
					}else{
						$mail->ClearAddresses();
					}
				}
				
				
				//filtros
				if(isset($fcreacion) && $fcreacion != ''){                 $a = "'".$fcreacion."'" ;           }else{$a ="''";}
				if(isset($usuario) && $usuario != ''){                     $a .= ",'".$usuario."'" ;           }else{$a .= ",''";}
				if(isset($password) && $password != ''){                   $a .= ",'".md5($password)."'" ;     }else{$a .= ",''";}
				if(isset($idTipoCliente) && $idTipoCliente != ''){         $a .= ",'".$idTipoCliente."'" ;     }else{$a .= ",''";}
				if(isset($Estado) && $Estado != ''){                       $a .= ",'".$Estado."'" ;            }else{$a .= ",''";}
				if(isset($email) && $email != ''){                         $a .= ",'".$email."'" ;             }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                       $a .= ",'".$Nombre."'" ;            }else{$a .= ",''";}
				if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){   $a .= ",'".$Apellido_Paterno."'" ;  }else{$a .= ",''";}
				if(isset($Apellido_Materno) && $Apellido_Materno != ''){   $a .= ",'".$Apellido_Materno."'" ;  }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                             $a .= ",'".$Rut."'" ;               }else{$a .= ",''";}
				if(isset($Sexo) && $Sexo != ''){                           $a .= ",'".$Sexo."'" ;              }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){             $a .= ",'".$fNacimiento."'" ;       }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){                 $a .= ",'".$Direccion."'" ;         }else{$a .= ",''";}
				if(isset($Fono1) && $Fono1 != ''){                         $a .= ",'".$Fono1."'" ;             }else{$a .= ",''";}
				if(isset($Fono2) && $Fono2 != ''){                         $a .= ",'".$Fono2."'" ;             }else{$a .= ",''";}
				if(isset($Url_imagen) && $Url_imagen != ''){               $a .= ",'".$Url_imagen."'" ;        }else{$a .= ",''";}
				if(isset($Pais) && $Pais != ''){                           $a .= ",'".$Pais."'" ;              }else{$a .= ",''";}
				if(isset($idCiudad) && $idCiudad != ''){                   $a .= ",'".$idCiudad."'" ;          }else{$a .= ",''";}
				if(isset($idComuna) && $idComuna != ''){                   $a .= ",'".$idComuna."'" ;          }else{$a .= ",''";}
				if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){         $a .= ",'".$Ultimo_acceso."'" ;     }else{$a .= ",''";}
				if(isset($primer_ingreso) && $primer_ingreso != ''){       $a .= ",'".$primer_ingreso."'" ;    }else{$a .= ",''";}
				if(isset($Imei) && $Imei != ''){                           $a .= ",'".$Imei."'" ;              }else{$a .= ",''";}
				if(isset($Gsm) && $Gsm != ''){                             $a .= ",'".$Gsm."'" ;               }else{$a .= ",''";}
				if(isset($Latitud) && $Latitud != ''){                     $a .= ",'".$Latitud."'" ;           }else{$a .= ",''";}
				if(isset($Longitud) && $Longitud != ''){                   $a .= ",'".$Longitud."'" ;          }else{$a .= ",''";}
				if(isset($Radio) && $Radio != ''){                         $a .= ",'".$Radio."'" ;             }else{$a .= ",''";}
				if(isset($Alarma) && $Alarma != ''){                       $a .= ",'".$Alarma."'" ;            }else{$a .= ",''";}
				if(isset($EstadoCarrera) && $EstadoCarrera != ''){         $a .= ",'".$EstadoCarrera."'" ;     }else{$a .= ",''";}
				if(isset($dispositivo) && $dispositivo != ''){             $a .= ",'".$dispositivo."'" ;       }else{$a .= ",''";}
				if(isset($create_pass) && $create_pass != ''){             $a .= ",'".$create_pass."'" ;       }else{$a .= ",''";}
				if(isset($idPropietario) && $idPropietario != ''){         $a .= ",'".$idPropietario."'" ;     }else{$a .= ",''";}
				if(isset($idRecorrido) && $idRecorrido != ''){             $a .= ",'".$idRecorrido."'" ;       }else{$a .= ",''";}
				if(isset($idRuta) && $idRuta != ''){                       $a .= ",'".$idRuta."'" ;            }else{$a .= ",''";}
				if(isset($Orden) && $Orden != ''){                         $a .= ",'".$Orden."'" ;             }else{$a .= ",''";}
				if(isset($idConductor) && $idConductor != ''){             $a .= ",'".$idConductor."'" ;       }else{$a .= ",''";}
				if(isset($PPU) && $PPU != ''){                             $a .= ",'".$PPU."'" ;               }else{$a .= ",''";}
				if(isset($idMarca) && $idMarca != ''){                     $a .= ",'".$idMarca."'" ;           }else{$a .= ",''";}
				if(isset($idModelo) && $idModelo != ''){                   $a .= ",'".$idModelo."'" ;          }else{$a .= ",''";}
				if(isset($idTransmision) && $idTransmision != ''){         $a .= ",'".$idTransmision."'" ;     }else{$a .= ",''";}
				if(isset($fTransferencia) && $fTransferencia != ''){       $a .= ",'".$fTransferencia."'" ;    }else{$a .= ",''";}
				if(isset($idColorV_1) && $idColorV_1 != ''){               $a .= ",'".$idColorV_1."'" ;        }else{$a .= ",''";}
				if(isset($idColorV_2) && $idColorV_2 != ''){               $a .= ",'".$idColorV_2."'" ;        }else{$a .= ",''";}
				if(isset($fFabricacion) && $fFabricacion != ''){           $a .= ",'".$fFabricacion."'" ;      }else{$a .= ",''";}
				if(isset($N_Motor) && $N_Motor != ''){                     $a .= ",'".$N_Motor."'" ;           }else{$a .= ",''";}
				if(isset($N_Chasis) && $N_Chasis != ''){                   $a .= ",'".$N_Chasis."'" ;          }else{$a .= ",''";}
				if(isset($Obs) && $Obs != ''){                             $a .= ",'".$Obs."'" ;               }else{$a .= ",''";}
				if(isset($idDisponibilidad) && $idDisponibilidad != ''){   $a .= ",'".$idDisponibilidad."'" ;  }else{$a .= ",''";}
				

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_listado` (fcreacion, usuario, password, idTipoCliente, Estado, email, 
				Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, Direccion, 
				Fono1, Fono2, Url_imagen, Pais, idCiudad, idComuna, Ultimo_acceso, 
				primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma, EstadoCarrera, 
				dispositivo, create_pass, idPropietario, idRecorrido, idRuta, Orden, idConductor, PPU, 
				idMarca, idModelo, idTransmision, fTransferencia, idColorV_1, idColorV_2, fFabricacion, 
				N_Motor, N_Chasis, Obs, idDisponibilidad) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}


		break;
/*******************************************************************************************************************/
		case 'activate_user':

			//Se verifica si el dato existe
			if(isset($create_pass)){
				$sql_usuario = mysql_query("SELECT create_pass FROM clientes_listado WHERE create_pass='".$create_pass."'  "); 
				$n_usr = mysql_num_rows($sql_usuario);
			} else {$n_usr=0;}
			// Valido si el usuario existe
			if($n_usr == 0) { $error['usuario'] = 'error/La contraseña no coincide con la almacenada.'; }
			
			if ( empty($create_pass) ){
				$error['usuario'] = 'error/No ha ingresado un  la contraseña.';
			}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Actualizo la tabla de los usuarios
				$sql = "UPDATE clientes_listado
				SET Estado='1'
				WHERE create_pass='".$create_pass."'";
				$resultado = mysql_query($sql,$dbConn);
				

				//redirigo a la nueva pagina
				header( 'Location: '.$location );
				die;
			
			}
			




		break;
/*******************************************************************************************************************/
	}
?>