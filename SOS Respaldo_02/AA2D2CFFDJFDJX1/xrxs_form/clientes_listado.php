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
			case 'Obs':               if(empty($Obs)){              $error['Obs']                 = 'error/No ha ingresado la web de talento';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono1)){if (validarnumero($Fono1)) {       $error['Fono1']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Fono2)){if (validarnumero($Fono2)) {       $error['Fono2']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){            $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':

			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($Nombre)&&isset($Apellido_Paterno)&&isset($Apellido_Materno)){
				$sql_usuario = mysql_query("SELECT Nombre FROM clientes_listado WHERE Nombre='".$Nombre."' AND Apellido_Paterno='".$Apellido_Paterno."' AND Apellido_Materno='".$Apellido_Materno."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La persona ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM clientes_listado WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El Rut ya esta en uso';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($fcreacion) && $fcreacion != ''){                 $a = "'".$fcreacion."'" ;           }else{$a ="''";}
				if(isset($usuario) && $usuario != ''){                     $a .= ",'".$usuario."'" ;           }else{$a .= ",''";}
				if(isset($password) && $password != ''){                   $a .= ",'".$password."'" ;          }else{$a .= ",''";}
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
				

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_listado` (fcreacion, usuario, password, idTipoCliente, Estado, email, 
				Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, Direccion, 
				Fono1, Fono2, Url_imagen, Pais, idCiudad, idComuna, Ultimo_acceso, 
				primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma, EstadoCarrera, 
				dispositivo, create_pass, idPropietario, idRecorrido, idRuta, Orden, idConductor, PPU, 
				idMarca, idModelo, idTransmision, fTransferencia, idColorV_1, idColorV_2, fFabricacion, 
				N_Motor, N_Chasis, Obs) VALUES ({$a} )";
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
				if(isset($password) && $password != ''){                   $a .= ",password='".$password."'" ;}
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
	}
?>