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
	
		
		//filtros
		if(isset($fcreacion) && $fcreacion != ''){                    $a = "'".$fcreacion."'" ;            }else{ $a ="''"; }
		if(isset($usuario) && $usuario != ''){                        $a .= ",'".$usuario."'" ;            }else{ $a .= ",''"; }
		if(isset($password) && $password != ''){                      $a .= ",'".md5($password)."'" ;      }else{ $a .= ",''"; }
		if(isset($idTipoCliente) && $idTipoCliente != ''){            $a .= ",'".$idTipoCliente."'" ;      }else{ $a .= ",''"; }
		if(isset($Estado) && $Estado != ''){                          $a .= ",'".$Estado."'" ;             }else{ $a .= ",''"; }
		if(isset($email) && $email != ''){                            $a .= ",'".$email."'" ;              }else{ $a .= ",''"; }
		if(isset($Nombre) && $Nombre != ''){                          $a .= ",'".$Nombre."'" ;             }else{ $a .= ",''"; }
		if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){      $a .= ",'".$Apellido_Paterno."'" ;   }else{ $a .= ",''"; }
		if(isset($Apellido_Materno) && $Apellido_Materno != ''){      $a .= ",'".$Apellido_Materno."'" ;   }else{ $a .= ",''"; }
		if(isset($Rut) && $Rut != ''){                                $a .= ",'".$Rut."'" ;                }else{ $a .= ",''"; }
		if(isset($Sexo) && $Sexo != ''){                              $a .= ",'".$Sexo."'" ;               }else{ $a .= ",''"; }
		if(isset($fNacimiento) && $fNacimiento != ''){                $a .= ",'".$fNacimiento."'" ;        }else{ $a .= ",''"; }
		if(isset($Direccion) && $Direccion != ''){                    $a .= ",'".$Direccion."'" ;          }else{ $a .= ",''"; }
		if(isset($Fono1) && $Fono1 != ''){                            $a .= ",'".$Fono1."'" ;              }else{ $a .= ",''"; }
		if(isset($Fono2) && $Fono2 != ''){                            $a .= ",'".$Fono2."'" ;              }else{ $a .= ",''"; }
		if(isset($Url_imagen) && $Url_imagen != ''){                  $a .= ",'".$Url_imagen."'" ;         }else{ $a .= ",''"; }
		if(isset($Pais) && $Pais != ''){                              $a .= ",'".$Pais."'" ;               }else{ $a .= ",''"; }
		if(isset($idCiudad) && $idCiudad != ''){                      $a .= ",'".$idCiudad."'" ;           }else{ $a .= ",''"; }
		if(isset($idComuna) && $idComuna != ''){                      $a .= ",'".$idComuna."'" ;           }else{ $a .= ",''"; }
		if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){            $a .= ",'".$Ultimo_acceso."'" ;      }else{ $a .= ",''"; }
		if(isset($primer_ingreso) && $primer_ingreso != ''){          $a .= ",'".$primer_ingreso."'" ;     }else{ $a .= ",''"; }
		if(isset($Imei) && $Imei != ''){                              $a .= ",'".$Imei."'" ;               }else{ $a .= ",''"; }
		if(isset($Gsm) && $Gsm != ''){                                $a .= ",'".$Gsm."'" ;                }else{ $a .= ",''"; }
		if(isset($Latitud) && $Latitud != ''){                        $a .= ",'".$Latitud."'" ;            }else{ $a .= ",''"; }
		if(isset($Longitud) && $Longitud != ''){                      $a .= ",'".$Longitud."'" ;           }else{ $a .= ",''"; }
		if(isset($Radio) && $Radio != ''){                            $a .= ",'".$Radio."'" ;              }else{ $a .= ",''"; }
		if(isset($Alarma) && $Alarma != ''){                          $a .= ",'".$Alarma."'" ;             }else{ $a .= ",''"; }
		if(isset($EstadoCarrera) && $EstadoCarrera != ''){            $a .= ",'".$EstadoCarrera."'" ;      }else{ $a .= ",''"; }
		if(isset($dispositivo) && $dispositivo != ''){                $a .= ",'".$dispositivo."'" ;        }else{ $a .= ",''"; }
		if(isset($create_pass) && $create_pass != ''){                $a .= ",'".$create_pass."'" ;        }else{ $a .= ",''"; }
		if(isset($idPropietario) && $idPropietario != ''){            $a .= ",'".$idPropietario."'" ;      }else{ $a .= ",''"; }
		if(isset($idRecorrido) && $idRecorrido != ''){                $a .= ",'".$idRecorrido."'" ;        }else{ $a .= ",''"; }
		if(isset($idConductor) && $idConductor != ''){                $a .= ",'".$idConductor."'" ;        }else{ $a .= ",''"; }
		if(isset($PPU) && $PPU != ''){                                $a .= ",'".$PPU."'" ;                }else{ $a .= ",''"; }
		if(isset($idMarca) && $idMarca != ''){                        $a .= ",'".$idMarca."'" ;            }else{ $a .= ",''"; }
		if(isset($idModelo) && $idModelo != ''){                      $a .= ",'".$idModelo."'" ;           }else{ $a .= ",''"; }
		if(isset($idTransmision) && $idTransmision != ''){            $a .= ",'".$idTransmision."'" ;      }else{ $a .= ",''"; }
		if(isset($fTransferencia) && $fTransferencia != ''){          $a .= ",'".$fTransferencia."'" ;     }else{ $a .= ",''"; }
		if(isset($idColorV_1) && $idColorV_1 != ''){                  $a .= ",'".$idColorV_1."'" ;         }else{ $a .= ",''"; }
		if(isset($idColorV_2) && $idColorV_2 != ''){                  $a .= ",'".$idColorV_2."'" ;         }else{ $a .= ",''"; }
		if(isset($fFabricacion) && $fFabricacion != ''){              $a .= ",'".$fFabricacion."'" ;       }else{ $a .= ",''"; }
		if(isset($N_Motor) && $N_Motor != ''){                        $a .= ",'".$N_Motor."'" ;            }else{ $a .= ",''"; }
		if(isset($N_Chasis) && $N_Chasis != ''){                      $a .= ",'".$N_Chasis."'" ;           }else{ $a .= ",''"; }
		if(isset($Obs) && $Obs != ''){                                $a .= ",'".$Obs."'" ;                }else{ $a .= ",''"; }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (fcreacion, usuario, password, idTipoCliente, Estado, email, Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, Direccion, Fono1, Fono2, Url_imagen, Pais, idCiudad, idComuna, Ultimo_acceso, primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma, EstadoCarrera, dispositivo, create_pass, idPropietario, idRecorrido, idConductor, PPU, idMarca, idModelo, idTransmision, fTransferencia, idColorV_1, idColorV_2, fFabricacion, N_Motor, N_Chasis, Obs) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>