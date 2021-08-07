<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])&& !isset($errors[18])&& !isset($errors[19])&& !isset($errors[20])&& !isset($errors[21])&& !isset($errors[22])&& !isset($errors[23])&& !isset($errors[24])&& !isset($errors[25])&& !isset($errors[26])&& !isset($errors[27])&& !isset($errors[28])&& !isset($errors[29])&& !isset($errors[30])&& !isset($errors[31])&& !isset($errors[32])&& !isset($errors[33])&& !isset($errors[34])&& !isset($errors[35])  ) { 

			
		//Filtros
        $a = "idCliente='".$idCliente."'" ;
		if(isset($fcreacion) && $fcreacion != ''){                  $a .= ",fcreacion='".$fcreacion."'" ;  }
		if(isset($usuario) && $usuario != ''){                      $a .= ",usuario='".$usuario."'" ;  }
		if(isset($password) && $password != ''){                    $a .= ",password='".md5($password)."'" ; }
		if(isset($idTipoCliente) && $idTipoCliente != ''){          $a .= ",idTipoCliente='".$idTipoCliente."'" ; }
		if(isset($Estado) && $Estado != ''){                        $a .= ",Estado='".$Estado."'" ; }
		if(isset($email) && $email != ''){                          $a .= ",email='".$email."'" ; }
		if(isset($Nombre) && $Nombre != ''){                        $a .= ",Nombre='".$Nombre."'" ;  }
		if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){    $a .= ",Apellido_Paterno='".$Apellido_Paterno."'" ; }
		if(isset($Apellido_Materno) && $Apellido_Materno != ''){    $a .= ",Apellido_Materno='".$Apellido_Materno."'" ; }
		if(isset($Rut) && $Rut != ''){                              $a .= ",Rut='".$Rut."'" ; }
		if(isset($Sexo) && $Sexo != ''){                            $a .= ",Sexo='".$Sexo."'" ; }
		if(isset($fNacimiento) && $fNacimiento != ''){              $a .= ",fNacimiento='".$fNacimiento."'" ; }
		if(isset($Direccion) && $Direccion != ''){                  $a .= ",Direccion='".$Direccion."'" ; }
		if(isset($Fono1) && $Fono1 != ''){                          $a .= ",Fono1='".$Fono1."'" ; }
		if(isset($Fono2) && $Fono2 != ''){                          $a .= ",Fono2='".$Fono2."'" ; }
		if(isset($Url_imagen) && $Url_imagen != ''){                $a .= ",Url_imagen='".$Url_imagen."'" ; }
		if(isset($Pais) && $Pais != ''){                            $a .= ",Pais='".$Pais."'" ; }
		if(isset($idCiudad) && $idCiudad != ''){                    $a .= ",idCiudad='".$idCiudad."'" ; }
		if(isset($idComuna) && $idComuna != ''){                    $a .= ",idComuna='".$idComuna."'" ; }
		if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){          $a .= ",Ultimo_acceso='".$Ultimo_acceso."'" ;  }
		if(isset($primer_ingreso) && $primer_ingreso != ''){        $a .= ",primer_ingreso='".$primer_ingreso."'" ; }
		if(isset($Imei) && $Imei != ''){                            $a .= ",Imei='".$Imei."'" ; }
		if(isset($Gsm) && $Gsm != ''){                              $a .= ",Gsm='".$Gsm."'" ; }
		if(isset($Latitud) && $Latitud != ''){                      $a .= ",Latitud='".$Latitud."'" ; }
		if(isset($Longitud) && $Longitud != ''){                    $a .= ",Longitud='".$Longitud."'" ; }
		if(isset($Radio) && $Radio != ''){                          $a .= ",Radio='".$Radio."'" ; }
		if(isset($Alarma) && $Alarma != ''){                        $a .= ",Alarma='".$Alarma."'" ; }
		if(isset($dispositivo) && $dispositivo != ''){              $a .= ",dispositivo='".$dispositivo."'" ; }
		if(isset($create_pass) && $create_pass != ''){              $a .= ",create_pass='".$create_pass."'" ; }
		if(isset($mesa) && $mesa != ''){                            $a .= ",mesa='".$mesa."'" ; }




		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>